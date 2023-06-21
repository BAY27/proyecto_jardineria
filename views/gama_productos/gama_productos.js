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
            `<td> <img src='${fila.imagen} />'</td>` + 
            `<td>` +
            `<button class='btn btn-success'>Editar</button>`+
            `<button class='btn btn-danger'>Eliminar</button>`+
            `</td></tr>`;
        });
        $('#TablaCategorias').html(html);
    })
}