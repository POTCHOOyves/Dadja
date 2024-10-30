@extends('Dash.app')
@section('title')
     Courriers
@endsection
@section('content')

    <h5 class="card-title">Listes de courriers sortants et entrants</h5>

    <table class="table datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Destinataires</th>
            <th>Objet</th>
            <th>Type de courrier</th>
            <th>Voie de transmission</th>
            <th>Date et heure</th>
            <th>Courtier</th>
            <th>Mode</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Courrier as $i=>$courrier)
            <tr>
                <td>{{$i+1}}</td>
                <td>
                    @if($courrier->groupe=="groupe")
                        @php
                            $Departement=\App\Models\Departement::find($courrier->destinataire);
                        @endphp
                        @if($Departement) {{$Departement->departement}} @endif
                    @else
                        @php
                            $User=\App\Models\User::find($courrier->destinataire);
                        @endphp
                        @if($User) {{$User->prenom}} {{$User->nom}} @endif
                    @endif
                </td>
                <td>{{$courrier->objet}}</td>
                <td>
                    @php
                        $Type=\App\Models\Typecourrier::find($courrier->idTypeCourrier);
                        $Voie=\App\Models\Voiestransmission::find($courrier->idVoieTrans);
                    @endphp
                    @if($Type) {{$Type->typeCourrier}} @endif
                </td>
                <td> @if($Voie) {{$Voie->voietransmission}} @endif</td>
                <td>{{$courrier->created_at}} <br>
                @if($courrier->traitement==0)
                    En Entente
                    @else
                    Valider
                @endif
                </td>
                <td>{{$courrier->courtier}}</td>
                <td>{{$courrier->reception}}</td>
                <td>
                    <a type="button" href="{{route('details_courrier',Crypt::encrypt($courrier->id))}}" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                    <a type="button" onclick="return confirm('Voulez-vous supprimé ?')" href="{{route('delete_courrier',Crypt::encrypt($courrier->id))}}" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
