<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    const labels4 = <?php echo json_encode($label4) ?>;
    const num4 = <?php echo json_encode($dataset4) ?>;
    var ctx2 = document.getElementById("chartlumangbayan");
    var myPieChart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: labels4,
            datasets: [{
                data: num4,
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#007bff', '#dc3545', '#008080', '#800000','#20c997', '#008080', '#805c00', '#ffc107', '#28a745', '#28a745'],
            }],
        },
    });
</script>

<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    const labels14 = <?php echo json_encode($label14) ?>;
    const num14 = <?php echo json_encode($dataset14) ?>;
    var ctx = document.getElementById("pielumangbayan");
    var myPieChart14 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels14,
            datasets: [{
                data: num14,
                backgroundColor: ['#007bff', '#dc3545', '#008080', '#800000','#20c997', '#008080', '#805c00', '#ffc107', '#28a745'],
            }],
        },
    });

</script>