<?php
  require("action.php");
  require("settings.php");

   
    function show_post_menu()
    {
      ?>
      <div class="container" id='post_inside_contai'>
        <script>make_post_menu_1('?get_me_post_me_std=true','glyphicon-edit','Standard');</script>
        <script>//make_post_menu_1('','glyphicon-transfer','Link');</script>
        <script>//make_post_menu_1('','glyphicon-music','Quotes');</script>
        <script>make_post_menu_1('','glyphicon-question-sign','Question');</script>
        <script>make_post_menu_1('','glyphicon-star-empty','Rating');</script>
      </div>
      <style>
      .post_menu_items{border:0px;border-bottom:1px outset black;font-size:40px;text-align: left;}
      </style>
      <?php  
    }
    
    function show_post_standard()
    {   $profile=mysql_fetch_array( mysql_query( "SELECT * FROM `profile` where user_id='$_COOKIE[user_id]'" ));
        ?>
        <!--<center style="padding-top:70px;"> -->
        <div class="" id='post_inside_standard'>
        <table width="100%"><tr><td width="70px"><span id='get_post_prof_pic' onclick="open_windows('?profile=true')"></span></td>
        <td>
            <span class="col-md-12 col-sm-12 col-xs-12"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Say Something:</span>
            <textarea class="col-md-12 col-sm-12 col-xs-12 form-control" id='post_text' placeholder='Say Something'></textarea>
            <script>add_task('?get_img=true&set=<?=$profile['profile_pic']?>&width=50&height=50','get_post_prof_pic',1,'','image','');</script>
        </td></tr>
        <tr><td></td><td>
        <table width="100%"><tr><td width="60px">
        <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-gift"></span>
                <span class="glyphicon glyphicon-plus"></span>
                <input type="hidden" id='credit_prof'/>
        </button></td><td>
        <input type="text" class="form-control" id='tag_people_name' placeholder='Credit People' onkeyup="show_agging_people(this,'show_tagging_people',30,30)" >
        <div id='tag_people_name_show'></div>
        <div id='show_tagging_people' class="col-md-12 col-sm-12 col-xs-12"></div>
        </td></tr></table>
        </td></tr>
        <tr><td colspan="2" style="text-align: right;">
            <button type="button" class="btn btn-default btn-sm" onclick="document.getElementById('multiple_infile').click();">
                <span class="glyphicon glyphicon-picture"></span>
                <span class="glyphicon glyphicon-plus"></span>
                <input type="hidden" id='img_id_saver'/>
            </button>
            <select id="sel1" class="btn btn-default">
                <option value="public">Visibility</option>
                <option value="public">Public</option>
                <option value="me">Only Me</option>  
            </select>
            <button type="button" class="btn btn-default btn-sm" onclick="save_post()">
                <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;
                Post
            </button>
            
            <div id='get_the_photo_multiple'><div>
            <form target="multiple_image_upload" class='no_dis' action="" method="POST" enctype="multipart/form-data" >
              <input type="hidden" name='multiple_file' value="get_the_photo_multiple"> 
              <input id="multiple_infile" name="my_file[]" type="file" onchange="this.form.submit();" multiple="true" ></input> 
            </form>
              <iframe src='about:blank' id='multiple_image_upload' name='multiple_image_upload' class='no_dis'></iframe>
        </td></tr>
        </table>
        </div>
        </center>
        <style>
        #post_inside_standard{font-size: 20px;text-align: left;}
        #post_text{resize: vertical;}
        #tag_people_name{width: 100%}
        #show_tagging_people{position: absolute;width: 40%;display: none;z-index: 50;}
        </style> 
        <?php   
    }
?>
