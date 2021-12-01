function validar() {
    let dni = document.getElementById('dni').value;
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let telefono = document.getElementById('telefono').value;

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
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;
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

function validar_dni() {
    let dni = document.getElementById('dni').value;
    if (dni == '') {
        swal({
            title: "Error",
            text: "Introduce el DNI",
            icon: "error",
        });
        return false;
    } else {
        return true;
    }
}

function eventos() {
    let titulo = document.getElementById('titulo').value;
    let descripcion = document.getElementById('descripcion').value;
    let fecha = document.getElementById('fecha').value;
    let hora = document.getElementById('hora').value;
    let capmax = document.getElementById('capmax').value;
    if (titulo == '' || descripcion == '' || fecha == '' || hora == '' || capmax == '') {
        swal({
            title: "Error",
            text: "Todos los campos tienen que estar llenos, menos la imagen",
            icon: "error",
        });
        return false;
    } else {
        return true;
    }
}