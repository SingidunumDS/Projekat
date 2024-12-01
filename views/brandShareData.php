<?php
$cars = [];
$values = [];

foreach($params as $param)
{
    $cars[] = $param["brand"];
    $values[] = $param["broj_automobila"];
}

?>

<div class="container py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header pb-0">
                    <h6 class="text-uppercase text-sm">Brand Share Report</h6>
                </div>
                <div class="card-body">
                    <!-- Div za prikaz grafa -->
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const brandData = <?= json_encode($cars); ?>;
    const values = <?= json_encode($values); ?>;
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: brandData,
            datasets: [{
                label: '# of Votes',
                data: values,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

