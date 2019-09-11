#!/usr/bin/perl -w

use strict;
use lib "../../perl-libs/";
use CGI qw/:standard/;
use CGI::Carp qw(fatalsToBrowser);

use FYF::Com;
use FYF::EsqCom;
print FYF::EsqCom::print(screen(),{title => "",
				   description => "",
				   keywords => "",
				   swfinicio => 1,
				  });
FYF::Com::app_end();

sub screen {
    my $HTML = "";
    my $template = Template->new();

    my $vars = {
               };
    $template->process("tmpl/index.html", $vars,\$HTML) or $HTML = $template->error();
    return $HTML;

}