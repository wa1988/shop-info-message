<?php 

error_reporting(0);
include ("../conn.php");
$sql='select * from member where id="'.$_GET['id'].'"';
$query=mysql_query($sql);
$row=mysql_fetch_array($query);

if($_GET['sub'] == 'yes')
{


   $upsql="update member set username='".$_POST['username']."',sfz='".$_POST['sfz']."',pwd='".$_POST['pwd']."', tel='".$_POST['tel']."',qq='".$_POST['qq']."',email='".$_POST['email']."',address='".$_POST['address']."',sfz='".$_POST['sfz']."' where id='".$_GET['id']."'";
   //echo $upsql;
   if(mysql_query($upsql)) echo "<script language=\"JavaScript\">alert(\"会员信息修改成功~\");window.location.href='user_list.php';</script>"; 
   else echo "执行SQL失败:$sql<BR>错误:".mysql_error();
		

}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="js/jquery.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>

	(function($){
		$(window).load(function(){
			
			$("a[rel='load-content']").click(function(e){
				e.preventDefault();
				var url=$(this).attr("href");
				$.get(url,function(data){
					$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
					//scroll-to appended content 
					$(".content").mCustomScrollbar("scrollTo","h2:last");
				});
			});
			
			$(".content").delegate("a[href='top']","click",function(e){
				e.preventDefault();
				$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
			});
			
		});
	})(jQuery);
</script>
</head>
<body>

<!--header-->
<?php include ("header.php"); ?>


<!--aside nav-->
<?php include ("left.php"); ?>


<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">编辑会员信息</h2>
       <a href="user_list.php" class="fr top_rt_btn">返回会员列表</a>
      </div>
      <ul class="ulColumn2">
	  <form method="POST" action="user_edit.php?sub=yes&id=<?php echo $row['id'];?>">

       <li>
        <span class="item_name" style="width:120px;">真实姓名：</span>
        <input type="text" class="textbox textbox_225" name="username" value="<?php echo $row['username'];?>" placeholder="真实姓名..."/>
       </li>

       <li>
        <span class="item_name" style="width:120px;">身份证号码：</span>
        <input type="tel" class="textbox textbox_225" name="sfz" value="<?php echo $row['sfz'];?>" placeholder="身份证号码..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">登陆密码：</span>
        <input type="password" class="textbox textbox_225" name="pwd" value="<?php echo $row['pwd'];?>" placeholder="登陆密码..."/>
       </li>

       <li>
        <span class="item_name" style="width:120px;">手机号码：</span>
        <input type="text" class="textbox textbox_225" name="tel" value="<?php echo $row['tel'];?>" placeholder="手机号码..."/> 
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">QQ：</span>
        <input type="text" class="textbox textbox_225" name="qq" value="<?php echo $row['qq'];?>" placeholder="QQ号码..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">电子邮箱：</span>
        <input type="email" class="textbox textbox_225" name="email" value="<?php echo $row['email'];?>" placeholder="电子邮箱..."/>
       </li>
	   
       <li>
        <span class="item_name" style="width:120px;">详细地址：</span>
        <input type="tel" class="textbox textbox_225" name="address" value="<?php echo $row['address'];?>" placeholder="详细地址..."/>
       </li>

       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" value="更新/保存"/>
       </li>
	   
      </form>
      </ul>
 </div>
</section>
</body>
</html>
