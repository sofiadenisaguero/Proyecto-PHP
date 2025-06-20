<?php      
function Validar_Empresa() {
    $vMensaje='';
    
    if (strlen($_POST['Denominacion']) < 3) {
        $vMensaje.='Debes ingresar un nombre a la empresa. <br />';
    }
    if (empty($_POST['IdPaises']) ) {
        $vMensaje.='Debes seleccionar un pais. <br />';
    }
    
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]); //QUITAMOS LOS ESPACIOS AL PRINCIPIO Y AL FINAL DE CADA VALOR INTRODUCIDO
        $_POST[$Id] = strip_tags($_POST[$Id]); //ELIMINAMOS POSIBLES ETIQUETAS DE HTML Y PHP
    }


    return $vMensaje;

}

?>