<?php

namespace App\Controller;

use App\Entity\Attachment;
use App\File\FileHandlerInterface;
use App\File\FileProcessor;
use App\Form\Type\ResumeUploadType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ResumeController extends AbstractController
{
    #[Route('/resume', name: 'app_resume')]
    public function index(Request $request, FileProcessor $processor): Response
    {
        $attachment = new Attachment();
        $form = $this->createForm(ResumeUploadType::class, $attachment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('attachment')->getData();
            $processor->processFile($file);

            return $this->redirectToRoute('app_resume');
        }

        return $this->render('resume/index.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/download', name: 'app_dowload')]
    public function download(Request $request, FileHandlerInterface $handler): Response
    {
        $content = $handler->download('tire.png');
        $disposition = HeaderUtils::makeDisposition(
            HeaderUtils::DISPOSITION_ATTACHMENT,
            'tire.png'
        );
        $response = new Response($content);
        $response->headers->set('Content-Disposition', $disposition);

        return $response;
    }
}
