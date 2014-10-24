<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<i class="fa fa-search"></i>
	<span>
		<input type="search" class="search-field" placeholder="Search for..." value="<?php echo get_search_query() ?>" name="s" title="Search" />
		<input type="submit" class="search-submit" value="Search" />
	</span>
</form>