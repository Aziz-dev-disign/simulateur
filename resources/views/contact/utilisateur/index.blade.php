@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

@can('user_create')
    <div class="col-md-12">
        <a href="{{route('admin.user.create')}}" class="btn btn-primary">Ajouter un utilisateur</a>
    </div>
@endcan
<br><br><br>
<div class="ln_solid"></div>

<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>N°</th>
            <th>Role</th>
            <th>Nom Prénom</th>
            <th>Email</th>
            <th>Statu</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            <?php $i=0 ?>
            @foreach ($users as $user)
                <?php $i++; ?>
                <tr data-entry-id="{{$user->id}}">
                    <td>{{$i}}</td>
                    <td>{{$user->roles->nom}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <span class="badge badge-danger">{{ $user->status }}</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                @can('user_create')                                
                                    <a class="dropdown-item" id="edit" href="{{route('admin.user.edit', $user->id)}}">Edit</a>
                                @endcan
                                <div class="dropdown-divider"></div>
                                @can('user_show')                                    
                                    <a class="dropdown-item" id="edit" href="{{route('admin.user.show', $user->id)}}">Détail</a>
                                @endcan
                                <div class="dropdown-divider"></div>
                                @can('user_delete')
                                    <div> 
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Etes vous sur'" style="display: inline-block;">
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