<?php

require_once('scripts/riceplusplus.php');
$page = (isset($_GET['page'])) ? $_GET['page']: 0;
$number = 10;
$reports = riceplusplus::get_reports("orderby=date+desc"); // riceplusplus::get_reports("limit={$number},{$page}");

?><html>
<head>
<link rel="stylesheet" type="text/css" href="media/css/index.css">
<script type="text/javascript"src="media/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="media/js/script.js"></script>
	

<title>IRRI Bigas Hackaton</title>
</head>
<body>
	<div id="header" class="clearfix">
		<div id="logo">
			<a href="/"><h1>Farm Crowd</h1></a>
		</div>
	</div>
	<div id="content">
		<div id="content-wrapper">
			<ul>
				<?php foreach($reports as $report) { ?>
					<li>
						<div style="float:left;margin-right:10px;"><a href="details.php?id=<?php echo $report['id']; ?>"><img src="<?php echo $report['image'] ?>" width="100" /></a></div>
						<div><a href="details.php?id=<?php echo $report['id']; ?>"><?php echo $report['description'] ?></a></div>
						<div>Submitted by <?php echo $report['name'] ?> (<?php echo relativeTime($report['date']); ?>)</div>
						<div style="clear:both"></div>
					</li>
				<?php }  ?>
			</ul> 
			<div id="nav-list-right">
				<ul>
					<ul>
                        <a href="http://rice.charliesoft.net/"><li>Reports</li></a>
                        <a href="http://rice.charliesoft.net/map.php"><li>Map</li></a>
                    </ul>
				</ul>
			</div>
		</div>
	</div>	
</body>
</html>