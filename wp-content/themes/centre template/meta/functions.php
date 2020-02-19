

<?php 
function wporg_add_custom_box()
{
    $screens = ['post', 'wporg_cpt'];
    foreach ($screens as $screen) {
        add_meta_box(
            'wporg_box_id',           // Unique ID
            'Detail de formation',  // Box title
            'wporg_custom_box_html',  // Content callback, must be of type callable
            $screen                   // Post type
        );
        
 
    }
}
add_action('add_meta_boxes', 'wporg_add_custom_box');



function wporg_custom_box_html($post)
{
    $nb = get_post_meta($post->ID, 'nb', true);
     $prix = get_post_meta($post->ID, 'prix', true);
     $type = get_post_meta($post->ID, 'type', true);
     $date= get_post_meta($post->ID, 'date', true);
  $gallery_data = get_post_meta($post->ID, '  $gallery_data', true);
   ?>
                        
    <div>
 <label for="prix">Prix</label>
 </div>
<div>
 <input id="prix" type="text" name="prix" value="<?php  echo $prix ?>" />
</div>
  
<div>
  <label for="nb">Nombre d'heur</label>
</div>
  <div>
 <input id="nb" type="text" name="nb" value="<?php  echo $nb  ?>" />
</div>
<div>
  <label for="nb">Date de Debut</label>
</div>
  <div>
 <input id="date" type="Date" name="date" value="<?php  echo $date  ?>" />
</div>
<div>
<label>image</label>
<img src="<?php  echo esc_attr($gallery_data);?>">
<li><a href="..\images">download</a></li>
   
</div>
</div>


<div>
 <label for="type">Type de formation</label>
</div>
<div>
    <select name="type" id="type" class="postbox">
        <option value="">Selectionnez le type...</option>
        <option value="web" <?php selected( $type, 'web'); ?>>web</option>
        <option value="programmation" <?php selected( $type, 'programmation'); ?>>programmation</option>
         <option value="patisserie" <?php selected( $type, 'patisserie'); ?>>patisserie</option>
         <option value="cuisine" <?php selected( $type, 'cuisine'); ?>>cuisine</option>
    </select>
</div>
    <?php
}

function wporg_save_postdata($post_id)
{
    if (array_key_exists('prix', $_POST)) {
        update_post_meta(
            $post_id,
            'prix',
            $_POST['prix']
        );
    }

    if (array_key_exists('nb', $_POST)) {
        update_post_meta(
            $post_id,
            'nb',
            $_POST['nb']
        );
    }
     if (array_key_exists('type', $_POST)) {
        update_post_meta(
            $post_id,
            'type',
            $_POST['type']
        );
    }
    if (array_key_exists('$gallery_data', $_POST)) {
        update_post_meta(
            $post_id,
            '$gallery_data',
            $_POST['$gallery_data']
        );
    }
    if(isset($_POST['logo_entmembres']))
    {
            // Sanitize user input.
            $meta_data_entmembres = sanitize_text_field($_POST['logo_entmembres']);
            update_post_meta($post_ID, ‘logoent’, $meta_data_entmembres );
   }
     if (array_key_exists('date', $_POST)) {
        update_post_meta(
            $post_id,
            'date',
            $_POST['date']
        );
    }
}
add_action('save_post', 'wporg_save_postdata');





?>