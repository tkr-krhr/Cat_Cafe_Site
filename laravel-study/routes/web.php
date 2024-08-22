<?php

use Illuminate\Support\Facades\Route;


Route::get('/hello-world', function () {
    return 'hello world';
});

Route::get('/',fn() => view(view: 'index'));
Route::get('/curriculum',fn() => view(view: 'curriculum'));

// 世界の時間
Route::get('/world-time', function () {
    $timeDiff = [
        '東京' => 0,
        'シンガポール' => -1,
        'パリ' => -8,
        'ロンドン' => -9,
        'ニューヨーク' => -14,
        'ロサンゼルス' => -17,
        'ハワイ' => -19,
    ];
    $times = array_map(fn($diff) => now()->addHours($diff), $timeDiff);
    return view('world-time', ['times' => $times]);
});

// おみくじ
Route::get('/omikuji', function () {
    $fortunes = ['大吉', '中吉', '小吉', '吉', '末吉', '凶', '大凶'];
    $resultIndex = array_rand($fortunes);
    $result = $fortunes[$resultIndex];
    return view('omikuji', ['result' => $result]);
});

// モンティ・ホール問題
Route::get('/monty-hall', function () {
    $results = [];
    for ($i = 0; $i < 1000; $i++) {
        $options = [true, false, false];
        shuffle($options);

        $selectedIndex = array_rand($options);
        $notSelectedIndexes = array_filter($options, fn($index) => $index !== $selectedIndex, ARRAY_FILTER_USE_KEY);
        $removeIndex = array_search(false, $notSelectedIndexes);
        unset($notSelectedIndexes[$removeIndex]);

        $changedIndex = key($notSelectedIndexes);
        $results[] = $options[$changedIndex];
    }
    $wonCount = count(array_filter($results, fn($result) => $result));
    return view('monty-hall', ['results' => $results, 'wonCount' => $wonCount]);
});