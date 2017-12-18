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
              <h3 class="box-title">Lista de Permisos</h3>
              <button class="pull-right btn btn-primary" onclick="add_permission()"><i class="glyphicon glyphicon-plus"></i>
                Agregar Permisos
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table_permission" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Rol</th>
                  <th>Categoría</th>
                  <th>Insertar</th>
                  <th>Leer</th>
                  <th>Actualiza</th>
                  <th>Eliminar</th>
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

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_permissions"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Rol</label>
                            <div class="col-md-9">
                                <select name="id_rol" class="form-control">
                                    <option value="">--Selecione Rol--</option>
                                    <?php foreach($rol as $row){ ?>
                                    <option value="<?php echo $row->id_rol; ?>"<?php echo set_select('rol', $row->id_rol); ?>><?php echo $row->name; ?></option>
                                    <?php } ?> 
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

                <div class="form-group">
                 <label  class="col-sm-3 control-label">Categoria</label>
                  <div class="col-sm-9">
                   <select name="id_category" class="form-control">
                 
                      <?php foreach($categoria as $row){ ?>
                                    <option value="<?php echo $row->name_cat; ?>" <?php echo set_select('category', $row->id_category); ?>><?php echo $row->name_cat; ?></option>
                                    <?php } ?> 
                  </select>
                     <span class="help-block"></span>
                 </div>
                </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3">Insertar</label>
                            <div class="col-md-9">
                                <select name="inserted" class="form-control">
                                    <option value="">--Selecione Insertar--</option>
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Leer</label>
                            <div class="col-md-9">
                                <select name="readed" class="form-control">
                                    <option value="">--Selecione Leer--</option>
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Actualizar</label>
                            <div class="col-md-9">
                                <select name="updated" class="form-control">
                                    <option value="">--Selecione Actualizar--</option>
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Eliminar</label>
                            <div class="col-md-9">
                                <select name="deleted" class="form-control">
                                    <option value="">--Selecione Eliminar--</option>
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->