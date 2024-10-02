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
                [
                    'text' => 'ویرایش',
                    'callback_data' => 'edit-sample-project',
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
include_once "insert.php";
include_once "delete.php";
include_once "edit.php";
