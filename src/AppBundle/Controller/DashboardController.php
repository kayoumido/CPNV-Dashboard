<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Service\FacebookApi;
use AppBundle\Service\TwitterApi;
use AppBundle\Service\InstagramApi;

final class DashboardController extends Controller {
    private $apiconfig;
    
    function __construct(array $apiconfig) {
        $this->apiconfig = $apiconfig;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {

        // get data from socialmedia
        $fb = new FacebookApi($this->apiconfig['facebook']);
        $tw = new TwitterApi($this->apiconfig['twitter']);
        $ig = new InstagramApi($this->apiconfig['instagram']);

        return $this->render('dashboard/index.html.twig', [
            'facebook'  => $fb,
            'twitter'   => $tw,
            'instagram' => $ig
        ]);
    }
}
