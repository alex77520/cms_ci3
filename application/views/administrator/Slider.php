  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title; ?>
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>/administrator"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?php echo $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Slider</h3>
              <button class="pull-right btn btn-primary" onclick="add_slider()"><i class="glyphicon glyphicon-plus"></i>
                Agregar Slider
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Titulo</th>
                  <th>Descripción</th>
                  <th>Url</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th style="width:70px;">Opciones</th>
                </tr>
                </thead>
                <tbody>

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>


  <!-- Modal -->
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Slider</h4>
      </div>
      <div class="modal-body form">
            <!-- form start -->
        <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="id_slider"/> 
        <div class="form-body">

          <div class="form-group" id="slider-preview">
              <label class="control-label col-md-3">Imagen</label>
              <div class="col-md-9">
                  (No hay imagen)
                  <span class="help-block"></span>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3" id="label-imag">Cargar Imagen </label>
              <div class="col-md-9">
                  <input name="imag_slide" type="file">
                  <span class="help-block"></span>
              </div>
          </div>
          
          <div class="form-group">
              <label class="control-label col-md-3">Título</label>
              <div class="col-md-9">
                  <input name="title" placeholder="Título" class="form-control" type="text">
                  <span class="help-block"></span>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3">Descrición</label>
              <div class="col-md-9">
                  <input name="description" placeholder="Descrición" class="form-control" type="text">
                  <span class="help-block"></span>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3">Enlace</label>
              <div class="col-md-9">
                  <input name="url_slide" placeholder="Enlace" class="form-control" type="text">
                  <span class="help-block"></span>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3">Fecha</label>
              <div class="col-md-9">
                  <input name="date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                  <span class="help-block"></span>
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-md-3">Estado</label>
              <div class="col-md-9">
                  <select name="status" class="form-control">
                      <option value="1">Activo</option>
                      <option value="0">Desactivo</option>
                  </select>
                  <span class="help-block"></span>
              </div>
          </div>
        </div>
              <!-- /.box-body -->
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
