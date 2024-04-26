<?php

use App\Http\Controllers\AncienDossierController;
use App\Http\Controllers\ArchivageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MigrerRecette;
use App\Http\Controllers\PointController;
use App\Http\Controllers\RecceteController;
use App\Http\Controllers\RegistreArchivagePDFController;
use App\Http\Controllers\RegistreCCPPDFController;
use App\Http\Controllers\RegistreControlePDFController;
use App\Http\Controllers\RegistreCourrierPDFController;
use App\Http\Controllers\RegistreDossierRecuPDFController;
use App\Http\Controllers\RegistreMainCourantePDFController;
use App\Http\Controllers\RegistreMJPDFController;
use App\Http\Controllers\RegistreNonCotePDFController;
use App\Http\Controllers\RegistreRattachementPDFController;
use App\Http\Controllers\RegistreRecettePDFController;
use App\Http\Controllers\RegistreRejetBCPDFController;
use App\Http\Controllers\RegistreRejetBMJPDFController;
use App\Http\Controllers\RegistreTransmisDeleguePDFController;
use App\Http\Controllers\RegistreVisaPDFController;
use App\Http\Controllers\RejetController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SortieGeometreControler;
use App\Http\Controllers\Statistique;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view ('welcome');
})->name('home')->middleware('auth');

Route::get('map',[MapController::class, 'mapView'])->name('map');

