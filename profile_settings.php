<?php                   
require("settings.php");
require("action.php");
?> 
             
             <?php
                $login_details=mysql_fetch_array( mysql_query( "SELECT * FROM `login_detail` where user_id='$_COOKIE[user_id]'" ));
                $profile=mysql_fetch_array( mysql_query( "SELECT * FROM `profile` where user_id='$_COOKIE[user_id]'" ));
                    
             ?>
             
<div class="jumbotron profile_settings">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="settings_name">
        <span class="glyphicon glyphicon-lock icons"></span> 
        Login
      </div>
      <hr class="hr_after"/>
      <div class="menu_inside" id='login_menu_insider'>
        <script>                                                      
        inputbox('login_menu_insider','email','Email','?proset=true&type=email','<?=$login_details[email]?>');
        inputbox('login_menu_insider','f_name','Full Name','?proset=true&type=f_name','<?=$profile[full_name]?>');
        inputbox('login_menu_insider','password','Password','?proset=true&type=password','<?=$login_details[password]?>','password');
        </script>
      </div>
    </div>
    
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="settings_name">
        <span class="glyphicon glyphicon-list-alt icons"></span> 
        Basic
      </div>
      <hr class="hr_after"/>
      <div class="menu_inside" id='basic_menu_insider'>
      <script>                                                      
        inputbox('basic_menu_insider','profession','Profession','?proset=true&type=profession','<?=$profile[profession]?>');
        inputbox('basic_menu_insider','ph_no','Phone Number','?proset=true&type=ph_no','<?=$profile[ph_number]?>');
        inputbox('basic_menu_insider','workspace','WorkSpace','?proset=true&type=workspace','<?=$profile[workspace]?>');
        inputbox('basic_menu_insider','from','From','?proset=true&type=from','<?=$profile[from_where]?>');
        inputbox('basic_menu_insider','lives_in','Lives In','?proset=true&type=lives_in','<?=$profile[lives_in]?>');
        inputbox('basic_menu_insider','d_o_b','Birthday','?proset=true&type=d_o_b','<?=$profile[d_o_b]?>');
        inputbox('basic_menu_insider','sex','Sex','?proset=true&type=sex','<?=$profile[sex]?>');
        inputbox('basic_menu_insider','quotes','Quotes','?proset=true&type=quotes','<?=$profile[quotes]?>');
      </script>
      </div>
    </div>
    
</div>


<style>
.profile_settings{
    background: white;
    padding:20px;
    padding-top:55px;
}
.profile_settings .hr_after{
    margin:0px;
    margin-bottom:10px;
}
.profile_settings .icons{
    margin-right:30px;     
}
.settings_name{
    font-size: 30px; 
    padding-left:20px;
    padding-top: 20px;   
}
.menu_inside{
    font-size:25px;
    padding:30px;    
}
.settings_input input{
    border-top:0px;
    border-left:0px;
    border-right:0px;
    width:100%;
}
.settings_input input[disabled], .settings_input input[disabled]:hover { background:white; }
.settings_input table{width:100%;}
</style>
                           
