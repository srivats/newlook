<?php
	$client_name = get_post_meta(get_the_ID(), 'Client Name', true);
	$website_link = get_post_meta(get_the_ID(),'Website',true);
?>
<div class="item">
	<p><?php echo get_the_content() ?></p>
	<div class="client-name"><?php echo $client_name ?></div>
	<div class="website-link">
		<a rel="nofollow" href="http://<?php $website_link?>"><?php echo $website_link?></a>
	</div>
</div>
