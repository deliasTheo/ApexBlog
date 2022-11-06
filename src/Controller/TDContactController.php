<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class TDContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            //$entityManager = $this->getDoctrine()->getManager();
           // $entityManager->persist($contact);
            //$entityManager->flush();

            $contactFormData = $form->getData();
            $this->addFlash('success', 'Vore message a été envoyé');
            $message = (new \Swift_Message('Hello'))
                ->setFrom($contact->getEmail())
                ->setTo('t.delias22@gmail.com')
                ->setReplyTo($contact->getEmail())
                ->setBody($this->renderView('td_contact/contact.html.twig', [
                    'contact' => $contact,
                ]));
            $mailer->send($message);

            return $this->redirectToRoute('contact');
        }
        return $this->render('td_contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
