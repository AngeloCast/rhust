

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