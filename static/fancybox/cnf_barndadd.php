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
if (($ewCurSec & ewAllowAdd) <> ewAllowAdd) {
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

// Load key from QueryString
$bCopy = true;
$x_brand_id = @$_GET["brand_id"];
if (($x_brand_id == "") || (is_null($x_brand_id))) $bCopy = false;

// Get action
$sAction = @$_POST["a_add"];
if (($sAction == "") || ((is_null($sAction)))) {
	if ($bCopy) {
		$sAction = "C"; // Copy record
	} else {
		$sAction = "I"; // Display blank record
	}
} else {

	// Get fields from form
	$x_brand_id = @$_POST["x_brand_id"];
	$x_brand_name = @$_POST["x_brand_name"];
	$x_brand_code = @$_POST["x_brand_code"];
	$x_delete_flag = @$_POST["x_delete_flag"];
	$x_delete_comment = @$_POST["x_delete_comment"];
	$x_brand_description = @$_POST["x_brand_description"];
	$x_create_user = @$_POST["x_create_user"];
	$x_create_date = @$_POST["x_create_date"];
	$x_update_user = @$_POST["x_update_user"];
	$x_update_date = @$_POST["x_update_date"];
}
$conn = phpmkr_db_connect(HOST, USER, PASS, DB, PORT);
switch ($sAction) {
	case "C": // Copy record
		if (!LoadData($conn)) { // Load record
			$_SESSION[ewSessionMessage] = "No records found";
			phpmkr_db_close($conn);
			ob_end_clean();
			header("Location: cnf_barndlist.php");
			exit();
		}
		break;
	case "A": // Add
		if (AddData($conn)) { // Add new record
			$_SESSION[ewSessionMessage] = "Add New Record Successful";
			phpmkr_db_close($conn);
			ob_end_clean();
			header("Location: cnf_barndlist.php");
			exit();
		}
		break;
}
?>
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
if (EW_this.x_create_user && !EW_checkinteger(EW_this.x_create_user.value)) {
	if (!EW_onError(EW_this, EW_this.x_create_user, "TEXT", "Incorrect integer - create user"))
		return false; 
}
return true;
}

//-->
</script>
<script type="text/javascript">
<!--
	var EW_DHTMLEditors = [];

//-->
</script>
<p><span class="phpmaker">Add to TABLE: Brand Info<br><br><a href="cnf_barndlist.php">Back to List</a></span></p>
<form name="fcnf_barndadd" id="fcnf_barndadd" action="cnf_barndadd.php" method="post" onSubmit="return EW_checkMyForm(this);">
<p>
<input type="hidden" name="a_add" value="A">
<?php
if (@$_SESSION[ewSessionMessage] <> "") {
?>
<p><span class="ewmsg"><?php echo $_SESSION[ewSessionMessage] ?></span></p>
<?php
	$_SESSION[ewSessionMessage] = ""; // Clear message
}
?>
<table class="ewTable">
	<tr>
		<td class="ewTableHeader"><span>ยี่ห้อ</span></td>
		<td class="ewTableAltRow"><span id="cb_x_brand_name">
<input type="text" name="x_brand_name" id="x_brand_name" size="30" maxlength="255" value="<?php echo htmlspecialchars(@$x_brand_name) ?>">
</span></td>
	</tr>
	<tr>
		<td class="ewTableHeader"><span>รหัสยี่ห้อ</span></td>
		<td class="ewTableAltRow"><span id="cb_x_brand_code">
<input type="text" name="x_brand_code" id="x_brand_code" size="30" maxlength="50" value="<?php echo htmlspecialchars(@$x_brand_code) ?>">
</span></td>
	</tr>
	<tr>
		<td class="ewTableHeader"><span>brand_status</span></td>
		<td class="ewTableAltRow"><span id="cb_x_delete_flag">
<?php if (!(!is_null($x_delete_flag)) || ($x_delete_flag == "")) { $x_delete_flag = "N";} // Set default value ?>
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
</span></td>
	</tr>
	<tr>
		<td class="ewTableHeader"><span>หมายเหตุ</span></td>
		<td class="ewTableAltRow"><span id="cb_x_brand_description">
<input type="text" name="x_brand_description" id="x_brand_description" size="30" maxlength="255" value="<?php echo htmlspecialchars(@$x_brand_description) ?>">
</span></td>
	</tr>
	<tr>
		<td class="ewTableHeader"><span>create user</span></td>
		<td class="ewTableAltRow"><span id="cb_x_create_user">
