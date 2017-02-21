<?php
   require("action.php");
   require("settings.php");
   
   if(isset($_GET["start"])){get_all_name();}
   if(isset($_GET["open_dialog"])){open_dialog();}
   if(isset($_GET['inside_make_a_new_msg'])){inside_make_a_new_msg();}
   if(isset($_GET['make_msg_insider_all'])){make_msg_insider_all();}
   if(isset($_GET['make_msg_insider_all_refresh'])){make_msg_insider_all_refresh();}
   if(isset($_GET['make_msg_insider_top'])){make_msg_insider_top();}
   if(isset($_GET['inside_make_a_new_msg_public'])){inside_make_a_new_msg_public();}
   if(isset($_GET['make_msg_insider_all_pub'])){make_msg_insider_all_pub();}
   if(isset($_GET['make_msg_insider_all_refresh_pub'])){make_msg_insider_all_refresh_pub();}
   
   
   
   //public
   function inside_make_a_new_msg_public()
   {
        $prepsql="insert into `public_msg` (public_msg_id,sender,msg_text,date) values ('',:0,:1,now())"; 
       $rows=mysql_query(prepare($prepsql , array("$_COOKIE[user_id]","$_GET[val]")));
       $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$_COOKIE[user_id]'"));       
   }
   
   function make_msg_insider_all_pub()
   {
       $prepsql="select * from (SELECT * FROM `public_msg` where (sender='$_COOKIE[user_id]') or (sender in (select profile_2 from  link where profile_1='$_COOKIE[user_id]')) ORDER BY `public_msg`.`date` DESC LIMIT 10 )tmp order by tmp.date asc"; 
            $rows=mysql_query(prepare($prepsql , array("")));
                  //echo prepare($prepsql , array("$_GET[id]"));
                  $msg_id="";$id="";
            while ($row = mysql_fetch_array($rows)) { 
            $rnd = generateRandomString(23); 
                //echo"<hr/><span id='$rnd'></span>$row[msg]";
                $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$row[sender]'"));
                $msg_id=$row['public_msg_id'];
                $me="";if($row['sender']==$_COOKIE['user_id']){$me="mee";}
                echo"<script>make_msg_insider_pub('$profile[profile_pic]','$row[msg_text]','$me');</script>";                 
            }
            echo"<script>msg_id_pub='$msg_id';</script>"; 
       
   }
   
   function make_msg_insider_all_refresh_pub()
   {
       $prepsql="SELECT * FROM `public_msg` where ((sender='$_COOKIE[user_id]') or  (sender in (select profile_2 from  link where profile_1='$_COOKIE[user_id]'))) and public_msg_id> :0 ORDER BY `public_msg`.`date` ASC limit 5"; 
            $rows=mysql_query(prepare($prepsql , array("$_GET[msg_id]")));
                  //echo prepare($prepsql , array("$_GET[msg_id]"));  
            while ($row = mysql_fetch_array($rows)) { 
            $rnd = generateRandomString(23); 
                //echo"<hr/><span id='$rnd'></span>$row[msg]";
                $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$row[sender]'"));    
                $me="";if($row['sender']==$_COOKIE['user_id']){$me="mee";}
                echo"<script>msg_id_pub='$row[public_msg_id]';make_msg_insider_pub('$profile[profile_pic]','$row[msg_text]','$me');</script>";                 
            } 
       
   }
   
     //save message inside top
  function make_msg_insider_top()
  {
   $lno=$_GET['lno'];
   //echo  $_GET['lno'];
   $lno=$lno*5;
   $lno1=$lno+5;
       $prepsql="select * from (SELECT * FROM `message` where (profile_2='$_COOKIE[user_id]' and profile_1=:0) or (profile_2=:0 and profile_1='$_COOKIE[user_id]') ORDER BY `message`.`date` DESC LIMIT $lno,$lno1 )tmp order by tmp.date asc"; 
            $rows=mysql_query(prepare($prepsql , array("$_GET[id]")));
                  //echo prepare($prepsql , array("$_GET[id]"));
                  $msg_id="";$id="";
            while ($row = mysql_fetch_array($rows)) { 
            $rnd = generateRandomString(23); 
                //echo"<hr/><span id='$rnd'></span>$row[msg]";
                $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$row[profile_1]'"));
                $msg_id=$row['message_id'];
                $id=$_GET['id'];
                $me="";if($row['profile_1']==$_COOKIE['user_id']){$me="mee";}
                echo"<script>make_msg_insider('$profile[profile_pic]','$row[msg]','$me',1,'$_GET[mke]');</script>";                 
            }
            $lno=$_GET['lno'];
            $lno+=1;
            $lno=$lno*10;
            $lno1=$lno+10;
            $prepsql="select * from (SELECT * FROM `message` where (profile_2='$_COOKIE[user_id]' and profile_1=:0) or (profile_2=:0 and profile_1='$_COOKIE[user_id]') ORDER BY `message`.`date` DESC LIMIT $lno,$lno1 )tmp order by tmp.date asc"; 
            $rows=mysql_query(prepare($prepsql , array("$_GET[id]")));
            if(mysql_num_rows($rows)==0){echo"<script>msg_scroll_no='no';</script>";}      
  }
  
   function make_msg_insider_all()
   {               
       $prepsql="select * from (SELECT * FROM `message` where (profile_2='$_COOKIE[user_id]' and profile_1=:0) or (profile_2=:0 and profile_1='$_COOKIE[user_id]') ORDER BY `message`.`date` DESC LIMIT 10 )tmp order by tmp.date asc"; 
            $rows=mysql_query(prepare($prepsql , array("$_GET[id]")));
                  //echo prepare($prepsql , array("$_GET[id]"));
                  $msg_id="";$id="";
            while ($row = mysql_fetch_array($rows)) { 
            $rnd = generateRandomString(23); 
                //echo"<hr/><span id='$rnd'></span>$row[msg]";
                $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$row[profile_1]'"));
                $msg_id=$row['message_id'];
                $id=$_GET['id'];
                $me="";if($row['profile_1']==$_COOKIE['user_id']){$me="mee";}
                echo"<script>make_msg_insider('$profile[profile_pic]','$row[msg]','$me');</script>";                 
            }
            echo"<script>msg_id='$msg_id';prof_id='$id';</script>"; 
   }
   
   
   function make_msg_insider_all_refresh()
   {               
       $prepsql="SELECT * FROM `message` where ((profile_2='$_COOKIE[user_id]' and profile_1=:0) or (profile_2=:0 and profile_1='$_COOKIE[user_id]')) and message_id> :1 ORDER BY `message`.`date` ASC limit 5"; 
            $rows=mysql_query(prepare($prepsql , array("$_GET[id]","$_GET[msg_id]")));
                  //echo prepare($prepsql , array("$_GET[id]","$_GET[msg_id]"));  
            while ($row = mysql_fetch_array($rows)) { 
            $rnd = generateRandomString(23); 
                //echo"<hr/><span id='$rnd'></span>$row[msg]";
                $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$row[profile_1]'"));    
                $me="";if($row['profile_1']==$_COOKIE['user_id']){$me="mee";}
                echo"<script>msg_id='$row[message_id]';prof_id='$_GET[id]';make_msg_insider('$profile[profile_pic]','$row[msg]','$me');</script>";                 
            } 
   }
   
   
   function inside_make_a_new_msg()
   {
       $prepsql="insert into `message` (message_id,profile_1,profile_2,msg,date,seen_time) values ('',:0,:1,:2,now(),'')"; 
       $rows=mysql_query(prepare($prepsql , array("$_COOKIE[user_id]","$_GET[b]","$_GET[val]")));
       $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$_COOKIE[user_id]'"));
       //echo"<script>make_msg_insider('$profile[profile_pic]','$_GET[val]');</script>";                 
   }
   
