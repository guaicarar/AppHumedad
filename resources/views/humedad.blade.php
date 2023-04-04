@extends('layouts.app')

@section('content')

<section class="content container">
    <div class="row"> 
        <div class="col-md-6" > <!-- style="background-color: aqua" -->
            <div class="card border-primary " style="max-width: 80rem;">
                <div class="card card-default">
                    <div class="card-header border-primary ">
                        <span class="card-title text-center">Mapa de la Ciudad</span>
                    </div>
                    <div id="map">
                        <iframe id="locationFrame" width="541"
                        height="500" src="https://www.google.com/maps?q={{$cityOne}}&hl=es;z=14&output=embed&z=15" frameborder="10"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-6 text-center" >
            <div class="row" > 
                <form class="form-inline" action="{{route('view-map')}}" method="post">
                    @csrf
                    <label for="usuario_id">Seleccione el País de EEUU</label>
                    <div class="form-group mx-sm-3 mb-2">
                        <select name="city" id="city" class="form-control">
                            <option value="">Seleccione ....</option>
                            <option value="Miami" {{ old('city') == 'Miami'? 'selected' : ''}}>Miami</option>
                            <option value="Orlando" {{ old('city') == 'Orlando'? 'selected' : ''}}>Orlando</option>
                            <option value="New York" {{ old('city') == 'New York'? 'selected' : ''}}>New York</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </form>
            </div> 
            <div class="row" > 
                <div class="col-md-12">
                    <div class="card border-primary mb-3" style="max-width: 80rem;">
                        <div class="card">
                            <div class="card-header border-primary">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span id="card_title">
                                        {{ __('Datos') }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-primary table-hover">
                                    <thead>
                                        <tr>
                                            <th>País</th>
                                            <th>Ciudad</th>
                                            <th>Humedad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>{{$dataApi['country']}}</th>
                                            <th>{{$cityOne}}</th>
                                            <th>{{$dataApi['humidity']. '%'}}</th>
                                        </tr> 
                                    </tbody>
                               </table>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection