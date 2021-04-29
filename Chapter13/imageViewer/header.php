<html>
<head>
<meta name="keywords" content="image, viewer">
<title>Image Viewer</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/mindgrub.css" rel="stylesheet" type="text/css">

<script language="JavaScript" type="text/JavaScript">
function detect() {
 if (navigator.appName == 'Microsoft Internet Explorer' && navigator.platform == 'MacPPC') {
  return true;
 } else {
  return false;
 }
}
function openNewWindow(URLtoOpen, popwidth, popheight) {
	var Macit = detect();
	var screenWidth = screen.availWidth;
	var screenHeight = screen.availHeight;
	var x = (screenWidth/2)-(popwidth/2);
	var y = (screenHeight/2)-(popheight/2);
	if (Macit == 1) {
		popwidth2 = popwidth - 16;
		popheight2 = popheight - 16;
	} else {
		popwidth2 = popwidth;
		popheight2 = popheight;
	}
	var winParams = "height=" + popheight2 + ",width=" + popwidth2 +",resizable=0,directories=0,dependent=1,toolbar=0,scrollbar=0,tollbar=0,screenX=" + x + ",screenY=" + y + ",left=" + x + ",top=" + y;
	newWindow = window.open(URLtoOpen,'_blank', winParams);

}

</script>
</head>
<body bgcolor="#9c9cc6" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

