<?php
function Listar_Usuarios($vConexion) {
     
    $Listado=array();

    $SQL = "SELECT U.Id, U.Nombre, U.Apellido, U.Usuario, U.IdRoles, U.Foto,
    R.Denominacion as TipoRol
    FROM Usuarios U, Roles R
    WHERE  U.IdRoles = R.Id
    ORDER BY U.Id ASC ";

     $rs = mysqli_query($vConexion, $SQL);
        
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
             $Usuario['ID'] = $data['Id'];
             $Usuario['NOMBRE'] = $data['Nombre'];
             $Usuario['APELLIDO'] = $data['Apellido'];
             $Usuario['ROL'] = $data['IdRoles'];
             $Usuario['TIPO_ROL'] = $data['TipoRol'];
             $Usuario['USUARIO'] = $data['Usuario'];
             
             $Usuario['FOTO'] = $data['Foto'];
             
             if (empty($Usuario['FOTO'])) {
               $Usuario['FOTO'] = 'spalacios.png';
             }

             $Listado[$i] = $Usuario;
             $i++;
    }

    return $Listado;

}
?>