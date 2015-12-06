<?php	

#
# Author: Dylan Mathews / Director of IT @ America's Credit Union
# Email:  dmathews@yourcu.org
# Phone:  253.964.6193
# 
# Modify this as you wish, this is GPL'ed as far as I care, so please leave my
# name and contact info in here.  If you make any enhancements to this let me 
# know, there is plenty of room.  I would be interested to see them.
#
# This is a nut bustingly simple script for getting the hidden form elements 
# required for logging into MCW.  This requires PHP compiled with OpenSSL 
# support and that is about it.  This could be written better, but it works 
# and has never caused me any problems.
#
# For social engineering reasons it's important to know that if you are posting
# to a secure server, the exchanged information is secure, but to the members 
# eyes it doesn't look secure, unless the originating page is secured.  It's 
# nice to have 2 secure servers involved in both sides of this.  Or somehow 
# get a nice scripting language running on your MCW Box.  I have written this 
# so it now works using SSL rather than standard http.
#
# Just include this file on any page and call the mcwLoginInfo() function 
# within a form just like the normal MCW form sans the hidden form elements, 
# which are provide by this.
#
# Here is the basic application of this function.
#
# <!--<form name="FORM1" method="post" action="https://mcw.yourcreditunion.org/cgi-bin/mcw000.cgi">
# FUNCTION GOES HERE.
# <input type="text" name="ACCOUNTNUMBER" size="7" maxlength="10">
# <input type="password" name="PASSWORD" size="7" maxlength="20">
# <input type="submit" name="MCWSUBMIT" value="Login">
# </form>-->
#	
#
# Have Fun!

#
#
# MCW Fully Qualified Host Name.
$mcwhost = "mcw.youracu.org";
$wwwhost = "www.youracu.org";
#$mcwhost = "mcw.yourcreditunion.org";
#$wwwhost = "www.yourcreditunion.org";
$wwwurl = "https://" . $wwwhost;


# Port Number that SSL is running on. Standard is 443.
$mcwport = "443";

# Sym Inst
$mcwdir = "000";

# MCW URL
$mcwurl   = "/cgi-bin/mcw" . $mcwdir . ".cgi";
$mcwquery = "MCWSTART";


function mcwError() {
    ?>
	
<font color="#000000">Online Banking is not available. We<br>
                      apologize for this inconvenience.<br>
                      Please try again later.</font>
    
    <?
}

function mcwLoginInfo() {
    global $mcwport;
    global $mcwurl;
    global $mcwquery;
    global $mcwhost;
    global $debug;
    global $action;

    # An array of the hidden element names.
    $items = array( "MCWEXPIRATION",
                    "MCWASSIGNEDSLOT",
                    "MCWSYMDIR",
                    "MCWTRANTYPE" );    
    
    $ttl = 5;
    
    error_reporting(0);
    
    # Open up an SSL connection to $mcwhost.
    $sockConnect = 
      fsockopen( "ssl://" . $mcwhost, $mcwport, $errno, $errstr, $ttl );
    
    # If successful.
    if ( $sockConnect ) {
        $sockQuery = "GET " . $mcwurl . "?" . $mcwquery . " HTTP/1.0\r\n\r\n";
        
        # Send the page request for the MCW login.
        $sockPut = 
          fwrite( $sockConnect, 
                  $sockQuery );
        
        if ( $sockPut ) {
            while ( ! feof( $sockConnect ) ) {
                $sockGet = fgets( $sockConnect, 1024 );
                
                if ( $sockGet ) {
		    
                    foreach( $items as $iKey=>$iVal ) {
                        if ( eregi( $iVal, $sockGet ) ) {
                            ?>
	
      <? echo $sockGet ?>
	
                            <?
                        } 
                    }
                }
            }
        }
        
        fclose( $sockConnect );
	
        # If you pass the page that calls this function ?action=eStatements
        # then it will make your default login page the estatement list.
        if ( $action == "eStatements" ||
             $action == "eStatement" ) {
            ?>
	
<input type="hidden" name="MCWSTARTTRAN" value="TRANSINGLESIGNON02">
	
		    <?
        }
    }
}	

