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

    $description = "ما در " . APP_NAME . "، یک تیم تخصصی در زمینه توسعه نرم‌افزار هستیم که در حوزه‌های برنامه‌نویسی بک‌اند، فرانت‌اند، و توسعه ربات فعالیت می‌کنیم. با بهره‌گیری از تخصص و تجربه اعضای تیم، تلاش ما ارائه راهکارهای هوشمندانه و خلاقانه برای رفع نیازهای دیجیتال کسب‌وکارها و افراد است.";
    $description2 = "در " . APP_NAME . "، کیفیت کدنویسی و تعهد به تحویل پروژه‌های به‌موقع و باکیفیت، اولویت‌های اصلی ما هستند. ما با مشتریان خود همکاری نزدیک داریم تا راهکارهایی کاملاً متناسب با نیازهایشان ارائه دهیم.";
    $footer = "همراه ما در " . APP_NAME . "، فناوری را به خدمت بگیرید و آینده کسب‌وکار خود را متحول کنید.";
    if ($Api->getText() == "home") {
        $title = "<b>▫️ منو اصلی</b>\n\n";
        $title .= "<b>▫️ معرفی تیم برنامه‌نویسی " . APP_NAME . " ▫️</b>";
        $text = "$title\n\n$description\n\n$description\n\n$description2\n\n$footer";
    } else {
        $title = "<b>▫️ معرفی تیم برنامه‌نویسی " . APP_NAME . " ▫️</b>";
        $text = "$title\n\n$description\n\n$description\n\n$description2\n\n$footer";
    }

    $buttons = [
        [
            [
                'text' => 'ربات های فعال',
                'callback_data' => 'activeBot'
            ]
        ],
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
        $Api->editMessageText($text, $reply, "HTML");
    } else {
        $Api->sendMessage($text, $reply, "HTML");
    }
}

//AboutUs
include_once "AboutUs/about-manage.php";

//support
include_once "Support/support-manage.php";

//sample project
include_once "SampleProject/sample-project-manage.php";

//active bot
include_once "ActiveBot/active-bot.php";
