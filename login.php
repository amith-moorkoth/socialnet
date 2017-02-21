<?php
require("header.php");
?>
<div class="container">
  
  <div class="row">
    <div class="col-sm-6">
        <center>
        <font size='20px'><?=$site_name?></font>
        </center>
        <br/>
        <ul class="nav nav-tabs" id="nav-tabs-create">
            <li class="active" onclick="show_tab(this)"><a href="#tab-sign-in">SIGN IN</a></li>
            <li  onclick="show_tab(this)"><a href="#tab-sign-up">SIGN UP</a></li>
        </ul> 
        <div id="tab-sign-in" class="sign-in">
        <div class="space"></div>
        <form action="" method="post" name="sign_in" onsubmit="return check_validate_sign_in()">
        <input type="hidden" name="set_sign_in" value="set:1">
        <table>
        <tr><td>Email</td><td><input type="email" name="email" placeholder="Email" class="btn btn-default"></td></tr>
        <tr><td>Password</td><td><input type="password" name="pwd" placeholder="Password" class="btn btn-default"></td></tr>
        </table><br>
        <input type="submit" value="SignIn" class="btn btn-primary">
        </form>
        <center><div id="sign-in_msg"></div></center>
        </div>
        
        <div id="tab-sign-up" style="display: none;" class="sign-up">
        <div class="space"></div>
        <form action="" name="sign_up" method="post"onsubmit="return check_validate_sign_up()">
        <input type="hidden" name="set_sign_up" value="set:1">
        <table>
        <tr><td>Full Name</td><td><input type="text" name="Full_Name" placeholder="Full Name" class="btn btn-default"></td></tr>
        <tr><td>Email</td><td><input type="Email" name="email" placeholder="Email" class="btn btn-default"></td></tr>
        <tr><td>Password</td><td><input type="password" name="pwd" placeholder="Password" class="btn btn-default"></td></tr>
        <tr><td>D.O.B</td><td>
        <select class="btn btn-default" id="sign_up_date" name="dd"><option value="date">DATE</option></select>
        <select class="btn btn-default" id="sign_up_month" name="mm"><option value="month">MONTH</option></select>
        <select class="btn btn-default" id="sign_up_year" name="yy"><option value="year">YEAR</option></select>
        <tr><td>Gender</td><td><table><tr><td><input type="radio" name="sex" class="radio"value="male"></td><td>Male</td>
        <td><input type="radio"  class="radio" name="sex" value="female"></td><td>Female</td></tr></table></td></tr>
        </table><br>
        <input type="submit" value="SignUp" class="btn btn-primary">
        </form>
        <center><div id="sign-up_msg"></div></center>
        </div>
         
    </div>

    <div class="col-sm-6">
    Description Goes Here
    </div>

  </div>
</div>

<?php
  require("footer.php");
?>
<script>change_yy_mm_dd();</script></td></tr>
        