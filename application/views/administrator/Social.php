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
              <h3 class="box-title">Lista de Redes Sociales</h3>
              <button class="pull-right btn btn-primary" onclick="add_social()"><i class="glyphicon glyphicon-plus"></i>
                Agregar Redes Sociales
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table_social" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Url</th>
                  <th>Imagen</th>
                  <th>Estado</th>
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
        <h4 class="modal-title" id="">Agregar Redes Sociales</h4>
      </div>
      <div class="modal-body form">
            <!-- form start -->
        <form action="#" id="form_social" class="form-horizontal">
            <input type="hidden" value="" name="id_social"/> 
        <div class="form-body">

          <div class="form-group">
              <label class="control-label col-md-3">Nombre</label>
              <div class="col-md-9">
                  <input name="name_social" placeholder="Nombre" class="form-control" type="text">
                  <span class="help-block"></span>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3">Url Enlace</label>
              <div class="col-md-9">
                  <input name="url_social" placeholder="Url Enlace" class="form-control" type="text">
                  <span class="help-block"></span>
              </div>
          </div>

                        <div class="form-group" id="imag_social-preview">
                            <label class="control-label col-md-3">Imagen</label>
                            <div class="col-md-9">
                                (No imag_social)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-imag_social">Upload Imagen </label>
                            <div class="col-md-9">
                                <input name="imag_social" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>





          <div class="form-group">
              <label class="control-label col-md-3">Estado</label>
              <div class="col-md-9">
                  <select name="status" class="form-control">
                      <option value="0">Activo</option>
                      <option value="1">Desactivo</option>
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
