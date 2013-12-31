<?php

require_once 'scripts/riceplusplus.php';


if (isset($_POST['op'])) {
	riceplusplus::add_comment($_GET['id'], array('comment' => $_POST['comment'], 'name' => $_POST['name']));
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
			<h1>IRRI Bigas Hackaton</h1>
		</div>
		<div id="ps">
			<div id="perspective">
				<span>Perspective:</span>
				<select id="pers">
					<option id="p1">Perspective 1</option>
					<option id="p2">Perspective 2</option>
					<option id="p3">Perspective 3</option>
					<option id="p4">Perspective 4</option>
				</select>
			</div>
			<div id="search">
				<form>
					<input type="text" name="search-field" />
					<input type="submit" value="Search" />
				</form>
			</div>
		</div>
		
		<div style="clear: both;"></div>
		<div id="categories">
			<ul>
				<li class="cats" id="ct1"><a href="#">Categories 1</a></li>
				<li class="cats" id="ct2"><a href="#">Categories 2</a></li>
				<li class="cats" id="ct3"><a href="#">Categories 3</a></li>
				<li class="cats" id="ct4"><a href="#">Categories 4</a></li>
				<li class="cats" id="ct5"><a href="#">Categories 5</a></li>
			</ul>
		</div>
	</div>
	<div id="content">
		<div id="left-navigation">
			<div id="nav-links">
				<h1>Links of Sub Category 1.1</h1>
				<ul>
				<li id="links-1"><a href="#">Link 1</a></li>
				<li id="links-2"><a href="#">Link 1</a></li>
				<li id="links-3"><a href="#">Link 1</a></li>
				<li id="links-4"><a href="#">Link 1</a></li>
				</ul>
			</div>
		</div>
		<div id="content-wrapper">


Problem: <?php echo $report['problems'];?><br>
Name: <?php echo $report['name'];?><br>
Details: <?php echo $report['problems'];?><br>
<img src="images/<?php echo $report['image']?>"><br>

<?php // put comment listing header_remove()
if (count($comments) > 2)
{
	echo 'View all '.count($comments).' comments';
}
?>
<br>

<?php foreach($comments as $comment):?>
	<?php echo '<b>'.$comment['name'].':</b> '.$comment['comment']?><br>
<?php endforeach;?>
<br>

<form action="" method="post">
Your Name: <input type="text" name="name"><br>
Message: <input type="textarea" name="comment" cols="48" rows="8"><br>
<input type="hidden" value="1" name="op">
<input type="submit" value="Post Comment">

</form>
<?php //print_r($report);?>

		</div>
	</div>	
</body>
</html>