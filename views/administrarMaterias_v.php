<!-- Vista para Administrar Materias por Rui Caramés -->
<div class="col-md-4 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Filtrar</div>
    <div class="panel-body">
  <p class="lead"> Filtrar por titulación o materia </p>
  <p> El primer input filtra por materia. El segundo se debe utilizar el combobox para filtrar por titulacion </p>
    <hr/>
    <input class="form-control buscatit" placeholder="Filtrar por Materia" type="text" name="name"><br/>
    <form action="administrarMaterias.php" method="post">
	<select class="form-control" name="titulacion">
    <option value="nil" selected> Seleccione una titulacion </option>
	  <?php foreach($titulos as $titulo): ?>
	    <option value="<?php echo $titulo->getTit_id(); ?>"><?php echo $titulo->getTit_name(); ?></option>
	  <?php endforeach; ?>
	</select><br/>
  <button class="btn btn-info btn-block" type="submit"> Filtrar </button>
  <a href="altaMateria.php" class="btn btn-block btn-success">Crear nueva materia</a>
  </form>
</div>
</div>
</div>
<div class="col-md-8 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Usuarios</div>
    <div class="panel-body">
    <div class ="row box">
        <span class="izquierda lead"> Todas las materias</span>
        <span class="derecha">  <?php if($admin==1){echo'<a href="administradoresMateria.php" class="btn btn-info btn-block">Gestionar Administradores Materias</a>';}?></span>
    </div>
  <p> Aqui se muestran todas las materias disponibles. </p>
  <hr/>
<form action="../controllers/bajaMateria.php" class="header box-main" method="post">
      <?php  foreach ($allMaterias as $key): ?>
        <div class="row box itemtit">
              <span class="izquierda"> <?php echo $key->getMat_name(); ?></span>
              <span> <?php echo $titulos[0]->findBy("tit_id",$key->getTit_id())[0]->getTit_Name();?></span>
              <span class="derecha">
                <a class="btn btn-success glyphicon glyphicon-pencil" href="adminMateria.php?mat=<?php echo $key->getMat_id();?>"></a>
                <button type="submit" class="btn btn-danger" name="<?php echo $key->getMat_id(); ?>">Eliminar</button>
              </span>
      </div>
  <?php endforeach; ?>
  </form>
</div>
</div>
</div>
