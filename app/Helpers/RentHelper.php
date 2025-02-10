<?php

use Illuminate\Support\Facades\DB;

function encryptStr($string)
{
    return base64_encode($string);
}

function decryptStr($string)
{
    return base64_decode($string);
}
