<?

$select =	"	SELECT 
					n.id, DATE_FORMAT(n.date,'%d.%m.%Y %H.%i') AS datum, n.title, n.content, n.source, 
					n.link_target, n.link, 
					n.picture_link, n.picture_align, n.picture_text, 
					COUNT(nc.id),
					n.user
				FROM $table[news] n
				LEFT JOIN $table[news_comments] nc ON n.id=nc.id_news
				WHERE n.visible='y' AND n.id = '$id_news'
				GROUP BY n.id
				ORDER BY n.date DESC
				LIMIT $cfg[rows_news]
			";		
$sql = mysql_query($select);
while(list($news["id"],$news["date"],$news["title"],$news["content"],$news["source"],$news["link_target"],$news["link"],$picture["link"],$picture["align"],$picture["text"],$comments,$user) = mysql_fetch_row($sql)){
	echo 	"
<table border=\"0\" width=\"100%\" cellspacing=\"5\" class=\"news\">
	<tr>
		<td width=\"75%\" valign=\"top\"><B>$news[title]</B>
		</td>
		<td width=\"25%\" class=\"font-small\" align=\"right\" valign=\"top\">$news[date]
		</td>
	</tr>	
	<tr>
		<td colspan=\"2\" valign=\"top\">
                      <TABLE align=\"$picture[align]\" border=0>
                          <TBODY>
                          <TR>
                            <TD align=\"center\">
                            <IMG hspace=\"5\" vspace=\"5\" src=\"$picture[link]\" class=\"news-picture\"border=\"0\"><BR>
							<SPAN class=\"font-small\">$picture[text]</SPAN>
                            </TD>
                          </TR>
                          </TBODY>
                        </TABLE>		
			$news[content]
		</td>
	</tr>
	<tr>
		<td width=\"75%\" class=\"font-small\" align=\"left\" valign=\"top\">Link: <a target=\"$news[link_target]\" href=\"$news[link]\">$news[link]</a>
		</td>
		<td width=\"25%\" valign=\"top\">&nbsp;
		</td>
	</tr>	
	<tr>
		<td width=\"75%\" valign=\"top\">&nbsp;
		</td>
		<td width=\"25%\" class=\"font-small\" align=\"right\" valign=\"top\">
		<a href=\"user.php?p=nickpage\">$user</a>
		</td>
	</tr>	
	<tr>
		<td colspan=\"2\" valign=\"top\">";
$select = "	SELECT id, comment, user, DATE_FORMAT(date,'%d.%m.%Y %H:%i') as datum
			FROM $table[news_comments]
			WHERE id_news='$id_news'
			ORDER BY id DESC
			";
$sql = mysql_query($select)	;
while(list($comment["id"],$comment["comment"],$comment["user"],$comment["date"]) = mysql_fetch_row($sql)){
echo "&nbsp;
		<table border=\"0\" width=\"100%\" cellspacing=\"5\" class=\"news\">
			<tr>
				<td colspan=\"2\" valign=\"top\">
				$comment[comment]
				</td>
			</tr>
			<tr>
				<td class=\"font-small\" colspan=\"2\" align=\"right\" valign=\"top\">$comment[date] | 
				<a href=\"user.php?p=nickpage&user=$comment[user]\">$comment[user]</a>
				</td>
			</tr>					
		</table>";
} // while

echo "	
			<div align=\"right\">
			<span class=\"news-comments\"><a href=\"index.php?p=news|comments&a=add&id_news=$id_news\">Kommentar hinzufügen</a></span><BR>&nbsp;
			</div><div align=\"right\" class=\"font-small\"> « [<b>1</b>] [2] »</div>
		</td>
	</tr>		
</table>
			";
}



?>