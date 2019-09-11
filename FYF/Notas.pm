package FYF::Notas;

############################################################################
# Autor : Jos� David Romero Garc�a
# email : romdav@gmail.com
# $Id: Common.pm,v 1.3 2005/10/30 22:06:11 david Exp $
#
# Copyright: Exosfera.Com.
# This module is free software.
# It may be used, redistributed and/or modified under
# the terms of the Perl Artistic License (see
# http://www.perl.com/perl/misc/Artistic.html)
############################################################################

use strict;
use CGI qw/:standard/;
use CGI::Carp qw(fatalsToBrowser);
use lib "lib/";

use FYF::Com;

BEGIN {
    use Exporter();
    use vars qw( @ISA @EXPORT @EXPORT_OK );
    @ISA = qw( Exporter );
    @EXPORT = qw(
		    $notas_usadas_str
		    @notas_usadas
		    &notas_usadas_agregar
	       );
}

use vars @EXPORT;

sub notas_usadas_agregar {
    my $id_nota = shift;
    return "" if(!$id_nota);
    push(@notas_usadas,$id_nota);
    $notas_usadas_str = "";
    foreach my $id_nota(@notas_usadas){
	if($notas_usadas_str){
	    $notas_usadas_str .= " AND ";
	}
	$notas_usadas_str .= " n.id_nota <> " . int($id_nota) . " ";
    }
    $notas_usadas_str = " AND ($notas_usadas_str)";
}

sub notas_promos_vigentes {
    my $HTML = "";
    my $template = Template->new();

    my $tipono = shift || "0";

    my $posts = $dbhq->selectall_arrayref("SELECT id_post, title, contents, img FROM posts p WHERE active=1 AND section=? AND (DATE(expires_at) >= DATE(NOW()) OR expires_at = '0000-00-00 00:00:00') ORDER BY manual_order DESC  LIMIT 16",{Slice=>{}},$tipono);
    foreach my $p (@$posts){
	   $p->{contents}  =~ s/\n/<br>/g;
    }

    my $tipo = "";
    $tipo = "PROMOCIONES CHIHUAHUA Y ZONA NOROESTE" if($tipono == 1);
    $tipo = "PROMOCIONES JALISCO Y ZONA OCCIDENTE" if($tipono == 2);
    $tipo = "PROMOCIONES NUEVO LEON, COAHUILA Y TAMAULIPAS" if($tipono == 3);
    $tipo = "PROMOCIONES JUAREZ" if($tipono == 4);
    $tipo = "PROMOCIONES DISTRITO FEDERAL Y ZONA SUR" if($tipono == 5);
    $tipo = "PROMOCIONES GUANAJUATO Y ZONA DEL BAJIO" if($tipono == 6);

    my $vars = {
		posts => $posts,
		promociones => $tipo
	       };
    $template->process("tmpl/notas_promos.html", $vars,\$HTML) or $HTML = $template->error();
    return $HTML;
}

sub notas_blog_portada {
    my $HTML = "";
    my $template = Template->new();
    my $notas = $dbh->selectall_arrayref("SELECT id_blog,id_usuario,titulo,fecha,contenido FROM blogs b WHERE publicado=1 ".
					 "ORDER BY b.fecha DESC LIMIT 4 ",{Slice=>{}});
    foreach my $nota(@$notas){
	$nota->{autor} = $dbh->selectrow_array("SELECT nombre FROM usuarios WHERE id_usuario=?",{},$nota->{id_usuario})
    }
    my $vars = {notas => $notas};
    $template->process("tmpl/notas_blog_portada.html", $vars,\$HTML) or $HTML = $template->error();
    return $HTML;
}

sub notas_blog {
    my $HTML = "";
    my $template = Template->new();
    my $notas = $dbh->selectall_arrayref("SELECT id_blog,id_usuario,titulo,DATE_FORMAT(fecha,'%d/%m/%Y') as fecha, contenido FROM blogs b " .
					 "WHERE publicado=1 ORDER BY b.fecha DESC LIMIT 20 ",{Slice=>{}});
    foreach my $nota(@$notas){
	$nota->{autor} = $dbh->selectrow_array("SELECT nombre FROM usuarios WHERE id_usuario=?",{},$nota->{id_usuario})
    }
    my $vars = {notas => $notas};
    $template->process("tmpl/notas_blog.html", $vars,\$HTML) or $HTML = $template->error();
    return $HTML;
}

