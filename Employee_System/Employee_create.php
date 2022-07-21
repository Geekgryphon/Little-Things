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
       if(isset($_POST['account'])){
            $sql = "SELECT 1 FROM  Employees WHERE account = ? ";
            $arr = array($_POST['account']);
            $search_query = $pdo->prepare($sql);
            $search_query->execute($arr);

            if($_POST['submit'] == '取消'){
                header('Location: Employee_view.php');
            }

            if((int)$search_query->fetchColumn() > 0){
                echo "<h3>已存在重複的資料，無法新增</h3>";
            }else{
                $sql = " INSERT INTO Employees(account, EP_No) VALUES (?, ?) ";
                $arr = array($_POST['account'], $_POST['EPNo']);
                $insert_query = $pdo->prepare($sql);
                $insert_query->execute($arr);
                header('Location: Employee_view.php');
            }
        }
    ?>
    <form action="Employee_create.php" method="post">
        <label for="account">帳號:</label>
        <input type="text" name="account" id="account">
        <br>
        <label for="EPNo">職員編號:</label>
        <input type="text" name="EPNo" id="EPNo">
        <br>
        <input type="submit" name="submit" value="確定">
        <input type="submit" name="submit" value="取消">
    </form>
</body>
</html>