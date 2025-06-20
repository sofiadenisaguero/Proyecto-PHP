<?php
function Listar_Lideres($vConexion) {
     
    $Listado=array();

    $SQL = "SELECT U.Id, U.Nombre, U.Apellido, U.IdRoles, 
    R.Denominacion as TipoRol
    FROM Usuarios U, Roles R
    WHERE  U.IdRoles = R.Id 
    AND R.Denominacion = 'Lider'
    ORDER BY U.Apellido ASC, U.Nombre ASC ";

     $rs = mysqli_query($vConexion, $SQL);
   
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
             $Usuario['ID'] = $data['Id'];
             $Usuario['NOMBRE'] = $data['Nombre'];
             $Usuario['APELLIDO'] = $data['Apellido'];

             $Listado[$i] = $Usuario;

             $i++;
    }

    return $Listado;

}
?>