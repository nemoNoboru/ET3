<?php
  // Plantilla de creación de un controlador por Martín Vázquez

  session_start(); // se inicia el manejo de sesiones

  //Cancerbero
  require_once '../cancerbero/cancerbero.php';
  $cerb = new Cancerbero('AP_AltaMateria');
  $cerb->handleAuto();

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../cancerbero/php/DBManager.php'; // se carga el driver de cancerbero
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/driver.php'; //Inclusión de Driver de las clases de "model". Omitible si no las usamos
  require_once '../model/Materia.php';
  require_once '../model/Titulacion.php';
  require_once 'modal.php';

  //Conexion a la BD (Permite usar las funciones de DBManager de Cancerbero)
  $db = DBManager::getInstance();
  $db->connect();

  //Instanciacion de Driver
  $dbm = Driver::getInstance(); //Esto permite el uso de las clases de "model" (Usuario.php, Apunte.php etc...)

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderAltaMateria = new TemplateEngine();
  $renderAltaMateria->modal = null;
  $titulos = new Titulacion($dbm);

  //FUNCIONES DEL CONTROLADOR
  if(isset($_POST['materia'])){
    $materia = new Materia($dbm);
    $materia->setMat_name($_POST['materia']);
    $materia->setTit_id($_POST['titulo']);
    $materia->create();
    $titulo =  "Materia creada correctamente";
    $contenido = "La materia ".$materia->getMat_name()." ha sido creada correctamente";
    $renderAltaMateria->modal=renderModal($titulo,$contenido);
  }
  //Escribimos aquí lo que hace este controlador en concreto (Comprueba el login, redirecciona...)

$renderAltaMateria ->titulos = $titulos-> all();

  //RENDERIZADO FINAL
  $renderMain->title = "AltaMateria"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  //$renderSubirApunte->comboboxTitulo = tituloRenderComboBox();
  $renderMain->content = $renderAltaMateria->render('altaMateria_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
