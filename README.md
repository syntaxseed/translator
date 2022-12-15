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
* Version: 1.0.8
* PHP Versions: 7.X, 8.0+, 8.1+, 8.2+
* Author: Sherri Wheeler sherri.syntaxseed@ofitall.com
* Packagist: https://packagist.org/packages/syntaxseed/translator

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

> More in-depth example, see `examples/` directory.

```php
use Syntaxseed\Translator\Translator;

require('../src/Translator.php');

// Initialize with base (lookup) language and target language to translate to.
$translations = new Translator('en', 'fr');
// Load a JSON file to the default lookup key.
$translations->loadLanguageFile(__DIR__.'/lang.json');

echo($translations->get('Hello World'));
```



Changelog
--------

* v1.0.0 - (2018-10-27) Created. Added to GitHub.
