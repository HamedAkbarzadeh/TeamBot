<?php

if ($Api->getText() == "activeBot") {
    $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ['chooseIDForActiveBot']);

    $title = "<b>▫️ به جمع کاربران ربات‌های فعال تیم فارسه در تلگرام بپیوندید !</b>";
    $description = "در این بخش، برخی از پروژه‌ها و دستاوردهای تیم ما را مشاهده می‌کنید. هر پروژه حاصل تلاش و همکاری تیمی ما در جهت ارائه راهکارهای خلاقانه و نوآورانه است. ما به کیفیت، بهینه‌سازی و پیاده‌سازی‌های دقیق و کاربردی توجه ویژه‌ای داریم .";

    $text = "$title\n\n$description\n";
    $resumesFetch = $sql->table('resumes')->select(['name', 'id'])->where('status', 1)->where('type', 1)->get();
    $datas = [];
    foreach ($resumesFetch as $resume) {
        $datas[] = [
            'text' => $resume['name'],
            'callback_data' => "sendIDForActiveBot_" . $resume['id'],
        ];
    }
    $datas = array_chunk($datas, 2);
    $datas[] = [
        [
            'text' => 'بازگشت',
            'callback_data' => 'home',
        ],
    ];
    $reply = [
        'inline_keyboard' => $datas,
    ];
    $Api->editMessageText($text, $reply, "HTML");
}
if (strpos($Api->getText(), 'sendIDForActiveBot_') === 0) {
    $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ['ShowActiveBot']);

    $resumeID = explode("_", $Api->getText())[1];
    $resume = $sql->table('resumes')->select()->where('id', $resumeID)->first();
    $text = " ▫️ " . $resume['name'] . " ▫️ " . "\n\n" . $resume['description'] . "\n\n" . "برای دیدن ربات روی دکمه زیر کلیک کنید .";
    $reply = [
        'inline_keyboard' => [
            [
                [
                    'text' => $resume['name'],
                    'url' => $resume['link'],
                ],
            ],
            [
                [
                    'text' => 'صفحه اصلی',
                    'callback_data' => 'home',
                ],
                [
                    'text' => 'بازگشت',
                    'callback_data' => 'activeBot',
                ],
            ],
        ],
    ];
    $Api->editMessageText($text, $reply, "HTML");
}
