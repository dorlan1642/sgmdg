package FYF::Utils;

use strict;
use CGI qw/:standard -no_xhtml/;
use CGI::Carp qw(fatalsToBrowser);

use FYF::Com;

BEGIN {
  use Exporter();
  use vars qw( @ISA @EXPORT @EXPORT_OK );
  @ISA = qw( Exporter );
  @EXPORT = qw(
		  &paginate
	     );
}

use vars @EXPORT;

sub paginate {
    my $adjacents = shift || 2;
    my $limit = shift || 6;
    my $page = shift || 0;
    my $script = shift || "";
    my $totalrows = shift || 0;
    my $extra = shift | ""; #ej. &param=val&param2=val2

    $page = 1 if($page == 0 or !$page);

    my $prev = $page - 1;
    my $next = $page + 1;
    my $lastpage = int(($totalrows/$limit)+0.99);#we need to ceil the number to the next maximum int to integrate all records
    my $lpm1 = $lastpage - 1;#ultima pagina menos 1

    my $pagination = "";
    my $counter = 0;

    if($lastpage > 1){
	# $pagination .= "<div class='pagination'><span class='registros'>PAGINA $page DE $lastpage</span>";
    $pagination .= "<div class='pagination'><span class='registros'></span>";
 	#Boton anterior
 	if($page > 1){
 	    $pagination .= "<a href='$script?page=$prev".$extra."' class='anterior'>ANTERIOR</a>";

 	}else{
 	    # $pagination .= "<a href='$script?page=$prev".$extra."' class='anterior'>ANTERIOR</a>";

 	}

 	#Paginas
 	if($lastpage < 7 + ($adjacents * 2)){#No hay espacio para cortar pagination
 	    for($counter = 1;$counter <= $lastpage; $counter++){
 		if($counter == $page){
             # $pagination .= "<span class='current'>$counter</span>";
 		    $pagination .= " <a  id='activo' href='$script?page=$counter".$counter."'>$counter</a> ";
 		}else{
 		    $pagination .= "<a href='$script?page=$counter".$extra."'>$counter</a>"
 		}
 	    }
 	}elsif($lastpage > 5 + ($adjacents * 2)){#Suficiente espacio para esconder algunos items
 	    #Esconder ultimas paginas
 	    if($page < 1 + ($adjacents * 2)){
 		for($counter = 1;$counter < 4 +($adjacents * 2);$counter++){
 		    if($counter == $page){
             $pagination="<a  id='activo' href='$script?page=$counter".$counter."'>$counter</a> ";
 			# $pagination .= "<span class='current'>$counter</span>";
 		    }else{
 			$pagination .= "<a href='$script?page=$counter".$extra."'>$counter</a>"
 		    }
 		}
 		$pagination .= "...";
 		$pagination .= "<a href='$script?page=$lpm1".$extra."'>$lpm1</a>";
 		$pagination .= "<a href='$script?page=$lastpage".$extra."'>$lastpage</a>";
 	    }elsif(($lastpage - ($adjacents * 2) > $page and $page > ($adjacents * 2))){
 		#Esconder algunos del principio y del fin
 		$pagination .= "<a href='$script?page=1".$extra."'>1</a>";
 		$pagination .= "<a href='$script?page=2".$extra."'>2</a>";
 		$pagination .= "...";
 		for($counter = $page - $adjacents;$counter <= $page + $adjacents;$counter++){
 		    if($counter == $page){
 			# $pagination .= "<span class='current'>$counter</span>";
            $pagination.="<a  id='activo' href='$script?page=$counter".$counter."'>$counter</a>"
 		    }else{
 			$pagination .= "<a href='$script?page=$counter".$extra."'>$counter</a>"
 		    }
 		}
 		$pagination .= "...";
 		$pagination .= "<a href='$script?page=$lpm1".$extra."'>$lpm1</a>";
 		$pagination .= "<a href='$script?page=$lastpage".$extra."'>$lastpage</a>";
 	    }else{
 		$pagination .= "<a href='$script?page=1".$extra."'>1</a>";
		$pagination .= "<a href='$script?page=2".$extra."'>2</a>";
 		$pagination .= "...";
 		for($counter = $lastpage - (2 + ($adjacents * 2));$counter <= $lastpage;$counter++){
 		    if($counter == $page){
 			# $pagination .= "<span class='current'>$counter</span>";
             $pagination.="<a  id='activo' href='$script?page=$counter".$counter."'>$counter</a>"
 		    }else{
 			$pagination .= "<a href='$script?page=$counter".$extra."'>$counter</a>"
 		    }
 		}
 	    }
 	}#END Paginas
 	if ($page < $counter - 1){
 	     $pagination .= "<a href='$script?page=$next".$extra."' class='siguiente'>SIGUIENTE</a>"

 	}else{
 	    #$pagination .= "<span class='disabled siguiente'>SIGUIENTE</span>"
	}
	$pagination .= "</div>\n";
    }
    return $pagination;
}

