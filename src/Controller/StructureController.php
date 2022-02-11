<?php

namespace App\Controller;



use App\Entity\User;
use App\Entity\Structure;
use App\Annotation\QMLogger;
use App\Controller\BaseController;
use App\Repository\StructureRepository;
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

class StructureController extends BaseController
{
    private StructureRepository $structureRepo;

    public function __construct(StructureRepository $structureRepo)
    {
        $this->structureRepo = $structureRepo;
        $user= new User;
    }
    /**
     * @Post("/api/structure", name="structures")
     * 
     */
    public function addStructure(Request $request ,ValidatorInterface $validator ,SerializerInterface $serializer): Response
    {
        $structure = $serializer->deserialize($request->getContent(), structure::class,'json');
        $errors = $validator->validate($structure);
    if (count($errors) > 0)
    {
        $errorsString =$serializer->serialize($errors,"json");
        
        return new JsonResponse( $errorsString ,Response::HTTP_BAD_REQUEST,[],true);
    }
    /*$message=(new\Swift_Message)
        ->setSubject('DCIRE, PILOTAGE PERFORMANCE')
        ->setFrom('xxxxx@orange-sonatel.com')
        ->setTo($user->getEmail())
        ->setBody("Votre structure est enregistré avec succé");
    $mailer->send($message);*/
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($structure);
        $entityManager->flush();
    
        return new JsonResponse("succes",Response::HTTP_CREATED,[],true);
       
    }

   /**
     * @Get("/api/structure", name="structure")
     */
    public function listStructure(): Response
    {
       
         $structures = $this->structureRepo->findAll();
         
         return  $this->json($structures, 200, [], ['groups' => 'structure:read']);
    }

   /**
     * @Get("/api/structure", name="structure")
     */
    public function EventStructure(): Response
    {
       
         $structures = $this->structureRepo->findAll();
         
         return  $this->json($structures, 200, [], ['groups' => 'structure:read']);
    }
      /**
     * @Get("/api/structure-event/{id}/{semaine}")
     * @QMLogger(message="Details structure")
     */
    public function StructureEvent($id, $semaine)
    {
        $structure = $this->structureRepo->find($id)->getId();
        $structures= $this->structureRepo->goToWeekEvent($structure, $semaine);
        return  $this->json($structures, 200, [], ['groups' => 'structure:show']);

    }
     /**
     * @Get("/api/structure/{id}")
     * @QMLogger(message="Details structure")
     */
    public function detailsEvent($id)
    {
        $structures = $this->structureRepo->find($id);
        return  $this->json($structures, 200, [], ['groups' => 'structure:show']);

    }

     /**
     * @Get("/api/structure-event-mois/{id}/{mois}")
     * @QMLogger(message="Details structure")
     */
    public function structurEeventMois($id, $mois)
    {
        $structure = $this->structureRepo->find($id)->getId();
        $structures= $this->structureRepo->goToMoisEvent($structure, $mois);
        return  $this->json($structures, 200, [], ['groups' => 'structure:mois']);

    }

     /**
     * @Get("/api/structure-activite/{id}/{semaine}")
     * @QMLogger(message="Details structure")
     */
    public function structureActivite($id, $semaine)
    {
        $structure = $this->structureRepo->find($id)->getId();
        $structures= $this->structureRepo->goToWeek($structure, $semaine);
        return  $this->json($structures, 200, [], ['groups' => 'structure:activite']);

    }

    /**
     * @Get("/api/structure-diff/{id}/{semaine}")
     * @QMLogger(message="Details structure")
     */
    public function structurediff($id, $semaine)
    {
        $structure = $this->structureRepo->find($id)->getId();
        $structures= $this->structureRepo->goToWeekDiff($structure, $semaine);
        return  $this->json($structures, 200, [], ['groups' => 'structure:diff']);

    }

    
    /**
    * @Delete("/api/delete-structure/{id}", name="delete_structure")
    */
    public function deleteStructure(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $structure = $entityManager->getRepository(structure::class)->find($id);
        $entityManager->remove($structure);
        $entityManager->flush();

    return $this->redirectToRoute("structures");
    }

      /**
     * @Put("/api/structure/{id}")
     * @QMLogger(message="modifier structure")
     */
    public function modifiStructure($id, Request $request){
        $structure = $this->structureRepo->find($id);
        $structure->setlibelle($request->request->get('libelle'));
        $structure->setcolor($request->request->get('color'));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($structure);
            $entityManager->flush();

            return $this->json(['status'=>200, "message"=>"structure modifie avec succes"]);

    }
}