sub notas_nota {
    my $id_nota = shift || 0;
    my $req_sello = shift || 0;
    my $nota;
    my $HTML = "";
    my $template = Template->new();
    if($req_sello){
    	$nota = $dbh->selectrow_hashref("SELECT n.id_nota,n.titulo, n.intro, n.contenido, n.video, DATE_FORMAT(n.fecha,'%W, %d de %M de %Y, %r') AS fecha,".
					"u.nombre AS autor FROM notas n INNER JOIN usuarios u ON n.id_usuario=u.id_usuario " .
					"WHERE n.id_nota=? AND n.publicado=1 AND n.sello=? ",{},$id_nota,param("s"));
    }else{
    	$nota = $dbh->selectrow_hashref("SELECT n.id_nota,n.titulo, n.intro, n.contenido, n.video, DATE_FORMAT(n.fecha,'%W, %d de %M de %Y, %r') AS fecha, ".
					"u.nombre AS autor FROM notas n INNER JOIN usuarios u ON n.id_usuario=u.id_usuario " .
					"WHERE n.id_nota=? AND n.publicado=1 ",{},$id_nota);
    }
    if(!$nota->{id_nota}){
    	msg_add("error","Nota no existente");
    	return "";
    }
    $nota->{intro}     =~ s/\n/<br>/g;
    $nota->{contenido} =~ s/\n/<br>/g;
    $nota->{fecha} = ucfirst($nota->{fecha});
    $nota->{imgs} = $dbh->selectall_arrayref("SELECT img, titulo FROM notas_img WHERE id_nota=?",{Slice=>{}},$nota->{id_nota});
    my $vars = {
		nota => $nota,
    };
    $dbh->do("UPDATE notas SET hits = hits+1 WHERE id_nota=?",{},$nota->{id_nota});
    #    $dbh->commit();
    $template->process("tmpl/notas_nota.html", $vars,\$HTML) or $HTML = $template->error();
    notas_usadas_agregar($nota->{id_nota});
    return $HTML;
}

sub productos_buscar {
    my $match = shift;
    if (length($match) < 3) {return "Debes ingresar mas de 3 caracteres en el campo de busqueda"};
    my $current = shift || "0";
    my $max = "5";
    my $totalrows = $dbh->selectrow_array("SELECT COUNT(*) FROM productos p INNER JOIN productos_categorias pc ON p.id_producto=pc.id_producto " .
					  "INNER JOIN categorias c ON pc.id_categoria=c.id_categoria WHERE (p.nombre LIKE ? OR p.codigo LIKE ?) AND p.activo=1 ",
					  {},'%'.$match.'%','%'.$match.'%');
    my $totalpages = int($totalrows/$max);

    my $match_length = length($match);

    if ($match =~ /s$/){
	$match = substr($match,0,($match_length)-1);
    }
    my $HTML = "";
    my $template = Template->new();
    my $productos;
    $productos = $dbh->selectall_arrayref("SELECT p.id_producto, p.nombre, p.descripcion, p.foto,c.id_categoria,p.codigo, p.id_prefijo, c.categoria, p.es_nuevo " .
					  "FROM productos p INNER JOIN productos_categorias pc ON p.id_producto=pc.id_producto INNER JOIN categorias c ON ".
					  "pc.id_categoria=c.id_categoria WHERE (p.nombre LIKE ? OR p.codigo LIKE ?) AND p.activo=1 ORDER BY p.nombre LIMIT $current,$max ",
					  {Slice=>{}},'%'.$match.'%','%'.$match.'%');
    foreach my $producto(@$productos){
	$producto->{prefijo} = $dbh->selectrow_array("SELECT prefijo FROM prefijos WHERE id_prefijo=?",{},$producto->{id_prefijo}) || "";
    }

    my @words = split(/\s/,$match);
    my %seen = ();
    foreach my $item (@words) {
    	$seen{$item}++;
    }
    @words = keys %seen;
    my $vars = {
		match => $match,
		current => $current,
		max => $max,
		rowstotals => $totalrows,
		registros => $totalpages,
		productos => $productos,
	       };
    $template->process("tmpl/productos_buscar.html", $vars,\$HTML) or $HTML = $template->error();
    return $HTML;
}


1;
