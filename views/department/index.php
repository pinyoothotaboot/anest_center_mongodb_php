<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Department tables
        <small>Department panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>department">ภาควิชาหรือหน่วยงาน</a></li>
        
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">
  <div class="row">
        <div class="col-xs-12">
    <div class="box-tools">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#departmentModal" >เพิ่มหน่วยงาน
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
              <h3 class="box-title">ตารางข้อมูลภาควิชาหรือหน่วยงาน</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="department" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ภาควิชา</th>
                  <th>หัวหน้าหน่วยงาน</th>
                  <th>ผู้ประสานงาน</th>
                  <th>เบอร์ติดต่อ</th>
                  <th>สถานะ</th>
              	  <th>Options</th>
                  
                </tr>
                </thead>
                <tbody>
                
                  <?php 

                    

                        foreach ($this->data as $value) {
                        
                     
                       
                    
                        
                ?>
                <tr>
                  <td><?php echo $value['anest']['department']['department_name']; ?></td>
                  <td><?php echo $value['anest']['department']['department_boss']; ?></td>
                  <td><?php echo $value['anest']['department']['department_contact']; ?></td>
                  <td><?php echo $value['anest']['department']['department_tel']; ?></td>
               	
                  <td><?php 
				  				        
                          if((int)$value['anest']['department']['department_online'] == 1)
                              echo '<p><font color="green">Online</font></p>';

                          else 
                              echo '<p><font color="red">Offline</font></p>';
						?>
                  
                  </td>
                  <td>
                  

                  	<a href="<?php echo URL.'department/edit/'.(string)$value['anest']['department_id'];?>" >Edit</a> |
                    <a href="<?php echo URL.'department/delete/'.(string)$value['anest']['department_id'];?>">Delete</a>
                    
                  </td>
                
             
                </tr>
               <?php }
                ?>
            
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


    <div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>

        <h4> <i class="fa fa-object-group" ></i> Department</h4>
       
      </div>
      <div class="modal-body">
        <form  id="department-form" name="department-form" action="<?php echo URL;?>department/create" method="post">
          
              <div class="form-group">
              <label for="department-name" class="control-label">ชื่อภาควิชา:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-object-group"></i>
                  </div>
                  <input type="text" class="form-control" id="department-name" name="department-name" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              
             
              <div class="form-group">
              <label for="department-boss" class="control-label">ชื่อหัวหน้าภาคฯ:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-object-group"></i>
                  </div>
                  <input type="text" class="form-control" id="department-boss" name="department-boss" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              
              <div class="form-group">
              <label for="department-contact" class="control-label">ชื่อผู้ประสานงานภาคฯ:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-object-group"></i>
                  </div>
                  <input type="text" class="form-control" id="department-contact" name="department-contact" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              
              <div class="form-group">
              <label for="department-tel" class="control-label">เบอร์ติดต่อ:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-object-group"></i>
                  </div>
                  <input type="text" class="form-control" id="department-tel" name="department-tel" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->




        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" id="department-save" name="department-save" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>

  </div>
  
  
  
  
  