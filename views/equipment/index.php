<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Equipment tables
        <small>Equipment panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>equipment">ครุภัณฑ์</a></li>
        
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">
  <div class="row">
        <div class="col-xs-12">
    <div class="box-tools">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#equipmentModal" >เพิ่มครุภัณฑ์
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
              <table id="equipment" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SAP</th>
                 
                  <th>S/N</th>
                 
                  <th>เครื่อง</th>
                  
              
                  <th>กลุ่ม</th>
                  <th>สถานะ</th>
                  <th>Options</th>
                  
                </tr>
                </thead>
                <tbody>
                
                  <?php 

                      
                        if($this->data != 0)
                        foreach ($this->data as $value) {
                          //var_dump($value);
                  
                ?>
                <tr>
                  <td><?php echo $value['sap'];?></td>
                 
                  <td><?php echo $value['sn']; ?></td>
                  
                  <td><?php echo $value['name']; ?> </td>
                    
                  <td><?php echo $value['group']; ?> </td>

                  <td>
                      <?php 
                  
                          if((int)$value['online'] == 1)
                              echo '<p><font color="green">Online</font></p>';

                          else
                              echo '<p><font color="red">Offline</font></p>';
                      ?>
                  
                  </td>
                     
                  

                 
                 
                
                  
                
                  <td>
                    <a href="<?php echo URL.'equipment/edit/'.$value['id'];?>" >Edit</a> |
                    <a href="<?php echo URL.'equipment/delete/'.$value['id'];?>">Delete</a>
                    
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


    <div class="modal fade" id="equipmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>

        <h4> <i class="fa fa-heartbeat" ></i> Equipment</h4>
       
      </div>
      <div class="modal-body">
        <form  id="equipment-form" name="equipment-form" action="<?php echo URL;?>equipment/create" method="post" enctype="multipart/form-data">
          
         <!-- **************************************************************** -->   
        <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">ข้อมูลทั่วไป</a></li>
              <li><a href="#tab_2" data-toggle="tab">ข้อมูลเครื่อง</a></li>
              <li><a href="#tab_3" data-toggle="tab">ข้อมูลบริษัท</a></li>
              <li><a href="#tab_4" data-toggle="tab">ข้อมูลค่าเสื่อมราคา</a></li>
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">



              <div class="form-group">
            
                <div class="input-group">
                
                  <div class="input-group-addon">
                    <label for="equipment-sap" class="control-label">SAP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="number" class="form-control" id="equipment-sap" name="equipment-sap" placeholder="เลข SAP 12 หลัก" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              
             
              
              <div class="form-group">
                   
                <div class="input-group">
               
                  <div class="input-group-addon">
                  <label for="equipment-code" class="control-label">รหัสครุภัณฑ์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="text" class="form-control" id="equipment-code" name="equipment-code" placeholder="รหัสครุภัณฑ์" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


                <div class="form-group">
                   
                <div class="input-group">
               
                  <div class="input-group-addon">
                  <label for="equipment-nameTH" class="control-label">ชื่อเครื่อง(ไทย)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="text" class="form-control" id="equipment-nameTH" name="equipment-nameTH" placeholder="ชื่อเครื่อง(ไทย)" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                   
                <div class="input-group">
               
                  <div class="input-group-addon">
                  <label for="equipment-budget" class="control-label">งบจัดซื้อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="text" class="form-control" id="equipment-budget" name="equipment-budget" placeholder="งบจัดซื้อ" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                   
                <div class="input-group">
               
                  <div class="input-group-addon">
                  <label for="equipment-address" class="control-label">สถานที่ใช้งาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <select class="form-control select2 ull-right" name="equipment-building" style="width: 100%;">
                          <?php 

                                foreach($this->data1 as $value){
                                    if($value['anest']['building']['building_name'] != ''){
                          ?>
                                 <option value= "<?php echo (string)$value['anest']['building_id'];?>">
                                    <?php echo $value['anest']['building']['building_name'];?>
                                       
                                 </option>
                                 
                                <?php } }?>
                  
                          </select>
                           <select class="form-control select2 ull-right" name="equipment-floor" style="width: 100%;">
                          <?php 

                                foreach($this->data1 as $value){
                                    if($value['anest']['floor']['floor_name'] != ''){
                          ?>
                                 <option value= "<?php echo (string)$value['anest']['floor_id'];?>">
                                    <?php echo $value['anest']['floor']['floor_name'];?>
                                       
                                 </option>
                                 
                                <?php } }?>
                  
                          </select>

                           <select class="form-control select2 ull-right" name="equipment-room" style="width: 100%;">
                          <?php 

                                foreach($this->data1 as $value){
                                    if($value['anest']['room']['room_name'] != ''){
                          ?>
                                 <option value= "<?php echo (string)$value['anest']['room_id'];?>">
                                    <?php echo $value['anest']['room']['room_name'];?>
                                       
                                 </option>
                                 
                                <?php } }?>
                  
                          </select>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

                                
        <div class="form-group">
               
              <div class="input-group">
                <div class="input-group-addon">
                      <label for="equipment-begin" class="control-label">ปีที่เริ่มใช้งาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>
                        <select class="form-control select2 ull-right" name="equipment-begin" style="width: 100%;">
                                  
                                <?php 
                                          $y = (int)date('Y')+543;

                                          for($i=0;$i<30;$i++){
                                            $d = $y-$i;
                                            echo '<option value="'.$d.'">'.$d.'</option>';
                                          }
                                         
                                ?>

                                 
                                 
                             
                  
                          </select>
                 </div>
          </div>



          <div class="form-group">
               
              <div class="input-group">
                <div class="input-group-addon">
                      <label for="equipment-department" class="control-label">หน่วยงาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>
                          <select class="form-control select2 ull-right" name="equipment-department" style="width: 100%;">
                          <?php 

                                foreach($this->data1 as $value){
                                  if($value['anest']['department']['department_name'] != ''){
                          ?>
                                 <option value="<?php echo (string)$value['anest']['department_id'];?>" >
                                    <?php echo $value['anest']['department']['department_name'];?>
                                       
                                 </option>
                                 
                                <?php }} ?>
                  
                          </select>
                 </div>
            </div>


                
              </div> 
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                  
              
              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-sn" class="control-label">S/N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="text" class="form-control" id="equipment-sn" name="equipment-sn" placeholder="S/N" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-nameEN" class="control-label">ชื่อเครื่อง(อังกฤษ)&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="text" class="form-control" id="equipment-nameEN" name="equipment-nameEN" placeholder="ชื่อเครื่อง(อังกฤษ)" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-brand" class="control-label">ยี่ห้อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="text" class="form-control" id="equipment-brand" name="equipment-brand" placeholder="ยี่ห้อ" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-model" class="control-label">รุ่น&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="text" class="form-control" id="equipment-model" name="equipment-model" placeholder="รุ่น" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              
      
              
        <div class="form-group">
               
            <div class="input-group">
                <div class="input-group-addon">
                      <label for="equipment-type" class="control-label">ประเภทครุภัณฑ์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>
                          <select class="form-control select2 ull-right" name="equipment-type" style="width: 100%;">
                          <?php 

                                foreach($this->data1 as $value){
                                  if($value['anest']['type']['type_name'] != ''){
                          ?>
                                 <option value="<?php echo (string)$value['anest']['type_id'];?>" >
                                    <?php echo $value['anest']['type']['type_name'];?>
                                       
                                 </option>
                                 
                                <?php }} ?>
                  
                          </select>
                 </div>
          </div>


        <div class="form-group">
               
            <div class="input-group">
                <div class="input-group-addon">
                      <label for="equipment-group" class="control-label">กลุ่ม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>
                          <select class="form-control select2 ull-right" name="equipment-group" style="width: 100%;">
                          <?php 

                                foreach($this->data1 as $value){
                                  if($value['anest']['group']['group_name'] != ''){
                          ?>
                                 <option value="<?php echo (string)$value['anest']['group_id'];?>" >
                                    <?php echo $value['anest']['group']['group_name'];?>
                                       
                                 </option>
                                 
                                <?php } }?>
                  
                          </select>
                 </div>
          </div>


           <div class="form-group">
               
            <div class="input-group">
                <div class="input-group-addon">
                      <label for="equipment-status" class="control-label">สถานะ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>
                          <select class="form-control select2 ull-right" name="equipment-status" style="width: 100%;">
                          <?php 

                                foreach($this->data1 as $value){
                                  if($value['anest']['status']['status_name'] != ''){
                          ?>
                                 <option value="<?php echo (string)$value['anest']['status_id'];?>" >
                                    <?php echo $value['anest']['status']['status_name'];?>
                                       
                                 </option>
                                 
                                <?php }} ?>
                  
                          </select>
                 </div>
          </div>



              <div class="form-group">
                
                 <div class="input-group">
                 
                  
                        <input type="file" id="equipment-pic" name="equipment-pic" required="required">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->



              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                
            
             <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-company_name" class="control-label">ชื่อบริษัท&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="text" class="form-control" id="equipment-company_name" name="equipment-company_name" placeholder="ชื่อบริษัท" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-company_tel" class="control-label">โทรศัพท์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="tel" class="form-control" id="equipment-company_tel" name="equipment-company_tel" placeholder="โทรศัพท์" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-company_fax" class="control-label">โทรสาร&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="fax" class="form-control" id="equipment-company_fax" name="equipment-company_fax" placeholder="โทรสาร" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-company_sales" class="control-label">ผู้แทนขาย&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="text" class="form-control" id="equipment-company_sales" name="equipment-company_sales" placeholder="ผู้แทนขาย" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-company_mobile" class="control-label">เบอร์ติดต่อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="tel" class="form-control" id="equipment-company_mobile" name="equipment-company_mobile" placeholder="เบอร์ติดต่อ" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-company_waranty" class="control-label">รับประกัน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="number" class="form-control" id="equipment-company_waranty" name="equipment-company_waranty" placeholder="รับประกัน" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


   
             





              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_4">

              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-cost" class="control-label">ราคาเครื่อง&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="number" class="form-control" id="equipment-cost" name="equipment-cost" placeholder="ราคาเครื่อง" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-drop" class="control-label">ราคาซาก&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="number" class="form-control" id="equipment-drop" name="equipment-drop" placeholder="ราคาซาก" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                 
                <div class="input-group">
                 
                  <div class="input-group-addon">
                 <label for="equipment-year" class="control-label">อายุ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  </div>
                  <input type="number" class="form-control" id="equipment-year" name="equipment-year" placeholder="อายุเครื่อง" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->



              </div>


            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

        
      
      </div>
      <!-- /.row -->


          <!-- *************************************************************** -->
          
            
            
              
    
              

        
      </div>
      <div class="modal-footer">
        <button type="button" id="equipment-cancel" name="equipment-cancel" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" id="equipment-save" name="equipment-save" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>

  </div>
  
  

  
  
  