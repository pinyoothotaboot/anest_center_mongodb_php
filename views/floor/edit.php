
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit floor
         <small>Edit controllpanel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>floor">Floor</a></li>
        <li class="active">Edit floor</li>
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
              <form class="form-horizontal" id="floor-form" name="floor-form" action="<?php echo URL;?>floor/update" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="floor-name" class="col-sm-2 control-label">ชื่อชั้น</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="floor-name" name="floor-name" placeholder="Name" value="<?php echo $this->data['anest']['floor']['floor_name'];?>" required>
                    </div>
                  </div>
                  
                  

                  


                    
                  

                  <input type="hidden" name="floor-id" id="floor-id" value="<?php echo (string)$this->data['anest']['floor_id'];?>">


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="floor-update" id="floor-update">Update</button>
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