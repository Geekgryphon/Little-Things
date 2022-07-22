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
       if(isset($_POST['submit'])){
            if($_POST['submit'] == '確定'){
                $sql = "SELECT 1 FROM EmployeeSeniority WHERE EP_NO = ? and EmployeeKindID = ? and (Off_Day is null or Off_Day = '') ";
                $arr = array($_POST['EP_No'], $_POST['EmployeeKindID']);
                $search_query = $pdo->prepare($sql);
                $search_query->execute($arr);

                if((int)$search_query->fetchColumn() > 0){
                    echo "<h3>已有重複的資料且沒有離職日期，無法新增</h3>";
                }else if($_POST['EP_No'] == '' or $_POST['EmployeeKindID'] == ''){
                    echo "<h3>必填欄位不得為空，無法新增</h3>";
                }else{
                    $sql = " INSERT INTO EmployeeSeniority(EP_NO, EmployeeKindID, On_Day) VALUES (?, ?, ?) ";
                    $arr = array($_POST['EP_No'], $_POST['EmployeeKindID'], $_POST['OnDay']);
                    $insert_query = $pdo->prepare($sql);
                    $insert_query->execute($arr);
                    header('Location: EmployeeSeniority_view.php');
                }
            }
            else if ($_POST['submit'] == '取消'){
                header('Location: EmployeeSeniority_view.php');
            }
        }
    ?>
    <form action="EmployeeSeniority_create.php" method="post">
        <label for="EP_No">職員代碼:</label>
        <select name="EP_No" id="EP_No">
            <?php 
                $sql = " SELECT EP_No from Employees ";
                $Select_query = $pdo->prepare($sql);
                $Select_query->execute();
                while($row = $Select_query->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="' . $row['EP_No'] . '">'. $row['EP_No'] . '</option>';
                }
            ?>
        </select>
        <br>
        <label for="EmployeeKindID">職員類別:</label>
        <select name="EmployeeKindID" id="EmployeeKindID">
            <?php 
                $sql = " SELECT EmployeeKindID, KindName from employeekind ";
                $Select_query = $pdo->prepare($sql);
                $Select_query->execute();
                while($row = $Select_query->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="' . $row['EmployeeKindID'] . '">'. $row['KindName'] . '</option>';
                }
            ?>
        </select>
        <br>
        <label for="OnDay">入職時間:</label>
        <input type="date" name="OnDay" id="OnDay">
        <br>
        <input type="submit" name="submit" value="確定">
        <input type="submit" name="submit" value="取消">
    </form>
</body>
</html>