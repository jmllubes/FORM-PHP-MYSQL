<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="form_image.php" method="post" enctype="multipart/form-data">
        Nom:
        <input type="text" name="nom" placeholder="Pon tu nombre" id="" required><br>
        Data de naixement:
        <input type="date" name="data" id="" required><br>
        Correu:
        <input type="email" name="correu" id="" required><br>
        Selecciona la foto:
        <input type="file" name="foto" required><br>
        <input type="submit" name="submit" value="Enviar">
    </form>
    <?php
    if(isset($_REQUEST['submit'])){
        $nomusuari = $_REQUEST["nom"];
        $correu = $_REQUEST["correu"];
        $ruta= "images/";
        copy($_FILES['foto']['tmp_name'], $ruta . $correu . ".jpg");
        echo "La foto se registro en el servidor.<br>";
        
        echo "<img src=" . $ruta . $correu . ".jpg>";

    }
  
  ?>

</body>

</html>