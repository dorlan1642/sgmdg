package FYF::EsqCom;

use strict;
use CGI qw/:standard/;
use CGI::Carp qw(fatalsToBrowser);
use FYF::Com;
use Template;
use Date::Language;

use lib "../perl-libs/";#perl-libs-server

my $lang = Date::Language->new("Spanish");

my $vars = {};

sub print {
    my $HTML = "";
    my $template = Template->new();


    $template->process("tmpl/index.html", $vars,\$HTML) or $HTML = $template->error();
    return FYF::Com::header_out() . $HTML .$sess{id_user};
}

1;
