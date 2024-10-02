<?php

if ($Api->getText() == "sampleProject") {
    $text = "نمونه کارها
در این بخش، برخی از پروژه‌ها و دستاوردهای تیم ما را مشاهده می‌کنید. هر پروژه حاصل تلاش و همکاری تیمی ما در جهت ارائه راهکارهای خلاقانه و نوآورانه است. ما به کیفیت، بهینه‌سازی و پیاده‌سازی‌های دقیق و کاربردی توجه ویژه‌ای داریم.

برای مشاهده کدها و پروژه‌های ما می‌توانید به مخزن گیت‌هاب مراجعه کنید و یا نمونه‌ پروژه های زیر را بررسی کنید.";
    $resumesFetch = $sql->table('resumes')->select(['name', 'link'])->where('status', 1)->get();
    $datas = [];
    foreach ($resumesFetch as $resume) {
        $datas[] = [
            'text' => $resume['name'],
            'url' => $resume['link'],
        ];
    }
    setManualLog(json_encode($resumesFetch));
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
