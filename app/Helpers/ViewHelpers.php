<?php

function gravatarProfileImage($email, $size = 80)
{
    $hash = md5(strtolower(trim($email)));
    $url = "https://www.gravatar.com/avatar/{$hash}?s={$size}";

    return $url;
}
