<div class="col-md-2 col-sm-12"></div>
<div class="col-md-8 col-sm-12">
  <div class="banner"><h1>Nueva nota</h1></div>
  <form method="post" action="nuevaNota.php">
  <hr/>
  <input required name="title" class="form-control" type="text" placeholder="Titulo" />
  <br/>
  <textarea required name="editor" id='editor'></textarea>
  <input class="btn btn-success btn-block" type="submit" value="Guardar">
</div>
<div class="col-md-2 col-sm-12"></div>
<script src="../ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'editor' );
</script>
