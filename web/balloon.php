<?php

require_once("./scripts/riceplusplus.php");

$report = riceplusplus::get_report($_GET['id']);

?>
<div>
<h1><a href="details.php?id=<?php echo $report['id']; ?>"><?php echo $report['description'] ?></a></h1>
<div><img src="<?php echo $report['image']; ?>" width="300" /></div>
</div>