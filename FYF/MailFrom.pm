package FYF::MailFrom;

use strict;
use Mail::Sender;
use FYF::Com;

sub new{
    my $class       = shift;
    my $self = {};
    bless $self,$class;
    FYF::Com::cargar_conf("MAIL");
    $self->{server} = $conf->MAIL_SERVER;
    $self->{port}   = $conf->MAIL_PORT;
    $self->{auth}   = $conf->MAIL_AUTH;
    $self->{user}       = $conf->MAIL_USER;
    $self->{password}   = $conf->MAIL_PASSWORD;
    return $self;
}

sub message {
    my $self = shift;
    my $data = shift;
    $self->sender();
    if($self->{sender}->MailMsg({to      => $data->{to},
				 bcc	=> $data->{bcc},
				 from => $data->{from},
				 subject => $data->{subject},
				 msg     => $data->{msg}}) < 0){
	   return $Mail::Sender::Error;
    }else{
	   return "Correo Enviado a ".$data->{to};
    }
}

sub sender {
    my $self = shift;
    if($self->{auth}){
    	$self->{sender} = new Mail::Sender
    	{smtp => $self->{server},
    	 port => $self->{port},
    	 from => $self->{from},
    	 auth => $self->{auth},
    	 authid => $self->{user},
    	 authpwd => $self->{password}};
    }else{
    	$self->{sender} = new Mail::Sender
    	{smtp => $self->{server}, port => $self->{port}, from => $self->{from}};
    }
}

1;
