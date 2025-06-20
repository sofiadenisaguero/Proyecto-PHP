<?php      
function Validar_Proyecto() {
    $vMensaje='';
    
    if (strlen($_POST['DenominacionProyecto']) < 3) {
        $vMensaje.='Debes ingresar un nombre al proyecto. <br />';
    }
    if (empty($_POST['IdEmpresas'])) {
        $vMensaje.='Debes seleccionar una empresa.<br />';
    }
        if (empty($_POST['IdUsuarios'])) {
        $vMensaje.='Debes seleccionar un lider.<br />';
    }
    
    
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]); //QUITAMOS LOS ESPACIOS AL PRINCIPIO Y AL FINAL DE CADA VALOR INTRODUCIDO
        $_POST[$Id] = strip_tags($_POST[$Id]); //ELIMINAMOS POSIBLES ETIQUETAS DE HTML Y PHP
    }


    return $vMensaje;

}

?>