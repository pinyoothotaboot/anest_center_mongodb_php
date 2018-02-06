
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit problem
         <small>Edit controllpanel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>problem">Problem</a></li>
        <li class="active">Edit problem</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      


        <div class="col-md-9">



          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit
              
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" id="problem-form" name="problem-form" action="<?php echo URL;?>problem/update" method="POST" >
                  <div class="form-group">
                    <label for="problem-name" class="col-sm-2 control-label">ปัญหา</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="problem-name" name="problem-name" placeholder="Problem" value="<?php echo $this->data[0]['anest']['problem']['problem_name'];?>" required>
                    </div>
                  </div>
                  
                  
                   <div class="form-group">
               
                  
                      <label for="problem-group" class="col-sm-2 control-label">กลุ่ม</label>
                      <div class="col-sm-10">
                          <select class="form-control select2 ull-right" name="problem-group" style="width: 100%;">
                         

                                 <option value="<?php echo (string)$this->data[1]['anest']['group_id'];?>" >
                                  <?php echo $this->data[1]['anest']['group']['group_name'];?>
                                       
                                 </option>

                                 
                                 
                              <?php  
                                    foreach($this->data1 as $value){
                                ?>      
                                  <option value="<?php echo (string)$value['anest']['group_id'];?>" >
                                    <?php echo $value['anest']['group']['group_name'];?>
                                       
                                 </option>

                          <?php  } ?>

                               
                  
                          </select>
                          </div>
                
                  </div>
                  


                    
                  
<input type="hidden" name="problem-id" id="problem-id" value="<?php echo (string)$this->data[0]['anest']['problem_id'];?>">


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="problem-update" id="problem-update">Update</button>
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