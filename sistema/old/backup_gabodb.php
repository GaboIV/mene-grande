<?php

   $dbhost = 'fdb13.awardspace.net'; $dbuser = '2154036_mgrande'; $dbpass = 'gabo19071991'; $dbname = '2154036_mgrande';

   function backup_tables($host,$user,$pass,$name,$tables = '*') {

      include("../conexion_siscon.php");

      $codigo = substr(md5(rand()),5,10);
      $momento = time();

      $consulta = "INSERT INTO gabodb (momento, md5, tipo) VALUES ('$momento','$codigo','GABODB')";
      if ($ejecutar_consulta = $conexion->query($consulta)) {}

      $link = mysql_connect($host,$user,$pass);
      mysql_select_db($name,$link);
      mysql_query("SET NAMES 'utf-8'");

      //get all of the tables
      if($tables == '*') {
         $tables = array();
         $result = mysql_query('SHOW TABLES');
         while($row = mysql_fetch_row($result)) {
            $tables[] = $row[0];
         }
      } else {
         $tables = is_array($tables) ? $tables : explode(',',$tables);
      }

      $return='<?php $mysqli = new mysqli("localhost", "root", "", "menegrande"); ?>';

      //cycle through
      foreach($tables as $table) {
         $result = mysql_query('SELECT * FROM '.$table);
         $num_fields = mysql_num_fields($result);

         $return.= '<?php if (!$mysqli->query("DROP TABLE IF EXISTS '.$table.'") || !$mysqli->query("';
         $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
         $return.= "\n\n".$row2[1].";\n\n";
         $return.='")){}if (!$mysqli->query(utf8_decode("INSERT INTO '.$table.' VALUES ';

         for ($i = 0; $i < $num_fields; $i++) {
            $vuelta=0;

            while($row = mysql_fetch_row($result)) {
               if ($vuelta == 0) {
                  $return.= '(';
               } else {
                  $return.= ',(';
               }

               for($j=0; $j<$num_fields; $j++) {
                  $row[$j] = addslashes($row[$j]);
                  $row[$j] = str_replace("\n","\\n",$row[$j]);

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
      echo "<a href='$variable'></a>";
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

   backup_tables($dbhost,$dbuser,$dbpass,$dbname);

?>