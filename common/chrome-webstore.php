<?php


function wp_embed_handler_chrome_webstore( $matches, $attr, $url, $rawattr ) {

    //ソースの取得
    $source = @file_get_contents($url);
    $dom = new DOMDocument();
    //空pタグWarning非表示
error_reporting(0);
    $dom->loadHTML( mb_convert_encoding($source, 'HTML-ENTITIES', 'UTF-8'));
error_reporting(-1);
    $title=$dom->getElementsByTagName('h1')->item(0)->nodeValue;
    $logo=$dom->getElementsByTagName('img')->item(0)->getAttribute('src');
    $logo=preg_replace('/w[0-9]{2,3}-h[0-9]{2,3}/','w90-h90',$logo);

    $thumb=$dom->getElementsByTagName('img')->item(1)->getAttribute('src');

    $html = <<<EOL
<div class="blogcard-type bct-dl">  
  <a href="{$url}" class="blogcard-wrap external-blogcard-wrap a-wrap cf chromestore" target="_top">
    <div class="blogcard external-blogcard eb-left cf" style="display: flex;justify-content: center;align-items: center;">
      <div class="blogcard-label external-blogcard-label">
        <span class="fa"></span>
      </div>
      <figure class="blogcard-thumbnail external-blogcard-thumbnail" style="width:40px">
        <img src="{$logo}" alt="" class="blogcard-thumb-image external-blogcard-thumb-image">
      </figure>
      <div class="blogcard-content external-blogcard-content" style="margin-left:0px;min-height:inherit">
        <div class="blogcard-title external-blogcard-title">{$title}</div>
        <div class="blogcard-snippet external-blogcard-snippet"></div>
      </div>
    </div>
  </a>
</div>
EOL;

    return $html;
}
wp_embed_register_handler( 'chrome_web_store', '/https:\/\/chrome.google.com\/webstore\/detail\/[\s\S].*\/([a-z].*?)\?hl=ja/', 'wp_embed_handler_chrome_webstore' );

