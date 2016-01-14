<!-- plantilla de login hecha por FVieira tiene como variables $status -->
<div class="col-md-4 col-md-offset-4 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Log-in</div>
    <div class="panel-body">
  <form name="form1" action="../controllers/login.php" id="form" method="post">
    <div class="form-group">
      <input class="form-control" pattern="[A-z 0-9]{1,24}" required placeholder="usuario" type="text" name="name"><br/>
      <input class="form-control" pattern="[A-z 0-9]{1,24}" required type="password" placeholder="contraseña" name="pass">
      <br/>
      <!-- <div class="centered btn btn-default" onclick="submit()"> Login </div> -->
      <input class="btn btn-success btn-block"type="submit" value="Entrar">
    </div>
  </form>
  <br>
  <a href='registro.php'>Registrarme</a> o también...  <a href='home.php'>Entrar como invitado</a>
</div>
</div>
</div>
<div class"error"><?php echo $status; ?></div>
