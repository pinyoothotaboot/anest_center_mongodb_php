

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Send repair
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>repair">งานซ่อมครุภัณฑ์</a></li>
        <li><a href="">แจ้งซ่อม</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

 


      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src=" <?php echo URL;?>publics/images/equipments/<?php 

                 

                    if($this->data[0]['anest']['equipment']['pic_name'] != NULL)
                        echo $this->data[0]['anest']['equipment']['pic_name'];
                    else 
                        echo 'avatar5.png';

              ?>" 
              alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $this->data[0]['anest']['equipment']['equipment_sap'];?></h3>

              <p class="text-muted text-center"><?php echo $this->data[0]['anest']['equipment']['equipment_nameEN'];?></p>


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
              <h3 class="box-title">Send</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" id="repair-form" name="repair-form" action="<?php echo URL;?>repair/send_repair" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="equipment-name" class="col-sm-2 control-label">ครุภัณฑ์</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="equipment-name" name="equipment-name" placeholder="Name" value="<?php echo $this->data[0]['anest']['equipment']['equipment_nameTH'];?>" disabled="disabled">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="staff-send" class="col-sm-2 control-label">ผู้แจ้ง</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="staff-send" name="staff-send" placeholder="Email" value="<?php echo Session::get('user_name');?>" disabled="disabled">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="repair-date" class="col-sm-2 control-label">วันที่แจ้ง</label>

                    <div class="col-sm-10">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="repair-date" placeholder="วันที่แจ้งซ่อม" required>
                    </div>
                <!-- /.input group -->
                  </div>
                </div>


                   <div class="form-group">
                    <label for="repair-service" class="col-sm-2 control-label">หน่วยงานซ่อม</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="repair-service" name="repair-service" placeholder="หน่วยงานรับซ่อม" required>
                    </div>
                  </div>



                 

                   <div class="form-group">
               
                  
                      <label for="repair-failure" class="col-sm-2 control-label">สาเหตุ</label>
                      <div class="col-sm-10">
                        <select class="form-control select2 ull-right" name="repair-failure" style="width: 100%;">
                         

                                 
                                 
                          <?php  

                                    foreach($this->data[1] as $value){
                          ?>      
                                  <option value="<?php echo (string)$value['anest']['problem_id'];?>" >
                                    <?php echo $value['anest']['problem']['problem_name'];?>
                                       
                                 </option>

                          <?php  } ?>

                               
                  
                          </select>
                          </div>
                
                  </div>


                   <div class="form-group">
                    <label for="repair-note" class="col-sm-2 control-label">เพิ่มเติม</label>

                    <div class="col-sm-10">
                      <input type="textarea" class="form-control" id="repair-note" name="repair-note" placeholder="อธิบายเพิ่มเติม">
                    </div>
                  </div>



                    <div class="form-group">
                    <label for="repair-pic" class="col-sm-2 control-label">เลือกรูป</label>

                    <div class="col-sm-10">
                      <input type="file" id="repair-pic" name="repair-pic">
                    </div>
                  </div>

                  

    <input type="hidden" name="equipment-id" id="equipment-id" value="<?php echo (string)$this->data[0]['anest']['equipment_id'];?>">
    <input type="hidden" name="staff-id" id="staff-id" value="<?php echo Session::get('user_id');?>">


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="repair-save" id="repair-save">Save</button>
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