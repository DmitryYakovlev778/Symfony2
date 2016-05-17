<?php

namespace AppBundle\Controller;


use AppBundle\Entity\SyncData;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SyncItemController extends SyncBagController{

    public $id;
    public $syncBag;
    public $grade;
    public $currentDate;


    /**
     * @Route("/", name="homepage")
     */

    public function indexAction()
    {

        $json = file_get_contents(__DIR__ . '/../InputFiles/input-sample4.json');

        $task = new SyncData();
        $task->setTask('');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create dataString'))
            ->getForm();
        

        return $this->render('syncitem/syncitem.html.twig', array(
            'form' => $form->createView(),
            'json' => $json
        ));

    }

    public function getFilters() {
        return array(
            'json_decode'   => new \Twig_Filter_Method($this, 'jsonDecode'),
        );
    }

    public function jsonDecode($str) {
        return json_decode($str);
    }


    public function edit(){
        $data = new SyncBagController();
        $data->create();
    }
}