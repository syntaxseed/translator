JSON Translator
=========================

<div align="center">
    <img src="https://img.shields.io/github/tag/syntaxseed/translator.svg" alt="GitHub tag (latest SemVer)">&nbsp;&nbsp;
    <img src="https://img.shields.io/badge/PHP-8.0+-brightgreen.svg" alt="PHP v8.0+">&nbsp;&nbsp;
    <img src="https://img.shields.io/badge/PHP-8.1+-brightgreen.svg" alt="PHP v8.1+">&nbsp;&nbsp;
    <img src="https://img.shields.io/github/license/syntaxseed/translator" alt="License: MIT"><br>
    <a href="https://twitter.com/intent/follow?screen_name=syntaxseed"><img src="https://img.shields.io/twitter/follow/syntaxseed.svg?style=social&logo=twitter" alt="follow on Twitter"></a>&nbsp;&nbsp;<a href="https://github.com/syntaxseed#donatecontribute"><img src="https://img.shields.io/badge/Sponsor-Project-blue" alt="Sponsor Project" /></a>
</div>

Load JSON language files and translate them in your application.

* Licence: MIT
* Version: 1.0.0
* PHP Versions: 7.x, 8.0+, 8.1+, 8.2+
* Author: Sherri Wheeler
* Packagist: https://packagist.org/packages/syntaxseed/translator

Features
--------

* Easy to use, just set language and point to a JSON file.
* Uses the primary language as the lookup key, so strings are understandable in your application.
* Add any number of languages with a language key.
* All the translations for one string are in the same file/place.
* Fails silently - untranslated strings will just output the lookup string.
* Load more than one language file for different parts of your application.
* Short translation function name (`get`) for easy typing.
* Switch target language when needed.

Install
--------

Via Composer:
```
composer require syntaxseed/translator
```

Or add to composer.json:
```
"require": {
    "syntaxseed/translator": "^1.0"
},
```

Usage
--------

> For a more in-depth example, see `examples/` directory.

```php
use Syntaxseed\Translator\Translator;

require('../src/Translator.php');

// Initialize with base (lookup) language and target language to translate to.
$translations = new Translator('en', 'fr');
// Load a JSON file to the default lookup key.
$translations->loadLanguageFile(__DIR__.'/lang.json');

echo($translations->get('Hello World'));
```

Language File JSON Format
--------

```json
{
    "Email address" : {
        "fr" : "Addresse courriel",
        "es" : "Dirección de correo electrónico"
    },
    "Last name" : {
        "fr" : "Nom de famille",
        "es" : "Apellido"
    },
    "Your name" : {
        "fr" : "Votre nom",
        "es" : "Su nombre"
    }
}
```

Changelog
--------

* v1.0.0 - (2018-10-27) Created. Added to GitHub.
