<div id="rattach" class="container card-header shadow" style="background: linear-gradient(to right, #7F00FF, #E100FF)">
        <h1 class=" text-center" style="color: white">

    @if ($nb==1)
        Géometres
    @elseif ($nb==2)
        Contrôleurs
    @elseif ($nb==3)
        Liste DAO
    @endif
</h1>
</div>
<div class="container card shadow">
    <table id="table" class="table table-hover table-striped">
        <thead>
            <th>Numero</th>
            <th>Nom</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach ($Listes as $Liste )
                <tr class="table-row" data-href="@if ($nb == 1)
                            {{route('edit.employer.geometre',['table'=>$Liste])}}
                        @elseif ($nb==2)
                           {{route('edit.employer.controlleur',['table'=>$Liste])}} 
                        @elseif ($nb==3)
                            {{route('edit.employer.dao',['table'=>$Liste])}} 
                        @endif
                        ">
                    <td>{{$Liste->id}}</td>
                    <td>{{$Liste->nom}}</td>
                    <td>{{$Liste->statut}}</td>
                   
    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$Listes->links()}}
