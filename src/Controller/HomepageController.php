<?php
/**
 * Created by PhpStorm.
 * User: blavoet
 * Date: 29/11/17
 * Time: 08:58
 */

namespace App\Controller;

use App\Entity\Tournament;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class HomepageController extends AbstractController
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function index(Request $request)
    {
        $tournaments = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Tournament::class)
            ->findAll()
            ;

        return $this->render('homepage.html.twig',
        [
            'tournaments' => $tournaments,
            'message' => $request->query->get('message', 'Pas de message'),
        ]
    );
    }

}