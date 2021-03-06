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
       if(isset($_POST['EmployeeKindID'])){
            $sql = "SELECT 1 FROM EmployeeKind WHERE EmployeeKindID = ? ";
            $arr = array($_POST['EmployeeKindID']);
            $search_query = $pdo->prepare($sql);
            $search_query->execute($arr);

            if($_POST['submit'] == '取消'){
                header('Location: DepartmentKind_view.php');
            }

            if((int)$search_query->fetchColumn() > 0){
                echo "<h3>已存在重複的資料，無法新增</h3>";
            }else if($_POST['account'] == ''){
                echo "<h3>未設定代碼無法新增</h3>";
            }else{
                $sql = " INSERT INTO EmployeeKind(EmployeeKindID, KindName) VALUES (?, ?) ";
                $arr = array($_POST['EmployeeKindID'], $_POST['KindName']);
                $insert_query = $pdo->prepare($sql);
                $insert_query->execute($arr);
                header('Location: EmployeeKind_view.php');
            }
        }
    ?>
    <form action="EmployeeKind_create.php" method="post">
        <label for="EmployeeKindID">職員種類代碼:</label>
        <input type="text" name="EmployeeKindID" id="EmployeeKindID">
        <br>
        <label for="KindName">種類名稱:</label>
        <input type="text" name="KindName" id="KindName">
        <br>
        <input type="submit" name="create" value="確定">
        <input type="submit" name="submit" value="取消">
    </form>
</body>
</html>