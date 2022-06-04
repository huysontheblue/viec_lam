<?php  
  if (!isset($_SESSION['ADMIN_USERID'])){
    redirect(web_root."admin/index.php");
  }
  @$USERID = $_GET['id'];
  if($USERID==''){
    redirect("index.php");
  }
  $user = New User();
  $singleuser = $user->single_user($USERID);
?> 

<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
  <fieldset>
    <legend> Cập nhật tài khoản người dùng</legend>
    <input id="USERID" name="USERID" type="Hidden" value="<?php echo $singleuser->USERID; ?>">
    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="U_NAME">Tên:</label>
        <div class="col-md-8">
          <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="U_NAME" name="U_NAME" placeholder="Tên người dùng" type="text" value="<?php echo $singleuser->FULLNAME; ?>">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="U_USERNAME">Tài khoản:</label>
        <div class="col-md-8">
          <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="U_USERNAME" name="U_USERNAME" placeholder="Tên tài khoản" type="text" value="<?php echo $singleuser->USERNAME; ?>">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="U_PASS">Mật khẩu:</label>
        <div class="col-md-8">
          <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="U_PASS" name="U_PASS" placeholder="Mật khẩu tài khoản" type="Password" value="" required>
        </div>
      </div>
    </div>
                  
    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="U_ROLE">Quyền:</label>
        <div class="col-md-8">
          <select class="form-control input-sm" name="U_ROLE" id="U_ROLE">
            <option value="Quản trị viên"  <?php echo ($singleuser->ROLE=='Quản trị viênr') ? 'selected="true"': '' ; ?>>Quản trị viên</option>
            <option value="Người dùng" <?php echo ($singleuser->ROLE=='Người dùng') ? 'selected="true"': '' ; ?>>Người dùng</option>  
          </select> 
        </div>
      </div>
    </div>
          
    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="idno"></label>
        <div class="col-md-8">
          <button class="btn btn-primary " name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Cập nhật</button>
        </div>
      </div>
    </div>
  </fieldset> 
</form>
