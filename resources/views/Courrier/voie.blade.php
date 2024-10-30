@extends('Dash.app')
@section('title')
   Voies de transmission
@endsection
@section('content')

    <h5 class="card-title">Gestion des voies de transmissions |
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Ajouter une voie de transmission
        </button></h5>

    <table class="table datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Voie de transmission</th>
            <th>Description</th>
            <th>Etat</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
             @foreach($Vt as $i=>$vt)
                 <tr>
                     <td>{{$i+1}}</td>
                     <td>{{$vt->voietransmission}}</td>
                     <td>{{$vt->descriptionVt}}</td>
                     <td>@if($vt->etatVt==0) Bloqué @else Actif @endif</td>
                     <td>
                         <a type="button" data-bs-toggle="modal" data-bs-target="#basicModal{{$vt->id}}" class="btn btn-success "><i class="bi bi-check-circle"></i></a>
                         <a type="button" onclick="return confirm('Voulez-vous supprimé ?')" href="{{route('delete_voiet',Crypt::encrypt($vt->id))}}" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></a>

                         <div class="modal fade" id="basicModal{{$vt->id}}" tabindex="-1">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title">Modification de la voie de transmission</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form action="{{route('Update_VoieTransmission',Crypt::encrypt($vt->id))}}" method="post">
                                             @csrf
                                             <label>Voie de transmission</label>
                                             <input type="text" value="{{$vt->voietransmission}}" class="form-control" name="voie" required><br>
                                             <label>Description</label>
                                             <textarea class="form-control" name="description">{{$vt->descriptionVt}}</textarea><br>
                                             <label>Etat</label>
                                             <select class="form-control" name="etat" required>
                                                 <option value="{{$vt->etatVt}}">Changer</option>
                                                 <option value="0">Bloquer</option>
                                                 <option value="1">Activer</option>
                                             </select><br>
                                             <div class="modal-footer">
                                                 <input type="submit" value="Modifier" class="btn btn-warning btn-sm">
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
                    <h5 class="modal-title">Formulaire d'ajout d'une voie de transmission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('Add_VoieTransmission')}}" method="post">
                        @csrf
                        <label>Voie de transmission</label>
                        <input type="text" class="form-control" name="voie" required><br>
                        <label>Description</label>
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
