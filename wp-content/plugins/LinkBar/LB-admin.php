<?php
defined('ABSPATH') or die("Nope.");

function LB_admin_create() {

	if (isset($_POST["update_settings"])) {
	    $icon_width = esc_attr($_POST["icon_width"]);   
	    $icon_height = esc_attr($_POST["icon_height"]);   
	    $icon_radius = esc_attr($_POST["icon_radius"]);   
	    $icon_margin = esc_attr($_POST["icon_margin"]);   
	    $icon_scale = esc_attr($_POST["icon_scale"]);   
	    $default_bg = esc_attr($_POST["default_bg"]);   
	    $default_fill = esc_attr($_POST["default_fill"]);   
	    
	    update_option("lb_icon_width", $icon_width);
	    update_option("lb_icon_height", $icon_height);
	    update_option("lb_icon_radius", $icon_radius);
	    update_option("lb_icon_margin", $icon_margin);
	    update_option("lb_icon_scale", $icon_scale);
	    update_option("lb_default_bg", $default_bg);
	    update_option("lb_default_fill", $default_fill);
	    ?>
	    	<div id="message" class="updated"><h3>Settings saved!</h3></div>
	    <?php
	}else{
	    $icon_width = get_option("lb_icon_width");
	    $icon_height = get_option("lb_icon_height");
	    $icon_radius = get_option("lb_icon_radius");
	    $icon_margin = get_option("lb_icon_margin");
	    $icon_scale = get_option("lb_icon_scale");
	    $default_bg = get_option("lb_default_bg");
	    $default_fill = get_option("lb_default_fill");
	}
?>
	<div class="wrap">
		<h2><b>Link Bar Settings</b></h2>
		
		<div class="LB-admin-interior">
			<style type="text/css">
				input[size='2'] { 
					text-align:right; 
				}
				.LB-admin-interior {
					background-color: white;
					padding: 20px;
					width: auto;
				}
				label[for="default-backgroundcolor"] h4,label[for="default-fill-color"] h4 {
					vertical-align: top;
				}
			</style>
			<h3>Icon Styles</h3>
				 <form method="POST" action="">
                        <p>Sets the height and width of all the service icons.<br/>The border radius option sets the style of the container. A value of 0% gives square container, while a value of 50% yields a circular container, assuming the width and height are equal. Anything in between results in a rounded rectangle. You must include the measurement suffix <code>(%,px,em...)</code>. Use a high pixel value and a rectangle sized container for a pillbox shape<br/>Margin puts white space between the icons.<br/>Scale effects the size of the logo inside the container. A scale of 50 is normal, 100 is full size, 0 makes them disappear.</p>
                        <label for="icon_width">
                           <h4>Icon Width:
							   <input type="text" name="icon_width" value="<?php echo $icon_width;?>" size="2" />px</h4>
                        </label> 
                        
                        <label for="icon_height">
                           <h4>Icon Height:
							   <input type="text" name="icon_height" value="<?php echo $icon_height;?>" size="2" />px</h4>
                        </label>
                        
                        <label for="icon_radius">
                           <h4>Icon Border Radius:
							   <input type="text" name="icon_radius" value="<?php echo $icon_radius;?>" size="4" /></h4>
                        </label>
                        
                        <label for="icon_margin">
                           <h4>Margin Between Icons:
							   <input type="text" name="icon_margin" value="<?php echo $icon_margin;?>" size="2" />px</h4>
                        </label>
                        
                        <label for="icon_scale">
                           <h4>Scale of Logos:
							   <input type="text" name="icon_scale" value="<?php echo $icon_scale;?>" size="2" /></h4>
                        </label>
                        <hr/>
                        
                        <p>The default background color is applied to all icon containers when inactive.<br/>The default fill color is applied to all icons when inactive.</p>
                        <p>Adjusts the background color and fill color of each service.</p>
						
						<label for="default-backgroundcolor">
                           <h4>Default Background Color:
							   <input type="text" name="default_bg" class="my-color-field" value="<?php echo $default_bg;?>" size="15" /></h4>
                        </label> 
                        
                        <label for="default-fill-color">
                           <h4>Default Fill Color:
							   <input type="text" name="default_fill" class="my-color-field" value="<?php echo $default_fill;?>" size="15" /></h4>
                        </label> 

						<input type="hidden" name="update_settings" value="Y" />
						
						<p>
							<input type="submit" value="Update" class="button-primary"/>
						</p>
				</form>
				<hr/>
			
			<h3>Preview of all icons:</h3>
				<?php echo do_shortcode('[linkbar facebook=1 twitter=1 googleplus=1 linkedin=1 pinterest=1 tumblr=1 reddit=1 stumblupon=1 email=1 url=1]'); ?>
			<hr/>
			<h3>Shortcode Generator</h3>
			<h4> Select the services you want to include:</h4>
			<form id="LB-shortcode-generator">
				<label class="service-check">
					<h4><input type="checkbox" value="facebook" />Facebook</h4>
				</label>
				<label class="service-check">
					<h4><input type="checkbox" value="twitter" />Twitter</h4>
				</label>
				<label class="service-check">
					<h4><input type="checkbox" value="googleplus"/>Google+</h4>
				</label>
				<label class="service-check">
					<h4><input type="checkbox" value="linkedin"/>LinkedIn</h4>
				</label>
				<label class="service-check">
					<h4><input type="checkbox" value="pinterest"/>Pinterest</h4>
				</label>
				<label class="service-check">
					<h4><input type="checkbox" value="tumblr"/>Tumblr</h4>
				</label>
				<label class="service-check">
					<h4><input type="checkbox" value="reddit"/>Reddit</h4>
				</label>
				<label class="service-check">
					<h4><input type="checkbox" value="stumblupon"/>Stumbleupon</h4>
				</label>
				<label class="service-check">
					<h4><input type="checkbox" value="email" />Email</h4>
				</label>
				<label class="service-check">
					<h4><input type="checkbox" value="url" />URL</h4>
				</label>
			</form>
			<label id="shortcode-container">
				<h4>Use this shortcode in any post or page:
					<input id="shortcode-result" type="text" size="60" value='[linkbar]' readonly /></h4>
			</label>
			
		</div>
	</div>	

<?php }

// Add a settings page to admin section
function LB_admin_add() {
	 add_menu_page( 'Link Bar Settings', 'Link Bar', 1, 'link-bar-settings', 'LB_admin_create', 'dashicons-share-alt2');
}

add_action('admin_menu', 'LB_admin_add');

//Enable Wordpress color picker
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'admin-script', plugins_url('lb-admin-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );


