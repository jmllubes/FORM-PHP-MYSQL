<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table,th,   tr,td{
        border:1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <form action="form_image.php" method="post" enctype="multipart/form-data">
        Nom:
        <input type="text"  name="nom" placeholder="Pon tu nombre" id="" ><br>
        Data de naixement:
        <input type="date" name="data" id="" ><br>
        Correu:
        <input type="email" name="correu" id="" ><br>
        Selecciona la foto:
        <input type="file" name="foto" ><br>
        <input type="submit" name="submit" value="Insertar">
        <input type="submit" name="mostrar" value="Mostrar">
    </form>
    <?php
    if(isset($_REQUEST['submit'])){
        $mysql = new  mysqli("localhost","root","","usuari");
        if($mysql->connect_error){
            die("Connexió fallida");
        } 
        $nomusuari = $_REQUEST["nom"];
        $correu = $_REQUEST["correu"];
        $data = $_REQUEST["data"];
        
        $sql= "INSERT INTO usuari VALUES('$correu','$nomusuari','$data')";
        echo $sql;
        $mysql->query($sql) or die($mysql->error);

        $mysql->close();

        
        $ruta= "images/";
        copy($_FILES['foto']['tmp_name'], $ruta . $correu . ".jpg");
        echo "La foto se registro en el servidor.<br>";
        
        echo "<img src=" . $ruta . $correu . ".jpg>";

    }
    if(isset($_REQUEST['mostrar'])){
        $ruta= "images/";
        $mysql = new  mysqli("localhost","root","","usuari");
        if($mysql->connect_error){
            die("Connexió fallida");
        } 
        $sql = "SELECT * FROM usuari";
        $resultat = $mysql->query($sql);
        ?>
    <table>
        <tr>
            <th>Correu</th>
            <th>Nom</th>
            <th>Data Naixement</th>
            <th>Imatge</th>
            <th>Borrar</th>
            <th>Actualitzar</th>
        </tr>

        <?php
       
        while($fila = $resultat->fetch_array()){
            echo "<tr>";
            echo "<td>" . $fila["Correu"] . "</td>";
            echo "<td>" . $fila["Nom"] . "</td>";
            echo "<td>" . $fila["Data_naixement"] . "</td>";
            echo "<td>" . "<img src=" . $ruta . $fila["Correu"] . ".jpg height='60px' width='60px'>" . "</td>";
            echo "<td>" . "<a href=borrar.php?correu=" . $fila["Correu"].">" . $fila["Correu"] . "</a></td>";
            echo "<td>" . "<a href=actualitzar.php?correu=" . $fila["Correu"].">" . $fila["Correu"] . "</a></td>";
            echo "</tr>";

        }
echo "</table>";

$mysql->close();

    }

  
  ?>

</body>

</html>