sub get_menu {
    my $HTML = "";
    my $template = Template->new();

    my $categories = $dbhq->selectall_arrayref("SELECT id_category, category FROM categories WHERE active=1 ORDER BY category",{Slice=>{}});

    my $vars = {
		categories => $categories,
	       };
    $template->process("tmpl/get_menu.html", $vars,\$HTML) or $HTML = $template->error();

    return $HTML;
}

sub get_tmpl {
    my $tmpl = shift;
    my $HTML; my $template = Template->new();
    $template->process("tmpl/get_".$tmpl.".html", "",\$HTML) or $HTML = $template->error();
    return $HTML;
}

sub get_cookie {
    my (@cookies, %return_cookie, $cookie, $key, $val);
    @cookies = split (/; /,$ENV{'HTTP_COOKIE'});
    foreach $cookie (@cookies){
	($key, $val) = split (/=/,$cookie);
	$return_cookie{$key} = $val;
    }
    return (%return_cookie);
}
sub check_is_accesible_image {
  my $current_img = shift||'';
  use LWP::Simple qw(head);
  my $url ="./img/productos/".$current_img;
  if (-e $url) {

  } else {
    $current_img='nodisponible.png';
  }
  return $current_img;
}

sub email_format {
  my $title = shift || "";
  my $content = shift || "";
  my $link = shift || "";
  my $link_text = shift || "";
  my $firma=shift||"";
  my $content2 = shift || "";
  my $id_system = 1;

  my $img = '<img src="http://maspromocionales.com/qos/img/logoemail.png" width="180" height="72" border="0" alt="Mas Promocionales" style="display: block; margin:0 auto; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px; width: 180px; height: 72px;"/>';



  my $footerlink = 'Mas Promocionales - <a href="http://www.maspromocionales.com" target="_blank" style="color:#428bca;">http://www.maspromocionales.com</a>';


  my $HTML = '
  <!DOCTYPE html>
  <html lang="en"><head><title>Maspromocionales</title><meta charset="utf-8"><meta name="viewport" content="width=device-width"></head><body style="margin: 0; padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td style="text-align:center;">
       '.$img.'
       </td>
       </tr>
      <tr>
      <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">'.$title.'</td>
      </tr>
      <tr>
      <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">'.$content.'</td>
      </tr>
      </table>';

      $HTML.='<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
      <tr>
      <td align="center" style="padding: 25px 0 0 0;" class="padding-copy">
      <table border="0" cellspacing="0" cellpadding="0" class="responsive-table">
      <tr>
      <td align="center"><a href="'.$link.'" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #ffffff; text-decoration: none; background-color: #D92D48; border-top: 10px solid #D92D48; border-bottom: 10px solid #D92D48; border-left: 20px solid #D92D48; border-right: 20px solid #D92D48; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; display: inline-block;" class="mobile-button">'.$link_text.' &rarr;</a></td>
      </tr>
      </table>'if($link);

    $HTML .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy"><br />'.$content2.'</td>
    </tr>

    </table>' if($content2);


  

    $HTML.='<table width="500" border="0" cellspacing="0" cellpadding="0" align="center" class="responsive-table">
    <tr>
    <td align="center" valign="middle" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
    <span class="appleFooter" style="color:#666666;">&copy; '.$footerlink.'</span><br>
    <span class="original-only" style="font-family: Arial, sans-serif; font-size: 12px; color: #aaa;">Esta es una notificacion automatica, favor de no contestar</span>
    </td>
    </tr>
    </table>';
    $HTML.='</body>
    </html>';

    return $HTML;
  }




1;
