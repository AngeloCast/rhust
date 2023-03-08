<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    const labels17 = <?php echo json_encode($label17) ?>;
    const num17 = <?php echo json_encode($dataset17) ?>;
    var ctx = document.getElementById("piecaagutayan");
    var myPieChart17 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels17,
            datasets: [{
                data: num17,
                backgroundColor: ['#007bff', '#dc3545', '#008080', '#800000','#20c997', '#008080', '#805c00', '#ffc107', '#28a745'],
            }],
        },
    });

</script>