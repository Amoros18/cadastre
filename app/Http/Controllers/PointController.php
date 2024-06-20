<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointRequest;
use App\Http\Services\SearchService;
use App\Models\NouveauDossier;
use App\Models\Points;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\Point\UTMPoint;
use PHPCoord\UnitOfMeasure\Length\Metre;

use function PHPUnit\Framework\isEmpty;

class PointController extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }
/* Les differentes listes
------------------------------------------------*/

    public function listIntroPoint(Request $request){
        $Listes = $this->service->searchListe($request);
        //$Listes['Listes'] = $Listes['Listes']->where('numero_visa','!=',null);
        $points = Points::all();
        foreach ($points as $point){
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier','!=',$point->numero_dossier);
        }
        return view('points.points-intro-liste',[
            'Listes'=>$Listes['Listes'],
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],
        ]);
    }

    public function listModificationPoint(Request $request){
        $table = DB::table('nouveau_dossiers');
        $table = $table->join('points','nouveau_dossiers.numero_dossier','=','points.numero_dossier')
                ->select('nouveau_dossiers.*')->groupBy('nouveau_dossiers.id');
        $Listes = $this->service->searchRejet($request,$table);
        //dd($Listes['Listes']);
        if($request->input('numero_dossier')){
            $numero_dossier = $request->input('numero_dossier');
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier', 'like',$numero_dossier);
        }

        return view('points.points-modification-liste',[
            'Listes'=>$Listes['Listes'],
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],
        ]);
    }

    public function listPoint(Request $request){  // pas encore implementer
        $table = DB::table('nouveau_dossiers');
        $table = $table->join('points','nouveau_dossiers.numero_dossier','=','points.numero_dossier')
                ->select('nouveau_dossiers.*')->groupBy('nouveau_dossiers.id');
        $Listes = $this->service->searchRejet($request,$table);
        //dd($Listes['Listes']);
        if($request->input('numero_dossier')){
            $numero_dossier = $request->input('numero_dossier');
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier', 'like',$numero_dossier);
        }

        return view('points.points-intro-liste',[
            'Listes'=>$Listes['Listes'],
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],
            'listPoint'=>1, // Permettant d'etulise la meme vue avec listIntroPoint
        ]);                
    }

    /* Les differentes fonctions de creation et d'edition
    --------------------------------------------------------*/

    public function createPoints(Request $request){
        $numero_dossier =$request->input('numero_dossier');
        //dd($numero_dossier);
        if($numero_dossier == null){
            return "une erreur s'est produite: numero de dossier null";
        }
        $table = NouveauDossier::where('numero_dossier',$numero_dossier)->first();
        $numero_dossier = $table->numero_dossier;
        $point = Points::where('numero_dossier',$numero_dossier)->first();
        if($point == null){
            $point = new Points();
        }
        return view('points.points-create',[
            'table'=>$table,
            'archive'=>$point,
            'nombre_points' =>0,
            'numero_dossier'=>$numero_dossier,
        ]);
    }

    public function create_Points(PointRequest $request){
        $i = 1;
        $numero_dossier = $request->input('numero_dossier');
        $table = NouveauDossier::where('numero_dossier','=',$numero_dossier)->first();
        $points = points::where('numero_dossier','=',$numero_dossier)->first();
        if($points != null){
            return  "Veuillez contacter l'administrateur pour modification: Point deja inscrit";
        }

        // insertion du type de points
        $type_coordonnees = $request->input('type_coordonnees');
        if($type_coordonnees != null){
            $table->type_coordonnees = $type_coordonnees;
        }

        for ($i=0; $i<100; $i++){
            $longitude = $request->input('longitude'.$i.'');
            $latitude = $request->input('latitude'.$i.'');
            if ($longitude != null && $latitude != null){
                $point = new points();
                $point->numero_dossier = $numero_dossier;
                $point->longitude = $longitude;
                $point->latitude = $latitude;
                $point->save();
            };                
        }
        $points = points::where('numero_dossier','=',$numero_dossier)->get();
        $longitude =0;
        $latitude=0;
        $i = 0;
        if($points != null){
            foreach($points as $point){
                $longitude = $longitude + $point->longitude;
                $latitude = $latitude + $point->latitude;
                $i++;
            }
            $longitude = $longitude/$i;
            $latitude = $latitude/$i;
            $latlong = $this->utm_to_latlon($longitude,$latitude,33);
            $table->longitude = $latlong->getLongitude();
            $table->latitude = $latlong->getLatitude();
            $table->save(); 
        }
        // return redirect()->route('create.points',[
        //     'numero_dossier'=>$table->numero_dossier
        //     ])->with('success',"Enregistrement effectuer avec succes");

        return redirect()->route('liste.points-intro')->with('success',"Enregistrement effectuer avec succes");

    }

    public function editPoints(Request $request){
        $numero_dossier =$request->input('numero_dossier');
        $table = NouveauDossier::where('numero_dossier','=',$numero_dossier)->first();
        $points = points::where('numero_dossier','=',$numero_dossier)->get();
        $nombres_points = $points->count();
        reset($points);
        foreach ($points as $key =>$value){
            if(strpos($key,'longitude')===1){
                dd($value . PHP_EOL);
            }
        }
        $i = 0;
 
        return view('points.points-edit',[
            'table' => $table,
            'numero_dossier'=>$table->numero_dossier,
            'points'=>$points,
            'nombre_points' =>$nombres_points,
            'modifier'=>1,
        ]);

    }

    public function edit_Points(PointRequest $request){
        $i = 1;
        $numero_dossier = $request->input('numero_dossier');
        $table = NouveauDossier::where('numero_dossier','=',$numero_dossier)->first();
        $points = points::where('numero_dossier','=',$numero_dossier)->delete();
        $points = points::where('numero_dossier','=',$numero_dossier)->first();
        if($points != null){
            return  "Veuillez contacter l'administrateur pour modification: Point deja inscrit";
        }

        // insertion du type de points
        $type_coordonnees = $request->input('type_coordonnees');
        if($type_coordonnees != null){
            $table->type_coordonnees = $type_coordonnees;
        }

        for ($i=0; $i<100; $i++){
            $longitude = $request->input('longitude'.$i.'');
            $latitude = $request->input('latitude'.$i.'');
            if ($longitude != null && $latitude != null){
                $point = new points();
                $point->numero_dossier = $numero_dossier;
                $point->longitude = $longitude;
                $point->latitude = $latitude;
                $point->save();
            };                
        }
        $points = points::where('numero_dossier','=',$numero_dossier)->get();
        $longitude =0;
        $latitude=0;
        $i = 0;
        if($points != null){
            foreach($points as $point){
                $longitude = $longitude + $point->longitude;
                $latitude = $latitude + $point->latitude;
                $i++;
            }
            $longitude = $longitude/$i;
            $latitude = $latitude/$i;
            $latlong = $this->utm_to_latlon($longitude,$latitude,33);
            $table->longitude = $latlong->getLongitude();
            $table->latitude = $latlong->getLatitude();
            $table->save(); 
        }
        return redirect()->route('edit.points',[
            'numero_dossier'=>$table->numero_dossier
            ])->with('success',"Enregistrement effectuer avec succes");        
    }
/* Fonction pour convertir les coordonnees
------------------------------------------------------------*/

    public function utm_to_latlon($easting,$northing,$zoneNumber){
        $from = new UTMPoint(
            Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84),
            new Metre($easting),
            new Metre($northing),
            $zoneNumber,
            UTMPoint::HEMISPHERE_NORTH
        );
        $to = $from->asGeographicPoint();
        return $to;
    }

/* Generation du lien google map pour dessiner le contour
----------------------------------------------*/

    public function lienGoogleMap(Request $request){
        $url ='http://google.com/maps/place/';
        $numero_dossier = $request->input('numero_dossier');
        $points = points::where('numero_dossier','=',$numero_dossier)->get();
        if($points->get(0) == null){
            return  "Les coordoonees du point non iscrit encore";
        }
        if($points != null){
            foreach($points as $point){
                $latlong = $this->utm_to_latlon($point->longitude,$point->latitude,33);
                $url .=$latlong->getLatitude().','.$latlong->getLongitude().'/'; 
            }
        }
        return redirect($url);

    }


}


