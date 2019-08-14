<?php
const DBName = 'burger';
const DBServer = 'mysql:host=localhost';

try{
    $pdo = new PDO('mysql:host=localhost;dbname=burger', 'root','Kdnv252109');
} catch (PDOException $err){
    echo $err->getMessage();
    die;
}

//$pdo->exec("INSERT INTO `users` ('email', 'name', 'phone', 'number_of_oreder') VALUES ('lol', 'kek', 'lol', 888)");

//$data = $pdo->prepare("INSERT INTO users VALUES ('lol', 'kek', 'lol', 888)");
//$data->execute();
