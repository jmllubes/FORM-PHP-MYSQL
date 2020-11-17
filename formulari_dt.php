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
        echo "El codi del ticket es " . $codit . "<br>";
        $sql="SELECT codi,nom,preu FROM productes";
        $resultat = $mysql->query($sql);
        ?>
        Tria el producte:
        <br>
        <select name="productes" id="" required>
            <option value=""></option>
            <?php
    while($fila = $resultat->fetch_array()){
        echo "<option value='" . $fila['codi'] . "'>" . $fila['nom'] . " " . $fila['preu'] . "</option>";
    }

?>
        </select>
        <br>
        Quantitat:
        <br>
        <input type="number" name="quantitat" id="" min="0" max="100" required placeholder="Quantitat">
        <br><br>
        <input type="submit" name="submit" value="Insertar producte">
        <br><br>
        <input type="submit" name="final" value="Final compra">

    </form>
    <?php 
        if(isset($_REQUEST["submit"])){
            $codip = $_REQUEST["productes"];
            $quantitat= $_REQUEST["quantitat"];
            $sqldt= "INSERT INTO detall_ticket VALUES($codip,$codit,$quantitat)";
            echo $sqldt;
            $mysql->query($sqldt) or die($mysql->error);

            $mysql->close();

        }
        if(isset($_REQUEST["final"])){

            header("mostrar_t.php");


        }




?>

</body>

</html>