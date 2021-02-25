const url = "../../../api/users/";
//Login

console.log("listo");
$("#login").submit(function(e) {
    const data = {
        username: $("#username").val(),
        password: $("#password").val(),
    };

    fetch(url + "?login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.id) {
                location.href = "../inicio";
            } else {
                console.log(data);
            }
        });
    e.preventDefault();
});