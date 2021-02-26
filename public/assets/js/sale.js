const urlSale = "../../../api/sales/";
const urlPay = "../../../api/payment_detail/";

getSale($('#idC').val());
listPagos($('#idC').val());
function getSale(id){
    fetch(urlSale + '?id=' + id, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then((response) => response.json())
    .then((data) => {
        listData(data)
    });
}

function listPagos(id){
    fetch(urlPay + '?sale=' + id, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then((response) => response.json())
    .then((data) => {
       if(data != null){
           let template = '';
           data.forEach(d => {
               template +=`
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

function listData(data){ 
    let template='';
            if(data != null){
                data.forEach(d => {
                    let cl = d.balance >0?'text-danger':'text-success';
                    template +=`
                    <div class="col-md-6 mt-1">
                        <div class="card border-black mb-3" >
                            <div class="card-body pt-1 pb-1">
                                <h4 class="text-center">${d.customer}</h4>
                                <div class="row">
                                    <div class="col-7">
                                        <p class="card-text m-0">${d.start_date}</p>
                                        <p class="card-text m-0">${d.type_payment}</p>
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