<?php

if ($Api->getText() == 'insert-sample-project') {
    $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ['typingTitleForSampleProject']);
    $text = 'لطفا یک عنوان برای نمونه پروژه خود وارد کنید یا برگردید به منو قبل .';
    $reply = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'بازگشت',
                    'callback_data' => 'adminPanel',
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
if ($userStep == 'typingTitleForSampleProject') {
    $text = $Api->getText();
    $resumeID = $sql->table('resumes')->insert(['name'], [$text]);
    $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ['setTitleForSampleProject_' . $resumeID]);

    $text = 'لطفا لینک مربوط به نمونه پروژه را وارد نمایید';
    $Api->sendMessage($text);
}
if (strpos($userStep, 'setTitleForSampleProject_') === 0) {
    $link = $Api->getText();
    $resumeID = explode('_', $userStep)[1];
    $res = $sql->table('resumes')->select()->where('id', $resumeID)->update(['link'], [$link]);

    if ($res) {
        $text = 'عملیات با موفقیت انجام شد.';
        $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ["successfullyToAddedSampleProject"]);

    } else {
        $text = 'مشکلی در ثبت پیش امده لطفا دوباره تلاش نمایید';
        $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ["FailedToAddedSampleProject"]);

    }
    $reply = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'پنل ادمین',
                    'callback_data' => 'adminPanel',
                ],
            ],
            [
                [
                    'text' => 'صفحه اصلی',
                    'callback_data' => 'home',
                ],
            ],
        ],
    ];
    $Api->sendMessage($text, $reply);
}
