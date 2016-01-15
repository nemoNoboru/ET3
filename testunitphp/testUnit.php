<?php
/*
Test unit para la ET3 configurado por FVieira
*/
error_reporting(E_ERROR);


	require ("SiteCheck.php");
	require ("URLSourceArray.php");
	require ("ReportWriterHTML.php");

	$urlSource = new URLSourceArray(
   		array (
      "./addtieneapunte.php",
      "./deleteTitulacion.php",
      "./home.php",
      "./delApunte.php",
      "./altaMateria.php",
      "./delNota.php",
      "./addmateria.php",
      "./deltieneapunte.php",
      "./delmat.php",
      "./bajaMateria.php",
      "./apuntesComunidad.php",
      "./nuevaNota.php",
      "./mistitulaciones.php",
      "./misApuntes.php",
      "./MisMaterias.php",
      "./consultaTitulaciones.php",
      "./deltit.php",
      "./registro.php",
      "./login.php",
      "./editarNotaAjena.php",
      "./administrarMaterias.php",
      "./altaTitulacion.php",
      "./navbar.php",
      "./editarNota.php",
      "./borrarNotificaciones.php",
      "./comboboxes.php",
      "./administradoresMateria.php",
      "./compartirNota.php",
      "./subirApunte.php",
      "./adminMateria.php",
      "./addtit.php",
      "./misNotas.php"
			)
		);
	$siteCheck = new SiteCheck($urlSource, new ReportWriterHTML(), 1337, "127.0.0.1", "ET3/controllers");
	$siteCheck->runCheck();
?>
