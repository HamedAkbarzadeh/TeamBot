<?php

if ($Api->getText() == 'sample-project-manage') {
    $text = "به قسمت مدریت نمونه کار ها خوش آمدید لطفا یکی از گزیینه های زیر را انتخاب نمایید . ";
    $reply = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'افزودن',
                    'callback_data' => 'insert-sample-project',
                ],

            ],
            [
                [
                    'text' => 'حذف',
                    'callback_data' => 'delete-sample-project',
                ],
            ],
            [
                [
                    'text' => 'بازگشت به صفحه اصلی',
                    'callback_data' => 'home',
                ],
                [
                    'text' => 'ادمین پنل',
                    'callback_data' => 'adminPanel',
                ],
            ],
        ],
    ];
    $Api->editMessageText($text, $reply);
}
include_once "insert.php";
include_once "delete.php";
// include_once "edit.php";
