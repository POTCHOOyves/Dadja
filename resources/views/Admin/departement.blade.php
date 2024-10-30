@extends('Dash.app')
@section('title')
    Departement
@endsection
@section('content')

    <h5 class="card-title">Gestion des départements |
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Ajouter un département
        </button></h5>

    <table class="table datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Libelle Département</th>
            <th>Description</th>
            <th>Etat</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Departement as $i=>$departement)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{$departement->departement}}</td>
            <td>{{$departement->descriptionDepartement}}</td>
            <td>@if($departement->etatDepartement==0) Bloqué @else Actif @endif</td>
            <td>
                <a type="button" data-bs-toggle="modal" data-bs-target="#basicModal{{$departement->id}}" class="btn btn-success "><i class="bi bi-check-circle"></i></a>
                <a type="button" onclick="return confirm('Voulez-vous supprimé ?')" href="{{route('delete_departement',Crypt::encrypt($departement->id))}}" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></a>

                <div class="modal fade" id="basicModal{{$departement->id}}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Formulaire de modification du département</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('Update_Departement',Crypt::encrypt($departement->id))}}" method="post">
                                    @csrf
                                    <label>Libelle département</label>
                                    <input value="{{$departement->departement}}" type="text" class="form-control" name="libelle" required><br>
                                    <label>Description du département</label>
                                    <textarea class="form-control" name="description">{{$departement->descriptionDepartement}}</textarea><br>
                                    <label>Etat: @if($departement->etatDepartement==0) Bloqué @else Actif @endif</label>
                                    <select class="form-control" name="etat" required>
                                        <option value="{{$departement->etatDepartement}}">Changer</option>
                                        <option value="0">Bloquer</option>
                                        <option value="1">Activer</option>
                                    </select>

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
                    <h5 class="modal-title">Formulaire d'ajout de département</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <form action="{{route('Add_Departement')}}" method="post">
                       @csrf
                       <label>Libelle département</label>
                       <input type="text" class="form-control" name="libelle" required><br>
                       <label>Description du département</label>
                       <textarea class="form-control" name="description"></textarea><br>
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
