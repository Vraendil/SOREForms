<?php

namespace App\Controller;


use App\Entity\Agregat\AgregatCarriereSaisiePelle;
use App\Entity\Agregat\CarriereSaisieDebit;
use App\Form\Agregat\AgregatCarriereProductionChargeuseType;
use App\Form\Agregat\AgregatCarriereProductionMobileType;
use App\Form\Agregat\AgregatCarriereProductionPelleType;
use App\Form\Agregat\AgregatConcassageProductionChargeuseType;
use App\Form\Agregat\AgregatConcassageProductionPelleType;
use App\Form\Agregat\CarriereSaisieDebitType;
use App\Form\Agregat\CarriereSaisiePelleType;
use App\Repository\Agregat\AgregatCarriereProductionChargeuseRepository;
use App\Repository\Agregat\AgregatCarriereProductionMobileRepository;
use App\Repository\Agregat\AgregatCarriereProductionPelleRepository;
use App\Repository\Agregat\AgregatConcassageProductionChargeuseRepository;
use App\Repository\Agregat\AgregatConcassageProductionPelleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AgregatController extends AbstractController
{
    // #[Route('/agregat', name: 'app_agregat')]
    // public function index(): Response
    // {
    //     return $this->render('agregat/index.html.twig', [
    //         'controller_name' => 'AgregatController',
    //     ]);
    // }

    //CARRIERE
    #[Route('/agregat/carriere/production/pelle', name: 'app_agregat_carriere_production_pelle')]
    public function carriereProductionPelle(Request $request, AgregatCarriereProductionPelleRepository $repository): Response
    {
        $url = $request->getUri();
        $entity = $repository->findLastActive();

        $form = $this->createForm(AgregatCarriereProductionPelleType::class, $entity, [
            'disable_fields' => $entity !== null
        ]);

        return $this->render('production/simple_select.html.twig', [
            'label' => "Production Pelle Carriere",
            "url" => $url,
            "form" => $form->createView(),
        ]);
    }


    #[Route('/agregat/carriere/production/pelle/end', name: 'app_agregat_carriere_production_pelle_end', methods: ['POST'])]
    public function endCarriereProductionPellearriereProductionPelle(Request $request, AgregatCarriereProductionPelleRepository $repository): Response
    {
        $id = $request->query->get('id');

        $repository->endProduction($id);

        return $this->redirectToRoute('app_agregat_carriere_production_pelle');
    }

    #[Route('/agregat/carriere/production/pelle/start', name: 'app_agregat_carriere_production_pelle_start', methods: ['POST'])]
    public function startCarriereProductionPelle(Request $request, AgregatCarriereProductionPelleRepository $repository): Response
    {
        // Retrieve the raw JSON content from the request
        $jsonContent = $request->getContent();

        // Decode the JSON content to an associative array
        $data = json_decode($jsonContent, true);

        // Access the 'mode' variable from the decoded array
        $mode = $data['mode'] ?? null;

        // Start production with the mode retrieved from the request
        $repository->startProduction($mode);

        // Redirect to another route after processing
        return $this->redirectToRoute('app_agregat_carriere_production_pelle');
    }

    #[Route('/agregat/carriere/production/mobile', name: 'app_agregat_carriere_production_mobile')]
    public function carriereProductionMobile(Request $request, AgregatCarriereProductionMobileRepository $repository): Response
    {
        $url = $request->getUri();
        $entity = $repository->findLastActive();

        $form = $this->createForm(AgregatCarriereProductionMobileType::class, $entity, [
            'disable_fields' => $entity !== null
        ]);

        return $this->render('production/triple_select.html.twig', [
            'label' => "Production Pelle Carriere",
            "url" => $url,
            "form" => $form->createView(),
        ]);
    }

    #[Route('/agregat/carriere/production/mobile/end', name: 'app_agregat_carriere_production_mobile_end')]
    public function endCarriereProductionMobile(Request $request, AgregatCarriereProductionMobileRepository $repository): Response
    {
        $id = $request->query->get('id');

        $repository->endProduction($id);

        return $this->redirectToRoute('app_agregat_carriere_production_mobile');
    }



    #[Route('/agregat/carriere/production/mobile/start', name: 'app_agregat_carriere_production_mobile_start')]
    public function startCarriereProductionMobile(Request $request, AgregatCarriereProductionMobileRepository $repository): Response
    {
        // Retrieve the raw JSON content from the request
        $jsonContent = $request->getContent();

        // Decode the JSON content to an associative array
        $data = json_decode($jsonContent, true);

        // Access the 'mode' variable from the decoded array
        $etage1 = $data['etage1'] ?? null;
        $etage2 = $data['etage2'] ?? null;
        $etage3 = $data['etage3'] ?? null;

        // Start production with the mode retrieved from the request
        $repository->startProduction($etage1, $etage2, $etage3);

        // Redirect to another route after processing
        return $this->redirectToRoute('app_agregat_carriere_production_mobile');
    }

    #[Route('/agregat/carriere/production/chargeuse', name: 'app_agregat_carriere_production_chargeuse')]
    public function carriereProductionChargeuse(Request $request, AgregatCarriereProductionChargeuseRepository $repository): Response
    {
        $url = $request->getUri();
        $entity = $repository->findLastActive();

        $form = $this->createForm(AgregatCarriereProductionChargeuseType::class, $entity, [
            'disable_fields' => $entity !== null
        ]);

        return $this->render('production/simple_select.html.twig', [
            'label' => "Production Pelle Concassage",
            "url" => $url,
            "form" => $form->createView(),
        ]);
    }

    #[Route('/agregat/carriere/production/chargeuse/end', name: 'app_agregat_carriere_production_chargeuse_end')]
    public function endCarriereProductionChargeuse(Request $request, AgregatCarriereProductionChargeuseRepository $repository): Response
    {
        $id = $request->query->get('id');

        $repository->endProduction($id);

        return $this->redirectToRoute('app_agregat_carriere_production_chargeuse');
    }

    #[Route('/agregat/carriere/production/chargeuse/start', name: 'app_agregat_carriere_production_chargeuse_start')]
    public function startCarriereProductionChargeuse(Request $request, AgregatCarriereProductionChargeuseRepository $repository): Response
    {
        // Retrieve the raw JSON content from the request
        $jsonContent = $request->getContent();

        // Decode the JSON content to an associative array
        $data = json_decode($jsonContent, true);

        // Access the 'mode' variable from the decoded array
        $mode = $data['mode'] ?? null;

        // Start production with the mode retrieved from the request
        $repository->startProduction($mode);

        // Redirect to another route after processing
        return $this->redirectToRoute('app_agregat_carriere_production_chargeuse');
    }


    #[Route('/agregat/carriere/saisie/debit' , name : 'app_agregat_carriere_saisie_debit')]
    public function agregatCarriereSaisieDebit(Request $request , EntityManagerInterface $entityManager ) : Response
    {
        $agregatCarriereSaisieDebit = new CarriereSaisieDebit();

        $agregatCarriereSaisieDebitForm = $this->createForm( CarriereSaisieDebitType::class, $agregatCarriereSaisieDebit );
        $agregatCarriereSaisieDebitForm->handleRequest($request);

        if ( $agregatCarriereSaisieDebitForm->isSubmitted() && $agregatCarriereSaisieDebitForm->isValid() ) {
            $entityManager->persist($agregatCarriereSaisieDebit);
            $entityManager->flush();

            $this->addFlash('success' , 'Saisie du débit enregistrée !');
            return $this->redirectToRoute('app_agregat_carriere_saisie_debit');
        } else {
            return $this->render('agregat/CarriereSaisieDebit.html.twig' , [ 'agregatCarriereSaisieDebitForm' => $agregatCarriereSaisieDebitForm->createView()]);
        }
    }


    #[Route('/agregat/carriere/saisie/pelle' , name : 'app_agregat_carriere_saisie_pelle ')]
    public function agregatCarriereSaisiePelle( Request $request , EntityManagerInterface $entityManager ) : Response
    {
       $agregatCarriereSaisiePelle = new AgregatCarriereSaisiePelle();

       $agregatCarriereSaisiePelleForm = $this->createForm( CarriereSaisiePelleType::class , $agregatCarriereSaisiePelle );
       $agregatCarriereSaisiePelleForm->handleRequest($request);

       if ( $agregatCarriereSaisiePelleForm->isSubmitted() && $agregatCarriereSaisiePelleForm->isValid() ) {
           $entityManager->persist($agregatCarriereSaisiePelle);
           $entityManager->flush();

           $this->addFlash('success' , 'Saisie de pelle ( ?? ) enregistrée !');
           return $this->redirectToRoute('app_agregat_carriere_saisie_pelle ');
       } else {
           return $this->render('agregat/CarriereSaisiePelle.html.twig' , [ 'agregatCarriereSaisiePellForm' => $agregatCarriereSaisiePelleForm->createView()]);
       }

    }

    //END CARRIERE






    //CONCASSAGE
    #[Route('/agregat/concassage/production/pelle', name: 'app_agregat_concassage_production_pelle')]
    public function concassageProductionPelle(Request $request, AgregatConcassageProductionPelleRepository $repository): Response
    {
        $url = $request->getUri();
        $entity = $repository->findLastActive();

        $form = $this->createForm(AgregatConcassageProductionPelleType::class, $entity, [
            'disable_fields' => $entity !== null
        ]);

        return $this->render('production/simple_select.html.twig', [
            'label' => "Production Pelle Concassage",
            "url" => $url,
            "form" => $form->createView(),
        ]);
    }

    #[Route('/agregat/concassage/production/pelle/end', name: 'app_agregat_concassage_production_pelle_end', methods: ['POST'])]
    public function endConcassageProductionPelle(Request $request, AgregatConcassageProductionPelleRepository $repository): Response
    {
        $id = $request->query->get('id');

        $repository->endProduction($id);

        return $this->redirectToRoute('app_agregat_concassage_production_pelle');
    }

    #[Route('/agregat/concassage/production/pelle/start', name: 'app_agregat_concassage_production_pelle_start')]
    public function startConcassageProductionPelle(Request $request, AgregatConcassageProductionPelleRepository $repository): Response
    {
        // Retrieve the raw JSON content from the request
        $jsonContent = $request->getContent();

        // Decode the JSON content to an associative array
        $data = json_decode($jsonContent, true);

        // Access the 'mode' variable from the decoded array
        $mode = $data['mode'] ?? null;

        // Start production with the mode retrieved from the request
        $repository->startProduction($mode);

        // Redirect to another route after processing
        return $this->redirectToRoute('app_agregat_concassage_production_pelle');
    }

    #[Route('/agregat/concassage/production/chargeuse', name: 'app_agregat_concassage_production_chargeuse')]
    public function concassageProductionChargeuse(Request $request, AgregatConcassageProductionChargeuseRepository $repository): Response
    {
        $url = $request->getUri();
        $entity = $repository->findLastActive();

        $form = $this->createForm(AgregatConcassageProductionChargeuseType::class, $entity, [
            'disable_fields' => $entity !== null
        ]);

        return $this->render('production/no_data.html.twig', [
            'label' => "Production Pelle Concassage",
            "url" => $url,
            "form" => $form->createView(),
        ]);
    }

    #[Route('/agregat/concassage/production/chargeuse/end', name: 'app_agregat_concassage_production_chargeuse_end', methods: ['POST'])]
    public function endConcassageProductionChargeuse(Request $request, AgregatConcassageProductionChargeuseRepository $repository): Response
    {
        $id = $request->query->get('id');

        $repository->endProduction($id);

        return $this->redirectToRoute('app_agregat_concassage_production_chargeuse');
    }

    #[Route('/agregat/concassage/production/chargeuse/start', name: 'app_agregat_concassage_production_chargeuse_start')]
    public function startConcassageProductionChargeuse(Request $request, AgregatConcassageProductionChargeuseRepository $repository): Response
    {
        // Start production 
        $repository->startProduction();

        // Redirect to another route after processing
        return $this->redirectToRoute('app_agregat_concassage_production_chargeuse');
    }






    //END CONCASSAGE
}
