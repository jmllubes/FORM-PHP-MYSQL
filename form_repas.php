<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>table,th,tr,td{
    border:1px black solid;
    border-collapse:collapse;        
    }
    </style>
</head>
<body>
    <form action="form_repas.php" method="post" enctype="multipart/form-data">
    RollNo:
    <input type="number" name="rollno" id=""><br>
    Name:
    <input type="text" name="name" id=""><br>
    Course:
    <input type="text" name="course" id=""><br>
    Address:
    <input type="text" name="address" id=""><br>
    Foto:
    <input type="file" name="foto" id=""><br>
    <input type="submit" value="Insertar" name="submit">
    <input type="submit" value="Mostrar" name="mostrar">
       
    </form>
    <?php
    if(isset($_REQUEST["submit"])){
        $mysql = new  mysqli("localhost","root","","student");
        if($mysql->connect_error){
            die("Connexió fallida");
        }
        $rollno = $_REQUEST["rollno"];
        $name = $_REQUEST["name"];
        $course = $_REQUEST["course"];
        $address = $_REQUEST["address"];
        $ext = substr($_FILES['foto']['name'],-4);
        copy($_FILES['foto']['tmp_name'], "images/" . $name . $ext);

        $sql = "INSERT INTO student (RollNo,Name,Course,Address) 
        VALUES ('$rollno','$name','$course','$address')";
        $mysql->query($sql) or die($mysql->error);

        $mysql->close();
        
    }
    if(isset($_REQUEST["mostrar"])){
        $mysql = new  mysqli("localhost","root","","student");
        if($mysql->connect_error){
            die("Connexió fallida");
        }
        $sql2= "SELECT * FROM student";
        $result = $mysql->query($sql2);
        ?>
        <table>
        <tr>
        <th>RollNo</th>
        <th>Name</th>
        <th>Course</th>
        <th>Address</th>
        <th>Foto</th>
        </tr>
        <?php
        while($fila = $result->fetch_array()){
            echo "<tr>";
            echo "<td>" . $fila['RollNo'] . "</td>";
            echo "<td>" . $fila['Name'] . "</td>";
            echo "<td>" . $fila['Course'] . "</td>";
            echo "<td>" . $fila['Address'] . "</td>";
            echo "<td>" . "<img src='images/" . $fila['Name'] . "'>" . "</td>";
            echo "<tr>";
        }
        echo "</table>";

        $mysql->close();
    }



?>
</body>
</html>