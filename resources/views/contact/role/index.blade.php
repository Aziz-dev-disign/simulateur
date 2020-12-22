@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>
<!-- bouttons -->
<div class="col-md-6">
    <a href="{{route('admin.permissions.index')}}" class="btn btn-primary">Ajouter une permission</a>
</div><br><br><br>
<div class="ln_solid"></div>

<!-- Formulaire -->
<form class="form-horizontal form-label-left"  method="POST" action="{{route('admin.roles.store')}}" enctype="multipart/form-data">
    @csrf
    

    <div class="form-group">
        <label class="required" for="permissions">Permissions</label>
        <div style="padding-bottom: 4px">
            <span class="btn btn-info btn-xs select-all" style="border-radius: 0">Tout selectionner</span>
            <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">Tout deselectionner</span>
        </div>
        <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
            @foreach($permissions as $id => $permissions)
                <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
            @endforeach
        </select>
        @if($errors->has('permissions'))
            <div class="invalid-feedback">
                {{ $errors->first('permissions') }}
            </div>
        @endif
    </div>           
     <div class="form-group">
        <label class="required" for="nom">Nom</label>
        <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', '') }}" required>
        @if($errors->has('nom'))
            <div class="invalid-feedback">
                {{ $errors->first('nom') }}
            </div>
        @endif
    </div>
    @can('role_create')        
        <div class="form-group">
            <button class="btn btn-success" type="submit">
                Enregistrer
            </button>
        </div>
    @endcan
</form>

<div class="ln_solid"></div>
<!-- Tables -->
<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>N°</th>
            <th>Role</th>
            <th>Permissions</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            <?php $i=0?>
            @foreach ($roles as $role)
                <?php $i++; ?>
                <tr data-entry-id="{{$role->id}}">
                    <td>{{$i}}</td>
                    <td>{{$role->nom}}</td>
                    <td>
                        @foreach ($role->permissions as $key =>$items)
                            <span class="badge badge-info">{{$items->nom}}</span>
                        @endforeach
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                @can('role_edit')                                    
                                    <a class="dropdown-item" href="{{route('admin.roles.edit', $role->id)}}">Edit</a>
                                @endcan
                                <div class="dropdown-divider"></div>
                                @can('role_delete')                                
                                    <div> 
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Etes vous sur'" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="dropdown-item" value="Supprimer">
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach            
        </tbody>
    </table>
</div>
@endsection

@section('script')
    <script>
        
        $('.select-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        })
        $('.deselect-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        })

        $('.select2').select2()

    </script>
@endsection