<div class="col-md-4 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Atajos</div>
    <div class="panel-body">
      <a href="nuevaNota.php" class="btn btn-lg btn-success btn-block btn-lg" style="padding-top: 75px;padding-bottom: 75px">Crea nueva nota</a>
      <br/>
      <a href="subirApunte.php" class="btn btn-lg btn-success btn-block" style="padding-top: 75px;padding-bottom: 75px">Subir un apunte</a>
    </div>
  </div>
</div>
<div class="col-md-8 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Ultimos apuntes subidos</div>
    <div class="panel-body">
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
    </div>
  </div>
</div>
