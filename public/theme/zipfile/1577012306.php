<?php

###############################################################
# cPanel FTP Account Creator 1.0
###############################################################
# Visit http://www.zubrag.com/scripts/ for updates
###############################################################
# Required parameters:
# - domain - create ftp account for this domain
# - fuser - ftp account username
# - fpass - ftp account password
# - fquota - ftp account quota
# - fhomedir - ftp account home directory (home folder)
#
# Sample run: cpanel-add-ftp.php?domain=reseller.com&fuser=ftp555&fpass=ftp12345&fquota=50&fhomedir=/
#
# This script can also be run from another PHP script. This may
# be helpful if you have some user interface already in place and 
# want to automatically create FTP accounts from there.
# In this case you have to setup following variables instead of
# passing them via url as parameters:
# - $domain - new account domain
# - $fuser - new ftp account username
# - $fpass - new ftp account password
# - $fquota - account quota
# - $fhomedir - user's home directory
#
# Feel free to post your questions and comments at http://www.zubrag.com/forum/
#
###############################################################

#####################################################################################
##############        START OF SETTINGS. YOU MAY EDIT BELOW    ######################
#####################################################################################

// Cpanel username and password
$user = "your-cpanel-username-here";
$pass = "your-cpanel-password-here";

// cpanel skin. For more info on what is your skin check 
// this url      http://www.zubrag.com/articles/determine-cpanel-skin.php 
$skin = "x";

#####################################################################################
##############          END OF SETTINGS. DO NOT EDIT BELOW    #######################
#####################################################################################

function getVar($name, $def = '') {
  if (isset($_REQUEST[$name]))
    return $_REQUEST[$name];
  else
    return $def;
}

// ftp account for domain
if (!isset($domain)) {
  $domain = getVar('domain');
}

// ftp user
if (!isset($fuser)) {
  $fuser = getVar('fuser');
}

// ftp password
if (!isset($fpass)) {
  $fpass = getVar('fpass');
}

// ftp quota
if (!isset($fquota)) {
  $fquota = getVar('fquota');
}

// ftp homedir
if (!isset($fhomedir)) {
  $fhomedir = getVar('fhomedir');
}

if (empty($domain)) {
$frm = <<<EOD
<html>
<head>
  <title>cPanel FTP Account Creator</title>
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
</head>
<body>
  <style>
    input { border: 1px solid black; }
  </style>
<form method="post">
<h3>cPanel FTP Account Creator</h3>
<table border="0">
<tr><td>Domain:</td><td><input name="domain" size="30"></td><td>domain without www part</td></tr>
<tr><td>FTP Username:</td><td><input name="fuser" size="30"></td><td></td></tr>
<tr><td>FTP Password:</td><td><input name="fpass" size="30"></td><td></td></tr>
<tr><td>FTP Home Directory:</td><td><input name="fhomedir" size="30" value="/"></td><td></td></tr>
<tr><td>FTP Quota:</td><td><input name="fquota" size="30" value="0"></td><td>numeric ftp quota, Mb (0 for unlimited)<br>This parameter may not work with early cPanel versions.</td></tr>
<tr><td colspan="3"><br /><input type="submit" value="Create FTP Account"></td></tr>
</table>
</form>
</body>
</html>
EOD;
die($frm);
}

$url = "http://$user:$pass@$domain:2082/frontend/$skin/ftp/doaddftp.html?";
$url = $url . "login=$fuser&password=$fpass&homedir=$fhomedir&quota=$fquota";
$result = @file_get_contents($url);
if ($result === FALSE) die("ERROR: FTP Account not created. Please make sure you passed correct parameters.");
echo $result;

?>