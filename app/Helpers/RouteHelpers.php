<?php

function isActiveRoute($routePattern)
{
    return fnmatch($routePattern, Route::currentRouteName());
}
function postURL($post)
{
    return route('posts.show', $post->slug);
}
