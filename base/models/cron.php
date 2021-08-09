<?php


add_action( 'wp', 'my_activation' );
function my_activation() {
	if ( ! wp_next_scheduled( 'one_day_event' ) )
		wp_schedule_event( time(), 'twicedaily', 'one_day_event' );
}

// функция крон-задачи
add_action( 'one_day_event', 'do_every_day' );
function do_every_five_day(){
	
	$ytoken = 'AIzaSyAc_DriRpPgLv7rvhmcYgRIBHBNFfWxTQM';

	$ymie_items = new BaseCustomData('ymie_items');
	$active_tasks = $ymie_items->get_by(['status' => 1]);

	$count_tasks = count($active_tasks);

	for ($i=0; $i < $count_tasks ; $i++) { 
		$search = $active_tasks[$i]->q;

		$yt = new Youtube($ytoken);
		$yt->setQuestion($search);
	
	
		if($yt->getVideos() ) {
			PostInner::inner( $yt->getVideos() );
		}
	}	

}