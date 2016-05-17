<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class SyncBagController extends Controller {

    public $id;
    public $source;
    public $syncItems;

    
    public function indexAction()
    {
        return new Response('return JSON format');
    }
    
    public function create(){
        echo "Create!";
    }

}
