<?php

require( '../../../wp-load.php' );

if ( isset( $_GET['bulk-add-tags-submitted'] ) ) {
  
  $wpr_tags = $_GET['tags'];
  $wpr_tags_count = (!empty($wpr_tags)) ? count(explode(',',$wpr_tags)) : 0;
  $wpr_tags_exploded = explode(',',$wpr_tags);
  $added = 0;
  
  foreach ( $wpr_tags_exploded as $tag ) {
    
    if(!term_exists( $tag, 'post_tag' ) ) {
      wp_insert_term( $tag , 'post_tag' );
      $added++;
    }
  }
  
}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>WordPress Reader - Bulk Add Tags</title>
    <style type="text/css">
      body { background-color: #f9f9f9; font: 12px "Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif; }
      p, textarea { margin: 6px 0; display: block; }
      .howto { color: #666; font-style: italic; }
      .button-primary {
        background: url("../../../images/button-grad.png") repeat-x scroll left top #21759B;
        border: 1px solid #298CBA;
        color: #FFF;
        cursor: pointer;
        font-size: 11px !important;
        font-weight: 700;
        line-height: 13px;
        padding: 3px 8px;
        text-decoration: none;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
        border-radius: 11px;
        -webkit-border-radius: 11px;
        -moz-border-radius: 11px;
        -moz-box-sizing: content-box;
      }
    </style>
  </head>
  <body>
    <section>
      <form action="" id="bulk-add-tags-form">
        <p class="howto">Add new tags below seprated by commas</p>
        <textarea rows="6" cols="50" name="tags"></textarea>
        <?php
          if ( isset($wpr_tags_count) ) {
            if ( $wpr_tags_count != 0 ){
              $txt_tags_submitted = ($wpr_tags_count > 1) ? 'tags' : 'tag';
              $txt_tags_added = ($added != 1) ? 'tags' : 'tag';
              $txt_info = "";
              if($added > 0){
 	             $txt_info = "<p>Please refresh this page to see your newly added $txt_tags_added.</p>";
 	            }
              
              print "<p class='howto'>$wpr_tags_count $txt_tags_submitted submitted | $added $txt_tags_added added.</p>";
            } else {
              print "<p class='howto'>No tags have been added</p>";
            }
          }
      ?>
        <input type="submit" class="button-primary" name="bulk-add-tags-submitted" value="Submit" />
        <?php print $txt_info; ?>
      </form>
    </section>
  </body>
</html>