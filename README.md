# sql_json
framework que permite usar las instancias json como respuesta de consultas simple y facil 

#Importar en php
<?php

    include("sql_json.php");
    
  
?>

#nueva instancia de sql_json.php

<?php

    include("sql_json.php");
    $bd = new sql_json;

  
?>

#conectar a base de datos sql_json

<?php

     include("sql_json.php");
     $bd = new sql_json;
      //conectar  ("servidor","user","password","base de datos")
     $bd->conectar("localhost","root","","bdpd");
?>

#consultas a sql_json

<?php

     include("sql_json.php");
     $bd = new sql_json;
     $bd->conectar("localhost","root","","bdpd");
     //consulta de la tabla  regresa formato json
     $bd->consulta("materias");
?>

