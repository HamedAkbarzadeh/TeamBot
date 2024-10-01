<?php

namespace src\app\Api;

use src\app\Classes\TelegramAPI;
use src\app\Classes\DB;

require_once __DIR__ . "/../../../vendor/autoload.php";
require_once("../../core/initialize.php");

//TelegramAPI Instance
$telegramApi = new TelegramAPI;

//DB Instance
$sql = new DB();

$userStep = $sql->table('users')->select('step')->where('user_id', $telegramApi->getUser_id())->first()['step'];
$airdrops = $sql->table('airdrops')->select(['id', 'persian_name', 'english_name'])->get();

include_once 'ForcedJoin/forced-join.php';

//User Panel
include_once 'User/user-panel.php';

//Admin Panel
include_once 'Admin/admin-panel.php';
