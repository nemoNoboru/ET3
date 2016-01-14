<?php
  // hecho por FVieira durante la reunion semanal
  require_once '../model/driver.php';
  require_once '../model/Usuario.php'; //vamos a registrar un usuario
  require_once '../views/templateEngine.php';
  require_once '../cancerbero/php/DBManager.php';
  require_once 'navbar.php';
  require_once 'modal.php';

  session_start();
  $db = DBManager::getInstance();
  $db->connect();

  $renderMain = new TemplateEngine(); //plantilla main
  $renderRegistro = new TemplateEngine(); // plantilla del registro
  $dbm = Driver::getInstance(); //instanciación de la clase Driver que es un cliente de la db
  $renderRegistro->modal = null;
  if(isset($_POST['name'])&&isset($_POST['pass'])){ //ya nos hicieron un post?
    $usuario = new Usuario($dbm); //crear un nuevo usuario en la bd
    $usuario->setUser_name($_POST['name']);
    $usuario->setUser_pass($_POST['pass']);
    $usuario->setUser_email($_POST['email']);
    if(!$usuario->existeUsuario()){
      $usuario->create();
      $db->insertRelationUserRol($_POST['name'],'UsuarioApuntorium');
      $_SESSION['name'] = $_POST['name'];
      $renderRegistro->modal = renderModalCorrecto("Usuario Registrado correctamente","Te has registrado correctamente, bienvenido a apuntorium.");
    }else{
      $title = "Ya existe un usuario con ese nombre";
      $content = "Seleccione un nombre de usuario diferente y vuelva a probar";
      $renderRegistro->modal = renderModalError($title,$content);
    }
  }

  $renderMain->title = "registro";
  $renderMain->navbar = renderNavBar();
  $renderMain->content = $renderRegistro->render('registro_v.php');
  echo $renderMain->renderMain(); //renderiza y muestra al user


 ?>
