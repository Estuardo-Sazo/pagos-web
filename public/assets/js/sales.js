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
            console.log(data);

        });
}