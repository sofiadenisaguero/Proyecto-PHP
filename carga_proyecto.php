<?php
require_once 'funciones/verificarUsuarioLogueado.php';

require_once 'funciones/conexion.php';


//LOS PARAMETROS YA ESTAN DEFINIDOS POR DEFECTO
$MiConexion = ConexionBD();

//LLAMO LOS SCRIPTS NECESARIOS
require_once 'funciones/seleccion_lideres.php';
require_once 'funciones/validarProyecto.php';
require_once 'funciones/insertarProyecto.php';
require_once 'funciones/seleccion_empresas.php';


//LISTO LIDERES Y EMPRESAS

$ListadoEmpresas = Listar_Empresas($MiConexion);
$CantidadEmpresas = count($ListadoEmpresas);


$ListadoLideres = Listar_Lideres($MiConexion);
$CantidadLideres = count($ListadoLideres);
  

$Mensaje='';
$Estilo='text-danger';
$DataFeather= 'alert-circle';
if (!empty($_POST['BotonRegistrarProyecto'])) {

    //VALIDO LOS DATOS
    $Mensaje=Validar_Proyecto();
    if (empty($Mensaje)) {
        if (InsertarProyecto($MiConexion) != false) {
            $Mensaje = 'Registro cargado correctamente.';
            $_POST = array(); 
            $Estilo = 'text-success'; 
            $DataFeather= 'check-square';
            
        }else{
            $Mensaje='No se pudo guardar el proyecto.';

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
                        <h1 class="h3 mb-3"><strong>Proyectos</strong> Cargar nuevo.  </h1>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">

                                <div class="card">

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
                                    <div class="card-body">
                                        <h5 class="card-title mb-0">Denominación <i class="align-middle me-2" data-feather="command"></i></h5>
                                        <input type="text" class="form-control" name="DenominacionProyecto" placeholder="Ingresa el nombre del Proyecto"
                                        value="<?php echo !empty($_POST['DenominacionProyecto']) ? $_POST['DenominacionProyecto'] : ''; ?>">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mb-0">Empresa <i class="align-middle me-2" data-feather="command"></i></h5>
                                        <select class="form-select mb-3" name="IdEmpresas">
                                            <option value="">Para quien trabajaremos...</option>
                                            <?php  $selected='';
                                                for ($i=0 ; $i < $CantidadEmpresas ; $i++) {
                                                    if (!empty($_POST['IdEmpresas']) && $_POST['IdEmpresas'] ==  $ListadoEmpresas[$i]['ID']) {
                                                        $selected = 'selected';
                                                    }else {
                                                        $selected='';
                                                    }
                                                    ?>
                                                    <option value="<?php echo $ListadoEmpresas[$i]['ID']; ?>" <?php echo $selected; ?>  >
                                                       <?php echo $ListadoEmpresas[$i]['DENOMINACION'] ; ?>
                                               </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title mb-0">Líder <i class="align-middle me-2" data-feather="command"></i></h5>
                                        <select class="form-select mb-3" name="IdUsuarios" >
                                            <option value=""> Selecciona una opción</option>

                                            <?php 
                                             $selected='';
                                             for ($i=0 ; $i < $CantidadLideres ; $i++) {
                                                 if (!empty($_POST['IdUsuarios']) && $_POST['IdUsuarios'] ==  $ListadoLideres[$i]['ID']) {
                                                     $selected = 'selected';
                                                 }else {
                                                     $selected='';
                                                 }
                                                 ?>
                                                 <option value="<?php echo $ListadoLideres[$i]['ID']; ?>" <?php echo $selected; ?>  >
                                                    <?php echo $ListadoLideres[$i]['APELLIDO'] . ', ' . $ListadoLideres[$i]['NOMBRE']; ?>
                                            </option>
                                             <?php } ?>
                                        </select>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title mb-0">Observaciones</h5>
                                        <textarea class="form-control"  rows="2" placeholder="Observaciones del tema..." name="Observaciones"> <?php echo !empty($_POST['Observaciones']) ? $_POST['Observaciones'] : ''; ?></textarea>
                                    </div>
                                    <div class="card-body">
                                        <label class="form-check">
                                            <input class="form-check-input"  type="checkbox" name="Prioridad" value="1" <?php echo (!empty($_POST['Prioridad']) && $_POST['Prioridad'] == '1') ? 'checked':''; ?>>
                                            <span class="form-check-label">
                                                Tildar si es solicitado con prioridad 
                                            </span>
                                        </label>
                                    </div>
                                    <input type="submit"  class="btn btn-primary" value="Registrar Datos" name="BotonRegistrarProyecto" />

                                </div>
                     </form>
                        </div>

                    </div>

                </div>
            </main>

<?php require_once 'secciones/footer.php'; ?>

        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>