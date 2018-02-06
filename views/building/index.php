<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Building tables
        <small>building panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>building">อาคาร</a></li>
        
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">
  <div class="row">
        <div class="col-xs-12">
    <div class="box-tools">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buildingModal" >เพิ่มอาคาร
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
              <h3 class="box-title">ตารางข้อมูลอาคาร</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="building" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ชื่ออาคาร</th>
                 
                  <th>สถานะ</th>
              	  <th>Options</th>
                  
                </tr>
                </thead>
                <tbody>
                
                  <?php 

                

                        foreach ($this->data as $value) {
          
          //print_r($value['anest']);
                ?>
                <tr>
                  <td><?php echo $value['anest']['building']['building_name']; ?></td>
                 
               	
                  <td><?php 
				  				
                          if((int)$value['anest']['building']['building_online'] == 1)
                              echo '<p><font color="green">Online</font></p>';

                          else
                              echo '<p><font color="red">Offline</font></p>';
						?>
                  
                  </td>
                  <td>
                  	<a href="<?php echo URL.'building/edit/'.(string)$value['anest']['building_id'];?>" >Edit</a> |
                    <a href="<?php echo URL.'building/delete/'.(string)$value['anest']['building_id'];?>">Delete</a>
                    
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


    <div class="modal fade" id="buildingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>

        <h4> <i class="fa fa-object-group" ></i> Building</h4>
       
      </div>
      <div class="modal-body">
        <form  id="building-form" name="building-form" action="<?php echo URL;?>building/create" method="post">
          
              <div class="form-group">
              <label for="building-name" class="control-label">ชื่ออาคาร:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-object-group"></i>
                  </div>
                  <input type="text" class="form-control" id="building-name" name="building-name" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              




        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" id="building-save" name="building-save" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>

  </div>
  
  
  
  
  