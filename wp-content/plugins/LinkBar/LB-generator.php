<?php
defined('ABSPATH') or die("Nope.");

// Add stylesheet to the page
function LB_add_scripts() {
	wp_enqueue_script( 'LB-script', plugins_url( 'LB-script.js', __FILE__ ),'','',true );
}

add_action( 'wp_enqueue_scripts', 'LB_add_scripts' );

function get_the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			return mb_substr( $subex, 0, $excut ).'...';
		} else {
			return $subex.'...';
		}
	} else {
		return $excerpt;
	}
}

function capture_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $result = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    return;
  }
  return $first_img;
}

function LB_services_display( $atts ) {
	
	$icon_width = get_option("lb_icon_width");
	$icon_height = get_option("lb_icon_height");
	$icon_radius = get_option("lb_icon_radius");
	$icon_margin = get_option("lb_icon_margin");
	$default_bg = get_option("lb_default_bg");
	$default_fill = get_option("lb_default_fill");
	
	$thePermalink = urlencode( get_the_permalink() );
	$featureURL = urlencode( wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) );
	$thePageTitle = urlencode( get_the_title() );
	$interiorImage = urlencode( capture_first_image() );
	$thePageExcept = get_the_excerpt_max_charlength(140);
	
	$services = shortcode_atts( array(
		'facebook' => 0,
		'twitter' => 0,
		'googleplus' => 0,
		'linkedin' => 0,
		'pinterest' => 0,
		'tumblr' => 0,
		'reddit' => 0,
		'stumbleupon' => 0,
		'email' => 0,
		'url' => 0
	), $atts, 'linkbar');
	
	$links = array();
	$LB_results = "";
	
	foreach( $services as $site => $included) {
		if ($included) {
			array_push($links, $site);
		}
	}

	$icon_scale = get_option("lb_icon_scale");
	$icon_padding = (100 - $icon_scale)/2;

	if( $icon_scale > "70" ) {
		$icon_fb_scale = ($icon_scale * 1.2);
	}else{
		$icon_fb_scale = ($icon_scale * 1.6);
	}

	$icon_fb_padding = (125 - $icon_fb_scale)/2;
?>	
<style> 
	.LB .LB-display-none {
	  display: none;
	}
	
	.LB {
	  display: inline-block;
	  position: relative;
	  height: <?php echo $icon_height;?>px;
	  width: <?php echo $icon_width;?>px;
	  border-radius: <?php echo $icon_radius;?>;
	  margin: <?php echo $icon_margin;?>px;
	  background-color: <?php echo $default_bg;?>;
	  vertical-align: top;
	  overflow: hidden;
	  transition: background-color 0.3s ease;
	  transform: translateZ();
	}
	.LB svg {
	  position: absolute;
	  fill: <?php echo $default_fill;?>;
	  transition: fill 0.3s ease;
	}
	
	.LB:hover svg {
	  fill: white;
	}
	
	.LB-facebook svg {
	  top: <?php echo $icon_fb_padding;?>%;
	  left: 11%;
	}
	.LB-facebook:hover {
	  background-color: #3b5998;
	}
	
	.LB-twitter svg {
	  top: <?php echo ($icon_padding + 3);?>%;
	  left: 3%;
	}
	.LB-twitter:hover {
	  background-color: #55acee;
	}
	
	.LB-googleplus svg {
	  top: <?php echo ($icon_padding + 3);?>%;
	  left: 3%;
	}
	.LB-googleplus:hover {
	  background-color: #dd4b39;
	}
	
	.LB-linkedin svg {
	  top: <?php echo ($icon_padding - 1);?>%;
	  left: 2.5%;
	}
	.LB-linkedin:hover {
	  background-color: #007bb6;
	}
	
	.LB-pinterest svg {
	  top: <?php echo ($icon_padding + 2);?>%;
	}
	.LB-pinterest:hover {
	  background-color: #B8242A;
	}
	
	.LB-tumblr svg {
	  top: <?php echo ($icon_padding + 2);?>%;
	}
	.LB-tumblr:hover {
	  background-color: #35465c;
	}
	
	.LB-reddit-eye {
	  fill: <?php echo $default_bg;?>;
	  transition: fill 0.3s ease;
	}
	
	.LB-reddit-body {
	  fill: <?php echo $default_fill;?>;
	  transition: fill 0.3s ease;
	}
	
	.LB-reddit-mouth {
	  fill: <?php echo $default_bg;?>;
	  transition: fill 0.3s ease;
	}
	
	.LB-reddit svg {
	  top: <?php echo $icon_padding;?>%;
	}
	.LB-reddit:hover {
	  background-color: #cee3f8;
	}
	.LB-reddit:hover .LB-reddit-body, .LB-reddit:hover .LB-reddit-mouth {
	  fill: black;
	}
	.LB-reddit:hover .LB-reddit-eye {
	  fill: #dd452a;
	}
	
	.LB-stumbleupon svg {
	  top: <?php echo $icon_padding;?>%;
	}
	.LB-stumbleupon:hover {
	  background-color: #eb4924;
	}
	
	.LB-email svg {
	  top: <?php echo ($icon_padding + 6);?>%;
	}
	.LB-email:hover {
	  background-color: #c02ee0;
	}
	
	.LB-url {
	  cursor: pointer;
	  overflow: visible;
	  
	}
	.LB-url svg {
	  top: <?php echo $icon_padding;?>%;
	}
	.LB-url:hover {
	  background-color: #1ada41;
	}
	.LB-url input {
	  position: absolute;
	  top: <?php echo $icon_padding;?>%;
	  left: 110%;
	  display: inline;
	  opacity: 1;
	  height: auto;
	  width: auto;
	  background-color: white;
	  border: 2px solid #d2d2d2;
	  border-radius: 3px;
	  font-family: monospace;
	  font-size: 12px;
	  padding: 2%;
	  transition: all 0.3s;
	}

