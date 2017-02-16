<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Projets;

class ProjectController extends Controller
{

    /**
     * @Route("/admin/projet", name="admin.project")
     */
    public function projectAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $projets = $em->getRepository('AppBundle:Projets')->findAll();

        return $this->render('admin/project/index.html.twig', [
            'projets' => $projets,
        ]);
    }

    /**
     * @Route("/admin/projet/add", name="admin.project.add")
     */
    public function addProjectAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $projet = new Projets();

        $projet->setCategorie('Site démo');
        $projet->setDescription('Site ecommerce fait en POO');
        $projet->setNom('Big Burger');

        $em->persist($projet);
        $em->flush();


        return $this->render('admin/project/addProject.html.twig');
    }



}
