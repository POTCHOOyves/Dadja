@extends('Dash.app')
@section('title')
    Courriers Entrants
@endsection
@section('content')

    <h5 class="card-title">Enregistrement à un département  <hr>  </h5>

    <form action="{{route('Add_Courrier')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label>Courtier</label>
                <input type="text" class="form-control" name="courtier" required>
            </div>
            <div class="col-md-4">
                <label>Voie de transmission</label>
                <select class="form-control" name="voie" required>
                    <option value="">Choisir</option>
                    @foreach($Voietransaction as $Voietransaction)
                        <option value="{{$Voietransaction->id}}" title="{{$Voietransaction->descriptionVt}}">{{$Voietransaction->voietransmission}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>Type de reception</label>
                <select class="form-control" name="reception" required>
                    <option value="">Choisir</option>
                    <option value="Entrant">Courrier Entrant</option>
                    <option value="Sortant">Courrier Sortant</option>
                </select>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-6">
                <label>Type de courrier</label>
                <select class="form-control" name="typeCourrier" required>
                    <option value="">Choisir</option>
                    @foreach($TypeCourrier as $TypeCourrier)
                        <option value="{{$TypeCourrier->id}}" title="{{$TypeCourrier->descriptionCourrier}}">{{$TypeCourrier->typeCourrier}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>Numero</label>
                <input type="text" value="{{random_int(10,99)}}-{{random_int(1000,999999)}}/{{date('m-Y')}}" class="form-control" name="numero" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <label>Objet</label>
                <input type="text" class="form-control" name="objet" required><br>
                <div class="row">
                    <div class="col-md-6">
                        <label>Date réception</label>
                        <input type="date" class="form-control" value="{{date('Y-m-d')}}" name="reception" required>
                    </div>
                    <div class="col-md-6">
                        <label>Nombre de colis</label>
                        <input type="number" class="form-control" min="0" name="nbreColis" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label>Contenu</label>
                <textarea class="form-control" name="contenu"></textarea>
                <small>Pièce jointe</small>
                <input type="file" class="form-control" name="files">
            </div>
        </div> <br>
        <div class="row">
            <div class="col-md-4">
                <label>Destinataire</label>
                <select class="form-control" name="destinataire">
                    <option value="">Cliquez</option>
                    @foreach($User as $User)
                        <option value="{{$User->id}}">{{$User->departement}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>Poids (Kg)</label>
                <input type="number" min="0" class="form-control" name="poids" required>
            </div>
            <div class="col-md-4">
                <label>Frais Expédition</label>
                <input type="number" min="0" class="form-control" name="frais" required>
                <input type="hidden" class="form-control" value="groupe" name="groupe" required>
            </div>
        </div> <br>
        <div class="modal-footer">
            <input type="submit" value="Ajouter" class="btn btn-primary btn-sm">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
        </div>
    </form>

@endsection
