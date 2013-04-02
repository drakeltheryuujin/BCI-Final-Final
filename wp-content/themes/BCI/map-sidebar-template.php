<?php  $project_id = $_GET['project'];
		
		if($project_id) {
			
			$project = get_post($project_id);
			$lat =  get_post_meta($project->ID, 'lat', true);
			$lng =  get_post_meta($project->ID, 'lng', true);
			if(!is_numeric($lat)) {
				$lat = 0;
			}
			if(!is_numeric($lng)) {
				$lng = 0;
			}			
		}
		else {
			$project = false;
			$lat =  0;
			$lng =  0;
		}
		
		$args = array(
			'offset'          => 0,
			'numberposts'	  => 9999,
			'category_name'	  => 'projects',
			'orderby'		 => 'title',
			'order'           => 'ASC',
			'post_type'       => 'post',
			'post_status'     => 'publish',
			'suppress_filters' => true
		);
	
		$projects = get_posts($args);		
		
		
  ?>
<script>


function initialize() {
	
  var position = new google.maps.LatLng(<?php echo $lat.','.$lng; ?>);

  var mapOptions = {
    zoom: 2,
    center: position,
    scrollwheel: false,
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
    draggable: true,	
    mapTypeId: google.maps.MapTypeId.SATELLITE
  }
  
  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
  
  <?php
  if($project) { ?>
  
  	map.setZoom(3);
  
	var marker = new google.maps.Marker({
		position: position,
		title:"<?php echo $project->post_title;?>"
	});
    marker.setMap(map);  
	
	var infowindow = new google.maps.InfoWindow({
		content: <?php echo json_encode($project->post_excerpt);?>
	});

	google.maps.event.addListener(marker, 'click', function() {
	  infowindow.open(map,marker);
	});
	infowindow.open(map,marker);

  <?php
  } else { ?>

	$(".infowindow_link").live('click', function(){ 
		window.location.href=this.href; 
		});	  
	  
	  <?php
	  foreach($projects as $proj) {
		  
		$lat =  get_post_meta($proj->ID, 'lat', true);
		$lng =  get_post_meta($proj->ID, 'lng', true);
		
		if(is_numeric($lat) && is_numeric($lng)) {
			
			$window_content = '<div style="width: 250px">'.
								'<h3 style="color: #666;">'.htmlspecialchars($proj->post_title).'</h3>'.						
								'<span>'.htmlspecialchars($proj->post_excerpt).'</span>'.			
								'<a class="side-menu-item infowindow_link btn" href="'.add_query_arg( 'project', $proj->ID).'" id="post_'.$proj->ID.'">
								View Project
								</a>'.
								'</div>';
							
			 ?>
  			var position = new google.maps.LatLng(<?php echo $lat.','.$lng; ?>);
			 
			var marker_<?php echo $proj->ID;?> = new google.maps.Marker({
				position: position,
				title:"<?php echo $proj->post_title;?>"
			});
			marker_<?php echo $proj->ID;?>.setMap(map);  
			
			var infowindow_<?php echo $proj->ID;?> = new google.maps.InfoWindow({
				content: <?php echo json_encode($window_content);?>
			});
		
			google.maps.event.addListener(marker_<?php echo $proj->ID;?>, 'click', function() {
			  infowindow_<?php echo $proj->ID;?>.open(map,marker_<?php echo $proj->ID;?>);
			});
			<?php			
		}
	  }
  } ?>  
  
}

function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyDItPricYXBgCvuHVHQ3TD2Z5Xw2JmEpkY&sensor=false&callback=initialize";
  document.body.appendChild(script);
}

window.onload = loadScript;

</script>

<div class="image" id="map_canvas" style="position:absolute;top:0;left:0;"></div>			

<div class="wrapper clearfix">
    <div class="text">
        <ul>
        <?php
		
		if($project) { ?>
			
            <li>           
                    <h1><?php echo apply_filters('the_title', $project->post_title); ?></h1>
                    <div class="description">
                        <?php echo apply_filters('the_content', $project->post_content); ?>
                    </div>
            </li>            
            
            <?php
		}
		else {

            while ( have_posts() ) : the_post(); ?>
            <li>           
                    <h1><?php the_title(); ?></h1>
                    <div class="description">
                        <?php the_content(); ?>
                    </div>
            </li>       
            <?php    

            endwhile;
			
		}?>
        </ul>	      
</div>      
<div class="side-menu">
    <ul id="sub-sections">
        <?php
		
		foreach( $projects as $post ) { ?>
        	<li>
            	<a class="side-menu-item" href="<?php echo add_query_arg( 'project', $post->ID );?>" id="post_<?php echo $post->ID;?>">
					<?php echo $post->post_title;?>
                </a>
            </li>
		<?php
		}?>
    
    </ul>
</div>
</div>