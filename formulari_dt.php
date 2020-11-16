<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formulari_dt.php" method="post">
    <?php
    $mysql = new  mysqli("localhost","root","","bdproductes");
    if($mysql->connect_error){
        die("Connexió fallida");
    } 
        $sqlid="SELECT codi FROM ticket ORDER BY codi DESC LIMIT 1";
        $resultatsid = $mysql->query($sqlid);
        $fila = $resultatsid->fetch_array();
        $codit= $fila["codi"];
        $sql="SELECT codi,nom,preu FROM productes";
        $resultat = $mysql->query($sql);
        ?>
        <select name="productes" id="">
        <option value=""></option>
<?php
    while($fila = $resultat->fetch_array()){
        echo "<option value='" . $fila['codi'] . "'>" . $fila['nom'] . " " . $fila['preu'] . "</option>";
    }

?>
    </select>
    <br>
    <input type="submit" name="submit" value="Insertar producte">

    </form>
</body>
</html>