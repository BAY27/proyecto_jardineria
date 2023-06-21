var init = ()=>{
    $('#gama_productos_form').on('submit',(e)=>{
        guardaryeditar(e);
    })
}

$().ready(
    ()=>{
    $('#descripcion_html').summernote();
    cargaTabla();
    }
);
var cargaTabla = ()=>{
    html ="";
    $.post('../../controllers/gama_producto.controllers.php?op=todos',(datos)=>{
        datos = JSON.parse(datos);
        $.each(datos,(index, fila)=>{
            html+=`<tr>` + 
            `<td>${index +1}</td>` +
            `<td>${fila.gama}</td>` + 
            `<td>${fila.descripcion_texto}</td>` + 
            `<td>${fila.descripcion_html}</td>` + 
            `<td> <img style='width:100px' src='${fila.imagen}' /></td>` + 
            `<td>` +
            `<button class='btn btn-success'>Editar</button>`+
            `<button class='btn btn-danger'>Eliminar</button>`+
            `</td></tr>`;
        });
        $('#TablaCategorias').html(html);
    })
};

var guardaryeditar = async (e)=>{
    e.preventDefault();
    var formData = new FormData($('#gama_productos_form')[0]);
    $.ajax({
        url:'../../controllers/gama_producto.controllers.php?op=insertar',
        type:'POST',
        data:formData,
        contentType:false,
        processData:false,
        success: (res)=>{
            res = JSON.parse(res);
            if (res ==='ok') {
                Swal.fire('Categoria de Productos','Seguardo con éxito','success');
                cargaTabla();
                limpaCajas();
            }else{
                Swal.fire('Categoria de Productos','Ocurrio un error al guardar','danger');
            }
        }
    });
}
var limpaCajas = ()=>{
    $('#gama').val('');
    $('#descripcion_texto').val('');
    $('#descripcion_html').val('');
    $('#imagen').val('');
    $('#modalCategoria').modal('hide');
};
init();