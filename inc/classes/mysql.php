<?
include '../../conexao.php';

class Mysql {

	function getQuery($varquery) {

		$query = mysql_query($varquery);
		return mysql_fetch_array($query);

	}

}

?>