package FYF::Banners;

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
use lib "../../lib/";

use FYF::Com;

sub banner_index_arriba {
    my $HTML = "";
    my $banner = $dbh->selectrow_hashref("SELECT titulo, url, texto, imagen, width, height, 0 AS swf FROM banners " .
					 "WHERE posicion='index_arriba_derecha' AND publicado=1 ORDER BY RAND() LIMIT 1");
    if($banner->{imagen} =~ /swf$/){
	$banner->{imagen} = '<script type="text/javascript">exoGeneraSWF ("img/banners/'.
	$banner->{imagen}.'", '.$banner->{width}.', '.$banner->{height}.', null);</script>';
    }elsif($banner->{texto}){
	return $banner->{texto};
    }else{
	if($banner->{width} and $banner->{height}){
	    $banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},width=>$banner->{width}, height=>$banner->{height}});
	}elsif($banner->{width} and !$banner->{height}){
	    $banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},width=>$banner->{width}});
	}elsif(!$banner->{width} and $banner->{height}){
	    $banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},height=>$banner->{height}});
	}else{
	    $banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo}});
	}
    }
    my $template = Template->new();
    my $vars = {
	 	banner => $banner,
	       };
    $template->process("tmpl/banner_index_arriba.html", $vars,\$HTML) or $HTML = $template->error();
    return $HTML;
}


sub banners_index_derecha {
    my $HTML = "";
    my $banners = $dbh->selectall_arrayref("SELECT titulo, url, texto, imagen, width, height, 0 AS swf FROM banners " .
					   "WHERE posicion='index_derecha' AND publicado=1 ORDER BY orden LIMIT 10 ",
					   {Slice=>{}});
    foreach my $banner(@$banners){
    	if($banner->{imagen} =~ /swf$/){
	    $banner->{imagen} = '<script type="text/javascript">exoGeneraSWF ("img/banners/'.
	    $banner->{imagen}.'", '.$banner->{width}.', '.$banner->{height}.', null);</script>';
	}elsif($banner->{texto}){
	    $banner->{imagen} = $banner->{texto};
    	}else{
	    if($banner->{width} and $banner->{height}){
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},width=>$banner->{width}, height=>$banner->{height}});
	    }elsif($banner->{width} and !$banner->{height}){
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},width=>$banner->{width}});
	    }elsif(!$banner->{width} and $banner->{height}){
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},height=>$banner->{height}});
	    }else{
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo}});
	    }
    	}
    }
    my $template = Template->new();
    my $vars = {
	 	banners => $banners,
	       };
    $template->process("tmpl/banners_index_derecha.html", $vars,\$HTML) or $HTML = $template->error();
    return $HTML;
}

sub banners_index_derecha_abajo {
    my $HTML = "";
    my $banners = $dbh->selectall_arrayref("SELECT titulo, url, texto, imagen, width, height, 0 AS swf FROM banners " .
					   "WHERE posicion='index_derecha_abajo' AND publicado=1 ORDER BY orden LIMIT 8 ",
					   {Slice=>{}});
    foreach my $banner(@$banners){
    	if($banner->{imagen} =~ /swf$/){
	    $banner->{imagen} = '<script type="text/javascript">exoGeneraSWF ("img/banners/'.
	    $banner->{imagen}.'", '.$banner->{width}.', '.$banner->{height}.', null);</script>';
	}elsif($banner->{texto}){
	    $banner->{imagen} = $banner->{texto};
    	}else{
	    if($banner->{width} and $banner->{height}){
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},width=>$banner->{width}, height=>$banner->{height}});
	    }elsif($banner->{width} and !$banner->{height}){
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},width=>$banner->{width}});
	    }elsif(!$banner->{width} and $banner->{height}){
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},height=>$banner->{height}});
	    }else{
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo}});
	    }
    	}
    }
    my $template = Template->new();
    my $vars = {
	 	banners => $banners,
	       };
    $template->process("tmpl/banners_index_derecha_abajo.html", $vars,\$HTML) or $HTML = $template->error();
    return $HTML;
}

sub banners_centro_abajo {
    my $HTML = "";
    my $banners = $dbh->selectall_arrayref("SELECT titulo, url, texto, imagen, width, height, 0 AS swf FROM banners " .
					   "WHERE posicion='centro_abajo' AND publicado=1 ORDER BY orden LIMIT 10 ",
					   {Slice=>{}});
    foreach my $banner(@$banners){
    	if($banner->{imagen} =~ /swf$/){
	    $banner->{imagen} = '<script type="text/javascript">exoGeneraSWF ("img/banners/'.
	    $banner->{imagen}.'", '.$banner->{width}.', '.$banner->{height}.', null);</script>';
	}elsif($banner->{texto}){
	    $banner->{imagen} = $banner->{texto};
    	}else{
	    if($banner->{width} and $banner->{height}){
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},width=>$banner->{width}, height=>$banner->{height}});
	    }elsif($banner->{width} and !$banner->{height}){
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},width=>$banner->{width}});
	    }elsif(!$banner->{width} and $banner->{height}){
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo},height=>$banner->{height}});
	    }else{
		$banner->{imagen} = (img{src=>"img/banners/".$banner->{imagen},border=>0,alt=>$banner->{titulo}});
	    }
    	}
    }
    my $template = Template->new();
    my $vars = {
	 	banners => $banners,
	       };
    $template->process("tmpl/banners_centro_abajo.html", $vars,\$HTML) or $HTML = $template->error();
    return $HTML;
}

1;
