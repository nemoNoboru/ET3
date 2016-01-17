<?php
  // controlador de mis apuntes por Raul Villar

  session_start(); // iniciar sesion

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../model/driver.php'; // se carga el driver de cancerbero
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/Apunte.php';
  require_once '../model/Materia.php';
  require_once '../model/Usuario.php';
  require_once 'comboboxes.php';
  //Conexion a la BD
  $db = Driver::getInstance();
  //inicio instancias render y creacion de comboboxes
  $apunte = new Apunte($db);
  $materias = new Materia($db);
  $titulaciones = new Titulacion($db);
  if(isset($_SESSION['name'])){
    $usuario = new Usuario($db);
    $usuario = $usuario->findBy('user_name',$_SESSION['name'])[0];
    $materias = $usuario->materias();
  }else{
    $materias = $materias->all();
  }
  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderPlantilla = new TemplateEngine();
  $renderPlantilla->titulos = null;
  $renderPlantilla->materias = $materias;
  $renderPlantilla->anho = anhoRenderComboBox();
  //fin Instancias
  //FUNCIONES DEL CONTROLADOR

    //buscar apuntes de una materia en concreto
    if(isset($_POST['materia']) && $_POST['materia']!='nil'){
      $apuntes = $apunte->findBy('mat_id',$_POST['materia']);

    //filtrar por año
    if($_POST['anho'] != "nil"){
      foreach ($apuntes as $key => $apunte) {
        if($apunte->getAnho_academico() != $_POST['anho']){
          unset($apuntes[$key]);
        }
     }
    }
    $renderPlantilla->apuntes = $apuntes;
  }else{
    $renderPlantilla->apuntes = 'nil'; //si no se ha filtrado por materia no se cargan apuntes
  }
  if(isset($_SESSION['name'])){
    $renderPlantilla->logged = true;
  }else{
    $renderPlantilla->logged = false;
  }
  //RENDERIZADO FINAL

  $renderMain->title = "Apuntes de la comunidad"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderPlantilla->render('apuntesComunidad_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
