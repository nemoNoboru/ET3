<?php
  // Controlador de administradores de materia por Martín Vázquez

  session_start(); // se inicia el manejo de sesiones

  //Cancerbero
  require_once '../cancerbero/cancerbero.php';
  $cerb = new Cancerbero('AP_AdministradoresMateria');
  $cerb->handleAuto();


  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../cancerbero/php/DBManager.php';
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/driver.php'; //Inclusión de Driver de las clases de "model". Omitible si no las usamos
  require_once '../model/Materia.php';
  require_once '../model/Titulacion.php';
  require_once '../model/Administra.php';
  require_once 'modal.php';
  require_once '../model/Notificacion.php';

  $funcionalidadNum = 'AP_AdministrarMateria';//Esto es así en el dump final de la base de datos. Soy consciente de que es un código cutre

  //Instanciacion de Driver
  $dbm = Driver::getInstance(); //Esto permite el uso de las clases de "model" (Usuario.php, Apunte.php etc...)
  $db = DBManager::getInstance();
  $db->connect();

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderMatAdmin = new TemplateEngine();
  $usuarios = new Usuario($dbm);
  $materias = new Materia($dbm);
  $titulos = new Titulacion($dbm);
  $administradores = new Administra($dbm);
  $renderMatAdmin->status = "<br/>"; //Se usa este campo para mostrar mensajes de error o avisos, salto de línea por defecto


  //FUNCIONES DEL CONTROLADOR
  if(isset($_POST["usuario"])&&isset($_POST["materia"])){
    if(!$administradores->existe($_POST["usuario"],$_POST["materia"])){
      $administradores->setUser_id($_POST["usuario"]);
      $administradores->setMat_id($_POST["materia"]);
      $administradores->create();
      $user = $usuarios->findBy("user_id",$_POST["usuario"]);
      if(!$db->existUserFun($user[0]->getUser_Name(),$funcionalidadNum)){
        $db->insertRelationUserFun($user[0]->getUser_Name(),$funcionalidadNum);
      }
      //Notificación: por Román
      $notificacion = new Notificacion($dbm);
      $date = getdate();
      $buffer = $date["year"]."-".$date["mon"]."-".$date["mday"];
      $mat = $materias->findBy('mat_id',$_POST['materia'])[0]->getMat_Name();
      $notificacion->setFecha($buffer);
      $notificacion->setContenido("Ahora administras ".$mat);
      $notificacion->setUser_id($_POST["usuario"]);
      $notificacion->create();
      //
      $renderMatAdmin->status = renderModalCorrecto("Operación Exitosa", "Nuevos permisos de administración añadidos correctamente");
    }
    else{
      $status = "El usuario ya admministra esta materia";
      $contenido = "El usuario ya tiene permisos de administrador sobre los apuntes de la materia";
      $renderMatAdmin->status = renderModalError($status,$contenido);
    }
  }
  if(isset($_POST["parser"])){
    $eliminar = $_POST["parser"];
    $eliminar = preg_split("/[\s,]+/",$eliminar,null);
    $administradores = $administradores->findBy("user_id", $eliminar[0]);
    $contador=0;
    foreach($administradores as $key){
      $contador=$contador+1;
      if($key->getMat_id()==$eliminar[1]){
        $key->destroy();
        $renderMatAdmin->status = renderModalCorrecto("Eliminado","Eliminación correcta");
      }
    }
    if($contador==1){ //Es decir, si el usuario solo administraba una materia
      $user = $usuarios->findBy("user_id",$eliminar[0]);
      $db->deleteRelationUserFun($user[0]->getUser_Name(),$funcionalidadNum); //Entonces se borra
    }
  }

  $renderMatAdmin->usuarios = $usuarios->all();
  $renderMatAdmin->materias = $materias->all();
  $renderMatAdmin->titulos = $titulos->all();
  $administradores = new Administra($dbm);
  $renderMatAdmin->administradores = $administradores->all();

  //RENDERIZADO FINAL
  $renderMain->title = "Administradores de Materia"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderMatAdmin->render('administradoresMateria_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
