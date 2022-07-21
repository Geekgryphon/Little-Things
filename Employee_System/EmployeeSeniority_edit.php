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
        $DepartmentID = "";
        $DepartmentName = "";

       if(isset($_GET['Department_ID'])){

         $DepartmentID = $_GET['Department_ID'];

         $sql = "SELECT DepartmentName FROM  Department_Kind WHERE Department_ID = ? ";
         $arr = array($DepartmentID);
         $search_query = $pdo->prepare($sql);
         $search_query->execute($arr);
         $DepartmentName = $search_query->fetch()["DepartmentName"];

       }


       if(isset($_POST['submit'])){
            if($_POST['submit'] == '確定'){
                $sql = " UPDATE Department_Kind SET DepartmentName = ? WHERE Department_ID = ?  ";
                $arr = array($_POST['DepartmentName'], $_POST['DepartmentID']);
                $update_query = $pdo->prepare($sql);
                $update_query->execute($arr);
                
                header('Location: DepartmentKind_view.php');

            }else if($_POST['submit'] == '取消'){
                header('Location: DepartmentKind_view.php');
            }
       }
       
    ?>

    <form action="DepartmentKind_edit.php" method="post">
        <label for="DepartmentID">部門代碼:</label>
        <input type="text" name="DepartmentID" id="DepartmentID" value="<?php echo $DepartmentID; ?>" readonly>
        <br>
        <label for="DepartmentName">部門名稱:</label>
        <input type="text" name="DepartmentName" id="DepartmentName" value="<?php echo $DepartmentName; ?>">
        <br>
        <input type="submit" name="submit" value="確定">
        <input type="submit" name="submit" value="取消">
    </form>
</body>
</html>