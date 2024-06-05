@extends('base')

@section('title', 'Nature de dossier')
@section('content')
<h1 class="text-primary text-center">Selectionner la nature de dossier à modifier</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Nature dossier</th>
                <th>Modifier</th>
            </thead>
            <tbody>
                @foreach ($natures as $nature )
                    <tr>
                        <td>{{$nature->nature}}</td>

                        <td><a  href = "{{ route('edit.nature',['table'=>json_decode(json_encode($nature->id),true)]) }} ">
                            <button type="edit">Enregistrer</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection