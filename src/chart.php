<script src="src\canvasjs.min.js"></script>

<?php

$chart = new Bill;
/* choose month and year*/
$month = "02/2021";
$data = $chart->getMonth($month);
$dataPoints = array();

foreach ($data as $key => $val) {
    $dataPoints[] = array("label" => $key, "y" => $val);
}
?>

<script>
window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "dark1",
        animationEnabled: true,
        backgroundColor: "#181924",
        color: "white",
        //exportEnabled: true,
        title: {
            text: "Spending in February 2021"
        },
        subtitles: [{
            text: "Currency Used: Serbian RSD"
        }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "$ #,##0",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();

}
</script>