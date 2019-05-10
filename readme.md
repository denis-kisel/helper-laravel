# Helper for laravel

Helper package for laravel

## Installation

Via Composer

``` bash
$ composer require denis-kisel/helper
```

## Usage
### String
Namespace  *DenisKisel\Helper\AStr*

| Method | Description |
| --- | --- |
| ``` AStr::getContent(string $mask, string $str) : string ``` | Get substring by mask |
| `AStr::rm(string $mask, string &$str) : string` | Remove substring by mask |
| `AStr::is(string $mask, string $str) : string` | Check substring by mask |
| `AStr::formatText(string $text [, int $countTabs = 0]) : string` | Format text |
| `AStr::pathByClass(string $model) : string` | Get path by class |
| `AStr::append(string $search, string $append, string $text [, int $countTabs = 0]) : string` | Append substring |
| `AStr::prepend(string $search, string $prepend, string $text [, int $countTabs = 0]) : string` | Prepend substring |

## Example

### String
``` php
use DenisKisel\Helper\AStr;

...

// Get substring by mask
AStr::getContent('{*}', 'some {placeholder} text');
// Return:
// placeholder

AStr::getContent('Hello * world', 'Hello wonderful world');
// Return:
// wonderful


// Remove substring by mask
$text = 'some {placeholder} text';
AStr::rm('{*}', $text);
// Return:
// {placeholder}

echo $text;
// Output:
// some text


// Check substring by mask
AStr::is('Hello * world', 'Hello wonderful world');
// Return:
// (boolean)true


// Format text
AStr::formatText('Some text', 3);
// Return:
// \t\t\tSome text\n


// Get path by class
AStr::pathByClass('App\\Models\\Page');
// Return: absolute path to input class


// Append substring
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