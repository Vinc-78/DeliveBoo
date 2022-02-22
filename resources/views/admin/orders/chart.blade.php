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

          

                {{-- Codice di prova per lo stile  --}}

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <script>
            const labelsdue = [
              'Gennaio',
              'Febbraio',
              'Marzo',
              'Aprile',
              'Maggio',
              'Giugno',
              'Luglio',
              'Agosto',
              'Settembre',
              'Ottobre',
              'Novembre',
              'Dicembre',
            ];
          
            const datadue = {
              labels: labelsdue,
              datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45, 24, 35, 58, 45, 42],
              }]
            };
          
            const configdue = {
                type: 'bar',
                data: datadue,
                options: {
                    responsive: true,
                    plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Secondo ordine'
                    }
                    }
                }
                };

              const labels = [
              'Gennaio',
              'Febbraio',
              'Marzo',
              'Aprile',
              'Maggio',
              'Giugno',
              'Luglio',
              'Agosto',
              'Settembre',
              'Ottobre',
              'Novembre',
              'Dicembre',
            ];

                const data = {
              labels: labels,
              datasets: [{
                label: 'Dati Ordini Primo',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [15, 25, 32, 47, 1, 0, 0, 25, 15, 25, 85, 56],
              }]
            };

                const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Primo diagramma'
                    }
                    }
                }
                }; 

                
          </script>


            <script>
                const myChartdue = new Chart(
                document.getElementById('myChart2'),
                configdue
                );
            
                const myChart = new Chart(
                document.getElementById('myChart'),
                config
                );
            </script>
           
           


           




           
       
    </div>        


@endsection