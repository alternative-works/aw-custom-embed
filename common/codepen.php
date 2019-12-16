<?php


function wp_embed_handler_codepen( $matches, $attr, $url, $rawattr ) {
    $width = 600;
    $height = 265;
	

	$url="https://codepen.io/{$matches[1]}/embed/{$matches[2]}?height=265&theme-id=default&default-tab=html,result";
	
	if(!is_amp()){
		$embed= <<<EOL
<iframe src="{$url}" style="width:100%;height:265px;" frameborder="no" allowtransparency="true" allowfullscreen="true"></iframe>
EOL;
	}else{
    $embed = <<<EOL
<amp-iframe width="300" height="300" style="max-height:265px;" 
	sandbox="allow-scripts allow-same-origin"
	layout="responsive"
	frameborder="1"
	src="{$url}">
</amp-iframe>
EOL;
		
	}
	
	return apply_filters( 'codepen', $embed, $matches, $attr, $url, $rawattr );
}
wp_embed_register_handler( 'codepen', '/https?:\/\/codepen\.io.*?\/([\S].*?)\/pen\/([\S].*)(|\/)/', 'wp_embed_handler_codepen' );

