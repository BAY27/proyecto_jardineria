//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#pago_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#pago_form')[0]); 
var codigo_cliente= document.getElementById('codigo_cliente').value; 
var id_transaccion= document.getElementById('id_transaccion').value; 
var accion = ''; 
if(id_transaccion === undefined || id_transaccion === ''){ 
accion = '../../controllers/pago.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/pago.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('pago','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('pago','Ocurrió un error al guardar','error');
                } 
 }})} 
$(document).ready(()=>{ 
 cargaTabla();
}); 
function eliminar(id_transaccion){
                    Swal.fire({
                        title: 'Eliminar!',
                        text: 'Desea Eliminar el Registro?',
                        icon: 'error',
                        confirmButtonText: 'Si',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $.post('../../controllers/pago.controllers.php?op=eliminar',{id_transaccion:id_transaccion}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('pago', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('pago', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/pago.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.forma_pago+'</td><td>'+ val.fecha_pago+'</td><td>'+ val.total+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.id_transaccion+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.id_transaccion + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.id_transaccion+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tablapago').html(html);
                    })
                }
                 
var editar = (id_transaccion) => {
                    
                    jQuery.post('../../controllers/pago.controllers.php?op=uno', {
                        id_transaccion: id_transaccion
                    }, (unpago) => {
                        unpago = JSON.parse(unpago);
document.getElementById('codigo_cliente').value = unpago.codigo_cliente;
document.getElementById('forma_pago').value = unpago.forma_pago;
document.getElementById('id_transaccion').value = unpago.id_transaccion;
document.getElementById('fecha_pago').value = unpago.fecha_pago;
document.getElementById('total').value = unpago.total;
 document.getElementById('titleLabelpago').innerHTML = 'Editar Usuario';
                        jQuery('#modalpago').modal('show');
                    });
                };
var nuevo = () => {
  document.getElementById('titleLabelpago').innerHTML = 'Nuevo pago';};
var limpiacajas = () => {
document.getElementById('codigo_cliente').value = '';
document.getElementById('forma_pago').value = '';
document.getElementById('id_transaccion').value = '';
document.getElementById('fecha_pago').value = '';
document.getElementById('total').value = '';
document.getElementById('idpago').value = '';
                        jQuery('#modalpago').modal('hide');
                        document.getElementById('titleLabelpago').innerHTML = 'Nuevo pago';};
 init(); 
