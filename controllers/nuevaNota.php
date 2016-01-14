<?php
  // Plantilla de creación de un controlador por Martín Vázquez

  session_start(); // se inicia el manejo de sesiones

  //Cancerbero
  require_once '../cancerbero/cancerbero.php';
  $cerb = new Cancerbero('AP_NuevaNota');
  $cerb->handleAuto();

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../model/Nota.php';
  require_once '../model/Usuario.php';
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/driver.php'; //Inclusión de Driver de las clases de "model". Omitible si no las usamos

  //Conexion a la BD (Permite usar las funciones de DBManager de Cancerbero)
  $db = Driver::getInstance();

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderPlantilla = new TemplateEngine();

  //FUNCIONES DEL CONTROLADOR
  //Escribimos aquí lo que hace este controlador en concreto (Comprueba el login, redirecciona...)
  $renderMain->title = "Nueva Nota"; //Titulo y cabecera de la pagina

  if(isset($_POST['editor'])){
    $user = new Usuario($db);
    $user = $user->findBy('user_name',$_SESSION['name'])[0];
    $nota = new Nota($db);
    $nota->setNota_name($_POST['title']);
    $nota->setContenido(htmlspecialchars($_POST['editor']));
    $nota->setUser_id($user->getUser_id());
    $date = getdate();
    $buffer = $date['year']."-".$date['mon']."-".$date['mday'];
    $nota->setFecha($buffer);
    $nota->create();
    header("location: editarNota.php?nota=".$nota->getNota_id());
  }
  //RENDERIZADO FINAL
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderPlantilla->render('nuevaNota_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
