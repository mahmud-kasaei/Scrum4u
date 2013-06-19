<?php
//We've included ../Includes/FusionCharts.php, which contains functions
//to help us easily embed the charts.
include("Includes/FusionCharts.php");
?>
<HTML>
<HEAD>
    <TITLE>FusionCharts Free - Simple Column 3D Chart using dataXML method</TITLE>
</HEAD>
<BODY>

<?php
//Create an XML data document in a string variable
$strXML  = "";
$strXML .= "<graph caption='Monthly Unit Sales' xAxisName='Month' yAxisName='Units'
    decimalPrecision='0' formatNumberScale='0'>";
$strXML .= "<set name='Jan' value='462' color='AFD8F8' />";
$strXML .= "<set name='Feb' value='857' color='F6BD0F' />";
$strXML .= "<set name='Mar' value='671' color='8BBA00' />";
$strXML .= "<set name='Apr' value='494' color='FF8E46' />";
$strXML .= "<set name='May' value='761' color='008E8E' />";
$strXML .= "<set name='Jun' value='960' color='D64646' />";
$strXML .= "<set name='Jul' value='629' color='8E468E' />";
$strXML .= "<set name='Aug' value='622' color='588526' />";
$strXML .= "<set name='Sep' value='376' color='B3AA00' />";
$strXML .= "<set name='Oct' value='494' color='008ED6' />";
$strXML .= "<set name='Nov' value='761' color='9D080D' />";
$strXML .= "<set name='Dec' value='960' color='A186BE' />";
$strXML .= "</graph>";

//Create the chart - Column 3D Chart with data from strXML variable using dataXML method
echo renderChartHTML("FCF_Column3D.swf", "", $strXML, "myNext", 600, 300);
?>
</BODY>
</HTML>
