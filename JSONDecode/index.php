<?php
    $json = '["marte",["comer","beber","dormir","limpiar"],["ingresar","seleccionar dar de alta","ingresar datos","imprimir registro","firmar"]]';

    $jsonDecode = json_decode($json);
    var_dump($jsonDecode);
    print_r ($jsonDecode);
    echo gettype($jsonDecode[1]);
 ?>
