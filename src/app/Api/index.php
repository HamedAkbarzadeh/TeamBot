<?php

namespace src\app\Api;

use src\app\Classes\DB;
use src\app\Classes\TelegramAPI;

require_once __DIR__ . "/../../../vendor/autoload.php";
require_once "../../core/initialize.php";

//TelegramAPI Instance
$Api = new TelegramAPI;

//DB Instance
$sql = new DB();

$user = $sql->table('users')->select()->where('user_id', $Api->getUser_id())->first();
if ($user) {
    $userStep = $user['step'];
}

// include_once 'ForcedJoin/forced-join.php';

//User Panel
include_once 'User/user-panel.php';

if ($user['is_admin']) {
    //Admin Panel
    include_once 'Admin/admin-panel.php';
}
