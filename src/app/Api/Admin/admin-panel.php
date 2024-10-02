<?php

if ($Api->getText() == 'adminPanel') {
    $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ['admin-home']);
    $text = "به قسمت ادمین پنل خوش آمدید . لطفا یکی از گزیینه های زیر را انتخاب نمایید . ";

    $reply = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'مدیریت پروژه ها',
                    'callback_data' => 'sample-project-manage',
                ],

            ],

            [
                [
                    'text' => 'بازگشت به صفحه اصلی',
                    'callback_data' => 'home',
                ],
            ],
        ],
    ];
    $Api->editMessageText($text, $reply);

}
include_once "SampleProject/sample-project-manage.php";
