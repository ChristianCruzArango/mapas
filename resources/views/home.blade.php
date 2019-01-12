@extends('layouts.app')
@section('title','Examen | EnvioZapp')
@section('body-class','profile-page sidebar-collapse')
    <style>
        #mapid { height: 400px; }
    </style>
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('/img/bg7.jpg')}}')">
</div>
<div class="main main-raised ">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center title">Dashboard</h2>

                <div class="alert alert-success">
                    <div class="container-fluid">
                      <div class="alert-icon">
                        <i class="material-icons">info_outline</i>
                      </div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                      </button>
                      <b>información:</b>
                      <div id="resultado"></div>
                    </div>
                </div>
                @if (auth()->user()->role_id == 1)
                    <div class="card-body">
                        <label for="latitud">Latitud:</label>
                        <input id="latitud" type="text" />
                        <label for="longitud">Longitud:</label>
                        <input id="longitud" type="text" />
                        <div id="map"></div>
                    </div>
                    @else
                    @foreach ($mapas as $item)
                        <input type="hidden" name="latitud[]" id="latitud[]" value="{{ $item->latitud}}"></td>
                        <input type="hidden" name="longitud[]" id="longitud[]" value="{{ $item->longitud}}"></td>

                    @endforeach


                    <div id="map"></div>

                @endif




        </div>
    </div>
</div>
<script src="{{ asset('js/map/map.js') }}"></script>
<script src="{{ asset('js/map/mapclient.js') }}"></script>
@endsection
@mapscripts



















