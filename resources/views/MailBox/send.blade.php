@extends('Dash.app')
@section('title')
    Boite d'envoi
@endsection
@section('content')

    <h5 class="card-title">Boîte d'envoi de courriers |
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Envoyer à un utilisateur
        </button>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#departement">
            Envoyer à un département
        </button>
    </h5>

    <table class="table datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Expéditeur</th>
            <th>Date et Heure</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Mail as $i=>$Mail)
            <tr>
                <td>{{$i+1}}</td>
                <td>
                    @php
                        $Expditeur=\App\Models\User::findOrFail($Mail->idCharge);
                    @endphp
                    @if($Expditeur) {{$Expditeur->prenom}} {{$Expditeur->nom}} @endif
                </td>
                <td>{{$Mail->dateEnvoi}} {{$Mail->heureEnregistrement}}</td>
                <td>
                    <a data-bs-toggle="modal" data-bs-target="#message" ><i class="ri-chat-1-line"></i> Ouvrir</a>

                    <div class="modal fade" id="message" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Objet : {{$Mail->objet}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label>Message</label>
                                    {{$Mail->contenu}}
                                    <br> <br>
                                    @if($Mail->piece_jointe)
                                        <a target="_blank" href="{{asset($Mail->piece_jointe)}}" type="button" class="btn btn-success btn-sm">Ouvrir pièce jointe</a>
                                    @endif
                                    <br>
                                    <br>
                                    <div class="modal-footer">
                                        <input type="submit" value="Ajouter" class="btn btn-primary btn-sm">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Basic Modal-->

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- End Table with stripped rows -->

    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Envoi de mail à un collègue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
            </div>
        </div>
    </div><!-- End Basic Modal-->


    <div class="modal fade" id="departement" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Envoi de mail à un département</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
            </div>
        </div>
    </div><!-- End Basic Modal-->

@endsection
