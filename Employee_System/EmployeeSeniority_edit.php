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

        $EP_NO = "";
        $EmployeeKindID = "";
        $On_Day = "";
        $Off_Day = "";

       if(isset($_GET['EP_NO'])){

         $EP_NO = $_GET['EP_NO'];
         $EmployeeKindID = $_GET['EmployeeKindID'];

         $sql = "SELECT On_Day, Off_Day  FROM  EmployeeSeniority WHERE EP_NO = ? and EmployeeKindID = ? ";
         $arr = array($EP_NO, $EmployeeKindID);
         $search_query = $pdo->prepare($sql);
         $search_query->execute($arr);

         while($row = $search_query->fetch(PDO::FETCH_ASSOC)){
            $On_Day = $row["On_Day"];
            $Off_Day = $row["Off_Day"];
          }

         

       }


       if(isset($_POST['submit'])){
            if($_POST['submit'] == '確定'){
                $sql = " UPDATE EmployeeSeniority SET On_Day = ?, Off_Day = ? WHERE EP_NO = ? and EmployeeKindID = ?  ";
                $arr = array($_POST['OnDay'], $_POST['OffDay'], $_POST['EPNO'], $_POST['EmployeeKindID']);
                $update_query = $pdo->prepare($sql);
                $update_query->execute($arr);
                
                header('Location: EmployeeSeniority_view.php');

            }else if($_POST['submit'] == '取消'){
                header('Location: EmployeeSeniority_view.php');
            }
       }
       
    ?>

    <form action="EmployeeSeniority_edit.php" method="post">
        <input type="hidden" name="EmployeeKindID" id="EmployeeKindID" value="<?php echo $EmployeeKindID; ?>">
        <label for="EPNO">員工代碼:</label>
        <input type="text" name="EPNO" id="EPNO" value="<?php echo $EP_NO; ?>" readonly>
        <br>
        <label for="DepartmentName">入職日期:</label>
        <input type="date" name="OnDay" id="OnDay" value="<?php echo $On_Day; ?>">
        <br>
        <label for="DepartmentName">離職日期:</label>
        <input type="date" name="OffDay" id="OffDay" value="<?php echo $Off_Day; ?>">
        <br>
        <input type="submit" name="submit" value="確定">
        <input type="submit" name="submit" value="取消">
    </form>
</body>
</html>