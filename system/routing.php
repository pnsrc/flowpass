<?php

$f3 = require('components/router/base.php');

$f3->route(
    'GET /albina',
    function () {
        echo 'Hello, world! she is icon, icon';
    }
);

$f3->route(
    'GET /',
    function () {
        include './index.php';
    }
);