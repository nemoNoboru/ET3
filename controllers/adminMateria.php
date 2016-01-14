<?php
  //Controlador para administrar los apuntes de una materia por Martín Vázquez

  session_start(); // se inicia el manejo de sesiones

//Cancerbero
require_once '../cancerbero/cancerbero.php';
$cerb = new Cancerbero('AP_AdminMateria');
$cerb->handleAuto();

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../cancerbero/php/DBManager.php'; // se carga el driver de cancerbero
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/driver.php'; //Inclusión de Driver de las clases de "model". Omitible si no las usamos
  require_once '../model/Apunte.php';

  //Conexion a la BD (Permite usar las funciones de DBManager de Cancerbero)
  $db = DBManager::getInstance();
  $db->connect();

  //Instanciacion de Driver
  $dbm = Driver::getInstance(); //Esto permite el uso de las clases de "model" (Usuario.php, Apunte.php etc...)

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderAdminMateria= new TemplateEngine();

  $renderAdminMateria->status = "<br/>"; //Se usa este campo para mostrar mensajes de error o avisos, salto de línea por defecto


  //FUNCIONES DEL CONTROLADOR
  if(isset($_GET["mat"])){
    $renderAdminMateria->mat = $_GET["mat"];
    $apuntes = new Apunte($dbm);
    $renderAdminMateria->apuntes = $apuntes->findBy("mat_id",$_GET["mat"]);
  }
  else{
    $renderAdminMateria->status = 'Ups... esta no es la página que estás buscando  <a class="btn btn-default" href="home.php">Volver al inicio</a>';
  }


  //RENDERIZADO FINAL
  $renderMain->title = "Administrar Materias"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderAdminMateria->render('adminMateria_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