Route::get('/login',[AuthController::class, 'login'])->name('auth.login');
Route::post('/login',[AuthController::class, 'dologin']);
Route::delete('/logout',[AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('liste/')->middleware('auth')->name('liste.')->group(function(){
    Route::get('/dossiers',[DossierController::class,'listDossier'])->name('dossier');
    Route::post('/dossiers',[DossierController::class,'listDossier']);
    Route::get('ouverture-dossier',[DossierController::class,'listOuvertureDossier'])->name('ouverture-dossier');
    Route::post('ouverture-dossier',[DossierController::class,'listOuvertureDossier'])->name('ouverture-dossier');
    Route::get('/recette-intro',[RecceteController::class,'listeRecetteIntro'])->name('recette-intro');
    Route::post('/recette-intro',[RecceteController::class,'listeRecetteIntro']);
    Route::get('/recette',[RecceteController::class, 'listRecette'])->name('recette');
    Route::post('/recette',[RecceteController::class, 'listRecette']);
    Route::get('/cotation',[DossierController::class,'listCotation'])->name('cotation');
    Route::post('/cotation',[DossierController::class,'listCotation']);
    Route::get('/rattachement',[DossierController::class,'listRattachement'])->name('rattachement');
    Route::post('/rattachement',[DossierController::class,'listRattachement']);
    Route::get('/affectation',[DossierController::class,'listAffectation'])->name('affectation');
    Route::post('/affectation',[DossierController::class,'listAffectation']);
    Route::get('/ccp',[DossierController::class,'listCcp'])->name('ccp');
    Route::post('/ccp',[DossierController::class,'listCcp']);
    Route::get('/main-courante',[DossierController::class,'listMainCourante'])->name('main-courante');
    Route::post('/main-courante',[DossierController::class,'listMainCourante']);
    Route::get('/controle1',[DossierController::class,'listControle1'])->name('controle1');
    Route::post('/controle1',[DossierController::class,'listControle1']);
    Route::get('/controle2',[DossierController::class,'listControle2'])->name('controle2');
    Route::post('/controle2',[DossierController::class,'listControle2']);
    Route::get('/mj',[DossierController::class,'listMj'])->name('mj');
    Route::post('/mj',[DossierController::class,'listMj']);
    Route::get('/visa',[DossierController::class,'listVisa'])->name('visa');
    Route::post('/visa',[DossierController::class,'listVisa']);
    Route::get('/sortie-intro',[SortieGeometreControler::class,'listSortieIntro'])->name('sortie-intro');
    Route::post('/sortie-intro',[SortieGeometreControler::class,'listSortieIntro']);
    Route::get('/sortie-geometre',[SortieGeometreControler::class,'listSortie'])->name('sortie-geometre');
    Route::get('/archivage-intro',[ArchivageController::class,'listArchivageIntro'])->name('archivage-intro');
    Route::post('/archivage-intro',[ArchivageController::class,'listArchivageIntro']);
    Route::get('/archivage',[ArchivageController::class,'listArchivage'])->name('archivage');
    Route::post('/archivage',[ArchivageController::class,'listArchivage']);
    Route::get('/ancien-dossier',[AncienDossierController::class,'listAncienDossier'])->name('ancien-dossier');
    Route::post('/ancien-dossier',[AncienDossierController::class,'listAncienDossier']);
    Route::get('/controle-intro-rejet',[RejetController::class,'listIntroRejetControle'])->name('controle-intro-rejet');
    Route::post('/controle-intro-rejet',[RejetController::class,'listIntroRejetControle']);
    Route::get('/controle-rejet',[RejetController::class,'listRejetControle'])->name('controle-rejet');
    Route::post('/controle-rejet',[RejetController::class,'listRejetControle']);
    Route::get('/mj-intro-rejet',[RejetController::class,'listIntroRejetMj'])->name('mj-intro-rejet');
    Route::post('/mj-intro-rejet',[RejetController::class,'listIntroRejetMj']);
    Route::get('/mj-rejet',[RejetController::class,'listRejetMj'])->name('mj-rejet');
    Route::post('/mj-rejet',[RejetController::class,'listRejetMj']);
    Route::get('/points-intro',[PointController::class,'listIntroPoint'])->name('points-intro');
    Route::post('/points-intro',[PointController::class,'listIntroPoint']);
    Route::get('/points-modif-intro',[PointController::class,'listModificationPoint'])->name('points-modif');
    Route::post('/points-modif-intro',[PointController::class,'listModificationPoint']);
    Route::get('/point',[PointController::class,'listPoint'])->name('points');
    Route::get('/courrier',[CourrierController::class,'listCourrier'])->name('courrier');
    Route::post('/courrier',[CourrierController::class,'listCourrier']);
    Route::get('/decision',[DecisionController::class,'listDecision'])->name('decision');
    Route::post('/decision',[DecisionController::class,'listDecision']);

});

Route::prefix('create/')->middleware('auth')->name('create.')->group(function(){
    Route::get('/user',[UserController::class, 'addUser'])->name('user');
    Route::post('/user',[UserController::class, 'add_User']);
    Route::get('/ancien-dossier',[AncienDossierController::class,'createAncienDossier'])->name('ancien-dossier');
    Route::post('/ancien-dossier',[AncienDossierController::class,'create_AncienDossier']);
    Route::get('ouverture-dossier',[DossierController::class,'createOuvertureDossier'])->name('ouverture-dossier');
    Route::post('ouverture-dossier',[DossierController::class,'create_OuvertureDossier']);
    Route::get('/recette/{table}',[RecceteController::class,'createRecette'])->name('recette');
    Route::post('/recette/{table}',[RecceteController::class,'create_Recette']);
    Route::get('/affectation/{table}',[DossierController::class,'createAffectation'])->name('affectation');
    Route::post('/affectation/{table}',[DossierController::class,'create_Affectation']);
    Route::get('/cotation/{table}',[DossierController::class,'createCotation'])->name('cotation');
    Route::post('/cotation/{table}',[DossierController::class,'create_Cotation']);
    Route::get('/rattachement/{table}',[DossierController::class,'createRattachement'])->name('rattachement');
    Route::post('/rattachement/{table}',[DossierController::class,'create_Rattachement']);
    Route::get('/ccp/{table}',[DossierController::class,'createCcp'])->name('ccp');
    Route::post('/ccp/{table}',[DossierController::class,'create_Ccp']);
    Route::get('/main-courante/{table}',[DossierController::class,'createMainCourante'])->name('main-courante');
    Route::post('/main-courante/{table}',[DossierController::class,'create_Maincourante']);
    Route::get('/controle1/{table}',[DossierController::class,'createControle1'])->name('controle1');
    Route::post('/controle1/{table}',[DossierController::class,'create_Controle1']);
    Route::get('/controle2/{table}',[DossierController::class,'createControle2'])->name('controle2');
    Route::post('/controle2/{table}',[DossierController::class,'create_Controle2']);
    Route::get('/mj/{table}',[DossierController::class,'createMj'])->name('mj');
    Route::post('/mj/{table}',[DossierController::class,'create_Mj']);
    Route::get('/visa/{table}',[DossierController::class,'createVisa'])->name('visa');
    Route::post('/visa/{table}',[DossierController::class,'create_Visa']);
    Route::get('/sortie-geometre',[SortieGeometreControler::class,'createSortie'])->name('sortie-geometre');
    Route::post('/sortie-geometre',[SortieGeometreControler::class,'create_Sortie']);
    Route::get('/archivage',[ArchivageController::class,'createArchivage'])->name('archivage');
    Route::post('/archivage',[ArchivageController::class,'create_Archivage']);
    Route::get('/controle-rejet',[RejetController::class,'createRejetControle'])->name('controle-rejet');
    Route::post('/controle-rejet',[RejetController::class,'create_RejetControle']);
    Route::get('/mj-rejet',[RejetController::class,'createRejetMj'])->name('mj-rejet');
    Route::post('/mj-rejet',[RejetController::class,'create_RejetMj']);
    Route::get('/point',[PointController::class,'createPoints'])->name('points');
    Route::post('/point',[PointController::class,'create_Points']);
    Route::get('/courrier',[CourrierController::class,'createCourrier'])->name('courrier');
    Route::post('/courrier',[CourrierController::class,'create_Courrier']);
    Route::get('/decision',[DecisionController::class,'createDecision'])->name('decision');
    Route::post('/decision',[DecisionController::class,'create_Decision']);



    Route::prefix('employer/')->middleware('auth')->name('employer.')->group(function(){
        Route::get('geometre/',[EmployerController::class,'createGeometre'])->name('geometre');
        Route::post('geometre/',[EmployerController::class,'create_Geometre']);
        Route::get('controlleur/',[EmployerController::class,'createControlleur'])->name('controlleur');
        Route::post('controlleur/',[EmployerController::class,'create_Controlleur']);
        Route::get('dao/',[EmployerController::class,'createDAO'])->name('dao');
        Route::post('dao/',[EmployerController::class,'create_DAO']);
    });


});

Route::prefix('edit/')->middleware('auth')->name('edit.')->group(function(){
    Route::get('/user/{table}',[UserController::class, 'editUser'])->name('user')->middleware('authchef');
    Route::post('/user/{table}',[UserController::class, 'edit_User']);
    Route::get('/ancien-dossier/{table}',[AncienDossierController::class,'editAncienDossier'])->name('ancien-dossier');
    Route::post('/ancien-dossier/{table}',[AncienDossierController::class,'edit_AncienDossier']);
    Route::get('ouverture-dossier/{table}',[DossierController::class,'editOuvertureDossier'])->name('ouverture-dossier');
    Route::post('ouverture-dossier/{table}',[DossierController::class,'edit_OuvertureDossier']);
    Route::get('/recette/{table}',[RecceteController::class,'editRecette'])->name('recette');
    Route::post('/recette/{table}',[RecceteController::class,'edit_Recette']);
    Route::get('/rattachement/{table}',[DossierController::class,'editRattachement'])->name('rattachement');
    Route::post('/rattachement/{table}',[DossierController::class,'edit_Rattachement']);
    Route::get('/cotation/{table}',[DossierController::class,'editCotation'])->name('cotation');
    Route::post('/cotation/{table}',[DossierController::class,'edit_Cotation']);
    Route::get('/affectaion/{table}',[DossierController::class,'editAffectation'])->name('affectation');
    Route::post('/affectaion/{table}',[DossierController::class,'edit_Affectation']);
    Route::get('/ccp/{table}',[DossierController::class,'editCcp'])->name('ccp');
    Route::post('/ccp/{table}',[DossierController::class,'edit_Ccp']);
    Route::get('/main-courante/{table}',[DossierController::class,'editMainCourante'])->name('main-courante');
    Route::post('/main-courante/{table}',[DossierController::class,'edit_MainCourante']);
    Route::get('/controle1/{table}',[DossierController::class,'editControle1'])->name('controle1');
    Route::post('/controle1/{table}',[DossierController::class,'edit_Controle1']);
    Route::get('/controle2/{table}',[DossierController::class,'editControle2'])->name('controle2');
    Route::post('/controle2/{table}',[DossierController::class,'edit_Controle2']);
    Route::get('/mj/{table}',[DossierController::class,'editMj'])->name('mj');
    Route::post('/mj/{table}',[DossierController::class,'edit_Mj']);
    Route::get('/visa/{table}',[DossierController::class,'editVisa'])->name('visa');
    Route::post('/visa/{table}',[DossierController::class,'edit_Visa']);
    Route::get('/sortie-geometre/{table}',[SortieGeometreControler::class,'editSortieGeometre'])->name('sortie-geometre');
    Route::post('/sortie-geometre/{table}',[SortieGeometreControler::class,'edit_SortieGeometre']);
    Route::get('/archivage/{table}',[ArchivageController::class,'editArchivage'])->name('archivage');
    Route::post('/archivage/{table}',[ArchivageController::class,'edit_Archivage']);
    Route::get('/controle-rejet/{table}',[RejetController::class,'editRejetControle'])->name('controle-rejet');
    Route::post('/controle-rejet/{table}',[RejetController::class,'edit_RejetControle']);
    Route::get('/mj-rejet/{table}',[RejetController::class,'editRejetMj'])->name('mj-rejet');
    Route::post('/mj-rejet/{table}',[RejetController::class,'edit_RejetMj']);
    Route::get('/point',[PointController::class,'editPoints'])->name('points');
    Route::post('/point',[PointController::class,'edit_Points']);
    Route::get('/courrier/{table}',[CourrierController::class,'editCourrier'])->name('courrier');
    Route::post('/courrier/{table}',[CourrierController::class,'edit_Courrier']);
    Route::get('/decision/{table}',[DecisionController::class,'editDecision'])->name('decision');
    Route::post('/decision/{table}',[DecisionController::class,'edit_Decision']);


    Route::prefix('employer/')->name('employer.')->group(function(){
        Route::get('geometre/{table}',[EmployerController::class,'editGeometre'])->name('geometre');
        Route::post('geometre/{table}',[EmployerController::class,'edit_Geometre']);
        Route::get('controlleur/{table}',[EmployerController::class,'editControlleur'])->name('controlleur');
        Route::post('controlleur/{table}',[EmployerController::class,'edit_Controlleur']);
        Route::get('dao/{table}',[EmployerController::class,'editDAO'])->name('dao');
        Route::post('dao/{table}',[EmployerController::class,'edit_DAO']);
    });

});

Route::prefix('visualiser/')->name('visualiser.')->group(function(){
    Route::get('dossier/{table}',[DossierController::class,'consultDossier'])->name('dossier');
    Route::get('user',[UserController::class,'listUser'])->name('liste-user');
    Route::get('geometre',[EmployerController::class,'listGeometre'])->name('liste-geometre');
    Route::get('controlleur',[EmployerController::class,'listControlleur'])->name('liste-controlleur');
    Route::get('dao',[EmployerController::class,'listDAO'])->name('liste-dao');
    Route::get('ancien-dossier',[AncienDossierController::class,'listAncienDossier'])->name('ancien-dossier');
    Route::get('courrier/{table}',[CourrierController::class,'consultCourrier'])->name('courrier');
});

Route::prefix('user/')->name('user.')->group(function(){
    Route::get('bag',[UserController::class,'bag'])->middleware('authBag')->name('bag');
    Route::get('chef',[UserController::class,'chef'])->middleware('authChef')->name('chef');
    Route::get('geometre',[UserController::class,'geometre'])->middleware('authGeometre')->name('geometre');
    Route::get('bc',[UserController::class,'bc'])->middleware('authBc')->name('bc');
    Route::get('bmj',[UserController::class,'bmj'])->middleware('authBmj')->name('bmj');
    Route::get('archivage',[UserController::class,'archivage'])->middleware('authArchivage')->name('archivage');
    Route::get('ancien-dossier',[AncienDossierController::class,'viewAncienDossier'])->name('ancien-dossier');
    Route::get('ancien-dossier/suite/{table}',[AncienDossierController::class,'viewAncienDossierSuite'])->name('ancien-dossier.suite');
    Route::get('employer',[UserController::class,'employer'])->middleware('authBag')->name('employer');
});

Route::prefix('registre/')->name('registre.')->middleware('authChef')->group(function(){
    Route::get('generer',[DossierController::class,'generateurRegistre'])->name('generateur');
    Route::get('visa',[RegistreVisaPDFController::class,'index'])->name('visa');
    Route::post('visa',[RegistreVisaPDFController::class,'index']);
    Route::get('visa/pdf',[RegistreVisaPDFController::class,'pdf'])->name('visa_pdf');
    Route::get('recette',[RegistreRecettePDFController::class,'index'])->name('recette');
    Route::post('recette',[RegistreRecettePDFController::class,'index']);
    Route::get('recette/pdf',[RegistreRecettePDFController::class,'pdf'])->name('recette_pdf');
    Route::get('rattachement',[RegistreRattachementPDFController::class,'index'])->name('rattachement');
    Route::post('rattachement',[RegistreRattachementPDFController::class,'index']);
    Route::get('rattachement/pdf',[RegistreRattachementPDFController::class,'pdf'])->name('rattachement_pdf');
    Route::get('mj',[RegistreMJPDFController::class,'index'])->name('mj');
    Route::post('mj',[RegistreMJPDFController::class,'index']);
    Route::get('mj/pdf',[RegistreMJPDFController::class,'pdf'])->name('mj_pdf');
    Route::get('ccp',[RegistreCCPPDFController::class,'index'])->name('ccp');
    Route::post('ccp',[RegistreCCPPDFController::class,'index']);
    Route::get('ccp/pdf',[RegistreCCPPDFController::class,'pdf'])->name('ccp_pdf');
    Route::get('main-courante',[RegistreMainCourantePDFController::class,'index'])->name('main_courante');
    Route::post('main-courante',[RegistreMainCourantePDFController::class,'index']);
    Route::get('main-courante/pdf',[RegistreMainCourantePDFController::class,'pdf'])->name('main_courante_pdf');
    Route::get('archivage',[RegistreArchivagePDFController::class,'index'])->name('archivage');
    Route::post('archivage',[RegistreArchivagePDFController::class,'index']);
    Route::get('archivage/pdf',[RegistreArchivagePDFController::class,'pdf'])->name('archivage_pdf');
    Route::get('controle',[RegistreControlePDFController::class,'index'])->name('controle');
    Route::post('controle',[RegistreControlePDFController::class,'index']);
    Route::get('controle/pdf',[RegistreControlePDFController::class,'pdf'])->name('controle_pdf');
    Route::get('dossier-recu',[RegistreDossierRecuPDFController::class,'index'])->name('dossier_recu');
    Route::post('dossier-recu',[RegistreDossierRecuPDFController::class,'index']);
    Route::get('dossier-recu/pdf',[RegistreDossierRecuPDFController::class,'pdf'])->name('dossier_recu_pdf');
    Route::get('transmis-delegue',[RegistreTransmisDeleguePDFController::class,'index'])->name('transmis_delegue');
    Route::post('transmis-delegue',[RegistreTransmisDeleguePDFController::class,'index']);
    Route::get('transmis-delegue/pdf',[RegistreTransmisDeleguePDFController::class,'pdf'])->name('transmis_delegue_pdf');
    Route::get('non-cote',[RegistreNonCotePDFController::class,'index'])->name('non_cote');
    Route::post('non-cote',[RegistreNonCotePDFController::class,'index']);
    Route::get('non-cote/pdf',[RegistreNonCotePDFController::class,'pdf'])->name('non_cote_pdf');
    Route::get('non-traiter',[RegistreVisaPDFController::class,'index'])->name('non_traiter');
    Route::get('non-traiter/pdf',[RegistreVisaPDFController::class,'pdf'])->name('non_traiter_pdf');
    Route::get('rejet-mj',[RegistreRejetBMJPDFController::class,'index'])->name('rejet_bmj');
    Route::get('rejet-mj/pdf',[RegistreRejetBMJPDFController::class,'pdf'])->name('rejet_bmj_pdf');
    Route::get('rejet-bc',[RegistreRejetBCPDFController::class,'index'])->name('rejet_bc');
    Route::get('rejet-bc/pdf',[RegistreRejetBCPDFController::class,'pdf'])->name('rejet_bc_pdf');
    Route::get('courrier',[RegistreCourrierPDFController::class,'index'])->name('courrier');
    Route::post('courrier',[RegistreCourrierPDFController::class,'index']);
    Route::get('courrier/pdf',[RegistreCourrierPDFController::class,'pdf'])->name('courrier_pdf');
});
Route::post('search',[SearchController::class,'search'])->name('search');

Route::get('modifier',[DossierController::class,'mofifictionDonnees'])->name('modifier')->middleware('authChef');
Route::get('download/{table}',[DossierController::class,'downloadFile'])->name('download')->middleware('authChef');
Route::get('recherche/{table}',[DossierController::class,'position'])->name('search.position');
Route::prefix('delete')->name('delete.')->middleware('auth')->group(function(){
    Route::prefix('employer')->name('employer.')->middleware('auth')->group(function(){
        Route::get('geometre',[EmployerController::class,'deleteGeometre'])->name('geometre');
        Route::get('dao',[EmployerController::class,'deleteDAO'])->name('dao');
        Route::get('controlleur',[EmployerController::class,'deleteControlleur'])->name('controlleur');
    });
});
Route::get('statistique',[StatistiqueController::class,'statistique'])->name('statistique');
Route::post('statistique',[StatistiqueController::class,'statistique']);

Route::get('lien-map',[PointController::class,'lienGoogleMap'])->name('lien-google-map');


Route::prefix('transmission/')->middleware('auth')->name('transmission.')->group(function(){
    Route::get('',[TransmissionController::class,'accueilTransmission'])->name('accueil');
    Route::get('reception',[TransmissionController::class,'accueilReception'])->name('reception');
    Route::prefix('delegue/')->middleware('auth')->name('delegue.')->group(function(){
        Route::get('liste-intro',[TransmissionController::class,'listTransmissionDelegueIntro'])->name('liste-intro');
        Route::post('liste-intro',[TransmissionController::class,'listTransmissionDelegueIntro']);
        Route::get('liste',[TransmissionController::class,'listTransmissionDelegue'])->name('liste');
        Route::post('liste',[TransmissionController::class,'listTransmissionDelegue']);
        Route::get('send/{table}',[TransmissionController::class,'createTransmissionDelegue'])->name('create');
        Route::post('send/{table}',[TransmissionController::class,'create_TransmissionDelegue']);
        Route::get('edit/{table}',[TransmissionController::class,'editTransmissionDelegue'])->name('edit');
        Route::post('edit/{table}',[TransmissionController::class,'edit_TransmissionDelegue']);
    });
});

Route::prefix('reception/')->middleware('auth')->name('reception.')->group(function(){
    Route::get('',[TransmissionController::class,'accueilReception'])->name('accueil');
    Route::prefix('delegue/')->middleware('auth')->name('delegue.')->group(function(){
        Route::get('liste',[TransmissionController::class,'listreceptionDelegue'])->name('liste');
        Route::post('liste',[TransmissionController::class,'listreceptionDelegue']);
        Route::get('send/{table}',[TransmissionController::class,'createTransmissionDelegue'])->name('create');
        Route::post('send/{table}',[TransmissionController::class,'create_TransmissionDelegue']);
        Route::get('edit/{table}',[TransmissionController::class,'editTransmissionDelegue'])->name('edit');
        Route::get('edit/{table}',[TransmissionController::class,'edit_TransmissionDelegue']);
    });
});

// effectuer le migration en toute securiter.
Route::get('migrer',[MigrerRecette::class,'migrer']);