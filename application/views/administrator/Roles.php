  
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title; ?>
      <small>Panel de Control</small>
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
              <h3 class="box-title">Lista de Roles</h3>
              <button class="pull-right btn btn-primary" onclick="add_rol()"><i class="glyphicon glyphicon-plus"></i>
                Agregar Roles
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table_rol" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
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
        <h4 class="modal-title" id="myModalLabel">Agregar Roles</h4>
      </div>
      <div class="modal-body form">
            <!-- form start -->
        <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="id_rol"/> 
        <div class="form-body">
          <div class="form-group">
              <label class="control-label col-md-3">Nombre de Rol</label>
              <div class="col-md-9">
                  <input name="name" placeholder="Nombre de Rol" class="form-control" type="text">
                  <span class="help-block"></span>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3">Descripción</label>
              <div class="col-md-9">
                  <textarea name="description" placeholder="Descripción" class="form-control"></textarea>
                  <span class="help-block"></span>
              </div>
          </div>
        </div>
              <!-- /.box-body -->
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
