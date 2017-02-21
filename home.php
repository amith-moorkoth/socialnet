<?php
  require("header.php");
?>

<nav class="navbar navbar-default header" style='background-color: rgb(78, 69, 137);'>
    <div class="navbar-header">
      <table><tr>          
        <td style="width: 10%;"><div class="header">
        <center><a href="" class="logo"><div class="gecbh_logo"></div></a><br>
        <a href="" class="logo"><div class="gecbh_logo logo_gecbh"></div></a></center> 
        </div></td>
        <td style="width: 80%;"></td>
        <td onclick="show_div('mw_menus_container',0);"><a href="#" class="btn-lg"><span class="glyphicon glyphicon-indent-left"></span></a></td>
        <td onclick="show_div('menu_item',0)"><a href="#" class="btn-lg"><span class="glyphicon glyphicon-th"></span></a></td>
        <td><a href="?logout=true" class="btn-lg"><span class="glyphicon glyphicon-off"></span></a></td>
        <td style="width: 2%;"></td>
      </tr></table>
    </div>
</nav>

    
        <div class="badget_div_in">
            <ul class="nav nav-tabs" id="nav-tabs-create">
                <li class="active" onclick="show_tab(this)"><a href="#tab-homes"><span class="glyphicon glyphicon-list-alt"></span><span class="badge">7</span></a></li>
                <li  onclick="show_tab(this)"><a href="#tab-notification"><span class="glyphicon glyphicon-bell"></span><span class="badge">7</span></a></li>
                <li  onclick="show_tab(this)"><a href="#tab-private-chat"><span class="glyphicon glyphicon glyphicon-volume-up"></span><span class="badge">7</span></a></li>
            </ul>
        </div>

<div id="mw_menus_container">
<div id="tab-homes" class="home_tabs"> 
        
<!--<div class="grid-item_bk drop_shadow col-xs-12 col-sm-3 col-md-3 pad_in" onclick="open_windows('?profile=true')">
    <br/>
    <span class="glyphicon glyphicon-home btn-lg"></span>
    <font size="5px">Home</font>
  </div>-->

  <!--<div class="grid-item_bk drop_shadow col-xs-12 col-sm-3 col-md-3 pad_in" onclick="open_windows('?get_me_post_me_std=true')">
    <br/>
    <span class="glyphicon glyphicon-edit btn-lg"></span>
    <font size="5px">Posts</font>
  </div>

  <div class="grid-item_bk drop_shadow col-xs-12 col-sm-3 col-md-3 pad_in" onclick="open_windows('?get_me_newfeed=true')">
    <br/>
    <span class="glyphicon glyphicon-list-alt btn-lg"></span>
    <font size="5px">NewsFeed</font>
  </div>-->
    
    <div class="bakgrnd">
        <span id='back_ground_pic_u_c'></span>  
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-6" style="height: 350px;background: url('img/sys/bk_menu_white.png');">
    
    <div class="col-xs-12 col-sm-12 col-md-12" id='show_the_post_okk'></div>
    <div class="col-xs-12 col-sm-12 col-md-12" id='post_inside_standard_result'></div>       
    <div class="col-xs-12 col-sm-12 col-md-12" id='show_many_linker'></div>      
    </div>
 
    <div class="col-xs-12 col-sm-6 col-md-6" style="height: 350px;background: url('img/sys/bk_menu_white.png');">
  
    <div class="drop_shadow col-xs-12 col-sm-6 col-md-6 nopadding" style="color: black;" id='show_many_public_msg'>
        <table width="100%" style="height: 99%;">
            <tr><td style="height:100%;"><div class="msg_boxes" id="make_msg_boxes_public"></div></td></tr>
            <tr><td>
                <table width="100%"><tr>
                    <td width="100%"><input type="text" class="form-control" placeholder="message me" id="msg_textbox_public" onkeyup="sending_msg_data_public(event,this)"></td>
                    <td><span class="btn btn-default glyphicon glyphicon-send" onclick="send_me_message_in_but_public()"></span></td></tr>
                </table>
            </td></tr> 
        </table>
        <span id='msg_saver_public' class="no_dis"></span>
    </div>  
    
    <div class="grid-item_bk drop_shadow col-xs-12 col-sm-6 col-md-6 pad_in" onclick="open_windows('?get_me_search=true')">
        <span class="glyphicon glyphicon-search btn-lg"></span>
        <font size="5px">Search</font>
    </div>
  
   </div> 
    
    <div class="col-xs-12 col-sm-12 col-md-12 well" id='show_the_newsfeeds'></div>  
</div>
<div id="tab-notification" style="display: none;" class="home_tabs"></div>
<div id="tab-global-chat" style="display: none;" class="home_tabs">  
    <div class="drop_shadow col-xs-12 col-sm-12 col-md-12 well" id='show_many_public_msg'>
         <table width="100%" style="height: 100%;">
            <tr><td style="height:100%;"><div class="msg_boxes" id="make_msg_boxes_public"></div></td></tr>
            <tr><td>
            <table width="100%"><tr>
            <td width="100%"><input type="text" class="form-control" placeholder="message me" id="msg_textbox_public" onkeyup="sending_msg_data_public(event,this)"></td>
            <td><span class="btn btn-default glyphicon glyphicon-send" onclick="send_me_message_in_but_public()"></span></td>
            </tr></table>
            </td></tr>
         </table>
    <span id='msg_saver_public' class="no_dis"></span>
    </div>
