<?php
  //Creado por FVieira

  session_start(); // se inicia el manejo de sesiones

  //Cancerbero
  require_once '../cancerbero/cancerbero.php';
  $cerb = new Cancerbero('AP_EditarNotaAjena');
  $cerb->handleAuto();

  //Includes iniciales
  require_once '../views/templateEngine.php';
  require_once '../model/Nota.php';
  require_once '../model/Usuario.php';
  require_once 'navbar.php';
  require_once '../model/driver.php';

  $db = Driver::getInstance();

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderPlantilla = new TemplateEngine();

  //cargar el usuario
  $renderMain->title = "Editar nota ajena"; //Titulo y cabecera de la pagina
  $nota = null;
  $user = new Usuario($db);
  $user = $user->findBy('user_name',$_SESSION['name'])[0];
  //comprobar la peticion de una nota y que esta exista
  if(!isset($_GET['nota'])){
    header("location: nuevaNota.php");
  }else{
    $nota = new Nota($db);
    $nota = $nota->findBy('nota_id',$_GET['nota']);
    if( ! $nota ){
      header("location: misNotas.php");
    }
    $nota = $nota[0];
    if( ! $user->canEditNota($nota) ){
      header("location: misNotas.php");
    }
    //cargar en la plantilla el contenido de la nota
    $renderPlantilla->nota = $nota->getNota_id();
    $renderPlantilla->titulo = $nota->getNota_name();
    $renderPlantilla->contenido = $nota->getContenido();
  }
  //control de POST, guardar la nota
  if(isset($_POST['editor']) && isset($_GET['nota'])){
    $nota->setNota_name($_POST['title']);
    $nota->setContenido(htmlspecialchars($_POST['editor']));
    $date = getdate();
    $buffer = $date['year']."-".$date['mon']."-".$date['mday'];
    $nota->setFecha($buffer);
    $nota->save();
    header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']); //refrescar la pagina
  }
  //RENDERIZADO FINAL
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderPlantilla->render('editarNotaAjena_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
