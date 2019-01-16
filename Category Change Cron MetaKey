function category_change(){
//Gets all posts in category Events
	$query=new WP_Query(array('category_name' => 'Events'));
	if($query->have_posts()):
		while($query->have_posts()):
			$query->the_post();
      //if the meta_key 'EventDate' is lower (older post) than date
			if(get_post_meta(get_the_ID(),$key='EventDate',$single=true)<date('Ymd')):
        //changes post category to PastEvents (category id =8)
				wp_set_post_categories(get_the_ID(),array(8),false);
			endif;
		endwhile;
	endif;
};
//Adds the function category_change() to the category_change_cron hook
add_action('category_change_cron','category_change');
//Runs the category_change_cron hook every hour
if(!wp_next_scheduled('category_change_cron')){
	wp_schedule_event(time(),'hourly','category_change_cron');
};
