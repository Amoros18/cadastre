<?php

namespace App\Http\Controllers;

use App\Http\Services\SearchService;
use Illuminate\Http\Request;

class RegistreCourrierPDFController extends Controller
{

    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }
    function index(Request $request){
        $Listes =$this->service->searchCourrier($request);

        //dd($registre);
        return view('registres.courrier')->with([
            'registre'=>$Listes['Listes'],
            'numero_correspondance'=>$Listes['numero_correspondance'],
            'expediteur'=>$Listes['expediteur'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'numero_reponse'=>$Listes['numero_reponse'],
        ]);
    }

    function pdf(Request $request){
        $recherche =$this->service->searchCourrier($request);
        $registre =$recherche['Listes'];

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_registre_to_html($registre));
        $pdf->getDomPDF()->set_option("enable_php",true);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream();
    }

    function convert_registre_to_html($registre){
        $output = '
        <h3 align="center"> Registre De Courrier <h3>
        <table width = "100%" style = "border-collapse:collapse; border:0px;"
            <tr>
                <th style = "border: 1px solid; padding:6px;" width = 10% >Date Arrive</th>
                <th style = "border: 1px solid; padding:6px;" width = 10% >Date Correspondance</th>
                <th style = "border: 1px solid; padding:6px;" width = 20% >Numero Correspondance</th>
                <th style = "border: 1px solid; padding:6px;" width = 20% >Expediteur</th>
                <th style = "border: 1px solid; padding:6px;" width = 20% >Objet</th>
                <th style = "border: 1px solid; padding:6px;" width = 20% >Numero Reponse</th>
            </tr>
        ';
        foreach($registre as $enregistrement){
            $output .='
            <tr>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->date_arrive.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->date_correspondance.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->numero_correspondance.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->expediteur.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->objet.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->numero_reponse.'</td>
            </tr>
            ';
        }
        $output.= '</table>';
        $output.= '<script type = "text/php">
        if(isset($pdf)){
            $text = "Page:{PAGE_NUM}/{PAGE_COUNT}";
            $size = 10;
            $fond = $fontMetrics->getFont("verdana");
            $width = $fontMetrics->get_text_width($text,$fond,$size)/2;
            $x=($pdf->get_width()-$width)/2;
            $y=$pdf->get_height()-35;
            $pdf->page_text($x,$y,$text,$fond,$size);
        }
        </script>';
        return $output;
    }



}
