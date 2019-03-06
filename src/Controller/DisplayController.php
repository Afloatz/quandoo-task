<?php
/**
 * Created by PhpStorm.
 * User: Flo
 * Date: 06/03/2019
 * Time: 10:54
 */

namespace App\Controller;


use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class DisplayController extends AbstractController
{
    /**
     * @Route("/", name="app_list")
     */
    public function list()
    {
        try {
            $client = new Client();
            $response = $client->get('https://api.github.com/orgs/quandoo/repos', ['verify' => false]);
            $contents = json_decode($response->getBody()->getContents());
        } catch (\Exception $exception) {
            throw new NotFoundHttpException();
        }

        return $this->render('Display/list.html.twig', [
            'contents' => $contents
        ]);
    }

    /**
     * @Route("/repository/{name}", name="display_show")
     */
    public function show($name)
    {
        try {
            $client = new Client();
            $response = $client->get('https://api.github.com/repos/quandoo/'.$name, ['verify' => false]);
            $content = json_decode($response->getBody()->getContents());
        } catch (\Exception $exception) {
            throw new NotFoundHttpException();
        }


        return $this->render('display/show.html.twig', [
                'content' => $content
            ]);
    }


}