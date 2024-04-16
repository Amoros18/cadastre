<?PHP

namespace App\Http\Services;

use App\Models\Archivage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchService
{
    public function search($nature_dossier, $date_less, $date_more, $arrondissement) // pour les registres simples
    {
        $table = DB::table('nouveau_dossiers');
        
        if ($nature_dossier != null){
            $table = $table->where('nature_dossier', 'like', '%'.$nature_dossier.'%');
        }
        if ($date_less != null){
            $table = $table->where('date_ouverture','<=', $date_less);
        }
        if ($date_more != null){
            $table = $table->where('date_ouverture','>=',$date_more);
        }
        if ($arrondissement != null){
            $table = $table->where('arrondissement',$arrondissement);
        }
        $table = $table->get();
        return $table;
    }
    public function searchFrom2Table($nature_dossier, $date_less, $date_more, $arrondissement) // pour les registres simples
    {
        $table = DB::table('nouveau_dossiers');
        
        if ($nature_dossier != null){
            $table = $table->where('nature_dossier', 'like', '%'.$nature_dossier.'%');
        }
        if ($date_less != null){
            $table = $table->where('date_ouverture','<=', $date_less);
        }
        if ($date_more != null){
            $table = $table->where('date_ouverture','>=',$date_more);
        }
        if ($arrondissement != null){
            $table = $table->where('arrondissement',$arrondissement);
        }
        //$table = $table->join('archivages','nouveau_dossiers.numero_dossier','=','archivages.numero_dossier')
          //                  ->select('nouveau_dossiers.*','archivages.*')->get();
        return $table;
    }

    public function searchListe($request){ //pour les listes 
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
        if($request->input('numero_dossier')){
            $numero_dossier = $request->input('numero_dossier');
        }
        else{
            $numero_dossier = null;
        }
        if($request->input('nom_requerant')){
            $nom_requerant = $request->input('nom_requerant');
        }
        else{
            $nom_requerant = null;
        }

        $table = DB::table('nouveau_dossiers');
        if ($numero_dossier != null){
            $table = $table->where('numero_dossier', 'like','%'.$numero_dossier.'%');
        }
        if ($nature_dossier != null){
            $table = $table->where('nature_dossier', 'like','%'.$nature_dossier.'%');
        }
        if ($date_less !=null){
            $table = $table->where('date_ouverture','<=',$date_less);
        }
        if ($date_more != null){
            $table = $table->where('date_ouverture','>=',$date_more);
        }
        if ($arrondissement != null){
            $table = $table->where('arrondissement',$arrondissement);
        }
        if ($nom_requerant != null){
            $table = $table->where('nom_requerant', 'like','%'.$nom_requerant.'%');
        }
        $table = $table->get();
        $response = [
            'Listes'=>$table,
            'numero_dossier'=>$numero_dossier,
            'nature_dossier'=>$nature_dossier,
            'date_less'=>$date_less,
            'date_more'=>$date_more,
            'arrondissement'=>$arrondissement,
            'nom_requerant'=>$nom_requerant,
        ];
        return $response;
    }

    public function searchArchi($request){  // a effacer
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
        if($request->input('numero_dossier')){
            $numero_dossier = $request->input('numero_dossier');
        }
        else{
            $numero_dossier = null;
        }
        if($request->input('nom_requerant')){
            $nom_requerant = $request->input('nom_requerant');
        }
        else{
            $nom_requerant = null;
        }

        $table = DB::table('nouveau_dossiers');
        $archives = Archivage::all();
        foreach ($archives as $archive){
            $table = $table->where('numero_dossier','!=',$archive->numero_dossier);
        }
        //dd($archive);
        if ($numero_dossier != null){
            $table = $table->where('numero_dossier', 'like','%'.$numero_dossier.'%');
        }
        if ($nature_dossier != null){
            $table = $table->where('nature_dossier', 'like','%'.$nature_dossier.'%');
        }
        if ($date_less !=null){
            $table = $table->where('date_ouverture','<=',$date_less);
        }
        if ($date_more != null){
            $table = $table->where('date_ouverture','>=',$date_more);
        }
        if ($arrondissement != null){
            $table = $table->where('arrondissement',$arrondissement);
        }
        if ($nom_requerant != null){
            $table = $table->where('nom_requerant', 'like','%'.$nom_requerant.'%');
        }
        $table = $table->get();
        $response = [
            'Listes'=>$table,
            'numero_dossier'=>$numero_dossier,
            'nature_dossier'=>$nature_dossier,
            'date_less'=>$date_less,
            'date_more'=>$date_more,
            'arrondissement'=>$arrondissement,
            'nom_requerant'=>$nom_requerant,
        ];
        return $response;
    }

    public function searchRejet1($request){ //pour les listes non utiliser ppour l'instant
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
        if($request->input('numero_dossier')){
            $numero_dossier = $request->input('numero_dossier');
        }
        else{
            $numero_dossier = null;
        }
        if($request->input('nom_requerant')){
            $nom_requerant = $request->input('nom_requerant');
        }
        else{
            $nom_requerant = null;
        }

        $table = DB::table('nouveau_dossiers');
        if ($nature_dossier != null){
            $table = $table->where('nature_dossier', 'like','%'.$nature_dossier.'%');
        }
        if ($date_less !=null){
            $table = $table->where('date_ouverture','<=',$date_less);
        }
        if ($date_more != null){
            $table = $table->where('date_ouverture','>=',$date_more);
        }
        if ($arrondissement != null){
            $table = $table->where('arrondissement',$arrondissement);
        }
        if ($nom_requerant != null){
            $table = $table->where('nom_requerant', 'like','%'.$nom_requerant.'%');
        }
        if ($numero_dossier != null){
            //$table = $table->where('numero_dossier',$numero_dossier);
        }
        $response = [
            'Listes'=>$table,
            'numero_dossier'=>$numero_dossier,
            'nature_dossier'=>$nature_dossier,
            'date_less'=>$date_less,
            'date_more'=>$date_more,
            'arrondissement'=>$arrondissement,
            'nom_requerant'=>$nom_requerant,
        ];
        return $response;
    }

    public function searchCourrier(Request $request){
        if ($request->input('numero_correspondance')){
            $numero_correspondance =$request->input('numero_correspondance');
        }
        else{
            $numero_correspondance = null;
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
        if ($request->input('expediteur')){
            $expediteur = $request->input('expediteur');
        }
        else {
            $expediteur = null;
        }
        if($request->input('numero_reponse')){
            $numero_reponse = $request->input('numero_reponse');
        }
        else{
            $numero_reponse = null;
        }

        $table = DB::table('courriers');
        if ($numero_correspondance != null){
            $table = $table->where('numero_correspondance', 'like','%'.$numero_correspondance.'%');
        }
        if ($expediteur != null){
            $table = $table->where('expediteur', 'like','%'.$expediteur.'%');
        }
        if ($date_less !=null){
            $table = $table->where('date_arrive','<=',$date_less);
        }
        if ($date_more != null){
            $table = $table->where('date_arrive','>=',$date_more);
        }
        if ($numero_reponse != null){
            $table = $table->where('numero_reponse', 'like','%'.$numero_reponse.'%');
        }
        $table = $table->get();
        $response = [
            'Listes'=>$table,
            'numero_correspondance'=>$numero_correspondance,
            'expediteur'=>$expediteur,
            'date_less'=>$date_less,
            'date_more'=>$date_more,
            'numero_reponse'=>$numero_reponse,
        ];
        return $response;
    }

    public function searchRejet(Request $request, $table){
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
        if($request->input('numero_dossier')){
            $numero_dossier = $request->input('numero_dossier');
        }
        else{
            $numero_dossier = null;
        }
        if($request->input('nom_requerant')){
            $nom_requerant = $request->input('nom_requerant');
        }
        else{
            $nom_requerant = null;
        }
        if ($nature_dossier != null){
            $table = $table->where('nature_dossier', 'like','%'.$nature_dossier.'%');
        }
        if ($date_less !=null){
            $table = $table->where('date_ouverture','<=',$date_less);
        }
        if ($date_more != null){
            $table = $table->where('date_ouverture','>=',$date_more);
        }
        if ($arrondissement != null){
            $table = $table->where('arrondissement',$arrondissement);
        }
        if ($nom_requerant != null){
            $table = $table->where('nom_requerant', 'like','%'.$nom_requerant.'%');
        }
        if ($numero_dossier != null){
            //$table = $table->where('numero_dossier', 'like',$numero_dossier);
        }
        $table = $table->get();
        $response = [
            'Listes'=>$table,
            'numero_dossier'=>$numero_dossier,
            'nature_dossier'=>$nature_dossier,
            'date_less'=>$date_less,
            'date_more'=>$date_more,
            'arrondissement'=>$arrondissement,
            'nom_requerant'=>$nom_requerant,
        ];
        return $response;        
    }

    public function searchDecision($request){
        if ($request->input('numero_decision')){
            $numero_decision =$request->input('numero_decision');
        }
        else{
            $numero_decision = null;
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
        $table = DB::table('decisions');
        if ($numero_decision != null){
            $table = $table->where('numero_decision', 'like','%'.$numero_decision.'%');
        }
        if ($date_less !=null){
            $table = $table->where('date_decision','<=',$date_less);
        }
        if ($date_more != null){
            $table = $table->where('date_decision','>=',$date_more);
        }
        $table = $table->get();
        $response = [
            'Listes'=>$table,
            'numero_decision'=>$numero_decision,
            'date_less'=>$date_less,
            'date_more'=>$date_more,
        ];
        return $response;        



    }
}
