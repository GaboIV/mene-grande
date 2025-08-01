<?php

   error_reporting(E_ALL ^ E_NOTICE);
   $mn = $_GET["mn"];
   
   // Determinar el menú basado en el rol del usuario
   if (AuthHelper::isAdmin()) {
       $_SESSION['menu_es'] = "menu_administrador.php";
   } else {
       $_SESSION['menu_es'] = "menu_propietario.php";
   }
   
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
         $titulo = "[ADMINISTRACIÓN] Sistema de Condominio Mene Grande";
         break;

      case 'pagos':
         $contenido = "secciones/pagos.php";
         $titulo = "[PROPIETARIO] Sistema de Condominio Mene Grande";
         break;

      default:
         if (AuthHelper::isPropietario()) { 
            $contenido = "secciones/main_propietario.php"; 
            $titulo = "Gestor de ayuda para La Comisión";
         } 
         else if (AuthHelper::isAdmin()) { 
            $contenido = "secciones/main_administracion.php"; 
            $titulo = "Gestor de ayuda para La Comisión";
         }
         else {
            // Fallback por defecto
            $contenido = "secciones/main_propietario.php";
            $titulo = "Sistema de Condominio Mene Grande";
         }
      break;
   }
?>

