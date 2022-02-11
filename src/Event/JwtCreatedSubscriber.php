<?php


namespace App\Event;

use App\Repository\StructureRepository;
use App\Repository\UserRepository;
use App\Repository\UtilisateurRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JwtCreatedSubscriber
{
    /**
     * @var UserRepository
     */
    private UserRepository $user;
    private StructureRepository $structure;

    public function __construct(UserRepository $user, StructureRepository $structure){
        $this->user = $user;
        $this->structure = $structure;
    }
    public function updateJwtData(JWTCreatedEvent $event)
    {

        // On enrichit le data du Token
        $data = $event->getData();
        $res = $this->user->findBy(['username'=>$data['username']]);
        $data['nom'] =$res[0]->getPrenom().' '.$res[0]->getNom();
        $data['status'] =$res[0]->getStatus();
        $data['email'] = $res[0]->getEmail();
        $data['username'] = $res[0]->getUsername();


        $data['id'] =  $res[0]->getId();
        $data['structure'] =  $res[0]->getStructure()->getLibelle();

        $event->setData($data);
    }
}