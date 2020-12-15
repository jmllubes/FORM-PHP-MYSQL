<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $mysql = new  mysqli("localhost","root","","usuari");
    if($mysql->connect_error){
        die("Connexió fallida");
    } 
    $correu = $_GET["correu"];
    $sql = "DELETE FROM usuari WHERE Correu ='$correu' ";
    $mysql->query($sql) or die($mysql->error);
    $mysql->close();
    unlink("images/" . $correu . ".jpg"); //Esborrar imatge del servidor
    header("Location:form_image.php"); // Redirecciono a la pàgina anterior
    ?>
</body>
</html>