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
              <h3 class="box-title">Lista de Noticias</h3>
              <?php $inserted;
              if($inserted==0):?>
              <button class="pull-right btn btn-primary disabled"><i class="glyphicon glyphicon-plus"></i>
                Agregar Noticias
              </button>
          <?php endif; ?>
          <?php if($inserted==1): ?>
             <button class="pull-right btn btn-primary" onclick="add_news()"><i class="glyphicon glyphicon-plus"></i>
                Agregar Noticias
              </button>
          <?php endif; ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table_news" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Redactor</th>
                  <th>Titulo</th>
                  <th>Fecha</th>
                  <th>Imagen</th>
                  <th>Descr. Corta</th>
                  <th>Url</th>
                  <th>Categoría</th>
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


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">News Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_news"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Redactor</label>
                            <div class="col-md-9">
                                <input name="redaction" id="redaction" placeholder="Redactor" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Título</label>
                            <div class="col-md-9">
                                <input name="title" id="title" placeholder="Título" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Url</label>
                            <div class="col-md-9">
                                <input name="url_news" id="url_news" placeholder="Url" class="form-control" type="text">
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
                            <label class="control-label col-md-3">Descripción Corta</label>
                            <div class="col-md-9">
                                <textarea name="description_short" id="description_short" rows="10" cols="80" placeholder="Descripción Corta" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Descripción</label>
                            <div class="col-md-9">
                                <textarea name="description_full" rows="10" cols="80" placeholder="Descripción" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
<!--                         <div class="form-group">
                            <label class="control-label col-md-3">Categoría</label>
                            <div class="col-md-9">
                                <select name="url_news" class="form-control">
                                    <option value="">Seleccione categoría</option>
                                    <option value="male">Economia</option>
                                    <option value="female">Ciencia</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div> -->

                        <div class="form-group" id="news-preview">
                            <label class="control-label col-md-3">Imagen</label>
                            <div class="col-md-9">
                                (No hay imagen)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-news">Subir Imagen </label>
                            <div class="col-md-9">
                                <input name="imag_news" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Categoria</label>
                            <div class="col-md-9">
                                <select name="category" class="form-control">
                                    <option value="">Seleccione Categoria</option>
                                    <?php foreach($category as $row){ ?>
                                    <option value="<?php echo $row->name_cat; ?>" <?php echo set_select('category', $row->id_category); ?>><?php echo $row->name_cat; ?></option>
                                    <?php } ?> 
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Estado</label>
                            <div class="col-md-9">
                                <select name="status" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="0">Desactivado</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->