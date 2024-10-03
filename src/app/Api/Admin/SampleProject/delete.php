<?php

if ($Api->getText() == "delete-sample-project") {
    $resumesFetch = $sql->table('resumes')->select(['name', 'id', 'status'])->get();
    $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ['chooseIDForDeleteSamplePost']);
    $datas = [];
    foreach ($resumesFetch as $resume) {
        $status = $resume['status'] == 0 ? "0" : "1";
        $datas[] = [

            'text' => $resume['name'] . ' (status : ' . $status . ')',
            'callback_data' => "sendIDForDeleteSampleProject_" . $resume['id'],
        ];
    }
    $datas = array_chunk($datas, 1);
    $datas[] = [
        [
            'text' => 'بازگشت',
            'callback_data' => 'sample-project-manage',
        ],
        [
            'text' => 'ادمین پنل',
            'callback_data' => 'adminPanel',
        ],
    ];
    $reply = [
        'inline_keyboard' => $datas,
    ];
    $text = "لطفا برای حذف نمونه کار از روی ربات لطفا یکی از گزیینه های زیر را انتخاب نمایید . ";
    $Api->editMessageText($text, $reply);
} elseif (strpos($Api->getText(), 'sendIDForDeleteSampleProject_') === 0) {
    $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ['DeleteForDeleteSamplePost']);
    $resumeID = explode("_", $Api->getText())[1];
    $res = $sql->table('resumes')->select()->where('id', $resumeID)->delete();
    if ($res) {
        $text = "درخواست شما  با موفقیت انجام شد";
    } else {
        $text = "مشکلی در انجام درخواست شما پیش آمده است";
    }
    $reply = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'بازگشت',
                    'callback_data' => 'sample-project-manage',
                ],
            ],
            [
                [
                    'text' => 'ادمین پنل',
                    'callback_data' => 'adminPanel',
                ],
            ],
        ],
    ];
    $Api->editMessageText($text, $reply);

}
