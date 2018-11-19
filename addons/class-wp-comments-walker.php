<?php
/**
 * Custom comment walker
 *
 * @users Walker_Comment
 */
class WPSE_Walker_Comment extends Walker_Comment
{
    protected function html5_comment( $comment, $depth, $args ) {
          $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
  ?>
          <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
             <div class="card mb-2">
                  <h6 class="card-header"><?php echo get_comment_author( $comment ) ?><small><span class="float-right"><?= get_comment_date( '', $comment ) ?><span></small></h6>
                  <div class="card-body">
                      <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                      <p class="card-text"><?php comment_text(); ?></p>
                 </div>
             </div>
  <?php
      }
} // end class
