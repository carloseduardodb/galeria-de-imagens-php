<?php
$listArchiveImage = new RecursiveDirectoryIterator("uploads");
?>
<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="min/jquery.min.js"></script>
  <title>Galeria de Imagens</title>
</head>

<body id="body-style" style="">

  <div style="">
  <h1 class="heading" style="background-color:rgba(255,255,255,0.3);">Galeria de Imagens Feita em $PHP</h1>
  </div>

  <form action="tratamento.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" multiple>
    <p style="color: black; font-size: 20px;">Arraste seus arquivos aqui ou clique nesta área.</p>
    <button type="submit" style="font-size: 15px;">Upload</button>
  </form>

  <div class="container">

    <div class="gallery">
        <?php foreach ($listArchiveImage as $directoryImage){ if($directoryImage->isFile()){?>
      <div class="gallery-item">
        <img onclick="trocaimagem('<?=$directoryImage->getFilename()?>')" class="gallery-image" src="uploads/<?=$directoryImage->getFilename()?>" alt="person writing in a notebook beside by an iPad, laptop, printed photos, spectacles, and a cup of coffee on a saucer">
      </div>
        <?php }} ?>
    </div>

  </div>

  <script src="js/script.js"></script>
  <script src="min/popper.min.js"></script>
  <script src="min/botstrap.min.js"></script>
</body>

</html>

<script>
    var bodyElement = document.getElementById("body-style");
    function trocaimagem(imagemfundo){
        bodyElement.setAttribute("style", "background: url('uploads/"+imagemfundo+"') no-repeat; " +
            "background-attachment: fixed;");
    }
</script>
