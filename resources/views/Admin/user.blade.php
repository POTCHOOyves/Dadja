@extends('Dash.app')
@section('title')
    Utilisateurs
@endsection
@section('content')

    <h5 class="card-title">Gestion des Utilisateurs |
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Ajouter un utilisateur
        </button></h5>

    <table class="table datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>E-mail</th>
            <th>contact</th>
            <th>Poste</th>
            <th>Etat</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
           @foreach($User as $i=>$user)
               <tr>
                   <td>{{$i+1}}</td>
                   <td>{{$user->nom}} {{$user->prenom}}</td>
                   <td>{{$user->email}}</td>
                   <td>{{$user->contact}}</td>
                   <td>
                       @php
                         $Pos=\App\Models\Poste::find($user->poste);
                       @endphp
                       @if($Pos) {{$Pos->poste}} @endif
                   </td>
                   <td>@if($user->etat==0) Bloqué @else Actif @endif</td>
                   <td>
                       <a type="button" data-bs-toggle="modal" data-bs-target="#basicModal{{$user->id}}" class="btn btn-success "><i class="bi bi-check-circle"></i></a>
                       <a type="button" onclick="return confirm('Voulez-vous supprimé ?')" href="{{route('delete_user',Crypt::encrypt($user->id))}}" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></a>

                       <div class="modal fade" id="basicModal{{$user->id}}" tabindex="-1">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title">Formulaire de modification de l'utilisateur</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                       <form action="{{route('Update_User',Crypt::encrypt($user->id))}}" method="post">
                                           @csrf
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <label>Nom</label>
                                                   <input type="text" value="{{$user->nom}}" class="form-control" name="nom" required>
                                               </div>
                                               <div class="col-md-6">
                                                   <label>Prenoms</label>
                                                   <input type="text" value="{{$user->prenom}}" class="form-control" name="prenom" required>
                                               </div>
                                           </div>
                                           <br>
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <label>Poste:  @if($Pos) {{$Pos->poste}} @endif</label>
                                                   <select class="form-control" name="poste" required>
                                                       <option value="{{$user->poste}}">Changer</option>
                                                       @foreach($Poste as $Pos)
                                                           <option value="{{$Pos->id}}">{{$Pos->poste}}</option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                               <div class="col-md-6">
                                                   <label>E-mail</label>
                                                   <input value="{{$user->email}}" type="email" class="form-control" name="email" required>
                                               </div>
                                           </div>
                                           <br>

                                           <div class="row">
                                               <div class="col-md-6">
                                                   <label>Contact</label>
                                                   <input value="{{$user->contact}}" type="text" class="form-control" name="contact" required>
                                               </div>
                                               <div class="col-md-6">
                                                   <label>Adresse</label>
                                                   <input value="{{$user->adresse}}" type="text" class="form-control" name="adresse" required>
                                               </div>
                                           </div>
                                           <br>
                                           <div class="row">
                                               <div class="col-md-4">
                                                   <label>Etat: @if($user->etat==0) Bloqué @else Actif @endif</label>
                                                   <select class="form-control" name="etat" required>
                                                       <option value="{{$user->etat}}">Changer</option>
                                                       <option value="0">Bloqué</option>
                                                       <option value="1">Activé</option>
                                                   </select>
                                               </div>
                                               <div class="col-md-8">
                                                   <label>Type d'utilisateur: {{$user->typeUser}}</label>
                                                   <select class="form-control" name="type" required>
                                                       <option value="{{$user->typeUser}}">Choisir</option>
                                                       <option value="Admin">Admin</option>
                                                       <option value="Super Admin">Super Admin</option>
                                                   </select>
                                               </div>
                                           </div>
                                           <br>
                                           <div class="modal-footer">
                                               <input type="submit" value="Modifier" class="btn btn-primary btn-sm">
                                               <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                                           </div>
                                       </form>
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
                    <h5 class="modal-title">Formulaire d'ajout d'un utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('Add_User')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="nom" required>
                            </div>
                            <div class="col-md-6">
                                <label>Prenoms</label>
                                <input type="text" class="form-control" name="prenom" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Poste</label>
                                <select class="form-control" name="poste" required>
                                    <option value="">Choisir</option>
                                    @foreach($Poste as $Poste)
                                        <option value="{{$Poste->id}}">{{$Poste->poste}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                       <br>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Contact</label>
                                <input type="text" class="form-control" name="contact" required>
                            </div>
                            <div class="col-md-6">
                                <label>Adresse</label>
                                <input type="text" class="form-control" name="adresse" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Mot de passe</label>
                                <input type="text" value="1234" class="form-control" name="password" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Type d'utilisateur</label>
                                <select class="form-control" name="type" required>
                                    <option value="">Choisir</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Super Admin">Super Admin</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <input type="submit" value="Ajouter" class="btn btn-primary btn-sm">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->

@endsection
