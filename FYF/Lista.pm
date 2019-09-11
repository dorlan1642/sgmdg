package FYF::Lista;

############################################################################
# Autor : José David Romero García
# email : romdav@gmail.com
# $Id: Common.pm,v 1.3 2005/10/30 22:06:11 david Exp $
#
# Copyright: Exosfera.Com.
############################################################################

use strict;
use CGI qw/:standard/;
use CGI::Carp qw(fatalsToBrowser);
use lib "../../perl-libs/";
use Template;

use FYF::Com;

sub lista_print {
    my $template = Template->new();
    my $HTML = "";
    my $items = $dbh->selectall_arrayref("SELECT p.id_producto,nombre,l.id_modelo FROM productos p INNER JOIN " .
					 "listas l ON p.id_producto=l.id_producto WHERE l.session=? ",
					{Slice=>{}},$sess{_session_id});
#   my $items = $dbh->selectall_arrayref("SELECT id_producto, nombre FROM productos WHERE id_producto IN " .
#				 "(SELECT id_producto FROM listas WHERE session=?)",{Slice=>{}},$sess{_session_id});
    my $query = $ENV{QUERY_STRING};
    $query =~ s/id_pro=[0-9]*\&laccion=quitar_lista//g;
    $query =~ s/id_pro=[0-9]*\&laccion=agregar//g;
    $query .= '&' if($query);
    foreach my $item(@$items){
	$item->{query} = $query . 'id_pro='.$item->{id_producto}.'&laccion=quitar_lista';
	$item->{modelo} = $dbh->selectrow_array("SELECT modelo FROM productos_modelos WHERE id_modelo=?",{},$item->{id_modelo});
    }

    my $vars = {
		items => $items,
		script => $ENV{SCRIPT_NAME},
		query  => $ENV{QUERY_STRING},
	       };
    $template->process("tmpl/lista_print.html", $vars,\$HTML) or $HTML = $template->error();
    return $HTML;
}

sub lista_print_small {
    my $template = Template->new();
    my $HTML = "";
    my $items = $dbh->selectall_arrayref("SELECT id_producto, nombre FROM productos WHERE id_producto IN " .
					 "(SELECT id_producto FROM listas WHERE session=?)",{Slice=>{}},$sess{_session_id});
    my $query = $ENV{QUERY_STRING};
    $query =~ s/id_pro=[0-9]*\&laccion=quitar_lista//g;
    $query =~ s/id_pro=[0-9]*\&laccion=agregar//g;
    $query .= '&' if($query);
    foreach my $item(@$items){
	$item->{query} = $query . 'id_pro='.$item->{id_producto}.'&laccion=quitar_lista';
    }

    my $vars = {
		items => $items,
		script => $ENV{SCRIPT_NAME},
		query  => $ENV{QUERY_STRING},
	       };
    $template->process("tmpl/lista_print_small.html", $vars,\$HTML) or $HTML = $template->error();
    return $HTML;
}

sub agregar {
    my $id_producto = int(shift) || 0;
    my $noMSG = shift || "";
    my $cantidad = int(shift) || "";
    my $id_modelo = int(shift) || "";
    my $tiempo = int(shift) || 0;

    my $exist = 0;
    eval {
	if($cantidad and $id_modelo){
	    $exist = $dbh->selectrow_array("SELECT COUNT(*) FROM listas WHERE session=? AND id_producto=? AND id_modelo=?",{},$sess{_session_id},$id_producto,$id_modelo) || 0;
	    if($exist){
		$dbh->do("UPDATE listas SET cantidad=?, tiempo=? WHERE session=? AND id_producto=? AND id_modelo=?",{},
			 $cantidad,$tiempo,$sess{_session_id},$id_producto,$id_modelo);
	    }else{
		$dbh->do("INSERT INTO listas(session, id_producto, cantidad, id_modelo, tiempo) values(?,?,?,?,?)",{},
			 $sess{_session_id},$id_producto,$cantidad,$id_modelo,$tiempo);
	    }
	}elsif($cantidad and !$id_modelo){
	    $dbh->do("INSERT INTO listas(session, id_producto, cantidad, tiempo) values(?,?,?,?)",{},$sess{_session_id},$id_producto,$cantidad,$tiempo);
	}else{
	    $dbh->do("INSERT INTO listas(session, id_producto, tiempo) values(?,?,?)",{},$sess{_session_id},$id_producto,$tiempo);
	}
    };
    if($noMSG ne "noMSG"){
	my $product = $dbhq->selectrow_array("SELECT product FROM products WHERE id_product=?",{},$id_producto);
	msg_add("info","Producto ".$product." agregado a la lista.");
    }
}

sub quitar {
    my $id_producto = int(shift) || 0;
    my $noMSG = shift || "";
    eval {
	$dbh->do("DELETE FROM listas WHERE session=? AND id_producto=?",{},$sess{_session_id},$id_producto);
    };
    if($noMSG ne "noMSG"){
	my $product = $dbhq->selectrow_array("SELECT product FROM products WHERE id_product=?",{},$id_producto);
	msg_add("info","Producto ".$product." eliminado de la lista.");
    }
}

1;
