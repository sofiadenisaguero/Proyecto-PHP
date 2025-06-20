<?php
function Listar_Proyectos($vConexion) {
     
    $Listado=array();

    $SQL = "SELECT P.Id, P.IdEmpresas, P.IdUsuarios, P.DenominacionProyecto, P.IdEstado, P.FechaActual, PA.Imagen AS ImagenPais, U.Foto AS FotoUsuario, U.Nombre AS NombreUsuario, U.Apellido AS ApellidoUsuario, E.Denominacion AS NombreEmpresa
    FROM Proyectos P, Usuarios U, Empresas E, Estados ES, Paises PA 
    WHERE  P.IdEmpresas = E.Id AND  P.IdUsuarios = U.Id AND  P.IdEstado = ES.Id AND E.IdPaises = PA.Id
    ORDER BY P.FechaActual ASC ";

     $rs = mysqli_query($vConexion, $SQL);

     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
             $Proyecto['ID'] = $data['Id'];
             $Proyecto['EMPRESA'] = $data['IdEmpresas'];
             $Proyecto['USUARIOS'] = $data['IdUsuarios'];
             $Proyecto['DENOMINACION_PROYECTO'] = $data['DenominacionProyecto'];
             $Proyecto['ESTADO'] = $data['IdEstado'];
             $Proyecto['FECHA_ACTUAL'] = $data['FechaActual'];

             $Proyecto['NOMBRE_EMPRESA'] = $data['NombreEmpresa'];

             $Proyecto['IMAGEN_PAIS'] = $data['ImagenPais'];
             $Proyecto['FOTO_USUARIO'] = $data['FotoUsuario'];

             $Proyecto['NOMBRE_USUARIO'] = $data['NombreUsuario'];
             $Proyecto['APELLIDO_USUARIO'] = $data['ApellidoUsuario'];

             $Listado[$i] = $Proyecto;
             $i++;
    }

    return $Listado;

}

function Cancelar_Proyecto($vIdProyecto, $vConexion) {
    // ACTUALIZA EL ESTADO DEL PROYECTO A CANCELADO
    $SQL = "UPDATE Proyectos SET IdEstado = 4 WHERE Id = $vIdProyecto";

    // EJECUTAMOS LA CONSULTA     
    if (!mysqli_query($vConexion, $SQL)) {
        return false;
    }
    return true;
}

?>