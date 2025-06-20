<?php 
function DatosLogin($vUsuario, $vClave, $vConexion){
    $Usuario=array();
         

     $SQL="SELECT U.Id, U.Nombre, U.Apellido, U.IdRoles, U.Foto, U.Usuario,
     R.Denominacion as TipoRol
     FROM Usuarios U, Roles R
     WHERE U.IdRoles = R.Id
     AND  Usuario='$vUsuario' AND Clave='$vClave'   ";

    $rs = mysqli_query($vConexion, $SQL);
   
    $data = mysqli_fetch_array($rs) ;

            if (!empty($data)) {
        $Usuario['ID'] = $data['Id'];
        $Usuario['NOMBRE'] = $data['Nombre'];
        $Usuario['APELLIDO'] = $data['Apellido'];
        $Usuario['ROL'] = $data['IdRoles'];
        $Usuario['TIPO_ROL'] = $data['TipoRol'];
        $Usuario['USUARIO'] = $data['Usuario'];
 
//ACÁ LE ASIGNO UNA FOTO POR DEFECTO EN CASO DE QUE NO SE ASIGNE UNA AL USUARIO
        if (empty( $data['Foto'])) {
            $data['Foto'] = 'spalacios.png'; 
        }
        $Usuario['FOTO'] = $data['Foto'];
        
    }
    return $Usuario;
}

?>