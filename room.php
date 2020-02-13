<? include("../../DB/connectDB.php") ?>
<? include("site.php") ?>
<? include("minsu.php") ?>
<?
   $templete_id = "room";
   include("../../category_data.inc");

   include("../../content_data.php");
   
      $page = 1;
   if (!empty($_REQUEST['page'])){
      $page = $_REQUEST['page']+0;
   }
   if ($page<=0) $page=1;
	
   $page_size = 1;    //分頁筆數
   
   $data = new Content();
   $data->QueryData($site,$category_id,"","","",$page,$page_size);
   
   $select_data = new Content();
   $select_data->QueryData($site,$category_id); 
   
   $id= "";
   if (!empty($_REQUEST['id'])){
   	   $id = $_REQUEST['id'];
   }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>客房介紹-貓頭鷹宜蘭民宿</title>
<link href="css/links.css" rel="stylesheet" type="text/css" />
<link href="w3_001.css" rel="stylesheet" type="text/css" />
<script src="<?=$base_path?>/images/js/flashObj.js" type="text/javascript"></script>
<SCRIPT Language="JavaScript">
<!--
function clickChange(imageNum)
{
          <?
 
            for ($i=0; $i<$data->Cnt; $i++){
			$total_count=$data->TotalCnt;
          ?>
	if (document.images) document.myImage<?=$i?>.src = imageNum;
	<?     } ?>
}
// -->
</SCRIPT>
<style type="text/css">
<!--
#price_style {font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
}
-->
</style>
</head>

