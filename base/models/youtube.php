<?php

class Youtube{

    private $token;
    private $question;

    private $maxResults = 5;
    
    function __construct($_token){
        $this->token = $_token;
    }

    public function setQuestion($_question){
        $this->question = $_question;
    }

    public function getVideos()
    {
        if(isset($this->token) & isset($this->question)){
           $items = json_decode($this->getData($this->question), true);

           if(array_key_exists('items', $items)){
                return $items['items'];
           }
           else {
               return false;
           }
        }
    }

    public function getData($question){
        
        $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$question&type=video&maxResults=$this->maxResults&key=$this->token";

        if( $curl = curl_init() ) {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            $out = curl_exec($curl);
            curl_close($curl);
        }

        return $out;
    }
}