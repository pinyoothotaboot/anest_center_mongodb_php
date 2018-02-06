<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Repair tables
        <small>Controlpanel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">งานซ่อมครุภัณฑ์</a></li>
              </ol>
    </section>

    <!-- Main content -->


    <section class="content">


      <div class="row">
        <div class="col-xs-12">
          
           

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">ตารางข้อมูลครุภัณฑ์</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="repair" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SAP</th>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Group</th>
                  <th>Room</th>
              	  <th>Options</th>
                  
                </tr>
                </thead>
                <tbody>
                 <?php 

                        if($this->data != 0)
                        foreach ($this->data as $value) {
                  
                ?>
                <tr>
                <td><?php echo $value['sap'];?></td>
                <td><?php echo $value['sn'];?></td>
                <td><?php echo $value['name'];?></td>  
                <td><?php echo $value['group'];?></td>
                <td><?php echo $value['building'].' '.$value['floor'].' '.$value['room'];?></td>
                 
                  <td>
                  	<a href="<?php echo URL.'repair/send/'.(string)$value['id'];?>" >แจ้งซ่อม</a>
                    
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
</div>
  
  
  
  
  