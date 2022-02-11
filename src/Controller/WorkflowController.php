<?php

namespace App\Controller;

use App\Entity\Workflow;
use App\Service\BaseService;
use Symfony\Component\Mime\Email;
use App\Controller\BaseController;
use App\Repository\UserRepository;
use Symfony\Component\Mailer\MailerInterface;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WorkflowController extends BaseController
{
    private BaseService $baseService;
    private UserRepository $userRepo;
    public function __construct(UserRepository $userRepo ,BaseService $baseService)
    {
        $this->baseService = $baseService;
        $this->userRepo = $userRepo;
    }
  /**
     * @Get("/api/workflow", name="workflow")
     */
    public function sendworkflow()
    {
        $userMails= $this->userRepo->ListEmailUsers();
        foreach($userMails as $email){
            $tabMail[]=$email['email'];
        }
       // dd($tabMail);

        $user= $this->getUser();
        $data = array(
            'to'=>$user->getEmail(),
            'cc'=> ('ddiatou1@gmail.com'),
            'subject'=>'La Plateforme Suivi des Activités et de la Roadmap',
            'body'=>'Bonjour, merci de renseigner les activités de la semaine prochaine dans la plateforme de suivi des activités et de la roadmap'

        );
        $this->baseService->sendMail($data);
        return $this->json(['status'=>200, "message"=>"email envoyé avec succées"]);
    }
}
