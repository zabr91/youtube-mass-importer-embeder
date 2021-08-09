<?php

require_once( ABSPATH . "wp-includes/pluggable.php" );
require_once( ABSPATH . "wp-load.php" );

class PostInner{
    public static function inner($_items){

        //var_dump($_items);

       $countItems = count($_items);       

       if($countItems > 0){
            for ($i = 0; $i < $countItems ; $i++) { 

                if ( ! get_page_by_title( sanitize_text_field($_items[$i]["snippet"]["title"]), OBJECT, 'youtube_video' ) ) {

                    $new_post = array(
                            'post_type' => 'youtube_video',
                            'post_title' =>  $_items[$i]["snippet"]["title"],
                            'post_content' => htmlentities( $_items[$i]["snippet"]["description"]),
                            'post_status' => 'publish',
                            'meta_input' => [
                                'videoid' => $_items[$i]["id"]["videoId"],
                                'thumbnail' => $_items[$i]["snippet"]["thumbnails"]["default"]
                                ]
                        );
                
                        wp_insert_post( wp_slash($new_post));  
                        unset($new_post);           
                    }
                }
       }
     
       

    }
}