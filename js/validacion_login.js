function validar() {
    let dni = document.getElementById('username').value
    let nombre = document.getElementById('username').value
    let apellido = document.getElementById('username').value
    let telefono = document.getElementById('username').value
    let user = document.getElementById('username').value

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