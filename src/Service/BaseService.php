<?php

namespace App\Service;
use Swift;
use DateTime;
use Swift_Mailer;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use Symfony\Component\Mime\Message;
use Symfony\Component\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class BaseService
{
    private $mailer;
    protected $em;
    protected $interimaireMapping;
    protected $tokenStorage;
    protected $cc=array('ddiatou1@gmail.com','vieva03@gmail.com');
    
    public function __construct(MailerInterface $mailer, EntityManagerInterface $em,TokenStorageInterface $tokenStorage)
    {
       //$this->mailer=$mailer;
        $this->em = $em;
        $this->tokenStorage = $tokenStorage;
        $this->mailer= $mailer;
    }

    public function sendMail($data)
    {
       
            $email= (new Email())
                ->from('diadiadev03@gmail.com')
                ->to($data['to'])
                ->subject('LA PLATEFORME DE LA DIGITALISATION DE LA ROADMAP ')
                ->html($data['body']);
                if(isset($data['cc'])){
                    $email->cc($data['cc']);
                }
    
            $this->mailer->send($email);
    
  
    }
    
    public function Date2Semaine($date=null)
    { 
        if(!$date){
            $date_test= new \DateTime();
        }else{
            $date_test= $date;
        }
        //dd($date_test->format("W"));
        return $date_test->format("W");
    }

    public function Date2Mois($date=null)
    { 
        if(!$date){
            $date_test= new \DateTime();
        }else{
            $date_test= $date;
        }
        //dd($date_test->format("W"));
        return $date_test->format("m");
    }

}