<?php

use Laravolt\Avatar\Facade as Avatar;

function gravatarProfileImage($email, $size = 80)
{
    $hash = md5(strtolower(trim($email)));
    $default = "mp";
    $url = "https://seccdn.libravatar.org/avatar/{$hash}?s={$size}&d={$default}";

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
