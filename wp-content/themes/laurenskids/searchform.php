<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<i id="js-search-btn" class="fa fa-search"></i>
	<span id="js-search-contain" class="search-elements display-none">
		<input type="search" class="search-field" placeholder="Search for..." value="<?php echo get_search_query() ?>" name="s" title="Search" />
		<input type="submit" class="search-submit" value="Search" />
	</span>
</form>