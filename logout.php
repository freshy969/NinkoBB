<?php
/**
 * logout.php
 * 
 * Signs the user out, deletes cookies and sessions.
 * @author Nijiko Yonskai <me@nijikokun.com>
 * @version 1.1
 * @copyright (c) 2010 ANIGAIKU
 * @package ninko
 */
 
/**
 * Require common.php
 */
require("include/common.php");

// gets cookie if there is one
$login_cookie = @$_COOKIE["login"];

// if cookie is found, reset cookie and destroy session
if(isset($login_cookie))
{
	setcookie ("login", "", time()-60000*24*30); 
	@session_start();
	session_destroy();

	/**
	 * include header template
	 */
	include($config['template_path'] . "header.php");
	
	print_out(lang('success_logout'), lang('redirecting'));
}
else
{ 
	@session_start();
	session_destroy(); 
	
	/**
	 * include header template
	 */
	include($config['template_path'] . "header.php");
	
	print_out(lang('success_logout'), lang('redirecting'));
}
?>
</body>
</html>