<?php 
    include_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_POST)){
            $sql = "SELECT 1 FROM  Department_Kind WHERE Department_ID = ? ";
            $con->prepare();
            
        }
    
    ?>
    <form action="DepartmentKind_create.php">
        <label for="Department_ID">部門代碼:</label>
        <input type="text" name="Department_ID">
        <label for="DepartmentName">部門名稱:</label>
        <input type="text" name="DepartmentName">
        <input type="submit" name="create" value="確定">
    </form>
</body>
</html>