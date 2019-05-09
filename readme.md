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

echo AStr::getContent('{*}', 'some {placeholder} text');
// Output:
// placeholder

echo AStr::getContent('Hello * world', 'Hello wonderful world');
// Output:
// wonderful


// Remove substring by mask
AStr::rm($mask, &$str)

$text = 'some {placeholder} text';
echo AStr::rm('{*}', 'some {placeholder} text');
// Output:
// {placeholder}

echo $text;
// Output:
// some text


// Check substring by mask
AStr::is($mask, $str);

AStr::is('Hello * world', 'Hello wonderful world');
// Return:
// (boolean)true


// Format text
AStr::formatText($text, $countTabs = 0);

AStr::formatText('Some text', 3);
// Return:
// \t\t\tSome text\n


// Get path by class
AStr::pathByClass($model);

echo AStr::pathByClass('App\\Models\\Page');
// Return: absolute path to input class


// Append substring
AStr::append($search, $append, $text, $countTabs = 0);

$text = <<<EOF
    function() {
        //TODO
    }
EOF;

echo AStr::append('function() {', 'echo __LINE__;', $text, $countTabs = 2);
// Output
//    function() {
//        echo __LINE__;
//        //TODO
//    }


// Prepend substring
AStr::prepend($search, $prepend, $text, $countTabs = 0);

$text = <<<EOF
    function() {
        //TODO
    }
EOF;

echo AStr::prepend('}', 'echo __LINE__;', $text, $countTabs = 2);
// Output
//    function() {
//        //TODO
//        echo __LINE__;
//    }
...
```