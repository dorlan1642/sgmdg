package FYF::Com;

use strict;
use CGI qw/:standard/;
use CGI::Carp qw(fatalsToBrowser);
use lib "../../perl-libs/";

use AppConfig;
use DBI;
use Apache::Session::MySQL;
use Date::Language;
use Digest::MD5 qw(md5_hex);
use Number::Format;

BEGIN {
  use Exporter();
  use vars qw( @ISA @EXPORT @EXPORT_OK );
  @ISA = qw( Exporter );
  @EXPORT = qw(
               $dbh
	       $dbhq
               $conf
               $lang
	       %sess
	       $sess_id_user
	       $cookie
	       $NF
	       $ruta
               &msg_add
               &msg_print
               &revisar_rol
               &c_date
		);
}

use vars @EXPORT;

##Configuración
$conf = AppConfig->new({ CREATE=>1,GLOBAL => {ARGCOUNT => 'ARGCOUNT_ONE', EXPAND => 'EXPAND_ALL' } });
$conf->file('conf.pl');
$lang = Date::Language->new('Spanish');
#Configuración FIN

#Base de datos
$dbh = DBI->connect( $conf->DBI_coneccion(), $conf->DBI_usuario(), $conf->DBI_clave(),{RaiseError => 1,AutoCommit=>1}) or die "No puedo conectar a la Base de Datos ";
$dbh->do("SET lc_time_names = 'es_MX'");
$dbh->do("SET CHARACTER SET 'utf8'");
$dbh->do("SET time_zone = '-7:00'");
$dbh->commit();
$dbhq = DBI->connect( $conf->DBIQ_coneccion(), $conf->DBIQ_usuario(), $conf->DBIQ_clave(),{RaiseError => 1,AutoCommit=>1}) or die "No puedo conectar a la Base de Datos ";
$dbhq->do("SET CHARACTER SET 'utf8'");
#Base de datos FIN

$NF = Number::Format->new(THOUSANDS_SEP=>",",DECIMAL_POINT=>".",MON_THOUSANDS_SEP=>",","MON_DECIMAL_POINT"=>".","INT_CURR_SYMBOL"=>'$');

#Configuración Adicional
my $conf_sth = $dbh->prepare("SELECT llave, valor FROM conf WHERE es_comun='1'");
$conf_sth->execute();
while(my $row = $conf_sth->fetchrow_hashref()){
    $conf->define($row->{llave});
    $conf->set($row->{llave},$row->{valor});
}

sub cargar_conf {
    my $grupo = shift || "";
    my $conf_sth = $dbh->prepare("SELECT llave, valor FROM conf WHERE grupo=?");
    $conf_sth->execute($grupo);
    while(my $row = $conf_sth->fetchrow_hashref()){
		$conf->define($row->{llave});
		$conf->set($row->{llave},$row->{valor});
    }
}
#Configuración Adicional FIN

#Sessión
my $session_id;
if (defined $ENV{'HTTP_COOKIE'}){
    my %cookies = map {$_ =~ /\s*(.+)=(.+)/g} ( split( /;/, $ENV{'HTTP_COOKIE'} ) );
    $session_id = $cookies{$conf->SESSION_nombre};
}

eval {
    tie %sess, "Apache::Session::MySQL", $session_id,{
						      Handle     => $dbh,
						      LockHandle => $dbh
	};
};

if ($@) {
    $session_id = "";
    eval{
	    tie %sess, "Apache::Session::MySQL", $session_id,{
			Handle     => $dbh,
   		 	LockHandle => $dbh
		};
    };

    die "No puedo crear datos de sessión de usuario $!" if($@);
}

$sess_id_user = $sess{id_user} || 0;

$cookie = cookie(-name    => $conf->SESSION_nombre,
		 -value   => $sess{_session_id},
		 -expires => "+3d",
 		 -path    => $conf->SESSION_ruta(),
		);
#Sessión FIN


