<?php

if ($Api->getText() == "/start") {
    $text = "سلام به ربات ما خوش آمدید . این ربات جهت نمایش و توضیحات درباره تیممون " . TEAM_NAME . " ساخته شده است .";
    $reply = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'درباره ما',
                    'callback_data' => 'aboutUs',
                ],
                [
                    'text' => 'پشتیبانی',
                    'callback_data' => 'support'
                ]
            ],
            [
                [
                    'text' => 'سایت ما',
                    'callback_data' => 'web'
                ],
                [
                    'text' => 'نمونه کار ها',
                    'callback_data' => 'sampleProject'
                ]
            ],
            [
                [
                    'text' => 'پنل ادمین',
                    'callback_data' => 'adminPanel'
                ],
            ]
        ]
    ];
    $Api->sendMessage($text, $reply);
}