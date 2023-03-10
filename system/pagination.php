<?
include 'pass-load.php';
// Перебор пропусков по полученному data-атрибуту
if (isset($_GET['page-number'])) {
  $current_page = (int)$_GET['page-number'];
  $offset = ($current_page * $limit) - $limit;
  $paged_passes = array_slice($passes, $offset, $limit);
}
header('Content-type: Application/json');
echo json_encode($paged_passes, JSON_UNESCAPED_UNICODE);
