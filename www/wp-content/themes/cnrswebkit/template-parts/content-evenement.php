<?php
/**
 * The template part for displaying single post Événement
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 */
?>
<?php
$current_item = new CnrswebkitRichData(get_the_ID());
$ics_form = '<form method="post" action="' . get_stylesheet_directory_uri() . '/tools/download-ics.php" class="ics-form">
  <input type="hidden" name="date_start" value="' . mysql2date('D, d M Y H:i:s +' . str_pad(get_option('gmt_offset'), 2, '0', STR_PAD_LEFT) . '00', $current_item->value('date_de_debut'), false) . '">
  <input type="hidden" name="date_end" value="' . mysql2date('D, d M Y H:i:s +' . str_pad(get_option('gmt_offset'), 2, '0', STR_PAD_LEFT) . '00', $current_item->value('date_de_fin'), false) . '">
  <input type="hidden" name="location" value="' . addslashes($current_item->value('adresse_de_levenement')) . '">
  <input type="hidden" name="description" value="' . addslashes($current_item->value('chapo')) . '">
  <input type="hidden" name="summary" value="' . addslashes(get_the_title()) . '">
  <input type="hidden" name="url" value="' . get_the_permalink() . '">
  <input type="hidden" name="filename" value="' . get_post_field('post_name', get_post()) . '">
  <!--<input type="submit" value="Ajouter au calendrier" class="ics-button" id="ics_button">-->
</form>';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="eventDateHeader"><?php echo get_event_dates($current_item->value('date_de_debut'), $current_item->value('date_de_fin'), 'dateheader'); ?></div>
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <?php echo do_shortcode('[TheChamp-Sharing]'); ?>
    </header><!-- .entry-header -->
    <?php //cnrswebkit_post_thumbnail(); ?>
    <div class="entry-content">
        <div class="leftCol">
            <div class="article-chapo"><?php echo $current_item->value('chapo'); ?></div>
            <?php
            the_content();
            ?>
        </div>
        <div class="rightCol">
            <div class="eventDateRight"><?php echo get_event_dates($current_item->value('date_de_debut'), $current_item->value('date_de_fin'), 'dateeventsingle'); ?></div>
            <div class="addCalendar"><?php echo $ics_form; ?><a href="#" id="ics-vbutton"><?php _e('Ajouter au calendrier', 'cnrswebkit') ?></a></div>
            <div class="eventLocation">
                <?php
                if (filter_var($current_item->value('lien_vers_la_carte'), FILTER_VALIDATE_URL)) {
                    ?>
                    <a href="<?php echo $current_item->value('lien_vers_la_carte'); ?>" target="_blank"><?php echo text_to_html($current_item->value('adresse_de_levenement')); ?></a>
                    <?php
                } else {
                    echo text_to_html($current_item->value('adresse_de_levenement'));
                }
                ?>
            </div>
            <?php cnrswebkit_post_thumbnail(); ?>
        </div>
        <?php /*
        if ($current_item->value('partenaires')) {
            $custom_params = new CnrswebkitStdListParams();
            $custom_params->where = $current_item->get_where_metadata($current_item->value('partenaires'));
            $partenaire_data = new CnrswebkitPageItemsList('partenaire', $custom_params);
            ?>
            <div class="tutellesContainer">
                <div class="partTitle"><?php _e("Partenaires de l'évènement", 'cnrswebkit') ?></div>
                <div class="partContainer">
                    <?php echo $partenaire_data->get_html_item_list('bottompartenaire'); ?>
                </div>
            </div>
            <?php
        } */
        ?>
        <?php display_bottom_evenements(); ?>
        <?php display_bottom_partenaires(); ?>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <?php cnrswebkit_entry_meta(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
