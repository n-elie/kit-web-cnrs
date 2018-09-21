<?php
$custom_params = new CnrswebkitStdListParams();
$custom_params->where = [
    'key' => 'filtre_partenaires.term_id',
    'value' => 11,
    'compare' => '='
];
/*
$partenaire_data = new CnrswebkitPageItemsList('partenaire', $custom_params);
if ($partenaire_data->has_items()) {
    ?>
    <div class="tutellesContainer">
        <div class="partTitle"><?php _e('Partenaires', 'cnrswebkit') ?></div>
        <div class="partKnowMore"><a href="/les-tutelles/"><?php _e('En savoir plus sur les tutelles', 'cnrswebkit') ?></a></div>
        <div class="partContainer">
            <?php
            echo $partenaire_data->get_html_item_list('bottompartenaire');
            ?>
        </div>
    </div>
    <?php
} */
