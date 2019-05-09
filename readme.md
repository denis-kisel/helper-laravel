# Helper for laravel

Helper package for laravel

## Installation

Via Composer

``` bash
$ composer require denis-kisel/helper
```

## Usage

### String
``` php
use DenisKisel\Helper\AStr;

...
// Get substring by mask
AStr::getContent($mask, $str);

//Example
AStr::getContent('{*}', 'some {placeholder} text');
// Return:
// placeholder

AStr::getContent('Hello * world', 'Hello wonderful world');
// Return:
// wonderful


// Remove substring by mask
AStr::rm($mask, &$str)

//Example
$text = 'some {placeholder} text';
AStr::rm('{*}', $text);
// Return:
// {placeholder}

echo $text;
// Output:
// some text


// Check substring by mask
AStr::is($mask, $str);

//Example
AStr::is('Hello * world', 'Hello wonderful world');
// Return:
// (boolean)true


// Format text
AStr::formatText($text, $countTabs = 0);

//Example
AStr::formatText('Some text', 3);
// Return:
// \t\t\tSome text\n


// Get path by class
AStr::pathByClass($model);

//Example
AStr::pathByClass('App\\Models\\Page');
// Return: absolute path to input class


// Append substring
AStr::append($search, $append, $text, $countTabs = 0);

//Example
$text = <<<EOF
    function() {
        //TODO
    }
EOF;

AStr::append('function() {', 'echo __LINE__;', $text, $countTabs = 2);
// Return
//    function() {
//        echo __LINE__;
//        //TODO
//    }


// Prepend substring
AStr::prepend($search, $prepend, $text, $countTabs = 0);

//Example
$text = <<<EOF
    function() {
        //TODO
    }
EOF;

AStr::prepend('}', 'echo __LINE__;', $text, $countTabs = 2);
// Return
//    function() {
//        //TODO
//        echo __LINE__;
//    }
...
```