const urlSale = "../../../api/sales/";
const urlConstumer = "../../../api/customers/";

const idUser = localStorage.getItem('id');
const idC = $('#idC').val();

var balance = 0;


getSale(idC, idUser);

//Listamos Ventas Pendientes
getStatus(1, idC, idUser, '#Sales1');
//Listamos Ventas Completas
getStatus(0, idC, idUser, '#SalesC');





//muestra lista de pagos pendientes
function getStatus(st, id, user, ref) {
    fetch(urlSale + '?st=' + st + '&user=' + user + '&id=' + id, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
           
            if (data != null) {
                balance = data.balance;
                listSales(data, ref); 
            } else {
                if (balance<=0) {
                    
                    getCustomer(idC);
                }
                }

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
            if (data != null) {

                if (data[0].status == 0 && parseInt(data[0].balance) > 0) {
                    updateStatusCustomer(1, idC);
                } else if (data[0].status == 1 && parseInt(data[0].balance) == 0) {

                    updateStatusCustomer(0, idC);
                    
                }
                if (balance == 0) {
                    
                    listData(data);
                }
                

            }
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
                                        <h3 align="center" >Q${parseInt(d.balance).toFixed(2)}</h3>
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
    location.href = "../sales/sale.php?id=" + id + '&customer=' + idC;
}

function listSales(data, ref) {
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
    $(ref).html(template);
}

function updateStatusCustomer(status, user) {
    fetch(urlConstumer + '?newStatus=' + status + '&user=' + user, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);

        });
}

function getCustomer(id) {
    fetch(urlConstumer + '?id=' + id + '&user=' + idUser, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            if (data[0].status == 0) {
                data[0].balance = 0.00;
                data[0].customer = data[0].name;
            } else {
                data[0].balance = 1;
                data[0].customer = data[0].name;
            }
            listData(data)
        });
}

function validacionBalance() {
    if (balance > 0) {
        console.log('Deuda :'+balance);
        updateStatusCustomer(1, idC);
    }
}