function open_dialog(){
?>
<table width="100%" style="height: 100%;">
    <tr><td style="height:100%;"><div class="msg_boxes" id="make_msg_boxes"></div></td></tr>
    <tr><td>
    <table width="100%"><tr>
    <td width="100%"><input type="text" class="form-control" id="msg_textbox"  placeholder="message me" onkeyup="sending_msg_data(event,this,'<?=$_GET['profile_id']?>')"></td>
    <td><span class="btn btn-default glyphicon glyphicon-send" onclick="send_me_message_in_but('<?=$_GET['profile_id']?>')"></span></td>
    </tr></table>
    </td></tr>
</table>
<span id='msg_saver' class="no_dis"></span>
<script>onscroll_msg();msg_scroll_no=1;document.getElementById("msg_textbox").focus();make_msg_insider_all(<?=$_GET['profile_id']?>);</script>
<?php    
}   


function get_all_name(){
?>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <table width="100%" class="msg_tble">
        <?php
            $prepsql="SELECT * FROM `link` where profile_1='$_COOKIE[user_id]'"; 
            $rows=mysql_query(prepare($prepsql , array("%$_GET[val]%")));
            while ($row = mysql_fetch_array($rows)) { 
                $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$row[profile_2]'"));
                $rnd1 = generateRandomString(23);
                $rnd = generateRandomString(23);
                echo"<tr id='tr_$rnd1'></tr><script>chatter_shower('$rnd1','$profile[user_id]','$rnd','$profile[full_name]','$profile[profile_pic]');</script>";
           }
        ?>
        </table>
    </div>
  </div>

<?php }?>

<style> drop_shadow

.msg_tble tr td{text-align: left;}
.msg_tble tr:hover{border: 1px outset black;cursor: pointer;font-weight: bold;}
.msg_boxes{width:100%;height:100%;overflow:scroll;overflow:auto;}
.left{float: left;}
.right{float: right;}
</style>
