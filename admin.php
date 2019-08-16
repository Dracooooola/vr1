<?php
require_once 'connection.php';
include_once "vendor/autoload.php";
$ret = $pdo->query("SELECT * FROM `users`");
$result = $ret->fetchAll(PDO::FETCH_ASSOC);

$ret = $pdo->query("SELECT * FROM `orders`");
$resultOrders = $ret->fetchAll(PDO::FETCH_ASSOC);

$result = [
        [
            'name'=>'kek',
            'surname'=>'lol'
        ],
        [
            'name'=>'arbidol',
            'surname'=>'lol'
        ]

];
$resultOrders = [
        'name' => 'arbidol',
        'surname' => 'euro'
];

try {
    $loader = new Twig_Loader_Filesystem('templates/');
    $twig = new Twig_Environment($loader, array(
        'cache' => 'cache',
        'debug' => true));

    echo $twig->render('example.twig', array('result' => $result,
        'resultOrders' => $resultOrders,
        'sos'=>'sosipisos'
    ));
} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

