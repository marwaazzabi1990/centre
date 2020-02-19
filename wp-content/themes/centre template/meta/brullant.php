<!--<?php 
//add_action('admin_init','detail_init_meta');
//add_action('save_post','detail_save_meta');
//function detail_init_meta(){
	/*if (function_exists('add_meta_box'))
	{
		add_meta_box('formation','details','mm_render_metabox','post');

	}
}
function mm_render_metabox(){
	global $post;
	$value= get_post_meta($post->ID,'prix_formation',true);
	?>
<div class="add_meta_box-item-title">
	Prix:
</div>
<div class="add_meta_box-item-content">

 <input type="text" name="prix_formation" id="prix_formation" value=" <?php  $value ?>">
</div>
<!--<div class="add_meta_box-item-title">
	Nombre d'heure:
</div>
<div class="add_meta_box-item-content">

 <input type="number" name="Nombre_heur" id="Nombre_heur" value="">
</div>
<div class="add_meta_box-item-title">
	Formateur:
</div>
<div class="add_meta_box-item-content">

 <input type="text" name="Formateur" id="Formateur" value="">
</div>
<div>
<label for="pet-select">Type:</label>
</div>
<div>
<select name="pets" id="pet-select">
    <option value="">--Selectionnez le type--</option>
    <option value="web">Web</option>
    <option value="progarmmation">Programmation</option>
    <option value="langue">Langue</option>
    
</select>
</div>-->
	<?php

}

/*function detail_save_meta($post_id)
{
$meta='prix_formation';
//on ne fait rien en cas de save ajax
/*if (
	!isset($_POST[$meta]) ||
	(defined('DOING_AUTOSAVE')&& DOING_AUTOSAVE )||
        (defined('DOING_AJAX')&& DOING_AJAX)
	) 
{
	return false;
}
if (defined('DOING_AUTOSAVE')&& DOING_AUTOSAVE)
{
	return false;
}
//verifier la permession
if(!current_user_can('edit_post',$post_id))
{
	return ;
}
$value=$_POST[$meta];

if(get_post_meta($post_id,$meta))
{
	update_post_meta($post_id,$meta,$value);
}
else if ($value ==='')
{
	delete_post_meta($post_id,$meta,$value);
}
else
{
	add_post_meta($post_id,$meta,$value);
}
}*/





//pour le prix de formation



function detail_init_meta(){
	if (function_exists('add_meta_box'))
	{
		add_meta_box('formation','details','mm_render_metabox','post');

	}
}
add_action('admin_init','detail_init_meta');

function mm_render_metabox(){
	global $post;
	 $value = get_post_meta($post->ID, 'pp', true);
	?>
<div class="add_meta_box-item-title">
	Prix:
</div>
<div class="add_meta_box-item-content">
 <input id="prix_formation" type="text" name="prix_formation" value="<?php   $value  ?>" />
<!-- <input type="text" name="prix_formation" id="prix_formation" value=" <?php  $value ?>">-->
</div>
    <?php
}
 function detail_save_meta($post_id)
{
    if (array_key_exists('prix_formation', $_POST))
     {
        update_post_meta(
            $post_id,
            'pp',
            $_POST['prix_formation']
        );
    }
}
add_action('save_post', 'detail_save_meta');