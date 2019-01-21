add_action( 'pre_get_posts', 'my_change_sort_order'); 
function my_change_sort_order($query){
	if($query->is_main_query()){
      //checks if archive
      if(is_archive()):
      //checks if archive is of the right category
			if(is_category($category='Events')):
           //change order to assending based on the numeric meta key 'EventDate'
				   $query->set( 'order', 'ASC' );
				   //Set the orderby
				   $query->set( 'orderby', 'meta_value_num');
				   $query->set('meta_key', 'EventDate');
			endif;
    endif;
    return $query;
	}
};
