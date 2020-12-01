<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <button onclick="prod()"> Productes</button>
    <button onclick="ticket()">Ticket</button>
    <button onclick="detall()">Detall ticket</button>
    <button onclick="client()">Client</button>
    </select>
    <form action="form_display.php" method="post">

        <br>
        <div id="productes">

            Nom producte:<br>
            <input type="text" name="nom" id=""><br>
            Preu: <br>
            <input type="text" name="preu" id=""><br>
            Stock: <br>
            <input type="text" name="stock" id=""><br>

            <input type="submit" name="submit" value="Entra Producte">
        </div>

        <div id="detall">
            <br>
            <input type="number" name="quantitat" id="" min="0" max="100" required placeholder="Quantitat">
            <br><br>
            <input type="submit" name="submit" value="Insertar producte">
            <br><br>
            <input type="submit" name="final" value="Final compra">
        </div>
    </form>
    <script>
    function prod() {
        document.getElementById("productes").style.display = "block";
        document.getElementById("detall").style.display = "none";

    }

    function client() {
        document.getElementById("productes").style.display = "none";
        document.getElementById("detall").style.display = "none";

    }

    function detall() {
        document.getElementById("productes").style.display = "none";
        document.getElementById("detall").style.display = "block";
    }

    function ticket() {
        document.getElementById("productes").style.display = "none";
        document.getElementById("detall").style.display = "none";

    }
    </script>
</body>

</html>