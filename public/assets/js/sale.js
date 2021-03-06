const urlSale = "../../../api/sales/";
const urlPay = "../../../api/payment_detail/";
const idUser = localStorage.getItem('id');
const idS = $('#idC').val();
var f = new Date();
var saldo = 0;


getSale(idS, idUser);
listPagos(idS);

function getSale(id, user) {
    fetch(urlSale + '?user=' + user + '&forId=' + id, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            if (parseInt(data[0].balance) > 0) {
                $('#btnPagar').html('<a data-toggle="modal" data-target="#modalPago" class="btn-flotante">Registar Pago</a>');
            } else {
                $('#btnPagar').html('');
            }
            listData(data);
        });
}

function listPagos(id) {
    fetch(urlPay + '?sale=' + id, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            if (data != null) {
                let template = '';
                data.forEach(d => {
                    template += `
               <tr>
                    <td>Q${d.payment}</td>
                    <td>${d.date}</td>
                    <td>Q${d.current}</td>
                    <td>Q${d.new}</td>
                </tr>
               `
                });

                $('#listPagos').html(template);
            }
        });
}

function listData(data) {
    let template = '';
    if (data != null) {
        data.forEach(d => {
            let cl = d.balance > 0 ? 'text-danger' : 'text-success';
            saldo = d.balance;
            $('#current').val(d.balance);
            template += `
                    <div class="col-md-6 mt-3">
                        <div class="card border-black mb-3" >
                            <div class="card-body pt-1 pb-1">
                                <h4 class="text-center">${d.type_payment}</h4>
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
    $('#data').html(template);
}

$('#frm-pago').submit(function(e) {
    const data = $("#frm-pago").serializeJSON();
    data.date = f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear();
    data.time = f.getHours() + ':' + f.getMinutes();
    data.new = data.current - data.payment;
    
    if (parseInt(data.payment)> parseInt(saldo)) {
        let t = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Alerta!</strong> El monto agregado es mayor a la deuda
    </div>`;
        $('#alerta').html(t);
        $('#payment').focus();
    } else {
        
        var id = data.sale;
        const dataS = {
            end_date: data.new == 0 ? data.date : '',
            end_time: data.new == 0 ? data.time : '',
            balance: data.new,
            status: data.new == 0 ? '0' : '1'
        }
        fetch(urlPay, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            })
            .then((response) => response.json())
            .then((data) => {
                if (data != null) {
                    fetch(urlSale + '?PUT=&id=' + id, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(dataS),
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            $('#modalPago').modal('hide');
                            $('#payment').val('');
                            $('#alerta').html('');
                            getSale(idS, idUser);
                            listPagos(idS);
    
                        });
                } else {
                    console.log(data);
    
                }
    
            });
    }

    e.preventDefault();
})