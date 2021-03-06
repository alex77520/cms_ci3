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
              <button class="pull-right btn btn-primary" onclick="add_publicity()"><i class="glyphicon glyphicon-plus"></i>
                Agregar Slider
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table_publi" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Descripción</th>
                  <th>Url</th>
                  <th>Estado</th>
                  <th>Imagen</th>
                  <th>Opciones</th>
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
        <h4 class="modal-title" id="">Agregar Publicidad</h4>
      </div>
      <div class="modal-body form">
            <!-- form start -->
        <form action="#" id="form_publi" class="form-horizontal">
            <input type="hidden" value="" name="id_publicity"/> 
        <div class="form-body">

          <div class="form-group">
              <label class="control-label col-md-3">Fecha</label>
              <div class="col-md-9">
                  <input name="date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
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
                  <input name="url_publi" placeholder="Enlace" class="form-control" type="text">
                  <span class="help-block"></span>
              </div>
          </div>

            <div class="form-group" id="imag_publi-preview">
                <label class="control-label col-md-3">Imagen</label>
                <div class="col-md-9">
                    (No imag_publi)
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" id="label-imag_publi">Upload Imagen </label>
                <div class="col-md-9">
                    <input name="imag_publi" type="file">
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
