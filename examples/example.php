<?php
/**
 * Example usage JSON language translation.
 */

use Syntaxseed\Translator\Translator;

require('../src/Translator.php');

$translations = new Translator('en', 'fr');                             // Base (lookup) language and target language to translate to.
$translations->loadLanguageFile(__DIR__.'/lang.json');                  // Load a JSON file to the default lookup key.
$translations->loadLanguageFile(__DIR__.'/thankyou.json', 'footer');    // Load a second JSON file to a specific lookup key.

echo( <<<EOF
    <!doctype html>
    <html lang="en">
    <head>
    <title>Example of SyntaxSeed/Translator</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@forevolve/bootstrap-dark@1.0.0/dist/css/bootstrap-dark.min.css" />
    <style>
        body{ font-size:12pt;}
    </style>
    </head>
    <body>
    <div class="container-fluid">

    <h1>French:</h1>

    <b>{$translations->get('Your name')}</b><br>
    <input type="text" size="40" /><br><br>

    <b>{$translations->get('Last name')}</b><br>
    <input type="text" size="40" /><br><br>

    <b>{$translations->get('Phone number')}</b><br>
    <input type="text" size="40" /><br><br>

    <b>{$translations->get('Email address')}</b><br>
    <input type="text" size="40" /><br><br>

    <i>{$translations->get('Thank you for using SyntaxSeed/Translator!', 'footer')}</i>

    <br><hr><br>
    EOF
);

// UWe want to translate to a different language from now on...
$translations->changeLanguage('es');

echo( <<<EOF
    <h1>Spanish:</h1>

    <b>{$translations->get('Your name')}</b><br>
    <input type="text" size="40" /><br><br>

    <b>{$translations->get('Last name')}</b><br>
    <input type="text" size="40" /><br><br>

    <b>{$translations->get('Phone number')}</b><br>
    <input type="text" size="40" /><br><br>

    <b>{$translations->get('Email address')}</b><br>
    <input type="text" size="40" /><br><br>

    <i>{$translations->get('Thank you for using SyntaxSeed/Translator!', 'footer')}</i>

    <br><hr><br>

    <h1>One-Off Language</h1>

    <b>{$translations->get('Your name', null, 'en')}</b><br>
    <b>{$translations->get('Your name', null, 'fr')}</b><br>
    <b>{$translations->get('Your name', null, 'es')}</b><br>

    <br><br><br>


    </div>
    </body>
    </html>
    EOF
);
