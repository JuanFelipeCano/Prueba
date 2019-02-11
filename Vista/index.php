<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <style>
        body {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        #tbl-usuarios {
            border-collapse: collapse;
            width: 100%;
        }

        #tbl-usuarios td, #tbl-usuarios th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #tbl-usuarios tr:nth-child(even){
            background-color: #f2f2f2;
        }

        #tbl-usuarios tr:hover {
            background-color: #ddd;
        }

        #tbl-usuarios th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    
    <div class="contenedor">
        <div>
            <form id="form" name="form" action="">
                <input type="hidden" id="idUsuario" name="idUsuario" value="" />

                <div>
                    <label for="nombreUsuario">Nombre Usuario</label>
                    <input type="text" id="nombreUsuario" name="nombreUsuario" maxlength="255" autocomplete="off" />
                </div><br>

                <div>
                    <label for="correo">Correo</label>
                    <input type="text" id="correo" name="correo" maxlength="255" autocomplete="off" />
                </div><br>

                <div>
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" maxlength="10" autocomplete="off" />
                </div><br>

                <button type="button" id="btn_guardar">Guardar</button>
                <button type="button" id="btn_modificar" disabled>Actualizar</button>
            </form>
        </div><br><br>

        <div>
            <table id="tbl-usuarios">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre usuario</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="tbody-usuarios">
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="../App/app.js"></script>
</body>
</html>