
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit room
         <small>Edit controllpanel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>room">Room</a></li>
        <li class="active">Edit room</li>
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
              <form class="form-horizontal" id="room-form" name="room-form" action="<?php echo URL;?>room/update" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="room-name" class="col-sm-2 control-label">ชื่อห้อง</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="room-name" name="room-name" placeholder="Name" value="<?php echo $this->data['anest']['room']['room_name'];?>" required>
                    </div>
                  </div>
                  
                  

                  


                    
                  

                  <input type="hidden" name="room-id" id="room-id" value="<?php echo (string)$this->data['anest']['room_id'];?>">


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="room-update" id="room-update">Update</button>
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