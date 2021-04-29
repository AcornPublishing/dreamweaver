<?php require_once('Connections/myConn.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $HTTP_SERVER_VARS['PHP_SELF'];
if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $editFormAction .= "?" . $HTTP_SERVER_VARS['QUERY_STRING'];
}

if ((isset($HTTP_POST_VARS["MM_insert"])) && ($HTTP_POST_VARS["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO members (firstname, lastname, email, username, password) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($HTTP_POST_VARS['firstname'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['lastname'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['email'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['username'], "text"),
                       GetSQLValueString(md5($HTTP_POST_VARS['password']), "text"));

  mysql_select_db($database_myConn, $myConn);
  $uername_check=mysql_query("SELECT username FROM members WHERE username='$_POST[username]'");
  if(mysql_num_rows($username_check)>=1) {
  	print ("Error: This username is already Taken");
	} else {
  $Result1 = mysql_query($insertSQL, $myConn) or die(mysql_error());
  header("Location: thanks.php");
  exit;
  }
}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function YY_checkform() { //v4.65
//copyright (c)1998,2002 Yaromat.com
  var args = YY_checkform.arguments; var myDot=true; var myV=''; var myErr='';var addErr=false;var myReq;
  for (var i=1; i<args.length;i=i+4){
    if (args[i+1].charAt(0)=='#'){myReq=true; args[i+1]=args[i+1].substring(1);}else{myReq=false}
    var myObj = MM_findObj(args[i].replace(/\[\d+\]/ig,""));
    myV=myObj.value;
    if (myObj.type=='text'||myObj.type=='password'||myObj.type=='hidden'){
      if (myReq&&myObj.value.length==0){addErr=true}
      if ((myV.length>0)&&(args[i+2]==1)){ //fromto
        var myMa=args[i+1].split('_');if(isNaN(parseInt(myV))||myV<myMa[0]/1||myV > myMa[1]/1){addErr=true}
      } else if ((myV.length>0)&&(args[i+2]==2)){
          var rx=new RegExp("^[\\w\.=-]+@[\\w\\.-]+\\.[a-z]{2,4}$");if(!rx.test(myV))addErr=true;
      } else if ((myV.length>0)&&(args[i+2]==3)){ // date
        var myMa=args[i+1].split("#"); var myAt=myV.match(myMa[0]);
        if(myAt){
          var myD=(myAt[myMa[1]])?myAt[myMa[1]]:1; var myM=myAt[myMa[2]]-1; var myY=myAt[myMa[3]];
          var myDate=new Date(myY,myM,myD);
          if(myDate.getFullYear()!=myY||myDate.getDate()!=myD||myDate.getMonth()!=myM){addErr=true};
        }else{addErr=true}
      } else if ((myV.length>0)&&(args[i+2]==4)){ // time
        var myMa=args[i+1].split("#"); var myAt=myV.match(myMa[0]);if(!myAt){addErr=true}
      } else if (myV.length>0&&args[i+2]==5){ // check this 2
            var myObj1 = MM_findObj(args[i+1].replace(/\[\d+\]/ig,""));
            if(myObj1.length)myObj1=myObj1[args[i+1].replace(/(.*\[)|(\].*)/ig,"")];
            if(!myObj1.checked){addErr=true}
      } else if (myV.length>0&&args[i+2]==6){ // the same
            var myObj1 = MM_findObj(args[i+1]);
            if(myV!=myObj1.value){addErr=true}
      }
    } else
    if (!myObj.type&&myObj.length>0&&myObj[0].type=='radio'){
          var myTest = args[i].match(/(.*)\[(\d+)\].*/i);
          var myObj1=(myObj.length>1)?myObj[myTest[2]]:myObj;
      if (args[i+2]==1&&myObj1&&myObj1.checked&&MM_findObj(args[i+1]).value.length/1==0){addErr=true}
      if (args[i+2]==2){
        var myDot=false;
        for(var j=0;j<myObj.length;j++){myDot=myDot||myObj[j].checked}
        if(!myDot){myErr+='* ' +args[i+3]+'\n'}
      }
    } else if (myObj.type=='checkbox'){
      if(args[i+2]==1&&myObj.checked==false){addErr=true}
      if(args[i+2]==2&&myObj.checked&&MM_findObj(args[i+1]).value.length/1==0){addErr=true}
    } else if (myObj.type=='select-one'||myObj.type=='select-multiple'){
      if(args[i+2]==1&&myObj.selectedIndex/1==0){addErr=true}
    }else if (myObj.type=='textarea'){
      if(myV.length<args[i+1]){addErr=true}
    }
    if (addErr){myErr+='* '+args[i+3]+'\n'; addErr=false}
  }
  if (myErr!=''){alert('The required information is incomplete or contains errors:\t\t\t\t\t\n\n'+myErr)}
  document.MM_returnValue = (myErr=='');
}
//-->
</script>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" onSubmit="YY_checkform('form1','firstname','#q','0','Field \'firstname\' is not valid.','lastname','#q','0','Field \'lastname\' is not valid.','email','#S','2','Field \'email\' is not valid.','username','#q','0','Field \'username\' is not valid.','password','#q','0','Field \'password\' is not valid.','con_password','#password','6','Field \'con_password\' is not valid.');return document.MM_returnValue">
  <table width="400" border="0" cellspacing="5" cellpadding="0">
    <tr align="center"> 
      <td colspan="2">New User Registration</td>
    </tr>
    <tr> 
      <td>First Name</td>
      <td><input name="firstname" type="text" id="firstname"><?php if(isset($_POST["firstname"])) { print "value=\"$_POST[firstname]\""; }?></td>
    </tr>
    <tr> 
      <td>Last Name</td>
      <td><input name="lastname" type="text" id="lastname"><?php if(isset($_POST["lastname"])) { print "value=\"$_POST[lastname]\""; }?></td>
    </tr>
    <tr> 
      <td>E-mail</td>
      <td><input name="email" type="text" id="email"><?php if(isset($_POST["email"])) { print "value=\"$_POST[email]\""; }?></td>
    </tr>
    <tr> 
      <td>Username</td>
      <td><input name="username" type="text" id="username"></td>
    </tr>
    <tr> 
      <td>Password</td>
      <td><input name="password" type="password" id="password"></td>
    </tr>
    <tr> 
      <td>Confirm Password</td>
      <td><input name="con_password" type="password" id="con_password"></td>
    </tr>
    <tr> 
      <td></td>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
</body>
</html>
