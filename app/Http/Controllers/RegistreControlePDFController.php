<?php

namespace App\Http\Controllers;

use App\Http\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistreControlePDFController extends Controller
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
        return view('registres.controle')->with([
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
        <h3 align="center"> Registre de Controle <h3>
        <table width = "100%" style = "border-collapse:collapse; border:0px;"
            <tr>
                <th style = "border: 1px solid; padding:6px;" width = 9.09% >Numero Dossier</th>
                <th style = "border: 1px solid; padding:6px;" width = 9.09% >Nom Requerant</th>
                <th style = "border: 1px solid; padding:6px;" width = 9.09% >Sexe</th>
                <th style = "border: 1px solid; padding:6px;" width = 9.09% >Numero MJ</th>
                <th style = "border: 1px solid; padding:6px;" width = 9.09% >Arrondissement</th>
                <th style = "border: 1px solid; padding:6px;" width = 9.09% >Lieu Dit</th>
                <th style = "border: 1px solid; padding:6px;" width = 9.09% >Nature Dosssier</th>
                <th style = "border: 1px solid; padding:6px;" width = 9.09% >Controleur 1</th>
                <th style = "border: 1px solid; padding:6px;" width = 9.09% >Date Controle 1</th>
                <th style = "border: 1px solid; padding:6px;" width = 9.09% >Controlleur 2</th>
                <th style = "border: 1px solid; padding:6px;" width = 9.09% >Date Controle 2</th>
            </tr>
        ';
        foreach($registre as $enregistrement){
            $output .='
            <tr>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->numero_dossier.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->nom_requerant.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->sexe_requerant.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->numero_mj.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->arrondissement.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->lieu_dit.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->nature_dossier.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->controlleur_1.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->date_controle_1.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->controlleur_2.'</td>
                <td style = "border: 1px solid; padding:6px;">'.$enregistrement->date_controle_2.'</td>
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
