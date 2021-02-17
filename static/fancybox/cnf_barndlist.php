<?php 
session_start();
ob_start();
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php include ("ewconfig.php") ?>
<?php include ("db.php") ?>
<?php include ("cnf_barndinfo.php") ?>
<?php include ("advsecu.php") ?>
<?php include ("phpmkrfn.php") ?>
<?php include ("ewupload.php") ?>
<?php
if (!IsLoggedIn() && (@$_COOKIE[ewCookieAutoLogin] == "autologin" && @$_COOKIE[ewCookiePassword] <> "")) {
	ob_end_clean();
	header("Location: login.php");
	exit();
}
LoadUserLevel();
$ewCurSec = (IsLoggedIn())? CurrentUserLevelPriv("cnf_barnd") : GetAnonymousPriv("cnf_barnd");	
if (($ewCurSec & ewAllowList) <> ewAllowList) {
	ob_end_clean();
	header("Location: login.php");
	exit();
}
?>
<?php

// Initialize common variables
$x_brand_id = NULL;
$ox_brand_id = NULL;
$z_brand_id = NULL;
$ar_x_brand_id = NULL;
$ari_x_brand_id = NULL;
$x_brand_idList = NULL;
$x_brand_idChk = NULL;
$cbo_x_brand_id_js = NULL;
$x_brand_name = NULL;
$ox_brand_name = NULL;
$z_brand_name = NULL;
$ar_x_brand_name = NULL;
$ari_x_brand_name = NULL;
$x_brand_nameList = NULL;
$x_brand_nameChk = NULL;
$cbo_x_brand_name_js = NULL;
$x_brand_code = NULL;
$ox_brand_code = NULL;
$z_brand_code = NULL;
$ar_x_brand_code = NULL;
$ari_x_brand_code = NULL;
$x_brand_codeList = NULL;
$x_brand_codeChk = NULL;
$cbo_x_brand_code_js = NULL;
$x_delete_flag = NULL;
$ox_delete_flag = NULL;
$z_delete_flag = NULL;
$ar_x_delete_flag = NULL;
$ari_x_delete_flag = NULL;
$x_delete_flagList = NULL;
$x_delete_flagChk = NULL;
$cbo_x_delete_flag_js = NULL;
$x_delete_comment = NULL;
$ox_delete_comment = NULL;
$z_delete_comment = NULL;
$ar_x_delete_comment = NULL;
$ari_x_delete_comment = NULL;
$x_delete_commentList = NULL;
$x_delete_commentChk = NULL;
$cbo_x_delete_comment_js = NULL;
$x_brand_description = NULL;
$ox_brand_description = NULL;
$z_brand_description = NULL;
$ar_x_brand_description = NULL;
$ari_x_brand_description = NULL;
$x_brand_descriptionList = NULL;
$x_brand_descriptionChk = NULL;
$cbo_x_brand_description_js = NULL;
$x_create_user = NULL;
$ox_create_user = NULL;
$z_create_user = NULL;
$ar_x_create_user = NULL;
$ari_x_create_user = NULL;
$x_create_userList = NULL;
$x_create_userChk = NULL;
$cbo_x_create_user_js = NULL;
$x_create_date = NULL;
$ox_create_date = NULL;
$z_create_date = NULL;
$ar_x_create_date = NULL;
$ari_x_create_date = NULL;
$x_create_dateList = NULL;
$x_create_dateChk = NULL;
$cbo_x_create_date_js = NULL;
$x_update_user = NULL;
$ox_update_user = NULL;
$z_update_user = NULL;
$ar_x_update_user = NULL;
$ari_x_update_user = NULL;
$x_update_userList = NULL;
$x_update_userChk = NULL;
$cbo_x_update_user_js = NULL;
$x_update_date = NULL;
$ox_update_date = NULL;
$z_update_date = NULL;
$ar_x_update_date = NULL;
$ari_x_update_date = NULL;
$x_update_dateList = NULL;
$x_update_dateChk = NULL;
$cbo_x_update_date_js = NULL;
?>
<?php
$sExport = @$_GET["export"]; // Load export request
if ($sExport == "html") {

	// Printer friendly
}
if ($sExport == "excel") {
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename=' . ewTblVar .'.xls');
}
?>
<?php
$nStartRec = 0;
$nStopRec = 0;
$nTotalRecs = 0;
$nRecCount = 0;
$nRecActual = 0;
$sKeyMaster = "";
$sDbWhereMaster = "";
$sSrchAdvanced = "";
$psearch = "";
$psearchtype = "";
$sDbWhereDetail = "";
$sSrchBasic = "";
$sSrchWhere = "";
$sDbWhere = "";
$sOrderBy = "";
$sSqlMaster = "";
$sListTrJs = "";
$bEditRow = "";
$nEditRowCnt = "";
$sDeleteConfirmMsg = "";
$sDeleteConfirmMsg = "Do you want to delete this record?";
$nDisplayRecs = "20";
$nRecRange = 10;

// Set up records per page dynamically
SetUpDisplayRecs();

// Open connection to the database
$conn = phpmkr_db_connect(HOST, USER, PASS, DB, PORT);

// Handle reset command
ResetCmd();

// Set up inline edit parameters
$sAction = "";
SetUpInlineEdit($conn);

// Get search criteria for Basic (Quick) Search
$psearch = (!get_magic_quotes_gpc()) ? addslashes(@$_GET[ewTblBasicSrch]) : @$_GET[ewTblBasicSrch];
$psearchtype = @$_GET[ewTblBasicSrchType];
SetUpBasicSearch();

// Build search criteria
if ($sSrchAdvanced != "") {
	if ($sSrchWhere <> "") $sSrchWhere .= " AND ";
	$sSrchWhere .= "(" . $sSrchAdvanced . ")"; // Advanced Search
}
if ($sSrchBasic != "") {
	if ($sSrchWhere <> "") $sSrchWhere .= " AND ";
	$sSrchWhere .= "(" . $sSrchBasic . ")"; // Basic Search
}

