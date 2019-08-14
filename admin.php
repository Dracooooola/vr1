<?php
require_once 'connection.php';
?>
<h1>Admin panel</h1>
<h2>All users</h2>
<?
$ret = $pdo->query("SELECT * FROM `users`");
?>
<table style="border: 1px solid black; border-collapse: collapse;">
    <tr style="border: 1px solid black; border-collapse: collapse;" >
        <td style="border: 1px solid black; text-align: center; padding: 5px;">Имя</td>
        <td style="border: 1px solid black; text-align: center; padding: 5px;">Email</td>
        <td style="border: 1px solid black; text-align: center; padding: 5px;">Телефон</td>
        <td style="border: 1px solid black; text-align: center; padding: 5px;">Кол-во заказов</td>
    </tr>
    <?
    $result = $ret->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $item){
        echo '<tr style="border: 1px solid black; text-align: center; padding: 5px;">';
        echo '<td style="border: 1px solid black; text-align: center; padding: 5px;">' . $item['name'] . '</td>';
        echo '<td style="border: 1px solid black; text-align: center; padding: 5px;">' . $item['email'] . '</td>';
        echo '<td style="border: 1px solid black; text-align: center; padding: 5px;">' . $item['phone'] . '</td>';
        echo '<td style="border: 1px solid black; text-align: center; padding: 5px;">' . $item['number_of_oreder'] . '</td>';
        echo '</tr>';
    }
    ?>
</table>

<h2>All orders</h2>
<?
$ret = $pdo->query("SELECT * FROM `orders`");
?>

<?
$result = $ret->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $item){
    echo '<div class="order-block">';
    echo '<p> Номер заказа: ' . $item['id'] . '</p>';
    echo '<P> Почта пользователя: ' . $item['user_mail'] . '</P>';
    echo '<p> Адрес: ' . $item['address'] . '</p>';
    echo '<p> Детали: ' . $item['details'] . '</p>';
    echo '</div>';
}
?>
<style>
    .order-block{
        border: 1px solid black;
        width: 400px;
        text-align: center;
        margin: 5px 0;
    }
</style>
<?//
//    $result = $ret->fetchAll(PDO::FETCH_ASSOC);
//    echo '<pre>';
//    var_dump($result);
//?>
