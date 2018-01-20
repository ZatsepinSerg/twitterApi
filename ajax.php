<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 20.01.2018
 * Time: 14:56
 */

require "TwitterMessager.php";
$twitterMessager = new TwitterMessager();

$action = $_REQUEST['action'];

switch ($action) {
    case 'searchNewPost':
        $collectTwits = $twitterMessager->newTweet();

        echo  json_encode($collectTwits);
        break;
    case 'test':
        break;
    default:
        echo json_encode('111');
        break;
}
