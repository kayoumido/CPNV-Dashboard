<?php
namespace AppBundle\Service;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterApi {
    
    private $tw;
    private $account = "cpnv_ch";
    private $config;
    
    public function __construct(array $twitterconfig) {
        $this->config = $twitterconfig;
        
        $this->tw = new TwitterOAuth(
            $this->config["app_id"],
            $this->config["app_secret"],
            $this->config["access_token"],
            $this->config["access_token_secret"]
        );
    }

    public function getFollowerCount() {
        return $this->tw->get("users/show", [
            "screen_name" => $this->account
        ])->followers_count;
    }

    public function getTweets() {
        return $this->tw->get("statuses/user_timeline", [
            "screen_name" => $this->account
        ]);
    }
}
