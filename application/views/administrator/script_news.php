<script>
var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table_news').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url()?>news/ajax_list",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });


  });

function add_news()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Agregar Noticias'); // Set Title to Bootstrap modal title

    $('#news-preview').hide(); // hide news preview modal

    $('#label-news').text('Upload news'); // label news upload
}

function edit_news(id_news)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('news/ajax_edit')?>/" + id_news,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_news"]').val(data.id_news);
            $('[name="redaction"]').val(data.redaction);
            $('[name="title"]').val(data.title);
            $('[name="date"]').datepicker('update',data.date);
            $('[name="description_short"]').val(data.description_short);
            $('[name="description_full"]').val(data.description_full);
            $('[name="url_news"]').val(data.url_news);
            $('[name="category"]').val(data.category);
            $('[name="status"]').val(data.status);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar Noticia'); // Set title to Bootstrap modal title

            $('#news-preview').show(); // show news preview modal

            if(data.imag_news)
            {
                $('#label-news').text('Cambiar Noticia'); // label news upload
                $('#news-preview div').html('<img src="'+base_url+'upload/'+data.imag_news+'" class="img-responsive">'); // show news
                $('#news-preview div').append('<input type="checkbox" name="remove_news" value="'+data.imag_news+'"/> Borrar news al guardar'); // remove news

            }
            else
            {
                $('#label-news').text('Subir news'); // label silider upload
                $('#news-preview div').text('(No hay Imagen)');
            }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('news/ajax_add')?>";
    } else {
        url = "<?php echo site_url('news/ajax_update')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_news(id_news)
{
    if(confirm('Estas seguro que quieres ELIMINAR?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('news/ajax_delete')?>/"+id_news,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}


$(document).ready(function () {
  $("#title").keyup(function () {
      var value = $(this).val();
      $("#url_news").val(value);
  });
});

</script>


</body>
</html>