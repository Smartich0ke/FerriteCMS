<?php

function isActiveRoute($routePattern)
{
    return fnmatch($routePattern, Route::currentRouteName());
}
