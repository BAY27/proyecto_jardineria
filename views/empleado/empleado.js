//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#empleado_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#empleado_form')[0]); 
var codigo_empleado= document.getElementById('codigo_empleado').value; 
var accion = ''; 
if(codigo_empleado === undefined || codigo_empleado === ''){ 
accion = '../../controllers/empleado.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/empleado.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('empleado','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('empleado','Ocurrió un error al guardar','error');
                } 
 }})} 
$(document).ready(()=>{ 
 cargaTabla();
}); 
function eliminar(codigo_empleado){
                    Swal.fire({
                        title: 'Eliminar!',
                        text: 'Desea Eliminar el Registro?',
                        icon: 'error',
                        confirmButtonText: 'Si',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $.post('../../controllers/empleado.controllers.php?op=eliminar',{codigo_empleado:codigo_empleado}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('empleado', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('empleado', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/empleado.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.nombre+'</td><td>'+ val.apellido1+'</td><td>'+ val.apellido2+'</td><td>'+ val.extension+'</td><td>'+ val.email+'</td><td>'+ val.codigo_oficina+'</td><td>'+ val.codigo_jefe+'</td><td>'+ val.puesto+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.codigo_empleado+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.codigo_empleado + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.codigo_empleado+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tablaempleado').html(html);
                    })
                }
                 
var editar = (codigo_empleado) => {
                    
                    jQuery.post('../../controllers/empleado.controllers.php?op=uno', {
                        codigo_empleado: codigo_empleado
                    }, (unempleado) => {
                        unempleado = JSON.parse(unempleado);
document.getElementById('codigo_empleado').value = unempleado.codigo_empleado;
document.getElementById('nombre').value = unempleado.nombre;
document.getElementById('apellido1').value = unempleado.apellido1;
document.getElementById('apellido2').value = unempleado.apellido2;
document.getElementById('extension').value = unempleado.extension;
document.getElementById('email').value = unempleado.email;
document.getElementById('codigo_oficina').value = unempleado.codigo_oficina;
document.getElementById('codigo_jefe').value = unempleado.codigo_jefe;
document.getElementById('puesto').value = unempleado.puesto;
 document.getElementById('titleLabelempleado').innerHTML = 'Editar Usuario';
                        jQuery('#modalempleado').modal('show');
                    });
                };
var nuevocodigo = () =>{ 
 $.post('../../controllers/codigo.controllers.php?op=todos', {}, (datos) => {
                            var html = '';
                            datos = JSON.parse(datos);
                            $.each(datos, (index, val) => {
                                html += '<option value=' + val.oficina + '>' + val.oficina + '</option>'
                            });
                            $('#combo_oficina').html(html);
                        }) 
 
} 
var nuevocodigo = () =>{ 
 $.post('../../controllers/codigo.controllers.php?op=todos', {}, (datos) => {
                            var html = '';
                            datos = JSON.parse(datos);
                            $.each(datos, (index, val) => {
                                html += '<option value=' + val.jefe + '>' + val.jefe + '</option>'
                            });
                            $('#combo_jefe').html(html);
                        }) 
 
} 
var nuevo = () => {
nuevocodigo();nuevocodigo();  document.getElementById('titleLabelempleado').innerHTML = 'Nuevo empleado';};
var limpiacajas = () => {
document.getElementById('codigo_empleado').value = '';
document.getElementById('nombre').value = '';
document.getElementById('apellido1').value = '';
document.getElementById('apellido2').value = '';
document.getElementById('extension').value = '';
document.getElementById('email').value = '';
document.getElementById('codigo_oficina').value = '';
document.getElementById('codigo_jefe').value = '';
document.getElementById('puesto').value = '';
document.getElementById('idempleado').value = '';
                        jQuery('#modalempleado').modal('hide');
                        document.getElementById('titleLabelempleado').innerHTML = 'Nuevo empleado';};
 init(); 
