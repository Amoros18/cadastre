@extends('base')

@section('title', 'Statistique')

@section('content')

<div class="container-fluid p-5 bg-light text-dark">
        <div>
            <a class="navbar-brand text-dark" >Filtrer les donnees</a>
        </div>
        <div>
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md">
                        <label for="date_more" class="label col-3 control-label">Date Debut:</label>
                        <input type="date" name="date_debut" placeholder="dd-mm-yyyy" required class="text" value="{{old('date_debut', $date_debut)}}">        
                    </div>
                    <div class="col-md">
                        <label for="date_less" class="label col-3 control-label">Date Fin:</label>
                        <input type="date" name="date_fin" required class="text" value="{{old('date_fin',$date_fin)}}">    
                    </div>
                    <div class="col-md">
                        <input type="submit" class="btn btn-success w-100" name="recherche" value="Filtrer">
                    </div>
                </div>
            </form>         
        </div>
    </div> 

    <div class="container-fluid mt-3">
        <h4 class="text-center">Nombre de total de dossiers: {{$nombre_create}}</h4>

        <!-- Par nature de dossier -->
        <div class="container-fluid mt-3">
            <h3>Nature de dossier</h3>
            <table class="table bg-dark">
                <thead>
                    <tr>
                        <td>Nature de dossier</td>
                        <td>Nombre de dossiers</td>
                    </tr>
                </thead>
                <tbody>
                    @if($natures->count())
                        @foreach($natures as $nature => $count)
                            <tr>
                                @if(empty($nature))
                                    <td>Non defini</td>
                                @else
                                    <td>{{ $nature }}</td>
                                @endif
                                <td>{{ $count }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2" class="text-center">Aucune donnee trouvee</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <canvas id="nature_bar" class="text-center bg-light p-3" style="width:10%;max-width:600px"></canvas>
            <!-- <canvas id="nature_circle" class="text-center bg-light p-3" style="width:10%;max-width:600px"></canvas> -->
        </div>

        <!-- Par sexe -->
        <div class="container-fluid mt-3">
            <h3>Sexe du requerant</h3>
            <table class="table bg-dark">
                <thead>
                    <tr>
                        <td>Sexe du requerant</td>
                        <td>Nombre de dossiers</td>
                    </tr>
                </thead>
                <tbody>
                    @if($sexes->count())
                        @foreach($sexes as $sexe => $count)
                            <tr>
                                @if(empty($sexe))
                                    <td>Non defini</td>
                                @else
                                    <td>{{ $sexe }}</td>
                                @endif
                                <td>{{ $count }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2" class="text-center">Aucune donnee trouvee</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <canvas id="sexe_bar" class="text-center bg-light p-3 m-3" style="width:10%;max-width:600px"></canvas>
            <br>
            <!-- <canvas id="sexe_circle" class="text-center bg-light p-3 m-3" style="width:10%;max-width:600px"></canvas> -->
        </div>

        <!-- Par arrondissement -->
        <div class="container-fluid mt-3">
            <h3>Arrondissement</h3>
            <table class="table bg-dark">
                <thead>
                    <tr>
                        <td>Arrondissement</td>
                        <td>Nombre de dossiers</td>
                    </tr>
                </thead>
                <tbody>
                    @if($arrondissements->count())
                        @foreach($arrondissements as $arrondissement => $count)
                            <tr>
                                @if(empty($arrondissement))
                                    <td>Non defini</td>
                                @else
                                    <td>{{ $arrondissement }}</td>
                                @endif
                                <td>{{ $count }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2" class="text-center">Aucune donnee trouvee</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <canvas id="arrondissement_bar" class="text-center bg-light p-3" style="width:10%;max-width:600px"></canvas>
            <!-- <canvas id="arrondissement_circle" class="text-center bg-light p-3" style="width:10%;max-width:600px"></canvas> -->
        </div>

        <script>
            function chart(datas, canva_id, bar_type) {
                var data = datas;
                var labels = Object.keys(data);
                var values = Object.values(data);
            
                var ctx = document.getElementById(canva_id).getContext('2d');
                var myChart = new Chart(ctx, {
                    type: bar_type,
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Dossiers',
                            data: values,
                            backgroundColor: ['rgb(14, 64, 123)', 'rgb(156, 200, 227)', 'rgb(34, 99, 165)'],
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {display: true},
                        title: {
                            display: true,
                            text: "Nature de dossier"
                        }
                    }
                });
            }

            var data_nature = <?php echo $natures ?>;
            var data_sexe = <?php echo $sexes ?>;
            var data_arrondissement = <?php echo $arrondissements ?>;

            chart(data_nature, 'nature_bar', 'bar');
            // chart(data_nature, 'nature_circle', 'pie');
            chart(data_sexe, 'sexe_bar', 'bar');
            // chart(data_sexe, 'sexe_circle', 'pie');
            chart(data_arrondissement, 'arrondissement_bar', 'bar');
            // chart(data_arrondissement, 'arrondissement_circle', 'pie');
            
            
        </script>
    </div>
@endsection