function mcwLoginArray() {
    global $mcwport;
    global $mcwurl;
    global $mcwquery;
    global $mcwhost;
    global $debug;
    global $action;

    # An array of the hidden element names.
    $items = array( "MCWEXPIRATION",
                    "MCWASSIGNEDSLOT",
                    "MCWSYMDIR",
                    "MCWTRANTYPE" );    
    
    $ttl = 5;
    
    error_reporting(0);
    
    # Open up an SSL connection to $mcwhost.
    $sockConnect = 
      fsockopen( "ssl://" . $mcwhost, $mcwport, $errno, $errstr, $ttl );
    
    # If successful.
    if ( $sockConnect ) {
        $sockQuery = "GET " . $mcwurl . "?" . $mcwquery . " HTTP/1.0\r\n\r\n";
        
        # Send the page request for the MCW login.
        $sockPut = 
          fwrite( $sockConnect, 
                  $sockQuery );
        
        if ( $sockPut ) {
            while ( ! feof( $sockConnect ) ) {
                $sockGet = fgets( $sockConnect, 1024 );
                
                if ( $sockGet ) {
                    foreach( $items as $iKey=>$iVal ) {
                        if ( eregi( $iVal, $sockGet ) ) {
                            $formArray[] = $sockGet;
                        } 
                    }
                }
            }
        }
        
        fclose( $sockConnect );
        
        # If you pass the page that calls this function ?action=eStatements
        # then it will make your default login page the estatement list.
        if ( $action == "eStatements" ||
             $action == "eStatement" ) {
            $formArray[] = "<input type=\"hidden\" name=\"MCWSTARTTRAN\" value=\"TRANSINGLESIGNON02\">";
        }
    }
    
    return $formArray;
}	

function mcwForm() {
    global $mcwhost;
    global $mcwurl;
    global $wwwurl;
  
    ?>
	
<table cellpadding="0" cellspacing="0" border="0">
  <form name="FORM1" id="FORM1" method="post" action="https://<? echo $mcwhost ?><? echo $mcwurl ?>">
    <td background="<? echo $wwwurl ?>/img/lightpurplebg.gif" width="107" valign="top">
      <img src="<? echo $wwwurl ?>/img/onlinebankinglgt.gif" width="107" height="33" alt="" border="0">
    </td>
    <td background="<? echo $wwwurl ?>/img/lightpurplebg.gif" width="10" valign="top">
      <img src="<? echo $wwwurl ?>/img/dotsdivider.gif" width="10" height="33" alt="" border="0">
    </td>
    <td background="<? echo $wwwurl ?>/img/lightpurplebg.gif" valign="top" width="60">
      <!--<img src="<? echo $wwwurl ?>/img/acctlgtpurple.gif" width="60" height="23" alt="" border="0">-->
      <!--<img src="memberID.GIF" width="60" height="23" alt="" border="0">-->
      <img src="userName.GIF" width="60" height="23" alt="" border="0">
    </td>
    <td background="<? echo $wwwurl ?>/img/lightpurplebg.gif" width="82">
	
    <?
    
    mcwLoginInfo();
    
    ?>
	
      <input type="text" name="HBUSERNAME" size="7" maxlength="50" STYLE="width:82">
    </td>
    <td background="<? echo $wwwurl ?>/img/lightpurplebg.gif" valign="top" width="20">&nbsp;</td>
    <td background="<? echo $wwwurl ?>/img/lightpurplebg.gif" valign="top" width="54">
      <img src="<? echo $wwwurl ?>/img/pwdlgtpurple.gif" width="54" height="25" alt="" border="0">
    </td>
    <td background="<? echo $wwwurl ?>/img/lightpurplebg.gif" width="82">
      <input type="password" name="PASSWORD" size="7" maxlength="50" STYLE="width:82">
    </td>
    <td background="<? echo $wwwurl ?>/img/lightpurplebg.gif" valign="top" width=7>&nbsp;</td>
    <td width="1" background="<? echo $wwwurl ?>/img/lightpurplebg.gif">
      <input type="image" src="<? echo $wwwurl ?>/img/loginbutton.gif" name="MCWSUBMIT" value="Login" border="0" width="86">
    </td>
  </form>
</table>
	
    <?
}

?>
