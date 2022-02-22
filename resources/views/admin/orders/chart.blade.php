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
                label: 'Numero di Ordini per mese',
                backgroundColor: 'rgb(79, 44, 206)',
                borderColor: 'rgb(240, 234, 235)',
                data: [15, 25, 32, 47, 18, 30, 15, 25, 15, 25, 85, 56],
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
                        
                    }
                    }
                }
                }; 

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
                label: 'Entrate per mese in €',
                backgroundColor: 'rgb(92, 221, 53)',
                borderColor: 'rgb(210, 221, 53)',
                data: [50, 110, 85, 128, 400, 280, 350, 185, 350, 580, 450, 420],
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