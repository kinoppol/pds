<?php
    $title="ภาพรวม";
?>
<div class="card"><div class="card-body"><div class="row"><div class="col-12 col-md-12 col-lg-12">


</div>
</div>
</div>
</div>

<div class="row">
<div class="col-12 col-lg-6">
<div class="card"><div class="card-body">
<p class="text-muted text-center">Payment methods usage</p>
<canvas id="pay-methods" height="120"></canvas>
</div>
</div>
</div>

<?php
    $systemFoot.="
    <script>
    var ctx = document.getElementById('pay-methods').getContext('2d');

    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Credit card', 'Debit card', 'Cash', 'Other'],
        datasets: [{
          data: [48, 27, 18, 7],
          backgroundColor: [
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 159, 64, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)'
          ]
        }]
      },
        responsive: true,
        tooltips: {
          enabled: true,
          mode: 'single',
          callbacks: {
            label: function (tooltipItems, data) {
              var dataset = data.datasets[tooltipItems.datasetIndex]
              var value = dataset.data[tooltipItems.index]
  
              return value + '%';
            }
          }
        }
      }
    });
    </script>";
?>

<div class="col-12 col-lg-6">
<div class="card"><div class="card-body">
<p class="text-muted text-center">Payment methods usage</p>
<canvas id="pay-methods2" height="120"></canvas>
</div>
</div>
</div>

<?php
    $systemFoot.="
    <script>
    var ctx = document.getElementById('pay-methods2').getContext('2d');

    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Credit card', 'Debit card', 'Cash', 'Other'],
        datasets: [{
          data: [48, 27, 18, 7],
          backgroundColor: [
            'rgba(255, 99, 132, 0.5)',
            'rgba(255, 159, 64, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)'
          ]
        }]
      },
      options: {
        responsive: true,
        tooltips: {
          enabled: true,
          mode: 'single',
          callbacks: {
            label: function (tooltipItems, data) {
              var dataset = data.datasets[tooltipItems.datasetIndex]
              var value = dataset.data[tooltipItems.index]
  
              return value + '%';
            }
          }
        }
      }
    });
    </script>";
?>
</div>