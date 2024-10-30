@extends('Dash.app')
@section('title')
    Type de courriers
@endsection
@section('content')

    <h5 class="card-title">Gestion des types de courriers |
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Ajouter un type de courrier
        </button></h5>

    <table class="table datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Libelle type de courrier</th>
            <th>Description</th>
            <th>Etat</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
             @foreach($Type as $i=>$type)
                 <tr>
                     <td>{{$i+1}}</td>
                     <td>{{$type->typeCourrier}}</td>
                     <td>{{$type->descriptionCourrier}}</td>
                     <td>@if($type->etatCourrier==0) Bloqué @else Actif @endif</td>
                     <td>
                         <a type="button" data-bs-toggle="modal" data-bs-target="#basicModal{{$type->id}}" class="btn btn-success "><i class="bi bi-check-circle"></i></a>
                         <a type="button" onclick="return confirm('Voulez-vous supprimé ?')" href="{{route('delete_typecourrier',Crypt::encrypt($type->id))}}" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></a>

                         <div class="modal fade" id="basicModal{{$type->id}}" tabindex="-1">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title">Formulaire de modification du type de courrier</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form action="{{route('Update_Courrier',Crypt::encrypt($type->id))}}" method="post">
                                             @csrf
                                             <label>Type de courrier</label>
                                             <input value="{{$type->typeCourrier}}" type="text" class="form-control" name="type" required><br>
                                             <label>Description</label>
                                             <textarea class="form-control" name="description">{{$type->descriptionCourrier}}</textarea><br>
                                             <label>Etat : @if($type->etatCourrier==0) Bloqué @else Actif @endif</label>
                                             <select class="form-control" name="etat" required>
                                                 <option value="{{$type->etatCourrier}}">Changer</option>
                                                 <option value="0">Bloqué</option>
                                                 <option value="1">Activé</option>
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
                    <h5 class="modal-title">Formulaire d'ajout d'un type de courrier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('Add_Courrier')}}" method="post">
                        @csrf
                        <label>Type de courrier</label>
                        <input type="text" class="form-control" name="type" required><br>
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
