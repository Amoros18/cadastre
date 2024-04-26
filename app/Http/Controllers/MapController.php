<?php

namespace App\Http\Controllers;

use App\Models\NouveauDossier;
use Illuminate\Http\Request;
use App\Models\Points;

class MapController extends Controller
{
    private PointController $service;

    public function __construct(PointController $service)
    {
        $this->service = $service;
    }


    function geoJson ($locales) 
    {
        $original_data = $locales;
        //$original_data = json_decode($locales, true);
        $features = array();
        //dd($original_data);

        foreach($original_data as $key => $value) {
            $coordinates[] = array((float)$value['latitude'],(float)$value['longitude']);
        }
        foreach($original_data as $key => $value) {
        $features[] = array(
                'position' => array('lat' => (float)$value['latitude'],'lng' => (float)$value['longitude']),
                'draggable' => false,
                );
            }
        $taille = count($features);
        $features[$taille-1]['draggable']=true;
        $features[0]['draggable']=true;

        $response =[
            'coordonates_json'=>$coordinates,
            'coordonates'=>$features
        ];
        //dd($response);
        return $response;

    }

    public function mapView(Request $request){
        $numero_dossier = $request->input('numero_dossier');
        $dossier = NouveauDossier::where('numero_dossier','=',$numero_dossier)->first();
        $points = Points::where('numero_dossier','=',  $numero_dossier)
            ->get();
        // verification des points
        if($points->first()==null){
            return "coordonnees de points non inscrit";
        }
        // Conversion des coordonnees
        foreach ($points as $point){
            $latlong = $this->service->utm_to_latlon($point->longitude,$point->latitude,33);
            $point->longitude = $latlong->getLongitude()->getValue();
            $point->latitude = $latlong->getLatitude()->getValue();    
        }
        $points = $this->geoJson($points);
        $point_json = $points['coordonates_json'];
        $initialMarkers = $points['coordonates'];
        //dd($initialMarkers);
        return view('map-teste',[
            'initialMarkers'=>$initialMarkers,
            'points'=>$point_json,
            'dossier'=>$dossier,
        ]);
    }
}
