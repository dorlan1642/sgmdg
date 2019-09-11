package FYF::Utils;

use strict;
use CGI qw/:standard -no_xhtml/;
use CGI::Carp qw(fatalsToBrowser);

use FYF::Com;

use lib "/home/37407/data/modules/lib/perl/5.10.1/";
use JSON::XS;

sub get_delivery_days {
    my $id_system = shift || 0;
    my $jsonobjects = $dbh->selectrow_array("SELECT jsonobjects FROM systems WHERE id_system=?",{}, $id_system);
    my $objects = JSON::XS->new->utf8->decode($jsonobjects);
    return $objects->{delivery_days} || 0;
}

sub email_tmpl {
    my $title = shift || "";
    my $content = shift || "";
    my $link = shift || "";
    my $link_text = shift || "";
    my $content2 = shift || "";
    my $id_system = shift || $sess{id_system};

    my $img = '<a href="http://www.maspromocionales.com" target="_blank"><img src="http://maspromocionales.com/qos/img/logoemail.png" width="180" height="72" border="0" alt="Mas Promocionales" style="display: block; margin:0 auto; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px; width: 180px; height: 72px;" class="img-max"></a>';
    $img = '<a href="http://www.epromocionales.com" target="_blank"><img src="http://maspromocionales.com/qos/img/logoemaile.png" width="68" height="90" border="0" alt="E Promocionales" style="display: block; margin:0 auto; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px; width: 68px; height: 90px;" class="img-max"></a>' if($id_system == 4);

    my $footerlink = 'Mas Promocionales - <a href="http://www.maspromocionales.com" target="_blank" style="color:#428bca;">http://www.maspromocionales.com</a>';
    $footerlink = 'E Promocionales - <a href="http://www.epromocionales.com" target="_blank" style="color:#428bca;">http://www.epromocionales.com</a>' if($id_system == 4);

    my $HTML = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Mas Promocionales</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <style type="text/css">
        /* CLIENT-SPECIFIC STYLES */
        #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
        .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
        body, table, td, a{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
        table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
        img{-ms-interpolation-mode:bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

        /* RESET STYLES */
        body{margin:0; padding:0;}
        img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
        table{border-collapse:collapse !important;}
        body{height:100% !important; margin:0; padding:0; width:100% !important;}

        /* iOS BLUE LINKS */
        .appleBody a {color:#68440a; text-decoration: none;}
        .appleFooter a {color:#999999; text-decoration: none;}

        /* MOBILE STYLES */
        @media screen and (max-width: 525px) {

            /* ALLOWS FOR FLUID TABLES */
            table[class="wrapper"]{
              width:100% !important;
            }

            /* ADJUSTS LAYOUT OF LOGO IMAGE */
            td[class="logo"]{
              text-align: left;
              padding: 20px 0 20px 0 !important;
            }

            td[class="logo"] img{
              margin:0 auto!important;
            }

            /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
            td[class="mobile-hide"]{
              display:none;}

            img[class="mobile-hide"]{
              display: none !important;
            }

            img[class="img-max"]{
              max-width: 100% !important;
              height:auto !important;
            }

            /* FULL-WIDTH TABLES */
            table[class="responsive-table"]{
              width:100%!important;
            }

            /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
            td[class="padding"]{
              padding: 10px 5% 15px 5% !important;
            }

            td[class="padding-copy"]{
              padding: 10px 5% 10px 5% !important;
              text-align: center;
            }

            td[class="padding-meta"]{
              padding: 30px 5% 0px 5% !important;
              text-align: center;
            }

            td[class="no-pad"]{
              padding: 0 0 20px 0 !important;
            }

            td[class="no-padding"]{
              padding: 0 !important;
            }

            td[class="section-padding"]{
              padding: 50px 15px 50px 15px !important;
            }

            td[class="section-padding-bottom-image"]{
              padding: 50px 15px 0 15px !important;
            }

            /* ADJUST BUTTONS ON MOBILE */
            td[class="mobile-wrapper"]{
                padding: 10px 5% 15px 5% !important;
            }

            table[class="mobile-button-container"]{
                margin:0 auto;
                width:100% !important;
            }

            a[class="mobile-button"]{
                width:80% !important;
                padding: 15px !important;
                border: 0 !important;
                font-size: 16px !important;
            }

        }
    </style>
    </head>
    <body style="margin: 0; padding: 0;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td bgcolor="#ffffff" align="center" style="padding: 20px 15px 70px 15px;" class="section-padding">
                <table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                 <tr>
                                                      <td class="padding-copy">
                                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                  <td style="text-align:center;">
                                                                      '.$img.'
                                                                  </td>
                                                                </tr>
                                                            </table>
                                                      </td>
                                                  </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">'.$title.'</td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">'.$content.'</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>';
    $HTML .= '
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                            <tr>
                                                <td align="center" style="padding: 25px 0 0 0;" class="padding-copy">
                                                    <table border="0" cellspacing="0" cellpadding="0" class="responsive-table">
                                                        <tr>
                                                            <td align="center"><a href="'.$link.'" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #ffffff; text-decoration: none; background-color: #D92D48; border-top: 10px solid #D92D48; border-bottom: 10px solid #D92D48; border-left: 20px solid #D92D48; border-right: 20px solid #D92D48; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; display: inline-block;" class="mobile-button">'.$link_text.' &rarr;</a></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>' if($link);
    $HTML .= '                  <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy"><br />'.$content2.'</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>' if($content2);
    $HTML .= '              </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td bgcolor="#f8f8f8" align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td style="padding: 20px 0px 20px 0px;">
                            <table width="500" border="0" cellspacing="0" cellpadding="0" align="center" class="responsive-table">
                                <tr>
                                    <td align="center" valign="middle" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                                        <span class="appleFooter" style="color:#666666;">&copy; '.$footerlink.'</span><br>
                                        <span class="original-only" style="font-family: Arial, sans-serif; font-size: 12px; color: #aaa;">Esta es una notificacion automatica, favor de no contestar</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    </body>
    </html>';

    return $HTML;
}

sub client_clasification {
    my $id_client = shift || return 0;
    my ($purchases_total, $purchases) = $dbh->selectrow_array("SELECT SUM(total), COUNT(id_order) FROM orders WHERE id_client=? AND status<2 AND created_at BETWEEN DATE_SUB(NOW(), INTERVAL 12 MONTH) AND NOW()",{},$id_client);
    my $important_dates = $dbh->selectrow_array("SELECT COUNT(*) FROM quotes_clients_important_dates WHERE id_client=? AND event_date >= NOW()",{},$id_client);
    my $client_card_requirements = $dbh->selectrow_array("SELECT COUNT(*) FROM quotes_clients c WHERE id_client=? AND firstname!='' AND lastname_father!='' AND birthday!='' AND source!='' AND  anniversary!='0000-00-00 00:00:00' AND email!='' AND company!='' AND job!='' AND sector!='' AND business_name!='' AND rfc!='' AND title!='' AND telephone_lada!='' AND telephone_number!='' AND address!='' AND colony!='' AND city!='' AND state!='' AND cp!='' AND last_contact!='0000-00-00 00:00:00' AND conditions!='' AND active=1 AND c.type!=''",{},$id_client) || 0;
    my $newtype = "";
    

     #cambio jovany diego 24 junio 
    # if ($purchases_total>=1000000) {
    #     $newtype="AAA";
    # }elsif($purchases_total>=650000){
    #         $newtype="AA";
    # }
    # elsif($purchases_total >= 350000 and $purchases >= 3 and $important_dates >= 2 and $client_card_requirements){#
    #     # antes 250000
    #     Clasificacion A
    #     $newtype = "A";
    #     #antes 150000
    # }elsif($purchases_total >= 250000 and $purchases >= 2 and $important_dates >= 2 and $client_card_requirements){#Clasificacion B
    #     $newtype = "B";
    #     #antes 100000
    # }elsif($purchases_total >= 150000 and $purchases >= 1){#Clasificacion C
    #     $newtype = "C";
    # }else{#Clasificacion S/C
    #    # antes s/c 
    #     $newtype = "D";
    # }
   
if ($purchases_total >= 1000000) {
        $newtype="AAA";
    }elsif($purchases_total>=650000){
            $newtype="AA";
    }
    elsif($purchases_total >= 350000 ){#
        # antes 250000
        Clasificacion A
        $newtype = "A";
        #antes 150000
    }elsif($purchases_total >= 250000 ){#Clasificacion B
        $newtype = "B";
        #antes 100000
    }elsif($purchases_total >= 150000 ){#Clasificacion C
        $newtype = "C";
    }else{#Clasificacion S/C
       # antes s/c 
        $newtype = "D";
    }
    #termina cambio jovany diego 24 junio 2015

    eval {
        $dbh->do("UPDATE quotes_clients SET quotes_clients.type=? WHERE id_client=?",{},$newtype, $id_client);
    };
    if($@){
        $dbh->rollback();
    }else{
        $dbh->commit();
    }
    return 1;
}

sub send_birthday_email {
    my $subject = shift || "";
    my $contents = shift || "";
    my $client = shift || "";
    my $img = shift || "";
    my $email = shift || "";
    
    use Mail::Sender;
    eval {
        my $sender = new Mail::Sender {
            from => 'info@maspromocionales.com',
        	smtp => 'smtp.mandrillapp.com',
        	auth => "login",
        	port => "587",
        	authid => 'apps@exosoluciones.com',
        	authpwd => "8K2AeCaZJJVZmhlaqu16bA",
        	on_errors => 'die'
        };
        $contents =~ s/\n/<br>/g;

        my $content = "<style>* {font-family:Arial, sans-serif;font-size:14px;text-align:center;}</style>";
        $content .= '<table width=600>';
        $content .= '<tr><td><img src="./img/birthdays/'.$img.'" alt="" style="display:block;margin:0 auto 10px;"></td></tr>' if($img);
        $content .= '<tr><td><h1 style="color:#444;text-align:center;font-family:Arial, sans-serif;"> ¡ Feliz Cumpleanos '.$client.' ! </h1></td></tr>';
        $content .= '<tr><td><h2 style="color:#444;font-weight:normal;text-align:center;font-family:Arial, sans-serif;">' . $contents . '</h2></td></tr>';
        $content .= '</table>';

        $sender->Open({subject => $subject, to => $email, ctype=>"text/html",encoding=>"quoted-printable"});
        $sender->SendLineEnc($content);
        $sender->Close();

          $sender->Open({subject => $subject, to => 'jovany.diego@gmail.com', ctype=>"text/html",encoding=>"quoted-printable"});
        $sender->SendLineEnc($content);
        $sender->Close();
    };
    if($@){return $@;}else{return 1;}
}



sub send_expiredPost_email {
    my $subject_msg = shift || "";
    my $content_msg = shift || "";
    my $to_people = shift || "";
    
    use Mail::Sender;
    
    eval {
        my $sender = new Mail::Sender {
            from => 'info@maspromocionales.com',
            smtp => 'smtp.mandrillapp.com',
            auth => "login",
            port => "587",
            authid => 'apps@exosoluciones.com',
            authpwd => "8K2AeCaZJJVZmhlaqu16bA",
            on_errors => 'die'
        };
        
        $content_msg =~ s/\n/<br>/g;
        
        my $content = "<style>* {font-family:Arial, sans-serif;font-size:14px;text-align:center;}</style><table width=600><tr><td>" . $content_msg . "</td></tr></table>";
        
        $sender->Open({subject => $subject_msg, to => $to_people, ctype=>"text/html",encoding=>"quoted-printable"});
        $sender->SendLineEnc($content);
        $sender->Close();
        
        $sender->Open({subject => $subject_msg, to => 'jovany.diego@gmail.com', ctype=>"text/html",encoding=>"quoted-printable"});
        $sender->SendLineEnc($content);
        $sender->Close();
        
    };
    if($@){return $@;}else{return 1;}
}

1;
