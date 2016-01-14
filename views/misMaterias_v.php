<!-- Vista para mis Materias por Daniel de Alonso-->
<div class="col-md-6 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Materias en las que esta matriculado</div>
    <div class="panel-body">
  <p> Aqui se muestran las Materias en las que esta actualmente matriculado.
    Puede añadir mas usando haciendo click en el boton o eliminar alguna Materia usando esta tabla</p>
    <hr/>
    <input autocomplete=off class="form-control buscatit2" placeholder="Filtrar" type="text" name="name"><br/>
<form action="../controllers/delmat.php" class="header box-main" method="post">
  <?php foreach ($misMaterias as $key): ?>
    <div class="row box itemtit">
      <span class="izquierda"> <?php echo $key->getMat_name(); ?> (<?php echo $key->nombreTitulacion(); ?>)</span>
      <span class="derecha"><button type="submit" class="btn btn-danger" type="submit" name="<?php echo $key->getMat_id(); ?>"><span class="glyphicon glyphicon-trash"></span></button></span>
    </div>
  <?php endforeach; ?>
</form>
</div>
</div>
</div>
<div class="col-md-6 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Todas las materias por titulación</div>
    <div class="panel-body">
  <p> se muestran todas las materias de las titulaciones a las que se ha subscrito. Si no se lista ninguna materia tiene que subscribirse a una titulacion en "mis titulaciones"</p>
  <hr/>
  <input autocomplete=off class="form-control buscatit2" placeholder="Filtrar" type="text" name="name"><br/>
<form action="../controllers/addmateria.php" class="header box-main" method="post">
  <?php foreach ($misTitulaciones as $titulacion): ?>
    <p class="lead"><?php echo $titulacion->getTit_name(); ?></p>
    <hr/>
    <?php foreach ($titulacion->materias() as $materia): ?>
    <div class="row box itemtit2">
      <span class="izquierda"> <?php echo $materia->getMat_name(); ?></span>
      <span class="derecha"><button type="submit" class="btn btn-success" type="submit" name="<?php echo $materia->getMat_id(); ?>"><span class="glyphicon glyphicon-plus"></span></button></span>
    </div>
    <?php endforeach; ?>
  <?php endforeach; ?>
</form>
</div>
</div>
</div>
