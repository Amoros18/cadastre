<?php

namespace App\Http\Controllers;

use App\Http\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistreRejetBMJPDFController extends Controller
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
        $table =$this->service->searchFrom2Table($nature_dossier, $date_less, $date_more, $arrondissement);
        $recherche = $table->join('rejet_mjs','nouveau_dossiers.numero_dossier','=','rejet_mjs.numero_dossier')
                            ->select('nouveau_dossiers.*','rejet_mjs.*')->get();
        $registre = $recherche;
        return view('registres.rejet-mj')->with([
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
        $table =$this->service->searchFrom2Table($nature_dossier, $date_less, $date_more, $arrondissement);
        $recherche = $table->join('rejet_mjs','nouveau_dossiers.numero_dossier','=','rejet_mjs.numero_dossier')
                            ->select('nouveau_dossiers.*','rejet_mjs.*')->get();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_registre_to_html($recherche));
        $pdf->getDomPDF()->set_option("enable_php",true);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream();
    }

    function convert_registre_to_html($registre){
        $output = '
        <h3 align="center"> Registre de Rejet Mise a Jour <h3>
        <table width = "100%" style = "border-collapse:collapse; border:0px;"
            <tr>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Date Rejet</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Numero Dossier</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Etat</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >motif</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Nom Requerant</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Sexe</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Arrondissement</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Nature Dossier</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Lieu Dit</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Date Visa</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Superficie</th>
                <th style = "border: 1px solid; padding:6px;" width = 8.33% >Geometre</th>
            </tr>
        ';
        foreach($registre as $enregistrement){
            $output .='
            <tr>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->date_rejet.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->numero_dossier.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->etat.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->motif.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->nom_requerant.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->sexe_requerant.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->arrondissement.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->nature_dossier.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->lieu_dit.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->date_visa.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->superficie.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->geometre.'</td>
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
