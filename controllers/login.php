<?php
  // Controlador de login hecho por FVieira.
  session_start(); // se inicia el manejo de sesiones


  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../cancerbero/php/DBManager.php'; // se carga el driver de cancerbero
  require_once 'navbar.php';
  require_once 'modal.php';

  if(isset($_SESSION['name'])){ // si ya esta logeado que no se vuelva a logear
    header("location: home.php");
  }

  $db = DBManager::getInstance();
  $db->connect();
  $renderMain = new TemplateEngine();
  $renderlogin = new TemplateEngine(); //instancias de TemplateEngine
  $renderlogin->status = null; //por defecto no hay ningun error (en la plantilla login_v la variable $status valdrá <br/>)

  if(isset($_POST['name'])&&isset($_POST['pass'])){ // si ya se hizo algun post
    if($db->tryLogin($_POST['name'],$_POST['pass'])){ //comprueba los datos nombre de Usuario y contrseña
      $_SESSION["name"] = $_POST['name'];
      header("location: home.php");
    }
    $status = "Usuario y/o contraseña invalido";
    $contenido = "Por favor, compruebe sus datos de acceso y compruebe si no tiene la tecla bloq mayus activada";
    $renderlogin->status = renderModalError($status,$contenido);
  }
  $renderMain->title = "Login";
  $renderMain->navbar = renderNavBar();

  $renderMain->content = $renderlogin->render('login_v.php'); //que inserte en la variable $content de la plantilla main.php el resultado de renderizar login_v.php
  echo $renderMain->renderMain(); //renderiza main y escribe la pagina

 ?>
