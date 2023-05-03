<?php

function gravatarProfileImage($email, $size = 80)
{
    $hash = md5(strtolower(trim($email)));
    $url = "https://www.gravatar.com/avatar/{$hash}?s={$size}";

    return $url;
}
function formatPostDateAndTime($date)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d M Y, g:ia');
}
function formatShortDate($date)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/y');
}
