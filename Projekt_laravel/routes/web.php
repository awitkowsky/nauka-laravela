<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', [
        'date' => now(),
    ]);
})->name('home');

Route::view('/about_us','about_us')->name('about_us');



// WITANIE UŻYTKOWNIKÓW
Route::get('greetings/{name?}', function ($name = null) {
    if (empty($name)) {
        echo "Witaj! Jak masz na imię?";
    } else {
        echo "Cześć $name! Miło mi Ciebie poznać :)";
    }
})->whereAlpha('name');


// KODY BŁĘDÓW
Route::get('admin-panel/{code}', function ($code) {
    abort_if($code != 'test123', 401, 'Podano nieprawidłowy kod dostępu.');
   
    echo "Dostęp przyznany";
})->whereAlphaNumeric('code');


// KALKULATOR
Route::prefix('calc')->group(function () {
    Route::get('/dodawanie/{num1}/{num2}', function ($num1, $num2) {
        $wynik = $num1 + $num2;
        echo $wynik;
    })->whereNumber('num1') 
      ->whereNumber('num2');

    Route::get('/odejmowania/{num1}/{num2}', function ($num1, $num2) {
        $wynik = $num1 - $num2;
        echo $wynik;
    })->whereNumber('num1') 
      ->whereNumber('num2');

    Route::get('/mnozenie/{num1}/{num2}', function ($num1, $num2) {
        $wynik = $num1 * $num2;
        echo $wynik;
    })->whereNumber('num1') 
      ->whereNumber('num2');

    Route::get('/dzeielenie/{num1}/{num2}', function ($num1, $num2) {
        $wynik = $num1 / $num2;
        echo $wynik;
    })->whereNumber('num1') 
      ->whereNumber('num2');

    Route::get('/potega/{num1}/{num2}', function ($num1, $num2) {
        $wynik = pow($num1 , $num2);
        echo $wynik;
    })->whereNumber('num1') 
      ->whereNumber('num2');

    Route::get('/pierwiastek/{num1}', function ($num1) {
        $wynik = sqrt($num1);
        echo $wynik;
    })->whereNumber('num1');
});


// ODWRACANIE TEKSTU
route::get('reverse/{text}', function ($text){
    $rev_text = strrev($text);
    echo str_replace("+", " ", $rev_text);
});



// WŁASNE WORDLE

$quotes = [
    1 => [
        'quote' => 'You were a boulder... I am a mountain.',
        'hero' => 'Sage',
    ],
    2 => [
        'quote' => 'Racing to the spike side!',
        'hero' => 'Jett',
    ],
    3 => [
        'quote' => 'Call me tech support again.',
        'hero' => 'Killjoy',
    ],
    4 => [
        'quote' => 'One of my cameras is broken!... oh wait... it\'s fine.',
        'hero' => 'Cypher',
    ],
];

Route::get('quotes/{id}/guess/{hero}', function ($id , $hero) use ($quotes) {

    if (array_key_exists($id, $quotes)) {

        $quote = $quotes[$id]['quote'];
        $poprawny_hero = strtolower($quotes[$id]['hero']);
        print "<p><strong><i>$quote</i></strong></p>";

        if ($hero == $poprawny_hero){
            print "Zgadłeś! Jest to kwestia <strong>$hero</strong>";
        }
        else
        {
            echo "Niestety! To nie jest kwesia <strong>$hero</strong>";
        }
        
        } else {
        abort(404, 'Nie ma takiego id.');
    }
})->whereNumber('id') -> whereAlpha('hero');




// ↓↓ ZADANIA Z MODELU ↓↓ //
use App\Models\Publication;

$publications = [
    $artyukul1 = new Publication([
        'title' => '1111111111111111111',
        'content' => '1111111111111111111',
        'author' => '1111111111111111111'
    ]),

    $artyukul2 = new Publication([
        'title' => '222222222222222222222222',
        'content' => '222222222222222222222222',
        'author' => '222222222222222222222222'
    ]),

    $artyukul3 = new Publication([
        'title' => '333333333333333333333',
        'content' => '333333333333333333333',
        'author' => '333333333333333333333'
    ])
];

Route::get('publication', function() use ($publications) {



    dd($publications);
});
