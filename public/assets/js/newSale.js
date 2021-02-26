const urlCliente = "../../../api/customers/";
const urlProducto = "../../../api/types_payments/";
const urlSales = "../../../api/sales/";
var typeClient = 0;
var f = new Date();



$('#selectPro').click(function() {
    fetch(urlProducto, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            let template = '';
            let price = 0;
            data.forEach(d => {
                price = typeClient == 1 ? d.price_two : d.price_one;
                template += `
                <tr onClick="selectProduct(${d.id},${price},'${d.name}')">
                    <td>${d.name}</td>
                    <td>Q.${price}</td>
                </tr>
            `;
            });
            $('#listProducto').html(template);
        });
});

$('#selCLiente').click(function() {
    fetch(urlCliente, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            let template = '';
            data.forEach(d => {
                template += `
                <tr onClick="selectClient(${d.id},'${d.name}',${d.type_customer})">
                    <td>${d.name}</td>
                    <td>${d.uuid}</td>
                </tr>
            `;
            });
            $('#listClientes').html(template);
        });
});

function selectClient(id, name, type) {
    $('#customer').val(id);
    $('#cliente').val(name);
    $('#type_customer').val(type);
    typeClient = type;
    $('#modalCliente').modal('hide');
    limpiarProducto();
}

function selectProduct(id, price, name) {
    $('#price').val(price);
    $('#producto').val(name);

    $('#type_payment').val(id);
    $('#precio').val('Q.' + price);
    $('#modalProducto').modal('hide');

}

function limpiarProducto() {
    $('#price').val('');
    $('#producto').val('');
    $('#type_payment').val('');
    $('#precio').val('');
}


/* Metodos de pagos */

$('#pago').click(function(e) {
    const data = $("#newSale").serializeJSON();
    data.price = parseFloat(data.price);
    data.customer = parseInt(data.customer);
    data.type_payment = parseInt(data.type_payment);
    data.user = parseInt(data.user);
    data.start_date = f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear();
    data.start_time = f.getHours() + ':' + f.getMinutes();
    data.end_date = f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear();
    data.end_time = f.getHours() + ':' + f.getMinutes();
    data.status = 0;
    data.balance = 0;
    fetch(urlSales, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            location.href = "../sales";
        });
    e.preventDefault();
});

$('#credito').click(function(e) {
    const data = $("#newSale").serializeJSON();
    data.start_date = f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear();
    data.start_time = f.getHours() + ':' + f.getMinutes();
    data.end_date = "";
    data.end_time = "";
    data.status = 1;
    data.balance = data.price;

    fetch(urlSales, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((data) => {
            location.href = "../sales";

        });

    e.preventDefault();
});