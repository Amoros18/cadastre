<h1 class="text-primary text-center">
    @if ($nb==1)
        Liste de Geometre
    @elseif ($nb==2)
        Liste Controlleurs
    @elseif ($nb==3)
        Liste DAO
    @endif
</h1>

<div class="container">
    <table class="table table-hover table-striped">
        <thead>
            <th>Numero</th>
            <th>Nom</th>
            <th>Status</th>
            <th>Modifier</th>
            <th>Suprimer</th>
        </thead>
        <tbody>
            @foreach ($Listes as $Liste )
                <tr>
                    <td>{{$Liste->id}}</td>
                    <td>{{$Liste->nom}}</td>
                    <td>{{$Liste->statut}}</td>
                    <td><a  
                        @if ($nb == 1)
                            href = "{{route('edit.employer.geometre',['table'=>$Liste])}} " 
                        @elseif ($nb==2)
                            href = " {{route('edit.employer.controlleur',['table'=>$Liste])}} " 
                        @elseif ($nb==3)
                            href = " {{route('edit.employer.dao',['table'=>$Liste])}} " 
                        @endif><button type="edit" >Modifier</a></td>
                    <td><a
                        @if ($nb == 1)
                            href = "{{route('delete.employer.geometre',['table'=>$Liste])}} " 
                        @elseif ($nb==2)
                            href = " {{route('delete.employer.controlleur',['table'=>$Liste])}} " 
                        @elseif ($nb==3)
                            href = " {{route('delete.employer.dao',['table'=>$Liste])}} " 
                        @endif><button type="edit" >Supprimer</a></td>
                    </td>
    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$Listes->links()}}
