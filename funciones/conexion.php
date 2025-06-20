<?php
      
//ESTOS SON LOS PARAMETROS POR DEFECTO MENCIONADS

function ConexionBD($Host = 'localhost' ,  $User = 'root',  $Password = '', $BaseDeDatos='consultora' ) {

    //INTENTAMOS HACER LA CONEXION

    $linkConexion = mysqli_connect($Host, $User, $Password, $BaseDeDatos);
    if ($linkConexion!=false) 
        return $linkConexion;
    else 
        die ('No se pudo establecer la conexión.');

}
?>
