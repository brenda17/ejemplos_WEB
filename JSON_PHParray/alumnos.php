<?php
  $nombre = '"Nombre1"';
  $alumnos = array(
            array("nombre" => $nombre,"ap1" => "ApellidoPAterno1", "ap2" => "ApellidoMaterno1"),
            array("nombre" => "nombre2","ap1" => "ApellidoPAterno2", "ap2" => "ApellidoMaterno2"),
  );

  echo json_encode($alumnos);
 ?>
