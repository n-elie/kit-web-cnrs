<?php
$custom_params = new CnrswebkitStdListParams();
$custom_params->where = [
    'key' => 'ID',
    'value' => get_the_ID(),
    'compare' => '!='
];
$custom_params->orederby = 'ID DESC';
$custom_params->limit = 2;
$emploi_data = new CnrswebkitPageItemsList('emploi', $custom_params);
if ($emploi_data->has_items()) {
    ?>
    <div class="nextEvents">
        <header><h1><?php _e("Autres offres d'emploi", 'cnrswebkit') ?></h1><a href="/les-emplois/"><?php _e('Retour à la liste', 'cnrswebkit') ?></a></header>
        <?php
        echo $emploi_data->get_html_item_list('bottomemploi');
        ?>  
    </div>
    <?php
}
