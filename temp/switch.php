<?php

   error_reporting(E_ALL ^ E_NOTICE);
   $mn = $_GET["mn"];
   switch ($mn) {
      case 'administracion':
         $contenido = "secciones/main_administracion.php";
         $titulo = "[ADMINISTRACIÓN] Sistema de Condominio Mene Grande";
         break;

      case 'propietario':
         $contenido = "secciones/main_propietario.php";

         $titulo = "[PROPIETARIO] Sistema de Condominio Mene Grande";
         break;

      case 'inmueble':
         $contenido = "secciones/inmueble.php";
         $titulo = "[PROPIETARIO] Sistema de Condominio Mene Grande";
         break;

      case 'proveedores':
         $contenido = "secciones/proveedores.php";
         $titulo = "[ADMINISTRACIÓN}] Sistema de Condominio Mene Grande";
         break;


      case 'pagos':
         $contenido = "secciones/pagos.php";
         $titulo = "[PROPIETARIO] Sistema de Condominio Mene Grande";
         break;


      default:
         if($_SESSION["autentificado1"]){ 
            $contenido = "secciones/main_propietario.php"; 
            $titulo = "Gestor de ayuda para La Comisión";
         } 
         else if($_SESSION["autentificado2"]){ 
            $contenido = "secciones/main_administracion.php"; 
            $titulo = "Gestor de ayuda para La Comisión";
         }
      break;
   }
?>

