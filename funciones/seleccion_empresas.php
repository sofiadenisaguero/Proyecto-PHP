<?php
function Listar_Empresas($vConexion) {
     
    $Listado=array();

    $SQL = "SELECT E.Id, E.Denominacion, E.IdPaises, E.FechaActual, E.IdUsuarioSesion, P.Imagen AS ImagenPais, U.Foto AS FotoUsuario, U.Nombre AS NombreUsuario, U.Apellido AS ApellidoUsuario
    FROM Empresas E, Paises P, Usuarios U 
    WHERE E.IdPaises = P.Id AND E.IdUsuarioSesion = U.Id
    ORDER BY E.Denominacion ASC";

    //SE LE ASIGNA A LA VARIABLE EL VALOR OBTENIDO DE LA CONSULTA ECHA A LA CONEXION

     $rs = mysqli_query($vConexion, $SQL);

    //SE RECORRE LA MATRIZ

     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
             $Empresa['ID'] = $data['Id'];
             $Empresa['DENOMINACION'] = $data['Denominacion'];
             $Empresa['PAISES'] = $data['IdPaises'];
             $Empresa['FECHA_ACTUAL'] = $data['FechaActual'];
             $Empresa['USUARIO_SESION'] = $data['IdUsuarioSesion'];

             $Empresa['IMAGEN_PAIS'] = $data['ImagenPais'];
             $Empresa['FOTO_USUARIO'] = $data['FotoUsuario'];

             if (empty($Empresa['FOTO_USUARIO'])) {
               $Empresa['FOTO_USUARIO'] = 'spalacios.png';
             }

              $Empresa['NOMBRE_USUARIO'] = $data['NombreUsuario'];
             $Empresa['APELLIDO_USUARIO'] = $data['ApellidoUsuario'];

             $Listado[$i] = $Empresa;

             $i++;
    }

    return $Listado;

}
?>