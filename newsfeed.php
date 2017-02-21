<?php
   require("action.php");
   require("settings.php");
   
?>
<div class="row profile_items" id='post_container'></div>    
    
<div id='profile_post_loader_on' class="col-xs-12 col-sm-12 col-md-12"></div>
<script>add_post_task("?get_the_post_content_newsfeed=true",'profile_post_loader_on',0);
    looper_create_post_in_user_window();
</script>

<style>

.border{
    border:1px outset #E0E0E0;
}
.profile_header{
    background: white;
    padding:20px;
    padding-top:55px;
}
.picture{
    height:170px;
    width:100%;
    position: absolute;
    top: 75px;
    left:-75px;
    
}

#profile_pic {
    position: relative;
    min-height: 300px;
  }
#profile_pic_content {
    position: absolute;
    bottom: 0;
    left: -50px;
  }
  
.bg_bk{         
    height:300px;
}
.bg_bk .select_bk_img{
    position: absolute;
    top: 10px;
    left: 25px;
}
.select_profile_img{
    position: absolute;    
    margin-top: 110px;
    margin-left: -35px;
}
.bg_blur
{
    width:100%;
    height:100%;
}
.profile_details #full_name{
    font-size:35px;
    font-weight: bold;
    margin-bottom:-40px;
}
#profile_content{
    text-align: center;
}
.profile_details blockquote p{
    font-size: 15px;    
}
.profile_items{
    font-size: 10px;
}
.profile_items{
    text-align: center;
}
.profile_items .title{
    font-size: 20px;
}
.profile_items hr{
    margin:1px;
}
.profile_items table{
    width:100%;
}
.profile_items .profile_frame,.profile_items .photo_frame{
    height:100px;
    width:100%;
    border:2px outset;
}
.profile_items .profile_name{
    width:100%;
    margin-top:-20px;
    margin-bottom: 0px;    
}
.profile_items .icons{
    width:10%;    
}
.profile_items .contents{
    width:90%;
    text-align: left;
}
#connection td{
    width:20%;
}

/*Posts*/
.post_content{
 position: relative; 
 /*padding-top: 260px;*/
 z-index: 1;
 }
 .post_content .prof_pic{
    position: absolute;
    width:50px;height:50px;  
 }
.post_content .img_posts{
    width:100%;
    height:300px;
    position:absolute;
    top:0px;
    left:0px;
    z-index:-1;
}
.post_content .posts_profile_pic{
    /*margin-top: -30px;*/
    width:50px;height:50px;
}
.post_content .post_owner{
    font-size: 25px; 
    font-weight: lighter;   
}
.post_content .post_detail{
    font-size: 15px; 
    word-wrap:break-all;   
}
.post_content .post_detail_title{
    font-size: 20px;   
}
.post_content .publizize_boxes{
    width: 100%;    
}
.post_content .credits{
    font-size: 15px;    
}
#profile_post_loader_on{text-align: center;}
</style>
<script id='result_script'>
grid_container();

</script>

