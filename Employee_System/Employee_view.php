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
    <h3>員工名單</h3>
    <table>
        <thead>
            <tr></tr>
            <tr>帳號</tr>
            <tr>職員編號</tr>
        </thead>
        <tbody>
            <?php 
              $sql = " SELECT * FROM Employees ";
              $search_query = $pdo->prepare($sql);
              $search_query->execute();
          
              while($row = $search_query->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td> </td>";
                echo "<td>" . $row['account'] . "</td>";
                echo "<td>" . $row['EP_No'] . "</td>";
                echo "</tr>";
              }
            ?>
        </tbody>
    </table>
    <a href="Employee_create.php"><button>新增</button></a>
</body>
</html>