// Save search criteria
if ($sSrchWhere != "") {
	$_SESSION[ewSessionTblSearchWhere] = $sSrchWhere;

	// Reset start record counter (new search)
	$nStartRec = 1;
	$_SESSION[ewSessionTblStartRec] = $nStartRec;
} else {
	$sSrchWhere = @$_SESSION[ewSessionTblSearchWhere];
	RestoreSearch();
}

// Build filter condition
$sDbWhere = "";
if (($ewCurSec & ewAllowList) <> ewAllowList) {
	$sDbWhere = "(0=1)";
}
if ($sDbWhereDetail <> "") {
	if ($sDbWhere <> "") $sDbWhere .= " AND ";
	$sDbWhere .= "(" . $sDbWhereDetail . ")";
}
if ($sSrchWhere <> "") {
	if ($sDbWhere <> "") $sDbWhere .= " AND ";
	$sDbWhere .= "(" . $sSrchWhere . ")";
}

// Set up sorting order
$sOrderBy = "";
SetUpSortOrder();
$sSql = ewBuildSql(ewSqlSelect, ewSqlWhere, ewSqlGroupBy, ewSqlHaving, ewSqlOrderBy, $sDbWhere, $sOrderBy);

// echo $sSql . "<br>"; // Uncomment to show SQL for debugging
?>
<?php if ($sExport <> "word" && $sExport <> "excel") { ?>
<?php include ("header.php") ?>
<script type="text/javascript">
<!--
EW_LookupFn = "ewlookup.php"; // ewlookup file name
EW_AddOptFn = "ewaddopt.php"; // ewaddopt.php file name

//-->
</script>
<script type="text/javascript" src="ewp.js"></script>
<script type="text/javascript">
<!--
EW_dateSep = "/"; // set date separator
EW_UploadAllowedFileExt = "gif,jpg,jpeg,bmp,png,doc,xls,pdf,zip,png"; // allowed upload file extension

//-->
</script>
<script type="text/javascript">
<!--
function EW_checkMyForm(EW_this) {
return true;
}

//-->
</script>
<script type="text/javascript">
<!--
var firstrowoffset = 1; // first data row start at
var tablename = 'ewlistmain'; // table name
var lastrowoffset = 0; // footer row
var usecss = true; // use css
var rowclass = 'ewTableRow'; // row class
var rowaltclass = 'ewTableAltRow'; // row alternate class
var rowmoverclass = 'ewTableHighlightRow'; // row mouse over class
var rowselectedclass = 'ewTableSelectRow'; // row selected class
var roweditclass = 'ewTableEditRow'; // row edit class
var rowcolor = '#FFFFFF'; // row color
var rowaltcolor = '#F5F5F5'; // row alternate color
var rowmovercolor = '#33CCFF'; // row mouse over color
var rowselectedcolor = '#FFCC33'; // row selected color
var roweditcolor = '#CC0000'; // row edit color

//-->
</script>
<script type="text/javascript">
<!--
	var EW_DHTMLEditors = [];

//-->
</script>
<?php } ?>
<?php

