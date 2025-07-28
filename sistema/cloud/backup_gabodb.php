<?php 
ob_start();
//You should test your script, once confirmed all working, add '@' in front of all 'mysqli' commands to stop any errors being displayed.

//Script Variables

//I have this in a file elsewhere, makes it easier to keep consistent across pages.
$user = "2154036_mgrande"; $pass = "gabo19071991"; $host = "fdb13.awardspace.net"; $db   = "2154036_mgrande";
$conn = mysqli_connect($host,$user,$pass,$db);

backup_tables($conn);

/* backup the whole db by default ('*') OR a single table ('tableName') */
function backup_tables($conn,$tables = '*') {
  error_reporting(0);
  include("../conexion_siscon.php");

    $codigo = substr(md5(rand()),5,10);
    $momento = time();

    $consulta = "INSERT INTO gabodb (momento, md5, tipo) VALUES ('$momento','$codigo','GABODB')";
    if ($ejecutar_consulta = $conexion->query($consulta)) {}
    
  //get all of the tables
  if($tables == '*') {
    $tables = array();
    $result = mysqli_query($conn,'SHOW TABLES');
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
      $tables[] = $row[0];
    }
  } else {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }

  //cycle through data
  $return = '<?php include("../../conexion_siscon.php"); $mysqli = $conexion; ?>';


  foreach($tables as $table) {
    $result = mysqli_query($conn,'SELECT * FROM '.$table);
    $num_fields = mysqli_num_fields($result);

    $return.= '<?php if (!$mysqli->query("DROP TABLE IF EXISTS '.$table.'") || !$mysqli->query("';
    $row2 = mysqli_fetch_row(mysqli_query($conn,'SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";
    $return.='")){}if (!$mysqli->query(utf8_decode("INSERT INTO '.$table.' VALUES ';

    for ($i = 0; $i < $num_fields; $i++) {
      $vuelta=0;

      while($row = mysqli_fetch_row($result)) {
        if ($vuelta == 0) {
            $return.= '(';
         } else {
            $return.= ',(';
         }
        
        for($j=0; $j<$num_fields; $j++) {
          $row[$j] = addslashes($row[$j]);
          //$row[$j] = preg_replace("\n","\\n",$row[$j]);
          
          if (isset($row[$j])) {
            $return.= "'".utf8_encode($row[$j])."'" ;
          } else {
             $return.= "''"; 
          }
          if ($j<($num_fields-1)) {
            $return.= ',';
          }
        }
        $return.= ")";
        $vuelta++;
      }
    }
    $return.=';"))){} ?>';
    $return.="\n\n\n";
  }

  //save file
  $handle = fopen('backup_gabodb/menegrande-db-'.$momento.'-'.$codigo.'.gabodb','w+');
   $variable = 'backup_gabodb/menegrande-db-'.$momento.'-'.$codigo.'.gabodb';  
   fwrite($handle,$return);
   fclose($handle);

   $extensiones = array("gabodb");
      $f = $variable;
      /*if(strpos($f,"../temp")!==false) {
         die("No puedes navegar por otros directorios");
      }*/
      $ftmp = explode(".",$f);
      $fExt = strtolower($ftmp[count($ftmp)-1]);

      if(!in_array($fExt,$extensiones)) {
         die("<b>ERROR!</b> no es posible descargar archivos con la extensión $fExt");
      }

      header("Content-type: application/octet-stream");
      header("Content-Disposition: attachment; filename=\"$f\"\n");
      $fp=fopen("$f", "r");
      fpassthru($fp);
  
}
ob_end_flush();
 ?>