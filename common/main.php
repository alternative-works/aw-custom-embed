<?php
//ブログカード化しない外部リンクのURL（もしくはURLの一部）を登録する
add_filter('exclusion_external_blog_card_urls', function ($urls){
    $urls[] = 'https://codepen.io/';
    return $urls;
  });