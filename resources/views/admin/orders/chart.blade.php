@extends('layouts.statistiche')

@section('content')
    <div class="container">
        <div class="mb-3">
            <button class="btn btn-secondary"><a class="text-white" href={{ route('admin.home') }}>Torna alla dashboard</a></button>
        </div>
        
       
            
            {{-- Inserisci i grafici --}}
            <div class="row mt-5">
                <div class="col-xs-12 col-md-6 mb-3">
                    <canvas id="myChart" width="200px" height="200px"></canvas>
                </div>


                <div class="col-xs-12 col-md-6">
                    <canvas id="myChart2" width="200px" height="200px"></canvas>

                </div>
            </div>

            {{-- Aggiungere lo stile dei grafici (script)--}}

            

            <script type="application/javascript">
                var ctx = document.getElementById('myChart');
              
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: 
                        datasets: [{
                            label: 'Incasso anno' + ' ' 
                            data: [1,2,3,4,5,6,7,8,9,10,11,12]/* roundedOrders, */
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(153, 102, 255, 0.5)',
                                'rgba(255, 159, 64, 0.5)',
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(153, 102, 255, 0.5)',
                                'rgba(255, 159, 64, 0.5)',
                                'rgba(255, 100, 64, 0.5)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 159, 64, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            onClick: null,
                            labels: {
                                fontSize: 18,
                                boxSize: 0,
                                boxWidth: 0,
                            },
                        },
                        parsing: {
                            xAxisKey: 'year',
                            yAxisKey: 'month'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>

            <script>
                var ctx = document.getElementById('myChart2');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: 
                        datasets: [{
                            label: 'Ordini anno ' + year,
                            data: [1,2,3,4,5,6,7,8,9,10,11,12]/* order */, 
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(153, 102, 255, 0.5)',
                                'rgba(255, 159, 64, 0.5)',
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(153, 102, 255, 0.5)',
                                'rgba(255, 159, 64, 0.5)',
                                'rgba(255, 100, 64, 0.5)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(153, 102, 255, 0.5)',
                                'rgba(255, 159, 64, 0.5)',
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(153, 102, 255, 0.5)',
                                'rgba(255, 159, 64, 0.5)',
                                'rgba(255, 100, 64, 0.5)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            onClick: null,
                            labels: {
                                fontSize: 18,
                                boxSize: 0,
                                boxWidth: 0,
                            }
                        },
                        parsing: {
                            xAxisKey: 'year',
                            yAxisKey: 'month'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
       
    </div>        


@endsection