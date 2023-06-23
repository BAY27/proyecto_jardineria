//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#detalle_pedido_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#detalle_pedido_form')[0]); 
var codigo_pedido= document.getElementById('codigo_pedido').value; 
var codigo_producto= document.getElementById('codigo_producto').value; 
var accion = ''; 
if(codigo_producto === undefined || codigo_producto === ''){ 
accion = '../../controllers/detalle_pedido.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/detalle_pedido.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('detalle_pedido','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('detalle_pedido','Ocurrió un error al guardar','error');
                } 
 }})} 
$(document).ready(()=>{ 
 cargaTabla();
}); 
function eliminar(codigo_producto){
                    Swal.fire({
                        title: 'Eliminar!',
                        text: 'Desea Eliminar el Registro?',
                        icon: 'error',
                        confirmButtonText: 'Si',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $.post('../../controllers/detalle_pedido.controllers.php?op=eliminar',{codigo_producto:codigo_producto}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('detalle_pedido', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('detalle_pedido', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/detalle_pedido.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.cantidad+'</td><td>'+ val.precio_unidad+'</td><td>'+ val.numero_linea+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.codigo_producto+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.codigo_producto + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.codigo_producto+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tabladetalle_pedido').html(html);
                    })
                }
                 
var editar = (codigo_producto) => {
                    
                    jQuery.post('../../controllers/detalle_pedido.controllers.php?op=uno', {
                        codigo_producto: codigo_producto
                    }, (undetalle_pedido) => {
                        undetalle_pedido = JSON.parse(undetalle_pedido);
document.getElementById('codigo_pedido').value = undetalle_pedido.codigo_pedido;
document.getElementById('codigo_producto').value = undetalle_pedido.codigo_producto;
document.getElementById('cantidad').value = undetalle_pedido.cantidad;
document.getElementById('precio_unidad').value = undetalle_pedido.precio_unidad;
document.getElementById('numero_linea').value = undetalle_pedido.numero_linea;
 document.getElementById('titleLabeldetalle_pedido').innerHTML = 'Editar Usuario';
                        jQuery('#modaldetalle_pedido').modal('show');
                    });
                };
var nuevo = () => {
  document.getElementById('titleLabeldetalle_pedido').innerHTML = 'Nuevo detalle_pedido';};
var limpiacajas = () => {
document.getElementById('codigo_pedido').value = '';
document.getElementById('codigo_producto').value = '';
document.getElementById('cantidad').value = '';
document.getElementById('precio_unidad').value = '';
document.getElementById('numero_linea').value = '';
document.getElementById('iddetalle_pedido').value = '';
                        jQuery('#modaldetalle_pedido').modal('hide');
                        document.getElementById('titleLabeldetalle_pedido').innerHTML = 'Nuevo detalle_pedido';};
 init(); 
