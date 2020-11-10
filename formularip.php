<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formularip.php" method="post">
    Nom producte:<br>
    <input type="text" name="nom" id=""><br>
    Preu: <br>
    <input type="text" name="preu" id=""><br>
    Stock: <br>
    <input type="text" name="stock" id=""><br>

    <input type="submit" name="submit" value="Entra Producte">
    </form>
<?php
if(isset($_REQUEST["submit"])){ // Has tocat el botó?
    $nom = $_REQUEST["nom"];
    $preu = $_REQUEST["preu"];
    $stock = $_REQUEST["stock"];

    $mysql=new mysqli("localhost","root","","bdproductes");
    if($mysql->connect_error){
        die("Connexió fallida");
    }
    else{
        echo "S'ha connectat a la bd";
    }
    $sql = "INSERT INTO productes (nom,preu,stock) VALUES('$nom','$preu','$stock')";
    echo $sql;
    $mysql->query($sql) or die($mysql->error);

    $mysql->close();
}



?>

</body>
</html>