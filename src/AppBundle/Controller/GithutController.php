<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/githut")
 */
class GithutController extends Controller {

    /**
     * @Route("/", name="githut")
     */
    public function githutAction(Request $request) {
        return $this->render("githut/index.html.twig", [
            "avatar_url" => "https://avatars1.githubusercontent.com/u/10879378?v=4",
            "login"      => "kayoumido",
            "name"       => "Doran Kayoumi",
            "details"    => [
                "company"   => "Evil corp",
                "location"  => "Lausanne, Switzerland",
                "joined_on" => "Joined on 6th Feb 2015"
            ],
            "blog"        => "https://doran.kayoumi.io/",
            "social_data" => [
                "Public repos" => 13,
                "Followers"    => 1,
                "Following"    => 7,
            ]
        ]);
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profilAction(Request $request) {
        return $this->render("githut/profile.html.twig");
    }
}
