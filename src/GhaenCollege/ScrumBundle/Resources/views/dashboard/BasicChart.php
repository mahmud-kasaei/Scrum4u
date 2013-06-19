<?php
//We've included ../Includes/FusionCharts.php, which contains functions
//to help us easily embed the charts.
include("Includes/FusionCharts.php");
?>
<HTML>
<HEAD>
    <TITLE>FusionCharts Free - Simple Column 3D Chart</TITLE>
</HEAD>
<BODY>
<?php
//Create the chart - Column 3D Chart with data from Data/Data.xml
echo renderChartHTML("../../FusionCharts/FCF-Column3D.swf", "Data/Data.xml", "", "myFirst", 600, 300);
?>
</BODY>
</HTML>
