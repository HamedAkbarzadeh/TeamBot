<?php

if ($Api->getText() == "sampleProject") {
    $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ['chooseIDForSampleProject']);

    $text = "نمونه کارها
در این بخش، برخی از پروژه‌ها و دستاوردهای تیم ما را مشاهده می‌کنید. هر پروژه حاصل تلاش و همکاری تیمی ما در جهت ارائه راهکارهای خلاقانه و نوآورانه است. ما به کیفیت، بهینه‌سازی و پیاده‌سازی‌های دقیق و کاربردی توجه ویژه‌ای داریم.

برای مشاهده کدها و پروژه‌های ما می‌توانید به مخزن گیت‌هاب مراجعه کنید و یا نمونه‌ پروژه های زیر را بررسی کنید.";
    $resumesFetch = $sql->table('resumes')->select(['name', 'id'])->where('status', 1)->get();
    $datas = [];
    foreach ($resumesFetch as $resume) {
        $datas[] = [
            'text' => $resume['name'],
            'callback_data' => "sendIDForSampleProject_" . $resume['id'],
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
    $Api->editMessageText($text, $reply);
}
if (strpos($Api->getText(), 'sendIDForSampleProject_') === 0) {
    $sql->table('users')->select()->where('user_id', $Api->getUser_id())->update(['step'], ['ShowSampleProject']);

    $resumeID = explode("_", $Api->getText())[1];
    $resume = $sql->table('resumes')->select()->where('id', $resumeID)->first();
    $text = $resume['name'] . " : " . PHP_EOL . $resume['description'] . PHP_EOL . PHP_EOL . "برای دیدن نمونه کار روی دکمه زیر کلیک کنید .";
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
                    'callback_data' => 'sampleProject',
                ],
            ],
        ],
    ];
    $Api->editMessageText($text, $reply);

}
