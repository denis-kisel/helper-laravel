<?php


namespace DenisKisel\Helper;


class AStr
{
    const PHP_TAB = "\t";

    public static function getContent($pattern, $str)
    {
        self::quotePattern($pattern);
        preg_match('/' . $pattern . '/', $str, $matches);

        return (!empty($matches[1])) ? $matches[1] : '';
    }

    public static function rm($pattern, &$str)
    {
        self::quotePattern($pattern);
        preg_match('/' . $pattern . '/', $str, $matches);

        if (!empty($matches[0])) {
            $str = str_replace($matches[0], '', $str);
        }

        return (!empty($matches[0])) ? $matches[0] : '';
    }

    public static function is($pattern, $str)
    {
        self::quotePattern($pattern);
        return preg_match('/' . $pattern . '/', $str, $matches);
    }

    public static function formatText($text, $countTabs = 0)
    {
        if ($countTabs) {
            return str_repeat(self::PHP_TAB, $countTabs) . $text . PHP_EOL;
        } else {
            return $text . PHP_EOL;
        }
    }

    public static function pathByClass($model)
    {
        return base_path(str_replace('\\', '/', lcfirst($model)) . '.php');
    }

    public static function append($search, $append, $text, $countTabs = 0)
    {
        $appendText = self::formatText($search);
        $appendText .= self::formatText($append, $countTabs);
        return str_replace($search, $appendText, $text);
    }

    public static function prepend($search, $prepend, $text, $countTabs = 0)
    {
        $prependText = self::formatText($prepend, $countTabs);
        $prependText .= self::formatText($search);
        return str_replace($search, $prependText, $text);
    }

    public static function quotePattern(&$pattern)
    {
        $pattern = str_replace('*', '(.*)', $pattern);
        $pattern = str_replace('\\', '\\\\', $pattern);
        $chars = ['{', '}', '[', ']', '+', '?', '^', '$', '=', '!', '<', '>', '|', ':', '-', '#', '/'];
        $quoteChars = $chars;
        array_walk($quoteChars, function (&$item) {
            $item = preg_quote($item, '/');
        });
        $pattern = str_replace($chars, $quoteChars, $pattern);
    }
}