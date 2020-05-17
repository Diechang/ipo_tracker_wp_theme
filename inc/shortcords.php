<?php
add_shortcode('aff_hirose_text', function($args){
	$args = shortcode_atts(array(
		"text" => "ヒロセ通商",
	  ),$args);
	$src = '<a href="https://px.a8.net/svt/ejp?a8mat=3BDLSY+ADWFMI+1FOU+61RIA" rel="nofollow">' . $args["text"] . '</a>
<img border="0" width="1" height="1" src="https://www13.a8.net/0.gif?a8mat=3BDLSY+ADWFMI+1FOU+61RIA" alt="">';
    return $src;
});
