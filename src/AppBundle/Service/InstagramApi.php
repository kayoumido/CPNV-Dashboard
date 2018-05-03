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
        try {
            $results = $client->request('GET', "{$this->config['api_url']}{$this->account}/{$this->config['api_param']}");
            $this->ig = json_decode($results->getBody()->getContents())->graphql;
        } catch (\Exception $e) {
            // The "hack" used to access instagram information was shutdown. So a quick workaround was done so app would still work
            $this->ig = new \stdClass();
            $this->ig->user = new \stdClass();
            $this->ig->user->edge_followed_by = new \stdClass();
            $this->ig->user->edge_owner_to_timeline_media = new \stdClass();

            $this->ig->user->edge_followed_by->count = 0;
            $this->ig->user->edge_owner_to_timeline_media->edges = [];
            $this->ig->user->full_name = $this->account;
            $this->ig->user->profile_pic_url_hd = "https://scontent-frt3-1.cdninstagram.com/vp/d062162bd4a50683822f74e1b763cea0/5B543695/t51.2885-19/14592180_1850795251810375_6654409392533798912_a.jpg";
        }
    }

    function getFollowerCount() {
        return $this->ig->user->edge_followed_by->count;
    }

    function getPosts(int $nbPosts) {
        $posts = $this->ig->user->edge_owner_to_timeline_media->edges;
        return array_splice($posts, 0, $nbPosts);
    }

    public function getAccountName() {
        return $this->account;
    }

    public function getName() {
        return $this->ig->user->full_name;
    }

    public function getProfilPicture() {
        return $this->ig->user->profile_pic_url_hd;
    }
}
