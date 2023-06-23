//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#producto_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#producto_form')[0]); 
var codigo_producto= document.getElementById('codigo_producto').value; 
var accion = ''; 
if(codigo_producto === undefined || codigo_producto === ''){ 
accion = '../../controllers/producto.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/producto.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('producto','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('producto','Ocurrió un error al guardar','error');
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
                            $.post('../../controllers/producto.controllers.php?op=eliminar',{codigo_producto:codigo_producto}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('producto', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('producto', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/producto.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.nombre+'</td><td>'+ val.gama+'</td><td>'+ val.dimensiones+'</td><td>'+ val.proveedor+'</td><td>'+ val.descripcion+'</td><td>'+ val.cantidad_en_stock+'</td><td>'+ val.precio_venta+'</td><td>'+ val.precio_proveedor+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.codigo_producto+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.codigo_producto + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.codigo_producto+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tablaproducto').html(html);
                    })
                }
                 
var editar = (codigo_producto) => {
                    
                    jQuery.post('../../controllers/producto.controllers.php?op=uno', {
                        codigo_producto: codigo_producto
                    }, (unproducto) => {
                        unproducto = JSON.parse(unproducto);
document.getElementById('codigo_producto').value = unproducto.codigo_producto;
document.getElementById('nombre').value = unproducto.nombre;
document.getElementById('gama').value = unproducto.gama;
document.getElementById('dimensiones').value = unproducto.dimensiones;
document.getElementById('proveedor').value = unproducto.proveedor;
document.getElementById('descripcion').value = unproducto.descripcion;
document.getElementById('cantidad_en_stock').value = unproducto.cantidad_en_stock;
document.getElementById('precio_venta').value = unproducto.precio_venta;
document.getElementById('precio_proveedor').value = unproducto.precio_proveedor;
 document.getElementById('titleLabelproducto').innerHTML = 'Editar Usuario';
                        jQuery('#modalproducto').modal('show');
                    });
                };
var nuevogama = () =>{ 
 $.post('../../controllers/gama.controllers.php?op=todos', {}, (datos) => {
                            var html = '';
                            datos = JSON.parse(datos);
                            $.each(datos, (index, val) => {
                                html += '<option value=' + val. + '>' + val. + '</option>'
                            });
                            $('#combo_').html(html);
                        }) 
 
} 
var nuevo = () => {
nuevogama();  document.getElementById('titleLabelproducto').innerHTML = 'Nuevo producto';};
var limpiacajas = () => {
document.getElementById('codigo_producto').value = '';
document.getElementById('nombre').value = '';
document.getElementById('gama').value = '';
document.getElementById('dimensiones').value = '';
document.getElementById('proveedor').value = '';
document.getElementById('descripcion').value = '';
document.getElementById('cantidad_en_stock').value = '';
document.getElementById('precio_venta').value = '';
document.getElementById('precio_proveedor').value = '';
document.getElementById('idproducto').value = '';
                        jQuery('#modalproducto').modal('hide');
                        document.getElementById('titleLabelproducto').innerHTML = 'Nuevo producto';};
 init(); 
