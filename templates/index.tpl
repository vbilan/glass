<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
<title>{$title}</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/datetimepicker_css.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>

<body>
<!-- body table -->

<table border="1" cellpadding="0" cellspacing="0" width="95%" class="mnavo" align="center">
  <!-- top header -->
  <tr>
    <td align="center" colspan="2" height="48" class="mnavo">
    	<table align="center"
    bgcolor="#800000" border="0" cellpadding="1" cellspacing="0" width="100%">
      <tr>
        <td align="center"><table border="0" cellpadding="8" cellspacing="0" width="100%"
        class="mnavo">
          <tr>
            <td align="center" height="44"><font face="Tahoma" color="#000"><big>Ваше Скло</big></font></td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
<!-- left column -->
    <td valign="top" width="146" height="253" class="mnavo"><table bgcolor="#000000"
    border="0" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <td><table border="0" cellpadding="3" cellspacing="1" width="156">
          <!--tr>
            <td bgcolor="#800000" width="148" height="21"><font face="Tahoma">&nbsp;<span
            class="title">.:Меню:.</span></font></td>
          </tr-->
          <tr>
                <td bgcolor="#000000" width="148" height="0">
	                <font face="Tahoma">
	                {foreach from = $main_menu item=value} 
			      	{if (!$value.hide && !($value.admin && !$admin))}
	        			&nbsp;
	        			<font color="#FF0000"><span class="small">o</span></font>
	        			<a class="nav" href="index.php?action={$value.action}"> {$value.title}</a> 
	        			<br />
	        		{/if}
	        		
		      	{/foreach}
		      			&nbsp;
	        			<font color="#FF0000"><span class="small">o</span></font>
	        			<a class="nav" href="index.php?action=logout"> Вийти </a> 
	        			<br />
	        		
	        			</font>
               	</td>
<!-- end sidebox -->
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
<!-- end left column -->
<!-- right column -->
    <td valign="top" height="253" class="mnavo" bgcolor="#fdf5b5"><table border="0" cellpadding="0"
    cellspacing="0" width="100%">
      <tr>
        <td valign="top" width="100%"><table align="center" border="0"
        cellPadding="0" cellSpacing="0" width="100%">
          <tr>
            <td ><table border="0" cellpadding="8" cellspacing="1" width="100%">
              <tr>
                <td align="center" >{$content}</td>
              </tr>
            </table>
            </td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
<!-- end right column -->
  </tr>
  <tr>
    <td align="center" colspan="2" bgcolor="#800000" width="646" height="21" class="mnavo"><font
    face="Tahoma" color="#C0C0C0"><small></small></font></td>
  </tr>
</table>
</body>
</html>
