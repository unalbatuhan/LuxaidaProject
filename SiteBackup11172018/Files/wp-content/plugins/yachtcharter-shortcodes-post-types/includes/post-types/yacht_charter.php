<?php

function create_post_type_yacht_charter() {
	
	register_post_type('yacht_charter', 
		array(
			'labels' => array(
				'name' => esc_html__( 'Yacht Charter', 'yachtcharter' ),
                'singular_name' => esc_html__( 'Yacht Charter', 'yachtcharter' ),
				'add_new' => esc_html__('Add Yacht Charter', 'yachtcharter' ),
				'add_new_item' => esc_html__('Add New Yacht Charter' , 'yachtcharter' )
			),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-star-filled',
		'rewrite' => array(
			'slug' => esc_html__('yacht_charters','yachtcharter')
		), 
		'supports' => array( 'title','editor','thumbnail')
	));
}

add_action( 'init', 'create_post_type_yacht_charter' );


function yacht_charter_type() {	
    register_taxonomy( esc_html__('yacht_charter-type','yachtcharter'), 'yacht_charter', array( 'hierarchical' => true, 'label' => esc_html__('Yacht Charter Type','yachtcharter'), 'query_var' => true, 'rewrite' => true ) );
}
add_action( 'init', 'yacht_charter_type' );

function yacht_charter_location() {	
    register_taxonomy( esc_html__('yacht_charter-location','yachtcharter'), 'yacht_charter', array( 'hierarchical' => true, 'label' => esc_html__('Location','yachtcharter'), 'query_var' => true, 'rewrite' => true ) );
}
add_action( 'init', 'yacht_charter_location' );


// Add the Meta Box  
function add_yacht_charter_meta_box() {  
    add_meta_box(  
        'yacht_charter_meta_box', // $id  
        'Pricing', // $title  
        'show_yacht_charter_meta_box', // $callback  
        'yacht_charter', // $page  
        'normal', // $context  
        'high'); // $priority  
}  
add_action('add_meta_boxes', 'add_yacht_charter_meta_box');



// Field Array  
$prefix = 'yachtcharter_';  
$yacht_charter_meta_fields = array(  	
	array(  
        'label'=> esc_html__('Short Content','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'yacht_charter_short_content',  
        'type'  => 'textarea'
    ),
	array(  
        'label'=> esc_html__('Currency Symbol','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'yacht_charter_currency_symbol',  
        'type'  => 'text'
    ),
	array(  
        'label'=> esc_html__('Price','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'yacht_charter_price',  
        'type'  => 'text'
    ),
	array(  
	        'label'=> esc_html__('Price Scheme','yachtcharter'),  
	        'desc'  => '',  
	        'id'    => $prefix.'yacht_charter_price_scheme',  
	        'type'  => 'select',  
	        'options' => array(
				'1' => array(  
	                'label' => 'Per Hour',  
	                'value' => 'per_hour'  
	            ),
				'2' => array(  
	                'label' => 'Per Day',  
	                'value' => 'per_day'  
	            ),  
	            '3' => array(  
	                'label' => 'Per Night',  
	                'value' => 'per_night'  
	            ),  
	            '4' => array(  
	                'label' => 'Per Week',  
	                'value' => 'per_week'  
	            ),
				'5' => array(  
	                'label' => 'Per Month',  
	                'value' => 'per_month'  
	            )
	        )  
	    ),
       
);



// The Callback  
function show_yacht_charter_meta_box() {
	global $yacht_charter_meta_fields, $post;
	// Use nonce for verification
	echo '<input type="hidden" name="yacht_charter_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

	foreach ($yacht_charter_meta_fields as $field) {
		// get value of this field if it exists for this post
		$meta = get_post_meta($post->ID, $field['id'], true);

		switch($field['type']) {
			
			// text
			case 'text':
?><div class="yachtcharter-field-wrapper field-padding clearfix">
	<div class="one-fifth"><label><?php echo $field['label']; ?></label></div>
	<div class="four-fifths"><input type="text" name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" value="<?php echo !empty($meta) ? $meta : ''; ?>"><p class="description"><?php echo $field['desc']; ?></p></div>
</div>
<hr class="space1"><?php
			break;

			// text
			case 'textarea':
?><div class="yachtcharter-field-wrapper field-padding clearfix">
	<div class="one-fifth"><label><?php echo $field['label']; ?></label></div>
	<div class="four-fifths"><textarea name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>"><?php echo !empty($meta) ? $meta : ''; ?></textarea><p class="description"><?php echo $field['desc']; ?></p></div>
</div>
<hr class="space1"><?php
			break;
			
			// checkbox  
			case 'checkbox':  
				echo '<h3 class="heading">'.$field['label'].'</h3>'; 
			    echo '<div class="control-area"><input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/></div>
			        <div class="label-area">'.$field['desc'].'</div>
					<div class="clearboth"></div>';  
			break;
			
			// checkbox  
			case 'title':
				echo '<h3 class="heading">'.$field['label'].'</h3>'; 
			break;
			
			
			// checkbox  
			case 'checkbox-multi':
			    echo '<div class="control-area"><input type="checkbox" name="'.$field['id'].'" class="fl" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/><p class="fl checkbox-label">'.$field['label'].'</p><div class="clearboth"></div></div>';
			break;
			
		
			
			// select  
			case 'select':  
				echo '<div class="yachtcharter-field-wrapper field-padding clearfix">
					<div class="one-fifth"><label>'.$field['label'].'</label></div>'; 
			    echo '<div class="four-fifths">
			<div class="select_wrapper"><select name="'.$field['id'].'" id="'.$field['id'].'">';  
			    foreach ($field['options'] as $option) {  
			        echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';  
			    }  
			    echo '</select><p class="description">'.$field['desc'].'</p></div>
			</div>
			<hr class="space1">';  
			break;
			
			// date
			case 'date':
				echo '<h3 class="heading">'.$field['label'].'</h3>'; 
				echo '<div class="control-area"><input type="text" class="datepicker" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /></div>
						<div class="label-area">'.$field['desc'].'</div>
						<div class="clearboth"></div>';
			break;
			
		} //end switch
   } // end foreach
}



// Save the Data  
function save_yacht_charter_meta($post_id) {  
    global $yacht_charter_meta_fields;  
  	
	$post_data = '';
	
	if(isset($_POST['yacht_charter_meta_box_nonce'])) {
		$post_data = $_POST['yacht_charter_meta_box_nonce'];
	}

    // verify nonce  
    if (!wp_verify_nonce($post_data, basename(__FILE__)))  
        return $post_id;

    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;

    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($yacht_charter_meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'save_yacht_charter_meta');


?>