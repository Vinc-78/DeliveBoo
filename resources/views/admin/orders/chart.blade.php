@extends('layouts.statistiche')

@section('content')
    <div class="container">
        <div class="mb-3">
            <button class="btn btn-secondary"><a class="text-white" href={{ route('admin.home') }}>Torna alla dashboard</a></button>
        </div>
            {{-- Inserisci i grafici --}}
            <div class="row mt-5">
                <div class="col-md-8 col-xs-12 mb-3 mx-auto">
                    <canvas id="myChart" width="240px" height="160px"></canvas>
                </div>

            </div>

        <script>
           
            
            const data = {
                labels: <?php echo json_encode($label_months) ?>,
                datasets: [
                    {
                        type: 'line',
                        label: 'Entrate per mese in €',
                        backgroundColor: 'rgb(92, 221, 53)',
                        borderColor: 'rgb(210, 221, 53)',
                        data: <?php echo json_encode($chart_total) ?>,
                        yAxisID: 'y2',
                    },
                    {
                        type: 'bar',
                        label: 'Numero di Ordini per mese',
                        backgroundColor: 'rgb(79, 44, 206)',
                        borderColor: 'rgb(240, 234, 235)',
                        data: <?php echo json_encode($chart_orders) ?>,
                    },
                ]
            };

            const config = {
            type: 'scatter',
            data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            
                        }
                    },
                    scales: {
                        y: {
                            min: 0,
                            
                        },
                        y2: {
                            min: 0,
                            
                        }
                    }
                }
            }; 

                
        </script>


        <script>

            const myChart = new Chart(
            document.getElementById('myChart'),
            config
            );

            const myChartdue = new Chart(
            document.getElementById('myChart2'),
            configdue
            );
        
            
        </script>
    </div>        


@endsection