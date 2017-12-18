<script type="text/javascript">
if (resultado=='res') {
$(function() {
var mensaje="Permiso de vista desabilitado!"
setTimeout(function() {
$.bootstrapGrowl('<h4><i class="icon fa fa-ban"></i> Seguridad!</h4> '+mensaje, { type: 'danger',width: 'auto'});
},1000);
 
});
}	
</script>
