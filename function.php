<?php
require("action.php");
require("settings.php");
  if(isset($_POST["set_sign_up"])){get_me_sign_up();} 
  if(isset($_POST["set_sign_in"])){get_me_sign_in();} 
  if(isset($_GET["logout"])){get_me_logout();} 
  if(isset($_GET["profile"])){require("profile.php");}
  if(isset($_GET["settings"])){require("profile_settings.php");} 
  if(isset($_GET["proset"])){get_me_edit_settings();}
  if(isset($_GET["profile_update"])){
    if($_GET[name]=='password'){$_GET['v']=encryptIt($_GET['v']);get_me_update_settings('login_detail','password');}
    else{get_me_update_settings();}    
  }
  if(isset($_POST["bk_change"])){update_image_data(upload_me_bk(),'profile','bk_pic','img-thumbnail bg_blur',1500,500);}
  if(isset($_GET["get_img"])){get_me_bk_pic();}
  if(isset($_POST['profile_pic'])){update_image_data(upload_me_bk(),'profile','profile_pic','img-thumbnail picture',400,400);}
  if(isset($_GET['make_post'])){echo"<script>open_windows1('?get_me_post_me=true');</script>";}
  if(isset($_GET['get_me_post_me'])){require('post.php');show_post_menu();}
  if(isset($_GET['get_me_post_me_std'])){require('post.php');show_post_standard();}
  if(isset($_POST['multiple_file'])){upload_multiple_image_data();}
  if(isset($_GET['get_creditor'])){get_creditor_profile();}
  if(isset($_GET['save_post_content'])){save_post_content();}
  if(isset($_GET['get_the_post_cont'])){get_the_post_content();}
  if(isset($_GET['save_post_likes'])){get_save_post_like();}
  if(isset($_GET['save_post_cmd'])){get_save_post_cmd();}
  if(isset($_GET['save_post_cmd_show'])){save_post_cmd_show();}
  if(isset($_GET['get_me_search'])){require("search.php");}
  if(isset($_GET['search_in_div'])){search_in_div();}
  if(isset($_GET['save_profile_liker_con'])){save_profile_liker_con();}
  if(isset($_GET['message'])){require("message.php");}
  if(isset($_GET['inside_make_a_new_msg'])){require("message.php");}
  if(isset($_GET['make_msg_insider_all'])){require("message.php");}
  if(isset($_GET['make_msg_insider_all_refresh'])){require("message.php");}
  if(isset($_GET['get_me_nitification_me_std'])){require("notification.php");}
  if(isset($_GET['get_me_newfeed'])){require("newsfeed.php");}
  if(isset($_GET['get_the_post_content_newsfeed'])){get_the_post_content_newsfeed();}
  if(isset($_GET['show_many_linker_in_homoe'])){show_many_linker_in_homoe();}
  if(isset($_GET['save_profile_rm_con'])){save_profile_rm_con();}
  if(isset($_GET['make_msg_insider_top'])){require('message.php');}
  if(isset($_GET['inside_make_a_new_msg_public'])){require('message.php');}
  if(isset($_GET['make_msg_insider_all_pub'])){require('message.php');}
  if(isset($_GET['make_msg_insider_all_refresh_pub'])){require('message.php');}
  if(isset($_GET["get_bk_img"])){get_me_background();}
  
  
  
  //save profile suggestion removal
  
  function save_profile_rm_con()
  {
   $prepsql="SELECT count(*) as count FROM `suggestion_stop` where profile_1 = :0 and profile_2 = :1"; 
   $rows=mysql_query(prepare($prepsql , array("$_COOKIE[user_id]","$_GET[id]")));  
   if($rows['count']==0){
   $prepsql="insert into  `suggestion_stop` (sugg_stop_slno,profile_1,profile_2,date) values ('',:0,:1,now())"; 
   $rows=mysql_query(prepare($prepsql , array("$_COOKIE[user_id]","$_GET[id]")));      
   } 
  }
                                                                        

  //show me many linker address in home page
  
  function show_many_linker_in_homoe()
  {
      
    $prepsql="select * FROM `profile` where user_id not in (select profile_2 from link where profile_1=$_COOKIE[user_id]) and user_id not in (select profile_2 from suggestion_stop where profile_1=$_COOKIE[user_id]) and user_id !=$_COOKIE[user_id] LIMIT 10"; 
    $rows=mysql_query($prepsql);
    if(mysql_num_rows($rows)>0){echo"<center>Some Suggestion</center>";}else{echo"<center>No Suggestion</center>";}
      while ($row = mysql_fetch_array($rows)){
          if(strlen($row['full_name'])>11){$row['full_name']=substr($row['full_name'], 0, 8)."...";}
        $rnd = generateRandomString(23);
        echo"<script>save_linker_into_span('$row[user_id]','$a','$rnd','$row[full_name]');</script>"; 
        echo"<script>get_prof_pic_cmd2('$row[profile_pic]','$rnd',30,30);</script>";     
      }  
  }

  //get the post content news Feed
  
  function get_the_post_content_newsfeed()
  {
      $profile_id=$_COOKIE['user_id'];
      if(isset($_GET['id'])){$profile_id=$_GET['id'];}                                                //$profile_id
      if(isset($_GET['po_id'])){$mysql_query=prepare("SELECT * FROM `post_link` where linker_id in (select profile_2 from link where profile_1=$_COOKIE[user_id]) and linker_post_id<:0 ORDER BY `date` DESC LIMIT 1",array("$_GET[po_id]"));}
      else{$mysql_query="SELECT * FROM `post_link` where  linker_id in (select profile_2 from link where profile_1=$profile_id) ORDER BY `date` DESC LIMIT 1";}
      $post_link = mysql_fetch_array(mysql_query($mysql_query));
      $result = mysql_query($mysql_query);
       //echo $mysql_query;
      if(mysql_num_rows($result)>0){
         
      $post=mysql_fetch_array(mysql_query("SELECT * FROM posts where post_id='$post_link[post_id]'"));
      $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$post[owner]'"));
      $love=mysql_fetch_array(mysql_query("SELECT count(*) as count FROM post_like where post_id='$post[post_id]'"));
      $cmt=mysql_fetch_array(mysql_query("SELECT count(*) as count FROM post_command where post_id='$post[post_id]'"));
      $view=mysql_fetch_array(mysql_query("SELECT count(*) as count FROM post_view where post_id='$post[post_id]'"));
      
      $post[image]=explode(";",$post[image]);
      $post[image]=implode("::",$post[image]);
                           
      
      echo"<script>make_post_print('$post[post_id]','$post[image]','$profile[profile_pic]','$profile[full_name]','$post[credit]','$post[caption]','$post[text]','$love[count]','$cmt[count]','$view[count]','$profile[user_id]');</script>";
      echo"<script>add_post_task('?get_the_post_content_newsfeed=true&po_id=$post_link[linker_post_id]','profile_post_loader_on',0);</script>";}
      else{echo"<center>--NewsFeed--</center>";}}
  

  //save the link connection
  function save_profile_liker_con()
  {                       
        $prepsql="SELECT count(*) as count FROM `link` where profile_1 = :0 and profile_2 = :1"; 
        $rows=mysql_query(prepare($prepsql , array("$_COOKIE[user_id]","$_GET[id]")));
        $num_rows = mysql_fetch_array($rows);
        if($num_rows['count']==0){
        $prepsql="insert into `link` (link_id,profile_1,profile_2,date) values('',:0,:1,now())"; 
        $rows=mysql_query(prepare($prepsql , array("$_COOKIE[user_id]","$_GET[id]")))or die(mysql_error());
        }else {
        $prepsql="delete from `link` where profile_1=:0 and profile_2=:1"; 
        $rows=mysql_query(prepare($prepsql , array("$_COOKIE[user_id]","$_GET[id]")));
        }            
  }
  
  //search div inside
  function search_in_div()
  {
    //open_windows("?profile=true&profile_id=");
    $prepsql="SELECT * FROM `profile` where full_name like :0 LIMIT 20"; 
    $rows=mysql_query(prepare($prepsql , array("%$_GET[val]%")));
      while ($row = mysql_fetch_array($rows)) { 
        $rnd = generateRandomString(23);
        $a="open_windows('?profile=true&profile_id=$row[user_id]');";
        echo"<span class='btn btn-default' onclick=$a><span id='$rnd'></span>$row[full_name]</span>";  
        $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$row[user_id]'"));
        echo"<script>get_prof_pic_cmd2('$profile[profile_pic]','$rnd');</script>";     
      } 
  }
  
  //share your post
  function save_post_on_share()
  {
    $prepsql="insert into `post_link`(linker_post_id,post_id,linker_id,date) values('',:0,:1,now())"; 
    mysql_query(prepare($prepsql , array("$_GET[id]"),"$_COOKIE[user_id]"));  
  }
  
  //get few command in post
  function save_post_cmd_show()
  {
    $prepsql="SELECT * FROM `post_command` where post_id = :0 LIMIT 10"; 
      $rows=mysql_query(prepare($prepsql , array("$_GET[id]")));
      while ($row = mysql_fetch_array($rows)) { 
        $rnd = generateRandomString(23);
        echo"<span id='$rnd'></span>$row[text]<hr/>";
        $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$row[profile_id]'"));
        echo"<script>get_prof_pic_cmd('$profile[profile_pic]','$rnd');</script>";     
      }     
  }
  
  //get save the post comand
  function get_save_post_cmd()
  {
    $mysql_query=prepare("insert into post_command (post_command_id,post_id,profile_id,text,date) values('',:0,:1,:2,now())",array("$_GET[id]","$_COOKIE[user_id]","$_GET[txt]"));
    mysql_query($mysql_query);        
    $rnd = generateRandomString(23);
    $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$_COOKIE[user_id]'"));
    echo"<span id='$rnd'></span>$_GET[txt]";
    echo"<script>get_prof_pic_cmd('$profile[profile_pic]','$rnd');</script>";          
  }
  
  //get save the like of post
  function get_save_post_like()
  {
      $mysql_query=prepare("SELECT count(*) as count FROM post_like where post_id=:0 && profile_id=:1",array("$_GET[id]","$_COOKIE[user_id]"));
      $num_rows = mysql_fetch_array(mysql_query($mysql_query));
       
      if($num_rows[count]!=0)
      {
        $mysql_query=prepare("delete from post_like where post_id=:0 and profile_id=:1",array("$_GET[id]","$_COOKIE[user_id]"));
        mysql_query($mysql_query);        
          echo"<script>delete_like_from_post('$_GET[id]')</script>";
      }
      else
      {
        $mysql_query=prepare("insert into post_like (post_like_id,post_id,profile_id,date) values('',:0,:1,now())",array("$_GET[id]","$_COOKIE[user_id]"));
        mysql_query($mysql_query);        
      }
  }
  
  
  //get the post content 
  
  function get_the_post_content()
  {
      $profile_id=$_COOKIE['user_id'];
      if(isset($_GET['id'])){$profile_id=$_GET['id'];}
      if(isset($_GET['po_id'])){$mysql_query=prepare("SELECT * FROM `post_link` where linker_id='$profile_id' and linker_post_id<:0 ORDER BY `date` DESC LIMIT 1",array("$_GET[po_id]"));}
      else{$mysql_query="SELECT * FROM `post_link` where linker_id='$profile_id' ORDER BY `date` DESC LIMIT 1";}
      $post_link = mysql_fetch_array(mysql_query($mysql_query));
      $post=mysql_fetch_array(mysql_query("SELECT * FROM posts where post_id='$post_link[post_id]'"));
      $profile=mysql_fetch_array(mysql_query("SELECT * FROM profile where user_id='$post[owner]'"));
      $love=mysql_fetch_array(mysql_query("SELECT count(*) as count FROM post_like where post_id='$post[post_id]'"));
      $cmt=mysql_fetch_array(mysql_query("SELECT count(*) as count FROM post_command where post_id='$post[post_id]'"));
      $view=mysql_fetch_array(mysql_query("SELECT count(*) as count FROM post_view where post_id='$post[post_id]'"));
      
      $post[image]=explode(";",$post[image]);
      $post[image]=implode("::",$post[image]);
      
      if(isset($post['post_id'])){
      echo"<script>make_post_print('$post[post_id]','$post[image]','$profile[profile_pic]','$profile[full_name]','$post[credit]','$post[caption]','$post[text]','$love[count]','$cmt[count]','$view[count]');</script>";
      }
      if(mysql_num_rows(mysql_query(prepare("SELECT * FROM `post_link` where linker_id='$profile_id' and linker_post_id<:0 ORDER BY `date` DESC LIMIT 1",array("$post_link[linker_post_id]"))))!= 0){
      echo"<script>add_post_task('?get_the_post_cont=true&po_id=$post_link[linker_post_id]&id=$_GET[id]','profile_post_loader_on',0);</script>";}
  }
  
  //save_post_content
  function save_post_content()
  {
        $prepSql = "INSERT INTO posts (post_id,type,caption,text,image,credit,tags,owner,date) VALUES ('',:0,:1,:2,:3,:4,:5,:6,now())";
        $a=mysql_query(prepare($prepSql, array("standard","","$_GET[post_text]","$_GET[img_id_saver]","$_GET[credit_prof]","","$_COOKIE[user_id]")))or die( mysql_error($a));
        $post_id=mysql_insert_id();
        $prepSql = "INSERT INTO post_link (linker_post_id,post_id,linker_id,date) VALUES ('',:0,:1,now())";
        $a=mysql_query(prepare($prepSql, array("$post_id","$_COOKIE[user_id]")))or die( mysql_error($a));
        set_msg(1,"Posted Sucessfully");
        //echo"<script>show_div('windows',1);show_div('mw_menus_container',0);</script>";
        echo"<script>parent.make_alert_right('Posted Sucessfully',1);</script><script>location.reload();</script>";
 }
  
  //show me the creditor profile
  function get_creditor_profile()
  {   
    $_GET[para] = substr($_GET[para], 1, -1);                    
      $prepsql="SELECT * FROM `profile` where full_name like :0 LIMIT 10"; 
      $rows=mysql_query(prepare($prepsql , array("$_GET[para]%")));
      while ($row = mysql_fetch_array($rows)) { 
          $rnd = generateRandomString(22);
        echo"<div class='btn btn-default' onclick='get_tagged_prof_to(this,$row[profile_pic])'><span id='$rnd'></span><span>$row[full_name]</span></div>";
        echo "<script>parent.add_task('?get_img=true&set=$row[profile_pic]&width=$_GET[width]&height=$_GET[height]','$rnd',1,'','image','');</script>";
      }    
  }
  
  //get the background
  
  function get_me_background()
  {
    header('Content-type: image/jpeg');
    $pic_img = "img/bk/2.jpg";
            
    $myimage = resizeImage("$pic_img", $_GET['width'], $_GET['height']);
    print $myimage;   
  }
  
  //get backgroung image
  function get_me_bk_pic()
  {  
    header('Content-type: image/jpeg');
    $row = mysql_fetch_array( mysql_query( "SELECT * FROM `img` where img_id='$_GET[set]'" ) );
    $pic_img = $row['img_src'];
            
    $myimage = resizeImage("$pic_img", $_GET['width'], $_GET['height']);
    print $myimage;
  }
  
  //resize image
  function resizeImage($filename, $newwidth, $newheight){
    list($width, $height) = getimagesize($filename);
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $info = getimagesize($filename);

    if ($info['mime'] == 'image/jpeg') 
        $source = imagecreatefromjpeg($filename);

    elseif ($info['mime'] == 'image/gif') 
        $source = imagecreatefromgif($filename);

    elseif ($info['mime'] == 'image/png') 
        $source = imagecreatefrompng($filename);

    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    return imagejpeg($thumb);
}

  //update image data
  function update_image_data($a,$table,$col,$css_class,$width,$height)
  {
    if($a!='')
    {
        $prepSql = "INSERT INTO img (img_id,img_src,owner,date) VALUES ('',:0,:1,now())";
         $a=mysql_query(prepare($prepSql, array("users/$_COOKIE[user_id]/$a","$_COOKIE[user_id]")))or die( mysql_error($a));
 
            $img_id=mysql_insert_id();
        $prepSql = "UPDATE $table SET $col=:0 WHERE `user_id`=$_COOKIE[user_id]";
        $q=mysql_query(prepare($prepSql, array($img_id)))or die( mysql_error($q));
  ?>  
        <script>parent.add_task('?get_img=true&set=<?=$img_id?>&width=<?=$width?>&height=<?=$height?>','<?=$col?>_img_container',1,'','image','<?=$css_class?>');</script>
        <?php     
    }   
  }
  
  //upload multiple file
  function upload_multiple_image_data()
  {
   if (isset($_FILES['my_file'])) 
   { 
                
       $myFile = $_FILES['my_file'];
       $fileCount = count($myFile["name"]);
       $img_id_mul_up=""; 
       for ($i = 0; $i < $fileCount; $i++) 
       {                                                       
                  $target_dir = "users/".$_COOKIE['user_id']."/";
                  $file_name = generateRandomString(20);
                  $target_file = $target_dir . $file_name;
                  $uploadOk = 1;
                  $path_parts = pathinfo($_FILES["my_file"]["name"][$i]);
                  $imageFileType = $path_parts['extension'];
                  //$check = getimagesize($_FILES["file_name"]["tmp_name"]);
                  //if($check !== false) {$uploadOk = 1;} else {$uploadOk = 0;}
                  
                  if (file_exists($target_file)) {  $target_file = $target_dir . generateRandomString(20);}
                  //if ($_FILES["fileToUpload"]["size"] > 500000) {$uploadOk = 0;}

                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {$uploadOk = 0;}
                  if ($uploadOk == 1){
                    move_uploaded_file($_FILES["my_file"]["tmp_name"][$i], $target_file.".".$imageFileType);
                    $uploadOk=1;echo"<script>parent.make_alert_right('Image Have Sucessfully Uploaded',1);</script>";
                  }else{$uploadOk=0;echo"<script>parent.make_alert_right('Image upload Failed',2);</script>";       
                  }
                  $j=$file_name.".".$imageFileType;
                  if($uploadOk==1){   
                      $prepSql = "INSERT INTO img (img_id,img_src,owner,date) VALUES ('',:0,:1,now())";
                      $a=mysql_query(prepare($prepSql, array("users/$_COOKIE[user_id]/$j","$_COOKIE[user_id]")))or die( mysql_error($a));
                      $img_insert_id=mysql_insert_id();
                      $img_id_mul_up.="$img_insert_id::";
       } 
   }                      echo"<script>parent.get_multiple_image_data('$img_id_mul_up','$_POST[multiple_file]',1);</script>";}    
  }
  
  //upload image
  function upload_me_bk()
  {
   $target_dir = "users/".$_COOKIE['user_id']."/";
   $file_name = generateRandomString(20);
   $target_file = $target_dir . $file_name;
   $uploadOk = 1;
   $path_parts = pathinfo($_FILES["file_name"]["name"]);
   $imageFileType = $path_parts['extension'];
       //$check = getimagesize($_FILES["file_name"]["tmp_name"]);
       //if($check !== false) {$uploadOk = 1;} else {$uploadOk = 0;}
                  
   if (file_exists($target_file)) {  $target_file = $target_dir . generateRandomString(20);}
   //if ($_FILES["fileToUpload"]["size"] > 500000) {$uploadOk = 0;}
   $imageFileType=strtolower ($imageFileType);
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {$uploadOk = 0;}
                                                                             
   if ($uploadOk == 1){
       move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file.".".$imageFileType);
       $uploadOk=1;
       echo"<script>parent.make_alert_right('Image Have Sucessfully Uploaded',1);</script>";
   }else{
       $uploadOk=0;
        echo"<script>parent.make_alert_right('Image upload Failed',2);</script>";       
   }
   $j=$file_name.".".$imageFileType;
   if($uploadOk==0){$j='';}
    return $j;  
   }

  //start profile settings
  function get_me_edit_settings()
  {
     if($_GET["type"]=="email"){get_me_edit_settings_email();} 
     if($_GET["type"]=="f_name"){get_me_edit_settings_all('Full Name','full_name','profile');} 
     if($_GET["type"]=="password"){get_me_edit_settings_password();} 
     if($_GET["type"]=="profession"){get_me_edit_settings_all('Profession','profession','profile');} 
     if($_GET["type"]=="ph_no"){get_me_edit_settings_all('Phone Number','ph_number','profile');} 
     if($_GET["type"]=="workspace"){get_me_edit_settings_all('Workspace','workspace','profile');} 
     if($_GET["type"]=="from"){get_me_edit_settings_all('From where ?','from_where','profile');} 
     if($_GET["type"]=="lives_in"){get_me_edit_settings_all('Lives in','lives_in','profile');} 
     if($_GET["type"]=="d_o_b"){get_me_edit_settings_all('Date Of Birth','d_o_b','profile');} 
     if($_GET["type"]=="sex"){get_me_edit_settings_options('Sex','sex','profile');} 
     if($_GET["type"]=="quotes"){get_me_edit_settings_all('Quotes','quotes','profile');} 
  }
  
  function get_me_edit_settings_email(){
      ?>
        <br><br><br><font color="red">Your Mail Cant be edited</font><br><br><br>
      <?php
  }

    function get_me_edit_settings_all($name,$col_name,$table){
        $val=generateRandomString(15);
        $value=mysql_fetch_array( mysql_query( "SELECT $col_name FROM `$table` where user_id='$_COOKIE[user_id]'" ));
      ?>
        <span class='font_increase'><?=$name?>:</span>
        <input type='text' id='<?=$val?>' placeholder='<?=$name?>' class="col-md-12 col-sm-12 col-xs-12 form-control font_increase" value="<?=$value[$col_name]?>">
        <button type="button" onclick="save_me_profile_edit('<?=$col_name?>','<?=$val?>')" class="btn btn-primary glyphicon glyphicon-floppy-disk col-md-12 col-sm-12 col-xs-12 font_increase">&nbsp;Save</button>
        <style>.font_increase{font-size: 20px;}</style>
      <?php
  }

    function get_me_edit_settings_options($name,$col_name,$table){
        $val=generateRandomString(15);
        $value=mysql_fetch_array( mysql_query( "SELECT $col_name FROM `$table` where user_id='$_COOKIE[user_id]'" ));
      ?>
        <span class='font_increase'><?=$name?>:</span>
        <select  id='<?=$val?>' class="col-md-12 col-sm-12 col-xs-12 form-control font_increase">
            <option value="Male" <?php if($value[$col_name]=="Male"){echo"selected";}?>>Male</option>
            <option value="Female" <?php if($value[$col_name]=="Female"){echo"selected";}?>>Female</option>
        </select>
        <button type="button" onclick="save_me_profile_edit('<?=$col_name?>','<?=$val?>')" class="btn btn-primary glyphicon glyphicon-floppy-disk col-md-12 col-sm-12 col-xs-12 font_increase">&nbsp;Save</button>
        <style>.font_increase{font-size: 20px;}</style>
      <?php
  }

  function get_me_edit_settings_password()
  {
        $val=generateRandomString(15);
      ?>
        <span class='font_increase'>Password:</span>
        <input type='password' id='<?=$val?>' placeholder='Password' class="col-md-12 col-sm-12 col-xs-12 form-control font_increase">
        <button type="button" onclick="save_me_profile_edit('password','<?=$val?>')" class="btn btn-primary glyphicon glyphicon-floppy-disk col-md-12 col-sm-12 col-xs-12 font_increase">&nbsp;Save</button>
        <style>.font_increase{font-size: 20px;}</style>
      <?php
      
  }
  
  function get_me_update_settings($table='profile')
  {
    
    $prepSql = "UPDATE $table SET $_GET[name]=:0 WHERE `user_id`=$_COOKIE[user_id]";
    $a=mysql_query(prepare($prepSql, array($_GET['v'])))or die( mysql_error($a));
    ?>
    <script>show_div('windows1',1);open_windows('?settings=true')</script>
    <?php
  }
  
  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = 'a';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

  //end profile settings
  
