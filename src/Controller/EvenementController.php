<?php

namespace App\Controller;




use App\Entity\User;
use App\Entity\Autorite;
use App\Entity\Evenement;
use App\Entity\Structure;
use App\Entity\Commentaire;
use App\Entity\Periodicite;
use App\Annotation\QMLogger;
use FOS\UserBundle\Mailer\Mailer;
use App\Controller\BaseController;
use App\Repository\UserRepository;
use App\Entity\HistoriqueEvenement;
use App\Repository\ActiviteRepository;
use App\Repository\EvenementRepository;
use App\Repository\StructureRepository;
use App\Repository\PeriodiciteRepository;
use App\Repository\TrancheHoraireRepository;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\HistoriqueEvenementRepository;
use App\Service\BaseService;
use FOS\RestBundle\Controller\Annotations\Delete;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvenementController extends BaseController
{
    private ActiviteRepository $activiteRepo;
    private UserRepository $userRepo;
    private EvenementRepository $evenementRepo;
    private StructureRepository $structureRepo;
    private PeriodiciteRepository $periodiciterepo;
    private TrancheHoraireRepository $trancheHoraireRepo;
    private HistoriqueEvenementRepository $historiqueEvenementRepo;
    private BaseService $baseService;

    public function __construct(ActiviteRepository $activiteRepo ,BaseService $baseService,UserRepository $userRepo ,EvenementRepository $evenementRepo,
                periodiciteRepository $periodiciteRepo,StructureRepository $structureRepo ,TrancheHoraireRepository $trancheHoraireRepo ,HistoriqueEvenementRepository $historiqueEvenementRepo)
    {
        $this->activiteRepo = $activiteRepo;
        $this->userRepo = $userRepo;
        $this->evenementRepo = $evenementRepo;
        $this->periodiciteRepo = $periodiciteRepo;
        $this->structureRepo = $structureRepo;
        $this->historiqueEvenementRepo = $historiqueEvenementRepo;
        $this->baseService=$baseService;

    }
    
    /**
     * @Post("/api/evenement", name="evenements")
     */
    public function addEvenement(Request $request ,ValidatorInterface $validator ,SerializerInterface $serializer): Response
    {

        $evenement = $serializer->deserialize($request->getContent(), evenement::class,'json');
        $errors = $validator->validate($evenement);
    if (count($errors) > 0)
    {
        $errorsString =$serializer->serialize($errors,"json");
        
        return new JsonResponse( $errorsString ,Response::HTTP_BAD_REQUEST,[],true);
    }
    
/*
    /*$message=(new\Swift_Message)
        ->setSubject('DCIRE, PILOTAGE PERFORMANCE')
        ->setFrom('xxxxx@orange-sonatel.com')
        ->setTo('ddiatou1@gmail.com')
        ->setBody("Votre activité est enregistré avec succé");
    $mailer->send($message);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($region);
        $entityManager->flush();
     */
    $user = $this->getUser();
    $structure= $user->getStructure();
    $start = ($request->request->get('start'));
    $evenement->setThematique($request->request->get('thematique'));
    $semaine= $this->baseService->Date2Semaine($start);
    $evenement->setSemaine($semaine);
    $evenement->setStructure($structure);
   // $structure= $this->structureRepo->find($request->get('structure'));
        $evenement->setUser($user);
       // $evenement->setStructure($structure);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($evenement);
        $entityManager->flush();
        return new JsonResponse("succes",Response::HTTP_CREATED,[],true);
      
    }

    /**
     * @Get("/api/evenement", name="evenement")
     */
    public function listEvenement(): Response
    {
        
        $evenements = $this->evenementRepo->findAll();
        $response = $this->json($evenements, 200, [], ['groups' => 'evenement:read']);

        return $response; 
    }
      /**
     * @Get("/api/evenement/{id}")
     * @QMLogger(message="Details evenement")
     */
    public function detailsEvenement($id){
        $evenements = $this->evenementRepo->find($id);
        //dd($evenements);
        $data['thematique'] =$evenements->getThematique();
        $data["start"]= $evenements->getStart()->format("Y-m-d");
        //$data["end"]= $evenements->getEnd()->format("Y-m-d");
        //$data["start"]= $evenements->getStart()?$evenements->getStart()->format("Y-m-d"): null;
        $data["end"]= $evenements->getEnd()?$evenements->getEnd()->format("Y-m-d"): null;
       return $this->json($data, 200, [], ['groups' => 'evenement:detail']);
    }
    
    /**
     * @Get("/api/rechercheevenement")
     * @QMLogger(message="Recherche evenement")
     */
    public function recherchErevenement(Request $request){
        $search=$request->query->get('structure');
        $search=$request->query->get('user');
        $search=$request->query->get('profil');
        return new JsonResponse($this->evenementManager->searchEvenement($search));
    }

    /**
    * @Delete("/api/evenement/{id}", name="delete_evenement")
    */
    public function deleteEvenement(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $evenement = $entityManager->getRepository(Evenement::class)->find($id);
        $entityManager->remove($evenement);
        $entityManager->flush();

        return $this->json(['status'=>200, "message"=>"événement effacé avec succes"]);  
    }
 /**
     * @Put("/api/evenement/{id}")
     * @QMLogger(message="modifier evenement")
     */
    public function modifiEvenement($id, Evenement $evenement, Request $request)
    {
        $evenement = $this->evenementRepo->find($id);
        $user = $this->getUser();
    $structure= $user->getStructure();
    $start = ($request->request->get('start'));
    $evenement->setThematique($request->request->get('thematique'));
    $semaine= $this->baseService->Date2Semaine($start);
    $evenement->setSemaine($semaine);
    $evenement->setStructure($structure);
   // $structure= $this->structureRepo->find($request->get('structure'));
        $evenement->setUser($user);
       // $evenement->setStructure($structure);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($evenement);
        $entityManager->flush();

        return $this->json(['status'=>200, "message"=>"Evenement modifie avec succes"]);

}


    /**
     * @Get("/api/agenda/evenement", name="agenda-evenement")
     */
    public function AgendaEvenement(): Response
    {
        #$evenementJson=file_get_contents("https://server/reportserver/ReportService2010.asmx?wsdl");
        $semaine= strftime("%W");
        $year = date("Y");
        $evenements = $this->evenementRepo->agenda($semaine, $year);
        return $this->json($evenements, 200, [], ['groups' => 'evenement:detail']);
    }

}