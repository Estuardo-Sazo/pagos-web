const urlSale = "../../../api/sales/";
const idUser = localStorage.getItem('id');
const idC = $('#idC').val();

getSale(idC, idUser);

getStatus(1, idC, idUser);

function getStatus(st, id, user) {

    fetch(urlSale + '?st=' + st + '&user=' + user + '&id=' + id, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            listSales(data);
        });
}

function getSale(id, user) {

    fetch(urlSale + '?id=' + id + '&user=' + user, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            listData(data);
        });
}

function getSales(id) {
    fetch(urlSale + '?id=' + id, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            if (data[0].balance > 0) {
                $('#btnPagar').html('<a data-toggle="modal" data-target="#modalPago" class="btn-flotante">Registar Pago</a>');
            } else {
                $('#btnPagar').html('');
            }
            listData(data);
        });
}

function listData(data) {

    let template = '';
    if (data != null) {
        data.forEach(d => {
            let cl = d.balance > 0 ? 'text-danger' : 'text-success';
            template += `
                    <div class="col-md-6 mt-1 col-lg-4">
                        <div class="card border-black mb-3" >
                            <div class="card-body pt-1 pb-1">
                                <h4 class="text-center">${d.customer}</h4>
                                <div class="row justify-content-center">
                                    
                                    <div class="col-12 ${cl}">
                                        <h5 align="center">Saldo</h5>
                                        <h3 align="center" >Q${d.balance}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
        });
    }
    $('#data').html(template);
}

function viewVenta(id) {
    location.href = "../sales/sale.php?id=" + id;
}

function listSales(data) {
    let template = '';
    if (data != null) {
        data.forEach(d => {
            let cl = d.balance > 0 ? 'text-danger' : 'text-success';
            $('#current').val(d.balance);
            template += `
                    <div class="col-12 mt-1">
                        <div class="card border-black mb-3" onclick="viewVenta(${d.id})">
                            <div class="card-body pt-1 pb-1">
                                <h4 class="text-center"> ${d.type_payment}</h4>
                                <div class="row">
                                    <div class="col-7">
                                        <p class="card-text m-0">${d.start_date}</p>
                                        <p class="card-text m-0">${d.customer}</p>
                                        <p class="card-text m-0">Precio: Q${d.price}</p>
                                    </div>
                                    <div class="col-5 ${cl}">
                                        <h5>Saldo</h5>
                                        <h3 >Q${d.balance}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
        });
    }
    $('#Sales1').html(template);
}