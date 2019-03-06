<?php
/**
 * Created by PhpStorm.
 * User: Flo
 * Date: 06/03/2019
 * Time: 10:54
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisplayController extends AbstractController
{
    /**
     * @Route("/", name="app_list")
     */
    public function list()
    {
        return $this->render('Display/list.html.twig');
    }

    /**
     * @Route("/repository/{slug}", name="display_show")
     */
    public function show($slug)
    {
        return $this->render('display/show.html.twig', [
                'title' => ucwords(str_replace('-', ' ', $slug)),
            ]);
    }


}