<?php declare(strict_types=1);

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Service\FacebookApi;

final class DashboardController extends Controller
{
    private $apiconfig;
    
    function __construct(array $apiconfig) {
        $this->apiconfig = $apiconfig;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('dashboard/index.html.twig');
    }
}
