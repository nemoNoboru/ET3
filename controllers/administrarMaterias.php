<?php
// Controlador de administrar Materias por Rui Caramés
  session_start(); // se inicia el manejo de sesiones

  //Cancerbero
  require_once '../cancerbero/cancerbero.php';
  $cerb = new Cancerbero('AP_AdministrarMaterias');
  $cerb->handleAuto();


  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../model/Materia.php';
  require_once '../model/Titulacion.php';
  require_once '../model/driver.php';
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once 'comboboxes.php';
  require_once 'modal.php';


  //Conexion a la BD
  $db = Driver::getInstance(); // incializa BD
  $dbm = DBManager::getInstance();
  $dbm->connect();

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine(); // inicializa render
  $renderAll = new TemplateEngine(); // inicializa render
  $renderPlantilla = new TemplateEngine(); // inicializa render
  $materias = new Materia($db); // inicializa objeto Materia
  $titulos = new Titulacion($db); // inicializa objeto Titulacion


  $allMaterias = $materias->all();// coge todas las materias
  $renderAll->titulos = $titulos->all();// el render coge todas las titulaciones
  $renderPlantilla->titulacion = titulacionRenderComboBox();// el render coge el combobox de titulaciones
  $renderAll ->modal = null;; // inicializa render
  $renderAll->admin=0;

  if($dbm->existUserRol($_SESSION["name"],"AdminApuntorium")){
      $renderAll->admin=1; //el usuario es administrador
  }


  if( isset($_POST['titulacion'])){ // si se presiono el boton Filtrar
     if($_POST['titulacion'] != "nil"){ // si se selecciono una titulacion
       $titulacionfiltro = new Titulacion($db); // inicializa objeto Titulacion
       $titulacionfiltro = $titulacionfiltro->findBy('tit_id',$_POST['titulacion']); // coge la titulaciom que se corresponde con el valor de la titulación por la que se filtro
       if($titulacionfiltro){
          $titulacionfiltro= $titulacionfiltro[0]; // se cogela primera titulacion (la unica que hay)

           foreach ($allMaterias as $key => $mat) {
             if($mat->getTit_id() != $titulacionfiltro->getTit_id()){ //si alguna de los id´s de titulación de las materias del array allMaterias no coincide con el id de la titulación por la que se filtro
               unset($allMaterias[$key]); // se elimina la materia del array
             }
           }
       }
    }
  }
  $renderAll->allMaterias = $allMaterias;// el render coge las materias
  $renderMain->title = "Materias"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderAll->render('administrarMaterias_v.php'); //Inserción del contenido de la página
  echo $renderMain->renderMain(); // Dibujado de la página al completo
 ?>
