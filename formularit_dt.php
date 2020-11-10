<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    Crear ticket: <br>
    <?php
    $mysql = new  mysqli("localhost","root","","bdproductes");
    if($mysql->connect_error){
        die("Connexió fallida");
    }
    else{
        echo "S'ha connectat a la bd". "<br>";
    }
    $sql= "SELECT codi,nom FROM client";
    $resultat = $mysql->query($sql);
?>
<form action="formularit_dt.php" method="post">
<select name="client" id="">
<?php
    while($fila = $resultat->fetch_array()){
        echo "<option value='" . $fila['codi'] . "'>" . $fila['nom'] . "</option>";
    }
    $mysql->close();
    ?>
    </select>
    </form>
</body>
</html>