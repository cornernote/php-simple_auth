<?php
include('db.php');
include('sess.php');
session_start();
include('db.php');
if ($_POST['username'] && $_POST['password']) {
  $username = mysql_real_escape_string($_POST['username']);
  $password = md5(mysql_real_escape_string($_POST['password']));
  $query = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'";
  $result = mysql_query($query);
  if (!$result) {
    echo "Could not successfully run query ($query) from DB: " . mysql_error();
    exit;
  }
  $site = dirname($_SERVER['SCRIPT_NAME']); // gets the site name  (eg: /loginsystem or /clientabc)
  $site = str_replace('/','',$site); // removes the / from the start of the site name
  $user = mysql_fetch_assoc($result);

  if ($user && $user['site_name']==$site){
    $_SESSION['user']['id'] = $user['id'];
    $_SESSION['user']['username'] = $user['username'];
	$_SESSION['user']['group_id'] = $user['group_id'];
	
	// user is an admin
	if ($user['group_id']==1) {
      header('Location: /Ray_White_Norwest/index.php');
	}
	// user is a subuser
	elseif ($user['group_id']==2) {
      header('Location: forms2.php');
	}
	// user is a guest
	else {
      header('Location: forms2.php');
	}
  }
  else {
    $error = 'cannot login';
  }
}
?>
<html>
<head>
<link rel="shortcut icon" href="us_icon.ico" />
<title>United Services (Australia) Pty Limited</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

<!--

body,td,th {
	font-family: Tahoma;
	color: #373737;
	text-align: right;
	font-size: 18px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #2A2A2A;
	background-image: url(Background/background-login.png);
	background-repeat: no-repeat;
	text-align: left;
	background-position: right top;
	alignment-baseline: before-edge;
	position: relative;
	bottom: auto;
	font-size: 1px;
}

#
.style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
a:link {
	color: #000066;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000066;
}
a:hover {
	text-decoration: underline;
	color: #0066FF;
}
a:active {
	text-decoration: none;
	color: #00FF00;
}
#footer {
	vertical-align: baseline;
	bottom: auto;
	clip: rect(auto,auto,auto,auto);
}
LOGIN_U {
	font-size: 18px;
}
#transback #menubar table tr td form p strong {
	font-size: 14px;
}
#transback #menubar table tr td form p strong {
	text-align: right;
}

-->
</style>
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onLoad="MM_preloadImages('Menu Buttons/Login-RO.png','Menu Buttons/Blank.png','Menu Buttons/Contact-Us-RO.png','Menu Buttons/Building-Management-RO.png','Menu Buttons/Line-Marking-RO.png','Menu Buttons/Painting-RO.png','Menu Buttons/Office-Fit-Outs-RO.png','Menu Buttons/Maintenance-RO.png','Menu Buttons/Our-Service-RO.png','Menu Buttons/Home-RO.png','Menu Buttons/Blank-Starter.png')">
<div id="transback">
  <div id="menubar">
    <table width="1360" border="0" align="right">
      <tr>
        <td colspan="6"><p><a href="index.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('home','','Menu Buttons/Home-RO.png',1)"><img src="Menu Buttons/Home.png" name="home" width="81" height="122" border="0"></a><a href="ourservice.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('ourservice','','Menu Buttons/Our-Service-RO.png',1)"><img src="Menu Buttons/Our-Service.png" name="ourservice" width="116" height="122" border="0"></a><a href="maintenance.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('maintenance','','Menu Buttons/Maintenance-RO.png',1)"><img src="Menu Buttons/Maintenance.png" name="maintenance" width="126" height="122" border="0"></a><a href="officefitouts.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('office fitouts','','Menu Buttons/Office-Fit-Outs-RO.png',1)"><img src="Menu Buttons/Office-Fit-Outs.png" name="office fitouts" width="136" height="122" border="0"></a><a href="painting.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('painting','','Menu Buttons/Painting-RO.png',1)"><img src="Menu Buttons/Painting.png" name="painting" width="94" height="122" border="0"></a><a href="linemarking.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('linemarking','','Menu Buttons/Line-Marking-RO.png',1)"><img src="Menu Buttons/Line-Marking.png" name="linemarking" width="126" height="122" border="0"></a><a href="buildingmanagement.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('buildingmanagement','','Menu Buttons/Building-Management-RO.png',1)"><img src="Menu Buttons/Building-Management.png" name="buildingmanagement" width="187" height="122" border="0"></a><a href="contactus.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('contactus','','Menu Buttons/Contact-Us-RO.png',1)"><img src="Menu Buttons/Contact-Us.png" name="contactus" width="112" height="122" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('blank','','Menu Buttons/Blank.png',1)"><img src="Menu Buttons/Blank.png" name="blank" width="60" height="122" border="0"></a><a href="login.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('login','','Menu Buttons/Login-RO.png',1)"><img src="Menu Buttons/Login-RO.png" name="login" width="76" height="122" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('starter','','Menu Buttons/Blank-Starter.png',1)"><img src="Menu Buttons/Blank-Starter.png" name="starter" width="20" height="122" border="0"></a></p>
<p>&nbsp; </p></td>
      </tr>
      <tr>
        <td colspan="6">&nbsp;</td>
      </tr>
      <tr>
        <td height="24" colspan="2">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
        <td width="405">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td width="290">&nbsp;</td>
        <td width="128">&nbsp;</td>
        <td width="512"><form method="POST">
          <p align="right">&nbsp;</p>
          <p align="right"><strong>Username:</strong>
            <input type="text" name="username">
          </p>
          <p align="right"><strong>Password:</strong>
            <input type="password" name="password">
        </p>
          <p align="right"><br>
            <input name="submit" type="submit" value="Login">
          </p>
        </form></td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div>
</div>
<p>&nbsp; </p>
<p>&nbsp;</p>
</body>
</html>
<script type="text/javascript" src="ieupdate.js"></script>