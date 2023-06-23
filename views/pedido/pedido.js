//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#pedido_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#pedido_form')[0]); 
var codigo_pedido= document.getElementById('codigo_pedido').value; 
var accion = ''; 
if(codigo_pedido === undefined || codigo_pedido === ''){ 
accion = '../../controllers/pedido.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/pedido.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('pedido','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('pedido','Ocurrió un error al guardar','error');
                } 
 }})} 
$(document).ready(()=>{ 
 cargaTabla();
}); 
function eliminar(codigo_pedido){
                    Swal.fire({
                        title: 'Eliminar!',
                        text: 'Desea Eliminar el Registro?',
                        icon: 'error',
                        confirmButtonText: 'Si',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $.post('../../controllers/pedido.controllers.php?op=eliminar',{codigo_pedido:codigo_pedido}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('pedido', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('pedido', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/pedido.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.fecha_pedido+'</td><td>'+ val.fecha_esperada+'</td><td>'+ val.fecha_entrega+'</td><td>'+ val.estado+'</td><td>'+ val.comentarios+'</td><td>'+ val.codigo_cliente+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.codigo_pedido+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.codigo_pedido + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.codigo_pedido+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tablapedido').html(html);
                    })
                }
                 
var editar = (codigo_pedido) => {
                    
                    jQuery.post('../../controllers/pedido.controllers.php?op=uno', {
                        codigo_pedido: codigo_pedido
                    }, (unpedido) => {
                        unpedido = JSON.parse(unpedido);
document.getElementById('codigo_pedido').value = unpedido.codigo_pedido;
document.getElementById('fecha_pedido').value = unpedido.fecha_pedido;
document.getElementById('fecha_esperada').value = unpedido.fecha_esperada;
document.getElementById('fecha_entrega').value = unpedido.fecha_entrega;
document.getElementById('estado').value = unpedido.estado;
document.getElementById('comentarios').value = unpedido.comentarios;
document.getElementById('codigo_cliente').value = unpedido.codigo_cliente;
 document.getElementById('titleLabelpedido').innerHTML = 'Editar Usuario';
                        jQuery('#modalpedido').modal('show');
                    });
                };
var nuevocodigo = () =>{ 
 $.post('../../controllers/codigo.controllers.php?op=todos', {}, (datos) => {
                            var html = '';
                            datos = JSON.parse(datos);
                            $.each(datos, (index, val) => {
                                html += '<option value=' + val.cliente + '>' + val.cliente + '</option>'
                            });
                            $('#combo_cliente').html(html);
                        }) 
 
} 
var nuevo = () => {
nuevocodigo();  document.getElementById('titleLabelpedido').innerHTML = 'Nuevo pedido';};
var limpiacajas = () => {
document.getElementById('codigo_pedido').value = '';
document.getElementById('fecha_pedido').value = '';
document.getElementById('fecha_esperada').value = '';
document.getElementById('fecha_entrega').value = '';
document.getElementById('estado').value = '';
document.getElementById('comentarios').value = '';
document.getElementById('codigo_cliente').value = '';
document.getElementById('idpedido').value = '';
                        jQuery('#modalpedido').modal('hide');
                        document.getElementById('titleLabelpedido').innerHTML = 'Nuevo pedido';};
 init(); 
