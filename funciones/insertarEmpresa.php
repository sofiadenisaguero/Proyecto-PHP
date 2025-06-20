<?php 
function InsertarEmpresa($vConexion) {
   
  
    $SQL_Insert="INSERT INTO Empresas (Denominacion, IdPaises, Observaciones, FechaActual, IdUsuarioSesion)
    VALUES ('".$_POST['Denominacion']."' , '".$_POST['IdPaises']."', '".$_POST['Observaciones']."' , NOW(), '".$_SESSION['Usuario_Id']."')";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //SI HAY ERROR, SE FINALIZA EL SCRIPT Y SE MUESTRA UN MENSAJE
        die ('<h4>Consulta: '. $SQL_Insert.'</h4> <p style="color: #ff0000">'.mysqli_error($vConexion) .'</p>'  ) ;
    }

    return true;
}
?>