<?php

function create_post_type_testimonial() {
	
	register_post_type('testimonial', 
		array(
			'labels' => array(
				'name' => esc_html__( 'Testimonials', 'yachtcharter' ),
                'singular_name' => esc_html__( 'Testimonial', 'yachtcharter' ),
				'add_new' => esc_html__('Add Testimonial', 'yachtcharter' ),
				'add_new_item' => esc_html__('Add New Testimonial' , 'yachtcharter' )
			),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-star-filled',
		'rewrite' => array(
			'slug' => esc_html__('testimonials','yachtcharter')
		), 
		'supports' => array( 'title','editor','thumbnail'),
	));
}

add_action( 'init', 'create_post_type_testimonial' );



// Add the Meta Box  
function add_testimonial_meta_box() {  
    add_meta_box(  
        'testimonial_meta_box', // $id  
        'Testimonial', // $title  
        'show_testimonial_meta_box', // $callback  
        'testimonial', // $page  
        'normal', // $context  
        'high'); // $priority  
}  
add_action('add_meta_boxes', 'add_testimonial_meta_box');



// Field Array  
$prefix = 'yachtcharter_';  
$testimonial_meta_fields = array(  
    array(  
		'label'=> esc_html__('Guest Name','yachtcharter'),  
		'desc'  => '',  
		'id'    => $prefix.'testimonial_guest',  
		'type'  => 'text'
	),	
	array(  
        'label'=> esc_html__('Other Details','yachtcharter'),  
        'desc'  => '',  
        'id'    => $prefix.'testimonial_other_details',  
        'type'  => 'text'
    )
       
);



// The Callback  
function show_testimonial_meta_box() {
	global $testimonial_meta_fields, $post;
	// Use nonce for verification
	echo '<input type="hidden" name="testimonial_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

	foreach ($testimonial_meta_fields as $field) {
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
		} //end switch
   } // end foreach
}



// Save the Data  
function save_testimonial_meta($post_id) {  
    global $testimonial_meta_fields;  
  	
	$post_data = '';
	
	if(isset($_POST['testimonial_meta_box_nonce'])) {
		$post_data = $_POST['testimonial_meta_box_nonce'];
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
    foreach ($testimonial_meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'save_testimonial_meta');


?>