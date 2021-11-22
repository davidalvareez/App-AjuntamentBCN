function validar() {
    let user = document.getElementById('username').value
    let pass = document.getElementById('password').value
    let mensaje = document.getElementById('mensaje')

    if (user == '' && pass == '') {
        mensaje.innerHTML = 'Debes rellenar los campos: Usuario y Contraseña.'
        return false
    } else if (user == '') {
        mensaje.innerHTML = 'Debes rellenar el campo: Usuario.'
        return false
    } else if (pass == '') {
        mensaje.innerHTML = 'Debes rellenar el campo: Contraseña.'
        return false
    } else {
        return true
    }
}