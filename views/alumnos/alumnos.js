$().ready(() => {
    llenarTabla();
});
//           ../../controllers/alumnos.controller.php?op=todos
var llenarTabla = () => {
    var html = '';
    $.get('../../controllers/alumnos.controller.php?op=todos', {}, (listaalumnos) => {
        listaalumnos = JSON.parse(listaalumnos);

        $.each(listaalumnos, (index, alumno) => {
            html += `<tr>` + `<td>${
                index + 1
            } </td>` + `<td>${
                alumno.Nombres
            }</td>` + `<td>${
                alumno.Apellidos
            }</td>` + `<td>${
                alumno.Direccion
            }</td>` + `<td><button class='btn btn-success' onclick='uno(${
                alumno.idAlumno
            })'>Editar</button>` + `<button class='btn btn-danger' onclick='eliminar(${
                alumno.idAlumno
            })'>Eliminar</button></td>` + `</tr>`
        });
        $('#AlumnosTabla').html(html);
    });
}
function init() {
    $('#alumnos_form').on('submit', (e) => {
        guardaryeditar(e);
    })
}
var guardaryeditar = (e) => {
    e.preventDefault();
    var idAlumno = document.getElementById('idAlumno').value;
    var url = '';
    if (idAlumno === undefined || idAlumno === '') {
        url = "../../controllers/alumnos.controller.php?op=insertar";
    } else {
        url = "../../controllers/alumnos.controller.php?op=actualizar";
    }
    var form_data = new FormData($('#alumnos_form')[0]);
    $.ajax({
        url: url,
        type: "POST",
        data: form_data,
        processData: false,
        contentType: false,
        cache: false,
        success: (respuesta) => {
            respuesta = JSON.parse(respuesta);
            if (respuesta === 'ok') {
                Swal.fire('Alumnos', 'Se guardo con éxito', 'success');
                limpiar();
                llenarTabla();
            }
        }
    });
}
var uno = (idAlumno) => {
    $.post('../../controllers/alumnos.controller.php?op=uno', {
        idAlumno: idAlumno
    }, (res) => {
        res = JSON.parse(res);
        $('#idAlumno').val(res.idAlumno);
        $('#Nombres').val(res.Nombres);
        $('#Apellidos').val(res.Apellidos);
        $('#Direccion').val(res.Direccion);
    })
    document.getElementById('tituloModalAlumnos').innerHTML = "Editar Alumno";
    $('#modalAlumno').modal('show');
}

var eliminar = (idAlumno) => {
    Swal.fire({
        title: 'Alumnos',
        text: "Esta seguro que desea eliminar...???",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar!!!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('../../controllers/alumnos.controller.php?op=eliminar', {
                idAlumno: idAlumno
            }, (res) => {
                res = JSON.parse(res);
                if (res === 'ok') {
                    Swal.fire('Alumnos', 'Se eliminó con éxito', 'success');
                    limpiar();
                    llenarTabla();
                }

            })
        }
    })
}

var limpiar = () => {
    $('#Nombres').val('');
    $('#Apellidos').val('');
    $('#Direccion').val('');
    $('#modalAlumno').modal('hide');
    document.getElementById('tituloModalAlumnos').innerHTML = "Nuevo Alumno";
};
init();
