<!--Vista de administrar apuntes de una materia por Martín Vázquez-->
<div class="col-md-4 col-sm-12">

</div>


<div class="col-md-8">
<div class="panel panel-default">
  <div class="panel-heading">Apuntes de la materia seleccionada</div>
  <div class="panel-body">
<form action="delApunte.php?mat=<?php echo $mat; ?>" method="post">
  <input autocomplete=off class="form-control buscatit2" placeholder="Filtrar" type="text" name="name"><br/>
  <hr/>
<?php foreach($apuntes as $apunte): ?>
  <div class="row box itemtit2">
    <span class="izquierda">
    <span class="apunte"><?php echo $apunte->getApunte_name(); ?></span>
    <div class="autor"> Autor: <?php echo $apunte->nombreAutor(); ?> </div>
    </span>
    <span class="derecha">
      <a title="Abrir" class="btn btn-success" href="../apuntes/<?php echo $apunte->getRuta(); ?>"><span class="glyphicon glyphicon-eye-open"></a>
      <button title="Borrar" type="submit" class="btn btn-danger" type="submit" name="<?php echo $apunte->getApunte_id(); ?>"><span class="glyphicon glyphicon-trash"></button>
    </span>
 </div>
<?php endforeach; ?>
</form>
<a href="administrarMaterias.php">Volver</a>
</div>
</div>
</div>















<?php echo $status; ?>
