<?
include 'init.php';

$passes = R::getAll('SELECT * FROM pass');

// Default limit
$limit = 20;
// Default offset
$offset = 0;
$current_page = 1;

$paged_passes = array_slice($passes, $offset, $limit);