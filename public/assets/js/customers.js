const url = "../../../api/customers/";
const idUser = localStorage.getItem('id');
if ($('#list').val() == '1') {
    getCustomers();
}

$("#newCustomer").submit(function(e) {
    const data = $("#newCustomer").serializeJSON();

    fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.body) {
                location.href = "../customers";
            } else {
                console.log(data);
            }
        });
    e.preventDefault();
});

function getCustomers() {
    fetch(url + '?user=' + idUser, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            }
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let template = '';
            let st1 = '<span class="text-success">Pagos Completos</span>';
            let st0 = '<span class="text-danger">Pagos Pendientes</span>';


            data.forEach(d => {
                template += `
            <div class="col-md-4 mt-2">
                <div class="card border-light mb-3">
                    <div class="card-body">
                        <h4 class="card-title">${d.name}</h4>
                        <p class="card-text m-0">Dirección: ${d.address}</p>
                        <p class="card-text m-0">Telefóno: ${d.phone}</p>
                        <p class="card-text m-0">Referencia: ${d.uuid} </p>
                        <p class="card-text m-0">Estado: ${d.status==0?st1:st0}</p>
                        <p class="btn-cliente mt-1">
                            <a href="view.php?id=${d.id}" class="btn btn-success btn-block ">Ver</a>
                        </p>
                    </div>
                </div>
            </div>`;
            });

            $('#listCustomers').html(template);
            /* if (data.body) {
              location.href = "../customers";
            } else {
              console.log(data);
            } */
        });
}