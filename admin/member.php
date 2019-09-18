<?php
include './partes/header_main.php';
?>
<div class="slim-mainpanel">
  <div class="container">

    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">

      </ol>
      <h6 class="slim-pagetitle">Editar Miembro</h6>
    </div>
    <p class="links float-right">
      <a href="members.php" class="btn btn-sm btn-primary"><i class="icon ion-navicon-round"></i> Lista de Miembros</a>
      <a href="member.php" class="btn btn-primary btn-sm" onclick="openModal();return false;"><span
          class="icon ion-plus"></span>
        Nuevo Miembro</a>
    </p>
    <div class="clearfix"></div>
    <?php
			if (isset($_GET['error'])) {

        echo '<div class="alert alert-danger" id="error1">'.$_GET['error'].'</div>';

			}elseif(isset($_GET['bien'])){
        echo '<div class="alert alert-success" id="bien" role="alert">
        '.$_GET['bien'].'
        </div>';
      }
	?>
    <div class="alert alert-success" id="error" role="alert">

    </div>


    <div class="card">
      <div class="card-body">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a id="users-gral-tab" data-toggle="tab" href="#users-gral" role="tab" aria-controls="gral"
              aria-selected="true" class="nav-link active">Miembro</a>
          </li>
        </ul>
        <br />
        <div class="tab-content">
          <div class="tab-pane show active" id="recipes-gral" role="tabpanel" aria-labelledby="users-gral-tab">


            <form action="./php/membersNew.php" class="" enctype="multipart/form-data" id="formulario" method="POST"
              name="memebers" role="form">
              <div class="form-layout form-layout-3">
                <div class="row no-gutters">


                  <?php 
               			if (isset($_GET['id'])) {
                      echo ' <input id="id" name="id" type="hidden" value=" '. $_GET['id'] .' ">';
                      include './php/conexion.php';
                      
                       
                      $id=$_GET['id'];   							
                      $resultado=$mysqli->query("SELECT name, title ,resume, content  FROM Members WHERE id='$id'") or die ($mysqli->error);
                        while ($fila= mysqli_fetch_array($resultado)) {

                          
                          ?>



                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="title">El nombre para este miembro <span class="tx-danger">*</span></label>
                      <input class="form-control" colmd="6" id="name" name="name" type="text"
                        value="<?php echo $fila['name'];?>" spellcheck="false">

                    </div>
                  </div>

                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="title">El título para este miembro <span class="tx-danger">*</span></label>
                      <input class="form-control" colmd="6" id="title" name="title" type="text"
                        value="<?php echo $fila['title'];?>" spellcheck="false">

                    </div>
                  </div>
                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="title">El resumen para este miembro <span class="tx-danger">*</span></label>
                      <input class="form-control" colmd="6" id="resume" name="resume" type="text"
                        value="<?php echo $fila['resume'];?>" spellcheck="false">

                    </div>
                  </div>
                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="title">Seleccione una imagen para este miembro. Se recomienda que tenga relación de
                        aspecto 1:1 (cuadrado) <span class="tx-danger">*</span></label>
                      <input class="form-control" colmd="6" id="imagen" name="uploadedfile" type="file" value="">

                    </div>
                  </div>

                  <div class="col-md-12 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="description">Contenido </label>
                      <textarea class="form-control" name="content" rows="4" cols="50" id="content">
                        <?php echo $fila['content'];?>
                      </textarea>
                    </div>
                  </div>
                  <?php        
                  }  }else{
                  ?>
                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="title">El nombre para este miembro <span class="tx-danger">*</span></label>
                      <input class="form-control" colmd="6" id="name" name="name" type="text" value=""
                        spellcheck="false">

                    </div>
                  </div>

                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="title">El título para este miembro <span class="tx-danger">*</span></label>
                      <input class="form-control" colmd="6" id="title" name="title" type="text" value=""
                        spellcheck="false">

                    </div>
                  </div>
                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="title">El resumen para este miembro <span class="tx-danger">*</span></label>
                      <input class="form-control" colmd="6" id="resume" name="resume" type="text" value=""
                        spellcheck="false">

                    </div>
                  </div>
                  
                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="title">Seleccione una imagen para este miembro. Se recomienda que tenga relación de aspecto
                        1:1 (cuadrado) <span class="tx-danger">*</span></label>
                      <input class="form-control" colmd="6" id="imagen" name="uploadedfile" type="file" value="">
                    </div>
                  </div>


                  <div class="col-md-12 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="description">Descripción </label>
                      <textarea class="form-control" name="content" rows="4" cols="50" id="content"></textarea>
                    </div>
                  </div>
                  <?php        
                    }
                  ?>

                </div><!-- row -->
                <div class="form-layout-footer bd pd-20 bd-t-0">
                  <input type="hidden" value="" name="_submit" />
                  <button type="submit" class="btn btn-success" data-loading-text="Cargando...">
                    <i class="icon ion-checkmark"></i> Guardar</button>
                  <?php 
                    	if (isset($_GET['id'])) {
                    
                    ?>
                  <button type="submit" class="btn btn-danger"
                    onclick="this.form._submit.value = 'Eliminar';"><i>Eliminar</i></button>
                  <?php 
                      }
                    
                    ?>



                  <a href="members.php" class="btn btn-outline-secondary"><i class="icon ion-arrow-left-a"></i>
                    Regresar</a>

            </form>
          </div><!-- form-group -->
        </div><!-- section-wrapper -->
      </div>

      <div class="tab-pane fade [% IF tab == 'articulos' %]active show[% END %]" id="recipes-products" role="tabpanel"
        aria-labelledby="users-gral-tab">
        <div id="recipes-products" class="tab-pane">[% articles %]</div>
      </div>
    </div>
  </div>
</div>
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="js/summernote.js"></script>
<script src="js/validaciones/val_members.js"></script>
<script>
  $(document).ready(function () {
    $('#summernote').summernote();
  });
</script>
<script type="text/javascript">
  $("#datetime").datetimepicker({
    format: 'yyyy-mm-dd hh:ii',
    autoclose: true,
  });
</script>
</div>
</div>

<?php
include './partes/footer_main.php'
?>