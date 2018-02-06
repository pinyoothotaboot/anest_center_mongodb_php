<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Room tables
        <small>Room panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>room">ห้อง</a></li>
        
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">
  <div class="row">
        <div class="col-xs-12">
    <div class="box-tools">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#roomModal" >เพิ่มห้อง
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
              <h3 class="box-title">ตารางข้อมูลห้อง</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="room" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ชื่อห้อง</th>
                 
                  <th>สถานะ</th>
              	  <th>Options</th>
                  
                </tr>
                </thead>
                <tbody>
                
                  <?php 

                    //print_r($this->data['retval']);

                        foreach ($this->data as $value) {
                     
						
                        
                ?>
                <tr>
                  <td><?php echo $value['anest']['room']['room_name']; ?></td>
                 
               	
                  <td><?php 
				  				
                          if((int)$value['anest']['room']['room_online'] == 1)
                              echo '<p><font color="green">Online</font></p>';

                          else
                              echo '<p><font color="red">Offline</font></p>';
						?>
                  
                  </td>
                  <td>
                  	<a href="<?php echo URL.'room/edit/'.(string)$value['anest']['room_id'];?>" >Edit</a> |
                    <a href="<?php echo URL.'room/delete/'.(string)$value['anest']['room_id'];?>">Delete</a>
                    
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


    <div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>

        <h4> <i class="fa fa-object-group" ></i> Room</h4>
       
      </div>
      <div class="modal-body">
        <form  id="room-form" name="room-form" action="<?php echo URL;?>room/create" method="post">
          
              <div class="form-group">
              <label for="room-name" class="control-label">ชื่อห้อง:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-object-group"></i>
                  </div>
                  <input type="text" class="form-control" id="room-name" name="room-name" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              




        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" id="room-save" name="room-save" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>

  </div>
  
  
  
  
  