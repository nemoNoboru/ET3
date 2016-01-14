<?php
  // Compartir nota, creado por FVieira

  session_start(); // se inicia el manejo de sesiones

  //Cancerbero
  require_once '../cancerbero/cancerbero.php';
  $cerb = new Cancerbero('AP_CompartirNota');
  $cerb->handleAuto();

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/driver.php'; //Inclusión de Driver de las clases de "model". Omitible si no las usamos
  require_once '../model/Nota.php';
  require_once '../model/Comparte_Nota.php';
  require_once '../model/Usuario.php';
  require_once 'modal.php';

  //Instanciacion de Driver
  $db = Driver::getInstance();

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderPlantilla = new TemplateEngine();
  $renderPlantilla->modal = null;

  //FUNCIONES DEL CONTROLADOR
  //Comprobamos si se ha pasado un get valido, si existe una nota con esa id y si la id de la nota
  //Que se quiere compartir es del usuario logeado para evitar que se compartan notas no propias
  $nota = new Nota($db);
  if( ! isset($_GET['nota'])){
    header("location: misNotas.php");
  }
  $nota = $nota->findBy('nota_id',$_GET['nota']);
  if( ! $nota ){
    header("location: misNotas.php");
  }else{
    $usuario = new Usuario($db);
    $usuario = $usuario->findBy('user_name',$_SESSION['name'])[0];
    $nota = $nota[0];
    if($nota->getUser_id() != $usuario->getUser_id()){
      header("location: misNotas.php");
    }
  }
  // fin de las comprobaciones
  //control del POST
  if( isset($_POST['usuario']) ){
      $usuarioACompartir = new Usuario($db);
      $usuarioACompartir = $usuarioACompartir->findBy('user_name',$_POST['usuario']);
      if( ! $usuarioACompartir ){
        $renderPlantilla->modal = renderModalError('Usuario inexistente','El nombre de usuario que ha especificado no existe');
      }else{
        $usuarioACompartir = $usuarioACompartir[0];
        $comparte = new Comparte_nota($db);
        $notificacion = new Notificacion($db);
        $comparte->setNota_id($_GET['nota']);
        $comparte->setUser_id( $usuarioACompartir->getUser_id() );
        $notificacion->setUser_id($usuarioACompartir->getUser_id());
        $notificacion->setContenido( $_SESSION['name']. ' ha compartido notas contigo');
        $date = getdate();
        $buffer = $date['year']."-".$date['mon']."-".$date['mday'];
        $notificacion->setFecha($buffer);
        $comparte->save(); //se usa save porque es una tabla sin ids *mire el modelo*
        $notificacion->save();
        $renderPlantilla->modal = renderModalCorrecto('Nota compartida','Se ha compartido correctamente esta nota');
      }
  }
  //RENDERIZADO FINAL
  $renderPlantilla->nota = $_GET['nota'];
  $renderMain->title = "Compartir nota"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderPlantilla->render('comparteNota_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
