<div id="contact-form-<?php echo $form_id ?>" class="contact-form">
    <input id="nom<?php echo $form_id ?>" placeholder="<?php _e('Votre nom', 'cnrswebkit') ?>" />
    <input id="prenom<?php echo $form_id ?>" placeholder="<?php _e('Votre prénom', 'cnrswebkit') ?>" />
    <input id="email<?php echo $form_id ?>" placeholder="<?php _e('Votre adresse email', 'cnrswebkit') ?>" />
    <textarea id="message<?php echo $form_id ?>" placeholder="<?php _e('Votre message ici', 'cnrswebkit') ?>"></textarea>
    <button id="contact-form-submit-<?php echo $form_id; ?>"><?php _e('Envoyer', 'cnrswebkit') ?></button>
    <button id="contact-form-cancel-<?php echo $form_id; ?>"><?php _e('Annuler', 'cnrswebkit') ?></button>
    <div id="form-container-<?php echo $form_id ?>-errors" class="contact-form-errors"></div>
</div>