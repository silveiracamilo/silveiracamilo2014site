<?php

class Help {

    public static function getNewName($extension = null) {
        return date('YmdHis').str_random(4).($extension ? ".".$extension : "");
    }

}