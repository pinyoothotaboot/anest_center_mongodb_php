
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit building
         <small>Edit controllpanel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>building">Building</a></li>
        <li class="active">Edit building</li>
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
            
              <form class="form-horizontal" id="building-form" name="building-form" action="<?php echo URL;?>building/update" method="POST" enctype="multipart/form-data">
                  
                  <div class="form-group">
                    <label for="building-name" class="col-sm-2 control-label">ชื่ออาคาร</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="building-name" name="building-name" placeholder="Name" value="<?php echo $this->data['anest']['building']['building_name'];?>" required>
                    </div>
                  </div>
                  
                  

                  


                    
                  

 <input type="hidden" name="building-id" id="building-id" value="<?php echo (string)$this->data['anest']['building_id'];?>">


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="building-update" id="building-update">Update</button>
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