<body bgcolor="#171717" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="1280" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><? include("head.php") ?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><? include("menu.php") ?></td>
  </tr>
  <tr>
    <td height="1190" align="left" valign="top" background="img/info_bg.jpg"><br />
      <br />
      <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="3" valign="top"><div id="contenttxt"> <br class="spacer" />
              <table border="0" cellpadding="0" cellspacing="0" class="txt16">
                <tr>
                  <?     for ($i=0; $i<$select_data->Cnt; $i++){ ?>
                  <td align="center" valign="middle"><a href="room_<?=$select_data->Id[$i]?>.html">
                    <?=$select_data->Title[$i]?>
                  </a></td>
                  <?     } ?>
                </tr>
              </table>
          <?
 
            for ($i=0; $i<$data->Cnt; $i++){
			$total_count=$data->TotalCnt;
          ?>
              <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top"><br />
                      <img src="<?=$image_path?>/<?=$data->ImageUrl[$i][0]?>" name="myImage<?=$i?>" width="580" id="myImage<?=$i?>" /></td>
                  <td width="112" align="center" valign="top"><table width="100" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="15"></td>
                      </tr>
                    </table>
                      <table width="100" border="0" cellpadding="0" cellspacing="3">
                        <tr>
                          <?      if ($data->ImageUrl[$i][0]!=""){ ?>
                          <td><a href="#"><img src="<?=$image_path?>/<?=$data->ImageUrl_Small[$i][0]?>" height="75" border="0" onmouseover="clickChange('<?=$image_path?>/<?=$data->ImageUrl[$i][0]?>');return false;" /></a></td>
                          <?      }   ?>
                        </tr>
                        <tr>
                          <?      if ($data->ImageUrl[$i][1]!=""){ ?>
                          <td><a href="#"><img src="<?=$image_path?>/<?=$data->ImageUrl_Small[$i][1]?>" height="75" border="0" onmouseover="clickChange('<?=$image_path?>/<?=$data->ImageUrl[$i][1]?>');return false;" /></a></td>
                          <?      }   ?>
                        </tr>
                        <tr>
                          <?      if ($data->ImageUrl[$i][2]!=""){ ?>
                          <td><a href="#"><img src="<?=$image_path?>/<?=$data->ImageUrl_Small[$i][2]?>" height="75" border="0" onmouseover="clickChange('<?=$image_path?>/<?=$data->ImageUrl[$i][2]?>');return false;" /></a></td>
                          <?      }   ?>
                        </tr>
                        <tr>
                          <?      if ($data->ImageUrl[$i][3]!=""){ ?>
                          <td><a href="#"><img src="<?=$image_path?>/<?=$data->ImageUrl_Small[$i][3]?>" height="75" border="0" onmouseover="clickChange('<?=$image_path?>/<?=$data->ImageUrl[$i][3]?>');return false;" /></a></td>
                          <?      }   ?>
                        </tr>
                        <tr>
                          <?      if ($data->ImageUrl[$i][4]!=""){ ?>
                          <td><a href="#"><img src="<?=$image_path?>/<?=$data->ImageUrl_Small[$i][4]?>" height="75" border="0" onmouseover="clickChange('<?=$image_path?>/<?=$data->ImageUrl[$i][4]?>');return false;" /></a></td>
                          <?      }   ?>
                        </tr>
                    </table></td>
                </tr>
              </table>
          <br />
              <table width="96%" border="0" cellpadding="1" cellspacing="1" class="room_tb">
                <tr class="room_text">
                  <td height="30" align="center" bgcolor="#684D7B"><strong><font color="#FFFFFF">
                    <?=$data->Title[$i]?>
                  </font></strong></td>
                  <?      if ($data->Content[$i]['平日']!=""){ ?>
                  <td height="30" align="center"><table width="40">
                      <tr>
                        <td><font size="2">平日</font></td>
                      </tr>
                    </table>
                      <?=$data->Content[$i]['平日']?></td>
                  <?      }   ?>
                  <?      if ($data->Content[$i]['假日']!=""){ ?>
                  <td height="30" align="center"><table width="40">
                      <tr>
                        <td><font size="2">假日</font></td>
                      </tr>
                    </table>
                      <?=$data->Content[$i]['假日']?></td>
                  <?      }   ?>
                  <?      if ($data->Content[$i]['定價']!=""){ ?>
                  <td height="30" align="center"><table width="40">
                      <tr>
                        <td><font size="2">定價</font></td>
                      </tr>
                    </table>
                      <?=$data->Content[$i]['定價']?></td>
                  <?      }   ?>
                  <?      if ($data->Content[$i]['加人']!=""){ ?>
                  <td height="30" align="center"><table width="40">
                      <tr>
                        <td><font size="2">加人</font></td>
                      </tr>
                    </table>
                      <?=$data->Content[$i]['加人']?>
                    /人</td>
                  <?      }   ?>
                  <?      if ($data->Content[$i]['加床']!=""){ ?>
                  <td height="30" align="center"><table width="40">
                      <tr>
                        <td><font size="2">加床</font></td>
                      </tr>
                    </table>
                      <?=$data->Content[$i]['加床']?></td>
                  <?      }   ?>
                </tr>
              </table>
          <p>&nbsp;</p>
          <table width="96%" border="0" cellpadding="3" cellspacing="2" class="txt13">
                <tr>
                  <td><?=$data->TextArea[$i][0]?></td>
                </tr>
                <tr>
                  <td align="center"><!--線上訂房貼紙開始--><!--線上訂房貼紙結束--></td>
                </tr>
              </table>
          <hr width="96%" />
              <table width="96%" align="center" cellpadding="3" cellspacing="2">
                <tr>
                  <td><font size="2">
                    <?=nl2br($data->Content[$i]['訂房說明'])?>
                  </font></td>
                </tr>
              </table>
          <? }  ?>
              <br class="spacer" />
              <br />
        </div></td>
        </tr>
      
    </table>
    <? 
		//include("page.php") //分頁
	$total_count=$total_count;
	$perPage=$page_size;
	include('pagerBox.php');		
		?></td>
  </tr>
  
  <tr>
    <td align="left" valign="top"><? include("footer.php") ?></td>
  </tr>
</table>
</body>
</html>
