<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        if(isset($_POST["button"])){
                $city = $_POST["city"];
                $phone = $_POST["phone"];
                $office->create($city, $phone);
        }
    
    ?>
    <form action="index.php?page=office&action=create" method="post">
        <div>
        <label>city</label>
        <input type="text" name="city" id="city" placeholder="city">
        </div>

        <div>
        <label>phone</label>
        <input type="text" name="phone" id="phone" placeholder="type phone">
        </div>
        <input type="submit" name="button" value="Insertar">
    </form>
</body>
</html>