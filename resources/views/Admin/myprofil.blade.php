@extends('Dash.app')
@section('title')
    Utilisateurs
@endsection
@section('content')



        <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Informations personnelles</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Mot de passe</button>
                </li>

            </ul>
            <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                     <br>
                    <form action="{{route('Modification_User',Crypt::encrypt($user->id))}}" method="post">
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
                                <label>Contact</label>
                                <input value="{{$user->contact}}" type="text" class="form-control" name="contact" required>
                            </div>
                            <div class="col-md-6">
                                <label>Adresse</label>
                                <input value="{{$user->adresse}}" type="text" class="form-control" name="adresse" required>
                            </div>
                        </div>
                        <br>
                            <input type="submit" value="Modifier" class="btn btn-primary btn-sm">

                    </form>
                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form method="post" action="{{route('PasswordUpdate')}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
                            <div class="col-md-8 col-lg-9">
                                <input minlength="4" name="newpassword" type="text" class="form-control" id="newPassword" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmer le mot de passe</label>
                            <div class="col-md-8 col-lg-9">
                                <input minlength="4" name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Changer mot de passe</button>
                        </div>
                    </form>

                </div>

            </div><!-- End Bordered Tabs -->

        </div>

@endsection
