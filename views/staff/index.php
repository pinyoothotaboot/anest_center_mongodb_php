<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff tables
        <small>Staff panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>staff">บุคลากร</a></li>
        
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">
  <div class="row">
        <div class="col-xs-12">
    <div class="box-tools">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staffModal" >เพิ่มบุคลากร
          </button>
        </div>

    </div>
    </div>
    </div>
    </br>

   

      <div class="row">
        <div class="col-xs-12">
          
           

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">ตารางข้อมูลบุคลากร</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="staff" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ชื่อ-สกุล</th>
                 
                  <th>สังกัด</th>
                 
                  <th>สิทธิ์ใช้งาน</th>
                  <th>การเข้าใช้</th>
                  <th>สถานะ</th>
              	  <th>Options</th>
                  
                </tr>
                </thead>
                <tbody>
                
                  <?php 

                      //print_r($this->data);
                        if($this->data != 0)
                        foreach ($this->data as $value) {
                  
                ?>
                <tr>
                  <td><?php echo $value['name'];       ?></td>
                 
                  <td><?php echo $value['department']; ?></td>
                  
                  <td><?php echo $value['permission']; ?>
                    
                  </td>
              
                  

                  <td>
                      <?php 
                  
                          if((int)$value['online'] == 1)
                              echo '<p><font color="green">Online</font></p>';

                          else
                              echo '<p><font color="red">Offline</font></p>';
                      ?>
                  
                  </td>
                     
                  

                  <td>
                      <?php 
                  
                          if((int)$value['status'] == 1)
                              echo '<p><font color="green">Active</font></p>';

                          else
                              echo '<p><font color="red">Inactive</font></p>';
                      ?>
                  
                  </td>
                 
                 
                
                  
                
                  <td>
                    <a href="<?php echo URL.'staff/edit/'.$value['id'];?>" >Edit</a> |
                    <a href="<?php echo URL.'staff/delete/'.$value['id'];?>">Delete</a>
                    
                  </td>
                
             
                </tr>
               <?php } ?>
            
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


    <div class="modal fade" id="staffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>

        <h4> <i class="fa fa-users" ></i> Staff</h4>
       
      </div>
      <div class="modal-body">
        <form  id="staff-form" name="staff-form" action="<?php echo URL;?>staff/create" method="post" enctype="multipart/form-data">
          
          
              <div class="form-group">
            
                <div class="input-group">
                
                  <div class="input-group-addon">
                    <label for="staff-name" class="control-label">ชื่อ-สกุล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="text" class="form-control" id="staff-name" name="staff-name" placeholder="ชื่อ-สกุล" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              
             
              
                  <div class="form-group">
                   
                <div class="input-group">
               
                  <div class="input-group-addon">
                  <label for="staff-position" class="control-label">ตำแหน่ง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="text" class="form-control" id="staff-position" name="staff-position" placeholder="ตำแหน่ง" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              
              
                  <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="staff-email" class="control-label">อีเมลล์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="email" class="form-control" id="staff-email" name="staff-email" placeholder="อีเมลล์" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              
      
              
            <div class="form-group">
               
            <div class="input-group">
                <div class="input-group-addon">
                      <label for="staff-department" class="control-label">สังกัด&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>
                          <select class="form-control select2 ull-right" name="staff-department" style="width: 100%;">
                         	<?php 

										            foreach($this->data1 as $value){
							?>
                                 <option value="<?php echo (string)$value['anest']['department_id'];?>" >
                                 		<?php echo $value['anest']['department']['department_name'];?>
                                       
                                 </option>
                                 
                                <?php } ?>
                  
                          </select>
                 </div>
        	</div>

              
			<div class="form-group">
               
            <div class="input-group">
                <div class="input-group-addon">
                      <label for="staff-permission" class="control-label">สิทธิ์ใช้งาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>
                          <select class="form-control select2 ull-right" name="staff-permission" style="width: 100%;">
                                 <option value="1">Visitor</option>
                                 <option value="2">Service</option>
                                 <option value="3">Admin</option>
                                 
                  
                          </select>
                 </div>
        	</div>
            
             <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="staff-pass" class="control-label">รหัสผ่าน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="password" class="form-control" id="staff-pass" name="staff-pass" placeholder="รหัสผ่าน" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->



   
             <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="staff-cpass" class="control-label">ยืนยันรหัสผ่าน</label>
                    
                  </div>
                  <input type="password" class="form-control" id="staff-cpass" name="staff-cpass" placeholder="ยืนยันรหัสผ่าน" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


   <div class="form-group">
                
                <div class="input-group">
                 
                  
               <input type="file" id="staff-pic" name="staff-pic" required="required">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              

        
      </div>
      <div class="modal-footer">
        <button type="button" id="staff-cancel" name="staff-cancel" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" id="staff-save" name="staff-save" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>

  </div>
  
  

  
  
  