</style>

<?php
	
	ob_start();
	
	foreach( $links as $service ) {
		switch($service) {
			case('facebook'):
				echo '<a class="LB LB-facebook" href="https://www.facebook.com/sharer/sharer.php?u='.$thePermalink.'&t='.$thePageTitle.'" target="_blank" title="Share on Facebook">
							<svg width="100%" height="'.$icon_fb_scale.'%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 118 227" >
								<path d="M76.377,123.229 L111.069,123.229 L116.263,82.949 L76.377,82.949 L76.377,57.232 C76.377,45.57 79.615,37.623 96.339,37.623 L117.669,37.613 L117.669,1.587 C113.978,1.097 101.318,-2.84217094e-14 86.588,-2.84217094e-14 C55.835,-2.84217094e-14 34.781,18.771 34.781,53.244 L34.781,82.949 L5.68434189e-14,82.949 L5.68434189e-14,123.229 L34.781,123.229 L34.781,226.584 L76.377,226.584 L76.377,123.229 Z"></path>
							</svg>
							</a>';
			break;
			case('twitter'):
				echo '<a class="LB LB-twitter" href="https://twitter.com/share?url='.$thePermalink.'&text='.$thePageTitle.'" target="_blank" title="Share on Twitter">
						<svg width="100%" height="'.$icon_scale.'%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 274 223" >
							<path d="M85.98,223 C54.305,223 24.822,213.715 0,197.801 C4.388,198.319 8.853,198.584 13.38,198.584 C39.658,198.584 63.843,189.617 83.039,174.574 C58.495,174.121 37.781,157.905 30.644,135.621 C34.068,136.276 37.582,136.627 41.196,136.627 C46.312,136.627 51.267,135.942 55.974,134.66 C30.314,129.508 10.981,106.838 10.981,79.662 C10.981,79.426 10.981,79.191 10.985,78.957 C18.548,83.158 27.196,85.681 36.391,85.972 C21.341,75.914 11.438,58.746 11.438,39.287 C11.438,29.008 14.204,19.373 19.032,11.089 C46.696,45.023 88.025,67.353 134.641,69.692 C133.685,65.587 133.188,61.306 133.188,56.91 C133.188,25.935 158.302,0.822 189.279,0.822 C205.411,0.822 219.988,7.634 230.22,18.535 C242.996,16.019 255,11.351 265.837,4.924 C261.649,18.021 252.756,29.013 241.175,35.955 C252.521,34.599 263.331,31.584 273.39,27.123 C265.87,38.371 256.36,48.25 245.402,56.158 C245.51,58.563 245.564,60.982 245.564,63.414 C245.564,137.533 189.148,223 85.98,223"></path>
						</svg>
					</a>';
			
			break;
			case('googleplus'):
				echo '<a class="LB LB-googleplus" href="https://plus.google.com/share?url='.$thePermalink.'" target="_blank" title="Share on Google+">
						<svg width="100%" height="'.$icon_scale.'%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 132 111" >
							<path d="M131.5,22.156 L108.5,22.156 L108.5,0.156 L103.5,0.156 L103.5,22.156 L81.5,22.156 L81.5,28.156 L103.5,28.156 L103.5,50.156 L108.5,50.156 L108.5,28.156 L131.5,28.156 L131.5,22.156"></path>
							<path d="M35.076,105.519 C21.9,105.519 12.385,97.178 12.385,87.159 C12.385,77.34 24.188,69.166 37.363,69.309 C40.438,69.341 43.303,69.836 45.904,70.678 C53.057,75.652 58.187,78.463 59.635,84.131 C59.907,85.281 60.055,86.463 60.055,87.671 C60.055,97.689 53.6,105.519 35.076,105.519 L35.076,105.519 Z M38.539,46.762 C29.694,46.497 21.289,36.867 19.764,25.255 C18.236,13.641 24.166,4.751 33.01,5.015 C41.851,5.281 50.259,14.6 51.786,26.213 C53.31,37.827 47.38,47.026 38.539,46.762 L38.539,46.762 Z M56.877,63.96 C53.775,61.764 47.842,56.423 47.842,53.283 C47.842,49.603 48.892,47.791 54.43,43.463 C60.107,39.027 64.125,33.015 64.125,25.76 C64.125,17.126 60.279,8.156 53.06,6.156 L63.943,6.156 L71.625,0.156 L37.299,0.156 C21.908,0.156 7.425,11.815 7.425,25.321 C7.425,39.121 17.916,50.261 33.572,50.261 C34.66,50.261 35.719,50.239 36.754,50.164 C35.738,52.11 35.012,54.301 35.012,56.576 C35.012,60.411 37.075,63.521 39.684,66.059 C37.713,66.059 35.81,66.116 33.733,66.116 C14.671,66.116 0,78.257 0,90.846 C0,103.244 16.084,111 35.146,111 C56.877,111 68.881,98.67 68.881,86.27 C68.881,76.328 65.946,70.374 56.877,63.96 L56.877,63.96 Z"></path>
						</svg>
				
					</a>';
			
			break;
			case('linkedin'):
				echo '<a class="LB LB-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url='.$thePermalink.'&title='.$thePageTitle.'&summary='.$thePageExcept.'&source=" target="_blank" title="Share on LinkedIn">
						<svg width="100%" height="'.$icon_scale.'%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 114 109" >
							<path d="M13.637,25.604 C22.141,25.604 27.436,19.965 27.436,12.922 C27.277,5.725 22.141,0.244 13.799,0.244 C5.453,0.244 0,5.725 0,12.922 C0,19.965 5.293,25.604 13.479,25.604 L13.637,25.604 L13.637,25.604 Z M1.441,109 L25.83,109 L25.83,35.62 L1.441,35.62 L1.441,109 Z"></path>
							<path d="M39.328,109 L63.718,109 L63.718,68.021 C63.718,65.829 63.877,63.636 64.521,62.071 C66.284,57.687 70.299,53.147 77.035,53.147 C85.863,53.147 89.393,59.88 89.393,69.743 L89.393,109 L113.78,109 L113.78,66.925 C113.78,44.386 101.748,33.897 85.7,33.897 C72.542,33.897 66.766,41.254 63.557,46.263 L63.718,46.263 L63.718,35.62 L39.328,35.62 C39.648,42.502 39.328,109 39.328,109"></path>
						</svg>
				</a>';
			
			break;
			case('pinterest'):
				if ( get_the_post_thumbnail($post_id) != '' ) {
					echo '<a class="LB LB-pinterest" href="https://pinterest.com/pin/create/button/?url='.$thePermalink.'&media='.$featureURL.'&description='.$thePageExcept.'" target="_blank" title="Share on Pinterest">
							<svg width="100%" height="'.$icon_scale.'%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86 111" >
								<path d="M45.465,0.248 C15.24,0.248 0,21.918 0,39.988 C0,50.93 4.143,60.664 13.027,64.292 C14.484,64.887 15.789,64.312 16.212,62.699 C16.506,61.583 17.201,58.766 17.512,57.594 C17.937,55.999 17.772,55.439 16.597,54.048 C14.035,51.026 12.397,47.114 12.397,41.573 C12.397,25.496 24.426,11.104 43.719,11.104 C60.802,11.104 70.187,21.543 70.187,35.484 C70.187,53.826 62.07,69.307 50.02,69.307 C43.364,69.307 38.383,63.803 39.979,57.053 C41.892,48.994 45.596,40.297 45.596,34.479 C45.596,29.272 42.801,24.929 37.016,24.929 C30.212,24.929 24.747,31.967 24.747,41.396 C24.747,47.4 26.776,51.461 26.776,51.461 C26.776,51.461 19.814,80.96 18.594,86.126 C16.163,96.415 18.228,109.027 18.403,110.301 C18.505,111.056 19.476,111.236 19.915,110.665 C20.542,109.845 28.645,99.842 31.399,89.847 C32.179,87.017 35.875,72.361 35.875,72.361 C38.085,76.577 44.545,80.291 51.414,80.291 C71.864,80.291 85.739,61.647 85.739,36.692 C85.739,17.822 69.756,0.248 45.465,0.248"></path>
							</svg>
						</a>';
				}else{
					echo '<a class="LB LB-pinterest" href="https://pinterest.com/pin/create/button/?url='.$thePermalink.'&media='.$interiorImage.'&description='.$thePageExcept.'" target="_blank" title="Share on Pinterest">
							<svg width="100%" height="'.$icon_scale.'%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86 111" >
								<path d="M45.465,0.248 C15.24,0.248 0,21.918 0,39.988 C0,50.93 4.143,60.664 13.027,64.292 C14.484,64.887 15.789,64.312 16.212,62.699 C16.506,61.583 17.201,58.766 17.512,57.594 C17.937,55.999 17.772,55.439 16.597,54.048 C14.035,51.026 12.397,47.114 12.397,41.573 C12.397,25.496 24.426,11.104 43.719,11.104 C60.802,11.104 70.187,21.543 70.187,35.484 C70.187,53.826 62.07,69.307 50.02,69.307 C43.364,69.307 38.383,63.803 39.979,57.053 C41.892,48.994 45.596,40.297 45.596,34.479 C45.596,29.272 42.801,24.929 37.016,24.929 C30.212,24.929 24.747,31.967 24.747,41.396 C24.747,47.4 26.776,51.461 26.776,51.461 C26.776,51.461 19.814,80.96 18.594,86.126 C16.163,96.415 18.228,109.027 18.403,110.301 C18.505,111.056 19.476,111.236 19.915,110.665 C20.542,109.845 28.645,99.842 31.399,89.847 C32.179,87.017 35.875,72.361 35.875,72.361 C38.085,76.577 44.545,80.291 51.414,80.291 C71.864,80.291 85.739,61.647 85.739,36.692 C85.739,17.822 69.756,0.248 45.465,0.248"></path>
							</svg>
						</a>';
				}
			
			break;
			case('tumblr'):
				echo '<a class="LB LB-tumblr" href="http://www.tumblr.com/share/link?url='.$thePermalink.'&name='.$thePageTitle.'&description='.$thePageExcept.'" target="_blank"title="Share on Tumblr">
						<svg width="100%" height="'.$icon_scale.'%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 69 121" >
							<path d="M40.49,25.892 L40.49,-0.245 L23.616,-0.245 C23.236,0.722 23.035,1.873 23.035,3.046 C22.854,3.614 22.652,4.018 22.652,4.595 C20.916,14.273 15.881,21.052 7.354,24.734 C4.836,25.892 2.519,26.072 0,25.892 L0,46.987 L12.392,46.987 C12.596,76.628 12.596,91.92 12.596,92.696 L12.596,94.452 C14.151,107.408 20.916,115.158 32.926,118.063 C37.762,119.421 42.979,120 48.225,120 C54.987,119.808 61.579,118.647 68.171,116.511 L68.171,91.731 C64.307,92.892 60.794,93.858 57.714,94.812 C51.711,96.573 46.668,95.412 42.597,91.537 C42.215,90.954 41.636,90.178 41.43,89.404 C40.872,86.305 40.49,83.024 40.49,79.909 L40.49,46.987 L67.381,46.987 L67.381,25.892 L40.49,25.892"></path>
						</svg>
					</a>';
			
			break;
			case('reddit'):
				echo '<a class="LB LB-reddit" href="http://www.reddit.com/submit?url='.$thePermalink.'&title='.$thePageTitle.'" target="_blank" title="Share on Reddit">
						<svg width="100%" height="'.$icon_scale.'%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 104 88" >
							
							<path d="M96.416,56.477 C96.416,72.7 76.41,85.852 51.729,85.852 C27.047,85.852 7.041,72.7 7.041,56.477 C7.041,40.254 27.047,27.102 51.729,27.102 C76.41,27.102 96.416,40.254 96.416,56.477" fill="#ffffff" ></path>
							<path class="LB-reddit-body" d="M51.729,28.977 C28.121,28.977 8.916,41.313 8.916,56.477 C8.916,71.641 28.121,83.977 51.729,83.977 C75.336,83.977 94.541,71.641 94.541,56.477 C94.541,41.313 75.336,28.977 51.729,28.977 L51.729,28.977 Z M51.729,87.727 C26.053,87.727 5.166,73.707 5.166,56.477 C5.166,39.247 26.053,25.227 51.729,25.227 C77.404,25.227 98.291,39.247 98.291,56.477 C98.291,73.707 77.404,87.727 51.729,87.727 L51.729,87.727 Z"></path>
							<path class="LB-reddit-body" d="M87.875,4.02 C84.566,4.02 81.875,6.711 81.875,10.02 C81.875,13.329 84.566,16.02 87.875,16.02 C91.184,16.02 93.875,13.329 93.875,10.02 C93.875,6.711 91.184,4.02 87.875,4.02 L87.875,4.02 Z M87.875,19.77 C82.498,19.77 78.125,15.397 78.125,10.02 C78.125,4.643 82.498,0.27 87.875,0.27 C93.25,0.27 97.625,4.643 97.625,10.02 C97.625,15.397 93.25,19.77 87.875,19.77 L87.875,19.77 Z"></path>
							<path class="LB-reddit-body" d="M6.15,53.276 C2.357,51.168 0,47.168 0,42.833 C0,36.251 5.355,30.895 11.937,30.895 C15.125,30.895 18.123,32.137 20.379,34.391 L17.727,37.043 C16.18,35.497 14.123,34.645 11.937,34.645 C7.424,34.645 3.75,38.317 3.75,42.833 C3.75,45.807 5.367,48.551 7.971,49.997 L6.15,53.276"></path>
							<path class="LB-reddit-body" d="M97.486,53.276 L95.664,49.997 C98.268,48.551 99.885,45.807 99.885,42.833 C99.885,38.317 96.213,34.645 91.697,34.645 C89.512,34.645 87.455,35.497 85.908,37.043 L83.256,34.391 C85.512,32.137 88.51,30.895 91.697,30.895 C98.279,30.895 103.635,36.251 103.635,42.833 C103.635,47.168 101.277,51.168 97.486,53.276"></path>
							<path class="LB-reddit-eye" d="M29.6,50.958 C29.6,46.909 32.883,43.623 36.937,43.623 C40.988,43.623 44.271,46.909 44.271,50.958 C44.271,55.01 40.988,58.293 36.937,58.293 C32.883,58.293 29.6,55.01 29.6,50.958"></path>
							<path class="LB-reddit-eye" d="M60.225,50.958 C60.225,46.909 63.508,43.623 67.562,43.623 C71.613,43.623 74.896,46.909 74.896,50.958 C74.896,55.01 71.613,58.293 67.562,58.293 C63.508,58.293 60.225,55.01 60.225,50.958"></path>
							<path class="LB-reddit-body" d="M52.041,28.145 C51.834,28.145 51.625,28.11 51.418,28.038 C50.441,27.694 49.93,26.624 50.271,25.647 L58.752,1.553 L79.561,6.528 C80.568,6.768 81.189,7.782 80.949,8.788 C80.707,9.795 79.693,10.414 78.689,10.176 L61.166,5.987 L53.811,26.891 C53.539,27.663 52.814,28.145 52.041,28.145" fill="#ff0000" ></path>
							<path class="LB-reddit-mouth" d="M51.643,76.383 C39.686,76.383 34.902,70.954 34.705,70.723 C34.031,69.936 34.123,68.75 34.91,68.079 C35.693,67.411 36.867,67.497 37.543,68.272 C37.65,68.389 41.643,72.633 51.643,72.633 C61.816,72.633 66.277,68.239 66.322,68.196 C67.043,67.461 68.229,67.444 68.969,68.164 C69.705,68.883 69.732,70.055 69.021,70.799 C68.803,71.028 63.539,76.383 51.643,76.383"></path>
						</svg>
					</a>';
			
			break;
			case('stumbleupon'):
				echo '<a class="LB LB-stumbleupon" href="http://www.stumbleupon.com/badge/?url='.$thePermalink.'" target="_blank" title="Share on Stumbleupon">
						<svg width="100%" height="'.$icon_scale.'%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 110" >
							<path d="M143.55,77.54 C143.55,95.273 129.18,109.643 111.465,109.643 C93.836,109.643 79.52,95.413 79.371,77.838 L79.371,57.827 L89.176,62.4 L103.798,58.037 L103.798,78.206 C103.798,82.394 107.197,85.793 111.395,85.793 C115.592,85.793 118.99,82.394 118.99,78.206 L118.99,57.634 L143.55,57.634 L143.55,77.54 L143.55,77.54 Z M71.775,24.637 C67.579,24.637 64.178,28.037 64.178,32.225 L64.144,78.014 C63.889,95.519 49.661,109.643 32.085,109.643 C14.369,109.643 0,95.273 0,77.54 L0,57.634 L24.559,57.634 L24.559,77.277 C24.559,81.482 27.958,84.883 32.155,84.883 C36.352,84.883 39.75,81.482 39.75,77.277 L39.75,30.928 C40.373,13.756 54.443,0 71.775,0 C89.166,0 103.281,13.86 103.798,31.121 L103.798,41.268 L89.176,45.63 L79.371,41.057 L79.371,32.225 C79.371,28.037 75.973,24.637 71.775,24.637 L71.775,24.637 Z"></path>
						</svg>
					</a>';
			
			break;
			case('email'):
				echo '<a href="mailto:?subject='.urldecode($thePageTitle).'&body='.$thePageExcept.'%0A%0A'.$thePermalink.'" class="LB LB-email" title="Share by email">
						<svg width="100%" height="'.($icon_scale - 10).'%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 57" >
							<path d="M65.57,56.999 C67.188,56.999 68.59,56.464 69.781,55.409 L49.387,35.011 C48.895,35.362 48.422,35.702 47.973,36.026 C46.445,37.151 45.207,38.03 44.258,38.659 C43.305,39.288 42.039,39.929 40.461,40.585 C38.879,41.241 37.406,41.569 36.039,41.569 L35.961,41.569 C34.594,41.569 33.121,41.241 31.539,40.585 C29.957,39.929 28.691,39.288 27.742,38.659 C26.793,38.03 25.555,37.151 24.027,36.026 C23.602,35.714 23.129,35.37 22.617,35.007 L2.215,55.409 C3.406,56.464 4.809,56.999 6.43,56.999 L65.57,56.999 Z"></path>
							<path d="M4.059,22.167 C2.531,21.148 1.18,19.983 0,18.671 L0,49.706 L17.98,31.726 C14.383,29.214 9.746,26.03 4.059,22.167 L4.059,22.167 Z"></path>
							<path d="M67.98,22.167 C62.508,25.87 57.859,29.058 54.027,31.733 L72,49.706 L72,18.671 C70.848,19.956 69.508,21.12 67.98,22.167 L67.98,22.167 Z"></path>
							<path d="M65.57,0.429 L6.43,0.429 C4.367,0.429 2.777,1.124 1.668,2.519 C0.555,3.909 0,5.651 0,7.741 C0,9.429 0.738,11.257 2.211,13.226 C3.684,15.194 5.25,16.741 6.91,17.866 C7.82,18.507 10.566,20.417 15.148,23.593 C17.621,25.304 19.77,26.8 21.621,28.089 C23.195,29.187 24.555,30.136 25.676,30.925 C25.805,31.015 26.004,31.159 26.273,31.351 C26.562,31.558 26.93,31.823 27.383,32.151 C28.254,32.78 28.977,33.288 29.551,33.675 C30.129,34.066 30.824,34.499 31.641,34.983 C32.457,35.464 33.23,35.827 33.953,36.066 C34.676,36.308 35.344,36.429 35.961,36.429 L36.039,36.429 C36.656,36.429 37.328,36.308 38.051,36.066 C38.773,35.827 39.543,35.464 40.359,34.983 C41.176,34.499 41.871,34.066 42.449,33.675 C43.027,33.288 43.75,32.78 44.621,32.151 C45.07,31.823 45.438,31.558 45.727,31.351 C45.996,31.159 46.199,31.015 46.328,30.925 C47.199,30.316 48.562,29.37 50.395,28.097 C53.723,25.784 58.629,22.378 65.129,17.866 C67.086,16.499 68.719,14.851 70.031,12.925 C71.344,10.995 72,8.972 72,6.858 C72,5.089 71.363,3.577 70.09,2.316 C68.82,1.058 67.312,0.429 65.57,0.429 L65.57,0.429 Z"></path>
						</svg>			
					</a>';
			
			break;
			case('url'):
				echo '<label class="LB LB-url" id="LB-url-container" title="Share this URL">
						<svg width="100%" height="'.$icon_scale.'%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386 386" >
							<path d="M355.828,174.994 L283.402,247.392 C243.426,287.392 178.578,287.392 138.602,247.392 C132.301,241.119 127.379,234.044 123.051,226.744 L156.703,193.091 C158.301,191.478 160.277,190.556 162.164,189.466 C164.488,197.419 168.551,204.943 174.801,211.193 C194.766,231.166 227.254,231.142 247.203,211.193 L319.602,138.791 C339.578,118.818 339.578,86.341 319.602,66.38 C299.652,46.416 267.176,46.416 247.203,66.38 L221.453,92.154 C200.566,84.017 178.051,81.83 156.141,85.041 L211,30.181 C251,-9.807 315.828,-9.807 355.828,30.181 C395.801,70.169 395.801,135.005 355.828,174.994 L355.828,174.994 Z M164.363,294.044 L138.602,319.818 C118.641,339.767 86.152,339.767 66.191,319.818 C46.227,299.845 46.227,267.369 66.191,247.392 L138.602,174.994 C158.578,155.017 191.039,155.017 211.004,174.994 C217.238,181.232 221.301,188.755 223.652,196.693 C225.555,195.595 227.504,194.693 229.102,193.095 L262.754,159.455 C258.453,152.13 253.504,145.08 247.203,138.794 C207.227,98.806 142.379,98.806 102.391,138.794 L29.992,211.193 C-9.996,251.193 -9.996,316.017 29.992,356.017 C69.977,395.994 134.816,395.994 174.805,356.017 L229.68,301.142 C207.754,304.369 185.238,302.169 164.363,294.044 L164.363,294.044 Z"></path>
						</svg>
						<input type="text" value="'.urldecode($thePermalink).'" class="LB LB-display-none" id="LB-url-to-select" readonly></input>
					</label>';

			break;
			default:
				echo 'ERROR';
		}
	}

	$output = ob_get_contents();
	ob_end_clean();
	
	return '<div class="LB-contain">'.$output.'</div>';
}

function register_shortcodes(){
  add_shortcode('linkbar', 'LB_services_display');
}

add_action( 'init', 'register_shortcodes');

?>