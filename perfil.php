<?php
include('conexion.php');
include('sesion.php');
require_once 'funciones.php';
if (isset($_POST['btnAccion'])) {
    AntiCSRF();
}
GenerarAnctiCSRF();
$sql = $conn->query("select nombres, apellidos, correo, registro_usu,foto_perfil from usuarios where id_usuario='$session_id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    
    <link rel="stylesheet" href="css/normalice.css">
    <link rel="stylesheet" href="css/style_perfil.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&family=Staatliches&display=swap" rel="stylesheet">
</head>
<body>
    <?php include('menu-bar.php');?>
    <div class="container">
        <div class="portada">
            <button type="button" onclick="document.getElementById('imagen').click()" class="subirImagen">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                </svg>Editar portada
            </button>
            <input type="file" id="imagen" name="imagen" accept="image/*" style="display: none;" onchange="mostrarImagen(this)">
        </div>
        <div class="estadistica">
            <div class="estadistica__">
                <h1>hola mundo</h1>
            </div>
        </div>        
        <div class="foto_perfil">
        </div>
        <div class="inf">
            <div class="informacion">
                <div class="informacion__">
                    <?php
                        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                            echo "<h1>".$row->nombres . $row->apellidos . "</h1><br>
                            <p>Se unio ".$row->registro_usu."</p>";
                        }
                    ?>
                    <div class="button">
                        <div id="publicar">Publicar</div>
                        <div id="mensaje">Mensaje</div>
                    </div>
                </div>
            </div>
            <div class="publicaciones">
            <img src="<?php echo $row['foto_perfil'];?>">
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>