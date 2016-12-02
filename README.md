# sql_json v1 


Un bello dia libre

framework que permite usar las instancias json como respuesta de consultas simple de mysql

#Importar en php

    include("sql_json.php");
    
 

#nueva instancia de sql_json.php

    $bd = new sql_json;

  


#conectar a base de datos sql_json

     //conectar  ("servidor","user","password","base de datos")
     $bd->conectar("localhost","root","","bdpd");

#nuevo registro
  
    // tabla: tabla al que se le agregara el registro 
    //se reconose automaticamente  los datos a agregar  si exeden los valores de los registros de la tabla devuleve error
    //si se completa la tarea correctamente no devulve nada
    $bd->nuevo("tabla",['hola','as',1]);

#consultas a sql_json

     //consulta de la tabla  regresa en formato json
     $bd->consulta("tabla");

#actualizar
   
    $bd->actualizar("tabla","columna","id","informacion a remplasar");
     
#relacionar tablas  

    $bd->limpiarRollo(); //nos limpia al buffer de enlazes  siempre a un nuevo rollo se limpia le buffer 
    
    $bd->nuevoRollo('tabla1'); //generemos un nuevo rollo  de la tabla primaria
                
    $bd->enrrollar('tabla2','columna1 de tabla 1');//la enrrollamos con una tabla secundaria por medio de id por defecto simepre
    
    $bd->enrrollar('tabla3','columna2 de tabla 2');
    
    //para lanzar el resultado de los rollos
    
    $bd->desenrrollar(); //devulve un json 
