<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Equipment report tables
        <small>Report panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>report">รายงานครุภัณฑ์</a></li>
        
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">
  <div class="row">
        <div class="col-xs-12">
    <div class="box-tools">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#equipmentModal" >Export xls
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
              <h3 class="box-title">ตารางข้อมูลครุภัณฑ์</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="report" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                 
                  <th>S/N</th>
                 
                  <th>เครื่อง</th>
                  
              
                  <th>กลุ่ม</th>
                  <th>ห้อง</th>
                  <th>อายุ</th>
                  <th>ซ่อม</th>
                  <th>รายละเอียด</th>
                  
                </tr>
                </thead>
                <tbody>
                
                  <?php 

                      
                        if($this->data != 0)
                        foreach ($this->data as $value) {
                          //var_dump($value);
                  
                ?>
                <tr>
                  
                 
                  <td><?php echo $value['sn']; ?></td>
                  
                  <td><?php echo $value['name']; ?> </td>
                    
                  <td><?php echo $value['group']; ?> </td>
                  <td><?php echo $value['building'].' '.$value['floor'].' '.$value['room']; ?> </td>
                  <td>
                      <?php 
                              $now = (int)date('Y')+543;
                              echo $now-(int)$value['age']; 

                      ?> 

                  </td>
               
                <td><?php echo $value['repair']; ?> </td>
                
                  <td>
                    <a href="<?php echo URL.'report/equipment_detail/'.$value['id'];?>" >ดูรายละเอียด</a>
                   
                    
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
  

  
  
  