@extends('Dash.app')
@section('title')
    Poste
@endsection
@section('content')

    <h5 class="card-title">Gestion des postes |
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Ajouter un poste
        </button></h5>

    <table class="table datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Département</th>
            <th>Poste</th>
            <th>Description</th>
            <th>Etat</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
           @foreach($Poste as $i=>$poste)
               <tr>
                   <td>{{$i+1}}</td>
                   <td>
                       @php
                          $dep=\App\Models\Departement::find($poste->departement);
                       @endphp
                       @if($dep) {{$dep->departement}} @endif
                   </td>
                   <td>{{$poste->poste}}</td>
                   <td>{{$poste->descriptionPoste}}</td>
                   <td>@if($poste->etatPoste==0) Bloqué  @else Actif @endif</td>
                   <td>
                       <a type="button" data-bs-toggle="modal" data-bs-target="#basicModal{{$poste->id}}" class="btn btn-success "><i class="bi bi-check-circle"></i></a>
                       <a type="button" onclick="return confirm('Voulez-vous supprimé ?')" href="{{route('delete_poste',Crypt::encrypt($poste->id))}}" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></a>

                       <div class="modal fade" id="basicModal{{$poste->id}}" tabindex="-1">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title">Formulaire de modification du poste</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                       <form action="{{route('Update_Poste',Crypt::encrypt($poste->id))}}" method="post">
                                           @csrf
                                           <label>Département: @if($dep) {{$dep->departement}} @endif</label>
                                           <select class="form-control" name="departement" required>
                                               <option value="{{$poste->departement}}">Changer</option>
                                               @foreach($Departement as $departeme)
                                                   <option value="{{$departeme->id}}">{{$departeme->departement}}</option>
                                               @endforeach
                                           </select><br>
                                           <label>Poste</label>
                                           <input type="text" value="{{$poste->poste}}" class="form-control" name="poste" required><br>
                                           <label>Description du poste</label>
                                           <textarea class="form-control" name="description">{{$poste->descriptionPoste}}</textarea><br>
                                           <label>Etat: @if($poste->etatPoste==0) Actif @else Bloqué @endif</label>
                                           <select class="form-control" name="etat" required>
                                               <option value="{{$poste->etatPoste}}">Changer</option>
                                               <option value="0">Bloqué</option>
                                               <option value="1">Activé</option>
                                           </select><br>
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
                    <h5 class="modal-title">Formulaire d'ajout d'un poste</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('Add_Poste')}}" method="post">
                        @csrf
                        <label>Département</label>
                        <select class="form-control" name="departement" required>
                            <option value="">Choisir</option>
                            @foreach($Departement as $departement)
                                <option value="{{$departement->id}}">{{$departement->departement}}</option>
                            @endforeach
                        </select><br>
                        <label>Poste</label>
                        <input type="text" class="form-control" name="poste" required><br>
                        <label>Description du poste</label>
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
