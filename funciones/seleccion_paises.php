<?php
function Listar_Paises($vConexion) {
     
    $Listado=array();

    $SQL = "SELECT P.Id, P.Denominacion, P.Imagen
    FROM Paises P
    ORDER BY P.Denominacion ASC ";

     $rs = mysqli_query($vConexion, $SQL);
        
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
             $Pais['ID'] = $data['Id'];
             $Pais['DENOMINACION'] = $data['Denominacion'];
             $Pais['IMAGEN_PAIS'] = $data['Imagen'];

            
             $Listado[$i] = $Pais;
             $i++;
    }

    return $Listado;

}
?>