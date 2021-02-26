const url = "../../../api/sales/";
getStatus(1);
function getStatus(st) {

    fetch(url + '?status=' + st, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            listData(data);
        });
    }

$( "#search" ).keyup(function() {
    fetch(url + '?search=' + $( "#search" ).val(), {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then((response) => response.json())
    .then((data) => {
        listData(data);
    });
  });

function viewVenta(id) {
    location.href="sale.php?id="+id;
}

function listData(data){ 

    let template='';
            if(data != null){
                data.forEach(d => {
                    let cl = d.balance >0?'text-danger':'text-success';
                    template +=`
                    <div class="col-md-4 mt-1">
                        <div class="card border-black mb-3" onclick="viewVenta(${d.id})">
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
            $('#listSales').html(template);
}