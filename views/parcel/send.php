

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Parcel
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>parcel">งานส่งคืนครุภัณฑ์</a></li>
        <li><a href="">ส่งคืนพัสดุ</a></li>
        

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

                 

                    if($this->data['pic'] != NULL)
                        echo $this->data['pic'];
                    else 
                        echo 'avatar5.png';

              ?>" 
              alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $this->data['sn'];?></h3>

              <p class="text-muted text-center"><?php echo $this->data['name'];?></p>


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
              <h3 class="box-title">Return</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" id="parcel-form" name="parcel-form" action="<?php echo URL;?>parcel/send_parcel" method="POST" >
                  <div class="form-group">
                    <label for="equipment-name" class="col-sm-2 control-label">ครุภัณฑ์</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="equipment-name" name="equipment-name" placeholder="Name" value="<?php echo $this->data['name'];?>" disabled="disabled">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="staff-change" class="col-sm-2 control-label">ผู้ส่งคืน</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="staff-parcel" name="staff-parcel" placeholder="Name" value="<?php echo Session::get('user_name');?>" disabled="disabled">
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <label for="parcel-date" class="col-sm-2 control-label">วันที่แจ้ง</label>

                    <div class="col-sm-10">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="parcel-date" placeholder="วันที่แจ้งส่งคืน" required>
                    </div>
                <!-- /.input group -->
                  </div>
                </div>



                  <div class="form-group">
                    <label for="parcel-note" class="col-sm-2 control-label">เหตุผล</label>

                    <div class="col-sm-10">
                      <input type="textarea" class="form-control" id="parcel-note" name="parcel-note" placeholder="เหตุผลที่ส่งคืนพัสดุ" required>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="parcel-accessories" class="col-sm-2 control-label">อุปกรณ์พ่วง</label>

                    <div class="col-sm-10">
                      <input type="textarea" class="form-control" id="parcel-accessories" name="parcel-accessories" placeholder="อุปกรณ์ต่อพ่วง">
                    </div>
                  </div>
              

                  
    

    <input type="hidden" name="equipment-id" id="equipment-id" value="<?php echo (string)$this->data['id'];?>">
    <input type="hidden" name="staff-id" id="staff-id" value="57c4f8d0d702891902cea31f">

              <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="parcel-save" id="parcel-save">Save</button>
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