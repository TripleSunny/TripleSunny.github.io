<? include("../../DB/connectDB.php") ?>

<? include("../../DB/fun.php") ?>

<? include("site.php") ?>

<?

   $templete_id = "view";

   include("../../category_data.inc");



   include("../../view_data.php");

   

   $id= "";

   if (!empty($_REQUEST['id'])){

   	   $id = $_REQUEST['id'];

   }



   $data = new Content();

   $data->QueryData($site,"",$templete_id,$id);

   if ($data->Cnt==0){

   	   header( 'Location: index.php' ) ;

   }

   $Sql = "update view_data set vd_click=vd_click+1 where vd_id='$id'";

   $result = mysql_query($Sql); 

   

   $map = "(23.671627053918277, 120.890185546875)";

   $map_txt = "";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>景點介紹-貓頭鷹宜蘭民宿</title>

<link href="css/links.css" rel="stylesheet" type="text/css">

<link href="w3_001.css" rel="stylesheet" type="text/css" />

<script src="<?=$base_path?>/images/js/flashObj.js" type="text/javascript"></script>

<script type="text/javascript" src="<?=$highslide_path?>/highslide-with-gallery.js"></script>

<link rel="stylesheet" type="text/css" href="<?=$highslide_path?>/highslide.css" />

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyA03Ntu0vexZ2SnGGu1YvEHgu40i77RFsM" type="text/javascript"></script>

<script>



	hs.graphicsDir = '<?=$highslide_path?>/graphics/';

	hs.align = 'center';

	hs.transitions = ['expand', 'crossfade'];

	hs.outlineType = 'rounded-white';

	hs.fadeInOut = true;

	//hs.dimmingOpacity = 0.75;



	// Add the controlbar

	hs.addSlideshow({

		//slideshowGroup: 'group1',

		interval: 7000,

		repeat: false,

		useControls: true,

		fixedControls: 'fit',

		overlayOptions: {

			opacity: .75,

			position: 'bottom center',

			hideOnMouseOut: true

		}

	});

</script>

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

    <td height="1190" align="right" valign="top" background="img/info_bg.jpg"><br />

    <table width="1100" border="0" align="right" cellpadding="0" cellspacing="0">

      <tr>

        <td width="110">&nbsp;</td>

        <td width="880" height="30" align="left" valign="top">&nbsp;</td>
        <td width="110">&nbsp;</td>

      </tr>

      

      

    </table></td>

  </tr>

  

  <tr>

    <td align="left" valign="top"><? include("footer.php") ?></td>

  </tr>

</table>

</body>

</html>

