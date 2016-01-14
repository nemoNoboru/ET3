<?php
  // Consulta de Titulaciones por Raul Villar Ramos
  session_start(); // se inicia el manejo de sesiones

  //Cancerbero
  require_once '../cancerbero/cancerbero.php';
  $cerb = new Cancerbero('AP_ConsultaTitulaciones');
  $cerb->handleAuto();


  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../cancerbero/php/DBManager.php'; // se carga el driver de cancerbero
  require_once 'navbar.php'; //Inclusi�n de navbar. Omitible si no la necesita
  require_once '../model/driver.php'; //Inclusi�n de Driver de las clases de "model". Omitible si no las usamos
  require_once '../model/Titulacion.php';
  require_once 'comboboxes.php';


  //Instanciacion de Driver
  $db = Driver::getInstance(); //Esto permite el uso de las clases de "model" (Usuario.php, Apunte.php etc...)

  //Instancias
  $titulaciones = new Titulacion($db);
  $titulaciones= $titulaciones->all();



  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderPlantilla = new TemplateEngine();
  $renderPlantilla->status = "<br/>"; //Se usa este campo para mostrar mensajes de error o avisos, salto de l�nea por defecto



  //FUNCIONES DEL CONTROLADOR
  //visualiza Titulaciones y permite insercion o borrado a traves de ficheros auxiliares.


  //RENDERIZADO FINAL
  $renderPlantilla->titulaciones = $titulaciones;
  $renderMain->title = "Consulta de Titulaciones"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserci�n de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderPlantilla->render('consultaTitulaciones_v.php'); //Inserci�n del contenido de la p�gina

  echo $renderMain->renderMain(); // Dibujado de la p�gina al completo

 ?>
