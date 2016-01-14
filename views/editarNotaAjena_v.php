<div class="col-md-2 col-sm-12"></div>
<div class="col-md-8 col-sm-12">

  <div class="banner"><h1>Editar nota ajena</h1></div>
  <form name="form1" method="post" action="editarNotaAjena.php?nota=<?php echo $nota; ?>">
  <hr/>
  <input required pattern="[A-z 0-9]{1,24}" name="title" class="form-control" type="text" value="<?php echo $titulo; ?>" />
  <br/>
  <textarea required name="editor" id='editor'><?php echo $contenido; ?></textarea>
  <input class="btn btn-success btn-block" type="submit" value="Guardar">
</div>
<div class="col-md-2 col-sm-12"></div>
<script src="../ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'editor' );
</script>
