
<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    const labels13 = <?php echo json_encode($label13) ?>;
    const num13 = <?php echo json_encode($dataset13) ?>;
    var ctx = document.getElementById("pieilag");
    var myPieChart13 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels13,
            datasets: [{
                data: num13,
                backgroundColor: ['#007bff', '#dc3545', '#008080', '#800000','#20c997', '#008080', '#805c00', '#ffc107', '#28a745'],
            }],
        },
    });

</script>