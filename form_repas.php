<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        VALUES ($rollno,$name,$course,$address)";
        
        
    }



?>
</body>
</html>