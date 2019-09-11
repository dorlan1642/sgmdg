package FYF::EsqCom2;

############################################################################
# Autor : José David Romero García
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
use FYF::Com;
use Template;
use Date::Language;

my $lang = Date::Language->new("Spanish");
my $vars = {};

sub print {
    my $HTML = "";
    my $template = Template->new();
    $vars->{fecha}      = uc($lang->time2str("%A, %e DE %B DE %Y %l:%M %p",(time - 7200)));
    $vars->{conf}       = $conf;
    $vars->{contenido}  = (shift || "");
    $vars->{vars}       = (shift || {});
    $vars->{ruta}       = ($ruta || "Mas Promocionales");

    $template->process("tmpl/EsqCom2.html", $vars,\$HTML) or $HTML = $template->error();
    return FYF::Com::header_out() . $HTML;
}

1;
