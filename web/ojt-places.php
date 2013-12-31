<?php
require_once ( 'includes/config.php' );
require_once ( 'includes/global-config.php' );
require_once ( PATH_LIBRARIES.'libraries.php' );
ob_start();

session_start();

$page_title = "OJT Places";

$where		= "";
if ( $_POST['search_company'] != "" ) {
	$search_company	= $string->sql_safe($_POST['search_company']);
	if ( $search_company == "Search OJT Company" ) {
		$where		.= "";
	} else {
		$field_names 	= array('company_name','company_info','contact_person');
		$where			.= $sql_helper->where_like($field_names, $search_company);
		
		$keyword		= 'Keyword: "'.$search_company.'"';
		
	}
} else {
	$where			.= "";
}

$sql 			= "SELECT * FROM ojt_companies $where";
$rs				= $sql_helper->get_results($sql);

$company_count	= $sql_helper->get_var("SELECT COUNT(company_id) FROM ojt_companies $where");
$company_count	= $company_count ? $company_count : 0;

if ( $company_count > 0 ) {
	if ( $keyword != "" ) {
		$count		= $company_count;
	} else {
		$count		= ($company_count - 1);
	}
	
} else {
	$count		= 0;
}

include ( PATH_TEMPLATES.'top.php' );

?>
<div id="maincont">
	<div class="content-top"><div id="latest-addition-title"><?php echo strtoupper($page_title); ?></div></div>
    <div class="contentpadding">
        <div class="latest-additions">
		<?php if ( $count > 0 ) { ?>
        	<table class="tb-latest-addition" border="0" cellspacing="15">
              <tr>
                <td>
                <div class="confirm-apply">
                    <div class="confirm-text">Note: Click/Hover on the icon to view company details.</div>
                </div>
                </td>
              </tr>
            </table>
            <?php
            if ( $keyword != "" ) {
				?>
				<div id='system-message'>
                   <div class='info'>
                      <div class='message'>
                        Search results for the <?php echo $keyword; ?>	
                      </div>
                   </div>
                </div>
				<?php
			}
			?>
        	<div class="map-pad">
            	<div id="map" style="width:670px; height:640px; overflow:hidden; border:solid 1px #EEEEEE;"></div>
                <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
				<script type="text/javascript">
                    <?php
					if ($rs) {
						$x			= 0;
						$company	= array();
						$latitude	= array();
						$longitude	= array();
						$url		= array();
						
						foreach( $rs as $record ) {
							$company_id			= $record->company_id;
							$company_name		= $record->company_name;
							$company_info		= $record->company_info;
							$contact_person		= $record->contact_person;
							
							$latitude[$x]		= $record->latitude;
							$longitude[$x]		= $record->longitude;
							
							$url[$x]			= WEBSITE_URL.'company/'.$company_id.'/details.html';
							
							$company[$x]		= '<strong style=\"font-size:16px\">'.$company_name.'</strong><br /><br /><br /><a class=\"link2\" href=\"'.$url[$x].'\"><strong>View Company</strong></a>'; 
							
							$x++;
						}
						
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
							["<?php echo $company[$y]; ?>", <?php echo $latitude[$y]; ?>, <?php echo $longitude[$y]; ?>, <?php echo $y; ?>]<?php echo $comma; ?>
							<?php
						}
						?>
                    ];
                        
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 10,
                        center: new google.maps.LatLng(14.792778,120.878889),
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
        <?php } else { ?>   
        <table class="tb-latest-addition" border="0" cellspacing="15">
            <tr>
                <td align="center"><br /><br /><br /><strong>No Company found on the database. <?php echo $keyword; ?></strong></td>
            </tr>
        </table> 
        <?php } ?>    
        </div> <!-- end latest additons -->
    </div> <!-- end content padding -->
    <div class="main_bottom_wrapper"></div>
</div> <!-- end maincont -->
<?
include ( PATH_TEMPLATES.'footer.php' );
ob_end_flush();
?>