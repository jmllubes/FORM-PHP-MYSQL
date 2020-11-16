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
<form action="formularit_t.php" method="post">
<select name="client" id="">
<option value=""></option>
<?php
    while($fila = $resultat->fetch_array()){
        echo "<option value='" . $fila['codi'] . "'>" . $fila['nom'] . "</option>";
    }
    ?>
    </select>
    <br>
    <input type="submit" name="submit" value="Crear ticket">

    </form>
    <?php 
    if(isset($_REQUEST["submit"])){
        $client = $_REQUEST["client"];
        $sqlt="INSERT INTO ticket (data_ticket,total,codi_c) VALUES (NOW(),NULL,$client)";
        echo $sqlt;
        $mysql->query($sqlt) or die($mysql->error);

        header("formulari_dt.php");

    }
    



    
    $mysql->close();

    ?>
</body>
</html>