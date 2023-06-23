var init = () => {
    $('#empleado_form').on('submit', (e) => {
        guardaryeditar(e);
    })
}
$().ready(() => {
    cargaTabla();
});
var guardaryeditar = async (e) => {
    e.preventDefault();
    var ultimoRegistro ='';
    await $.post('../../Controllers/empleado.controllers.php?op=ultimoRegistro', async (ultimocodigo) => {
        ultimocodigo = JSON.parse(ultimocodigo);
        if (parseInt(ultimocodigo.codigo_empleado) <= 0) {
            return ("error");
        }
        ultimoRegistro = ultimocodigo.codigo_empleado;
    });

    if (ultimoRegistro === 'error') {
        Swal.fire('Empleados', 'Ocurrió un error al guardar');
    } else {
        var formData = new FormData($('#empleado_form')[0]);
        var codigo_empleado = document.getElementById('codigo_empleado').value;
        var url = '';
        if (codigo_empleado === undefined || codigo_empleado === '') {
            url = '../../Controllers/empleado.controllers.php?op=insertar';
            ultimoRegistro = JSON.parse(ultimoRegistro);
            formData.append('codigo_empleado', (parseInt(ultimoRegistro) + 1))
        } else {
            url = '../../Controllers/empleado.controllers.php?op=actualizar';
        }
      
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: (res) => {
                console.log(res);
                res = JSON.parse(res);
                if (res == 'ok') {
                    Swal.fire('Empleado', 'Se guardo con exito', 'success');
                    cargaTabla();
                    limpiacajas();
                }else{
                    Swal.fire('Empleado','Error al guardar','danger')
                }

            }

        })
    }


}
var ultimoRegistro = () => {
    return new Promise((resolver, reject)=>{
        
    });
    
}
var cargaTabla = () => {
    $.post('../../Controllers/empleado.controllers.php?op=todos', (listaEmpleados) => {
        var html = '';
        listaEmpleados = JSON.parse(listaEmpleados);
        $.each(listaEmpleados, (index, empleado) => {
            html += `<tr>
            <td>${
                index + 1
            } </td>
            <td>${
                empleado.nombre
            }  ${
                empleado.apellido1
            }  ${
                empleado.apellido2
            }</td>
            <td>${
                empleado.puesto
            }</td>
            <td>
            <button class="btn btn-outline-success" onclick="editar('${
                empleado.codigo_empleado
            }')">
            Editar
            </button>
            <button class="btn btn-outline-danger" onclick="eliminar('${
                empleado.codigo_empleado
            }')">
            Eliminar
            </button>
            `;
        })
        $('#tablaempleado').html(html);

    })
}

var cargaOficina = () => {
    var html = '<option value=0>Seleccione una oficina</option>';
    $.post('../../Controllers/oficina.controllers.php?op=todos', (listaoficinas) => {
        listaoficinas = JSON.parse(listaoficinas);
        $.each(listaoficinas, (index, oficina) => {
            html += `<option value='${
                oficina.codigo_oficina
            }'> ${
                oficina.ciudad
            }</option>`;
        })
        $('#combo_oficina').html(html)
    })
}
var cargaJefe = (combo_oficina) => {
    var codigo_oficina = combo_oficina.value;
    var html = '<option value=0>Seleccione una persona</option>';
    var html2 = '<option value=0>Seleccione una persona</option>';

    $.post('../../Controllers/empleado.controllers.php?op=filtroOficina', {
        codigo_oficina: codigo_oficina
    }, (listaEmpleados) => {
        listaEmpleados = JSON.parse(listaEmpleados);
        $.each(listaEmpleados, (index, empleado) => {
            html += `<option value='${
                empleado.codigo_jefe
            }'> ${
                empleado.nombre + ' ' + empleado.apellido1
            }</option>`;
            html2 += `<option value='${
                empleado.puesto
            }'> ${
                empleado.puesto
            }</option>`;
        })
        $('#combo_jefe').html(html)
        // $('#puesto').html(html2)
    })
}

var cargapuesto = (combo_oficina) => {
    var codigo_oficina = combo_oficina.value;
    var html = '<option value=0>Seleccione un cargo</option>';
    $.post('../../Controllers/empleado.controllers.php?op=filtropuesto', {
        codigo_oficina: codigo_oficina
    }, (listapuestos) => {
        listapuestos = JSON.parse(listapuestos);
        $.each(listapuestos, (index, puesto) => {
            html += `<option value='${
                puesto.puesto
            }'> ${
                puesto.puesto
            }</option>`;
        })
        $('#puesto').html(html)
    })
}
var limpiacajas = () => {
    document.getElementById('codigo_empleado').value = '';
    document.getElementById('nombre').value = '';
    document.getElementById('apellido1').value = '';
    document.getElementById('apellido2').value = '';
    document.getElementById('extension').value = '';
    document.getElementById('email').value = '';
    
    document.getElementById('puesto').value = '';
    document.getElementById('codigo_empleado').value = '';
    jQuery('#modalempleado').modal('hide');
    document.getElementById('titleLabelempleado').innerHTML = 'Nuevo empleado';
};
init();
