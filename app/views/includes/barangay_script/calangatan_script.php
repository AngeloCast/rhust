<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    const labels1 = <?php echo json_encode($label1) ?>;
    const num1 = <?php echo json_encode($dataset1) ?>;
    var ctx1 = document.getElementById("chartcalangatan");
    var myPieChart1 = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: labels1,
            datasets: [{
                data: num1,
                backgroundColor: ['#007bff', '#dc3545', '#ffc107','#007bff', '#dc3545', '#008080', '#800000','#20c997', '#008080', '#805c00', '#ffc107', '#28a745', '#28a745'],
            }],
        },
    });

</script>

<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    const labels11 = <?php echo json_encode($label11) ?>;
    const num11 = <?php echo json_encode($dataset11) ?>;
    var ctx = document.getElementById("piecalangatan");
    var myPieChart11 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels11,
            datasets: [{
                data: num11,
                backgroundColor: ['#007bff', '#dc3545', '#008080', '#800000','#20c997', '#008080', '#805c00', '#ffc107', '#28a745'],
            }],
        },
    });

</script>