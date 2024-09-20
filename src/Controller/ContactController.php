<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $interface) : Response
    {
        $contact = new Contact();
        $formContact = $this->createForm(ContactType::class, $contact);
        $formContact->handleRequest($request);
        if($formContact->isSubmitted() && $formContact->isValid())
        {
            $this->sendEmail($interface, $contact);
            $this->addFlash('succes', "Message envoyé avec succès.");
            return $this->redirectToRoute('contact');
        }
        return $this->render('pages/contact.html.twig', ['contact' => $contact, 'formcontact' => $formContact->createView()]);
    }
    public function sendEmail(MailerInterface $mailerInterface, Contact $contact)
    {
        $email = (new Email())
            ->from($contact->getEmail())
            ->to('sysadmin@debian') //nom de domaine local uniquement
            ->subject('Message du site de voyage')
            ->html($this->renderView('pages/_email.html.twig', ['contact' => $contact]), 'utf8') 
        ;
        $mailerInterface->send($email);
    }
}