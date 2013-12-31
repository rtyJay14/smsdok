<?php require_once 'prepend.php';

echo json_encode(xdb::select("$DBURL/reports.assoc"));

?>