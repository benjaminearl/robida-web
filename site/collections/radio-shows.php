<?php

return function ($site) {
    return $site->index()->filterBy('template', 'in', ['radio-show']);
};