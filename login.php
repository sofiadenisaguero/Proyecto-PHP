<?php 
session_start();


require_once 'funciones/conexion.php';
$MiConexion=ConexionBD();
$Mensaje='';

if (!empty($_POST['BotonIngresar'])) {

    require_once 'funciones/login.php';
    $UsuarioLogueado = DatosLogin($_POST['usuario'], $_POST['clave'], $MiConexion);

    if ( !empty($UsuarioLogueado)) {

        if($UsuarioLogueado['ROL']==3 || $UsuarioLogueado['ROL']==4){

        $Mensaje='No tienes permisos asignados para ingresar al panel';

    }
    else {

            //GENERA VALORES DEL USUARIO- VIENEN DE LA BASE DE DATS
            $_SESSION['Usuario_Id']     =   $UsuarioLogueado['ID'];
            $_SESSION['Usuario_Nombre']     =   $UsuarioLogueado['NOMBRE'];
            $_SESSION['Usuario_Apellido']   =   $UsuarioLogueado['APELLIDO'];
            $_SESSION['Usuario_Rol']      =   $UsuarioLogueado['ROL'];
            $_SESSION['Usuario_TipoRol']        =   $UsuarioLogueado['TIPO_ROL'];
            $_SESSION['Usuario_Foto']        =   $UsuarioLogueado['FOTO'];
            $_SESSION['Usuario_Usuario']        =   $UsuarioLogueado['USUARIO'];
            
            header('Location: index.php');
            exit;
        }
    }else {
        $Mensaje='Datos incorrectos, intenta de nuevo.';

    } 

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

<!-- el link de arriba y el title son diferentes-->
    <title>Sign In | AdminKit Demo</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">


                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <div class="text-center mt-4">
                                        <p class="lead">
                                            <img src="img/avatars/login.png" width="150" height="150">
                                        <h1 class="h2">Ingresa tus datos.</h1>
                                        </p>
                                    </div>
                                   <!-- <div class="card-header">
                                        mensaje de error de user y pass -->
                                       <!-- <h4 class="text-danger">Datos incorrectos, intenta de nuevo.</h4> -->
                                        <!--mensaje de error si es Analista o Desarrollador -->
                                       <!-- <h4 class="text-danger">No tienes permisos asignados para ingresar al panel</h4>
                                    </div>-->

<!--ACÁ AGREGUÉ UN FORM PARA PODER ENVIAR LO DEL POST -->
                                     <form role="form" method='post'>

                                    <?php if (!empty($Mensaje)) { ?>
                                     <div class="card-header">
                                        <!--mensaje de error de user y pass -->
                                        <!--mensaje de error si es Analista o Desarrollador -->
                                        <h4 class="text-danger"> <?php echo $Mensaje; ?> </h4>
                                    </div>
                                    <?php } ?>


<!-- LE AGREGUÉ COMO ATRIBUTO NAME A EMAIL Y PASSWORD-->
                                     <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" name="usuario" placeholder="Ingresa tu email" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" name="clave"
                                        placeholder="Ingresa tu password" type="password"/>
                                    </div>



                       <!-- ESTE ES EL BOTON DE INGRESAR , le agregué como atributo name="BotonIngresar" y le cambié el type "button" por "submit"   -->
                                    <div class="d-grid gap-2 mt-3">
                                        <input class="btn btn-lg btn-primary" type="submit" value="Ingresar" name="BotonIngresar">
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="text-center mb-3">
                            Don't have an account? <a href="pages-sign-up.html">Sign up</a>
                        </div>
-->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/app.js"></script>

</body>

</html>