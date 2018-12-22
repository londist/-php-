<?php

function is_user()
{
    @session_start();
    if (isset($_SESSION['user'])) {
        return 1;
    } else {
        to_login();
    }
}

function is_admin()
{
    @session_start();
    if (isset($_SESSION['admin'])) {
        return 1;
    } else {
        return 0;
    }
}

function to_login()
{
    header('Location: /auth/login.html');
    exit;
}
function handle_login()
{
    if (0 == is_admin()) {
        to_login();
    }
}

function m1_login()
{
    session_start();
    if (empty($_SESSION['m1']) and empty($_SESSION['admin'])) {
        header('Location: /auth/login.html');
        exit;
    }
}

function m2_login()
{
    session_start();
    if (empty($_SESSION['m2']) and empty($_SESSION['admin'])) {
        header('Location: auth/login.html');
        exit;
    }
}

function has_unsafe_char($str)
{
    $chars = [' ', '%', '/', '\\', '"', "'", '=', '>', '<'];
    foreach ($chars as $value) {
        if (strpos($str, $value)) {
            return 1;
        }
    }

    return 0;
}

function remove_unsafe_char($str)
{
    $temp = $str;
    $chars = [' ', '%', '/', '\\', '"', "'", '=', '>', '<'];
    foreach ($chars as $value) {
        $temp = str_replace($value, '', $temp);
    }

    return $temp;
}

function referer($str)
{
    if (empty($_SERVER['HTTP_REFERER'])) {
        $url = $str;
    } else {
        $url = $_SERVER['HTTP_REFERER'];
    }

    return $url;
}

function junmto($str)
{
    header("Location: $str");
}

function utf8()
{
    header('Content-type: text/html; charset=utf-8');
}
