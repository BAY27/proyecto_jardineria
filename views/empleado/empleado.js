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
    var ultimoRegistro = await ultimoRegistro();

    if (ultimoRegistro === 'error') {
        Swal.fire('Empleados', 'Ocurrió un error al guardar');
    } else {
        var formData = new FormData($('#empleado_form')[0]);
        var codigo_empleado = document.getElementById('codigo_empleado').value;
        var url = '';
        if (codigo_empleado === undefined || codigo_empleado === '') {
            url = '../../Controllers/empleado.controllers.php?op=insertar';
            formData.append('codigo_empleado', (parseInt(codigo_empleado) + 1))
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
                res = JSON.parse(res);
                if(res=='ok'){
                    Swal.fire('Empleado', 'Se guardo con exito');
                }

            }

        })
    }


}

var ultimoRegistro = () => {
    $.post('../../Controllers/empleado.controllers.php?op=ultimoRegistro', async (ultimocodigo) => {
        ultimocodigo = JSON.parse(ultimocodigo);
        if (parseInt(ultimocodigo) <= 0) {
            return "error";
        } else {
            return ultimocodigo;
        }
    })
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
    document.getElementById('codigo_empleado').value = '';
    jQuery('#modalempleado').modal('hide');
    document.getElementById('titleLabelempleado').innerHTML = 'Nuevo empleado';
};
init();
