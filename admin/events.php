<?php
include './partes/header_main.php';
?>
<div class="slim-mainpanel">
  <div class="container">

    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        [% path %]
      </ol>
      <h6 class="slim-pagetitle"> [% action %] Tip</h6>
    </div>
    <p class="links float-right">
      <a href="events.php" class="btn btn-sm btn-primary"><i class="icon ion-navicon-round"></i> Lista de Eventos</a>
      <a href="events.php?action=new" class="btn btn-primary btn-sm" onclick="openModal();return false;"><span
          class="icon ion-plus"></span>
        Nuevo Evento</a>
    </p>
    <div class="clearfix"></div>
    [% msg %]
    <div class="card">
      <div class="card-body">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a id="users-gral-tab" data-toggle="tab" href="#users-gral" role="tab" aria-controls="gral"
              aria-selected="true" class="nav-link active">Evento</a>
          </li> 
        </ul>
        <br />
        <div class="tab-content">
          <div class="tab-pane show active" id="recipes-gral" role="tabpanel" aria-labelledby="users-gral-tab">


            <form action="./php/eventNew.php" class="" enctype="multipart/form-data" id="tips" method="POST" name="events"
               role="form">
              <div class="form-layout form-layout-3">
                <div class="row no-gutters">

                  <input id="id_tip" name="id_tip" type="hidden" value="">

                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="title">El título para este evento <span class="tx-danger">*</span></label>
                      <input class="form-control" colmd="6" id="name" name="name" type="text" value="">

                    </div>
                  </div>

                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="title">El resumen para este evento <span class="tx-danger">*</span></label>
                      <input class="form-control" colmd="6" id="resume" name="resume" type="text" value="">

                    </div>
                  </div>

                  <div class="col-md-12 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="description">Descripción </label>
                      <textarea class="form-control" name="content" rows="4" cols="50" id="summernote">

                </textarea>

                      
                    </div>
                  </div>
                  <div class="col-md-12 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                     
                        <label class="title">Seleccione imagen paraeste evento <span class="tx-danger">*</span></label>
                        <input class="form-control" colmd="6" id="imagen" name="uploadedfile" type="file" value="">
                      </div>
                    
                  </div>



                </div><!-- row -->
                <div class="form-layout-footer bd pd-20 bd-t-0">
                  <input type="hidden" value="" name="_submit" />
                  <button type="submit" class="btn btn-success" data-loading-text="Cargando...">
                    <i class="icon ion-checkmark"></i> Guardar</button>
                  
                  <a href="" class="btn btn-outline-secondary"><i class="icon ion-arrow-left-a"></i> Regresar</a>
                  
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
<script>
  $(document).ready(function () {
    $('#summernote').summernote();
  });
</script>
</div>
</div>

<?php
include './partes/footer_main.php'
?>