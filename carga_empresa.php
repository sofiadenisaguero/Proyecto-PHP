<?php
require_once 'funciones/verificarUsuarioLogueado.php';

require_once 'funciones/conexion.php';

$MiConexion = ConexionBD();

require_once 'funciones/seleccion_paises.php';
require_once 'funciones/insertarEmpresa.php';
require_once 'funciones/validarEmpresa.php';


//NO MUESTRO NINGUN MENSAJE SI NO TIENE ACCESO, SOLO LO REDIRECCIONA AL INDEX
if(!empty($_SESSION['Usuario_Rol']) && $_SESSION['Usuario_Rol']==2){ 
    header('Location: index.php');
    exit;
}


//LISTO LOS PAISES

$ListadoPaises = Listar_Paises($MiConexion);
$CantidadPaises = count($ListadoPaises);


$Mensaje='';
$Estilo='text-danger';
$DataFeather= 'alert-circle';
if (!empty($_POST['BotonRegistrarEmpresa'])) {

    $Mensaje=Validar_Empresa();
    if (empty($Mensaje)) {
        if (InsertarEmpresa($MiConexion) != false) {
            $Mensaje = 'Registro cargado correctamente.';
            $_POST = array(); 
            $Estilo = 'text-success';
            $DataFeather= 'check-square';
        }else{
            $Mensaje='No se pudo guardar la empresa. ';

        }
    }
}

?>
<?php
 
 require_once 'secciones/head.php';
 require_once 'secciones/lateral.php';
 require_once 'secciones/encabezado.php';



?>

            <main class="content">
                <div class="container-fluid p-0">

                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Cargar Nueva Empresa</h1>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <form role="form" method='post'>

                             <?php if (!empty($Mensaje)) { ?>
                                <div class="card-header">
                                   
                                    <h4 class="<?php echo $Estilo; ?>">
                                        <i class="align-middle" data-feather="<?php echo $DataFeather; ?>"></i> <?php echo $Mensaje; ?>
                                    </h4>
                                
                                    <h4 class="text-info">
                                        Los campos con <i class="align-middle me-2" data-feather="command"></i> son obligatorios
                                    </h4> 
                                </div>

                                <?php } ?>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-0">Denominación <i class="align-middle me-2" data-feather="command"></i></h5>
                                        <input type="text" class="form-control" placeholder="Ingresa el nombre" name="Denominacion"
                                        value="<?php echo !empty($_POST['Denominacion']) ? $_POST['Denominacion'] : ''; ?>">
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title mb-0">Pais <i class="align-middle me-2" data-feather="command"></i></h5>
                                        <select class="form-select mb-3" name="IdPaises">
                                            <option value="">Elige una opción</option>
                                             <?php  $selected='';
                                                for ($i=0 ; $i < $CantidadPaises ; $i++) {
                                                    if (!empty($_POST['IdPaises']) && $_POST['IdPaises'] ==  $ListadoPaises[$i]['ID']) {
                                                        $selected = 'selected';
                                                    }else {
                                                        $selected='';
                                                    }
                                                    ?>
                                                    <option value="<?php echo $ListadoPaises[$i]['ID']; ?>" <?php echo $selected; ?>  >
                                                       <?php echo $ListadoPaises[$i]['DENOMINACION'] ; ?>
                                               </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title mb-0">Observaciones</h5>
                                        <textarea class="form-control"  rows="2" placeholder="Comentarios generales..." name="Observaciones"><?php echo !empty($_POST['Observaciones']) ? $_POST['Observaciones'] : ''; ?></textarea>
                                    </div>
                                   
                                    <input type="submit"  class="btn btn-primary" value="Registrar Datos" name="BotonRegistrarEmpresa" />

                                </div>
                                </form>
                        </div>

                    </div>

                </div>
            </main>
      <?php require_once 'secciones/footer.php';?>
        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>