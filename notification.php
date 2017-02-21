<?php
   require("action.php");
   require("settings.php");
   
   if(isset($_GET["get_me_nitification_me_std"])){get_me_nitification_me_std();}
   
  function get_me_nitification_me_std()
  {
      ?>
<br/><br/><br/>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <table width="100%" class="msg_tble">
        <?php
            $prepsql="(SELECT post_command_id,post_id,profile_id,`date` FROM `post_command` where post_id in (select post_id from post_link where linker_id = :0)) union all (SELECT post_like_id,post_id,profile_id,`date` FROM `post_like` where post_id in (select post_id from post_link where linker_id = :0)) ORDER BY `date` DESC"; 
            $rows=mysql_query(prepare($prepsql , array("$_COOKIE[user_id]")));
            $j=0;
            while ($row = mysql_fetch_array($rows)) { 
                $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$row[profile_id]'"));
                $rnd = generateRandomString(23);
        if($row["profile_id"]!=$_COOKIE["user_id"]){ $j=$j+1;
        ?>
        <tr><td width="100%" class="btn btn-default" onclick="open_windows1('?message=true&open_dialog=true&profile_id=<?=$profile['user_id']?>');"><span id='<?=$rnd?>'></span><?=$profile['full_name']?> have engaged with your post</td></tr>
        <?php 
        echo"<script>get_prof_pic_cmd2('$profile[profile_pic]','$rnd');</script>";     
        }}
        
        if($j==0){echo "<center>--No Notification Yet--</center>";}
        ?>
        </table>   
    </div>
  </div>
</div>

<?php }
?>
