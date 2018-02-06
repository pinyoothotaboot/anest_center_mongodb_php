<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Group tables
        <small>Equipment group</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>group">กลุ่มเครื่องมือแพทย์</a></li>
        
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">
  <div class="row">
        <div class="col-xs-12">
    <div class="box-tools">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#groupModal" >เพิ่มกลุ่ม
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
              <h3 class="box-title">ตารางข้อมูลกลุ่มเครื่องมือแพทย์</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="group" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ชื่อกลุ่ม</th>
                  <th>จำนวนรอบการ PM</th>
                  <th>ประเภทความเสี่ยง</th>
                  <th>สถานะ</th>
              	  <th>Options</th>
                  
                </tr>
                </thead>
                <tbody>
                
                  <?php 
                        foreach ($this->data as $value) {
                        
						
                        
                ?>
                <tr>
                  <td><?php echo $value['anest']['group']['group_name']; ?></td>
                  <td><?php echo (int)$value['anest']['group']['group_pm']; ?></td>
               	  <td><?php echo $value['anest']['group']['group_risk']; ?></td>
                  <td><?php 
				  				
                          if((int)$value['anest']['group']['group_online'] == 1)
                              echo '<p><font color="green">Online</font></p>';

                          else
                              echo '<p><font color="red">Offline</font></p>';
						?>
                  
                  </td>
                  <td>
                  	<a href="<?php echo URL.'group/edit/'.(string)$value['anest']['group_id'];?>" >Edit</a> |
                    <a href="<?php echo URL.'group/delete/'.(string)$value['anest']['group_id'];?>">Delete</a>
                    
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


    <div class="modal fade" id="groupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>

        <h4> <i class="fa fa-object-group" ></i> Group</h4>
       
      </div>
      <div class="modal-body">
        <form  id="group-form" name="group-form" action="<?php echo URL;?>group/create" method="post">
          
              <div class="form-group">
              <label for="group-name" class="control-label">ชื่อกลุ่ม:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-object-group"></i>
                  </div>
                  <input type="text" class="form-control" id="group-name" name="group-name" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
              <label for="group-pm" class="control-label">จำนวนรอบการ PM ใน 1 ปี</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-h-square"></i>
                  </div>
                  <input type="number" class="form-control" id="group-pm" name="group-pm" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


              <div class="form-group">
              <label for="group-risk" class="control-label">ประเภทความเสี่ยง</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-asterisk"></i>
                  </div>
                  <input type="text" class="form-control" id="group-risk" name="group-risk" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->



        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" id="group-save" name="group-save" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>

  </div>
  
  
  
  
  