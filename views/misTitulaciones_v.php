<!-- Vista para plantilla por Martín Vázquez -->
<div class="col-md-6 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Titulaciones en las que esta matriculado </div>
    <div class="panel-body">
  <p> Aqui se muestra las titulaciones en la que esta actualmente matriculado.
    Puede añadir mas usando la tabla de la derecha o eliminar alguna titulacion usando esta tabla</p>
    <input autocomplete=off class="form-control buscatit" placeholder="Filtrar" type="text" name="name"><br/>
    <hr/>
<form  action="../controllers/deltit.php" class="header box-main" method="post">
  <?php foreach ($misTitulaciones as $key): ?>
    <div class="row box itemtit">
      <span class="izquierda"> <?php echo $key->getTit_name(); ?></span>
      <span class="derecha"><button type="submit" class="glyphicon glyphicon-trash btn btn-danger" type="submit" name="<?php echo $key->getTit_id(); ?>"></button></span>

    </div>
  <?php endforeach; ?>
</form>
</div>
</div>
</div>

<div class="col-md-6 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Todas las titulaciones</div>
    <div class="panel-body">
  <p> Aqui se muestran todas las titulaciones disponibles. Si no encuentra su titulacion contacte con un administrador</p>
  <input autocomplete=off class="form-control buscatit2" placeholder="Filtrar" type="text" name="name"><br/>
  <hr/>
<form action="../controllers/addtit.php" class="header box-main" method="post">
  <?php foreach ($allTitulaciones as $key): ?>
    <div class="row box itemtit2">
      <span class="izquierda"> <?php echo $key->getTit_name(); ?></span>
      <span class="derecha"><button type="submit" class="glyphicon glyphicon-plus btn btn-success" type="submit" name="<?php echo $key->getTit_id(); ?>"></button></span>
    </div>

  <?php endforeach; ?>
</form>
</div>
</div>
</div>
