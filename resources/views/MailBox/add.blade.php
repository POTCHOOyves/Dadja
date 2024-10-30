@extends('Dash.app')
@section('title')
    Envoyer courrier
@endsection
@section('content')

    <h5 class="card-title">Envoi de courrier électronique <hr>  </h5>
    <!-- Default Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Mail privé</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Mail à un département</button>
        </li>
    </ul>
    <div class="tab-content pt-2" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="padding: 20px">
            <form action="{{route('SendMail')}}" method="post" enctype="multipart/form-data">
                @csrf

                <label>Destinataire</label>
                <select class="form-control" name="destinataire" required>
                    <option value="">Choisir</option>
                    @foreach($User as $User)
                        <option value="{{$User->id}}">{{$User->nom}} {{$User->prenom}}</option>
                    @endforeach
                </select><br>
                <label>Objet</label>
                <input type="text" class="form-control" name="objet"><br>
                <label>Message</label>
                <textarea class="form-control" name="message" required></textarea><br>
                <label>Pièce jointe</label>
                <input type="file" class="form-control" name="fichier">
                <br>
                <input type="hidden" class="form-control" value="Personne" name="groupe" required>
                <div class="modal-footer">
                    <input type="submit" value="Envoyer" class="btn btn-primary btn-sm">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="padding: 20px">
            <form action="{{route('SendMail')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" value="groupe" name="groupe" required>
                <label>Destinataire</label>
                <select class="form-control" name="destinataire" required>
                    <option value="">Choisir</option>
                    @foreach($Dep as $Dep)
                        <option value="{{$Dep->id}}">{{$Dep->departement}}</option>
                    @endforeach
                </select><br>
                <label>Objet</label>
                <input type="text" class="form-control" name="objet"><br>
                <label>Message</label>
                <textarea class="form-control" name="message" required></textarea><br>
                <label>Pièce jointe</label>
                <input type="file" class="form-control" name="fichier">
                <br>
                <div class="modal-footer">
                    <input type="submit" value="Envoyer" class="btn btn-warning btn-sm">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div><!-- End Default Tabs -->
@endsection
