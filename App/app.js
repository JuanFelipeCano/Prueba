$(() => {
    $('#btn_guardar').on('click', () => {
        GuardarUsuario();
    });

    $('#btn_modificar').on('click', () => {
        ActualizarUsuario();
    });

    ConsultarUsuarios();
});

function GuardarUsuario() {
    const datos = $('#form').serializeArray();
    const url = '../Peticion.php?ctr=ControladorUsuario&func=GuardarUsuario';
    const config = ['POST', url, true];

    PeticionDatos(datos, config).then(() => {
        location.reload();
    }).catch((err) => {
        console.log(err);
    });
}

function ConsultarUsuarios() {
    const url = '../Peticion.php?ctr=ControladorUsuario&func=ConsultarUsuarios';
    const config = ['GET', url, true];

    PeticionDatos(new Object(), config).then((res) => {
        let html = '';
        
        res.map((item) => {
            html += `
                <tr>
                    <td>${item.idUsuario}</td>
                    <td>${item.nombreUsuario}</td>
                    <td>${item.correo}</td>
                    <td>${item.telefono}</td>
                    <td>
                        <button onclick="ModificarUsuario(${item.idUsuario});">Modificar</button>
                    </td>
                    <td>
                        <button onclick="EliminarUsuario(${item.idUsuario});">Eliminar</button>
                    </td>
                </tr>
            `;
        });

        $('#tbody-usuarios').html(html);
    }).catch((err) => {
        console.log(err);
    });
}

function ModificarUsuario(id) {
    const datos = { idUsuario: id };
    const url = '../Peticion.php?ctr=ControladorUsuario&func=ModificarUsuario';
    const config = ['GET', url, true];

    PeticionDatos(datos, config).then((res) => {
        $('#idUsuario').val(res.idUsuario);
        $('#nombreUsuario').val(res.nombreUsuario);
        $('#correo').val(res.correo);
        $('#telefono').val(res.telefono);
        $('#btn_modificar').prop('disabled', false);
        $('#btn_guardar').prop('disabled', true);
    }).catch((err) => {
        console.log(err);
    });
}

function ActualizarUsuario() {
    const datos = $('#form').serializeArray();
    const url = '../Peticion.php?ctr=ControladorUsuario&func=ActualizarUsuario';
    const config = ['POST', url, true];

    PeticionDatos(datos, config).then(() => {
        location.reload();
    }).catch((err) => {
        console.log(err);
    });
}

function EliminarUsuario(id) {
    if (!confirm('¿Está seguro de eliminar el registro?')) {
        return false;
    }

    const datos = { idUsuario: id };
    const url = '../Peticion.php?ctr=ControladorUsuario&func=EliminarUsuario';
    const config = ['POST', url, true];

    PeticionDatos(datos, config).then(() => {
        location.reload();
    }).catch((err) => {
        console.log(err);
    });
}

function PeticionDatos(Datos, Config) {
    return new Promise((resolve, reject) => {
        const _method = Config[0];
        const _url = Config[1];
        const _async = Config[2];

        $.ajax({
            method: _method,
            url: _url,
            async: _async,
            dataType: 'json',
            global: true,
            data: Datos
        }).done((data) => {
            resolve(data);
        }).fail((err) => {
            reject(err);
        }).always(() => {
            console.log('Completado');
        });
    });
}









