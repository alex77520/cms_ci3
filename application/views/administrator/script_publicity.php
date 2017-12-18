<script>
var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table_publi').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url()?>publicity/ajax_list",
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
  
function add_publicity()
{
    save_method = 'add';
    $('#form_publi')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Agregar Publicidad'); // Set Title to Bootstrap modal title

    $('#imag_publi-preview').hide(); // hide slider preview modal

    $('#label-imag_publi').text('Upload Publicidad'); // label slider upload
}

function edit_publicity(id_publicity)
{
    save_method = 'update';
    $('#form_publi')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('publicity/ajax_edit')?>/" + id_publicity,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_publicity"]').val(data.id_publicity);
            $('[name="date"]').datepicker('update',data.date);
            $('[name="description"]').val(data.description);
            $('[name="url_publi"]').val(data.url_publi);
            $('[name="status"]').val(data.status);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar Publicidad'); // Set title to Bootstrap modal title

            $('#imag_publi-preview').show(); // show slider preview modal

            if(data.imag_publi)
            {
                $('#label-imag_publi').text('Cambiar Publicidad'); // label slider upload
                $('#imag_publi-preview div').html('<img src="'+base_url+'upload/'+data.imag_publi+'" class="img-responsive">'); // show slider
                $('#imag_publi-preview div').append('<input type="checkbox" name="remove_imag_publi" value="'+data.imag_publi+'"/> Borrar slider al guardar'); // remove slider

            }
            else
            {
                $('#label-imag_publi').text('Subir Slider'); // label silider upload
                $('#imag_publi-preview div').text('(No hay slider)');
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
        url = "<?php echo site_url('publicity/ajax_add')?>";
    } else {
        url = "<?php echo site_url('publicity/ajax_update')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form_publi')[0]);
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

function delete_publicity(id_publicity)
{
    if(confirm('Estas seguro que quieres ELIMINAR?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('publicity/ajax_delete')?>/"+id_publicity,
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

</script>


</body>
</html>