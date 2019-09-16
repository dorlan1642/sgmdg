<?php
include './partes/header_main.php';
?>
<div class="card">
  <div class="card-body">
  <p class="links float-right">

        <a href="event.php" class="btn btn-primary btn-sm"><span class="icon ion-plus"></span> Nuevo Evento</a>
      </p>
    <div class="clearfix"></div><br>
    <?php
			if (isset($_GET['error'])) {

        echo '<div class="alert alert-danger" id="error1">'.$_GET['error'].'</div>';

			}elseif(isset($_GET['bien'])){
        echo '<div class="alert alert-success"id="bien" role="alert">
        '.$_GET['bien'].'
        </div>';
      }
	?>


    <div class="table-responsive">
      <!-- Created with CGI::List -->
      <table cellpadding="0" cellspacing="0"
        class="cg_table table table-bordered table-colored table-primary table-hover thead-dark" id="cg_table_cg_list"
        style="margin:0;" width="100%">
        <thead>
          <tr>
            <th align="center">Foto </th>
            <th align="center">Título </th>
            <th align="center">Resume </th>
            <th align="center">Fecha</th>
          </tr>
        </thead>
        <tbody>

            <?php  
            
              
              include './php/conexion.php';      							
							$resultado=$mysqli->query("select id, name, resume, content, DATE_FORMAT(date_event,'%d-%m-%Y') as date_event, url_img from Events")or die ($mysqli->error);
								while ($fila= mysqli_fetch_array($resultado)) {

								
						 ?>
          <tr class="cg_row_a" onclick="document.location.href='event.php?id=<?php echo $fila['id']; ?>';">
            <td align="left"><img src="../img/img_events/<?php echo $fila['url_img']; ?>" alt=" " width="60" height="60"></td>
            <td align="left"><?php echo $fila['name']; ?></td>
            <td align="left"><?php echo $fila['resume']; ?></td>
            <td align="center"><?php echo $fila['date_event']; ?></td>
          </tr>
              <?php
                }
              ?>
        </tbody>
      </table>
      <script type="text/javascript">
        var cg_table_cg_list = document.getElementById('cg_table_cg_list');
        for (var i = 0; i < cg_table_cg_list.rows.length; i++) {
          cg_row_class_name = cg_table_cg_list.rows[i].className;
          if (cg_row_class_name.substring(0, 7) == "cg_row_") {
            cg_table_cg_list.rows[i].onmouseover = function () { this.className = this.className + '_hover'; };
            cg_table_cg_list.rows[i].onmouseout = function () { this.className = this.className.replace('_hover', ''); };
          }
        }
      </script>
    </div>
  </div>
</div>

<?php
include './partes/footer_main.php'
?>