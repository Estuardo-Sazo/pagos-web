const url = "../../../api/users/";
//Login

localStorage.setItem('id', 'null');
localStorage.setItem('nombre', 'null');
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
                localStorage.setItem('id', data.id);
                localStorage.setItem('nombre', data.name);

                location.href = "../inicio";
            } else {
                $("#username").val('');
                $("#password").val('');
                $('#Error').html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error en los datos!</strong> Verifica que todos los datos esten correctos.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                `);
            }
        });
    e.preventDefault();
});