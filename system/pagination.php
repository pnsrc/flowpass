<?php
include 'init.php';

$products = R::getAll('SELECT * FROM pass');

// Filters
$cat_filter = isset($_GET['cats']) ? $_GET['cats'] : '';
$search_filter = isset($_GET['search']) ? $_GET['search'] : '';

// Default limit
$limit = isset($_GET['per-page']) ? $_GET['per-page'] : 12;

// Default offset
$offset = 0;
$current_page = 1;
if(isset($_GET['page-number'])) {
    $current_page = (int)$_GET['page-number'];
    $offset = ($current_page * $limit) - $limit;
}

$paged_products = array_slice($products, $offset, $limit);

$total_products = count($products);

// Get the total pages rounded up the nearest whole number
$total_pages = ceil( $total_products / $limit );

$paged = $total_products > count($paged_products) ? true : false;

if (count($paged_products)) {
    foreach ($paged_products as $pass) { ?>
       <tr>
                    <td><?= $pass['id'] ?></td>
                    <td><?= $pass['fio'] ?></td>
                    <td><?= $pass['status'] == 'valid' ? 'Действующий' : 'Просрочен' ?></td>
                    <td><?= $pass['date_activation'] ?></td>
                    <td><?= $pass['date_expiration'] ?></td>
                    <td><a href="/pass/view?id=<?= $pass['id'] ?>" class="card-list__link">Перейти</a></td>
        </tr>
     <?php }
}

else {
    echo '<p class="alert alert-warning" >No results found.</p>';
}
 
 if ($paged) {
     require('buttons_page.php');
 }