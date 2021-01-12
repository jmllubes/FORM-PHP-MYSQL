<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="funcions.php" method="post">
        Numero 1: <br>
        <input type="number" name="valor1" id="" placeholder="Introdueix primer nombre"><br>
        Numero 2: <br>
        <input type="number" name="valor2" id="" placeholder="Introdueix segon nombre"> <br><br>

        <input type="submit" value="Suma" name="suma">
        <input type="submit" value="Resta" name="resta">
        <input type="submit" value="Multiplica" name="multiplica">
        <input type="submit" value="Divideix" name="divideix">
    </form>
    <?php 
    
    if(isset($_REQUEST["suma"])){
        $a = $_REQUEST["valor1"];
        $b = $_REQUEST["valor2"];
        echo suma($a,$b);
    } 

    if(isset($_REQUEST["resta"])){
        $a = $_REQUEST["valor1"];
        $b = $_REQUEST["valor2"];
        echo resta($a,$b);
    }
    if(isset($_REQUEST["multiplica"])){
        $a = $_REQUEST["valor1"];
        $b = $_REQUEST["valor2"];
        echo multiplica($a,$b);
     }
    if(isset($_REQUEST["divideix"])){
        $a = $_REQUEST["valor1"];
        $b = $_REQUEST["valor2"];
        if($b == 0){
            echo "Error, no pots dividir per zero.";
        }
        else{
            echo dividir($a,$b);
        }
    }
    function suma($a,$b){
        $t = $a + $b;
        return $t;
    }
    function resta($a,$b){
        $t = $a - $b;
        return $t;
    }
    function multiplica($a,$b){
        $t = $a * $b;
        return $t;
    }
    function dividir($a,$b){
        $t = $a / $b;
        return $t;
    }



?>
</body>

</html>