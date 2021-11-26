function validar() {
    let dni = document.getElementById('dni').value
    let nombre = document.getElementById('nombre').value
    let apellido = document.getElementById('apellido').value
    let telefono = document.getElementById('telefono').value

    if (dni == '' || nombre == '' || apellido == '' || telefono == '') {
        swal({
            title: "Error",
            text: "Tienes que rellenar todos los datos",
            icon: "error",
        });
        return false;
    } else {
        return true;
    }
}

function validar_login() {
    let username = document.getElementById('username').value
    let password = document.getElementById('password').value
    if (username == '' || password == '') {
        swal({
            title: "Error",
            icon: "error",
        });
        return false;
    } else {
        return true;
    }
}