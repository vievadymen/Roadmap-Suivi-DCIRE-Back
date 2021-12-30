<?php

namespace App\Model;

use App\Entity\Profil;
use App\Entity\User;
use App\Mapping\UserMapping;
use App\Service\BaseService;
use App\Service\ConnectedUserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserManager extends BaseManager
{
    private $userMapping;
    private $historiqueActionMapping;
    private $tokenStorage;
    public function __construct(TokenStorageInterface $tokenStorage,UserMapping $userMapping,BaseService $baseService, \Swift_Mailer $mailer, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em)
    {
        parent::__construct($baseService, $mailer, $serializer, $validator, $em);
        $this->userMapping=$userMapping;
        $this->tokenStorage=$tokenStorage;
    }

    public function addUser($userData)
    {
        $userData['profile'] = isset($userData['profilId']) ?$this->em->getRepository(Profil::class)->find($userData['profilId']): null;
        $allDataUser=$this->userMapping->createUser($userData);
        $user = $allDataUser['user'];
        $userData['profile']?$user->addRole("ROLE_". $userData['profile']->getLibelle()):'';
        $errors = $this->validator->validate($user);
        if ($errors->count()>0){
            $err = json_decode( $this->serializer->serialize($errors, 'json'),true);
            return array("code"=>500,"status"=>false,"message"=>$err['detail']);
        }
        $this->em->persist($user);
        /* $data = array(
            'to' => $user->getEmail(),
            'cc'=>array('mamekhady.diakhate@orange-sonatel.com','genevievesébiasylvie.mendy@orange-sonatel.com'),
            'subject' => 'Données de connexion à la plateforme suivi des activités et road map',
            'body' => 'Bonjour '.$user->getPrenom().' '.$user->getNom().',
            <br><br>Merci de recevoir vos données d\'autentification à la plateforme suivi des activités et road map qui vous permettront de vous connecter !'. '<br>
            <strong>Email: </strong>' . $user->getEmail() . ' <br><strong>Password: </strong>' .  $allDataUser['password'].'<br><br><br><strong>Cordialement !</strong>'
        );
        $this->baseService->sendMail($data);*/
        $this->em->flush();
        return array($this->SUCCESS_KEY => true, $this->CODE_KEY => 201,  $this->MESSAGE_KEY => 'Utilisateur créé avec succes!');
    }

    public function updateUser($id, $userData)
    {
        $userToUpdate =$this->em->getRepository(User::class)->find($id);
     isset($userData['profilId'])?$userData['profile']=$this->em->getRepository(Profil::class)->find($userData['profilId']):'';

        if (!$userToUpdate) {
            return array($this->SUCCESS_KEY => false, $this->CODE_KEY => 500, $this->DATA_KEY => array($this->MESSAGE_KEY => 'Utilisateur inexistant!'));
        }
        $user = $this->userMapping->updateUser($userData, $userToUpdate);
        $errors = $this->validator->validate($user);
        if ($errors->count()>0){
            $err = json_decode( $this->serializer->serialize($errors, 'json'),true);
            return array("code"=>500,"status"=>false,"message"=>$err['detail']);
        }
        $this->em->persist($user);
       $this->em->flush();
        return array($this->SUCCESS_KEY => true, $this->CODE_KEY => 200, $this->MESSAGE_KEY=>"Utilisateur modifié avec succes");
    }

    public function listUsers($page,$limit)
    {
        $users =$this->em->getRepository(User::class)->listUsers($page,$limit);
        if (sizeof($users)==0){
            return array($this->SUCCESS_KEY => false, $this->CODE_KEY => 500, $this->MESSAGE_KEY=>"Aucun utilisateur");
        }
        $totalItems=$this->em->getRepository(User::class)->countUsers();
        return  array($this->SUCCESS_KEY => true, $this->CODE_KEY => 200, "total"=>$totalItems,"data"=>$users);
    }

    public function detailsUser($id)
    {
        $user=$this->em->getRepository(User::class)->find($id);
        return $this->userMapping->detailsUser($user);
    }

    public function enabledUser($action, $id)
    {
        $user = $this->em->getRepository(User::class)->find($id);
        if (!$user) {
            return array($this->SUCCESS_KEY => false, $this->CODE_KEY => 500, $this->DATA_KEY => array($this->MESSAGE_KEY => 'Utilisateur inexistant!'));
        }
        $data = $this->userMapping->enabledUser($action['action'], $user);
        $this->em->flush();
        return $data;
    }

    public function searchUser($search)
    {
        $user = $this->em->getRepository(User::class)->searchUser($search);
         if (!$user) {
            return array($this->SUCCESS_KEY => false, $this->CODE_KEY => 500,  $this->MESSAGE_KEY => 'Utilisateur inexistant!');
        }
        return array($this->SUCCESS_KEY => true, $this->CODE_KEY => 200, $this->DATA_KEY => $user[0]);
    }

    public function listEmailUsers()
    {
        $user = $this->em->getRepository(User::class)->listEmailUsers();
         if (!$user) {
            return array($this->SUCCESS_KEY => false, $this->CODE_KEY => 500,  $this->MESSAGE_KEY => 'Utilisateurs inexistant!');
        }
        return array($this->SUCCESS_KEY => true, $this->CODE_KEY => 200, $this->DATA_KEY => $user);
    }

}
