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
                    <tr id="${d.id}">
                    <td>${d.name}</td>
                    <td>${moneda + d.cost}</td>
                    <td>${moneda + d.price_one}</td>
                    <td>${moneda + d.price_two}</td>
                    <td><button type="button" class="btn btn-primary btn-sm m-1 editar" onClick="getTypeId(${d.id})">Editar</button>
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

function getTypeId(id) {
    fetch(urlProducto + '?id=' + id, {
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
                   
                $('#name_E').val(d.name);
                $('#idType').val(d.id);                    
                $('#cost_E').val(d.cost);
                $('#price_one_E').val(d.price_one);
                $('#price_two_E').val(d.price_two);
                $('#editar').modal('show');
                    
                    
                });
            } else {
                console.log('Error en los datos');

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

$('#frm-editar').submit(function(e) {
    const data = $("#frm-editar").serializeJSON();
    const id=$('#idType').val();    
    console.log(data, id);
    fetch(urlProducto+ '?id=' + id, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            $('#editar').modal('hide');
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