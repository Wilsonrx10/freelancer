@extends('layouts.app')
@section('title', 'Vincular usuario')
@section('content')
<div class="container-fluid table-responsive" style="width: max-content; min-width: 100%">
   <div class="card justify-content-center h-100">
      <div class="card-header">
         <div class="row">
            <div class="col-md-5">
               <h3 class="modal-title">Usuarios Vinculado
                  ({{$empresa->usuarios()->whereHas('empresas', function ($query) use ($empresa) {
                  $query->where('empresa_id', $empresa->id)
                  ->where('usuario_empresas.status', '1');
                  })->count()}})
               </h3>
            </div>
            <div class="col-md-7 page-action text-right">
               <a onclick="SubmitForm()" class="btn btn-primary btn-sm"> <i
                  class="glyphicon glyphicon-plus-sign"></i>Confirmar</a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead class="thead-dark">
               <tr>
                  <th>Nome usuario</th>
                  <th>Email</th>
                  <th>Data</th>
                  <th class="text-center">Ações</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($usuarios as $item)
               @php
               $status = DB::table('usuario_empresas')->where('user_id',$item->id)->where('empresa_id',$empresa->id)->first()
               @endphp
               <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                  <td><input type="checkbox" name="vinculo[]" value="{{ $item->id }};{{ $item->empresas }}" class="user-checkbox"
                     id="user-{{ $item->id }}" @if($item->empresas->contains($empresa)
                     && $status && $status->status == '1'
                     ) checked @endif>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
      <script>
         $(document).ready(function() {
             $('#data-table').DataTable();
         });
         
         let selectedUsers = [];
         let deselectUsers = [];
         let empresa_id = @json($empresa->id);
         
         function SelectChecked() {
             document.querySelectorAll('.user-checkbox').forEach(function(checkbox) {
                 checkbox.addEventListener('change', function() {
                     let values = this.value.split(';');
                     let userId = values[0];
                     let empresa = JSON.parse(values[1]);
                     
                     if (this.checked) {
                         selectedUsers.push(userId);
                         RemovePosition(deselectUsers,userId)
                     } else {
                        if (empresa) {
                            let empresa_referente = empresa.find((item) => item.pivot.empresa_id === empresa_id);
                            if (empresa_referente) {
                                let exists = deselectUsers.includes(userId);
                                if(!exists) {
                                    deselectUsers.push(userId)
                                    RemovePosition(selectedUsers,userId)
                                } 
                            }
                        }
                         let index = selectedUsers.indexOf(userId);
                         if (index !== -1) {
                             selectedUsers.splice(index, 1);
                         }
                     }
                     console.log(deselectUsers);
                     console.log(selectedUsers);
                 });
             });
         }
         
         function RemovePosition(array,id) {
            let index = array.indexOf(id);
            if (index !== -1) {
                array.splice(index, 1);
            }
         }
         
         function SubmitForm() {
         
             csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
         
             event.preventDefault();
             
             fetch('/saveUserEmpresa', {
                     method: 'POST',
                     headers: {
                         'X-CSRF-TOKEN': csrfToken,
                         'Content-Type': 'application/json'
                     },
                     body: JSON.stringify({
                         empresa_id: empresa_id,
                         selectedUsers: selectedUsers,
                         deselectUsers: deselectUsers
                     })
                 })
                 .then(function(response) {
                     if (response.ok) {
                        return location.reload();
                     } else {
                         throw new Error('Erro na solicitação.');
                     }
                 })
                 .then(function(data) {
                     console.log(data);
                 })
                 .catch(function(error) {
                     console.log(error);
                 });
         }
         
         document.addEventListener('DOMContentLoaded', function() {
             SelectChecked()
         });
      </script>
   </div>
</div>
@endsection