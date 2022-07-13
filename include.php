<?php
// Ici je retrouve TOUTES les classes
// On met toujours nos classes objet avant les managers.
// Nous devons bien inclure le fichier DbConnexion avant nos managers
// Nos en managers en hériteront donc il doit absolument être inclu avant


spl_autoload_register(function ($class_name) {
    $folders = [
        'Model/Class/',
        'Controller/',
        'Model/Manager/'
    ];

    foreach ($folders as $folder){
        if(file_exists($folder.$class_name.'.php')){
            require $folder.$class_name.'.php';
            return;
        }
    }
});
?>
