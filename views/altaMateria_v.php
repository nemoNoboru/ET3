
<div class="col-md-4 col-md-offset-4 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Crear nueva materia</div>
    <div class="panel-body">
<form name="form1" method= "POST" action="altaMateria.php">
  <p> Cubra los siguientes campos para dar de alta una materia:</p>

  <input class="form-control" required pattern="[A-z 0-9]{1,24}" type="text" name="materia" size="40" placeholder="Materia"><br/>

  <select class="form-control" name="titulo">

    <?php foreach($titulos as $titulo): ?>
      <option value="<?php echo $titulo->getTit_id(); ?>"> <?php echo $titulo->getTit_name(); ?></option>
    <?php endforeach; ?>

  </select><br/>

  <input class="btn btn-block btn-success" type="submit" value="Crear">
</form>
</div>
</div>
</div>
<?php echo $modal; ?>
