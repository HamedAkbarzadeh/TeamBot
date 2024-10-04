<?php

if ($Api->getText() == "/start" || $Api->getText() == "home") {

    if (!$user) {

        $sql->table('users')->insert(
            [
                'user_id',
                'first_name',
                'last_name',
                'username',
                'is_bot',
                'is_permium',
                'step',
                'status_bot_used',
            ],
            [
                $Api->getUser_id(),
                $Api->getFirst_name(),
                $Api->getLast_name(),
                $Api->getUsername(),
                $Api->getIs_bot(),
                $Api->getIs_permium(),
                'home',
                0,
            ]
        );
    }
    $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ['home']);

    if ($Api->getText() == "home") {
        $text = "منو اصلی
        ";
        $text .= "سلام به ربات ما خوش آمدید . این ربات جهت نمایش و توضیحات درباره تیممون " . APP_NAME . " ساخته شده است .";
    } else {
        $text = "سلام به ربات ما خوش آمدید . این ربات جهت نمایش و توضیحات درباره تیممون " . APP_NAME . " ساخته شده است .";
    }

    $buttons = [
        [
            [
                'text' => 'درباره ما',
                'callback_data' => 'aboutUs',
            ],
            [
                'text' => 'پشتیبانی',
                'callback_data' => 'support',
            ],
        ],
        [
            // [
            //     'text' => 'سایت ما',
            //     'callback_data' => 'web',
            // ],
            [
                'text' => 'نمونه کار ها',
                'callback_data' => 'sampleProject',
            ],
        ],
    ];
    setManualLog("USER : " . json_encode($user));
    if ($user['is_admin']) {
        setManualLog("is Here");
        $buttons[] =  [
            [
                'text' => 'پنل ادمین',
                'callback_data' => 'adminPanel',
            ],
        ];
    }
    $reply = [
        'inline_keyboard' => $buttons
    ];

    if ($Api->getText() == "home") {
        $Api->editMessageText($text, $reply);
    } else {
        $Api->sendMessage($text, $reply);
    }
}

//AboutUs
include_once "AboutUs/about-manage.php";

//support
include_once "Support/support-manage.php";

//sample project
include_once "SampleProject/sample-project-manage.php";