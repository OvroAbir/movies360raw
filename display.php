<?php  
function display($query1)
{
	echo '<table style="font-size:16px"border="2" width = "100%" height = "400px">';
	$titleRow = array('NAME', 'RATING', 'PRODUCTION HOUSE', 'DIRECTOR', 'RUNTIME (minute)', 'RELEASE DATE', 'COUNTRY', 'BUDGET (M$)');
	echo '<tr style="color:white">';
	foreach ($titleRow as $item) {
		$temp = "";
		$temp .= '<a href="#">';
		$temp .= $item;
		$temp .= '</a>'; 
	    echo "    <td>" . ($item !== null ? $temp : "&nbsp;") . "</td>\n";
	}
	while ($row = oci_fetch_array($query1, OCI_ASSOC + OCI_RETURN_NULLS)) {
	    echo "<tr>\n";
	    foreach ($row as $item) {
	        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
	    }
	    echo "</tr>\n";
	}
	echo "</table>\n";
}

?>