// Set up recordset
$rs = phpmkr_query($sSql, $conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSql);
$nTotalRecs = phpmkr_num_rows($rs);
if ($nDisplayRecs <= 0) { // Display all records
	$nDisplayRecs = $nTotalRecs;
}
$nStartRec = 1;
SetUpStartRec(); // Set up start record position
?>
<p><span class="phpmaker">TABLE: Brand Info
<?php if ($sExport == "") { ?>
&nbsp;&nbsp;<a href="cnf_barndlist.php?export=html">Printer Friendly</a>
&nbsp;&nbsp;<a href="cnf_barndlist.php?export=excel">Export to Excel</a>
<?php } ?>
</span></p>
<?php if ($sExport == "") { ?>
<form id="fcnf_barndlistsrch" name="fcnf_barndlistsrch" action="cnf_barndlist.php" >
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo ewTblBasicSrch; ?>" size="20" value="<?php echo $psearch;?>">
			<input type="Submit" name="Submit" value="Search&nbsp;(*)">&nbsp;
			<input type="Button" name="Reset" value="Reset" onclick="EW_clearForm(this.form);this.form.<?php echo ewTblBasicSrchType;?>[0].checked = true;">&nbsp;
			<a href="cnf_barndlist.php?cmd=reset">Show all</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><input type="radio" name="<?php echo ewTblBasicSrchType;?>" value="" <?php if ($psearchtype == "") { ?>checked<?php } ?>>Exact phrase&nbsp;&nbsp;<input type="radio" name="<?php echo ewTblBasicSrchType; ?>" value="AND" <?php if ($psearchtype == "AND") { ?>checked<?php } ?>>All words&nbsp;&nbsp;<input type="radio" name="<?php echo ewTblBasicSrchType; ?>" value="OR" <?php if ($psearchtype == "OR") { ?>checked<?php } ?>>Any word</span></td>
	</tr>
</table>
</form>
<?php } ?>
<?php if (($ewCurSec & ewAllowAdd) == ewAllowAdd) { ?>
<?php if ($sExport == "") { ?>
<table class="ewListAdd">
	<tr>
		<td><span class="phpmaker"><a href="cnf_barndadd.php">Add</a></span></td>
	</tr>
</table>
<p>
<?php } ?>
<?php } ?>
<?php
if (@$_SESSION[ewSessionMessage] <> "") {
?>
<p><span class="ewmsg"><?php echo $_SESSION[ewSessionMessage]; ?></span></p>
<?php
	$_SESSION[ewSessionMessage] = ""; // Clear message
}
?>
<?php if ($nTotalRecs > 0)  { ?>
<form name="fcnf_barndlist" id="fcnf_barndlist" action="cnf_barndlist.php" method="post">
<table id="ewlistmain" class="ewTable">
	<!-- Table header -->
	<tr class="ewTableHeader">
		<td valign="top"><span>
<?php if ($sExport <> "") { ?>
brand id
<?php } else { ?>
	<a href="cnf_barndlist.php?order=<?php echo urlencode("brand_id"); ?>">
	brand id<?php if (@$_SESSION[ewSessionTblSort . "_x_brand_id"] == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif (@$_SESSION[ewSessionTblSort . "_x_brand_id"] == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?>
	</a>
<?php } ?>
		</span></td>
		<td valign="top"><span>
<?php if ($sExport <> "") { ?>
ยี่ห้อ
<?php } else { ?>
	<a href="cnf_barndlist.php?order=<?php echo urlencode("brand_name"); ?>">
	ยี่ห้อ&nbsp;(*)<?php if (@$_SESSION[ewSessionTblSort . "_x_brand_name"] == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif (@$_SESSION[ewSessionTblSort . "_x_brand_name"] == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?>
	</a>
<?php } ?>
		</span></td>
		<td valign="top"><span>
<?php if ($sExport <> "") { ?>
รหัสยี่ห้อ
<?php } else { ?>
	<a href="cnf_barndlist.php?order=<?php echo urlencode("brand_code"); ?>">
	รหัสยี่ห้อ&nbsp;(*)<?php if (@$_SESSION[ewSessionTblSort . "_x_brand_code"] == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif (@$_SESSION[ewSessionTblSort . "_x_brand_code"] == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?>
	</a>
<?php } ?>
		</span></td>
		<td valign="top"><span>
<?php if ($sExport <> "") { ?>
brand_status
<?php } else { ?>
	<a href="cnf_barndlist.php?order=<?php echo urlencode("delete_flag"); ?>">
	brand_status<?php if (@$_SESSION[ewSessionTblSort . "_x_delete_flag"] == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif (@$_SESSION[ewSessionTblSort . "_x_delete_flag"] == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?>
	</a>
<?php } ?>
		</span></td>
		<td valign="top"><span>
<?php if ($sExport <> "") { ?>
หมายเหตุ
<?php } else { ?>
	<a href="cnf_barndlist.php?order=<?php echo urlencode("brand_description"); ?>">
	หมายเหตุ&nbsp;(*)<?php if (@$_SESSION[ewSessionTblSort . "_x_brand_description"] == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif (@$_SESSION[ewSessionTblSort . "_x_brand_description"] == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?>
	</a>
<?php } ?>
		</span></td>
<?php if ($sExport == "") { ?>
<?php if (($ewCurSec & ewAllowEdit) == ewAllowEdit) { ?>
<td>&nbsp;</td>
<?php } ?>
<?php if (($ewCurSec & ewAllowDelete) == ewAllowDelete) { ?>
<td>&nbsp;</td>
<?php } ?>
<?php } ?>
	</tr>
<?php

// Set the last record to display
$nStopRec = $nStartRec + $nDisplayRecs - 1;

// Move to the first record
$nRecCount = $nStartRec - 1;
if (phpmkr_num_rows($rs) > 0) {
	phpmkr_data_seek($rs, $nStartRec -1);
}
$nEditRowCnt = 0;
$nRecActual = 0;
while (($row = @phpmkr_fetch_array($rs)) && ($nRecCount < $nStopRec)) {
	$nRecCount = $nRecCount + 1;
	if ($nRecCount >= $nStartRec) {
		$nRecActual++;

		// Set row color
		$sItemRowClass = " class=\"ewTableRow\"";
		$sListTrJs = " onmouseover='ew_mouseover(this);' onmouseout='ew_mouseout(this);' onclick='ew_click(this);'";

		// Display alternate color for rows
		if ($nRecCount % 2 <> 1) {
			$sItemRowClass = " class=\"ewTableAltRow\"";
		}
		$x_brand_id = $row["brand_id"];
		$x_brand_name = $row["brand_name"];
		$x_brand_code = $row["brand_code"];
		$x_delete_flag = $row["delete_flag"];
		$x_delete_comment = $row["delete_comment"];
		$x_brand_description = $row["brand_description"];
		$x_create_user = $row["create_user"];
		$x_create_date = $row["create_date"];
		$x_update_user = $row["update_user"];
		$x_update_date = $row["update_date"];
	$bEditRow = (($_SESSION[ewSessionTblKey ."_brand_id"] == ((get_magic_quotes_gpc())? stripslashes($x_brand_id) : $x_brand_id)) && ($nEditRowCnt == 0));
	if ($bEditRow) {
		$nEditRowCnt++;
		$sItemRowClass = " class=\"ewTableEditRow\"";
		$sListTrJs = " onmouseover='this.edit=true;ew_mouseover(this);' onmouseout='ew_mouseout(this);' onclick='ew_click(this);'";
	}
?>
	<!-- Table body -->
	<tr<?php echo $sItemRowClass; ?><?php echo $sListTrJs; ?>>
		<!-- brand_id -->
		<td><span>
<?php if ($bEditRow) { // Edit record ?>
<?php echo $x_brand_id; ?><input type="hidden" id="x_brand_id" name="x_brand_id" value="<?php echo @$x_brand_id; ?>">
<?php }else{ ?>
<?php echo $x_brand_id; ?>
<?php } ?>
</span></td>
		<!-- brand_name -->
		<td><span>
<?php if ($bEditRow) { // Edit record ?>
<input type="text" name="x_brand_name" id="x_brand_name" size="30" maxlength="255" value="<?php echo htmlspecialchars(@$x_brand_name) ?>">
<?php }else{ ?>
<?php echo $x_brand_name; ?>
<?php } ?>
</span></td>
		<!-- brand_code -->
		<td><span>
<?php if ($bEditRow) { // Edit record ?>
<input type="text" name="x_brand_code" id="x_brand_code" size="30" maxlength="50" value="<?php echo htmlspecialchars(@$x_brand_code) ?>">
<?php }else{ ?>
<?php echo $x_brand_code; ?>
<?php } ?>
</span></td>
		<!-- delete_flag -->
		<td><span>
<?php if ($bEditRow) { // Edit record ?>
<?php
$x_delete_flagList = "<select id='x_delete_flag' name='x_delete_flag'>";
$x_delete_flagList .= "<option value=''>Please Select</option>";
$sSqlWrk = "SELECT choice_code, choice_name FROM cnf_choice";
$rswrk = phpmkr_query($sSqlWrk,$conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL:' . $sSqlWrk);
if ($rswrk) {
	$rowcntwrk = 0;
	while ($datawrk = phpmkr_fetch_array($rswrk)) {
		$x_delete_flagList .= "<option value=\"" . htmlspecialchars($datawrk[0]) . "\"";
		if ($datawrk["choice_code"] == @$x_delete_flag) {
			$x_delete_flagList .= " selected";
		}
		$x_delete_flagList .= ">" . $datawrk["choice_name"] . "</option>";
		$rowcntwrk++;
	}
}
@phpmkr_free_result($rswrk);
$x_delete_flagList .= "</select>";
echo $x_delete_flagList;
?>
<?php }else{ ?>
<?php
if ((!is_null($x_delete_flag)) && ($x_delete_flag <> "")) {
	$sSqlWrk = "SELECT choice_name FROM cnf_choice";
	$sTmp = $x_delete_flag;
	$sTmp = addslashes($sTmp);
	$sSqlWrk .= " WHERE choice_code = '" . $sTmp . "'";
	$rswrk = phpmkr_query($sSqlWrk,$conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL:' . $sSqlWrk);
	if ($rswrk && $rowwrk = phpmkr_fetch_array($rswrk)) {
		$sTmp = $rowwrk["choice_name"];
	}
	@phpmkr_free_result($rswrk);
} else {
	$sTmp = "";
}
$ox_delete_flag = $x_delete_flag; // Backup original value
$x_delete_flag = $sTmp;
?>
<?php echo $x_delete_flag; ?>
<?php $x_delete_flag = $ox_delete_flag; // Restore original value ?>
<?php } ?>
</span></td>
		<!-- brand_description -->
		<td><span>
<?php if ($bEditRow) { // Edit record ?>
<input type="text" name="x_brand_description" id="x_brand_description" size="30" maxlength="255" value="<?php echo htmlspecialchars(@$x_brand_description) ?>">
<?php }else{ ?>
<?php echo $x_brand_description; ?>
<?php } ?>
</span></td>
<?php if ($sExport == "") { ?>
<?php if (($ewCurSec & ewAllowEdit) == ewAllowEdit) { ?>
<td><span class="phpmaker">
<?php if ($_SESSION[ewSessionTblKey ."_brand_id"] == ((get_magic_quotes_gpc())? stripslashes($x_brand_id) : $x_brand_id)) { ?>
	<a href="" onClick="if (EW_checkMyForm(document.fcnf_barndlist)) document.fcnf_barndlist.submit();return false;">Update</a>&nbsp;<a href="cnf_barndlist.php?a=cancel">Cancel</a>
	<input type="hidden" name="a_list" value="update">
<?php } else { ?>
	<a href="<?php if ($x_brand_id <> "") {echo "cnf_barndlist.php?a=edit&brand_id=" . urlencode($x_brand_id); } else { echo "javascript:alert('Invalid Record! Key is null');";} ?>">Inline Edit</a>
<?php } ?>
</span></td>
<?php } ?>
<?php if (($ewCurSec & ewAllowDelete) == ewAllowDelete) { ?>
<td><span class="phpmaker"><a onclick="ew_clickdelete();return ew_confirmdelete('<?php echo $sDeleteConfirmMsg; ?>');" href="<?php if ($x_brand_id <> "") {echo "cnf_barnddelete.php?brand_id=" . urlencode($x_brand_id); } else { echo "javascript:alert('Invalid Record! Key is null');";} ?>">Delete</a></span></td>
<?php } ?>
<?php } ?>
	</tr>
<?php
	}
}
?>
</table>
</form>
<?php if (strtolower($sAction) == "edit") { ?>
<?php } ?>
<?php 
}

// Close recordset and connection
phpmkr_free_result($rs);
phpmkr_db_close($conn);
?>
<?php if ($sExport == "") { ?>
<form action="cnf_barndlist.php" name="ewpagerform" id="ewpagerform">
<table>
	<tr>
		<td nowrap>
<?php
if ($nTotalRecs > 0) {
	$rsEof = ($nTotalRecs < ($nStartRec + $nDisplayRecs));
	$PrevStart = $nStartRec - $nDisplayRecs;
	if ($PrevStart < 1) { $PrevStart = 1; }
	$NextStart = $nStartRec + $nDisplayRecs;
	if ($NextStart > $nTotalRecs) { $NextStart = $nStartRec ; }
	$LastStart = intval(($nTotalRecs-1)/$nDisplayRecs)*$nDisplayRecs+1;
	?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker">Page&nbsp;</span></td>
<!--first page button-->
	<?php if ($nStartRec == 1) { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } else { ?>
	<td><a href="cnf_barndlist.php?start=1"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($PrevStart == $nStartRec) { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } else { ?>
	<td><a href="cnf_barndlist.php?start=<?php echo $PrevStart; ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="pageno" value="<?php echo intval(($nStartRec-1)/$nDisplayRecs+1); ?>" size="4"></td>
<!--next page button-->
	<?php if ($NextStart == $nStartRec) { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } else { ?>
	<td><a href="cnf_barndlist.php?start=<?php echo $NextStart; ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>
	<?php  } ?>
<!--last page button-->
	<?php if ($LastStart == $nStartRec) { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } else { ?>
	<td><a href="cnf_barndlist.php?start=<?php echo $LastStart; ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;of <?php echo intval(($nTotalRecs-1)/$nDisplayRecs+1);?></span></td>
	</tr></table>
	<?php if ($nStartRec > $nTotalRecs) { $nStartRec = $nTotalRecs; }
	$nStopRec = $nStartRec + $nDisplayRecs - 1;
	$nRecCount = $nTotalRecs - 1;
	if ($rsEof) { $nRecCount = $nTotalRecs; }
	if ($nStopRec > $nRecCount) { $nStopRec = $nRecCount; } ?>
	<span class="phpmaker">Records <?php echo $nStartRec; ?> to <?php echo $nStopRec; ?> of <?php echo $nTotalRecs; ?></span>
<?php } else { ?>
	<?php if (($ewCurSec & ewAllowList) == ewAllowList) { ?>
	<?php if ($sSrchWhere == "0=101") { ?>
	<span class="phpmaker"></span>
	<?php } else { ?>
	<span class="phpmaker">No records found</span>
	<?php } ?>
	<?php } else { ?>
	<span class="phpmaker">You do not have the right permission to view the page</span>
	<?php  } ?>
<?php } ?>
		</td>
<?php if ($nTotalRecs > 0) { ?>
		<td nowrap>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td align="right" valign="top" nowrap><span class="phpmaker">Records Per Page&nbsp;
		<select name="<?php echo ewTblRecPerPage; ?>" onChange="this.form.pageno.value = 1;this.form.submit();" class="phpmaker">
			<option value="20"<?php if ($nDisplayRecs == 20) { echo " selected";  }?>>20</option>
			<option value="50"<?php if ($nDisplayRecs == 50) { echo " selected";  }?>>50</option>
			<option value="100"<?php if ($nDisplayRecs == 100) { echo " selected";  }?>>100</option>
			<option value="ALL"<?php if (@$_SESSION[ewSessionTblRecPerPage] == -1) { echo " selected";  }?>>All Records</option>
		</select>
		</span></td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php if ($sExport <> "word" && $sExport <> "excel") { ?>
<?php include ("footer.php") ?>
<?php } ?>
<?php

//-------------------------------------------------------------------------------
// Function SetUpDisplayRecs
// - Set up Number of Records displayed per page based on Form element RecPerPage
// - Variables setup: nDisplayRecs

function SetUpDisplayRecs()
{
	global $nStartRec;
	global $nDisplayRecs;
	global $nTotalRecs;
	$sWrk = @$_GET[ewTblRecPerPage];
	if ($sWrk <> "") {
		if (is_numeric($sWrk)) {
			$nDisplayRecs = $sWrk;
		} else {
			if (strtolower($sWrk) == "all") { // Display all records
				$nDisplayRecs = -1;
			} else {
				$nDisplayRecs = 20;  // Non-numeric, load default
			}
		}
		$_SESSION[ewSessionTblRecPerPage] = $nDisplayRecs; // Save to Session

		// Reset Start Position (Reset Command)
		$nStartRec = 1;
		$_SESSION[ewSessionTblStartRec] = $nStartRec;
	} else {
		if (@$_SESSION[ewSessionTblRecPerPage] <> "") {
			$nDisplayRecs = $_SESSION[ewSessionTblRecPerPage]; // Restore from Session
		} else {
			$nDisplayRecs = 20; // Load Default
		}
	}
}

//-------------------------------------------------------------------------------
// Function SetUpInlineEdit
// - Set up Inline Edit parameters based on querystring parameters a & key
// - Variables setup: sAction, sKey, Session(TblKeyName)

function SetUpInlineEdit($conn)
{
	global $x_brand_id;
	global $bInlineEdit;
	global $sAction;
	global $ewCurSec;

	// Get the keys for master table
	if (strlen(@$_GET["a"]) > 0) {
		$sAction = @$_GET["a"];
		if (strtolower($sAction) == "edit") { // Change to Inline Edit Mode
			if(($ewCurSec & ewAllowEdit) <> ewAllowEdit) {
			ob_end_clean();
			header("Location: login.php");
			exit();
			}
			$bInlineEdit = true;
			if (strlen(@$_GET["brand_id"]) > 0) {
				$x_brand_id = $_GET["brand_id"];
			} else {
				$bInlineEdit = false;
			}
			if ($bInlineEdit) {
				if (LoadData($conn)) {
					$_SESSION[ewSessionTblKey . "_brand_id"] = $x_brand_id; // Set up Inline Edit key
				}
			}
		} elseif (strtolower($sAction) == "cancel") { // Switch out of Inline Edit Mode
			$_SESSION[ewSessionTblKey . "_brand_id"] = ""; // Clear Inline Edit key
		}
	} else {
		$sAction = @$_POST["a_list"];
		if (strtolower($sAction) == "update") { // Update Record

			// Get fields from form
			$GLOBALS["x_brand_id"] = @$_POST["x_brand_id"];
			$GLOBALS["x_brand_name"] = @$_POST["x_brand_name"];
			$GLOBALS["x_brand_code"] = @$_POST["x_brand_code"];
			$GLOBALS["x_delete_flag"] = @$_POST["x_delete_flag"];
			$GLOBALS["x_delete_comment"] = @$_POST["x_delete_comment"];
			$GLOBALS["x_brand_description"] = @$_POST["x_brand_description"];
			$GLOBALS["x_create_user"] = @$_POST["x_create_user"];
			$GLOBALS["x_create_date"] = @$_POST["x_create_date"];
			$GLOBALS["x_update_user"] = @$_POST["x_update_user"];
			$GLOBALS["x_update_date"] = @$_POST["x_update_date"];
			if ($_SESSION[ewSessionTblKey ."_brand_id"] == ((get_magic_quotes_gpc())? stripslashes($x_brand_id) : $x_brand_id)) {
				if (InlineEditData($conn)) {
					$_SESSION[ewSessionMessage] = "Update Record Successful";
				}
			}
		}
		$_SESSION[ewSessionTblKey . "_brand_id"] = ""; // Clear Inline Edit key
	}
}

//-------------------------------------------------------------------------------
// Function BasicSearchSQL
// - Build WHERE clause for a keyword

function BasicSearchSQL($Keyword)
{
	$sKeyword = (!get_magic_quotes_gpc()) ? addslashes($Keyword) : $Keyword;
	$BasicSearchSQL = "";
	$BasicSearchSQL.= "brand_name LIKE '%" . $sKeyword . "%' OR ";
	$BasicSearchSQL.= "brand_code LIKE '%" . $sKeyword . "%' OR ";
	$BasicSearchSQL.= "delete_flag LIKE '%" . $sKeyword . "%' OR ";
	$BasicSearchSQL.= "brand_description LIKE '%" . $sKeyword . "%' OR ";
	$BasicSearchSQL.= "create_date LIKE '%" . $sKeyword . "%' OR ";
	$BasicSearchSQL.= "update_date LIKE '%" . $sKeyword . "%' OR ";
	if (substr($BasicSearchSQL, -4) == " OR ") { $BasicSearchSQL = substr($BasicSearchSQL, 0, strlen($BasicSearchSQL)-4); }
	return $BasicSearchSQL;
}

//-------------------------------------------------------------------------------
// Function SetUpBasicSearch
// - Set up Basic Search parameter based on form elements pSearch & pSearchType
// - Variables setup: sSrchBasic

function SetUpBasicSearch()
{
	global $sSrchBasic, $psearch, $psearchtype;
	if ($psearch <> "") {
		if ($psearchtype <> "") {
			while (strpos($psearch, "  ") != false) {
				$psearch = str_replace("  ", " ",$psearch);
			}
			$arKeyword = split(" ", trim($psearch));
			foreach ($arKeyword as $sKeyword) {
				$sSrchBasic .= "(" . BasicSearchSQL($sKeyword) . ") " . $psearchtype . " ";
			}
		} else {
			$sSrchBasic = BasicSearchSQL($psearch);
		}
	}
	if (substr($sSrchBasic, -4) == " OR ") { $sSrchBasic = substr($sSrchBasic, 0, strlen($sSrchBasic)-4); }
	if (substr($sSrchBasic, -5) == " AND ") { $sSrchBasic = substr($sSrchBasic, 0, strlen($sSrchBasic)-5); }
	if ($psearch <> "") {
		$_SESSION[ewSessionTblBasicSrch] = $psearch;
		$_SESSION[ewSessionTblBasicSrchType] = $psearchtype;
	}
}

//-------------------------------------------------------------------------------
// Function ResetSearch
// - Clear all search parameters

function ResetSearch() 
{

	// Clear search where
	$sSrchWhere = "";
	$_SESSION[ewSessionTblSearchWhere] = $sSrchWhere;

	// Clear advanced search parameters
	$_SESSION[ewSessionTblAdvSrch . "_x_brand_id"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_brand_name"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_brand_code"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_delete_flag"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_delete_comment"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_brand_description"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_create_user"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_create_date"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_update_user"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_update_date"] = "";
	$_SESSION[ewSessionTblBasicSrch] = "";
	$_SESSION[ewSessionTblBasicSrchType] = "";
}

//-------------------------------------------------------------------------------
// Function RestoreSearch
// - Restore all search parameters
//

function RestoreSearch()
{

	// Restore advanced search settings
	$GLOBALS["x_brand_id"] = @$_SESSION[ewSessionTblAdvSrch . "_x_brand_id"];
	$GLOBALS["x_brand_name"] = @$_SESSION[ewSessionTblAdvSrch . "_x_brand_name"];
	$GLOBALS["x_brand_code"] = @$_SESSION[ewSessionTblAdvSrch . "_x_brand_code"];
	$GLOBALS["x_delete_flag"] = @$_SESSION[ewSessionTblAdvSrch . "_x_delete_flag"];
	$GLOBALS["x_delete_comment"] = @$_SESSION[ewSessionTblAdvSrch . "_x_delete_comment"];
	$GLOBALS["x_brand_description"] = @$_SESSION[ewSessionTblAdvSrch . "_x_brand_description"];
	$GLOBALS["x_create_user"] = @$_SESSION[ewSessionTblAdvSrch . "_x_create_user"];
	$GLOBALS["x_create_date"] = @$_SESSION[ewSessionTblAdvSrch . "_x_create_date"];
	$GLOBALS["x_update_user"] = @$_SESSION[ewSessionTblAdvSrch . "_x_update_user"];
	$GLOBALS["x_update_date"] = @$_SESSION[ewSessionTblAdvSrch . "_x_update_date"];
	$GLOBALS["psearch"] = @$_SESSION[ewSessionTblBasicSrch];
	$GLOBALS["psearchtype"] = @$_SESSION[ewSessionTblBasicSrchType];
}

//-------------------------------------------------------------------------------
// Function SetUpSortOrder
// - Set up Sort parameters based on Sort Links clicked
// - Variables setup: sOrderBy, Session(TblOrderBy), Session(Tbl_Field_Sort)

function SetUpSortOrder()
{
	global $sOrderBy;
	global $sDefaultOrderBy;

	// Check for an Order parameter
	if (strlen(@$_GET["order"]) > 0) {
		$sOrder = @$_GET["order"];

		// Field brand_id
		if ($sOrder == "brand_id") {
			$sSortField = "brand_id";
			$sLastSort = @$_SESSION[ewSessionTblSort . "_x_brand_id"];
			$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			$_SESSION[ewSessionTblSort . "_x_brand_id"] = $sThisSort;
		} else {
			if (@$_SESSION[ewSessionTblSort . "_x_brand_id"] <> "") { @$_SESSION[ewSessionTblSort . "_x_brand_id"] = ""; }
		}

		// Field brand_name
		if ($sOrder == "brand_name") {
			$sSortField = "brand_name";
			$sLastSort = @$_SESSION[ewSessionTblSort . "_x_brand_name"];
			$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			$_SESSION[ewSessionTblSort . "_x_brand_name"] = $sThisSort;
		} else {
			if (@$_SESSION[ewSessionTblSort . "_x_brand_name"] <> "") { @$_SESSION[ewSessionTblSort . "_x_brand_name"] = ""; }
		}

		// Field brand_code
		if ($sOrder == "brand_code") {
			$sSortField = "brand_code";
			$sLastSort = @$_SESSION[ewSessionTblSort . "_x_brand_code"];
			$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			$_SESSION[ewSessionTblSort . "_x_brand_code"] = $sThisSort;
		} else {
			if (@$_SESSION[ewSessionTblSort . "_x_brand_code"] <> "") { @$_SESSION[ewSessionTblSort . "_x_brand_code"] = ""; }
		}

		// Field delete_flag
		if ($sOrder == "delete_flag") {
			$sSortField = "delete_flag";
			$sLastSort = @$_SESSION[ewSessionTblSort . "_x_delete_flag"];
			$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			$_SESSION[ewSessionTblSort . "_x_delete_flag"] = $sThisSort;
		} else {
			if (@$_SESSION[ewSessionTblSort . "_x_delete_flag"] <> "") { @$_SESSION[ewSessionTblSort . "_x_delete_flag"] = ""; }
		}

		// Field brand_description
		if ($sOrder == "brand_description") {
			$sSortField = "brand_description";
			$sLastSort = @$_SESSION[ewSessionTblSort . "_x_brand_description"];
			$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			$_SESSION[ewSessionTblSort . "_x_brand_description"] = $sThisSort;
		} else {
			if (@$_SESSION[ewSessionTblSort . "_x_brand_description"] <> "") { @$_SESSION[ewSessionTblSort . "_x_brand_description"] = ""; }
		}
		$_SESSION[ewSessionTblOrderBy] = $sSortField . " " . $sThisSort;
		$_SESSION[ewSessionTblStartRec] = 1;
	}
	$sOrderBy = @$_SESSION[ewSessionTblOrderBy];
	if ($sOrderBy == "") {
		if (ewSqlOrderBy <> "" && ewSqlOrderBySessions <> "") {
			$sOrderBy = ewSqlOrderBy;
			@$_SESSION[ewSessionTblOrderBy] = $sOrderBy;
			$arOrderBy = explode(",", ewSqlOrderBySessions);
			for($i=0; $i<count($arOrderBy); $i+=2) {
				@$_SESSION[ewSessionTblSort . "_" . $arOrderBy[$i]] = $arOrderBy[$i+1];
			}
		}
	}
}

//-------------------------------------------------------------------------------
// Function SetUpStartRec
//- Set up Starting Record parameters based on Pager Navigation
// - Variables setup: nStartRec

function SetUpStartRec()
{

	// Check for a START parameter
	global $nStartRec;
	global $nDisplayRecs;
	global $nTotalRecs;
	if (strlen(@$_GET[ewTblStartRec]) > 0) {
		$nStartRec = @$_GET[ewTblStartRec];
		$_SESSION[ewSessionTblStartRec] = $nStartRec;
	} elseif (strlen(@$_GET["pageno"]) > 0) {
		$nPageNo = @$_GET["pageno"];
		if (is_numeric($nPageNo)) {
			$nStartRec = ($nPageNo-1)*$nDisplayRecs+1;
			if ($nStartRec <= 0) {
				$nStartRec = 1;
			} elseif ($nStartRec >= intval(($nTotalRecs-1)/$nDisplayRecs)*$nDisplayRecs+1) {
				$nStartRec = intval(($nTotalRecs-1)/$nDisplayRecs)*$nDisplayRecs+1;
			}
			$_SESSION[ewSessionTblStartRec] = $nStartRec;
		} else {
			$nStartRec = @$_SESSION[ewSessionTblStartRec];
		}
	} else {
		$nStartRec = @$_SESSION[ewSessionTblStartRec];
	}

	// Check if correct start record counter
	if (!(is_numeric($nStartRec)) || ($nStartRec == "")) { // Avoid invalid start record counter
		$nStartRec = 1; // Reset start record counter
		$_SESSION[ewSessionTblStartRec] = $nStartRec;
	} elseif ($nStartRec > $nTotalRecs) { // Avoid starting record > total records
		$nStartRec = intval(($nTotalRecs-1)/$nDisplayRecs)*$nDisplayRecs+1; // Point to last page first record
		$_SESSION[ewSessionTblStartRec] = $nStartRec;
	}
}

//-------------------------------------------------------------------------------
// Function ResetCmd
// - Clear list page parameters
// - RESET: reset search parameters
// - RESETALL: reset search & master/detail parameters
// - RESETSORT: reset sort parameters

function ResetCmd()
{

	// Get Reset command
	if (strlen(@$_GET["cmd"]) > 0) {
		$sCmd = @$_GET["cmd"];
		if (strtolower($sCmd) == "reset") { // Reset search criteria
			ResetSearch();
		} elseif (strtolower($sCmd) == "resetall") { // Reset search criteria and session vars
			ResetSearch();
		} elseif (strtolower($sCmd) == "resetsort") { // Reset sort criteria
			$sOrderBy = "";
			$_SESSION[ewSessionTblOrderBy] = $sOrderBy;
			if (@$_SESSION[ewSessionTblSort . "_x_brand_id"] <> "") { $_SESSION[ewSessionTblSort . "_x_brand_id"] = ""; }
			if (@$_SESSION[ewSessionTblSort . "_x_brand_name"] <> "") { $_SESSION[ewSessionTblSort . "_x_brand_name"] = ""; }
			if (@$_SESSION[ewSessionTblSort . "_x_brand_code"] <> "") { $_SESSION[ewSessionTblSort . "_x_brand_code"] = ""; }
			if (@$_SESSION[ewSessionTblSort . "_x_delete_flag"] <> "") { $_SESSION[ewSessionTblSort . "_x_delete_flag"] = ""; }
			if (@$_SESSION[ewSessionTblSort . "_x_brand_description"] <> "") { $_SESSION[ewSessionTblSort . "_x_brand_description"] = ""; }
		}

		// Reset start position (Reset command)
		$nStartRec = 1;
		$_SESSION[ewSessionTblStartRec] = $nStartRec;
	}
}
?>
<?php

//-------------------------------------------------------------------------------
// Function LoadData
// - Variables setup: field variables

function LoadData($conn)
{
	global $x_brand_id;
	$sFilter = ewSqlKeyWhere;
	if (!is_numeric($x_brand_id)) return false;
	$x_brand_id =  (get_magic_quotes_gpc()) ? stripslashes($x_brand_id) : $x_brand_id;
	$sFilter = str_replace("@brand_id", AdjustSql($x_brand_id), $sFilter); // Replace key value
	$sSql = ewBuildSql(ewSqlSelect, ewSqlWhere, ewSqlGroupBy, ewSqlHaving, ewSqlOrderBy, $sFilter, "");
	$rs = phpmkr_query($sSql,$conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSql);
	if (phpmkr_num_rows($rs) == 0) {
		$bLoadData = false;
	} else {
		$bLoadData = true;
		$row = phpmkr_fetch_array($rs);

		// Get the field contents
		$GLOBALS["x_brand_id"] = $row["brand_id"];
		$GLOBALS["x_brand_name"] = $row["brand_name"];
		$GLOBALS["x_brand_code"] = $row["brand_code"];
		$GLOBALS["x_delete_flag"] = $row["delete_flag"];
		$GLOBALS["x_delete_comment"] = $row["delete_comment"];
		$GLOBALS["x_brand_description"] = $row["brand_description"];
		$GLOBALS["x_create_user"] = $row["create_user"];
		$GLOBALS["x_create_date"] = $row["create_date"];
		$GLOBALS["x_update_user"] = $row["update_user"];
		$GLOBALS["x_update_date"] = $row["update_date"];
	}
	phpmkr_free_result($rs);
	return $bLoadData;
}
?>
<?php

//-------------------------------------------------------------------------------
// Function EditData
// - Variables used: field variables

function InlineEditData($conn)
{
	global $x_brand_id;
	$sFilter = ewSqlKeyWhere;
	if (!is_numeric($x_brand_id)) return false;
	$sTmp =  (get_magic_quotes_gpc()) ? stripslashes($x_brand_id) : $x_brand_id;
	$sFilter = str_replace("@brand_id", AdjustSql($sTmp), $sFilter); // Replace key value
	$sSql = ewBuildSql(ewSqlSelect, ewSqlWhere, ewSqlGroupBy, ewSqlHaving, ewSqlOrderBy, $sFilter, "");
	$rs = phpmkr_query($sSql,$conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSql);

	// Get old recordset
	$oldrs = phpmkr_fetch_array($rs);
	if (phpmkr_num_rows($rs) == 0) {
		return false; // Update Failed
	} else {
		$x_brand_id = @$_POST["x_brand_id"];
		$x_brand_name = @$_POST["x_brand_name"];
		$x_brand_code = @$_POST["x_brand_code"];
		$x_delete_flag = @$_POST["x_delete_flag"];
		$x_brand_description = @$_POST["x_brand_description"];
		$theValue = (!get_magic_quotes_gpc()) ? addslashes($GLOBALS["x_brand_name"]) : $GLOBALS["x_brand_name"]; 
		$theValue = ($theValue != "") ? " '" . $theValue . "'" : "NULL";
		$fieldList["brand_name"] = $theValue;
		$theValue = (!get_magic_quotes_gpc()) ? addslashes($GLOBALS["x_brand_code"]) : $GLOBALS["x_brand_code"]; 
		$theValue = ($theValue != "") ? " '" . $theValue . "'" : "NULL";
		$fieldList["brand_code"] = $theValue;
		$theValue = (!get_magic_quotes_gpc()) ? addslashes($GLOBALS["x_delete_flag"]) : $GLOBALS["x_delete_flag"]; 
		$theValue = ($theValue != "") ? " '" . $theValue . "'" : "NULL";
		$fieldList["delete_flag"] = $theValue;
		$theValue = (!get_magic_quotes_gpc()) ? addslashes($GLOBALS["x_brand_description"]) : $GLOBALS["x_brand_description"]; 
		$theValue = ($theValue != "") ? " '" . $theValue . "'" : "NULL";
		$fieldList["brand_description"] = $theValue;

		// Updating event
		if (Recordset_Updating($fieldList, $oldrs)) {

			// Update
			$sSql = "UPDATE cnf_barnd SET ";
			foreach ($fieldList as $key=>$temp) {
				$sSql .= "$key = $temp, ";
			}
			if (substr($sSql, -2) == ", ") {
				$sSql = substr($sSql, 0, strlen($sSql)-2);
			}
			$sSql .= " WHERE " . $sFilter;
			phpmkr_query($sSql,$conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSql);
			$result = (phpmkr_affected_rows($conn) >= 0);

			// Updated event
			if ($result) Recordset_Updated($fieldList, $oldrs);
		} else {
			$result = false; // Update Failed
		}
	}
	return $result;
}

// Updating Event
function Recordset_Updating(&$newrs, $oldrs)
{

	// Enter your customized codes here
	return true;
}

// Updated event
function Recordset_Updated($newrs, $oldrs)
{
	$table = "cnf_barnd";
}
?>
