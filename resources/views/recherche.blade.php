@extends($layout)

@section('title', 'Recherche')

@section('content')
<style>
    #Rattach{
        background: linear-gradient(to right, {{$c1}}, {{$c2}});
    }
</style>
<div class="container card p-0">
    <div id= "Rattach" class=" container-fluid card-header shadow">
        <h1 class="text-center" style="color: white">Rechercher un dossier</h1>
    </div>
    <div class="container-fluid card-body">
        <form method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="nom_requerant" class="control-label" style="color: black;">Nom du requerant:</label>
                <input type="text" class="form-control" placeholder="Entrez le nom du requerant" required id="nom_requerant" value="{{old('nom_requerant', $nom)}}" name="nom_requerant">
            </div>
            <input type="hidden" value="1" name="recherche"/>
            <button type="submit" class="btn btn-success w-100">Rechercher</button>
        </form>
    </div>
</div>

@if(isset($dossiers))
<div class="container card p-0 mt-4">
    <div id= "Rattach" class=" container-fluid card-header shadow">
        <h1 class="text-center" style="color: white">Resulat recherche</h1>
    </div>
    <div class="table-responsive card-body">
    <table id="table" class="table-hover table-responsible table-striped">
        <thead>
        <tr>
            <th>Nom requerant</th>
            <th>Sexe</th>
            <th>Numero dossier</th>
            <th>Date d'ouverture</th>
            <th>Position</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($dossiers))
            @foreach ($dossiers as $dossier)
                <tr>
                    <td>{{ $dossier->nom_requerant }}</td>
                    <td>{{ $dossier->sexe_requerant }}</td>
                    <td>{{ $dossier->numero_dossier }}</td>
                    <td>{{ $dossier->date_ouverture }}</td>

                    <!-- Verification position dossier -->
                    <td>
                        @if($dossier->geometre == null AND $dossier->statut != 'ancien')
                            Bureau du chef - Cotation
                        @else
                            @if($dossier->montant_rattachement == null AND $dossier->status != 'ancien')
                                BAG - Rattachement
                            @else
                                @if($dossier->mise_en_valeur == null AND $dossier->geometre != null AND $dossier->status != 'ancien')
                                    Geometre - Main Courante
                                @else
                                    @if($dossier->numero_controle == null AND $dossier->geometre != null AND $dossier->status != 'ancien')
                                        Bureau du Controle - Controle 1
                                    @else
                                        @if($dossier->numero_mj == null AND $dossier->numero_controle != null AND $dossier->status != 'ancien')
                                            BMJ
                                        @else
                                            @if($dossier->echelle == null AND $dossier->numero_dossier != null AND $dossier->status != 'ancien')
                                                Geometre - CCP
                                            @else
                                                @if($dossier->controlleur_2 == null AND $dossier->point != null AND $dossier->status != 'ancien')
                                                    Bureau du Controle - Controle 2
                                                @else
                                                    @if($dossier->numero_visa == null AND $dossier->numero_mj != null AND $dossier->numero_ccp != null AND $dossier->point != null AND $dossier->numero_controle != null AND $dossier->status != 'ancien')
                                                        Bureau du chef - Visa
                                                    @else
                                                        En attente d'archivage
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endif

                    </td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="3" class="text-center">Aucun dossier de ce nom</td>
                </tr>
            @endif
        </tbody>
    </table>
    </div>
</div>
@endif
@endsection