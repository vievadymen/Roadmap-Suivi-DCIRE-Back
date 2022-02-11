<?php

namespace App\Controller;




use DateTime;
use App\Entity\User;
use App\Entity\Activite;
use PHPJasper\PHPJasper;
use App\Entity\Evenement;
use App\Entity\Structure;
use App\Entity\Difficulte;
use App\Entity\Periodicite;
use App\Annotation\QMLogger;
use App\Service\BaseService;
use FOS\UserBundle\Mailer\Mailer;
use App\Controller\BaseController;
use App\Repository\UserRepository;
use App\Repository\ActiviteRepository;
use App\Repository\StructureRepository;
use App\Repository\TypeServiceRepository;
use App\Repository\TrancheHoraireRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations\Delete;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class ActiviteController extends BaseController
{
    private ActiviteRepository $activiteRepo;
    private UserRepository $userRepo;
    private StructureRepository $structurerepo;
    private TrancheHoraireRepository $trancheHoraireRepo;
    private SerializerInterface $serializer;
    private BaseService $baseService;

    public function __construct (ActiviteRepository $activiteRepo  ,BaseService $baseService,UserRepository $userRepo ,
                StructureRepository $structureRepo ,TrancheHoraireRepository $trancheHoraireRepo,TypeServiceRepository $serviceRepository)
    {
        $this->activiteRepo = $activiteRepo;
        $this->userRepo = $userRepo;
        $this->structureRepo = $structureRepo;
        $this->trancheHoraireRepo = $trancheHoraireRepo;
        $this->serializer = new Serializer();
        $this->serviceRepository= $serviceRepository;
        $this->baseService=$baseService;



    }
    /**
     * @Post("/api/activite", name="activites")
     */
    public function addActivite(Request $request ,ValidatorInterface $validator ,SerializerInterface $serializer): Response
    {

        $activite = $serializer->deserialize($request->getContent(), Activite::class,'json');
        $errors = $validator->validate($activite);
    if (count($errors) > 0)
    {
        $errorsString =$serializer->serialize($errors,"json");
        
        return new JsonResponse( $errorsString ,Response::HTTP_BAD_REQUEST,[],true);
    }
   // $user= $this->userRepo->find($request->get('user'));
    $user = $this->getUser();
    $structure= $user->getStructure();
    $date= $activite->getdate();
    $activite->setLibelle($request->request->get('libelle'));
   // $activite->setDate(new \DateTime($date));
    $semaine= $this->baseService->Date2Semaine($date);
    $activite->setSemaine($semaine);
        $activite->setUser($user);
        $activite->setStructure($structure);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($activite);
       
        $entityManager->flush();
        return new JsonResponse("succes",Response::HTTP_CREATED,[],true);
      
    }

      /**
     * @Get("/api/activite-mail", name="activite-mail")
     */
    public function sendworkflow()
    {
       
        $user= $this->getUser();
        $data = array(
            'to'=>$user->getEmail(),
            'cc'=>('ddiatou1@gmail.com'),
            'subject'=>'La Plateforme Suivi des Activités et de la Roadmap',
            'body'=>'Bonjour ' .$user->getPrenom() .''. $user->getNom().',
            <br><br>Merci d\'avoir renseigné le Suivi d\'activité de la semaine'. '<br>'

        );
        $this->baseService->sendMail($data);
        return $this->json(['status'=>200, "message"=>"email envoyé avec succées"]);
    }

    /**
     * @Get("/api/activite", name="activite")
     */
    public function listActivite(): Response
    {
        #$activiteJson=file_get_contents("https://server/reportserver/ReportService2010.asmx?wsdl");
        $activites = $this->activiteRepo->findAll();
         return $this->json($activites, 200, [], ['groups' => 'activite:read']);
    }
      /**
     * @Get("/api/activite/{id}")
     * @QMLogger(message="Details activite")
     */
    public function detailsactivite($id){
        $activites = $this->activiteRepo->find($id);
        $data['libelle'] =$activites->getLibelle();
        $data["date"]= $activites->getDate()->format("Y-m-d");
        $response = $this->json($data, 200, [], ['groups' => 'activite:show']);

        return $response;
        
    }
    
    /**
     * @Get("/api/rechercheactivite")
     * @QMLogger(message="Recherche activite")
     */
    public function rechercherActivite(Request $request){
        $search=$request->query->get('structure');
        $search=$request->query->get('user');
        $search=$request->query->get('profil');
        return new JsonResponse($this->activiteManager->searchactivite($search));
    }

    /**
    * @Delete("/api/activite/{id}", name="delete_activite")
    */
    public function deleteactivite(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $activite = $entityManager->getRepository(activite::class)->find($id);
        $entityManager->remove($activite);
        $entityManager->flush();

        return $this->json(['statuts'=>200, "message"=>"activite supprimer avec succes"]);
    }
       
/**
     * @Get("/api/activite/semaine/{semaine}", name="semaine_precedent")
     */
    public function semaine_precedent($semaine)
    {
       
        // recupere l'utilisateur via le token,
        $user = $this->getUser()->getId();
        //recuper les activité ayant comme semaine  $semaine_passer, et comme utilisateur l'utilisateur connecter
        $activites = $this->activiteRepo->findBy(["semaine"=>$semaine]);
        /*$data=[];
        foreach($activites as $activite){
            dd($activite);
            if($activite->getUser() !== null){

                $data[]=$activite;
            }
        }
        dd($data);*/
        return $this->json($activites, 200, [], ['groups' => 'activite:read']);
    }


    /**
     * @Get("/api/activite/semaine/{semaine}", name="precedent-activite")
     */
    public function PrecedeActivite($semaine): Response
    {
       //recupere annee courante
       $year = date("Y");
       $activites=$this->activiteRepo->precede($semaine, $year);
       // recupere l'utilisateur via le token,
       $user = $this->getUser()->getId();
       //recuper les activité ayant comme semaine  $semaine_passer, et comme utilisateur l'utilisateur connecter
       
       return $this->json($activites, 200, [], ['groups' => 'activite:show']);
    }

   
    // /**
    //  * @Put("/api/activite/{id}")
    //  * @QMLogger(message="modifier activite")
    //  */
    // public function modifiActivite($id, Activite $activite, Request $request):Response
    // {
        
    //     $activite = $this->activiteRepo->find($id);

    //     $user= $this->userRepo->find($request->get('user_id'));
    //     $service_id= (int)$user->getTypeService()->getId();
    //     $structure_id =  $this->serviceRepository->find($service_id)->getStructure()->getId();
    //    // $date= new DateTime();
    //     $structure= $this->structureRepo->find($structure_id);
    //     $activite->setUser($user);
    //     $activite->setStructure($structure);
    //     $activite->setLibelle($request->request->get('libelle'));

    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($activite);
    //         $entityManager->flush();
        
    //     return $this->json(['status'=>200, "message"=>"activite modifie avec succes"]);
    // }
    
   /**
     * @Put("/api/activite/{id}")
     * @QMLogger(message="modifier activite")
     */
    public function modifiActivite($id, Activite $activite, Request $request):Response
    {
        
        $activite = $this->activiteRepo->find($id);
        
        $user = $this->getUser();
    $structure= $user->getStructure();
    $date= $activite->getdate();
    $activite->setLibelle($request->request->get('libelle'));
   // $activite->setDate(new \DateTime($date));
    $semaine= $this->baseService->Date2Semaine($date);
    $activite->setSemaine($semaine);
        $activite->setUser($user);
        $activite->setStructure($structure);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($activite);
        $entityManager->flush();
        
        return $this->json(['status'=>200, "message"=>"activite modifie avec succes"]);
    }
}
