<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Problem tables
        <small>Controlpanel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>problem">เกี่ยวกับปัญหา</a></li>
        
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">
  <div class="row">
        <div class="col-xs-12">
    <div class="box-tools">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#problemModal" >เพิ่มข้อมูล
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
              <h3 class="box-title">ตารางข้อมูลปัญหา</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="problem" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ปัญหา</th>
                  <th>กลุ่ม</th>
                  
                  <th>สถานะ</th>
              	  <th>Options</th>
                  
                </tr>
                </thead>
                <tbody>
                
                  <?php 

                      // /var_dump($this->data);
                        if($this->data != 0)
                        foreach ($this->data as $value) {
                        
                  ?>
                <tr>
                  <td><?php echo $value['name'] ?></td>
                  <td><?php echo $value['group'] ?></td>
               
                  <td><?php 
				  				
                          if((int)$value['online'] == 1)
                             echo '<p><font color="green">Online</font></p>';

                          else
                              echo '<p><font color="red">Offline</font></p>';
						          ?>
          
                  
                  </td>
                  <td>
                  	<a href="<?php echo URL.'problem/edit/'.(string)$value['id'];?>" >Edit</a> |
                    <a href="<?php echo URL.'problem/delete/'.(string)$value['id'];?>">Delete</a>
                    
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


    <div class="modal fade" id="problemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>

        <h4> <i class="fa fa-object-group" ></i> Problem</h4>
       
      </div>
      <div class="modal-body">

        <form  id="problem-form" name="problem-form" action="<?php echo URL;?>problem/create" method="post">
          
              <div class="form-group">
             
                <div class="input-group">
                  <div class="input-group-addon">
                    <label for="problem-name" class="control-label">ปัญหา</label>
                  </div>
                  <input type="text" class="form-control" id="problem-name" name="problem-name" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->



            <div class="form-group">
               
            <div class="input-group">
                <div class="input-group-addon">
                      <label for="problem-group" class="control-label">กลุ่ม&nbsp;&nbsp;&nbsp;</label>
                        </div>
                          <select class="form-control select2 ull-right" name="problem-group" style="width: 100%;">
                          <?php 

                                foreach($this->data1 as $value){
              ?>
                                 <option value="<?php echo (string)$value['anest']['group_id'];?>" >
                                    <?php echo $value['anest']['group']['group_name'];?>
                                       
                                 </option>
                                 
                                <?php } ?>
                  
                          </select>
                 </div>
          </div>

              


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" id="problem-save" name="problem-save" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>

  </div>
  
  
  
  
  