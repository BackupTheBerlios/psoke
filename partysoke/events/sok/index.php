<?php
$select = "	SELECT 
				$table[events].id,$table[events].genre,$table[events].name,
				DATE_FORMAT($table[events].date,'%d.%m.%Y'), WEEKDAY($table[events].date), 
				$table[events].einlass, $table[events].beginn,$table[events].ende,
				$table[events].plz,$table[events].ort,
				IF($table[location].location IS NOT NULL,$table[location].location,$table[events].location),
				IF($table[location].id IS NOT NULL,$table[location].id,NULL),
				$table[events].programm,$table[events].infotext,
				$table[events].eintritt,
				$table[events].homepage,$table[events].email,$table[events].telefon
			FROM $table[events] 
			LEFT JOIN $table[location] ON $table[events].location_id = $table[location].id
			ORDER BY date,id ASC";				
$sql = mysql_query($select);
$rows = @mysql_num_rows($sql);
if ($rows != 0) {
		$count = 1;
	while(list($id,$genre,$name,$date,$day,$einlass,$beginn,$ende,$plz,$ort,$location,$location_id,$programm,$infotext,$eintritt,$homepage,$email,$telefon) = mysql_fetch_row($sql)) {

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
				<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" style=\"background-color: #$bimage; font-size=\"9px\">
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
						<td width=\"20%\" valign=\"top\" align=\"right\"><a name=\"$id\">
							<div style=\"display:block\" id=\"plus$id\">
								<a onclick=\"document.getElementById('sub$id').style.display = 'block'; document.getElementById('plus$id').style.display = 'none';document.getElementById('minus$id').style.display = 'block';\" href=\"#$id\"><img src=\"themes/$theme/images/plus.gif\" border=\"0\"></a>
								<a href=\"#\"><img src=\"themes/$theme/images/tickets_off.gif\" border=\"0\"></a>
								<a href=\"#\"><img src=\"themes/$theme/images/minus_disabled.gif\" border=\"0\"></a>
							</div>
							<div style=\"display:none\" id=\"minus$id\" >
								<a onclick=\"document.getElementById('sub$id').style.display = 'none'; document.getElementById('minus$id').style.display = 'none';document.getElementById('plus$id').style.display = 'block';\" href=\"#$id\"><img src=\"themes/$theme/images/minus.gif\" border=\"0\"></a>
								<a href=\"#\"><img src=\"themes/$theme/images/tickets_off.gif\" border=\"0\"></a>
								<a href=\"#\"><img src=\"themes/$theme/images/minus_disabled.gif\" border=\"0\"></a>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan=\"6\" align=\"center\">
							<table id=\"sub$id\" border=\"0\" style=\"display:none; background-color: #$bimage; font-size=\"9px\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\">
								<tr>
									<td colspan=\"4\" width=\"35%\">
										&nbsp;<BR>
										<B>Programm:</B><BR>									
									</td>
								</tr>
								<tr>
									<td colspan=\"4\" width=\"35%\">
									$programm
									</td>								
								</tr>								
								<tr>
									<td colspan=\"4\" class=\"font-small\" >
									&nbsp;<BR>
									$infotext
									</td>
								</tr>
								<tr>
									<td width=\"20%\" valign=\"top\">&nbsp;<BR>
										Einlass:<BR>
										Beginn:<BR>
										Ende:<BR>
									</td>
									<td width=\"40%\" valign=\"top\">&nbsp;<BR>
										$einlass Uhr<BR>
										$beginn Uhr<BR>
										$ende Uhr<BR>
									</td>														
									</td>
									<td width=\"30%\" valign=\"top\">&nbsp;<BR>
									Eintritt: <B>$eintritt &euro;</B>
									</td>
									<td width=\"10%\">&nbsp;
									</td>									
								</tr>	
								<tr>
									<td width=\"20%\" valign=\"top\">&nbsp;<BR>
										Homepage:<BR>
										Email:<BR>
										Telefon:<BR>
									</td>
									<td width=\"40%\" colspan=\"3\" valign=\"top\">&nbsp;<BR>
										$homepage<BR>
										$email<BR>
										$telefon<BR>&nbsp;
									</td>														
									</td>								
								</tr>																																														
							</table>
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