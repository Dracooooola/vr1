<?php
//require_once 'connection.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$mail = $_POST['email'];
$details = $_POST['comment'];
$address = array_slice($_POST, 3);
$address = array_diff_key($address, ['comment'=>'', 'payment'=>'', 'callback'=>'']);
$address = implode(' ', $address);
$number_order = 1;

if(!empty($mail)){
    $ret = $pdo->query("SELECT `number_of_oreder` FROM `users` WHERE `email` = '$mail'");
    echo $name;
    echo '<br>';
    echo $mail;   echo '<br>';
    echo $phone;   echo '<br>';
    $result = $ret->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        $pdo->query("INSERT INTO `users` VALUES ('$mail', '$name', '$phone', '1')");
    } else {
        $number_order = $result['number_of_oreder'];
        $number_order++;
        $pdo->query("UPDATE users SET number_of_oreder='$number_order' WHERE users.email = '$mail'");
    }
}

$pdo->query("INSERT INTO `orders` (`id`, `user_mail`, `address`, `details`) VALUES (NULL, '$mail', '$address', '$details')");
$id = $pdo->lastInsertId(0);

if($number_order == 1){
    $message_number = "Спасибо за ваш первый заказ<br>";
} else {
    $message_number = "Спасибо! Это уже $number_order заказ<br>";
}
$message = "<h1>Номер заказа: $id</h1><br>
<h3>Ваш заказ будет доставлен по адресу $address</h3>
DarkBeefBurger за 500 рублей, 1 шт <br>
$message_number";

file_put_contents("files/order$id.html", $message);


//отправка сообщений SMTP
require_once 'vendor/autoload.php';

try {
    $transport = ( new Swift_SmtpTransport('smtp.yandex.ru', 465, 'ssl'))
        ->setUsername('worktestvlados@yandex.ru')
        ->setPassword('Kdnv252109');

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message("Номер заказа: 4"))->setFrom(['worktestvlados@yandex.ru' => 'worktestvlados@yandex.ru'])
        ->setTo(['klimov-vd@yandex.ru'])
        ->setBody( "Номер заказа: $id
Ваш заказ будет доставлен по адресу $address
DarkBeefBurger за 500 рублей, 1 шт
$message_number");

    $result = $mailer->send($message);
    var_dump(['res' => $result]);
} catch (Exception $e) {
    var_dump($e->getMessage());
    echo '<pre>' . print_r($e->getTrace(), 1);
}
