<?php

function GoToNoAccess()
{
    global $app_root;

    header("Location: " . $app_root . "/login.php");
    exit;
}

function GoHome()
{
    global $app_root;

    header("Location: " . $app_root . "/user_information.php");
    exit;
}