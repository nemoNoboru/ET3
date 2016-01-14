<!-- plantilla de login hecha por FVieira  -->
<div class="col-md-4 col-md-offset-4 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Registro</div>
    <div class="panel-body">
  <form action="../controllers/registro.php" method="post">
    <div class="form-group">
      <input class="form-control" required type="text" name="name" placeholder="Nombre"/><br/>
      <input class="form-control" type="text" name="email" placeholder="email" /><br/>
      <input class="form-control" required type="password" name="pass" placeholder="contraseña" /><br/>
      <input class="btn btn-success btn-block"type="submit" value="Registrarse">
    </div>
  </form>
  <a href='login.php'>Volver</a>
</div>
</div>
</div>
  <?php echo $modal ; ?>
