<?php
/**
 * Template Name: Contact Page
 *
 * @package laurenskids
 */

get_header(); ?>
<style>
.background-image {
	background-image: url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full" )[0] ?>);
}
	
@media screen and (max-width: 612px) {
	.background-image {
		background-image: url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "large" )[0] ?>);
	}
}
</style>

<div class="background-image banner">
</div><!-- .background-image -->
	
	<div class="container interior">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					    <header class="entry-header">
					    	<h2 class="butterfly"><?php the_title() ?></h2>
					    </header><!-- .entry-header -->
					
					    <div class="entry-content">
					    	<?php the_content(); ?>
							<?php 
								if (isset($_GET['action']) ) {
									$action = $_GET['action'];
									
									switch ($action) {
										case "materials_request":
											$materials = true;
											break;
										case "submit_story":
											$story = true;
											break;
										case "volunteer_inquiry":
											$vol = true;
											break;
									}
								}
							?>
							<!-- Contact Us Form -->
							<div class="form-wrapper clear">
							<div class="contact-us-form forms">
								<form action="http://laurens-kids.force.com/website/contact_us" method="post" data-parsley-validate>
									<input type="hidden" name="thankYouURL" value="<?php home_url()?>/thank-you"/>
								
								    <input type="hidden" name="groupMember" value="Lead Manager"/>
								    <input type="hidden" name="NotCreateTask" value="false"/>
								    
									<h3 class="centered-text">Contact Us</h3>
									<div class="field">
										<label for="firstname" class="required">First Name:</label>
										<input id="firstname" type="text" name="firstname" required="required" maxlength="40" placeholder="first name" data-parsley-error-message="Please enter your first name"/>
									</div>
									<div class="field">
										<label for="lastname" class="required">Last Name:</label>
										<input id="lastname" type="text" name="lastname" required="required" maxlength="80" placeholder="last name" data-parsley-error-message="Please enter your last name"/>
									</div>
									<div class="field">
										<label for="email_address" class="required">Email Address:</label>
										<input id="email_address" type="email" name="email_address" required="required" placeholder="username@host.com" data-parsley-error-message="Please enter a valid email"/>
									</div>
									<div class="field">
										<label for="phone">Phone:</label>
										<input id="phone" name="phone" type="tel" placeholder="123-456-7890" maxlength="12" data-parsley-error-message="Please enter a valid phone number with an area code" data-parsley-pattern="^\d{3}-\d{3}-\d{4}$|^\d{3} \d{3} \d{4}$"/>
									</div>
									<div class="field">
										<label for="topic" class="required">Nature of Your Inquiry:</label>
										<select id="topic" name="topic" required="required">
											<option value="">Select a topic</option>
											<option value="General Information">General Information</option>
											<option value="Legislative Story Submission">Legislative Story Submission</option>
											<option value="Materials Request" <?php if($materials) echo "selected";?>>Materials Request</option>
											<option value="Media Inquiry">Media Inquiry</option>
											<option value="Safer, Smarter Kids Curriculum Inquiry">Safer, Smarter Kids Curriculum Inquiry</option>
											<option value="Speaking Request">Speaking Request</option>
											<option value="Survivor Story Submissions" <?php if($story) echo "selected";?>>Survivor Story Submissions</option>
											<option value="Volunteer Inquiry" <?php if($vol) echo "selected";?>>Volunteer Inquiry</option>
											<option value="Walk in My Shoes Information Request">Walk in My Shoes Information Request</option>
										</select>
									</div>
								
								<section id="js-mailing-section" <?php if($materials) echo 'class="loose"';?>>
									<h6>Please provide your mailing address if you are requesting awareness materials.</h6>
									<div class="field">
										<label for="mailing_street" class="required">Mailing Street:</label>
										<input <?php if($materials) echo "required"; else echo 'tabindex="-1"';?> class="js-mail-field" id="mailing_street" type="text" name="mailing_street" placeholder="Street Address" maxlength="80" data-parsley-error-message="Please enter your address"/>
									</div>
									<div class="field">
										<label for="mailing_city" class="required">Mailing City:</label>
										<input <?php if($materials) echo "required"; else echo 'tabindex="-1"';?> class="js-mail-field" id="mailing_city" type="text" name="mailing_city" placeholder="City" maxlength="80" data-parsley-error-message="Please enter your city"/>
									</div>
									<div class="field">
										<label for="mailing_state" class="required">Mailing State:</label>
										<select <?php if($materials) echo "required"; else echo 'tabindex="-1"';?> class="js-mail-field" id="mailing_state" name="mailing_state" data-parsley-error-message="Please enter your state">
											<option value="">None</option>
											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="DC">District of Columbia</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
										</select>
									</div>
								    <div class="field">
										<label for="mailing_country" class="required">Mailing Country:</label>
										<select <?php if($materials) echo "required"; else echo 'tabindex="-1"';?> class="js-mail-field" id="country" name="mailing_country" data-parsley-error-message="Please enter your country">
											<option value="">None</option>
											<option value="US">United States</option>
											<option value="AF">Afghanistan</option>
											<option value="AX">Åland Islands</option>
											<option value="AL">Albania</option>
											<option value="DZ">Algeria</option>
											<option value="AS">American Samoa</option>
											<option value="AD">Andorra</option>
											<option value="AO">Angola</option>
											<option value="AI">Anguilla</option>
											<option value="AQ">Antarctica</option>
											<option value="AG">Antigua and Barbuda</option>
											<option value="AR">Argentina</option>
											<option value="AM">Armenia</option>
											<option value="AW">Aruba</option>
											<option value="AU">Australia</option>
											<option value="AT">Austria</option>
											<option value="AZ">Azerbaijan</option>
											<option value="BS">Bahamas</option>
											<option value="BH">Bahrain</option>
											<option value="BD">Bangladesh</option>
											<option value="BB">Barbados</option>
											<option value="BY">Belarus</option>
											<option value="BE">Belgium</option>
											<option value="BZ">Belize</option>
											<option value="BJ">Benin</option>
											<option value="BM">Bermuda</option>
											<option value="BT">Bhutan</option>
											<option value="BO">Bolivia, Plurinational State of</option>
											<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
											<option value="BA">Bosnia and Herzegovina</option>
											<option value="BW">Botswana</option>
											<option value="BV">Bouvet Island</option>
											<option value="BR">Brazil</option>
											<option value="IO">British Indian Ocean Territory</option>
											<option value="BN">Brunei Darussalam</option>
											<option value="BG">Bulgaria</option>
											<option value="BF">Burkina Faso</option>
											<option value="BI">Burundi</option>
											<option value="KH">Cambodia</option>
											<option value="CM">Cameroon</option>
											<option value="CA">Canada</option>
											<option value="CV">Cape Verde</option>
											<option value="KY">Cayman Islands</option>
											<option value="CF">Central African Republic</option>
											<option value="TD">Chad</option>
											<option value="CL">Chile</option>
											<option value="CN">China</option>
											<option value="CX">Christmas Island</option>
											<option value="CC">Cocos (Keeling) Islands</option>
											<option value="CO">Colombia</option>
											<option value="KM">Comoros</option>
											<option value="CG">Congo</option>
											<option value="CD">Congo, the Democratic Republic of the</option>
											<option value="CK">Cook Islands</option>
											<option value="CR">Costa Rica</option>
											<option value="CI">Côte d'Ivoire</option>
											<option value="HR">Croatia</option>
											<option value="CU">Cuba</option>
											<option value="CW">Curaçao</option>
											<option value="CY">Cyprus</option>
											<option value="CZ">Czech Republic</option>
											<option value="DK">Denmark</option>
											<option value="DJ">Djibouti</option>
											<option value="DM">Dominica</option>
											<option value="DO">Dominican Republic</option>
											<option value="EC">Ecuador</option>
											<option value="EG">Egypt</option>
											<option value="SV">El Salvador</option>
											<option value="GQ">Equatorial Guinea</option>
											<option value="ER">Eritrea</option>
											<option value="EE">Estonia</option>
											<option value="ET">Ethiopia</option>
											<option value="FK">Falkland Islands (Malvinas)</option>
											<option value="FO">Faroe Islands</option>
											<option value="FJ">Fiji</option>
											<option value="FI">Finland</option>
											<option value="FR">France</option>
											<option value="GF">French Guiana</option>
											<option value="PF">French Polynesia</option>
											<option value="TF">French Southern Territories</option>
											<option value="GA">Gabon</option>
											<option value="GM">Gambia</option>
											<option value="GE">Georgia</option>
											<option value="DE">Germany</option>
											<option value="GH">Ghana</option>
											<option value="GI">Gibraltar</option>
											<option value="GR">Greece</option>
											<option value="GL">Greenland</option>
											<option value="GD">Grenada</option>
											<option value="GP">Guadeloupe</option>
											<option value="GU">Guam</option>
											<option value="GT">Guatemala</option>
											<option value="GG">Guernsey</option>
											<option value="GN">Guinea</option>
											<option value="GW">Guinea-Bissau</option>
											<option value="GY">Guyana</option>
											<option value="HT">Haiti</option>
											<option value="HM">Heard Island and McDonald Islands</option>
											<option value="VA">Holy See (Vatican City State)</option>
											<option value="HN">Honduras</option>
											<option value="HK">Hong Kong</option>
											<option value="HU">Hungary</option>
											<option value="IS">Iceland</option>
											<option value="IN">India</option>
											<option value="ID">Indonesia</option>
											<option value="IR">Iran, Islamic Republic of</option>
											<option value="IQ">Iraq</option>
											<option value="IE">Ireland</option>
											<option value="IM">Isle of Man</option>
											<option value="IL">Israel</option>
											<option value="IT">Italy</option>
											<option value="JM">Jamaica</option>
											<option value="JP">Japan</option>
											<option value="JE">Jersey</option>
											<option value="JO">Jordan</option>
											<option value="KZ">Kazakhstan</option>
											<option value="KE">Kenya</option>
											<option value="KI">Kiribati</option>
											<option value="KP">Korea, Democratic People's Republic of</option>
											<option value="KR">Korea, Republic of</option>
											<option value="KW">Kuwait</option>
											<option value="KG">Kyrgyzstan</option>
											<option value="LA">Lao People's Democratic Republic</option>
											<option value="LV">Latvia</option>
											<option value="LB">Lebanon</option>
											<option value="LS">Lesotho</option>
											<option value="LR">Liberia</option>
											<option value="LY">Libya</option>
											<option value="LI">Liechtenstein</option>
											<option value="LT">Lithuania</option>
											<option value="LU">Luxembourg</option>
											<option value="MO">Macao</option>
											<option value="MK">Macedonia, the former Yugoslav Republic of</option>
											<option value="MG">Madagascar</option>
											<option value="MW">Malawi</option>
											<option value="MY">Malaysia</option>
											<option value="MV">Maldives</option>
											<option value="ML">Mali</option>
											<option value="MT">Malta</option>
											<option value="MH">Marshall Islands</option>
											<option value="MQ">Martinique</option>
											<option value="MR">Mauritania</option>
											<option value="MU">Mauritius</option>
											<option value="YT">Mayotte</option>
											<option value="MX">Mexico</option>
											<option value="FM">Micronesia, Federated States of</option>
											<option value="MD">Moldova, Republic of</option>
											<option value="MC">Monaco</option>
											<option value="MN">Mongolia</option>
											<option value="ME">Montenegro</option>
											<option value="MS">Montserrat</option>
											<option value="MA">Morocco</option>
											<option value="MZ">Mozambique</option>
											<option value="MM">Myanmar</option>
											<option value="NA">Namibia</option>
											<option value="NR">Nauru</option>
											<option value="NP">Nepal</option>
											<option value="NL">Netherlands</option>
											<option value="NC">New Caledonia</option>
											<option value="NZ">New Zealand</option>
											<option value="NI">Nicaragua</option>
											<option value="NE">Niger</option>
											<option value="NG">Nigeria</option>
											<option value="NU">Niue</option>
											<option value="NF">Norfolk Island</option>
											<option value="MP">Northern Mariana Islands</option>
											<option value="NO">Norway</option>
											<option value="OM">Oman</option>
											<option value="PK">Pakistan</option>
											<option value="PW">Palau</option>
											<option value="PS">Palestinian Territory, Occupied</option>
											<option value="PA">Panama</option>
											<option value="PG">Papua New Guinea</option>
											<option value="PY">Paraguay</option>
											<option value="PE">Peru</option>
											<option value="PH">Philippines</option>
											<option value="PN">Pitcairn</option>
											<option value="PL">Poland</option>
											<option value="PT">Portugal</option>
											<option value="PR">Puerto Rico</option>
											<option value="QA">Qatar</option>
											<option value="RE">Réunion</option>
											<option value="RO">Romania</option>
											<option value="RU">Russian Federation</option>
											<option value="RW">Rwanda</option>
											<option value="BL">Saint Barthélemy</option>
											<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
											<option value="KN">Saint Kitts and Nevis</option>
											<option value="LC">Saint Lucia</option>
											<option value="MF">Saint Martin (French part)</option>
											<option value="PM">Saint Pierre and Miquelon</option>
											<option value="VC">Saint Vincent and the Grenadines</option>
											<option value="WS">Samoa</option>
											<option value="SM">San Marino</option>
											<option value="ST">Sao Tome and Principe</option>
											<option value="SA">Saudi Arabia</option>
											<option value="SN">Senegal</option>
											<option value="RS">Serbia</option>
											<option value="SC">Seychelles</option>
											<option value="SL">Sierra Leone</option>
											<option value="SG">Singapore</option>
											<option value="SX">Sint Maarten (Dutch part)</option>
											<option value="SK">Slovakia</option>
											<option value="SI">Slovenia</option>
											<option value="SB">Solomon Islands</option>
											<option value="SO">Somalia</option>
											<option value="ZA">South Africa</option>
											<option value="GS">South Georgia and the South Sandwich Islands</option>
											<option value="SS">South Sudan</option>
											<option value="ES">Spain</option>
											<option value="LK">Sri Lanka</option>
											<option value="SD">Sudan</option>
											<option value="SR">Suriname</option>
											<option value="SJ">Svalbard and Jan Mayen</option>
											<option value="SZ">Swaziland</option>
											<option value="SE">Sweden</option>
											<option value="CH">Switzerland</option>
											<option value="SY">Syrian Arab Republic</option>
											<option value="TW">Taiwan, Province of China</option>
											<option value="TJ">Tajikistan</option>
											<option value="TZ">Tanzania, United Republic of</option>
											<option value="TH">Thailand</option>
											<option value="TL">Timor-Leste</option>
											<option value="TG">Togo</option>
											<option value="TK">Tokelau</option>
											<option value="TO">Tonga</option>
											<option value="TT">Trinidad and Tobago</option>
											<option value="TN">Tunisia</option>
											<option value="TR">Turkey</option>
											<option value="TM">Turkmenistan</option>
											<option value="TC">Turks and Caicos Islands</option>
											<option value="TV">Tuvalu</option>
											<option value="UG">Uganda</option>
											<option value="UA">Ukraine</option>
											<option value="AE">United Arab Emirates</option>
											<option value="GB">United Kingdom</option>
											<option value="US">United States</option>
											<option value="UM">United States Minor Outlying Islands</option>
											<option value="UY">Uruguay</option>
											<option value="UZ">Uzbekistan</option>
											<option value="VU">Vanuatu</option>
											<option value="VE">Venezuela, Bolivarian Republic of</option>
											<option value="VN">Viet Nam</option>
											<option value="VG">Virgin Islands, British</option>
											<option value="VI">Virgin Islands, U.S.</option>
											<option value="WF">Wallis and Futuna</option>
											<option value="EH">Western Sahara</option>
											<option value="YE">Yemen</option>
											<option value="ZM">Zambia</option>
											<option value="ZW">Zimbabwe</option>
										</select>
									</div>
									<div class="field">
										<label for="mailing_Postal_code" class="required" >Mailing Postal Code:</label>
										<input <?php if($materials) echo "required"; else echo 'tabindex="-1"';?> class="js-mail-field" id="mailing_zip_code" type="text" name="mailing_zip_code" placeholder="Zip Code" maxlength="10" data-parsley-error-message="Please enter your 5-digit zip" data-parsley-length="[5,5]"/>
									</div>
								</section>
									
									<div class="field">
										<label for="message" class="required">Message:</label>
										<textarea id="message" name="message" required="required" placeholder="" rows="5" maxlength="32000" data-parsley-error-message="Please leave a short message explaining your reason for contacting us"></textarea>
									</div>
									
									<div class="submit-btn">
										<button type="submit interior">Submit</button>
									</div>
								</form>
							</div>

							<!-- Mailchimp Newsletter Signup -->
							<div class="mailchimp-signup-form forms">
								<div id="mc_embed_signup">
									<h3 class="centered-text">Sign Up for our Newsletter</h3>
									<form action="//laurenskids.us4.list-manage.com/subscribe/post?u=8c9569b1c4af18a919a6267a5&amp;id=e46c1086d3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" data-parsley-validate>
									    <div id="mc_embed_signup_scroll">
											<div class="mc-field-group">
												<label for="mce-EMAIL" class="required">Email Address:</label>
												<input type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder="email@host.com" data-parsley-error-message="Please enter a valid email address" required>
											</div>
											<div class="mc-field-group">
												<label for="mce-FNAME" class="required">First Name:</label>
												<input type="text" value="" name="FNAME" id="mce-FNAME" placeholder="first name" data-parsley-error-message="Please enter your first name" required>
											</div>
											<div class="mc-field-group">
												<label for="mce-LNAME" class="required">Last Name:</label>
												<input type="text" value="" name="LNAME" id="mce-LNAME" placeholder="last name" data-parsley-error-message="Please enter your last name" required>
											</div>
											<div class="mc-field-group">
												<label for="mce-ZIP" class="required">Zip Code:</label>
												<input type="text" value="" name="ZIP" id="mce-ZIP" placeholder="33180" data-parsley-type="integer"  data-parsley-error-message="Please enter your 5-digit zip" data-parsley-length="[5,5]" required>
											</div>
											<div class="mc-field-group input-group">
											    <strong>Email Format Preference:</strong>
											    <ul>
											    	<li><input type="radio" value="html" name="EMAILTYPE" id="mce-EMAILTYPE-0" checked><label for="mce-EMAILTYPE-0">Rich Formatting</label></li>
													<li><input type="radio" value="text" name="EMAILTYPE" id="mce-EMAILTYPE-1"><label for="mce-EMAILTYPE-1">Plain Text</label></li>
												</ul>
											</div>
											<div id="mce-responses">
												<div class="response" id="mce-error-response" style="display:none"></div>
												<div class="response" id="mce-success-response" style="display:none"></div>
											</div>
											<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
											<div style="position: absolute; left: -5000px;">
												<input type="text" name="b_8c9569b1c4af18a919a6267a5_e46c1086d3" tabindex="-1" value="">
											</div>
											<div class="submit-btn">
												<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">
											</div>
										</div>
									</form>
									
									<div class="required-info">
										<p>Fields marked with <img src="<?php echo get_stylesheet_directory_uri() ?>/img/butterfly-bullet_hover.png"/> are required.</p>
									</div>
									
								</div><!--End Mailchimp-->
								</div>
					    
					    </div><!-- .entry-content -->
					
					</article><!-- #post-## -->
	
				<?php endwhile; // end of the loop. ?>
	
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .container -->
	
<?php get_footer(); ?>