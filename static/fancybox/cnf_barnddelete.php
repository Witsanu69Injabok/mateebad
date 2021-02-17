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
if (($ewCurSec & ewAllowDelete) <> ewAllowDelete) {
	ob_end_clean();
	header("Location: cnf_barndlist.php");
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
$arRecKey = NULL;

// Load key parameters
$sKey = "";
$bSingleDelete = true;
$x_brand_id = @$_GET["brand_id"];
if (($x_brand_id == "") || (is_null($x_brand_id))) {
	$bSingleDelete = false;
} else {
	if ($sKey <> "") $sKey .= ",";
	$sKey .= $x_brand_id;
	if (!is_numeric($x_brand_id)) {
		ob_end_clean();
		header("Location: cnf_barndlist.php");
		exit();
	}
}
if (!$bSingleDelete) $sKey = @$_POST["key_d"];
if (!is_array($sKey)) {
 if (strlen($sKey) > 0) $arRecKey = split(",", $sKey);
} else {
 $sKey = implode(",", $sKey);
 $arRecKey = split(",", $sKey);
}
if (count($arRecKey) <= 0) {
	ob_end_clean();
	header("Location: cnf_barndlist.php");
	exit();
}
$sKey = implode(",", $arRecKey);
$i = 0;
$sDbWhere = "";
while ($i < count($arRecKey)) {
	$sDbWhere .= "(";

	// Remove spaces
	$sRecKey = trim($arRecKey[$i+0]);
	$sRecKey = (!get_magic_quotes_gpc()) ? addslashes($sRecKey) : $sRecKey ;

	// Build the SQL
	$sDbWhere .= "brand_id=" . $sRecKey . " AND ";
	if (substr($sDbWhere, -5) == " AND ") { $sDbWhere = substr($sDbWhere, 0, strlen($sDbWhere)-5) . ") OR "; }
	$i += 1;
}
if (substr($sDbWhere, -4) == " OR ") { $sDbWhere = substr($sDbWhere, 0 , strlen($sDbWhere)-4); }

// Get action
$sAction = @$_POST["a_delete"];
if (($sAction == "") || ((is_null($sAction)))) {
	$sAction = "D";	// Delete record directly
}
$conn = phpmkr_db_connect(HOST, USER, PASS, DB, PORT);
switch ($sAction) {
	case "I": // Display
		if (LoadRecordCount($sDbWhere,$conn) <= 0) {
			phpmkr_db_close($conn);
			ob_end_clean();
			header("Location: cnf_barndlist.php");
			exit();
		}
		break;
	case "D": // Delete
		if (DeleteData($sDbWhere,$conn)) {
			$_SESSION[ewSessionMessage] = "Delete Successful";
			phpmkr_db_close($conn);
			ob_end_clean();
			header("Location: cnf_barndlist.php");
			exit();
		}
		break;
}
?>
<?php include ("header.php") ?>
<p><span class="phpmaker">Delete from TABLE: Brand Info<br><br><a href="cnf_barndlist.php">Back to List</a></span></p>
<form action="cnf_barnddelete.php" method="post">
<p>
<input type="hidden" name="a_delete" value="D">
<?php $sKey = (get_magic_quotes_gpc()) ? stripslashes($sKey) : $sKey; ?>
<input type="hidden" name="key_d" value="<?php echo htmlspecialchars($sKey); ?>">
<table class="ewTable">
	<tr class="ewTableHeader">
		<td valign="top"><span>brand id</span></td>
		<td valign="top"><span>ยี่ห้อ</span></td>
		<td valign="top"><span>รหัสยี่ห้อ</span></td>
		<td valign="top"><span>brand_status</span></td>
		<td valign="top"><span>หมายเหตุ</span></td>
	</tr>
<?php
$nRecCount = 0;
$i = 0;
while ($i < count($arRecKey)) {
	$nRecCount++;

	// Set row color
	$sItemRowClass = " class=\"ewTableRow\"";

	// Display alternate color for rows
	if ($nRecCount % 2 <> 0) {
		$sItemRowClass = " class=\"ewTableAltRow\"";
	}
	$sRecKey = trim($arRecKey[$i+0]);
	$sRecKey = (get_magic_quotes_gpc()) ? stripslashes($sRecKey) : $sRecKey;
	$x_brand_id = $sRecKey;
	if (!is_numeric($x_brand_id)) {
		ob_end_clean();
		header("Location: cnf_barndlist.php");
		exit();
	}
	if (LoadData($conn)) {
?>
	<tr<?php echo $sItemRowClass;?>>
		<td><span>
<?php echo $x_brand_id; ?>
</span></td>
		<td><span>
<?php echo $x_brand_name; ?>
</span></td>
		<td><span>
<?php echo $x_brand_code; ?>
</span></td>
		<td><span>
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
</span></td>
		<td><span>
<?php echo $x_brand_description; ?>
</span></td>
	</tr>
<?php
	}
	$i += 1;
}
?>
</table>
<p>
<input type="submit" name="Action" value="CONFIRM DELETE">
</form>
<?php include ("footer.php") ?>
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
// Function LoadRecordCount
// - Load Record Count based on input sql criteria sqlKey

function LoadRecordCount($sqlKey, $conn)
{
	global $x_brand_id;
	$sFilter = $sqlKey;
	$sSql = ewBuildSql(ewSqlSelect, ewSqlWhere, ewSqlGroupBy, ewSqlHaving, ewSqlOrderBy, $sFilter, "");	
	$rs = phpmkr_query($sSql,$conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSql);
	return phpmkr_num_rows($rs);
	phpmkr_free_result($rs);
}

//-------------------------------------------------------------------------------
// Function DeleteData
// - Delete Records based on input sql criteria sqlKey

function DeleteData($sqlKey, $conn)
{
	global $x_brand_id;
	$sFilter = $sqlKey;

	// Backup the record before delete
	$sSql = ewBuildSql(ewSqlSelect, ewSqlWhere, ewSqlGroupBy, ewSqlHaving, ewSqlOrderBy, $sFilter, "");
	$query = phpmkr_query($sSql,$conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSql);
	while ($temp = phpmkr_fetch_array($query)) {
		$oldrs[] = $temp;
	}

	// Delete
	$sSql = "DELETE FROM cnf_barnd";
	$sWhere = "";
	if ($sFilter <> "") {
		if ($sWhere <> "") $sWhere .= " AND ";
		$sWhere .= $sFilter;
	}
	if ($sWhere <> "") {
		$sSql .= " WHERE " . $sWhere;
	}

	// Deleting event
	if (Recordset_Deleting($oldrs)) {
		phpmkr_query($sSql,$conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSql);
		$result = (phpmkr_affected_rows($conn) > 0);

		// Deleted event
		if ($result) Recordset_Deleted($oldrs);
	} else {
		$result = false;
	}
	return $result;
}

// Deleting event
function Recordset_Deleting($oldrs)
{

	// Enter your customized codes here
	return true;
}

// Deleted event
function Recordset_Deleted($oldrs)
{
	$table = "cnf_barnd";
}
?>
