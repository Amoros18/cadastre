<br><div class="container-fluid card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations des points</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

            @if ($numero_dossier)
            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-2 control-label">Numero de dossier:</label>
                <div class="col-md-10">
                    <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$numero_dossier)}}" readonly>
                </div>
                @error("numero_dossier")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            @else
            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-2 control-label">Numero de dossier:</label>
                <div class="col-md-10">
                    <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$archive->numero_dossier)}}">
                </div>
                @error("numero_dossier")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            @endif
            <div class="row mt-1">
                <label for="adresse" class="label col-md-2 control-label">TYPE DE COORDONNEES:</label>
                <div class="col-md-10">
                    <select name="type_coordonnees" id="zone"  class="form-control">
                        <option selected> @if ($table->type_coordonnees)
                            {{$table->type_coordonnees}}
                        @else
                        UTM NON RATTACHE
                        @endif </option>
                        <option>UTM NON RATTACHE</option>
                        <option>RGNC</option>
                        <option>GAUSS</option>
                        <option>GEOGRAPHIQUE</option>
                    </select>
                    @error("type_coordonnees")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            @for ($i =0; $i<$nombre_points; $i++)
            <div class="row mt-1">
                <label for="date_reception" class="label col-md-2 control-label">Longitude x:{{$i+1}} </label>
                <div class="col-md-4">
                    <input type="number" name="longitude{{$i}}" class="form-control" value="{{old('longitude'.$i.'',$points->get($i)->longitude)}}">
                </div>
                @error('longitude'.$i)
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror
                <label for="latitude1" class="label col-md-2 control-label">Latitude y:{{$i+1}}</label>
                <div class="col-md-4">
                    <input type="number" name="latitude{{$i}}" class="form-control" value="{{old('latitude'.$i.'',$points->get($i)->latitude)}}">
                </div>
                @error('latitude'.$i)
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror   
            </div>
            @endfor
            @for ($i = $nombre_points; $i<=20; $i++)
            <div class="row mt-1">
                <label for="date_reception" class="label col-md-2 control-label">Longitude x:{{$i+1}} </label>
                <div class="col-md-4">
                    <input type="number" name="longitude{{$i}}" class="form-control" value="{{old('longitude'.$i.'')}}">
                </div>
                @error('longitude'.$i)
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror
                <label for="latitude1" class="label col-md-2 control-label">Latitude y:{{$i+1}}</label>
                <div class="col-md-4">
                    <input type="number" name="latitude{{$i}}" class="form-control" value="{{old('latitude'.$i.'')}}">
                </div>
                @error('latitude'.$i)
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror   
            </div>
            @endfor

           
        <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->observation)
                Valider
            @else
                Enregistrer
            @endif
           </button>
    </form>
</div></div>