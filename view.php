<?php
/**
 * Created by PhpStorm.
 * User: vladislavklimov
 * Date: 13/08/2019
 * Time: 19:13
 */
include_once "vendor/autoload.php";

try {
  $loader = new Twig_Loader_Filesystem('templates/');
  $twig = new Twig_Environment($loader, array(
      'cache' => 'cache',
      'debug' => true));

  echo $twig->render('example.twig', array(
    'name' => 'Ванек Иванов',
    'username' => 'superlogin',
    'password' => 'superpassword',
  ));
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
