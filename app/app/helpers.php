<?php

function setActive($routeName): string
{
    return Route::currentRouteName() == $routeName ? 'active-menu' : '';
}
