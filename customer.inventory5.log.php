<?php ob_start(); ini_set('output_buffering','1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_2.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script language="JavaScript" src="includes/window.js" type=text/javascript></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>External Inventory Tracking System</title>
<link rel="stylesheet" type="text/css" href="calender/spiffyCal.css">
<script language="JavaScript" src="calender/spiffyCal.js"></script>
<script language="javascript"> var cal11=new ctlSpiffyCalendarBox("cal11", "list", "txtDate1","btnDate1",""); </script>
<script language="javascript"> var cal12=new ctlSpiffyCalendarBox("cal12", "list", "txtDate2","btnDate2",""); </script>
<script language="javascript">
function openwindow() {
	window.open("catalog.view.details.php?part_code=" + window.document.activeElement.value, null, newwinAttrib(720,900));
	return false;
}
</script>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style8 {font-size: 9px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style9 {color: #333333}
.style10 {
	font-size: 18px;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
}
.style13 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style53 {color: #FFFFFF; text-decoration: underline;}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<link href="styles/style.inv.css" rel="stylesheet" type="text/css">
</head>

<body  bgcolor="#000000">
<table width="950" border="0" align="center" bgcolor="#CC7777">
  <tr>
    <td width="1" height="2"></td>
    <td width="839"></td>
    <td width="10"></td>
  </tr>
  <tr>
    <td height="319"></td>
    <td>
	<table width="940" bgcolor="#CC9999" cellpadding="0" cellspacing="0" align="center" id="Ist">
      <tr>
        <td height="39" colspan="3" valign="bottom" bordercolor="#FFFFFF" bgcolor="#CC9999" class="style9"><div align="center" class="style10"> External Inventory Tracking System </div></td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td class="style13" align="center">
		  <span class="style53">
		  <?php
			require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/session.check.php");	
			require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/setup.info.php");	
			if ($login_option==1) { echo "Operator: "; }
			if ($login_option==2) { echo "Distributor: "; }
			if ($login_option==3) { echo "Customer: "; }
			echo $user_comp;
			echo "    (User: ";
			echo $user_name;
			echo ")"; 
			if (isset($_GET['selection']))
			{	if ($_GET['selection']==1) { $_SESSION["s_dist_code"]=0; $_SESSION["s_cust_code"]=0; $s_dist_code=0; $s_cust_code=0;}
				if ($_GET['selection']==2) { $_SESSION["s_cust_code"]=0; $s_cust_code=0;}
			} 
		?>
		  </span>		</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td height="27" valign="baseline">&nbsp;</td>
        <td >
		<div align="left" style="float: left; text-align: left; color:#FFFFFF; font-variant: small-caps; font-style: italic;font-size: 12px; font-weight: bold;" >&nbsp;
		<?php
		if ($s_dist_code>0) {echo "" . $s_dist_name . "&nbsp;&nbsp;( <a href='mainmenu.php?selection=1'>x</a> )&nbsp;&nbsp;";}
		if ($s_cust_code>0) {echo " ". $s_cust_name . "&nbsp;&nbsp;( <a href='mainmenu.php?selection=2'>x</a> )&nbsp;&nbsp;";}	
		?>
		</div>
		<div align="right" style="float: right; text-align: right;">
		<strong>|</strong>		
		<a href="mainmenu.php">Menu</a><strong> | </strong>
		<a href="logout.php">Logout</a><strong> | </strong>		
		
		</div>
		</td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="top">
        <td width="19" height="166">&nbsp;</td>
        <td width="900"><table width="900" border="3" align="center" bordercolor="#D4D0C8" bgcolor="#E4CBCB" class="style13" id="2nd">
            
            <tr align="center" valign="top">
              <td width="894" >
			  
			    <div align="center"><!-- InstanceBeginEditable name="EditRegion1" -->
<div id="spiffycalendar" class="text">&nbsp;</div>
<?php
//$option=0;
//if (isset($_GET['option'])) { $option=$_GET['option']; }
//$heading1="";
//$dist_code=0;
$heading1="Customer Inventory Logs";
switch($login_option){
	case 1:
//		if     ($option==2){ $heading1="Selected Distributor's Catalog"; $dist_code=$s_dist_code; }
//		elseif ($option==3){ $heading1="Selected Customer's Catalog"; $dist_code=$s_dist_code; $cust_code=$s_cust_code;}
//		else{ $heading1="Operator's Catalog"; $option=1; 
		if (($s_dist_code > 0) && ($s_cust_code > 0)) {$dist_code=$s_dist_code; $cust_code=$s_cust_code;}
		else {header( "Location: mainmenu.php" );}
		?>
		<div align="right">Link to: 
		<a href="classes.php">Classes</a>
		</div>		
		<?php
		break;
	case 2:
		if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=0; $staff_code=$user_code;}
		//if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=$master_code; $staff_code=$user_code;}
		if ($s_cust_code>0){ $cust_code=$s_cust_code;}
		else {header( "Location: mainmenu.php" );}
		?>
		<div align="right">Link to: 
			<a href="distributors.catalog.setup.php">Setup Distributor's Catalog</a>
		</div>		
		<?php
		break;
	case 3:
//		$heading1="Assigned Inventory";
		$cust_code=$user_code;
//		$option=3;
		//if ($master_code == 0 ){$dist_code=$user_code; $t_staff_code=0;} else {$dist_code=$master_code; $t_staff_code=$user_code;}
		break;
}
//if ($dist_code==0) {header( "Location: mainmenu.php" );}
$err=0;
$form_action="none";
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
//***********************Buttons control***************************
//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 
?>
<form action="" method="post" name="list" >
<table width="714" border="0">
  <tr>
    <td height="22" width="40"><div align="right">From:</div></td>
    <td width="115"><div align="left"><SCRIPT language="JavaScript">cal11.writeControl();</SCRIPT></div></td>
    <td width="162">
	<select name="select" class="dropdown2">
      <option value="00">00</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
    </select>
      <select name="select2">
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        <option value="32">32</option>
        <option value="33">33</option>
        <option value="34">34</option>
        <option value="35">35</option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
        <option value="43">43</option>
        <option value="44">44</option>
        <option value="45">45</option>
        <option value="46">46</option>
        <option value="47">47</option>
        <option value="48">48</option>
        <option value="49">49</option>
        <option value="50">50</option>
        <option value="51">51</option>
        <option value="52">52</option>
        <option value="53">53</option>
        <option value="54">54</option>
        <option value="55">55</option>
        <option value="56">56</option>
        <option value="57">57</option>
        <option value="58">58</option>
        <option value="59">59</option>
      </select> </div>
      </td>
    <td width="162">&nbsp;</td>
    <td width="44"><div align="right">To:</div></td>
    <td width="150"><div align="left"><SCRIPT language="JavaScript">cal12.writeControl();</SCRIPT></div></td>
    <td width="11">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php
//**********Put Cataloges drop-down here***************************************************************	
//	$myquery2= "Select catalog_code, catalog_name from distributors_catalog where dist_code=$dist_code";
//	$result2 = mysql_query($myquery2);
//	$row2 = mysql_fetch_row($result2);
//	$catalog_code = $row2[0];
	?>
<!--	<input name="catalog_code" type="hidden" value="<?php echo $catalog_code ?>" /> !-->
<?php
		$myquery = "SELECT a.part_code, a.part_no, a.part_name, a.short_desc, a.long_desc, a.list_price,";
		$myquery.= " a.upc_no, a.industry_no, uic_no, sku_no,"; 
		$myquery.= " a.class_code, a.type_code, a.sub_cat_code,";
		$myquery.= " c.class_name, d.type_name, e.cat_name, e.sub_cat_id, e.sub_cat_name,";
		$myquery.= " a.dist_code, b.part_quantity";
		$myquery.= " FROM parts a, customer_inventory b,";
		$myquery.= " classes c,"; 
		$myquery.= " types d,"; 
		$myquery.= " v_categories e";  
		$myquery.= " WHERE a.part_code = b.part_code";
		$myquery.= " AND   b.cust_code = $cust_code";
//		$myquery.= " AND   b.assigned = 1";
		$myquery.= " AND   a.active = 1";
		$myquery.= " AND   a.class_code = c.class_code";
		$myquery.= " AND   a.type_code = d.type_code";
		$myquery.= " AND   a.sub_cat_code = e.sub_cat_code";
		$myquery.= " ORDER BY c.class_name, d.type_name, e.cat_name, e.sub_cat_id, part_no";	
		//echo $myquery;
//---------------Paging Header--------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.header.php");
//------------------------------------------------*
$result = mysql_query($myquery." LIMIT $from, $max_results");
//$fields_num = mysql_num_fields($result);
?>
   <span class="head1"><?php echo $heading1; ?> </span>
   <input name="hidden_code" type="hidden" value="" />

<table width="858" class="listtable2" >
                    <tr class="listheader1" height="22" >
                      <td width="16"><div align="center">*</div></td>
					  <td width="134"><div align="center">Part-No</div></td>
                      <td width="222"><div align="center">Part Name</div></td>
                      <td width="283"><div align="center">Short Description</div></td>
					  <td width="95"><div align="center">List-Price</div></td>
					  <td width="80"><div align="center">Stock</div></td>
                    </tr>
<?php  
$i=-1;
$t_class_code=0;
$t_type_code=0;
$t_sub_cat_code=0;
$list_bgcolor=$p_list_bgcolor_1;
while($row = mysql_fetch_row($result)) 
{$i = $i + 1;
 if (!(($t_class_code==$row[10]) && ($t_type_code==$row[11]) && ($t_sub_cat_code==$row[12])))
  {	$t_class_code=$row[10]; $t_type_code=$row[11]; $t_sub_cat_code=$row[12];
	?>
	<tr class="listheader2" height="22" >
	 <td></td> 
	 <td align="left" colspan="5">
	  <?php echo ''. $row[13] .' : '.$row[14].' : '.$row[15].' : '.$row[16] ?> 
	 </td>
	</tr>
	<?php
  }
?>
	<tr  bgcolor=<?php echo $list_bgcolor; ?> >
	  <td  width="16">
    	<div align="center">
	   	  <input name="partdetail"  type="image" src="images/b_property.png" alt="Part full Details" 
		  value="<?php echo $row[0] ?>" onclick="openwindow(); return false;" >	
	 	</div></td>  
	   <td class="listcell1"><div align="left" ><?php echo $row[1]; ?></div></td>
	   <td class="listcell1"><div align="left" ><?php echo $row[2]; ?></div></td>
	   <td class="listcell1"><div align="left" ><?php echo $row[3]; ?></div></td>
	   <td class="listcell1" bgcolor=<?php if(($row[18]>0) && ($login_option<3)){echo $p_list_bgcolor_3;}else{echo $list_bgcolor;} ?> >
	   	<div align="right">$<?php echo number_format($row[5],4); ?></div></td>
	   <td class="listcell1"><div align="right" ><?php echo number_format($row[19],0); ?></div></td>
	</tr>
<?php if ($list_bgcolor == $p_list_bgcolor_1) {$list_bgcolor=$p_list_bgcolor_2;} else {$list_bgcolor=$p_list_bgcolor_1;}
}
?>
</table>
<?php 
//----------------- Paging Footer------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.footer.php");
//-------------------------------------------------*
?>
</form>				



				<!-- InstanceEndEditable -->		          </div></td> 
            </tr>
        </table>		
		</td>
        <td width="19">&nbsp;</td>
      </tr>
      <tr>
        <td height="33"></td>
        <td><div align="center"><span class="style8">Contact Us | Linking Policy | Confidential Info. Protection Policy | Privacy Policy<br />
        </span></div></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center"><span class="style8">Copyright &copy; 2010 UCT Global. All rights reserved. By using this site you agree to terms of Use <br />
        </span></div></td>
        <td>&nbsp;</td>
      </tr>
    </table>

	</td>
    <td></td>
  </tr>
  <tr>
    <td height="2"></td>
    <td></td>
    <td></td>
  </tr>
</table>
<script>
	t_height = (getwindowSize('height') - 198) + 'px';
	document.getElementById("2nd").style.height = t_height;
</script>
</body>
<!-- InstanceEnd --></html>
<?php ob_flush() ?>