<!-- Vista para mis Apuntes por Raul Villar -->

<div class="col-md-4 col-sm-12">
  <div class="panel panel-default">
  <div class="panel-heading">Filtrar</div>
  <div class="panel-body">
    <form action="apuntesComunidad.php" method="post">
	<select class="form-control" name="materia">
    <option value="nil" selected> Seleccione una materia </option>
	  <?php foreach($materias as $materia): ?>
	    <option value="<?php echo $materia->getMat_id(); ?>"><?php echo $materia->getMat_name(); ?>(<?php echo $materia->nombreTitulacion(); ?>)</option>
	  <?php endforeach; ?>
	</select><br/>
	  <?php echo $anho; ?>




  <div>
  <button class="btn btn-info btn-block" type="submit"> Filtrar </button>
  </form>
  <a class="btn btn-success btn-block" href='../controllers/subirApunte.php'> Subir un apunte </a>
  </div>
  <br/>
  <p class="text-muted">Nota: si es usted un usuario registrado le apareceran solo las materias a las que esta matriculado</p>
</div>
</div>
</div>
  <!--<div class="col-md-2"></div>-->
  <div class="col-md-8 col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">Apuntes de la comunidad</div>
      <div class="panel-body">
    <form action="addtieneapunte.php" method="post">
      <hr/>
      <?php if($apuntes!='nil'): ?>
      <input autocomplete=off class="form-control buscatit" placeholder="Buscar" type="text" name="name"><br/>
      <?php if(empty($apuntes))echo "<p class='text-center'>No se encontraron apuntes. Cree uno!<p/>"; ?>
    <?php foreach($apuntes as $apunte): ?>
      <div class="box row itemtit">
        <span class="izquierda">
        <span class="apunte lead"><?php echo $apunte->getApunte_name(); ?></span>
        <div class="info autor"><?php echo $apunte->nombreMateria(); ?> (<?php echo $apunte->nombreTitulacion(); ?>), <?php echo $apunte->getAnho_academico(); ?></div>
        <div class="autor"> Autor: <?php echo $apunte->nombreAutor(); ?> </div>
        </span>
        <span class="derecha">
          <a title="abrir" class="btn btn-success" href="../apuntes/<?php echo $apunte->getRuta(); ?>"><span class="glyphicon glyphicon-eye-open"></a>
          <?php if($logged): ?>
          <button type="submit" title="Guardar" class="btn btn-info" type="submit" name="<?php echo $apunte->getApunte_id(); ?>"><span class="glyphicon glyphicon-floppy-disk"></button>
          <?php endif; ?>
        </span>
     </div>
    <?php endforeach; ?>
    </form>
  <?php else: ?>
  <p class="text-center"> Filtre por alguna materia para empezar </p>
<?php endif; ?>
  </div>
</div>
