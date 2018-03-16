<?php
namespace AppBundle\Service;

class FacebookApi {
    
    private $fb;
    private $account = "cpnv.ch";
    private $config;
    
    public function __construct(array $facebookConfig) {
        $this->config = $facebookConfig;
        
        $this->fb = new \Facebook\Facebook([
            "app_id" => $this->config["app_id"],
            "app_secret" => $this->config["app_secret"],
            "default_graph_version" => "v2.12",
        ]);
    }

    public function getLikes() {
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $this->fb->get("/{$this->account}?fields=fan_count", $this->config["access_token"]);

        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        return $response->getGraphNode()["fan_count"];
    }

    public function getPosts(int $nbPosts) {
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $this->fb->get("/${$this->account}/feed", $this->config["access_token"]);

        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $posts = $response->getGraphEdge()->asArray();
        return array_splice($posts, 0, $nbPosts);
    }

    public function getAccountName() {
        return $this->account;
    }

}
