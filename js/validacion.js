function validarLogin() {
    let user = document.getElementById('username').value;
    let pass = document.getElementById('password').value;

    if (user == '' || pass == '') {
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

function validarModificarUser() {
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let email = document.getElementById('email').value;
    let tipoemp = document.getElementById('tipoemp').value;
    if (nombre == '' || apellido == '' || email == '' || tipoemp == '') {
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

function validarCrearUser() {
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let email = document.getElementById('email').value;
    let passwd = document.getElementById('passwd').value;
    let tipoemp = document.getElementById('tipoemp').value;
    if (nombre == '' || apellido == '' || email == '' || passwd == '' || tipoemp == '') {
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

function validarModificarMesa() {
    let nombre = document.getElementById('capacidad').value;
    let estado = document.getElementById('estado').value;
    let nombresala = document.getElementById('nombresala').value;
    let img = document.getElementById('img').value;

    if (nombre == '' || estado == '' || nombresala == '' || img == '') {
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

function validarCrearMesa() {
    let nombre = document.getElementById('capacidad').value;
    let estado = document.getElementById('estado').value;
    let nombresala = document.getElementById('nombresala').value;
    let img = document.getElementById('img').value;

    if (nombre == '' || estado == '' || nombresala == '' || img == '') {
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