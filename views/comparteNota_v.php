<!-- plantilla de subir apunte hecha por FVieira  -->
<div class="col-md-4 col-md-offset-4 col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">Compartir nota</div>
    <div class="panel-body">
  <form action="compartirNota.php?nota=<?php echo $nota; ?>" method="post">
    <div class="form-group">
      <input class="form-control" type="text" name="usuario" required placeholder="nombre del usuario "/><br/>
      <input class="form-control btn btn-success" type="submit" value="Compartir">
    </div>
      <a href="misNotas.php">Volver</a>
  </form>
</div>
</div>
</div>
<?php echo $modal; ?>