</div>
<div id="tab-private-chat" style="display: none;" class="home_tabs">  
        <div class="drop_shadow col-xs-12 col-sm-12 col-md-12 well" id='show_many_chatter'></div>
</div>


<!--<div id="mw_menus_container" class="container"  > 
  <div class="grid-sizer"></div>
    <div class="drop_shadow col-xs-12 col-sm-3 col-md-3" style="background: #004080;" id='show_many_chatter'></div>
    <div class="drop_shadow col-xs-12 col-sm-3 col-md-3" style="background: #004080;margin-bottom:20px;" id='show_many_poster'>-->
    </div>
    <!--  <div class="grid-item drop_shadow grid-item--width7 grid-item--height2"></div>
  <div class="grid-item drop_shadow grid-item--width7 grid-item--height3"></div>
  <div class="grid-item drop_shadow grid-item--width7 grid-item--height2"></div>
  <div class="grid-item drop_shadow grid-item--width2"></div>
  <div class="grid-item drop_shadow grid-item--width7"></div>
  <div class="grid-item drop_shadow grid-item--width7"></div>
  <div class="grid-item drop_shadow grid-item--height2"></div>
  <div class="grid-item drop_shadow grid-item--width3 grid-item--height3"></div>
  <div class="grid-item drop_shadow"></div>
  <div class="grid-item drop_shadow grid-item--height2"></div>
  <div class="grid-item drop_shadow"></div>
  <div class="grid-item drop_shadow grid-item--width4 grid-item--height2"></div>
  <div class="grid-item drop_shadow grid-item--width6"></div>
  <div class="grid-item drop_shadow"></div>
  <div class="grid-item drop_shadow grid-item--height2"></div>
  <div class="grid-item drop_shadow"></div>
  <div class="grid-item drop_shadow grid-item--width6"></div>
  <div class="grid-item drop_shadow grid-item--width6 grid-item--height3"></div>
  <div class="grid-item drop_shadow grid-item--width6 grid-item--height2"></div>
  <div class="grid-item drop_shadow"></div>
  <div class="grid-item drop_shadow"></div>
  <div class="grid-item drop_shadow grid-item--height2"></div> -->
</div>  
<div>
</div>
         

       <div id="menu_item"onclick="show_div('menu_item',1)">
            <div class="container">
                <center>
                <ul id="mw_menus_container_1" style="list-style: none;">
                    <!--Load from script-->
                </ul>              
                </center>
            </div>
       </div>
    
    <div id="windows" class="windows"></div>
    <div id="windows1" class="windows1">    
        <div id='windows1_close' onclick="show_div('windows1',1);add_task('?blank=true','windows1_container',1);">
        <a href="#" class="btn btn-default">
          <span class="glyphicon glyphicon-remove btn-sm"></span> 
        </a>
        </div>
        <div id='windows1_container' class="container btn btn-default"></div>
    </div>

    <iframe onload="if(this.contentDocument.body.innerHTML!=''){give_back_img(this)}" id='img_loader_frame' class="no_dis" src="about:blank" ></iframe>
    <iframe onload="if(this.contentDocument.body.innerHTML!=''){give_back_img2(this)}" id='img_loader_frame2' class="no_dis" src="about:blank" ></iframe>
    <iframe onload="if(this.contentDocument.body.innerHTML!=''){give_back_img3(this)}" id='img_loader_frame3' class="no_dis" src="about:blank" ></iframe>
           
 <script src="script/home_script.js"></script>
 
<?php
  require("footer.php");
?>
    <script>//add_mouse_listner("mw_menus_container");</script>

        <script>add_task("?show_many_linker_in_homoe=true","show_many_linker",0);</script>
        <script>add_task('?get_me_post_me_std=true',"show_the_post_okk",1);</script>
        <script>add_task("?message=true&start=0","show_many_chatter",0);</script>
        <script>add_task("?get_me_post_me_std=true","show_many_poster",0);</script>
        <script>add_task('?get_me_newfeed=true',"show_the_newsfeeds",0);</script>
        <script>make_msg_insider_all_pub();</script>
        
        <script>add_task('?get_bk_img=true&width='+screen.width+'&height='+(screen.height/1.8)+'','back_ground_pic_u_c',1,'','image','');</script>  
    <!--Main Menu Items-->
 <script>
    create_menu_item('home','Home','?profile=true');
    create_menu_item('envelope','Message','?message=true&start=0');
    create_menu_item('search','Search','?get_me_search=true');
    //create_menu_item('list-alt','NewsFeed','?get_me_newfeed=true');
    //create_menu_item('user','Friends','');
    //create_menu_item('edit','Posts','?get_me_post_me_std=true');
    create_menu_item('bell','Notification','?get_me_nitification_me_std=true');
    //create_menu_item('book','Groups','');
    //create_menu_item('eye-open','Page',''); 
    create_menu_item('cog','Settings','?settings=true');
    //create_menu_item('flag','Privacy','');
    //create_menu_item('compressed','Log','');
    //create_menu_item('question-sign','Help','');
    //create_menu_item('ban-circle','Report','');
 </script>  

                
