<?
$fontsize = 9;
$fontfamily = "'Fixedsys', 'Verdana', 'Arial'";

$page_bg  = "#5B0000"; 		// page background color
$chan_bg  = "#ffffff"; 		// canal frame background color
$chan_fg  = "#000000"; 		// canal frame foreground color
$input_bg = "#FDFFDC"; 		// background color of the input text, the buttons, and the color chooser
$table_border = "#AACCAA"; 	// border color of the table
$page_fg  = "#AACCAA"; 		// page foreground/text color
 $ircColors[0] = "#FFFFFF"; // white
 $ircColors[1] = "#000000"; // black
 $ircColors[2] = "#000080"; // dark blue
 $ircColors[3] = "#008000"; // dark green -> standard for join/part/quit
 $ircColors[4] = "#FF0000"; // red	 -> standard for error/disconnect
 $ircColors[5] = "#800000"; // dark red	 -> standard for notices
 $ircColors[6] = "#FF00FF"; // purple	 -> standard for (ctcp) Actions
 $ircColors[7] = "#FF8000"; // orange	 -> standard for server messages (like topics, names, modes)
 $ircColors[8] = "#FFFF00"; // yellow
 $ircColors[9] = "#00FF00"; // green
$ircColors[10] = "#008080"; // dark cyan
$ircColors[11] = "#00FFFF"; // cyan
$ircColors[12] = "#0000FF"; // blue
$ircColors[13] = "#800080"; // dark purple
$ircColors[14] = "#808080"; // dark grey
$ircColors[15] = "#C0C0C0"; // light grey

$css = <<<EOF
<style type="text/css">

body,tr,td,iframe {
	overflow-x:hidden; overflow-y: auto;
    font-family: $fontfamily;
    font-size: {$fontsize}pt;
}

.link { text-decoration: none; color: #ffffff}
.link:hover { text-decoration: none; color: #ffffff}
.link:active { text-decoration: none; color: #ffffff}
</style>
EOF;
?>