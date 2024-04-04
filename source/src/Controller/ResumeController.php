<?php

namespace App\Controller;

use App\Entity\Attachment;
use App\File\Downloader\FileDownloaderInterface;
use App\File\Uploader\FileUploaderInterface;
use App\Form\Type\ResumeUploadType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ResumeController extends AbstractController
{
    #[Route('/resume', name: 'app_resume')]
    public function index(Request $request, FileUploaderInterface $uploader, FileDownloaderInterface $downloader): Response
    {
        $attachment = new Attachment();
        $form = $this->createForm(ResumeUploadType::class, $attachment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('attachment')->getData();
            $uploader->upload($file);

            return $this->redirectToRoute('app_resume');
        }

        return $this->render('resume/index.html.twig', [
            'form' => $form,
        ]);
    }
}
