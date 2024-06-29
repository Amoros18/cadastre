@extends('base')
@section('title', 'Recherche')

@section('content')
<div class="container mt-3 bg-light text-dark p-4">
  <h2>Recherche un dossier</h2>
  <form method="POST">
    @csrf
    <div class="mb-3 mt-3">
      <label for="nom_requerant">Nom du requerant:</label>
      <input type="text" class="form-control" required id="nom_requerant" value="{{old('nom_requerant')}}" name="nom_requerant">
    </div>
    <input type="hidden" value="1" name="recherche"/>
    <button type="submit" class="btn btn-primary">Rechercher</button>
  </form>
</div>

@if(isset($dossiers))
<div class="container mt-3">
  <h2 class="text-center">Resultat recherche</h2>         
  <table class="table">
    <thead>
      <tr>
        <th>Nom requerant</th>
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
@endif
@endsection