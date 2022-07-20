<?php 

define("DB_HOST","localhost");
define("DB_user","root");
define("DB_password","");
define("DB_Database","Employee_database");


try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";port=;dbname=" . DB_Database, DB_user, DB_password);
} catch( PDOException $e){
    echo("<h3>資料庫呼叫發生錯誤，請聯絡你的網頁管理員</h3>");
    //throw new PDOException($e->getMessage());
}


// $stmt  = $pdo->prepare("SELECT * FROM department_kind");
// $stmt->execute();
// $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($stmt);





?>