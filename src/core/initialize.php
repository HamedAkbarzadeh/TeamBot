<?php

namespace src\core;

if (!defined("TOKEN")) {
    define("TOKEN", '8161574231:AAE4fvpicF9gNW7OE1Zlank4Y5J017UN3-s');
}
if (!defined("TEAM_NAME")) {
    define("TEAM_NAME", 'حامین');
}
if (!defined("DOMAIN")) {
    define('DOMAIN', 'https://moblekhoshrang.ir/');
}
if (!defined('API')) {
    define('API', "https://api.telegram.org/bot" . TOKEN . "/");
}
if (!defined('BOT_USERNAME')) {
    define('BOT_USERNAME', 'https://t.me/hmd_event_bot');
}
//DB Config
if (!defined('DB_NAME')) {
    /// local ///
    // define('DB_NAME', 'eventBot');

    /// host ///
    define('DB_NAME', 'moblekho_team_bot');
}
if (!defined('DB_USERNAME')) {
    /// local ///
    // define('DB_USERNAME', 'root');

    /// host ///
    define('DB_USERNAME', 'moblekho_hmd');
}
if (!defined('DB_PASSWORD')) {
    /// local ///
    // define('DB_PASSWORD', '');

    /// host ///
    define('DB_PASSWORD', 'W!(ji}H(V$!e');
}
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}

// https://api.telegram.org/bot6690815299:AAEBLpCN_tuDe8ZpLwNvwUvOYlwAoRItqGc/
// https://api.telegram.org/bot6690815299:AAEBLpCN_tuDe8ZpLwNvwUvOYlwAoRItqGc/setWebHook?url=https://moblekhoshrang.ir/TelegramBot/src/app/Api/index.php
