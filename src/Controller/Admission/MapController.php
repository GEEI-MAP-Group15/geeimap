<?php

namespace App\Controller\Admission;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Geocoder\Query\GeocodeQuery;
use Geocoder\Query\ReverseQuery;
use App\Repository\BackgroundRepository;
use App\Entity\Background;
use Doctrine\ORM\EntityManagerInterface;

class MapController extends AbstractController
{


    /**
     * @Route("/admission/map", name="map")
     */
    public function index(BackgroundRepository $backgroundRepository)
    {
        
    	$citys = $backgroundRepository->findCity();
    	dump($citys);
    	#$httpClient = new \Http\Adapter\Guzzle6\Client();
		#$provider = new \Geocoder\Provider\GoogleMaps\GoogleMaps($httpClient, null, 'AIzaSyAZowszml3xX0HWk1wZg1MOVEpb2Te_PVU');
		#$geocoder = new \Geocoder\StatefulGeocoder($provider, 'en');
		#$result = $geocoder->geocodeQuery(GeocodeQuery::create('Buckingham Palace, London'));
		#$result = $geocoder->reverseQuery(ReverseQuery::fromCoordinates(...));
		#dump($result);
		#$test = json_encode($result);


        return $this->render('admission/map/map.html.twig', [
            'controller_name' => 'MapController',
            'citys' => $citys
        ]);
    }
}