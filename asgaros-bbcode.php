<?php
/*
Plugin Name: Asgaros BBCode
Plugin URI: https://github.com/IanCassTwo/asgaros-bbcode
Description: A WordPress plugin to render bbcode in Asgaros posts
Author: Ian Cass
Version: 0.2
Author URI: https://github.com/IanCassTwo
*/


add_filter('asgarosforum_filter_post_content', 'bbcode_to_html', 10, 2);


function bbcode_to_html($bbtext){
        $bbtags = array(
          '[heading1]' => '<h1>','[/heading1]' => '</h1>',
          '[heading2]' => '<h2>','[/heading2]' => '</h2>',
          '[heading3]' => '<h3>','[/heading3]' => '</h3>',
          '[h1]' => '<h1>','[/h1]' => '</h1>',
          '[h2]' => '<h2>','[/h2]' => '</h2>',
          '[h3]' => '<h3>','[/h3]' => '</h3>',

          '[paragraph]' => '<p>','[/paragraph]' => '</p>',
          '[para]' => '<p>','[/para]' => '</p>',
          '[p]' => '<p>','[/p]' => '</p>',
          '[left]' => '<p style="text-align:left;">','[/left]' => '</p>',
          '[right]' => '<p style="text-align:right;">','[/right]' => '</p>',
          '[center]' => '<p style="text-align:center;">','[/center]' => '</p>',
          '[justify]' => '<p style="text-align:justify;">','[/justify]' => '</p>',

          '[bold]' => '<span style="font-weight:bold;">','[/bold]' => '</span>',
          '[italic]' => '<span style="font-weight:bold;">','[/italic]' => '</span>',
          '[underline]' => '<span style="text-decoration:underline;">','[/underline]' => '</span>',
          '[b]' => '<span style="font-weight:bold;">','[/b]' => '</span>',
          '[i]' => '<span style="font-weight:bold;">','[/i]' => '</span>',
          '[u]' => '<span style="text-decoration:underline;">','[/u]' => '</span>',
          '[break]' => '<br>',
          '[br]' => '<br>',
          '[newline]' => '<br>',
          '[nl]' => '<br>',

          '[unordered_list]' => '<ul>','[/unordered_list]' => '</ul>',
          '[list]' => '<ul>','[/list]' => '</ul>',
          '[ul]' => '<ul>','[/ul]' => '</ul>',

          '[ordered_list]' => '<ol>','[/ordered_list]' => '</ol>',
          '[ol]' => '<ol>','[/ol]' => '</ol>',
          '[list_item]' => '<li>','[/list_item]' => '</li>',
          '[li]' => '<li>','[/li]' => '</li>',
          '[*]' => '<li>','[/*]' => '</li>',
          '[code]' => '<code>','[/code]' => '</code>',
          '[preformatted]' => '<pre>','[/preformatted]' => '</pre>',
          '[pre]' => '<pre>','[/pre]' => '</pre>',
          '[quote]' => '<blockquote>','[/quote]' => '</blockquote>',

        );

        $bbtext = str_ireplace(array_keys($bbtags), array_values($bbtags), $bbtext);

        $bbextended = array(
          "/\[color=(.*?)\]/i" => "<font color=\"$1\">",
          "/\[\/color\]/i" => "</font>",
          "/\[url](.*?)\[\/url]/i" => "<a href=\"http://$1\" title=\"$1\">$1</a>",
          "/\[url=(.*?)\](.*?)\[\/url\]/i" => "<a href=\"$1\" title=\"$1\">$2</a>",
          "/\[email=(.*?)\](.*?)\[\/email\]/i" => "<a href=\"mailto:$1\">$2</a>",
          "/\[mail=(.*?)\](.*?)\[\/mail\]/i" => "<a href=\"mailto:$1\">$2</a>",
          "/\[mail\](.*?)\[\/mail\]/i" => "<a href=\"mailto:$1\">$1</a>",
          "/\[img\]([^[]*)\[\/img\]/i" => "<img src=\"$1\" alt=\" \" />",
          "/\[image\]([^[]*)\[\/image\]/i" => "<img src=\"$1\" alt=\" \" />",
          "/\[image_left\]([^[]*)\[\/image_left\]/i" => "<img src=\"$1\" alt=\" \" class=\"img_left\" />",
          "/\[image_right\]([^[]*)\[\/image_right\]/i" => "<img src=\"$1\" alt=\" \" class=\"img_right\" />",
        );

        foreach($bbextended as $match=>$replacement){
          $bbtext = preg_replace($match, $replacement, $bbtext);
        }
        return $bbtext;
}
