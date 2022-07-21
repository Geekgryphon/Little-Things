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
        $EmployeeKindID = "";
        $KindName = "";

       if(isset($_GET['EmployeeKindID'])){

         $EmployeeKindID = $_GET['EmployeeKindID'];

         $sql = "SELECT KindName FROM  employeekind WHERE EmployeeKindID = ? ";
         $arr = array($EmployeeKindID);
         $search_query = $pdo->prepare($sql);
         $search_query->execute($arr);
         $KindName = $search_query->fetch()["KindName"];

       }


       if(isset($_POST['submit'])){
            if($_POST['submit'] == '確定'){
                $sql = " UPDATE employeekind SET KindName = ? WHERE EmployeeKindID = ?  ";
                $arr = array($_POST['KindName'], $_POST['EmployeeKindID']);
                $update_query = $pdo->prepare($sql);
                $update_query->execute($arr);
                
                header('Location: EmployeeKind_view.php');

            }else if($_POST['submit'] == '取消'){
                header('Location: EmployeeKind_view.php');
            }
       }
       
    ?>

    <form action="EmployeeKind_edit.php" method="post">
        <label for="DepartmentID">部門代碼:</label>
        <input type="text" name="EmployeeKindID" id="EmployeeKindID" value="<?php echo $EmployeeKindID; ?>" readonly>
        <br>
        <label for="KindName">部門名稱:</label>
        <input type="text" name="KindName" id="KindName" value="<?php echo $KindName; ?>">
        <br>
        <input type="submit" name="submit" value="確定">
        <input type="submit" name="submit" value="取消">
    </form>
</body>
</html>