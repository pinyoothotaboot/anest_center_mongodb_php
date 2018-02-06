

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Back
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>repair">งานซ่อมครุภัณฑ์</a></li>
        <li><a href="<?php echo URL;?>repair/approve">อนุมัติซ่อม</a></li>
        <li><a href="<?php echo URL;?>repair/back">ตรวจรับ</a></li>
        <li><a href="">back</a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

 


      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-photo" src=" <?php echo URL;?>publics/images/equipments/<?php 

                 

                    if($this->data['equipment_pic'] != NULL)
                        echo $this->data['equipment_pic'];
                    else 
                        echo 'avatar5.png';

              ?>" 
              alt="User profile picture">

              
              <h3 class="profile-username text-center"><?php echo $this->data['equipment_sn'];?></h3>

              <p class="text-muted text-center"><?php echo $this->data['equipment_name'];?></p>


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
              <h3 class="box-title">Back</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" id="repair-form" name="repair-form" action="<?php echo URL;?>repair/back_update" method="POST">
                  <div class="form-group">
                    <label for="equipment-name" class="col-sm-2 control-label">ครุภัณฑ์</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="equipment-name" name="equipment-name" placeholder="Name" value="<?php echo $this->data['equipment_name'];?>" disabled="disabled">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="date-send" class="col-sm-2 control-label">วันที่แจ้งซ่อม</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="date-send" name="date-send" placeholder="Name" value="<?php echo date('d-M-Y ', $this->data['repair_send']->sec);?>" disabled="disabled">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="problem-send" class="col-sm-2 control-label">สาเหตุที่แจ้งซ่อม</label>

                    <div class="col-sm-10">
                      <input type="textarea" class="form-control" id="problem-send" name="problem-send" placeholder="Name" value="<?php echo $this->data['problem'];?>" disabled="disabled">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="staff-send" class="col-sm-2 control-label">ผู้ตรวจรับ</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="staff-back" name="staff-back" placeholder="Name" value="นายภิญญู โทตบุตร" disabled="disabled">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="back-date" class="col-sm-2 control-label">วันที่ตรวจรับ</label>

                    <div class="col-sm-10">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="back-date" placeholder="วันที่รับกลับ" required>
                    </div>
                <!-- /.input group -->
                  </div>
                </div>





                   <div class="form-group">
                    <label for="repair-note" class="col-sm-2 control-label">การแก้ไข</label>

                    <div class="col-sm-10">
                      <input type="textarea" class="form-control" id="repair-improvement" name="repair-improvement" placeholder="การแก้ไข" required>
                    </div>
                  </div>


                   <div class="form-group">
                    <label for="repair-note" class="col-sm-2 control-label">ค่าซ่อม</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="repair-cost" name="repair-cost" placeholder="0" required>
                    </div>
                  </div>


                  

    <input type="hidden" name="repair-id" id="repair-id" value="<?php echo (string)$this->data['repair_id'];?>">
    


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="back-save" id="back-save">Update</button>
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