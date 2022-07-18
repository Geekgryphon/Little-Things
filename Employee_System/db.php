<?php 

define("DB_HOST","localhost");
define("DB_user","root");
define("DB_password","");
define("DB_Database","Employee_database");


$con = new mysqli(DB_HOST,DB_user,DB_password,DB_Database);


if($con->connect_error) {
    die($con->connect_error);
}


// $sql = "SELECT Department_ID, DepartmentName  FROM department_kind";
// $result = $con->query($sql);

// if($result->num_rows > 0){
//     while($row = $result->fetch_assoc()){
//         echo $row['DepartmentName'] . "<br/>";
//     }
// }


?>