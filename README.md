# sql_json v1 

#Nacimiento Un bello dia libre 

framework que permite usar las instancias json como respuesta de consultas simple y facil 

#Importar en php

    include("sql_json.php");
    
  


#nueva instancia de sql_json.php



    include("sql_json.php");
    $bd = new sql_json;

  


#conectar a base de datos sql_json


     include("sql_json.php");
     $bd = new sql_json;
      //conectar  ("servidor","user","password","base de datos")
     $bd->conectar("localhost","root","","bdpd");

#nuevo registro
    include("sql_json.php");
    $bd = new sql_json;
    $bd->conectar("localhost","root","","bdpd");
    // tabla: tabla al que se le agregara el registro 
    //se reconose automaticamente  los datos a agregar  si exeden los valores de los registros de la tabla devuleve error
    //si se completa la tarea correctamente no devulve nada
    $bd->nuevo("tabla",['hola','as',1]);

#consultas a sql_json


     include("sql_json.php");
     $bd = new sql_json;
     $bd->conectar("localhost","root","","bdpd");
     //consulta de la tabla  regresa formato json
     $bd->consulta("tabla");

#actualizar
     include("sql_json.php");
     $bd->conectar("localhost","root","","bdpd");
     //tabla: tabla que se va a consultar,columna: columana que se va a editar, id: id de registro a editar, infomacion: infomacion que      va a sustituir
     $bd->actualizar("tabla","columna","id","informacion");
     
#relacionar tablas  

    $bd->limpiarRollo(); //nos limpia al buffer de enlazes  siempre a un nuevo rollo se limpia le bufer 
    
    $bd->nuevoRollo('tabla1'); //generemos un nuevo rollo  de la tabla primaria
                
    $bd->enrrollar('tabla2','columna1 de tabla 1');//la enrrollamos con un tabla secundaria por medio de id por defecto simepre
    
    $bd->enrrollar('tabla3','columna2 de tabla 2');
    
    //para lanzar el resultaado de los rollo se usa la funcion
    
    $bd->desenrrollar(); //devulve un json 
