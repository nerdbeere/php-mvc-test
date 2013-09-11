<?php

class Inflector {
    public static function capitalize($str) {
        $tmp = explode('_', $str);
        $result = '';
        foreach($tmp as $part) {
            $result .= ucfirst($part);
        }

        return $result;
    }
} 