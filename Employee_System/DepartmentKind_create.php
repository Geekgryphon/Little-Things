<?php 
    include_once('System/db.php');
    include_once('System/function.php');
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
       if(isset($_POST['DepartmentID'])){
            $sql = "SELECT 1 FROM  Department_Kind WHERE Department_ID = ? ";
            $arr = array($_POST['DepartmentID']);
            $search_query = $pdo->prepare($sql);
            $search_query->execute($arr);

            if((int)$search_query->fetchColumn() > 0){
                echo "<h3>已存在重複的資料，無法新增</h3>";
            }else{
                $sql = " INSERT INTO Department_Kind(Department_ID, DepartmentName) VALUES (?, ?) ";
                $arr = array($_POST['DepartmentID'], $_POST['DepartmentName']);
                $insert_query = $pdo->prepare($sql);
                $insert_query->execute($arr);
                header('Location: DepartmentKind_view.php');
            }
        }
    ?>
    <form action="DepartmentKind_create.php" method="post">
        <label for="DepartmentID">部門代碼:</label>
        <input type="text" name="DepartmentID" id="DepartmentID">
        <br>
        <label for="DepartmentName">部門名稱:</label>
        <input type="text" name="DepartmentName" id="DepartmentName">
        <br>
        <input type="submit" name="create" value="確定">
    </form>
</body>
</html>