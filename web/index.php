<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/YandexDiskWorker.php');
use YandexDisk\YandexDiskWorker;
// $databaseHost = 'db';
// $databaseUsername = 'root';
// $databasePassword = 'notSecureChangeMe';
// $databaseName = 'maria_db';

// // Создание подключения
// // $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
// $mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// // Проверка подключения
// if ($mysqli->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully\n";

// $sqlTable = "CREATE TABLE IF NOT EXISTS users (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(30) NOT NULL,
//     password VARCHAR(255) NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// )";

// if($mysqli->query($sqlTable) === true) {
//     echo "TABLE CREATED";
// } else {
//     echo "ERROR" . $mysqli->error;
// }

// // Закрытие подключения
// // $mysqli->close();

// if(!empty($_POST['name']) && !empty($_POST['password'])) {
//     $sqlNewUser = $mysqli->prepare("INSERT INTO users (username, password) VALUES(?,?)"); 
//     $sqlNewUser->bind_param('ss',$_POST['name'],$_POST['password']);
//     $sqlNewUser->execute();
// }
 $test = new YandexDiskWorker();
 $file = $test->getDiskResources();
//  echo '<pre>';
//   var_dump($file);
//  echo '</pre>';

 $fileUrl = $file['items'][0]['file'];

 $audioData = base64_encode(file_get_contents($fileUrl));

 // Вставка в HTML
 echo '<audio controls>
         <source src="data:audio/mpeg;base64,' . $audioData . '" type="audio/mpeg">
         Your browser does not support the audio element.
       </audio>';
?>

<div>
   
</div>