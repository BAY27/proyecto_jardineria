//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#oficina_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#oficina_form')[0]); 
var codigo_oficina= document.getElementById('codigo_oficina').value; 
var accion = ''; 
if(codigo_oficina === undefined || codigo_oficina === ''){ 
accion = '../../controllers/oficina.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/oficina.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('oficina','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('oficina','Ocurrió un error al guardar','error');
                } 
 }})} 
$(document).ready(()=>{ 
 cargaTabla();
}); 
function eliminar(codigo_oficina){
                    Swal.fire({
                        title: 'Eliminar!',
                        text: 'Desea Eliminar el Registro?',
                        icon: 'error',
                        confirmButtonText: 'Si',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $.post('../../controllers/oficina.controllers.php?op=eliminar',{codigo_oficina:codigo_oficina}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('oficina', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('oficina', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/oficina.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.ciudad+'</td><td>'+ val.pais+'</td><td>'+ val.region+'</td><td>'+ val.codigo_postal+'</td><td>'+ val.telefono+'</td><td>'+ val.linea_direccion1+'</td><td>'+ val.linea_direccion2+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.codigo_oficina+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.codigo_oficina + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.codigo_oficina+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tablaoficina').html(html);
                    })
                }
                 
var editar = (codigo_oficina) => {
                    
                    jQuery.post('../../controllers/oficina.controllers.php?op=uno', {
                        codigo_oficina: codigo_oficina
                    }, (unoficina) => {
                        unoficina = JSON.parse(unoficina);
document.getElementById('codigo_oficina').value = unoficina.codigo_oficina;
document.getElementById('ciudad').value = unoficina.ciudad;
document.getElementById('pais').value = unoficina.pais;
document.getElementById('region').value = unoficina.region;
document.getElementById('codigo_postal').value = unoficina.codigo_postal;
document.getElementById('telefono').value = unoficina.telefono;
document.getElementById('linea_direccion1').value = unoficina.linea_direccion1;
document.getElementById('linea_direccion2').value = unoficina.linea_direccion2;
 document.getElementById('titleLabeloficina').innerHTML = 'Editar Usuario';
                        jQuery('#modaloficina').modal('show');
                    });
                };
var nuevo = () => {
  document.getElementById('titleLabeloficina').innerHTML = 'Nuevo oficina';};
var limpiacajas = () => {
document.getElementById('codigo_oficina').value = '';
document.getElementById('ciudad').value = '';
document.getElementById('pais').value = '';
document.getElementById('region').value = '';
document.getElementById('codigo_postal').value = '';
document.getElementById('telefono').value = '';
document.getElementById('linea_direccion1').value = '';
document.getElementById('linea_direccion2').value = '';
document.getElementById('idoficina').value = '';
                        jQuery('#modaloficina').modal('hide');
                        document.getElementById('titleLabeloficina').innerHTML = 'Nuevo oficina';};
 init(); 
