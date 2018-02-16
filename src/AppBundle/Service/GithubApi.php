<?php

namespace AppBundle\Service;

class GithubApi {
    public function fetchProfile(String $username) {
        $guzzle = new \GuzzleHttp\Client();
        $response = $guzzle->request('get', "https://api.github.com/users/$username");

        $data = json_decode($response->getBody()->getContents(), true);

        return [
            "avatar_url" => $data["avatar_url"],
            "login"      => $data["login"],
            "name"       => $data["name"],
            "details"    => [
                "company"   => $data["company"],
                "location"  => $data["location"],
                "joined_on" => $data["created_at"]
            ],
            "blog"        => $data["blog"],
            "social_data" => [
                "Public repos" => $data["public_repos"],
                "Followers"    => $data["followers"],
                "Following"    => $data["following"],
            ]
        ];
    }
}