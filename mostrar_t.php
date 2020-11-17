<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Ticket de compra</h1>
<br>
<h5><?php 
$mysql = new  mysqli("localhost","root","","bdproductes");
if($mysql->connect_error){
    die("Connexió fallida");
} 
    $sqlid="SELECT codi FROM ticket ORDER BY codi DESC LIMIT 1";
    $resultatsid = $mysql->query($sqlid);
    $fila = $resultatsid->fetch_array();
    $codit= $fila["codi"];
    $sqlnc="SELECT c.nom , t.data_ticket FROM ticket as t INNER JOIN client as c ON c.codi = t.codi_c
    WHERE t.codi = $codit";
    $resultats = $mysql->query($sqlnc);
    $fila = $resultats->fetch_array();
    $nom_c= $fila["nom"];
    $data= $fila["data_ticket"];
    echo "Nom del client: " . $nom_c . "<br>";
    echo "Data del ticket: " . $data;
?></h5>

    <table>
    <tr>
    <th>Nom Producte</th>
    <th>Preu unitari</th>
    <th>Quantitat</th>
    <th>Subtotal</th>
    </tr>
    <?php




    ?>
    
    </table>
</body>
</html>