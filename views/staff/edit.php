

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>staff">Staff</a></li>
        <li class="active">Staff profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">



      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src=" <?php echo URL;?>publics/images/staff/<?php 

                 

                    if($this->data[0]['anest']['staff']['pic_name'] != NULL)
                        echo $this->data[0]['anest']['staff']['pic_name'];
                    else 
                        echo 'avatar5.png';

              ?>" 
              alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $this->data[0]['anest']['staff']['staff_name'];?></h3>

              <p class="text-muted text-center"><?php echo $this->data[0]['anest']['staff']['staff_position'];?></p>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-9">



          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" id="staff-form" name="staff-form" action="<?php echo URL;?>staff/update" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="staff-name" class="col-sm-2 control-label">ชื่อ-สกุล</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="staff-name" name="staff-name" placeholder="Name" value="<?php echo $this->data[0]['anest']['staff']['staff_name'];?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="staff-email" class="col-sm-2 control-label">อีเมลล์</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="staff-email" name="staff-email" placeholder="Email" value="<?php echo $this->data[0]['anest']['staff']['staff_email'];?>" disabled="disabled">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="staff-position" class="col-sm-2 control-label">ตำแหน่ง</label>

                    <div class="col-sm-10">
          <input type="text" class="form-control" id="staff-position" name="staff-position" placeholder="Position" value="<?php echo $this->data[0]['anest']['staff']['staff_position'];?>" required>
                    </div>
                  </div>



                   <div class="form-group">
                    <label for="staff-tel" class="col-sm-2 control-label">เบอร์โทร</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="staff-tel" name="staff-tel" placeholder="Tel" value="<?php echo $this->data[0]['anest']['staff']['staff_tel'];?>" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                    </div>
                  </div>



                  <div class="form-group">

                      <label for="staff-permission" class="col-sm-2 control-label">สิทธิ์ใช้งาน</label>
                       <div class="col-sm-10">
                          <select class="form-control select2 ull-right" name="staff-permission" style="width: 100%;">
                                <?php 
                                        if((int)$this->data[0]['anest']['staff']['staff_permission'] == 1){
                                ?>
                                          <option value="1">Visitor</option>
                                          <option value="2">Service</option>
                                          <option value="3">Admin</option>
                                <?php 
                                        }
                                        else if((int)$this->data[0]['anest']['staff']['staff_permission'] == 2){
                                ?>
                                          <option value="2">Service</option>
                                          <option value="3">Admin</option>
                                          <option value="1">Visitor</option>
                                <?php   } 
                                        else if((int)$this->data[0]['anest']['staff']['staff_permission'] == 3){

                                ?>
                                          <option value="3">Admin</option>
                                          <option value="1">Visitor</option>
                                          <option value="2">Service</option>
                                <?php   } ?>
                  
                          </select>
                          </div>
                 
                  </div>


                   <div class="form-group">
               
                  
                      <label for="staff-department" class="col-sm-2 control-label">สังกัด</label>
                      <div class="col-sm-10">
                                               <select class="form-control select2 ull-right" name="staff-department" style="width: 100%;">
                         

                                 <option value="<?php echo (string)$this->data[1]['anest']['department_id'];?>" >
                                  <?php echo $this->data[1]['anest']['department']['department_name'];?>
                                       
                                 </option>

                                 
                                 
                          <?php  
                                    foreach($this->data1 as $value){
                          ?>      
                                  <option value="<?php echo (string)$value['anest']['department_id'];?>" >
                                    <?php echo $value['anest']['department']['department_name'];?>
                                       
                                 </option>

                          <?php  } ?>

                               
                  
                          </select>
                          </div>
                
                  </div>




                    <div class="form-group">
                    <label for="staff-tel" class="col-sm-2 control-label">เลือกรูป</label>

                    <div class="col-sm-10">
                      <input type="file" id="staff-pic" name="staff-pic">
                    </div>
                  </div>

                  

                  <input type="hidden" name="staff-id" id="staff-id" value="<?php echo (string)$this->data[0]['anest']['staff_id'];?>">


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="staff-update" id="staff-update">Update</button>
                    </div>
                  </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>




      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->