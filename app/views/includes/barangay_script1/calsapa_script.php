
<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    const labels12 = <?php echo json_encode($label12) ?>;
    const num12 = <?php echo json_encode($dataset12) ?>;
    var ctx = document.getElementById("piecalsapa");
    var myPieChart12 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels12,
            datasets: [{
                data: num12,
                backgroundColor: ['#007bff', '#dc3545', '#008080', '#800000','#20c997', '#008080', '#805c00', '#ffc107', '#28a745'],
            }],
        },
    });

</script>