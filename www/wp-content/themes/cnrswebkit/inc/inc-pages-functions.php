<?php

/**
 * CNRS Web Kit functions and definitions for specific pages
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 */
ini_set("display_errors", 0);
require get_template_directory() . '/inc/cnrs-ajax.php';

add_action('init', 'cnrs_session_start', 1);
add_action('wp_enqueue_scripts', 'cnrsenqueue');

add_image_size('cnrspublicationloop-size', 200, 9999);
add_image_size('cnrsloop-size', 400, 9999);
add_image_size('cnrsmediatheque-size', 1200, 1200, true);

function admin_css() {

    $admin_handle = 'admin_css';
    $admin_stylesheet = get_template_directory_uri() . '/css/admin.css';

    wp_enqueue_style($admin_handle, $admin_stylesheet);
}

add_action('admin_print_styles', 'admin_css', 11);
if (is_admin()) {
    wp_enqueue_script('custom_admin_script', get_template_directory_uri() . '/js/admin_script.js', array('jquery'));
}

function custom_menu_page_removing() {
    remove_menu_page('menu-comments');
}

add_action('admin_menu', 'custom_menu_page_removing');

function cnrs_session_start() {
    if (!session_id()) {
        @session_start();
    }
}

function cnrsenqueue() {
    wp_enqueue_style('cnrswbkit-dyn', get_template_directory_uri() . '/css/style_dyn.css', array(), '1.0');
    wp_enqueue_style('icomoon', get_template_directory_uri() . '/css/icomoon.css', array(), '1.0');
    wp_enqueue_style('cnrswebkit-fonts', cnrswebkit_fonts_url(), array(), null);
    wp_enqueue_script('cnrswebkit-init', get_template_directory_uri() . '/js/cnrs-init.js', array('jquery'), '1.0' . '-' . time(), true);
    wp_enqueue_script('cnrswebkit-masonrypkgd', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery', 'cnrswebkit-init'), '3.3.2' . '-' . time(), true);
    wp_enqueue_script('cnrswebkit-common', get_template_directory_uri() . '/js/cnrs-common.js', array('jquery', 'cnrswebkit-init', 'cnrswebkit-masonrypkgd'), '1.0' . '-' . time(), true);
    wp_enqueue_script('cnrswebkit-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array('jquery', 'cnrswebkit-masonrypkgd'), '4.1.3' . '-' . time(), true);
}

function cnrswebkit_session_start() {
    if (!session_id()) {
        @session_start();
    }
}

class CnrswebkitListPageParams {

    public $selectors;

    function __construct($post_type) {
        $this->selectors = new stdClass();
        switch ($post_type) {
            case 'actualite':
                // Selecteur Catégorie des items
                $FilterSelectorParams = new FilterSelectorParams();
                $FilterSelectorParams->selectorPod = 'categorie_actualites';
                $FilterSelectorParams->selectorLabel = __('Catégorie', 'cnrswebkit');
                $FilterSelectorParams->selectorEmptyText = __('Toutes', 'cnrswebkit');
                $FilterSelectorParams->selectorCurrentValue = $_SESSION['categorie_actualites'];
                $this->selectors->cat_filter = get_filter_selector($FilterSelectorParams);
                if (!$this->selectors->cat_filter) {
                    unset($this->selectors->cat_filter);
                }
                // Selecteur Typologie des items
                $FilterSelectorParams = new FilterSelectorParams();
                $FilterSelectorParams->selectorPod = 'typologie_actualites';
                $FilterSelectorParams->selectorLabel = __('Typologie', 'cnrswebkit');
                $FilterSelectorParams->selectorEmptyText = __('Toutes', 'cnrswebkit');
                $FilterSelectorParams->selectorCurrentValue = $_SESSION['typologie_actualites'];
                $this->selectors->typo_filter = get_filter_selector($FilterSelectorParams);
                if (!$this->selectors->typo_filter) {
                    unset($this->selectors->typo_filter);
                }
                break;
            case 'evenement':
                // Selecteur Catégorie des items
                $FilterSelectorParams = new FilterSelectorParams();
                $FilterSelectorParams->selectorPod = 'categorie_evenements';
                $FilterSelectorParams->selectorLabel = __('Catégorie', 'cnrswebkit');
                $FilterSelectorParams->selectorEmptyText = __('Toutes', 'cnrswebkit');
                $FilterSelectorParams->selectorCurrentValue = $_SESSION['categorie_evenements'];
                $this->selectors->cat_filter = get_filter_selector($FilterSelectorParams);
                if (!$this->selectors->cat_filter) {
                    unset($this->selectors->cat_filter);
                }
                // Selecteur Typologie des items
                $FilterSelectorParams = new FilterSelectorParams();
                $FilterSelectorParams->selectorPod = 'typologie_evenements';
                $FilterSelectorParams->selectorLabel = __('Typologie', 'cnrswebkit');
                $FilterSelectorParams->selectorEmptyText = __('Toutes', 'cnrswebkit');
                $FilterSelectorParams->selectorCurrentValue = $_SESSION['typologie_evenements'];
                $this->selectors->typo_filter = get_filter_selector($FilterSelectorParams);
                if (!$this->selectors->typo_filter) {
                    unset($this->selectors->typo_filter);
                }
                break;
            case 'mediatheque':
                // Selecteur Catégorie des items
                $FilterSelectorParams = new FilterSelectorParams();
                $FilterSelectorParams->selectorPod = 'categorie_mediatheque';
                $FilterSelectorParams->selectorLabel = __('Catégorie', 'cnrswebkit');
                $FilterSelectorParams->selectorEmptyText = __('Toutes', 'cnrswebkit');
                $FilterSelectorParams->selectorCurrentValue = $_SESSION['categorie_mediatheque'];
                $this->selectors->cat_filter = get_filter_selector($FilterSelectorParams);
                if (!$this->selectors->cat_filter) {
                    unset($this->selectors->cat_filter);
                }
                // Selecteur Typologie des items
                $FilterSelectorParams = new FilterSelectorParams();
                $FilterSelectorParams->selectorPod = 'typologie_mediatheque';
                $FilterSelectorParams->selectorLabel = __('Typologie', 'cnrswebkit');
                $FilterSelectorParams->selectorEmptyText = __('Toutes', 'cnrswebkit');
                $FilterSelectorParams->selectorCurrentValue = $_SESSION['typologie_mediatheque'];
                $this->selectors->typo_filter = get_filter_selector($FilterSelectorParams);
                if (!$this->selectors->typo_filter) {
                    unset($this->selectors->typo_filter);
                }
                break;
            case 'contact':
                // Selecteur Catégorie des items
                $FilterSelectorParams = new FilterSelectorParams();
                $FilterSelectorParams->selectorPod = 'organisation_contact';
                $FilterSelectorParams->selectorLabel = __('Organisation', 'cnrswebkit');
                $FilterSelectorParams->selectorEmptyText = __('Toutes', 'cnrswebkit');
                $FilterSelectorParams->selectorCurrentValue = $_SESSION['organisation_contact'];
                $this->selectors->cat_filter = get_filter_selector($FilterSelectorParams);
                if (!$this->selectors->cat_filter) {
                    unset($this->selectors->cat_filter);
                }
                break;
            case 'emploi':
                // Selecteur Catégorie des items
                $FilterSelectorParams = new FilterSelectorParams();
                $FilterSelectorParams->selectorPod = 'categorie_emploi';
                $FilterSelectorParams->selectorLabel = __('Catégorie', 'cnrswebkit');
                $FilterSelectorParams->selectorEmptyText = __('Toutes', 'cnrswebkit');
                $FilterSelectorParams->selectorCurrentValue = $_SESSION['categorie_emploi'];
                $this->selectors->cat_filter = get_filter_selector($FilterSelectorParams);
                if (!$this->selectors->cat_filter) {
                    unset($this->selectors->cat_filter);
                }
                // Selecteur Typologie des items
                $FilterSelectorParams = new FilterSelectorParams();
                $FilterSelectorParams->selectorPod = 'typologie_emploi';
                $FilterSelectorParams->selectorLabel = __('Typologie', 'cnrswebkit');
                $FilterSelectorParams->selectorEmptyText = __('Toutes', 'cnrswebkit');
                $FilterSelectorParams->selectorCurrentValue = $_SESSION['typologie_emploi'];
                $this->selectors->typo_filter = get_filter_selector($FilterSelectorParams);
                if (!$this->selectors->typo_filter) {
                    unset($this->selectors->typo_filter);
                }
                break;
            case 'publication':
                // Selecteur Catégorie des items
                $FilterSelectorParams = new FilterSelectorParams();
                $FilterSelectorParams->selectorPod = 'categorie_publication';
                $FilterSelectorParams->selectorLabel = __('Catégorie', 'cnrswebkit');
                $FilterSelectorParams->selectorEmptyText = __('Toutes', 'cnrswebkit');
                $FilterSelectorParams->selectorCurrentValue = $_SESSION['categorie_publication'];
                $this->selectors->cat_filter = get_filter_selector($FilterSelectorParams);
                if (!$this->selectors->cat_filter) {
                    unset($this->selectors->cat_filter);
                }
                break;
            case 'partenaire':
                break;
        }
        return this;
    }

}

class CnrswebkitStdListParams {

    public $limit = false;
    public $orderby = false;
    public $where = false;

}

class CnrswebkitListParams {

    public $limit = 10;
    public $orderby = 'date DESC';
    public $where = [];

    function __construct($post_type, $custom_params = false) {
        global $cnrs_global_params;
        switch ($post_type) {
            case 'actualite':
                $this->record_GET_filters();
                $this->limit = $cnrs_global_params->field('nombre_dactualites_page_actialite');
                $this->where = array(
                    relation => 'AND',
                );
                if ($_SESSION['categorie_actualites'] != '') {
                    $this->where[] = array(
                        'key' => 'categorie_actualites.term_id',
                        'value' => array($_SESSION['categorie_actualites']),
                        'compare' => 'IN'
                    );
                }
                if ($_SESSION['categorie_actualites'] != '') {
                    $this->where[] = array(
                        'key' => 'typologie_actualites.term_id',
                        'value' => array($_SESSION['typologie_actualites']),
                        'compare' => 'IN'
                    );
                }
                break;
            case 'evenement':
                $this->record_GET_filters();
                $this->limit = $cnrs_global_params->field('nombre_devenements_page_agenda');
                $this->where = array(
                    relation => 'AND',
                );
                $this->where[] = array(
                    'key' => 'date_de_fin',
                    'value' => strftime('%Y-%m-%d %H:%M:%S'),
                    'compare' => '>='
                );
                if ($_SESSION['categorie_evenements'] != '') {
                    $this->where[] = array(
                        'key' => 'categorie_evenements.term_id',
                        'value' => array($_SESSION['categorie_evenements']),
                        'compare' => 'IN'
                    );
                }
                if ($_SESSION['typologie_evenements'] != '') {
                    $this->where[] = array(
                        'key' => 'typologie_evenements.term_id',
                        'value' => array($_SESSION['typologie_evenements']),
                        'compare' => 'IN'
                    );
                }
                $this->orderby = 'date_de_debut ASC';
                break;
            case 'mediatheque':
                $this->record_GET_filters();
                $this->limit = 9;
                $this->where = array(
                    relation => 'AND',
                );
                if ($_SESSION['categorie_mediatheque'] != '') {
                    $this->where[] = array(
                        'key' => 'categorie_mediatheque.term_id',
                        'value' => array($_SESSION['categorie_mediatheque']),
                        'compare' => 'IN'
                    );
                }
                if ($_SESSION['typologie_mediatheque'] != '') {
                    $this->where[] = array(
                        'key' => 'typologie_mediatheque.term_id',
                        'value' => array($_SESSION['typologie_mediatheque']),
                        'compare' => 'IN'
                    );
                }
                break;
            case 'contact':
                $this->record_GET_filters();
                $this->limit = $cnrs_global_params->field('nombre_decontacts_page_contact');
                $this->orderby = 'nom ASC';
                if ($_SESSION['organisation_contact'] != '') {
                    $this->where[] = array(
                        'key' => 'organisation_contact.term_id',
                        'value' => array($_SESSION['organisation_contact']),
                        'compare' => 'IN'
                    );
                }
                break;
            case 'emploi':
                $this->record_GET_filters();
                $this->orderby = 'type_de_poste.name ASC';
                $this->where = array(
                    relation => 'AND',
                );
                if ($_SESSION['typologie_emploi'] != '') {
                    $this->where[] = array(
                        'key' => 'type_de_poste.term_id',
                        'value' => array($_SESSION['typologie_emploi']),
                        'compare' => 'IN'
                    );
                }
                $this->limit = -1;
                break;
            case 'publication':
                $this->record_GET_filters();
                $this->limit = 10;
                if ($_SESSION['categorie_publication'] != '') {
                    $this->where[] = array(
                        'key' => 'categorie_publication.term_id',
                        'value' => array($_SESSION['categorie_publication']),
                        'compare' => 'IN'
                    );
                }
                break;
            case 'partenaire':
                $this->limit = 5;
                break;
        }
        if ($custom_params) {
            if (property_exists($custom_params, 'where')) {
                if (property_exists($custom_params, 'where_replace') && $custom_params->where_replace) {
                    $this->where = $custom_params->where;
                } else {
                    $this->where[] = $custom_params->where;
                }
            }
            if (property_exists($custom_params, 'limit') && $custom_params->limit) {
                $this->limit = $custom_params->limit;
            }
            if (property_exists($custom_params, 'orderby') && $custom_params->orderby) {
                $this->orderby = $custom_params->orderby;
            }
            if (property_exists($custom_params, 'page') && $custom_params->page) {
                $this->page = $custom_params->page;
            }
        }
        return $this;
    }

    private function record_GET_filters() {
        foreach ($_GET as $k => &$v) {
            if (isset($_GET[$k])) {
                if ($v != 'all') {
                    $_SESSION[$k] = get_query_var($k);
                } else {
                    unset($_SESSION[$k]);
                }
            }
        }
    }

}

class CnrswebkitPageItemsList {

    private $post_list_params = false;
    private $post_type_params = false;
    private $post_type = false;
    private $pods_data = false;
    private $custom_params = false;

    function __construct($post_type, $custom_params = false) {
        $this->post_type = $post_type;
        $this->custom_params = $custom_params;
        $this->post_type_params = new CnrswebkitListParams($this->post_type, $custom_params);
        $this->post_list_params = new CnrswebkitListPageParams($this->post_type);
        $this->pods_data = pods($this->post_type, $this->post_type_params);
        $this->init_list();
    }

    private function init_list() {
        
    }

    public function get_pagination() {
        $pagination = $this->pods_data->pagination(
                array(
                    'type' => 'advanced',
                    'show_label' => false,
                    'prev_next' => true,
                    'first_last' => false,
                    'prev_text' => '',
                    'next_text' => '',
                //'page_var' => 'pg',
                //'base' => get_permalink() . "page/%_%",
                //'format' => "{$this->page_var}%#%",
                )
        );
        return $pagination;
    }

    public function has_filters() {
        if (count($this->post_list_params->selectors) > 0) {
            return true;
        }
        return false;
    }

    public function has_items() {
        if ($this->pods_data->total() > 0) {
            return true;
        }
        return false;
    }

    public function total_items() {
        return $this->pods_data->total();
    }

    public function get_filters() {
        if (count($this->post_list_params->selectors) > 0) {
            return $this->post_list_params->selectors;
        }
        return false;
    }

    public function get_html_filters($area = false) {
        if (count($this->post_list_params->selectors) > 0) {
            $filters = [];
            foreach ($this->post_list_params->selectors as $k => &$v) {
                $filters[] = '<div>' . $v . '</div>';
            }
            if ($area == 'contact') {
                //$filters[] = '<div><input name="search_contact" id="search_contact" class="search-contact" type="text" value="' . $_SESSION['search_contact'] . '" /></div>';
            }
            if (count($filters) > 0) {
                return '<div class="cnrs-filters cnrs-filter-' . $this->post_type . '"><div>Filtrer par</div>' . join($filters) . '</div>';
            } else {
                return '';
            }
        }
        return '';
    }

    public function get_html_item_list($template = false) {
        if (!$template) {
            $template = $this->post_type;
        }
        // Retour HTML
        switch ($this->post_type) {
            case 'actualite':
                break;
            case 'evenement':
                $previous_date = false;
                $display_month_line = false;
                break;
            case 'mediatheque':
                break;
            case 'emploi':
                $previous_type = false;
                $display_type_line = false;
                break;
            case 'partenaire':
                break;
            case 'publication':
                break;
        }
        if ($this->pods_data->total() > 0) {
            // Calcul des articles
            $iteration_number = 0;
            while ($this->pods_data->fetch()) {
                $current_item = new CnrswebkitItemData($this->pods_data);
                switch ($this->post_type) {
                    case 'actualite':
                        break;
                    case 'evenement':
                        global $cnrs_global_params;
                        if (!$previous_date && get_post_date($current_item->value('date_de_debut'), 'monthyear') != $_SESSION['date_month']) {
                            $date_month = get_post_date($current_item->value('date_de_debut'), 'monthyear');
                            $display_month_line = true;
                            $previous_date = true;
                        } else if (get_post_date($current_item->value('date_de_debut'), 'monthyear') != $date_month && get_post_date($current_item->value('date_de_debut'), 'monthyear') != $_SESSION['date_month']) {
                            $date_month = get_post_date($current_item->value('date_de_debut'), 'monthyear');
                            $display_month_line = true;
                        } else {
                            $display_month_line = false;
                        }
                        $_SESSION['date_month'] = get_post_date($current_item->value('date_de_debut'), 'monthyear');
                        $custom_params = new CnrswebkitStdListParams();
                        $custom_params->limit = -1;
                        $evenement_data = new CnrswebkitPageItemsList('evenement', $custom_params);
                        $total_items = $evenement_data->total_items();
                        if ($total_items <= ($cnrs_global_params->field('nombre_devenements_page_agenda'))) {
                            $custom_script = "<script>$('.moreEvents a').show();var hideLoadMore = true;</script>";
                        } else {
                            $custom_script = "<script>var hideLoadMore = false;</script>";
                        }
                        break;
                    case 'mediatheque':
                        break;
                    case 'emploi':
                        if (!$previous_type && $current_item->value('type_de_poste')['name'] != $_SESSION['type_emploi']) {
                            $type_emploi = $current_item->value('type_de_poste')['name'];
                            $display_type_line = true;
                            $previous_type = true;
                        } else if ($current_item->value('type_de_poste')['name'] != $type_emploi && $current_item->value('type_de_poste')['name'] != $_SESSION['type_emploi']) {
                            $type_emploi = $current_item->value('type_de_poste')['name'];
                            $display_type_line = true;
                        } else {
                            $display_type_line = false;
                        }
                        $_SESSION['type_emploi'] = $type_emploi;
                        break;
                    case 'contact':
                        global $cnrs_global_params;
                        if (!$previous_lettre && $current_item->value('nom')[0] != $_SESSION['lettre_contact']) {
                            $lettre_contact = strtoupper($current_item->value('nom')[0]);
                            $display_lettre_line = true;
                            $previous_lettre = true;
                        } else if (strtoupper($current_item->value('nom')[0]) != $lettre_contact && $current_item->value('nom')[0] != $_SESSION['lettre_contact']) {
                            $lettre_contact = strtoupper($current_item->value('nom')[0]);
                            $display_lettre_line = true;
                        } else {
                            $display_lettre_line = false;
                        }
                        $_SESSION['lettre_contact'] = $current_item->value('nom')[0];
                        $custom_params = new CnrswebkitStdListParams();
                        $custom_params->limit = -1;
                        $contact_data = new CnrswebkitPageItemsList('contact', $custom_params);
                        $total_items = $contact_data->total_items();
                        if ($total_items <= ($cnrs_global_params->field('nombre_decontacts_page_contact'))) {
                            $custom_script = "<script>$('.moreContacts a').show();var hideLoadMore = true;</script>";
                        } else {
                            $custom_script = "<script>$('.moreContacts a').show();var hideLoadMore = false;</script>";
                        }
                        break;
                    case 'partenaire':
                        break;
                    case 'publication':
                        break;
                }
                include(locate_template('loops/loop-' . $template . '.php'));
                $iteration_number++;
            }
            switch ($this->post_type) {
                case 'actualite':
                    if (is_home() || is_front_page()) {
                        echo '<article id="actualite-social-links" class="widget"><h1>Suivez-nous</h1></article>';
                    }
                    break;
            }
        }
    }

    public function get_item_list() {
        if ($this->pods_data->total() > 0) {
            $item_list = [];
            while ($this->pods_data->fetch()) {
                $item_list[] = $this->pods_data;
            }
            return $item_list;
        }
    }

}

class CnrswebkitBuildWhere {

    private $where = '';

    function __construct($metadata) {
        $ids = [];
        if (count($metadata) > 0) {
            foreach ($metadata as $k => &$v) {
                $ids[] = $v["ID"];
            }
            $this->where = 'ID IN ("' . join('","', $ids) . '")';
        }
    }

    public function get_where() {
        return $this->where;
    }

}

class CnrswebkitRichData {

    private $metadata;
    private $the_post;
    private $rich_data;

    function __construct($post_id) {
        $this->the_post = $this->the_post = get_post($post_id);
        $this->metadata = pods($this->the_post->post_type, array('where' => 't.ID = ' . $post_id));
        $this->rich_data = new CnrswebkitItemData($this->metadata, $this->the_post);
    }

    public function value($key) {
        return $this->rich_data->value($key);
    }

    public function get_where_metadata($metadata) {
        $where = new CnrswebkitBuildWhere($metadata);
        return $where->get_where();
    }

}

class CnrswebkitItemData {

    private $metadata;
    private $the_post;
    private $formated_data;

    function __construct($sent_pod_data, $sent_wp_data = false) {
        $this->metadata = $sent_pod_data;
        // récuparation des données du post WordPress
        if (!$sent_wp_data) {
            $this->the_post = get_post($this->metadata->field('id'));
        } else {
            $this->the_post = $sent_wp_data;
        }
        $this->init_item();
    }

    private function init_item() {
        $this->formated_data = new stdClass();
    }

    public function value($key) {
        if (property_exists($this->formated_data, $key)) {
            return $this->formated_data->$key;
        } else if ($this->metadata->field($key)) {
            return $this->metadata->field($key);
        } else if (property_exists($this->the_post, $key)) {
            return $this->the_post->$key;
        }
        return false;
    }

}

/**
 * Combo box selector Builder for Pgas contents.
 *
 * @since CNRS Web Kit 1.1
 *
 * @param array $FilterSelectorParams Arguments to build a selector.
 * @return HTML contents / False.
 */
class FilterSelectorParams {

    public $selectorName = false;
    public $selectorLabel = false;
    public $selectorPod = false;
    public $selectorCurrentValue = false;
    public $selectorOrderBy = 'Name ASC';
    public $selectorLimit = -1;
    public $selectorWhere = '';
    public $selectorEmptyText = 'Tous';

}

function get_filter_selector($FilterSelectorParams) {
    if (!$FilterSelectorParams->selectorPod)
        return false;
    if (!$FilterSelectorParams->selectorName)
        $FilterSelectorParams->selectorName = $FilterSelectorParams->selectorPod;
    $complete_selector = false;
    $params = [
        'limit' => $FilterSelectorParams->selectorLimit,
        'orderby' => $FilterSelectorParams->selectorOrderBy,
        'where' => $FilterSelectorParams->selectorWhere,
    ];
    //Récupération des items
    $pods = pods($FilterSelectorParams->selectorPod, $params);
    if ($pods->total() > 0) {
        $complete_selector = '';
        $selector_id = uniqid();
        while ($pods->fetch()) {
            $current_selected = '';
            if ($FilterSelectorParams->selectorCurrentValue && $FilterSelectorParams->selectorCurrentValue == $pods->field('id')) {
                $current_selected = 'selected="selected"';
            }
            $current_option = '<option value="' . $pods->field('id') . '"' . $current_selected . '>' . $pods->field('name') . '</option>';
            $complete_options .= $current_option;
        }
        if ($FilterSelectorParams->selectorLabel) {
            //$complete_selector .= '' . $FilterSelectorParams->selectorLabel . '';
            //$complete_selector .= '<div class="cnrs-selector-label label-' . $FilterSelectorParams->selectorName . ' label-' . $FilterSelectorParams->selectorName . '-' . $selector_id . '">' . $FilterSelectorParams->selectorLabel . '</div>';
        }
        $complete_selector .= '<select class="selector-' . $FilterSelectorParams->selectorName . ' selector-' . $FilterSelectorParams->selectorName . '-' . $selector_id . '" name="' . $FilterSelectorParams->selectorName . '-' . $selector_id . '" id="' . $FilterSelectorParams->selectorName . '-' . $selector_id . '">';
        $complete_selector .= '<option selected disabled>' . $FilterSelectorParams->selectorLabel . '</option>';
        $complete_selector .= '<option value="all">' . $FilterSelectorParams->selectorEmptyText . '</option>';
        $complete_selector .= $complete_options;
        $complete_selector .= '</select>';
        $complete_selector .= "<script>jQuery('.selector-" . $FilterSelectorParams->selectorName . "').change(function (event) {top.location.href = '" . add_query_arg($FilterSelectorParams->selectorName, '', get_permalink()) . "=' + event.target.value;});</script>";
    }
    return $complete_selector;
}

/**
 * Fonctions de formatage de donnée
 */
function get_post_date($string_time, $return_type) {
    setlocale(LC_TIME, "fr_FR");
    if ($timestamp = strtotime($string_time)) {
        switch ($return_type) {
            case 'time':
                $format_date = '%Hh%M';
                break;
            case 'daynumber':
                $format_date = '%d';
                break;
            case 'month':
                $format_date = '%B';
                break;
            case 'year':
                $format_date = '%Y';
                break;
            case 'monthyear':
                $format_date = '%B %Y';
                break;
            case 'datesimplefirst':
                $format_date = '%d %B';
                break;
            case 'datesimpleshortmonthfirst':
                $format_date = '%d %b';
                break;
            case 'datesimple':
                $format_date = '%d %B %Y';
                break;
            case 'datesimpleshortmonth':
                $format_date = '%d %b %Y';
                break;
            case 'date':
                $format_date = '%A %d %B %Y';
                break;
            case 'datetimesimple':
                $format_date = '%d %B %Y, %Hh%M';
                break;
            case 'datetime':
                $format_date = '%A %d %B %Y &aacute; %Hh%M';
                break;
            case 'complete':
                $format_date = '%A %d %B %Y &aacute; %Hh%M';
                break;
            default:
                $format_date = '%A %d %B %Y &aacute; %Hh%M';
                break;
        }
        return ucfirst(utf8_encode(strftime($format_date, $timestamp)));
    }
    return false;
}

function get_event_dates($start_date, $end_date, $return_type) {
    if ($return_type == 'dateheader') {
        return '<span>' . get_post_date($start_date, 'datesimple') . '</span>';
    } else if (get_post_date($start_date, 'date') != get_post_date($end_date, 'date')) {
        if ($return_type == 'dateeventsingle') {
            return '<span>' . get_post_date($start_date, 'datesimpleshortmonth') . '</span><span>' . get_post_date($end_date, 'datesimpleshortmonth') . '</span>';
        } else {
            return '<span>' . get_post_date($start_date, 'datesimpleshortmonthfirst') . '</span><span>' . get_post_date($end_date, 'datesimpleshortmonth') . '</span>';
        }
    } else {
        if ($return_type == 'dateeventsingle') {
            return '<span>' . get_post_date($start_date, 'datetimesimple') . '</span><span>' . get_post_date($end_date, 'time') . '</span>';
        } else {
            return '<span>' . get_post_date($start_date, $return_type) . '</span>';
        }
    }
}

function display_bottom_emplois() {
    include(locate_template('template-parts/bottom-emploi.php'));
}

function display_bottom_actualites() {
    include(locate_template('template-parts/bottom-actualite.php'));
}

function display_bottom_partenaires() {
    include(locate_template('template-parts/bottom-partenaire.php'));
}

function display_labo_partenaires($pods) {
    include(locate_template('template-parts/labo-partenaire.php'));
}

function display_bottom_evenements() {
    include(locate_template('template-parts/bottom-evenement.php'));
}

function text_to_html($text, $tag = false) {
    if ($tag) {
        return '<' . $tag . '>' . str_replace("\r", "", str_replace("\n", '</' . $tag . '><' . $tag . '>', $text)) . '</' . $tag . '>';
    } else {
        return str_replace("\r", "", str_replace("\n", "<br />", $text));
    }
}

function get_rnd_image_size($area, $iter) {
    switch ($area) {
        case 'mediatheque':
            if ($iter > 9) {
                $iter = fmod($iter, 9);
            }
            $image_size_list = [
                '800',
                '400',
                '400',
                '400',
                '400',
                '400',
                '400',
                '800',
                '400',
            ];
            if (is_int($iter)) {
                return $image_size_list[$iter];
            } else {
                return $image_size_list[array_rand($image_size_list)];
            }
    }
    return false;
}

add_filter('pods_api_pre_save_pod_item_evenement', 'update_evenement', 10, 2);

function update_evenement($pieces, $is_new_item) {
    if (strtotime($pieces['fields']['date_de_debut']['value']) > strtotime($pieces['fields']['date_de_fin']['value'])) {
        wp_die('La date de début doit être inférieure à la date de fin. <a href="javascript:history.back();">Retour</a>');
    }
}

add_action('pods_api_post_save_pod_item_reglage_du_theme', 'update_site_params', 10, 3);

function update_site_params($pieces, $is_new_item, $id) {
    $term = $pieces['fields']['couleur_principale']['value'];
    if (empty($term)) {
        $term = '#ea514a';
    }
    $content = file_get_contents(TEMPLATEPATH . '/library/scss/cnrs_dyn.scss');
    $content = preg_replace('/\$mainColor:#[A-Za-z0-9]{6};/', '$mainColor:' . $term . ';', $content);
    file_put_contents(TEMPLATEPATH . '/library/scss/cnrs_dyn.scss', $content);
}

function get_file_size_from_url($url) {
    return round(filesize($_SERVER['DOCUMENT_ROOT'] . parse_url($url, PHP_URL_PATH)) / 1048576, 2);
}

function cnrs_breadcrumb() {
    global $cnrs_global_params;
    $related_link = '';
    $pages_links = '';
    $related_page = $cnrs_global_params->field('pageliste_' . get_post_type());
    if ($related_page != null && $related_page != false) {
        $related_link = '<span class="breadcrumb" rel="v:child" typeof="v:Breadcrumb"><a href="' . get_permalink($related_page["ID"]) . '" rel="v:url" property="v:title">' . $related_page["post_title"] . '</a></span>';
    } else if (get_post_type() == 'page') {
        $parents = get_post_ancestors(get_the_ID());
        if (count($parents) > 0) {
            foreach ($parents as $kp => &$vp) {
                $pages_link[] = '<span class="breadcrumb" rel="v:child" typeof="v:Breadcrumb"><a href="' . get_permalink($vp) . '" rel="v:url" property="v:title">' . get_the_title($vp) . '</a></span>';
            }
            $pages_links = implode('<i>&gt;</i>', $pages_link);
        }
    }
    if (!is_home() && !is_front_page()) {
        $bc_links = [];
        $bc_links[] = '<a href="' . get_site_url() . '" rel="v:url" property="v:title">' . __('Accueil') . '</a>';
        if (is_search()) {
            $bc_links[] = '<span class="breadcrumb_last">' . __('Résultat de recherche') . '</span>';
        } else {
            $bc_links[] = $pages_links;
            $bc_links[] = $related_link;
            $bc_links[] = '<span class="breadcrumb_last">' . get_the_title() . '</span>';
        }
        echo '<p id="breadcrumbs"><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb">' . implode('<i>&gt;</i>', $bc_links) . '</span></span></p>';
    }
}

if (function_exists('pods')) {
    $cnrs_global_params = pods('reglage_du_theme');
}

if (!$cnrs_global_params->field('commentaires_actifs')) {

// Disable support for comments and trackbacks in post types
    function df_disable_comments_post_types_support() {
        $post_types = get_post_types();
        foreach ($post_types as $post_type) {
            if (post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    }

    add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
    function df_disable_comments_status() {
        return false;
    }

    add_filter('comments_open', 'df_disable_comments_status', 20, 2);
    add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
    function df_disable_comments_hide_existing_comments($comments) {
        $comments = array();
        return $comments;
    }

    add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
    function df_disable_comments_admin_menu() {
        remove_menu_page('edit-comments.php');
    }

    add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
    function df_disable_comments_admin_menu_redirect() {
        global $pagenow;
        if ($pagenow === 'edit-comments.php') {
            wp_redirect(admin_url());
            exit;
        }
    }

    add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
    function df_disable_comments_dashboard() {
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    }

    add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
    function df_disable_comments_admin_bar() {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    }

    add_action('init', 'df_disable_comments_admin_bar');
}