function get_me_sign_in(){
   if($_POST["set_sign_in"]=="set:1"){
        $prepSql = "select * from login_detail where email=:0 and password=:1";
        $prepSql=prepare($prepSql, array("$_POST[email]",encryptIt($_POST["pwd"])));
       $p=mysql_fetch_row(mysql_query($prepSql));     
       if(isset($p[0])){
       set_msg(1,"SUCESS");
       setcookie("user_id", $p[0] ); 
       header('Location: index.php');     
       }else{set_msg(3,"INVALID LOGIN");header('Location: index.php');}  
   } 
}
  
  
function set_msg($a,$b){
    setcookie("make_alert","$a");
    setcookie("msg","$b");    
}

function get_me_sign_up(){   
    if($_POST["set_sign_up"]=="set:1"){
     if(strlen($_POST["Full_Name"])>=5){
      if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
       if(strlen($_POST["pwd"])>=5){
        if($_POST["dd"]!="date"&&$_POST["mm"]!="month"&&$_POST["yy"]!="year"&&$_POST["sex"]!=""){
         //mysql_query("insert into login_detail values(NULL,'$_POST[Full_Name]','$_POST[email]','".encryptIt($_POST["pwd"])."','$_POST[yy]-$_POST[mm]-$_POST[dd]','$_POST[sex]')")or die(mysql_error()/*header('Location: index.php');*/);
         //mysql_query("insert into login_detail values(user_id,full_name,email,password,d_o_b,sex)")or die(header('Location: index.php'));
         
         $query = mysql_query("SELECT email FROM login_detail WHERE email='$_POST[email]'");
         if (mysql_num_rows($query) != 0){set_msg(3,"Your Email Already Exists ... Please Login");header('Location: index.php');die();}
         
         $prepSql = "INSERT INTO login_detail (user_id,email,password,date) VALUES ('',:1,:2,now())";
         $a=mysql_query(prepare($prepSql, array(NULL,"$_POST[email]",encryptIt($_POST["pwd"]))))or die( mysql_error($a));
 
            //$row = mysql_fetch_array( mysql_query( "SELECT user_id FROM `login_detail` where email='$_POST[email]';" ) );
            //$user_id = $row['user_id'];
            $user_id=mysql_insert_id();

        $prepSql = "INSERT INTO profile (user_id,full_name,profession,ph_number,workspace,lives_in,from_where,d_o_b,sex,profile_pic,bk_pic,quotes) VALUES (:0,:1,:2,:3,:4,:5,:6,:7,:8,'','','')";
         $a=mysql_query(prepare($prepSql, array("$user_id","$_POST[Full_Name]","","","","","","$_POST[yy]-$_POST[mm]-$_POST[dd]","$_POST[sex]")))or die( mysql_error($a));
 
 
          mkdir("users/".$user_id, 0700); 
         setcookie("user_id", $user_id ); 
         set_msg(1,"SUCESS");header('Location: index.php'); 
       }else{set_msg(3,"INVALID DATE");header('Location: index.php');}
       }else{set_msg(3,"INVALID PASSWORD");header('Location: index.php');}
      }else{set_msg(3,"INVALID EMAIL");header('Location: index.php');}    
     }else{set_msg(3,"INVALID FULL NAME");header('Location: index.php');}   
    }else{set_msg(3,"INVALID SIGN UP");header('Location: index.php');}
} 


function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

function get_me_logout()
{
    setcookie("user_id", "", time()-3600);
    header('Location: index.php'); 
}

function prepare($sql, $params=array()){

    if(strlen($sql) < 2 || count($params) < 1){
        return $sql;
    }

    preg_match_all('/\:[a-zA-Z0-9]+/', $sql, $matches);

    $safeSql = $sql;
    foreach($matches[0] as $arg){
        if(array_key_exists(ltrim($arg, ':'), $params)){
            $safeSql = str_replace($arg, "'" . mysql_real_escape_string($params[ltrim($arg, ':')]) . "'", $safeSql);
        }
    }
             //echo $safeSql;
    return $safeSql;

}

?>
