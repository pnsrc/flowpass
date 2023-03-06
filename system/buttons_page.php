<? $current_query = isset($_GET) ? 'data-query="' . http_build_query($_GET) . '"' : ''; ?>
<nav class="card-list__nav">
  <ul class="card-list__pagination">

    <li class="card-list__page-item <?= $current_page === 1 ? 'disabled' : ''; ?>">
      <a class="card-list__page-link fa-solid fa-angles-left" href="#" data-page-number="<?= $current_page - 1; ?>" <?= $current_query; ?>></a>
    </li>

    <? for ($page_number = 1; $page_number <= $total_pages; $page_number++) { ?>
      <li class="card-list__page-item <?= isset($_GET['page-number']) && $_GET['page-number'] == $page_number ? 'active' : ''; ?>">
        <a class="card-list__page-link" href="#" data-page-number="<?= $page_number; ?>" <?= $current_query; ?>><?= $page_number; ?></a>
      </li>

    <? } ?>

    <li class="card-list__page-item <?= $current_page === (int)$total_pages ? 'disabled' : ''; ?>">
      <a class="card-list__page-link fa-solid fa-angles-right" href="#" data-page-number="<?= $current_page + 1; ?>" <?= $current_query; ?>></a>
    </li>
  </ul>
</nav>