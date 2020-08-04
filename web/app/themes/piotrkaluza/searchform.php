<form class="searchform" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="field" name="s" id="s" placeholder="Szukaj na blogu" value="<?php echo get_search_query( ); ?>"/>
	<button title="Wyszukaj" class="submit"><i class="icon-search"></i></button>
</form>

