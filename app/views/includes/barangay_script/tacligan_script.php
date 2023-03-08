<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    const labels5 = <?php echo json_encode($label5) ?>;
    const num5 = <?php echo json_encode($dataset5) ?>;
    var ctx2 = document.getElementById("charttacligan");
    var myPieChart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: labels5,
            datasets: [{
                data: num5,
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#007bff', '#dc3545', '#008080', '#800000','#20c997', '#008080', '#805c00', '#ffc107', '#28a745', '#28a745'],
            }],
        },
    });
</script>

<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    const labels15 = <?php echo json_encode($label15) ?>;
    const num15 = <?php echo json_encode($dataset15) ?>;
    var ctx = document.getElementById("pietacligan");
    var myPieChart15 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels15,
            datasets: [{
                data: num15,
                backgroundColor: ['#007bff', '#dc3545', '#008080', '#800000','#20c997', '#008080', '#805c00', '#ffc107', '#28a745'],
            }],
        },
    });

</script>