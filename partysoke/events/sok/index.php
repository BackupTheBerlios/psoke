<?php
$select = "	SELECT 
				id,genre,name,
				DATE_FORMAT(date,'%d.%m.%Y'), DATE_FORMAT(time,'%H.%i'), WEEKDAY(date),
				plz,ort,location
			FROM $table[events] 
			ORDER BY date,id ASC LIMIT 15";		
$sql = mysql_query($select);
$rows = mysql_num_rows($sql);
if ($rows != 0) {
		$count = 1;
	while(list($id,$genre,$name,$date,$time,$day,$plz,$ort,$location) = mysql_fetch_row($sql)) {

		if ($tempdate != $date) {
			
			echo "&nbsp;<BR>
					<div class=\"font-small\" align=\"left\">
					<span class=\"news-comments\">$date,".$weekday[$day]."</span>
					</div>";
		}
		$count++;		
		if ($count % 2) {
			$bimage = "ECF5FA";
		} else {
			$bimage = "FFFFFF";
		}
		echo "
		<table border=\"0\" width=\"100%\" cellspacing=\"3\" cellpadding=\"0\" class=\"news\" style=\"background-color: #$bimage;\">
			<tr>
				<td valign=\"top\">";	
		echo "
				<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" style=\"background-color: #$bimage; font-size: 8pt\">
					<tr>
						<td width=\"4%\">
							<img src=\"themes/$theme/images/genre_$genre.gif\" valign=\"top\" border=\"0\">
						</td>	
						<td width=\"35%\" valign=\"top\" align=\"left\">
							$name
						</td>
						<td width=\"20%\" valign=\"top\" align=\"left\">
							$ort
						</td>
						<td width=\"1%\">
							&nbsp;
						</td>		
						<td width=\"20%\" valign=\"top\" align=\"right\">
							$location
						</td>
						<td width=\"20%\" valign=\"top\" align=\"right\">
							<div style=\"display:block\" id=\"plus$id\">
								<a onclick=\"document.getElementById('sub$id').style.display = 'block'; document.getElementById('plus$id').style.display = 'none';document.getElementById('minus$id').style.display = 'block';\" href=\"#\"><img src=\"themes/$theme/images/plus.gif\" border=\"0\"></a>
								<a href=\"#\"><img src=\"themes/$theme/images/tickets_off.gif\" border=\"0\"></a>
								<a href=\"#\"><img src=\"themes/$theme/images/minus_disabled.gif\" border=\"0\"></a>
							</div>
							<div style=\"display:none\" id=\"minus$id\" >
								<a onclick=\"document.getElementById('sub$id').style.display = 'none'; document.getElementById('minus$id').style.display = 'none';document.getElementById('plus$id').style.display = 'block';\" href=\"#\"><img src=\"themes/$theme/images/minus.gif\" border=\"0\"></a>
								<a href=\"#\"><img src=\"themes/$theme/images/tickets_off.gif\" border=\"0\"></a>
								<a href=\"#\"><img src=\"themes/$theme/images/minus_disabled.gif\" border=\"0\"></a>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan=\"6\">
							<div style=\"display:none\" id=\"sub$id\">
							 Hier kommt ein ewig langer Text zum Testen der ganzen Funktionen hin! ;o)
							</div>
						</td>	
					</tr>
				</table>";			
		echo "</td>
				</tr>	
			</table>";	
	
		$tempdate = $date;
	}

}
echo "	
<div align=\"right\" class=\"highlight\">
<a href=\"\">[«]</a> 
<a href=\"\">[1]</a> 
<a href=\"\">[2]</a> <B>[3]</B> 
<a href=\"\">[4]</a>
<a href=\"\">[»]</a> &nbsp;
</div>
";
?>