@extends('contact.layouts.accueil')

@section('header')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container" style="display: inline-block;" >
        <div class="tile_count">
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
            <div class="count">{{$users->count()}}</div>
          </div>
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Users inactif</span>
            <div class="count red">{{$usersInactifs->count()}}</div>
          </div>
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Users actif</span>
            <div class="count green">{{$usersActifs->count()}}</div>
          </div>
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-comment"></i> Rendez-vous</span>
            <div class="count">{{$rdvs->count()}}</div>
          </div>
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-calculator"></i> Simulateurs</span>
            <div class="count">{{$simulateurs->count()}}</div>
          </div>
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-calculator"></i>Simulateurs actifs</span>
            <div class="count green">{{$simulateurActif->count()}}</div>
          </div>
        </div>
      </div>
@endsection
