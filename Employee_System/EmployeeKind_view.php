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
    <h3>員工職別</h3>
    <table>
        <thead>
            <tr></tr>
            <tr>職員種類代碼</tr>
            <tr>種類名稱</tr>
        </thead>
        <tbody>
            <?php 
              $sql = " SELECT * FROM EmployeeKind ";
              $search_query = $pdo->prepare($sql);
              $search_query->execute();
          
              while($row = $search_query->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td> </td>";
                echo "<td>" . $row['EmployeeKindID'] . "</td>";
                echo "<td>" . $row['KindName'] . "</td>";
                echo "</tr>";
              }
            ?>
        </tbody>
    </table>
    <a href="EmployeeKind_create.php"><button>新增</button></a>
</body>
</html>