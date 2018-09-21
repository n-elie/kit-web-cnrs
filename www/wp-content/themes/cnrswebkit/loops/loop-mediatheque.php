<?php
/**
 * The template part for displaying loops of Mediathèque
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 * 
 * Loop Name: Boucle d'actialités
 */
?>
<article id="post-<?php echo $current_item->value('ID'); ?>" <?php post_class([$current_item->value('post_type'), 'size' . get_rnd_image_size('mediatheque', $iteration_number)], $current_item->value('ID')); ?>>
    <div class="chapoContainer">
        <a href="#<?php //echo get_permalink($current_item->value('ID'));    ?>" data-id="<?php echo $current_item->value('ID'); ?>">
            <?php //echo $current_item->value('chapo'); ?>
            <?php echo $current_item->value('post_title'); ?>
        </a>
    </div>
    <a class="imageContainer" href="#<?php //echo get_permalink($current_item->value('ID'));    ?>" data-id="<?php echo $current_item->value('ID'); ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url($current_item->value('ID')); ?>);"></a>
    <script>
        var imagepopin_<?php echo $current_item->value('ID'); ?> = {
            ID: '<?php echo $current_item->value('ID'); ?>',
            post_title: '<?php echo addslashes($current_item->value('post_title')); ?>',
            chapo: '<?php echo addslashes($current_item->value('chapo')); ?>',
            credits: '<?php echo addslashes($current_item->value('credits')); ?>',
            link: '<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($current_item->value('ID')), 'full', false)[0]; ?>',
            share: '<?php echo addslashes(do_shortcode( '[TheChamp-Sharing]' )); ?>'
        }
    </script>
    <?php
    /*
      <header class="entry-header">
      <h1 class="entry-title"><a href="<?php echo get_permalink($current_item->value('ID')); ?>"><?php echo $current_item->value('post_title'); ?></a></h1>
      </header>
      <div class="entry-content">
      <div><?php echo $current_item->value('chapo'); ?></div>
      <div><?php echo $current_item->value('credits'); ?></div>
      </div>
     */
    ?>
</article><!-- #post-## -->
