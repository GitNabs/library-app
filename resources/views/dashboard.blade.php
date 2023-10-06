@extends('layout')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="mb-5">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-book"></i>
                        <h5 class="card-title m-0 p-1">No. of Books</h5>
                    </div>
                    <p class="card-text">{{ $books }}</p>
                </div>
            </div>
        </div>
        </div>
        <div class="col-6">
            <div class="ms-5">
                <div class="card" >
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-user"></i>
                            <h5 class="card-title m-0 p-1">No. of Users</h5>
                        </div>
                        <p class="card-text">{{ $users }}</p>
                    </div>
                </div>
            </div>
        </div>    
        <div class="col-6">
            <div class="mb-5">
            <div class="card" >
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-thumbs-down"></i>
                        <h5 class="card-title m-0 p-1">Unreturned Books</h5>
                    </div>
                    <p class="card-text">{{ $unreturned }}</p>
                </div>
            </div>
        </div>
        </div>  
        <div class="col-6">  
            <div class="ms-5">
                <div class="card" >
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-check"></i>
                            <h5 class="card-title m-0 p-1">Available Books</h5>
                        </div>
                        <p class="card-text">{{ $available }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card w-100 p-3 d-flex align-items-center">
        
            <div class="card-body w-20">
                <canvas id="myChart" height="100px"></canvas>
            </div>
        
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            const data = {
                labels: [
                    'Returned Books',
                    'Unreturned Books'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [{{ $returned }}, {{ $unreturned }}],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };

            // const data = {
            //     labels: labels,
            //     datasets: [{
            //     backgroundColor: 'rgb(255, 99, 132)',
            //     borderColor: 'rgb(255, 99, 132)',
            //     data: transactions,
            //     }]

            // };

        

            const config = {
                type: 'doughnut',
                data: data,
                options: {}
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        });
    </script>
@endpush