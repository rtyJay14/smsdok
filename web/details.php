<?php

require_once('scripts/riceplusplus.php');
if($_POST['add_comment']) {
	riceplusplus::add_comment($_POST['report_id'], $_POST);
}

$report = riceplusplus::get_report($_GET['id']);

$comments = riceplusplus::get_comments($_GET['id']);

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
		<div id="content-wrapper" style="padding-top:30px;">
		
		<h1 style="font-size:36px;"><?php echo $report['description']; ?></h1>
		<div style="margin:0 0 13px;">
			<h3>Submitted by <?php echo $report['name']; ?> (<?php echo relativeTime($report['date']); ?>)</h3>
		</div>
		<div>
			<img src="<?php echo $report['image']?>" width="70%" />
		</div>
		<ul>
			<li>
				<h3 style="font-size:bigger;font-weight:bolder;margin-bottom:10px;">More Details</h3>
				<?php if($report['rice_variety']) { ?>Rice Variety: <?php echo $report['rice_variety'] ?></br><?php } ?>
				<?php if($report['stage']) { ?>Growth Stage: <?php echo $report['stage'] ?></br><?php } ?>
				<?php if($report['part']) { ?>Discolored Parts: <?php echo $report['part'] ?></br><?php } ?>
				<?php if($report['color']) { ?>Discoloration: <?php echo $report['color'] ?></br><?php } ?>
				<?php if($report['hole']) { ?>Holes in Leaves: <?php echo $report['hole'] ?></br><?php } ?>
				<?php if($report['broken']) { ?>Stunted: <?php echo $report['broken'] ?></br><?php } ?>
				<?php if($report['spotty']) { ?>Spotty field: <?php echo $report['spotty'] ?></br><?php } ?>
			</li>
		</ul>
		<div>
			<h3 style="font-size:bigger;font-weight:bolder;margin-bottom:10px;"><?php if(count($comments)) echo "Crowd Comments"; else echo "No Comments Yet"; ?></h3>
			<?php foreach($comments as $comment):?>
				<?php echo '<b>'.$comment['name'].':</b> '.$comment['comment']?> (<?php echo relativeTime($comment['date']); ?>)<br>
			<?php endforeach;?>
		</div>

		<form action="" method="post">
		<ol style="list-style:none;margin-top:30px;">
			<h2 style="font-size:18px;">Add a Comment</h2>
			<li><input type="text" name="name" placeholder="Name"></li>
			<li><textarea name="comment" cols="48" rows="8" placeholder="Enter your comment here"></textarea></li>
			<li>
				<input type="hidden" name="report_id" value="<?php echo $report['id']; ?>" />
				<input type="submit" name="add_comment" value="Post Comment" />
			</li>
		</ol>
		</form>
		</div>
	</div>
</body>
</html>