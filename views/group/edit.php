
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Group
         <small>Edit controllpanel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>group">Group</a></li>
        <li class="active">Edit group</li>
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
              <form class="form-horizontal" id="group-form" name="group-form" action="<?php echo URL;?>group/update" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="group-name" class="col-sm-2 control-label">ชื่อกลุ่ม</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="group-name" name="group-name" placeholder="Name" value="<?php echo $this->data['anest']['group']['group_name'];?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="group-pm" class="col-sm-2 control-label">รอบการ PM</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="group-pm" name="group-pm" placeholder="PM" value="<?php echo (int)$this->data['anest']['group']['group_pm'];?>" required >
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="group-risk" class="col-sm-2 control-label">ความเสี่ยง</label>

                    <div class="col-sm-10">
          <input type="text" class="form-control" id="group-risk" name="group-risk" placeholder="Risk" value="<?php echo $this->data['anest']['group']['group_risk'];?>" required>
                    </div>
                  </div>

                  


                    
                  

                  <input type="hidden" name="group-id" id="group-id" value="<?php echo (string)$this->data['anest']['group_id'];?>">


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="group-update" id="group-update">Update</button>
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