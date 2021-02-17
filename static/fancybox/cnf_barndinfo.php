<?php

// PHPMaker 4 configuration
// Table level constants

define("ewTblVar", "cnf_barnd", true);
define("ewTblRecPerPage", "RecPerPage", true);
define("ewSessionTblRecPerPage", "cnf_barnd_RecPerPage", true);
define("ewTblStartRec", "start", true);
define("ewSessionTblStartRec", "cnf_barnd_start", true);
define("ewTblShowMaster", "showmaster", true);
define("ewSessionTblMasterKey", "cnf_barnd_MasterKey", true);
define("ewSessionTblMasterWhere", "cnf_barnd_MasterWhere", true);
define("ewSessionTblDetailWhere", "cnf_barnd_DetailWhere", true);
define("ewSessionTblAdvSrch", "cnf_barnd_AdvSrch", true);
define("ewTblBasicSrch", "psearch", true);
define("ewSessionTblBasicSrch", "cnf_barnd_psearch", true);
define("ewTblBasicSrchType", "psearchtype", true);
define("ewSessionTblBasicSrchType", "cnf_barnd_psearchtype", true);
define("ewSessionTblSearchWhere", "cnf_barnd_SearchWhere", true);
define("ewSessionTblSort", "cnf_barnd_Sort", true);
define("ewSessionTblOrderBy", "cnf_barnd_OrderBy", true);
define("ewSessionTblKey", "cnf_barnd_Key", true);

// Table level SQL
define("ewSqlSelect", "SELECT * FROM cnf_barnd", true);
define("ewSqlWhere", "", true);
define("ewSqlGroupBy", "", true);
define("ewSqlHaving", "", true);
define("ewSqlOrderBy", "", true);
define("ewSqlOrderBySessions", "", true);
define("ewSqlKeyWhere", "brand_id = @brand_id", true);
define("ewSqlUserIDFilter", "", true);
?>
