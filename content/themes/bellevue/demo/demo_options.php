<?php
function print_selected($demo_name=null){

	if(isset($_SERVER['REQUEST_URI'])){
		$current_uri = basename($_SERVER['REQUEST_URI']);

		if (strpos($current_uri,$demo_name) !== false) {
			echo 'selected';
		}
	}
}

?>

<div id="style-selection">
	<div class="main-title">Customize</div>
	<div class="section-title">More Demos</div>
	<div class="section-options">
		<select name="demo-select" id="dynamic_select">
			<option <?php print_selected('chalet'); ?> value="http://demo.themovation.com/bellevue/chalet/">Chalet</option>
			<option <?php print_selected('guesthouse'); ?> value="http://demo.themovation.com/bellevue/guesthouse/">Urban Guest House</option>
			<option <?php print_selected('beachhouse'); ?> value="http://demo.themovation.com/bellevue/beachhouse/">Beach House</option>
			<option <?php print_selected('cabin'); ?> value="http://demo.themovation.com/bellevue/cabin/">Lake Cabin</option>
			<option <?php print_selected('countryside'); ?> value="http://demo.themovation.com/bellevue/countryside/">Countryside</option>
			<!--option <?php print_selected('bellevue'); ?> value="http://demo.themovation.com/bellevue/">Multi-Page</option-->
		</select>
	</div>
	<div class="section-title">Layout Options</div>
	<div class="section-options">
		<select name="layout-style">
			<option value="wide">Wide</option>
			<option value="boxed">Boxed</option>
		</select>
	</div>
	<div class="boxed-dep">
		<div class="section-title">Colors</div>
		<div class="section-options">
			<ul class="colors">
				<li data-color-combo="01"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/swatch_01.png" alt="swatch_01"/></li>
				<li data-color-combo="02"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/swatch_02.png" alt="swatch_02"/></li>
                <li data-color-combo="03"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/swatch_03.png" alt="swatch_03"/></li>
                <li data-color-combo="04"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/swatch_04.png" alt="swatch_04"/></li>
                <li data-color-combo="05"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/swatch_05.png" alt="swatch_05"/></li>
			</ul>
			<div class="clearfix"></div>
		</div>
        <div class="section-title">Backgrounds</div>
		<div class="section-options">
			<ul class="patterns">
				<li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/01.jpg"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/01.jpg" alt="image 1"/></li>
				<li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/02.jpg"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/02.jpg" alt="image 2"/></li>
				<li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/03.jpg"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/03.jpg" alt="image 3"/></li>
				<li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/04.jpg"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/04.jpg" alt="image 4"/></li>
				<li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/05.jpg"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/05.jpg" alt="image 5"/></li>
				<li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/use_your_illusion.png"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/use_your_illusion.png" alt="use_your_illusion"/></li>
                <li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/dark_wood.png"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/dark_wood.png" alt="dark_wood"/></li>
                <li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/denim.png"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/denim.png" alt="denim"/></li>
                <li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/low_contrast_linen.png"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/low_contrast_linen.png" alt="low_contrast_linen"/></li>
				<li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/shattered-island.png"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/shattered-island.png" alt="shattered"/></li>
				<li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/brickwall.png"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/brickwall.png" alt="brickwall"/></li>
                <li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/bedge_grunge.png"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/bedge_grunge.png" alt="bedge_grunge"/></li>
                <li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/escheresque.png"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/escheresque.png" alt="escheresque"/></li>
                <li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/gplaypattern.png"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/gplaypattern.png" alt="gplaypattern"/></li>
                <li data-full="<?php echo get_template_directory_uri(); ?>/demo/images/wavecut.png"><img src="<?php echo get_template_directory_uri(); ?>/demo/images/thumbs/wavecut.png" alt="wavecut"/></li>
			</ul>
			<div class="clearfix"></div>
		</div>

	</div>
	<a href="#" id="toggle-section"><i class="glyphicons settings"></i></a>
</div>

<style>

	#style-selection {
		background-color: #fff;
		position: fixed;
		opacity: 0;
		z-index: 1000;
		right: -190px;
		top: 185px;
		width: 190px;
		box-shadow: 0px 0px 8px rgba(0,0,0,0.14);
	}
	
	#style-selection .clear {
		padding: 0px;
	}

	#style-selection ul {
		list-style-type: none;
		padding:0; margin:0;
	}
	
	#style-selection ul li {
		float: left;
		border: 1px solid #fff;
		transition: border-color 0.16s linear;
		-webkit-transition: border-color 0.16s linear;
		margin: 0px 5px 5px 0px;
	}
	
	#style-selection ul li img {
		display: block;
		cursor: pointer;
		width: 25px;
	}
	
	#style-selection .main-title {
		padding: 15px;
		background-color: #242b2e;
		color:#e6e6e6;
	}
	
	#style-selection .section-title {
		padding: 15px 15px 0px 15px;
	}

	#style-selection .section-options {
		padding: 15px;
		border-bottom: 1px solid #e8e8e8;
	}
	
	a#toggle-section {
		position: absolute;
		left: -44px;
		top: 50px;
		border: 1px solid #e8e8e8;
		background-color: rgba(255,255,255,0.9);
	}
	
	a#toggle-section i {
		top: 0px;
		position: relative;
		font-size: 21px!important;
		line-height: 43px!important;
		height: 42px!important;
		width: 42px;
		color: #666!important;
		background-color: transparent!important;
		border-radius: 0px!important;
		margin:0;
		padding:0;
		text-align:center;
	}
	
	#style-selection li.active-bg {
		border: 1px solid #27CCC0;
	}
	@media only screen and (min-width : 1px) and (max-width : 1000px) {
		#style-selection { display: none!important; }
	}
	
</style>

<script>
	jQuery(document).ready(function($){
		$('#style-selection').animate({'opacity':1},700);


	})


	
</script>
