<?
ob_start();
session_start();
include("core/config.php");
include("core/functions.php");
db_open();

?>
<html>
<head>
<title>PartySOKe.de ... Wissen was l&auml;uft!</title>
<link rel="stylesheet" type="text/css" href="themes/default/style.css" title="Default">
<link rel="stylesheet" type="text/css" href="themes/orange/style.css" title="Orange">
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td width="165" valign="top">
		<table class="font-small" border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td width="20" class="navi-top-left">&nbsp;</td>
				<td class="navi-top-right" valign="top">
				<img src="themes/<? echo $theme; ?>/images/logo.gif" border="0">&nbsp;
				</td>
			</tr>		
<?
$p = explode("|",$p);
$page = $p[0];

$select = "	SELECT 
				sub_name,link_name,link 
			FROM $table[navigation]
			WHERE (sub_name IS NULL OR sub_name='$page') AND visible='y' 
			ORDER BY id,sub_id ASC";
$sql = mysql_query($select);
while(list($sub_name,$link_name,$link) = mysql_fetch_row($sql))
{
	if ($page == $link) {
		$css = "navi-left-on";
		$css_menu = "navi-menu-on";
	}
	else {
		$css = "navi-left-off";
		$css_menu = "navi-menu-off";
	}
	if ($sub_name == NULL) {
	echo "
			<tr>
				<td class=\"$css\">&nbsp;&nbsp;&raquo;
				</td>
				<td class=\"$css_menu\"><a href=\"index.php?p=$link\">$link_name</a>
				</td>
			</tr>";	
	}
	else {
		if ($link_name == "&nbsp;" ) {
		echo "
				<tr>
					<td class=\"navi-sub-left\">&nbsp;
					</td>
					<td class=\"navi-sub-off\">&nbsp;
					</td>
				</tr>";	
		}
		else {
		echo "
				<tr>
					<td class=\"navi-sub-left\">&nbsp;
					</td>
					<td class=\"navi-sub-off\">
					<a href=\"index.php?p=$sub_name|$link\">$link_name</a>
					</td>
				</tr>";
		}
	}
}

?>			

			<tr>
				<td width="20" class="navi-bottom-left">&nbsp;</td>
				<td class="navi-bottom-right">
<?
if (!isset($_SESSION["user"])) {
echo "
				<form method=\"POST\" name=\"loginFORM\"action=\"index.php?p=members&a=login\"><BR>
				Benutzername:<BR><input class=\"text\" type=\"text\" name=\"user\" size=\"20\"><BR>
				Passwort:
				<BR><input class=\"text\" type=\"text\" name=\"pwd\" size=\"10\">
				<input class=\"button\" type=\"submit\" value=\"Login\" name=\"btn_submit\"><BR>
				<a href=\"\">Neu registrieren?</a>
				</form>";
} else {
echo "
<div style=\"line-height:150%\">
<B>&#9642;</B>&nbsp;<a href=\"index.php?p=members|messenger\">Community</a><BR>
<B>&#9642;</B>&nbsp;<a href=\"#\">Persönliche Daten</a><BR>
<B>&#9642;</B>&nbsp;<a href=\"#\">Einstellungen</a><BR>
<B>&#9642;</B>&nbsp;<a href=\"index.php?p=members&a=logout\">Logout</a>
</div>";
}
?>
				</td>
			</tr> 
			<tr>
				<td>&nbsp;</td>
				<td align="right">
				<?
					if (isset($_SESSION["user"])) {
					 echo "<span class=\"navi-user\"><a href=\"index.php?p=members|messenger\">$_SESSION[user]</a></span>";
					} else {
					 echo "<span class=\"navi-user\">Gast</span>";					
					}
				
				?>
				</td>
			</tr> 											
			</table>
		</td>
		<td width="500" style="padding-left: 10px; padding-top: 50px;" align="left">
			<table border="0" width="500" height="500" cellspacing="0" cellpadding="0">
				<tr>
					<td class="content" valign="top">&nbsp;
<? 

	for($i=0; $i<count($p);$i++) {
		if ($i == 0) {
			$link .= "$p[$i]";
		}
		else {
			$link .= "/$p[$i]";
		}
	}	
	if (isset($a)) {
		$link .= "/$a.php";
	}
	else {
		$link .= "/index.php";
	}
	
	if (file_exists($link)) {
		include("$link");
	}
	else {
		include("content.php");
	}
	
?>
					</td>
				</tr>
			</table>
		</td>
		<td style="padding-left: 10px; padding-top: 30px;" align="left" valign="top">
<?

if ($page == "news") {
	include("news/news_suche.php");
	include("news/news_kalender.php");
}
elseif ($page == "events") {
	include("events/event_kalender.php");
	if ($p[1] == "sok") {
		include("events/sok/event_special.php");
	}
	if ($p[1] == "slf") {
		include("events/slf/event_special.php");
	}
	if ($p[1] == "view") {
		include("events/event_map.php");
	}	
}
elseif ($page == "cinema") {
	include("cinema/new/cinema_search.php");
}
elseif ($p[1] == "messenger") {
	include("members/messenger.php");
}
elseif ($page == "nightguide" && $p[1] == "bars") {
	include("nightguide/bars/bar_suche.php");
}
?>
					
		</td>		
	</tr>
</table>
&nbsp;
</body>

</html>
<?
db_close();
ob_flush();
?>