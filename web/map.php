<?php

require_once('scripts/riceplusplus.php');
$page = (isset($_GET['page'])) ? $_GET['page']: 0;
$number = 10;
$reports = riceplusplus::get_reports("orderby=date+desc"); // riceplusplus::get_reports("limit={$number},{$page}");

$count	= count($reports);

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
        	<br /><br />
			<div id="map" style="width:1024px; height:800px; border: 2px solid black">
            <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
				<script type="text/javascript">
                    <?php
						$x			= 0;
						
						$id				= array();	
						$desc 			= array();	
						$name			= array();
						
						$latitude	= array();
						$longitude	= array();
						$url		= array();
						
						foreach($reports as $report) {
							
							$id					= $report['id'];	
							$description		= $report['description'];		
							$latitude[$x]		= $report['lat'];
							$longitude[$x]		= $report['long'];
							$image				= $report['image'];
							
							$url[$x]			= 'http://rice.charliesoft.net/details.php?id='.$id;
							
							$desc[$x]		= '<strong style=\"font-size:16px\">'.$description.'</strong><br /><br /><br /><a class=\"link2\" href=\"'.$url[$x].'\"><strong>View Report</strong></a>'; 
							
							$x++;
						}
						
					?>
					
                    var locations = [
						<?php
						for( $y = 0; $y <= $count; $y++ ) {
							if( $y != $count ) {
								$comma	= ",";
							} else {
								$comma	= "";
							}
							?>
							["<?php echo $desc[$y]; ?>", <?php echo $latitude[$y]; ?>, <?php echo $longitude[$y]; ?>, <?php echo $y; ?>]<?php echo $comma; ?>
							<?php
						}
						?>
                    ];
                        
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 10,
                        center: new google.maps.LatLng(14.1617911,121.2850278),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                        
                    var infowindow = new google.maps.InfoWindow();
                    var marker, i;
                    
                    for (i = 0; i < locations.length; i++) {  
							marker = new google.maps.Marker({
							position: new google.maps.LatLng(locations[i][1], locations[i][2]),
							map: map
						});
                      
						google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
							return function() {
								infowindow.setContent(locations[i][0]);
								infowindow.open(map, marker);
								google.maps.event.addListener(marker, 'click', (function(marker, i) {
									return function() {
										switch(i) {
											<?php
											for( $z = 0; $z <= $count; $z++ ) {
												?>
												case <?php echo $z; ?>:
													location.href = "<?php echo $url[$z] ?>";
											   	break;
												<?php
											}
											?>
									   }
									}
								})(marker, i));
							}
						})(marker, i));
                      
                    }
                </script>
            
            </div>
             
			<div id="nav-list-right">
				<ul>
					<a href="http://rice.charliesoft.net/"><li>Reports</li></a>
					<a href="http://rice.charliesoft.net/map.php"><li>Map</li></a>
				</ul>
			</div>
		</div>
	</div>	
</body>
</html>