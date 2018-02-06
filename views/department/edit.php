
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit department
         <small>Edit controllpanel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>department">Department</a></li>
        <li class="active">Edit department</li>
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
              <form class="form-horizontal" id="department-form" name="department-form" action="<?php echo URL;?>department/update" method="POST" enctype="multipart/form-data">
                  
                  <div class="form-group">
                    <label for="department-name" class="col-sm-2 control-label">ชื่อภาคฯ</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="department-name" name="department-name" placeholder="Name department" value="<?php echo $this->data['anest']['department']['department_name'];?>" required>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="department-boss" class="col-sm-2 control-label">หัวหน้าภาคฯ</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="department-boss" name="department-boss" placeholder="Name boss" value="<?php echo $this->data['anest']['department']['department_boss'];?>" required>
                    </div>
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <label for="department-contact" class="col-sm-2 control-label">ผู้ประสานงาน</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="department-contact" name="department-contact" placeholder="Contact" value="<?php echo $this->data['anest']['department']['department_contact'];?>" required>
                    </div>
                  </div>

                  
                  
                  <div class="form-group">
                    <label for="department-tel" class="col-sm-2 control-label">เบอร์ติดต่อ</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="department-tel" name="department-tel" placeholder="Tel" value="<?php echo $this->data['anest']['department']['department_tel'];?>" required>
                    </div>
                  </div>


                    
                  

                  <input type="hidden" name="department-id" id="department-id" value="<?php echo (string)$this->data['anest']['department_id'];?>">


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" name="department-update" id="department-update">Update</button>
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