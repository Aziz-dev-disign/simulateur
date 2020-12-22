@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

<!-- Formulaire -->
<form class="form-horizontal form-label-left"  method="POST" action="{{route('admin.permissions.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="required" for="nom">Permission <span>*</span></label>
        <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom') }}">
        @if($errors->has('nom'))
            <div class="invalid-feedback">
                {{ $errors->first('nom') }}
            </div>
        @endif
    </div>
    @can('permission_create')        
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enregistrer</button>
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
            <th>Permissions</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            <?php $i=0?>
            @foreach ($permissions as $permission)
                <?php $i++; ?>
                <tr data-entry-id="{{$permission->id}}">
                    <td>{{$i}}</td>
                    <td>{{$permission->nom}}</td>
                    <td>
                        @foreach ($permission->permissionsRole as $key => $item)
                            <span class="badge badge-info">{{$item->nom}}</span>
                        @endforeach
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                @can('permission_edit')                                    
                                    <a class="dropdown-item" href="{{route('admin.permissions.edit', $permission->id)}}">Edit</a>
                                @endcan
                            <div class="dropdown-divider"></div>
                                @can('permission_delete')
                                <div> 
                                    <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Etes vous sur'" style="display: inline-block;">
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