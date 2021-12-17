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
    let estado = document.getElementById('estadomesa').value;
    let nombresala = document.getElementById('nombresala').value;

    if (nombre == '' || estado == '' || nombresala == '') {
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

    if (nombre == '' || estado == '' || nombresala == '') {
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

function validarCrearReserva() {
    let fecha = document.getElementById('fecha').value;
    let horainicio = document.getElementById('horainicio').value;

    if (fecha == '' || horainicio == '') {
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

function validarModificarIncidencia() {
    let descripcion = document.getElementById('descripcion').value;

    if (descripcion == '') {
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

function yaReservado() {
    swal({
        title: "Error",
        text: "Ya se ha reservado a esa hora, por favor, escoge otra",
        icon: "error",
    })
}