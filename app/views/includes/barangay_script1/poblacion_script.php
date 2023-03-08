
<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    const labels16 = <?php echo json_encode($label16) ?>;
    const num16 = <?php echo json_encode($dataset16) ?>;
    var ctx = document.getElementById("piepoblacion");
    var myPieChart16 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels16,
            datasets: [{
                data: num16,
                backgroundColor: ['#007bff', '#dc3545', '#008080', '#800000','#20c997', '#008080', '#805c00', '#ffc107', '#28a745'],
            }],
        },
    });

</script>