const url = "../../../api/sales/";
const idUser = localStorage.getItem('id');

getStatus(1);

function getStatus(st) {

    fetch(url + '?customer=d&status=' + st + '&user=' + idUser, {
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

$("#search").keyup(function() {
    fetch(url + '?search=' + $("#search").val(), {
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
    location.href = "../customers/detail.php?id=" + id;
}

function listData(data) {

    let template = '';
    if (data != null) {
        data.forEach(d => {
            let cl = d.balance > 0 ? 'text-danger' : 'text-success';
            template += `
                    <div class="col-md-6 mt-1 col-lg-4">
                        <div class="card border-black mb-3" onclick="viewVenta(${d.id})">
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
    $('#listSales').html(template);
}