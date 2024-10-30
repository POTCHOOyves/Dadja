@extends('Dash.app')
@section('title')
    Courriers Entrants
@endsection
@section('content')

    <h5 class="card-title">Détails du courrier |
        @if($Courrier->traitement==0)
        <a href="{{route('Validation_Transmission',Crypt::encrypt($Courrier->id))}}" class="btn btn-primary btn-sm">Valider la transmission</a>
        @endif
            <hr>  </h5>

        <div class="row">
            <div class="col-md-4">
                <label>Courtier</label>
                <input type="text" value="{{$Courrier->courtier}}" class="form-control" name="courtier" readonly>
            </div>
            <div class="col-md-4">
                <label>Voie de transmission</label>
                @php
                    $Voie=\App\Models\Voiestransmission::find($Courrier->idVoieTrans);
                @endphp
                <input type="text" value="@if($Voie) {{$Voie->voietransmission}} @endif" class="form-control" name="courtier" readonly>
            </div>
            <div class="col-md-4">
                <label>Type de réception</label>
                <input type="text" value="{{$Courrier->reception}}" class="form-control" name="courtier" readonly>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-6">
                <label>Type de courrier</label>
                 @php
                    $TypeCourrier=\App\Models\Typecourrier::find($Courrier->idTypeCourrier);
                 @endphp
                <input type="text" value="@if($TypeCourrier) {{$TypeCourrier->typeCourrier}} @endif" class="form-control" name="courtier" readonly>
            </div>
            <div class="col-md-6">
                <label>Numero</label>
                <input type="text" value="{{$Courrier->numero}}" class="form-control" name="numero" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <label>Objet</label>
                <input type="text" value="{{$Courrier->objet}}" class="form-control" name="objet" readonly><br>
                <div class="row">
                    <div class="col-md-6">
                        <label>Date réception</label>
                        <input type="date" class="form-control"  value="{{$Courrier->dateEnregistrement}}" name="reception" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Nombre de colis</label>
                        <input type="number"  value="{{$Courrier->nombreColis}}" class="form-control" min="0" name="nbreColis" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label>Contenu</label>
                <textarea class="form-control" name="contenu" readonly>{{$Courrier->contenu}}</textarea>
                @if($Courrier->piece_jointe)
                <br>
                <a target="_blank" href="{{asset($Courrier->piece_jointe)}}" class="btn btn-success btn-sm">Voire les Pièce jointe</a>
                @endif
            </div>
        </div> <br>
        <div class="row">
            <div class="col-md-4">
                <label>Destinataire</label>
                @php
                   $Destinataire=\App\Models\User::findOrFail($Courrier->destinataire);
                @endphp
                <input type="text" value="@if($Destinataire) {{$Destinataire->prenom}} {{$Destinataire->nom}} @endif" class="form-control" name="courtier" readonly>
            </div>
            <div class="col-md-4">
                <label>Poids (Kg)</label>
                <input type="number" value="{{$Courrier->poids}}" min="0" class="form-control" name="poids" readonly>
            </div>
            <div class="col-md-4">
                <label>Frais Expédition</label>
                <input type="number" value="{{$Courrier->frais}}" min="0" class="form-control" name="frais" readonly>
            </div>
        </div>

@endsection
