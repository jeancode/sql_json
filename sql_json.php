<?php
class sql_json
{

  public $conexion;


  function conectar($server,$user,$pass,$db){
      if($server == ""){
        $server="localhost";
      }
      if($user == ""){
        $user = "root";
      }
      if($pass == ""){
        $pass = "";
      }
      @$this->conexion = mysql_connect($server,$user,$pass);
      mysql_select_db($db,$this->conexion);
    }
    //consulta toda la tabla
    function consulta($tabla){

    $result = mysql_query("SELECT * FROM `$tabla`",$this->conexion);
    $json = array();
    while ($a = mysql_fetch_assoc($result)) {
        $json[] = $a;

    }
    header('Content-Type: application/json');
     return json_encode($json);
  }

  //busqueda por columna
  function buscar($table,$columna,$data){

    $result = mysql_query("SELECT * FROM `$table` WHERE `$columna` LIKE '%$data%'",$this->conexion);
    $contador = 0;
    while ($a = mysql_fetch_assoc($result)) {
        $json[$contador] = $a;
        $contador++;
    }
    header('Content-Type: application/json');
    if($contador > 0){
    return json_encode($json);
    }
   }
   //buscar id

   function buscarID($tabla,$que){

      $sql = "SELECT * FROM `$tabla` WHERE `id` = $que";
      $sql =mysql_query($sql,$this->conexion);
      $json = array();
      while ($a = mysql_fetch_assoc($sql)) {

        $json[]  = $a;
      }
      return json_encode($json[0]);

   }

  //actualizar  segun id
  function actualizar($tabla,$columna,$id,$dato){
    $result = mysql_query("  UPDATE `$tabla` SET `$columna` = '$dato' WHERE `$tabla`.`id` = $id",$this->conexion);
    $contador = 0;
  }
  function nuevo($tabla,$val){
      $result = mysql_query("SELECT * FROM `$tabla`",$this->conexion);
      $num = mysql_num_fields($result);

      mysql_field_name($result,2);
      //no queda mas resultado que genera el propio comando para tabla

      $primario = "INSERT "."  "." INTO `$tabla` ( ";

      for($i = 0;$i <= $num-1;$i++){
          $primario = $primario.  "`".mysql_field_name($result,$i)."`,";
      }

      $primario[(int) strlen($primario) -1] = " ";

      $primario =  $primario." ) VALUES (NULL,";

      //verificamos si los datos colindan  con los de entrada
      $numentrada = sizeof($val)-1;



      if($numentrada > $num-2){
        return "ERROR EXESO DE DATOS";
      }else {
         //damos valor de null al tamaño de registros
         $value = $val;

        for($i = 0; $i <= $num-2;$i++){
            $value[$i] = "null";
        }
        for($i = 0; $i <= sizeof($val)-1;$i++){
           $value[$i] =  $val[$i];
        }

          $v = "";
         for($i = 0; $i <= sizeof($value)-1;$i++){
           $v =  $v."'".$value[$i]."',";
         }
        $v[(int) strlen($v) -1] = " ";
         $sql =  $primario.$v.");";

         //enviamos sentencia

        mysql_query($sql,$this->conexion) or die("error");
      }
  }
  //verificar el registro de la tabala con  la ide de otra tabala
  public $a;
  function nuevoRollo($tabla){
        $this->a =  json_decode($this->consulta($tabla));
  }
  function limpiarRollo(){
      $this->a = "";
  }

  function enrrollar($tabla2,$con){
      $tamaño = sizeof($this->a)-1;
      for($i = 0; $i <= $tamaño;$i++){
         $id =  $this->a[$i]->{$con};
         $this->a[$i]->{$con} =  json_decode($this->buscarID($tabla2,$id));
      }

      

  }

  function desenrrollar(){
    return json_encode($this->a);
  }

}
?>
