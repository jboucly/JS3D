<?php

namespace App\Controller;

use App\Form\ImgType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class Img360Controller extends AbstractController
{
    /**
     * @Route("/imgForm", name="imgForm")
     */
    public function imgForm(Request $request)
    {
        $form = $this->createForm(ImgType::class, [], [
            'attr' => array(
                'request' => $request,
            ),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form['img']->getData();
            $fileName = date('dmYgi') . '.' . $file->guessExtension();   
            try {
                $file->move('./img/', $fileName);
            } catch (FileException $e) {
                dump($e);
                exit;
            }
            return $this->redirect('img?fileName=' . $fileName);
        }
        return $this->render('img360/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/img", name="img")
     */
    public function img(Request $request)
    {   
        $fileName = $request->query->get('fileName');
        return $this->render('img360/360.html.twig', [
            'img' => $fileName
        ]);
    }
}
