<?php

namespace App\Http\Controllers;

use App\Http\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistreMainCourantePDFController extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }
    function index(Request $request){
        if ($request->input('nature_dossier')){
            $nature_dossier =$request->input('nature_dossier');
        }
        else{
            $nature_dossier = null;
        }
        if($request->input('date_less')){
            $date_less = $request->input('date_less');
        }
        else{
            $date_less = null;
        }
        if($request->input('date_more')){
            $date_more = $request->input('date_more');
        }
        else{
            $date_more = null;
        }
        if ($request->input('arrondissement')){
            $arrondissement = $request->input('arrondissement');
        }
        else {
            $arrondissement = null;
        }
        
        $registre = $this->service->search($nature_dossier, $date_less, $date_more, $arrondissement);
        return view('registres.main_courante')->with([
            'registre'=>$registre,
            'arrondissement'=>$arrondissement,
            'date_less'=>$date_less,
            'date_more'=>$date_more,
            'nature_dossier'=>$nature_dossier,
        ]);
    }

    function pdf(Request $request){
        if ($request->input('nature_dossier')){
            $nature_dossier =$request->input('nature_dossier');
        }
        else{
            $nature_dossier = null;
        }
        if($request->input('date_less')){
            $date_less = $request->input('date_less');
        }
        else{
            $date_less = null;
        }
        if($request->input('date_more')){
            $date_more = $request->input('date_more');
        }
        else{
            $date_more = null;
        }
        if ($request->input('arrondissement')){
            $arrondissement = $request->input('arrondissement');
        }
        else {
            $arrondissement = null;
        }
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_registre_to_html($this->service->search($nature_dossier, $date_less, $date_more, $arrondissement)));
        $pdf->getDomPDF()->set_option("enable_php",true);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream();
    }

    function convert_registre_to_html($registre){
        $output = '
        <h3 align="center"> Registre de Main Courante <h3>
        <table width = "100%" style = "border-collapse:collapse; border:0px;"
            <tr>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Numero Dossier</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Non Requerant</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Sexe</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Mise en valeur</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Message Porter</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Lieu Dit</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Avis</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Date Bornage</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Observation</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Geometre</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Numero CCP</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >S/C</th>
            </tr>
        ';
        foreach($registre as $enregistrement){
            $output .='
            <tr>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->numero_dossier.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->nom_requerant.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->sexe_requerant.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->mise_en_valeur.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->message_porter.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->lieu_dit.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->avis_main_courante.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->date_bornage.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->observation_main_courante.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->geometre.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->numero_ccp.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->s_c.'</td>
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
