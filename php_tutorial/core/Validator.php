<?php

namespace core;

class Validator {
    
    //since not depending on state can make it static and now use with ::
    public static function string($value, $min = 1, $max = INF) {
        //use trim to avoid enter only blank spaces
        $value = trim($value);
        return strlen($value) >= 1 && strlen($value)<=$max;
    }

    public static function email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

}