
<?php

   $dbhost = 'fdb13.awardspace.net'; $dbuser = '2154036_mgrande'; $dbpass = 'gabo19071991'; $dbname = '2154036_mgrande';

function backup_tables($host,$user,$pass,$name,$tables = '*')
{

   include("../conexion_siscon.php");

   $codigo = substr(md5(rand()),5,10);
   $momento = time();

   $consulta = "INSERT INTO gabodb (momento, md5, tipo) VALUES ('$momento','$codigo','SQL')";
   if ($ejecutar_consulta = $conexion->query($consulta)) {}
   
   $link = mysql_connect($host,$user,$pass);
   mysql_select_db($name,$link);
   mysql_query("SET NAMES 'utf8'");
   
   //get all of the tables
   if($tables == '*')
   {
      $tables = array();
      $result = mysql_query('SHOW TABLES');
      while($row = mysql_fetch_row($result))
      {
         $tables[] = $row[0];
      }
   }
   else
   {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
   }
   $return='';
   //cycle through
   foreach($tables as $table)
   {
      $result = mysql_query('SELECT * FROM '.$table);
      $num_fields = mysql_num_fields($result);
      
      $return.= 'DROP TABLE IF EXISTS '.$table.';';
      $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      
      for ($i = 0; $i < $num_fields; $i++) 
      {
         while($row = mysql_fetch_row($result))
         {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++) 
            {
               $row[$j] = addslashes($row[$j]);
               $row[$j] = str_replace("\n","\\n",$row[$j]);
               if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
               if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
         }
      }
      $return.="\n\n\n";
   }
   
   //save file
   $handle = fopen('backup_sql/menegrande-db-'.$momento.'-'.$codigo.'.sql','w+');
   $variable = 'backup_sql/menegrande-db-'.$momento.'-'.$codigo.'.sql';   
   echo "<a href='$variable'></a>";
   fwrite($handle,$return);
   fclose($handle);

   header("Location: $variable");
}

backup_tables($dbhost,$dbuser,$dbpass,$dbname);
?>
