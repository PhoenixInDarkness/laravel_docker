<?php

function setActive($routeName): string
{
    return Route::currentRouteName() == $routeName ? 'active-menu' : '';
}

function isActive($routeName): bool
{
    return Route::currentRouteName() == $routeName;
}
