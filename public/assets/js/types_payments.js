const urlProducto = "../../../api/types_payments/";

const idUser = localStorage.getItem('id');
getTypes();
const moneda = 'Q';

function getTypes() {
    fetch(urlProducto + '?user=' + idUser, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            let template = '';
            let price = 0;
            console.log(data);
            if (data != null) {
                data.forEach(d => {
                    template += `
                    <tr>
                    <td>${d.name}</td>
                    <td>${moneda + d.cost}</td>
                    <td>${moneda + d.price_one}</td>
                    <td>${moneda + d.price_two}</td>
                    <td><a class="btn btn-primary btn-sm m-1">Editar</a>
                        <a class="btn btn-danger btn-sm m-1">Eliminar</a>
                    </td>
                </tr>
            `;
                });
                $('#lista').html(template);
            } else {
                $('#lista').html('<h3>No hay articulos</h3>');

            }
        });
}


$('#frm-nuevo').submit(function(e) {
    const data = $("#frm-nuevo").serializeJSON();
    fetch(urlProducto, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            $('#nuevo').modal('hide');
            limpiarCampos();
            getTypes();
        });
    e.preventDefault();

});

function limpiarCampos() {
    $('#cost').val('');
    $('#name').val('');
    $('#price_one').val('');
    $('#price_two').val('');
}