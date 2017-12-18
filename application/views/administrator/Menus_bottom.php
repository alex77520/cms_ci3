  
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
              <h3 class="box-title">Lista de Menu</h3>
              <button class="pull-right btn btn-primary" onclick="add_menus_bottom()"><i class="glyphicon glyphicon-plus"></i>
                Agregar Menu Principal
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nombre de Menu</th>
                  <th>Icono</th>
                  <th>Url</th>
                  <th>Posición</th>
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
        <h4 class="modal-title" id="myModalLabel">Agregar Menu Principal</h4>
      </div>
      <div class="modal-body form">
            <!-- form start -->
        <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="id"/> 
        <div class="form-body">

          <div class="form-group">
              <label class="control-label col-md-3">Nombre de Menu</label>
              <div class="col-md-9">
                  <input name="name" placeholder="Nombre de Menu" class="form-control" type="text">
                  <span class="help-block"></span>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3">Icono</label>
              <div class="col-md-9">
                  <input name="icon" placeholder="Icono" class="form-control" type="text">
                  <span class="help-block"></span>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Categoria</label>
            <div class="col-md-9">
                <select name="slug" class="form-control">
                    <option value="">Seleccione Categoria</option>
                    <?php foreach($category as $row){ ?>
                    <option value="<?php echo 'categoria/'.$row->url_category; ?>" <?php echo set_select('category', $row->url_category); ?>><?php echo $row->name_cat; ?></option>
                    <?php } ?> 
                </select>
                <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3">Posición</label>
              <div class="col-md-9">
                  <input name="number" placeholder="Posición" class="form-control" type="text">
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
