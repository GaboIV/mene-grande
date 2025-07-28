<?php
date_default_timezone_set('America/New_York');
\ = 'db';
\ = 'menegrande_user';
\ = 'menegrande_pass';
\ = 'menegrande';
\ = new mysqli(\, \, \, \);
if (\->connect_error) {
    die('Error de conexion: ' . \->connect_error);
}
?>
