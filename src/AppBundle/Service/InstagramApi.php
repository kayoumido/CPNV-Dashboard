<?php
namespace AppBundle\Service;

class InstagramApi {
    
    private $ig;
    private $account = "cpnv.ch";
    private $config;

    function __construct(array $instagramConfig) {
        // save instagram config
        $this->config = $instagramConfig;
        // create new Guzzle client
        $client = new \GuzzleHttp\Client();
        // get data
        $results = $client->request('GET', "{$this->config['api_url']}{$this->account}/{$this->config['api_param']}");
        $this->ig = json_decode($results->getBody()->getContents())->graphql;
    }

    function getFollowerCount() {
        return $this->ig->user->edge_followed_by->count;
    }

    function getPosts(int $nbPosts) {
        $posts = $this->ig->user->edge_owner_to_timeline_media->edges;
        return array_splice($posts, 0, $nbPosts);
    }
}
