<?php
$custom_params = new CnrswebkitStdListParams();
$custom_params->where = [
    relation => 'AND',
    [
        'key' => 'date_de_debut',
        'value' => strftime('%Y-%m-%d %H:%M:%S'),
        'compare' => '>='
    ],
    [
        'key' => 'ID',
        'value' => get_the_ID(),
        'compare' => '!='
    ]
];
$custom_params->limit = 2;
$evenement_data = new CnrswebkitPageItemsList('evenement', $custom_params);
if ($evenement_data->has_items()) {
    ?>
    <div class="nextEvents">
        <header><h1><?php _e('Prochains évènements', 'cnrswebkit') ?></h1><a href="/lagenda/"><?php _e("Retour à l'agenda", 'cnrswebkit') ?></a></header>
        <?php
        echo $evenement_data->get_html_item_list('bottomevenement');
        ?>  
    </div>
    <?php
}