<input type="text" name="x_create_user" id="x_create_user" size="30" value="<?php echo htmlspecialchars(@$x_create_user) ?>">
</span></td>
	</tr>
	<tr>
		<td class="ewTableHeader"><span>create date</span></td>
		<td class="ewTableAltRow"><span id="cb_x_create_date">
<input type="text" name="x_create_date" id="x_create_date" size="30" maxlength="50" value="<?php echo htmlspecialchars(@$x_create_date) ?>">
</span></td>
	</tr>
</table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="ADD">
</form>
<?php include ("footer.php") ?>
<?php
phpmkr_db_close($conn);
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
// Function AddData
// - Add Data
// - Variables used: field variables

function AddData($conn)
{
	global $x_brand_id;
	$sFilter = ewSqlKeyWhere;

	// Check for duplicate key
	$bCheckKey = true;
	if ((@$x_brand_id == "") || (is_null(@$x_brand_id))) {
		$bCheckKey = false;
	} else {
		$sFilter = str_replace("@brand_id", AdjustSql($x_brand_id), $sFilter); // Replace key value
	}
	if ($bCheckKey) {
		$sSqlChk = ewBuildSql(ewSqlSelect, ewSqlWhere, ewSqlGroupBy, ewSqlHaving, ewSqlOrderBy, $sFilter, "");
		$rsChk = phpmkr_query($sSqlChk, $conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSqlChk);
		if (phpmkr_num_rows($rsChk) > 0) {
			$_SESSION[ewSessionMessage] = "Duplicate value for primary key";
			phpmkr_free_result($rsChk);
			return false;
		}
		phpmkr_free_result($rsChk);
	}

	// Field brand_name
	$theValue = (!get_magic_quotes_gpc()) ? addslashes($GLOBALS["x_brand_name"]) : $GLOBALS["x_brand_name"]; 
	$theValue = ($theValue != "") ? " '" . $theValue . "'" : "NULL";
	$fieldList["brand_name"] = $theValue;

	// Field brand_code
	$theValue = (!get_magic_quotes_gpc()) ? addslashes($GLOBALS["x_brand_code"]) : $GLOBALS["x_brand_code"]; 
	$theValue = ($theValue != "") ? " '" . $theValue . "'" : "NULL";
	$fieldList["brand_code"] = $theValue;

	// Field delete_flag
	$theValue = (!get_magic_quotes_gpc()) ? addslashes($GLOBALS["x_delete_flag"]) : $GLOBALS["x_delete_flag"]; 
	$theValue = ($theValue != "") ? " '" . $theValue . "'" : "NULL";
	$fieldList["delete_flag"] = $theValue;

	// Field brand_description
	$theValue = (!get_magic_quotes_gpc()) ? addslashes($GLOBALS["x_brand_description"]) : $GLOBALS["x_brand_description"]; 
	$theValue = ($theValue != "") ? " '" . $theValue . "'" : "NULL";
	$fieldList["brand_description"] = $theValue;

	// Field create_user
	$theValue = ($GLOBALS["x_create_user"] != "") ? intval($GLOBALS["x_create_user"]) : "NULL";
	$fieldList["create_user"] = $theValue;

	// Field create_date
	$theValue = (!get_magic_quotes_gpc()) ? addslashes($GLOBALS["x_create_date"]) : $GLOBALS["x_create_date"]; 
	$theValue = ($theValue != "") ? " '" . $theValue . "'" : "NULL";
	$fieldList["create_date"] = $theValue;

	// Inserting event
	if (Recordset_Inserting($fieldList)) {

		// Insert
		$sSql = "INSERT INTO cnf_barnd (";
		$sSql .= implode(",", array_keys($fieldList));
		$sSql .= ") VALUES (";
		$sSql .= implode(",", array_values($fieldList));
		$sSql .= ")";	
		phpmkr_query($sSql, $conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSql);
		$fieldList["brand_id"] = phpmkr_insert_id($conn);
		$result = (phpmkr_affected_rows($conn) > 0);

		// Inserted event
		if ($result) Recordset_Inserted($fieldList);
	} else {
		$result = false;
	}
	return $result;
}

// Inserting event
function Recordset_Inserting(&$newrs)
{

	// Enter your customized codes here
	return true;
}

// Inserted event
function Recordset_Inserted($newrs)
{
	$table = "cnf_barnd";
}
?>
