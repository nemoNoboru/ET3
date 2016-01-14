<?php
  // controlador de mis notas por Raul Villar
  session_start(); // iniciar sesion

  //Cancerbero
  require_once '../cancerbero/cancerbero.php';
  $cerb = new Cancerbero('AP_MisNotas');
  $cerb->handleAuto();

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../model/driver.php'; // se carga el driver de cancerbero
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/Usuario.php';
  require_once '../model/Nota.php';
  require_once 'comboboxes.php';

  //Conexion a la BD
  $db = Driver::getInstance();
  //inicio instancias render y creacion de comboboxes
  $usuario = new Usuario($db);
  $usuario = $usuario->findBy('user_name',$_SESSION['name']);
  $usuario = $usuario[0];


  $notas = $usuario->notas();

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderPlantilla = new TemplateEngine();
  $renderPlantilla->anho = anhoRenderComboBox();
  //fin Instancias

  //FUNCIONES DEL CONTROLADOR
  //Este controlador va a comprobar que un usuario en una fecha dada visualice sus notas.
  //Ahora se va a controlar que solo se muestren las fechas solicitadas.
  //En primer lugar compruebo que ya tenemos un post, sino por defecto listo todo :^)
  if(isset($_POST['anho'])){
    if($_POST['anho'] != "nil"){
      foreach($notas as $key => $nota){
        list($ano,$mes,$dia) = explode("-", $nota->getFecha());
        if($ano != $_POST['anho']){
          unset($notas[$key]);
        }
      }
    }
  }

  if(isset($_POST['mes'])){
    if($_POST['mes'] != "nil"){
      foreach($notas as $key => $nota){
        list($ano,$mes,$dia) = explode("-", $nota->getFecha());
        if($mes != $_POST['mes']){
          unset($notas[$key]);
        }
      }
    }
  }

  //RENDERIZADO FINAL
  //primero paso las variables y despues dibujo
  $renderPlantilla->notas = $notas;
  $renderPlantilla->notasCompartidas = $usuario->notasCompartidas();
  $renderMain->title = "Mis Notas"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderPlantilla->render('misNotas_v.php'); //Inserción del contenido de la página
  echo $renderMain->renderMain(); // Dibujado de la página al completo
 ?>
