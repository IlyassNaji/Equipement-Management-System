@extends('layouts.app1')

@section('content')

    <h2 class="fw-bolder py-3 mb-4">Equipements</h2>
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif

    <div class="demo-inline-spacing" style="margin-bottom: 50px;">
        <a style="color: white;" href="{{ route('equipement.search') }}" class="btn btn-lg btn-primary">
            <span class="tf-icons bx bx-search"></span>&nbsp;Rechercher
        </a>
    </div>
      
   
<!-- Liste des equipements -->
<div class="card my-5" style="padding: 10px;">
    <h5 class="card-header">Liste des equipements</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped" style="margin-bottom: 10px;">
            <thead>
                <tr>
                    <th>image</th>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Categorie</th>
                    <th>Description</th>
                    <th>Marque</th>
                    <th>Numero de Serie</th>
                    <th>modele</th>
                    <th>Date Achat</th>
                    <th>Emplacement</th>
                    <th>Etat</th> <!-- New Column for Chart -->
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($equipv as $Equipement)
                <tr>
                    <td><img width="50px" height="50px" src="{{asset($Equipement->image)}}" alt=""></td>
                    <td>{{ $Equipement->id_equipement }}</td>
                    <td>{{ $Equipement->nom }}</td>
                    <td>{{ $Equipement->categorie }}</td>
                    <td>{{ $Equipement->description }}</td>
                    <td>{{ $Equipement->marque}}</td>
                    <td>{{ $Equipement->numero_serie }}</td>
                    <td>{{ $Equipement->modele}}</td>
                    <td>{{ $Equipement->date_achat }}</td>
                    <td>{{ $Equipement->num_bureau }}</td>
                    <td>
                        <canvas width="50px" height="50px"  class="chartProgress" data-percent="{{ $Equipement->état }}"></canvas>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                @if(Auth::user()->usertype=="1")
                                <a class="dropdown-item" href="{{ route('equipement.assign', $Equipement->id_equipement) }}">
                                    <i class="'bx bx-check'"></i> affecter
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('equipement.details', $Equipement->id_equipement) }}">
                                <i class="bx bx-show me-1"></i> Detail
                                </a>
                                </a>
                                 @if(Auth::user()->usertype=="0")
                                 <a class="dropdown-item" href="{{ route('equipement.besoin', $Equipement->id_equipement) }}">
                                 <i class="bx bx-show me-1"></i> besoin
                                 </a>
                                 @endif        
                           

                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
             


                
            </tbody>
        </table>
    </div>
</div>

<!-- Script to initialize Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var charts = document.querySelectorAll('.chartProgress');
        charts.forEach(function(chart) {
            var percent = parseFloat(chart.dataset.percent);
            var backgroundColor = '#5283ff'; // Default color
            if (percent < 20) {
                backgroundColor = '#FF0000'; // Red
            } else if (percent > 50) {
                backgroundColor = '#00FF00'; // Green
            } else {
                backgroundColor = '#FFFF00'; // Yellow
            }
            var ctx = chart.getContext('2d');
            var myChartCircle = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        label: 'Etat',
                        percent: percent,
                        data: [percent, 100 - percent],
                        backgroundColor: [backgroundColor, '#eeeeee']
                    }]
                },
                options: {
                    cutoutPercentage: 85,
                    rotation: Math.PI / 2,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: false
                    }
                }
            });
        });
    });
</script>

@endsection
