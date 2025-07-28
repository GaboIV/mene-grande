
<?php
echo "Su base esta siendo restaurada.......\n<br>";
system("cat copia.sql | mysql --host=localhost --user=root --password= menegrande");
echo "Fin. Su base está emplazada en su alojamiento.";
?>