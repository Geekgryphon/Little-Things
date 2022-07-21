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
    <h3>部門單位檢視</h3>
    <table>
        <thead>
            <tr></tr>
            <tr>部門編號</tr>
            <tr>部門名稱</tr>
        </thead>
        <tbody>
            <?php 
              $sql = " SELECT * FROM Department_Kind ";
              $search_query = $pdo->prepare($sql);
              $search_query->execute();
              
          
              while($row = $search_query->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td><a href='DepartmentKind_edit.php?Department_ID=" . $row['Department_ID'] . "'>編輯</a></td>";
                echo "<td>" . $row['Department_ID'] . "</td>";
                echo "<td>" . $row['DepartmentName'] . "</td>";

                echo "</tr>";
              }
            ?>
        </tbody>
    </table>
    <a href="departmentKind_create.php"><button>新增</button></a>
</body>
</html>