

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Switch
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>change">งานสลับเปลี่ยนครุภัณฑ์</a></li>
        <li><a href="">สลับเปลี่ยน</a></li>
        

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
              <h3 class="box-title">Change</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" id="change-form" name="change-form" action="<?php echo URL;?>change/send_change" method="POST" >
                  <div class="form-group">
                    <label for="equipment-name" class="col-sm-2 control-label">ครุภัณฑ์</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="equipment-name" name="equipment-name" placeholder="Name" value="<?php echo $this->data['name'];?>" disabled="disabled">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="staff-change" class="col-sm-2 control-label">ผู้สลับ</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="staff-change" name="staff-change" placeholder="Name" value="<?php echo Session::get('user_name');?>" disabled="disabled">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="old-change" class="col-sm-2 control-label">ก่อนสลับ</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="old-change" name="old-change" placeholder="สถานที่เดิม" value="<?php echo $this->data['building']['name'].' '.$this->data['floor']['name'].' '.$this->data['room']['name']; ?>" disabled="disabled">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="repair-date" class="col-sm-2 control-label">วันที่สลับ</label>

                    <div class="col-sm-10">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="change-date" placeholder="วันที่สลับ" required>
                    </div>
                <!-- /.input group -->
                  </div>
                </div>



                  <div class="form-group">
                    <label for="change-note" class="col-sm-2 control-label">เหตุผล</label>

                    <div class="col-sm-10">
                      <input type="textarea" class="form-control" id="change-note" name="change-note" placeholder="เหตุผลที่สลับ">
                    </div>
                  </div>
              

                   <div class="form-group">
               
                  
                      <label for="repair-failure" class="col-sm-2 control-label">อาคาร/ตึก</label>
                      <div class="col-sm-10">
                        <select class="form-control select2 ull-right" name="building-change" style="width: 100%;">
  
                          <?php  

                                    foreach($this->data1 as $value){
                                      if((string)$value['anest']['building_id']!= ''){
                          ?>      
                                  <option value="<?php echo (string)$value['anest']['building_id'];?>" >
                                    <?php echo $value['anest']['building']['building_name'];?>
                                       
                                 </option>

                          <?php  } }?>

                          </select>


                          </div>
                
                    </div>

                    <div class="form-group">
               
                  
                      <label for="repair-failure" class="col-sm-2 control-label">ชั้น</label>
                      <div class="col-sm-10">
                        <select class="form-control select2 ull-right" name="floor-change" style="width: 100%;">
  
                          <?php  

                                    foreach($this->data1 as $value){
                                      if((string)$value['anest']['floor_id']!=''){
                          ?>      
                                  <option value="<?php echo (string)$value['anest']['floor_id'];?>" >
                                    <?php echo $value['anest']['floor']['floor_name'];?>
                                       
                                 </option>

                          <?php  } }?>

                          </select>


                          </div>
                
                    </div>

                    <div class="form-group">
               
                  
                      <label for="repair-failure" class="col-sm-2 control-label">ห้อง</label>
                      <div class="col-sm-10">
                        <select class="form-control select2 ull-right" name="room-change" style="width: 100%;">
  
                          <?php  

                                    foreach($this->data1 as $value){
                                      if((string)$value['anest']['room_id']!=''){
                          ?>      
                                  <option value="<?php echo (string)$value['anest']['room_id'];?>" >
                                    <?php echo $value['anest']['room']['room_name'];?>
                                       
                                 </option>

                          <?php  } }?>

                          </select>


                          </div>
                
                    </div>
    

    <input type="hidden" name="equipment-id" id="equipment-id" value="<?php echo (string)$this->data['id'];?>">
    <input type="hidden" name="staff-id" id="staff-id" value="57c4f8d0d702891902cea31f">
    <input type="hidden" name="old-building" value="<?php echo (string)$this->data['building']['id'];?>">
    <input type="hidden" name="old-floor" value="<?php echo (string)$this->data['floor']['id'];?>">
    <input type="hidden" name="old-room" value="<?php echo (string)$this->data['room']['id'];?>">


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="change-save" id="change-save">Save</button>
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