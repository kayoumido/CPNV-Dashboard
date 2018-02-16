<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Service\GithubApi;

/**
 * @Route("/githut")
 */
class GithutController extends Controller {

    /**
     * @Route("/{username}", name="githut", defaults={ "username": "kayoumido" })
     */
    public function githutAction(Request $request, String $username) {



        return $this->render("githut/index.html.twig", [
            "username" => $username,
            "repo_count" => 100,
            "most_stars" => 67,
            "repos" => [
                [
                    "name" => "Some dope repo",
                    "url" => "https://coderreviewvideos.com",
                    "stargazers_count" => 46,
                    "description" => "learn symfony 3!"
                ],
                [
                    "name" => "BBC",
                    "url" => "https://bbc.co.uk",
                    "stargazers_count" => 22,
                    "description" => "the bbc!"
                ],
                [
                    "name" => "google is swagg",
                    "url" => "https://google.com",
                    "stargazers_count" => 11,
                    "description" => "the web is deep"
                ],
            ],
        ]);
    }

    /**
     * @Route("/profile/{username}", name="profile")
     */
    public function profileAction(Request $request, String $username) { 

        $githubapi = $this->get(GithubApi::class);

        $profile = $githubapi->fetchProfile($username);

        return $this->render("githut/profile.html.twig", $profile);
    }
}
