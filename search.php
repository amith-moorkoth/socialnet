<?php
   require("action.php");
   require("settings.php");
?>
<br/><br/><br/>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <table width="100%"><tr><td width="100%"><input type="search" class="form-control" onkeyup="make_search_change(this)" placeholder="search" id="search_box_link"></td><td><span class="glyphicon glyphicon-search"></span></td></tr></table>
    </div>
  </div>
  <br/><br/>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12" id='search_result_user'>
    </div>
  </div>
</div>
