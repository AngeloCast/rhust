
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