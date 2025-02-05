@extends('layouts.ManagerTemplate')

@section('title',"Request Supplies")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        View Analytics
    </p>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</div>
<div class="user-main-content">
<canvas id="myChart" style="width:70%;text-align:center;"></canvas>
</div>
<script>
    const dates = @json($dates);
    const dataset = @json($datasets);

    console.log("Dates:", dates);
    console.log("Dataset:", dataset);

    // Find the maximum value in the dataset
    const maxValue = Math.max(...dataset.data);

    new Chart("myChart", {
        type: "line",
        data: {
            labels: dates,
            datasets: [dataset]
        },
        options: {
            legend: { display: true },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: maxValue + 10, // Adds some space above the highest value
                        stepSize: Math.ceil(maxValue / 10), // Adjust step size dynamically
                    }
                }]
            }
        }
    });
</script>
@endsection
