<?php

use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', function () {
    return view('main');
});

Route::get('/cover', function () {
    return view('frontend.index');
})->name('cover');

Route::get('/main', function () {
    return view('main');
})->name('main');

// Save The Date Route
Route::get('/save-the-date', function () {
    $icsContent = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//Wedding Invitation//Hani & Aos//EN
CALSCALE:GREGORIAN
METHOD:PUBLISH
BEGIN:VEVENT
DTSTART;TZID=Asia/Jakarta:20260118T080000
DTEND;TZID=Asia/Jakarta:20260118T150000
DTSTAMP:" . gmdate('Ymd\THis\Z') . "
UID:wedding-hani-aos-" . time() . "@invitation.com
SUMMARY:Wedding Celebration - Hani & Aos
DESCRIPTION:Resepsi Pernikahan Hani Nurpatimah & Aos Pratama\\n\\nKami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami.\\n\\nDress Code: Batik/Formal
LOCATION:Jl. Raya Kampung No. 123, Jakarta
STATUS:CONFIRMED
SEQUENCE:0
BEGIN:VALARM
TRIGGER:-P1D
ACTION:DISPLAY
DESCRIPTION:Reminder: Wedding Celebration - Hani & Aos besok!
END:VALARM
END:VEVENT
END:VCALENDAR";

    return response($icsContent)
        ->header('Content-Type', 'text/calendar; charset=utf-8')
        ->header('Content-Disposition', 'inline; filename="Wedding-Hani-Aos.ics"');
})->name('save.date');
