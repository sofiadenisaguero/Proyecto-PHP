<?php 

function InsertarProyecto($vConexion) {

    $UsuarioSesion = $_SESSION['Usuario_Id'];

   
    $Prioridad = isset($_POST['Prioridad']) ? '1' : '0';

    $SQL_Insert="INSERT INTO Proyectos (IdEmpresas, IdUsuarios, Observaciones, DenominacionProyecto, IdEstado, FechaActual, Prioridad, IdUsuarioSesion)

    VALUES ('".$_POST['IdEmpresas']."' , '".$_POST['IdUsuarios']."', '".$_POST['Observaciones']."' , '".$_POST['DenominacionProyecto']."' , 1 , NOW(), $Prioridad, '".$UsuarioSesion."')";
//EL NUMERO 1 CORRESPONDE AL ESTADO "ANALISIS INICIADO"


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //SI HAY ERROR, SE FINALIZA EL SCRIPT Y SE MUESTRA UN MENSAJE
        die ('<h4>Consulta: '. $SQL_Insert.'</h4> <p style="color: #ff0000">'.mysqli_error($vConexion) .'</p>'  ) ;
    }

    return true;
}
?>