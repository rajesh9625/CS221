Donald Bren School of Information and Computer Sciences - Login<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="x-dns-prefetch-control" content="off">
<script type="text/javascript" language="JavaScript">
<!--
if (self != top) { try { if (document.domain != top.document.domain) { throw "Clickjacking security violation! Please log out immediately!"; /* this code should never execute - exception should already have been thrown since it's a security violation in this case to even try to access top.document.domain (but it's left here just to be extra safe) */ } } catch (e) { self.location = "/src/signout.php"; top.location = "/src/signout.php" } }
// -->
</script>

<title>Donald Bren School of Information and Computer Sciences - Login</title><script language="JavaScript" type="text/javascript">
<!--
  var alreadyFocused = false;
  function squirrelmail_loginpage_onload() {
    document.login_form.js_autodetect_results.value = '1';
    if (alreadyFocused) return;
    var textElements = 0;
    for (i = 0; i < document.login_form.elements.length; i++) {
      if (document.login_form.elements[i].type == "text" || document.login_form.elements[i].type == "password") {
        textElements++;
        if (textElements == 1) {
          document.login_form.elements[i].focus();
          break;
        }
      }
    }
  }
// -->
</script>

<!--[if IE 6]>
<style type="text/css">
/* avoid stupid IE6 bug with frames and scrollbars */
body {
    width: expression(document.documentElement.clientWidth - 30);
}
</style>
<![endif]-->

</head>

<body text="#000000" bgcolor="#ffffff" link="#0000cc" vlink="#0000cc" alink="#0000cc" onLoad="squirrelmail_loginpage_onload();">
<form action="redirect.php" method="post" name="login_form"  >
<table bgcolor="#ffffff" border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td align="center"><center><img src="../images/sm_logo.png" alt="Donald Bren School of Information and Computer Sciences Logo" width="308" height="111" /><br />
<small>SquirrelMail version 1.4.22-4.el6<br />
  By the SquirrelMail Project Team<br /></small>
<table bgcolor="#ffffff" border="0" width="350"><tr><td bgcolor="#dcdcdc" align="center"><b>Donald Bren School of Information and Computer Sciences Login</b>
</td>
</tr>
<tr><td bgcolor="#ffffff" align="left">
<table bgcolor="#ffffff" align="center" border="0" width="100%"><tr><td align="right" width="30%">Name:</td>
<td align="left" width="70%"><input type="text" name="login_username" value="" onfocus="alreadyFocused=true;" />
</td>
</tr>

<tr><td align="right" width="30%">Password:</td>
<td align="left" width="70%"><input type="password" name="secretkey" onfocus="alreadyFocused=true;" />
<input type="hidden" name="js_autodetect_results" value="0" />
<input type="hidden" name="just_logged_in" value="1" />
</td>
</tr>
</table>
</td>
</tr>
<tr><td align="left"><center><input type="submit" value="Login" />
</center></td>
</tr>
</table>
</center></td>
</tr>
</table>
</form>
</body></html>
