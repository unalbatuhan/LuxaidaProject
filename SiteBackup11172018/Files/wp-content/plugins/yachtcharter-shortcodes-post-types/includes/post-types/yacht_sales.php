<?php

function create_post_type_yacht_sales() {
	
	register_post_type('yacht_sales', 
		array(
			'labels' => array(
				'name' => esc_html__( 'Yacht Sales', 'yachtcharter' ),
                'singular_name' => esc_html__( 'Yacht Sales', 'yachtcharter' ),
				'add_new' => esc_html__('Add Yacht Sales', 'yachtcharter' ),
				'add_new_item' => esc_html__('Add New Yacht Sales' , 'yachtcharter' )
			),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-star-filled',
		'rewrite' => array(
			'slug' => esc_html__('yacht_sales','yachtcharter')
		), 
		'supports' => array( 'title','editor','thumbnail')
	));
}

add_action( 'init', 'create_post_type_yacht_sales' );


function yacht_sales_type() {	
    register_taxonomy( esc_html__('yacht_sales-type','yachtcharter'), 'yacht_sales', array( 'hierarchical' => true, 'label' => esc_html__('Yacht Sales Type','yachtcharter'), 'query_var' => true, 'rewrite' => true ) );
}
add_action( 'init', 'yacht_sales_type' );

function yacht_sales_location() {	
    register_taxonomy( esc_html__('yacht_sales-location','yachtcharter'), 'yacht_sales', array( 'hierarchical' => true, 'label' => esc_html__('Location','yachtcharter'), 'query_var' => true, 'rewrite' => true ) );
}
add_action( 'init', 'yacht_sales_location' );


// Add the Meta Box  
function add_yacht_sales_meta_box() {  
    add_meta_box(  
        'yacht_sales_meta_box', // $id  
        'Pricing', // $title  
        'show_yacht_sales_meta_box', // $callback  
        'yacht_sales', // $page  
        'normal', // $context  
        'high'); // $priority  
}  
add_action('add_meta_boxes', 'add_yacht_sales_meta_box');



// Field Array  
$prefix = 'yachtcharter_';  
$yacht_sales_meta_fields = array(  	
	array(  
        'label'=> esc_html__('Currency Symbol','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'yacht_sales_currency_symbol',  
        'type'  => 'text'
    ),
	array(  
        'label'=> esc_html__('Price','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'yacht_sales_price',  
        'type'  => 'text'
    ),
	array(  
        'label'=> esc_html__('Variable Form Option Title #1','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'yacht_sales_variable_title_1',  
        'type'  => 'text'
    ),
	array(  
        'label'=> esc_html__('Variable Form Options #1','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'yacht_sales_variable_options_1',  
        'type'  => 'textarea'
    ),
	array(  
        'label'=> esc_html__('Variable Form Option Title #2','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'yacht_sales_variable_title_2',  
        'type'  => 'text'
    ),
	array(  
        'label'=> esc_html__('Variable Form Options #2','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'yacht_sales_variable_options_2',  
        'type'  => 'textarea'
    ),
	array(  
        'label'=> esc_html__('Variable Form Option Title #3','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'yacht_sales_variable_title_3',  
        'type'  => 'text'
    ),
	array(  
        'label'=> esc_html__('Variable Form Options #3','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'yacht_sales_variable_options_3',  
        'type'  => 'textarea'
    )
       
);



// The Callback  
function show_yacht_sales_meta_box() {
	global $yacht_sales_meta_fields, $post;
	// Use nonce for verification
	echo '<input type="hidden" name="yacht_sales_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

	foreach ($yacht_sales_meta_fields as $field) {
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
			
			// textarea
			case 'textarea':
?><div class="yachtcharter-field-wrapper field-padding clearfix">
	<div class="one-fifth"><label><?php echo $field['label']; ?></label></div>
	<div class="four-fifths"><textarea name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" cols="100" rows="4"><?php echo $meta; ?></textarea><p class="description"><?php echo $field['desc']; ?></p></div>
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
				echo '<h3 class="heading">'.$field['label'].'</h3>'; 
			    echo '<div class="control-area">
			<div class="select_wrapper"><select name="'.$field['id'].'" id="'.$field['id'].'">';  
			    foreach ($field['options'] as $option) {  
			        echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';  
			    }  
			    echo '</select></div></div>
			<div class="label-area">'.$field['desc'].'</div>
			<div class="clearboth"></div>';  
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
function save_yacht_sales_meta($post_id) {  
    global $yacht_sales_meta_fields;  
  	
	$post_data = '';
	
	if(isset($_POST['yacht_sales_meta_box_nonce'])) {
		$post_data = $_POST['yacht_sales_meta_box_nonce'];
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
    foreach ($yacht_sales_meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'save_yacht_sales_meta');


?>