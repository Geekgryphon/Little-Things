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
    <h3>員工到職資料</h3>
    <table>
        <thead>
            <tr></tr>
            <tr>職員代碼</tr>
            <tr>職員類別</tr>
            <tr>報到日期</tr>
            <tr>離職日期</tr>
        </thead>
        <tbody>
            <?php 
              $sql = " SELECT a.EP_NO, b.KindName, a.On_Day, a.Off_Day FROM EmployeeSeniority a 
                       join EmployeeKind b on a.EmployeeKindID and b.EmployeeKindID ";
              $search_query = $pdo->prepare($sql);
              $search_query->execute();
          
              while($row = $search_query->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td> </td>";
                echo "<td>" . $row['EP_No'] . "</td>";
                echo "<td>" . $row['KindName'] . "</td>";
                echo "<td>" . $row['On_Day'] . "</td>";
                echo "<td>" . $row['Off_Day'] . "</td>";
                echo "</tr>";
              }
            ?>
        </tbody>
    </table>
    <a href="EmployeeSeniority_create.php"><button>新增</button></a>
</body>
</html>