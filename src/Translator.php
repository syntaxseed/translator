<?php

namespace Syntaxseed\Translator;

/**
  * Translate strings in your application to multiple languages loaded from one or more JSON files.
  * @author Sherri Wheeler
  * @version  1.0.0
  * @copyright Copyright (c) 2022, Sherri Wheeler - syntaxseed.com
  * @license MIT
 */

class Translator
{
    public array $translations;
    public string $primaryLanguage;     // Main language in the translations json. Used to look up a string.
    public string $defaultLanguage;     // Default language to translate strings into for this instance. Set to avoid passing language every time.
    private string $defaultSetKey;      // Each language file is looked up with a key. If only one json language file, we can set it as default.

    /**
     * Initialize the translator.
     * @param string $primaryLanguage The language of the string lookups - ie default language of the json file.
     * @param string $defaultLanguage The language to translate to if not otherwise specified.
     * @param string $defaultSetKey The default string key for the loaded language file.
     */
    public function __construct(string $primaryLanguage, string $defaultLanguage, string $defaultSetKey='default') {
        $this->primaryLanguage = $primaryLanguage;
        $this->defaultLanguage = $defaultLanguage;
        $this->translations = [];
        $this->defaultSetKey = $defaultSetKey;
    }

    /**
     * Load a json language file and save it to a lookup key.
     * @param $pathToFile System path to the json file to load.
     * @param $translationsSetKey If using multiple langugae files, which key to refer to this file by.
     * @return void
     */
    public function loadLanguageFile(string $pathToFile, string $translationSetKey='default'){
        $jsonString = file_get_contents($pathToFile);
        $jsonObject = json_decode($jsonString, true);
        if (!is_null($jsonObject)) {
            $this->translations[$translationSetKey] = $jsonObject;
        }
    }

    /**
     * Get a string's translated value.
     * If the string does not exist, or a translation of it does not exist, the supplied string will be returned (fails silently).
     * @param string $stringKey A string to translate, written in the primary language of the translation files.
     * @param $lang Language to translate to. Default is set in the constructor.
     * @param $setKey Several language files can be loaded, called sets, set this param to use one other than the default.
     * @return string
     * @throws Exception
     */
    public function get(string $stringKey, string $setKey=null, string $lang=null ) {
        $setKey ??= $this->defaultSetKey;

        if (
            (is_null($lang) && $this->primaryLanguage == $this->defaultLanguage) ||
            (!is_null($lang) && $lang == $this->primaryLanguage)
         ) {
            // Nothing to translate. Use the lookup string.
            return $stringKey;
        }
        $lang ??= $this->defaultLanguage;

        if (!array_key_exists($setKey, $this->translations)) {
            throw new \Exception("Translations set: ".$setKey." does not exist.");
        }

        if (!array_key_exists($stringKey, $this->translations[$setKey])) {
            // This string does not exist in the language file.
            return $stringKey;
        }

        if (!array_key_exists($lang, $this->translations[$setKey][$stringKey])) {
            // A translation of this string does not exist for this language.
            return $stringKey;
        }

        return $this->translations[$setKey][$stringKey][$lang];
    }

    /**
     * Change the language we will translate to by default.
     * @param $defaultLanguage Two letter language code to translate to.
     * @return void
     */
    public function changeLanguage(string $defaultLanguage){
        $this->defaultLanguage = $defaultLanguage;
    }

}