#FUNCIONES
sub header_out {
#    return header(-cookie=>$cookie,-charset=>"ISO-8859-1");
    return header(-cookie=>$cookie,-charset=>"utf-8");
}

sub msg_add {
    my $type = shift;
    my $text = shift;
    $sess{'msg_'.$type} .= "<br>" if ($sess{'msg_'.$type});
    $sess{'msg_'.$type} .= $text;
}

sub msg_print {
    my $HTML = "";
    $HTML .= '<div class="info alert alert-info" id="info">' .
    $sess{'msg_info'} . '</div>' if($sess{msg_info});
    $HTML .= '<div class="error alert alert-error" id="error">' .
    $sess{'msg_error'} . '</div><script type="text/javascript">$(document).ready(function(){var aClose = $("a#cerrarmsg");aClose.each(function(){$(this).click(function(){var aRev = $(this).attr("rev");var aRevCierre = aRev + "_close";if (aRevCierre) {$("#" + aRevCierre).slideUp("slow");}$("#" + aRev).slideUp("slow");return false;});});});</script>' if($sess{msg_error});
    $HTML .= '<div class="help" id="help">' .
    $sess{'msg_help'} . '</div>' if($sess{msg_help});
    $sess{'msg_info'} = "";
    $sess{'msg_error'} = "";
    $sess{'msg_help'} = "";
    return $HTML;
}

sub http_redirect {
    my $dest = shift;
    untie %sess;
    $dbh->disconnect();
# $dbhs->disconnect();
    if($dest =~ /^http/){
      print "Status: 302 Found\nLocation: $dest\n\n";
    }else{
      print "Status: 302 Found\nLocation: " . $conf->SESSION_ruta() . "$dest\n\n";
    }
    exit 0;
}

sub app_end {
    untie %sess;
    $dbh->disconnect();
#    $dbhs->disconnect();
    exit 0;
}

sub fb_select_data{
    my %data = (
		values => [],
		labels => {},
	       );
    my $select = shift || "";
    my $params = shift;
    my $database = shift || "dbh";
    my $sth;
    if($database eq 'dbh'){
	$sth = $dbh->prepare($select);
    }else{
	$sth = $dbhq->prepare($select);
    }
    if($params){
	$sth->execute($params);
    }else{
	$sth->execute();
    }
    while ( my $rec = $sth->fetchrow_hashref() ) {
	push(@{$data{values}},$rec->{id});
	$data{labels}{$rec->{id}} = $rec->{value};
    }

    return %data;
}

sub c_date {
    my $format = shift || "%Y/%m/%d";
    my $time = shift || time();
    return $lang->time2str($format,$time);
}

sub subir_imagen {
	my $cgi_param = shift || "";
	my $dir = shift || "";
	my $filename = param($cgi_param);
	if($filename){
	    my $type = uploadInfo($filename)->{'Content-Type'};
	    my $file = "";
#        msg_add("error",uploadInfo($filename)->{'Content-Type'});
	    if($type eq "image/jpeg" or $type eq "image/x-jpeg"  or $type eq "image/pjpeg"){
			$file = md5_hex($filename) . ".jpg";
	    }elsif($type eq "image/png" or $type eq "image/x-png"){
			$file = md5_hex($filename) . ".png";
	    }elsif($type eq "image/gif" or $type eq "image/x-gif"){
			$file = md5_hex($filename) . ".gif";
	    }else{
			msg_add("error","Solo imagenes jpeg, png y gif son soportadas");
	    }
	    if($file){
			open (OUTFILE,">img\\$dir\\" . $file) or die "$!";
			binmode(OUTFILE);
			my $bytesread;
			my $buffer;
			while ($bytesread=read($filename,$buffer,1024)) {
			    print OUTFILE $buffer;
			}
			close(OUTFILE);
#			msg_add("info","Imagen guardada $file");
			return $file;
	    }
	}
	return "";
}

1;
