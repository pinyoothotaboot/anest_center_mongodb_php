

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Equipment profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>equipment">Equipment</a></li>
        <li class="active">Equipment profile</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src=" <?php echo URL;?>publics/images/equipments/<?php 

                 

                    if($this->data[0]['anest']['equipment']['pic_name'] != NULL)
                        echo $this->data[0]['anest']['equipment']['pic_name'];
                    else 
                        echo 'avatar5.png';

              ?>" 
              alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $this->data[0]['anest']['equipment']['equipment_nameEN'];?></h3>

              <p class="text-muted text-center"><?php echo $this->data[0]['anest']['equipment']['equipment_sap'];?></p>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- /.col -->

  <div class="col-md-9">
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About equipment</h3>
          </div>
           
           <div class="row">
              <div class="col-md-12">
          <div class="box-body">
              <form class="form-horizontal" id="equipment-form" name="equipment-form" action="<?php echo URL;?>equipment/update" method="POST" enctype="multipart/form-data">

                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">ข้อมูลทั่วไป</a></li>
                    <li><a href="#tab_2" data-toggle="tab">ข้อมูลเครื่อง</a></li>
                    <li><a href="#tab_3" data-toggle="tab">ข้อมูลบริษัท</a></li>
                    <li><a href="#tab_4" data-toggle="tab">ข้อมูลค่าเสื่อมราคา</a></li>
                  </ul>

                <div class="tab-content">

                <div class="tab-pane active" id="tab_1">

                
                    <div class="box-body">
                    <!-- ------------------------------------------------------------------- -->
                        <div class="form-group">
            
                            <div class="input-group">
                
                                <div class="input-group-addon">
                                  <label for="equipment-sap" class="control-label">SAP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                                </div>
                                  <input type="number" class="form-control" id="equipment-sap" name="equipment-sap" placeholder="เลข SAP 12 หลัก" value="<?php echo $this->data[0]['anest']['equipment']['equipment_sap']?>" required>
                            </div>
                
                        </div>
                    
                <!-- -------------------------------------------------------------------- -->

                     <div class="form-group">
                   
                          <div class="input-group">
               
                              <div class="input-group-addon">
                                <label for="equipment-code" class="control-label">รหัสครุภัณฑ์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                              </div>
                                <input type="text" class="form-control" id="equipment-code" name="equipment-code" placeholder="รหัสครุภัณฑ์" value="<?php echo $this->data[0]['anest']['equipment']['equipment_code']?>" required>
                        </div>
              
                    </div>
              
                <!-- -------------------------------------------------------------------- -->

                    <div class="form-group">
                   
                        <div class="input-group">
               
                            <div class="input-group-addon">
                              <label for="equipment-nameTH" class="control-label">ชื่อเครื่อง(ไทย)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>                    
                            </div>
                              <input type="text" class="form-control" id="equipment-nameTH" name="equipment-nameTH" placeholder="ชื่อเครื่อง(ไทย)" value="<?php echo $this->data[0]['anest']['equipment']['equipment_nameTH']?>" required>
                        </div>
                
                    </div>
                <!-- -------------------------------------------------------------------- -->

                    <div class="form-group">
                   
                        <div class="input-group">
               
                            <div class="input-group-addon">
                              <label for="equipment-budget" class="control-label">งบจัดซื้อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                            </div>
                              <input type="text" class="form-control" id="equipment-budget" name="equipment-budget" placeholder="งบจัดซื้อ" value="<?php echo $this->data[0]['anest']['equipment']['equipment_budget']?>" required>
                        </div>
                
                    </div>
                <!-- -------------------------------------------------------------------- -->

                    <div class="form-group">
                   
                        <div class="input-group">
               
                            <div class="input-group-addon">
                              <label for="equipment-address" class="control-label">สถานที่ใช้งาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                            </div>
                              <select class="form-control select2 ull-right" name="equipment-building" style="width: 100%;" required="">
                              <option value="<?php echo (string)$this->data[1]['building']['id'];?>"><?php echo $this->data[1]['building']['name']?>
                                
                              </option>

                                  <?php 

                                  foreach($this->data1 as $value){
                                    if($value['anest']['building']['building_name'] != ''){
                                  ?>
                                 <option value= "<?php echo (string)$value['anest']['building_id'];?>">
                                    <?php echo $value['anest']['building']['building_name'];?>
                                       
                                 </option>
                                 
                                <?php } }?>
                  
                              </select>
                              <select class="form-control select2 ull-right" name="equipment-floor" style="width: 100%;" required="">
                                  <option value="<?php echo (string)$this->data[1]['floor']['id'];?>"><?php echo $this->data[1]['floor']['name']?>
                                
                                  </option>
                                  <?php 

                                    foreach($this->data1 as $value){
                                        if($value['anest']['floor']['floor_name'] != ''){
                                  ?>
                                  <option value= "<?php echo (string)$value['anest']['floor_id'];?>">
                                    <?php echo $value['anest']['floor']['floor_name'];?>
                                       
                                  </option>
                                 
                                  <?php } }?>
                  
                              </select>

                              <select class="form-control select2 ull-right" name="equipment-room" style="width: 100%;" required="">
                                  <option value="<?php echo (string)$this->data[1]['room']['id'];?>"><?php echo $this->data[1]['room']['name']?>
                                
                                  </option>
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
              <!-- -------------------------------------------------------------------- -->

                 <div class="form-group">
               
                      <div class="input-group">
                          <div class="input-group-addon">
                            <label for="equipment-begin" class="control-label">ปีที่เริ่มใช้งาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          </div>
                            <select class="form-control select2 ull-right" name="equipment-begin" style="width: 100%;">
                            
                              <option value="<?php echo $this->data[0]['anest']['equipment']['equipment_begin'];?>"><?php echo $this->data[0]['anest']['equipment']['equipment_begin'];?></option>
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
             <!-- -------------------------------------------------------------------- -->

                   <div class="form-group">
               
                      <div class="input-group">
                          <div class="input-group-addon">
                              <label for="equipment-department" class="control-label">หน่วยงาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          </div>
                              <select class="form-control select2 ull-right" name="equipment-department" style="width: 100%;">
                              <option value="<?php echo(string)$this->data[1]['department']['id'];?>"><?php echo(string)$this->data[1]['department']['name'];?></option>
                                
                              
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

                </div> <!-- End box body -->
                </div> <!-- End Tab1 -->

                <div class="tab-pane" id="tab_2">
                    <div class="box-body">

                    <!-- ----------------------------------------------- -->
                      <div class="form-group">
                 
                          <div class="input-group">
                 
                              <div class="input-group-addon">
                                <label for="equipment-sn" class="control-label">S/N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                              </div>
                                <input type="text" class="form-control" id="equipment-sn" name="equipment-sn" value="<?php echo $this->data[0]['anest']['equipment']['equipment_sn']?>" placeholder="S/N" required>
                          </div>
               
                      </div>
                    <!-- ------------------------------------------------- -->

                      <div class="form-group">
                 
                          <div class="input-group">
                 
                              <div class="input-group-addon">
                                <label for="equipment-nameEN" class="control-label">ชื่อเครื่อง(อังกฤษ)&nbsp;&nbsp;</label>
                              </div>
                                <input type="text" class="form-control" id="equipment-nameEN" name="equipment-nameEN" placeholder="ชื่อเครื่อง(อังกฤษ)" value="<?php echo $this->data[0]['anest']['equipment']['equipment_nameEN']?>" required>
                          </div>

                      </div>
                     <!-- --------------------------------------------------------- -->

                      <div class="form-group">
                 
                        <div class="input-group">
                 
                            <div class="input-group-addon">
                              <label for="equipment-brand" class="control-label">ยี่ห้อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                            </div>
                              <input type="text" class="form-control" id="equipment-brand" name="equipment-brand" placeholder="ยี่ห้อ" value="<?php echo $this->data[0]['anest']['equipment']['equipment_brand']?>" required>
                        </div>
                
                      </div>
                    <!-- --------------------------------------------------------- -->

                      <div class="form-group">
                 
                          <div class="input-group">
                 
                              <div class="input-group-addon">
                                <label for="equipment-model" class="control-label">รุ่น&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                              </div>
                                <input type="text" class="form-control" id="equipment-model" name="equipment-model" placeholder="รุ่น" value="<?php echo $this->data[0]['anest']['equipment']['equipment_model']?>" required>
                          </div>
                
                      </div>
                     <!-- --------------------------------------------------------- -->

                      <div class="form-group">
               
                          <div class="input-group">
                              <div class="input-group-addon">
                                <label for="equipment-type" class="control-label">ประเภทครุภัณฑ์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                              </div>
                                <select class="form-control select2 ull-right" name="equipment-type" style="width: 100%;">
                                  <option value="<?php echo (string)$this->data[1]['type']['id']?>"><?php echo $this->data[1]['type']['name'];?></option>
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
                    <!-- --------------------------------------------------------- -->

                      <div class="form-group">
               
                        <div class="input-group">
                            <div class="input-group-addon">
                              <label for="equipment-group" class="control-label">กลุ่ม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                                <select class="form-control select2 ull-right" name="equipment-group" style="width: 100%;">
                                <option value="<?php echo (string)$this->data[1]['group']['id'];?>"><?php echo $this->data[1]['group']['name'];?></option>
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
                    <!-- --------------------------------------------------------- -->
                      <div class="form-group">
               
                          <div class="input-group">
                              <div class="input-group-addon">
                                <label for="equipment-status" class="control-label">สถานะ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                              </div>

                                <?php 
                                        if((string)$this->data[1]['status']['id'] == '57f22412d702897f0058fdd9'){
                                ?>
                                <select class="form-control select2 ull-right" name="equipment-status" style="width: 100%;" disabled>


                                  <option value="<?php echo (string)$this->data[1]['status']['id'];?>"><?php echo $this->data[1]['status']['name'];?></option>
                                  <?php 

                                    foreach($this->data1 as $value){
                                        if($value['anest']['status']['status_name'] != ''){
                                  ?>
                                    <option value="<?php echo (string)$value['anest']['status_id'];?>" >
                                        <?php echo $value['anest']['status']['status_name'];?>
                                       
                                    </option>
                                 
                                <?php }} ?>
                  
                                </select>



                                <?php 
                                        }else {

                                ?>
                                  <select class="form-control select2 ull-right" name="equipment-status" style="width: 100%;" >


                                  <option value="<?php echo (string)$this->data[1]['status']['id'];?>"><?php echo $this->data[1]['status']['name'];?></option>
                                  <?php 

                                    foreach($this->data1 as $value){
                                        if($value['anest']['status']['status_name'] != ''){
                                  ?>
                                    <option value="<?php echo (string)$value['anest']['status_id'];?>" >
                                        <?php echo $value['anest']['status']['status_name'];?>
                                       
                                    </option>
                                 
                                <?php }} ?>
                  
                                </select>

                                <?php } ?>
                                
                          </div>
                      </div>

                      <!-- -------------------------------------------------------------- -->
                      <div class="form-group">
                
                          <div class="input-group">
                 
                  
                              <input type="file" id="equipment-pic" name="equipment-pic" >
                          </div>
                <!-- /.input group -->
                      </div>
                      <!-- -------------------------------------------------------------- -->


                    </div> <!-- End box body -->

                </div> <!-- End Tab2 -->

                <div class="tab-pane" id="tab_3">
                      <div class="box-body">
                        <!-- -------------------------------------------------------------- -->
                          <div class="form-group">
                 
                              <div class="input-group">
                 
                                  <div class="input-group-addon">
                                    <label for="equipment-company_name" class="control-label">ชื่อบริษัท&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                                  </div>
                                    <input type="text" class="form-control" id="equipment-company_name" name="equipment-company_name" placeholder="ชื่อบริษัท" value="<?php echo $this->data[0]['anest']['equipment']['equipment_company_name']?>" required>
                              </div>
               
                          </div>
                        <!-- -------------------------------------------------------------- -->

                           <div class="form-group">
                 
                              <div class="input-group">
                 
                                <div class="input-group-addon">
                                    <label for="equipment-company_tel" class="control-label">โทรศัพท์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                </div>
                                    <input type="tel" class="form-control" id="equipment-company_tel" name="equipment-company_tel" placeholder="โทรศัพท์" value="<?php echo $this->data[0]['anest']['equipment']['equipment_company_tel']?>" required>
                              </div>
               
                          </div>
                          <!-- -------------------------------------------------------------- -->

                          <div class="form-group">
                 
                              <div class="input-group">
                 
                                <div class="input-group-addon">
                                  <label for="equipment-company_fax" class="control-label">โทรสาร&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                </div>
                                  <input type="fax" class="form-control" id="equipment-company_fax" name="equipment-company_fax" placeholder="โทรสาร" value="<?php echo $this->data[0]['anest']['equipment']['equipment_company_fax']?>" required>
                              </div>
                          </div>
                          <!-- -------------------------------------------------------------- -->

                          <div class="form-group">
                 
                              <div class="input-group">
                 
                                  <div class="input-group-addon">
                                    <label for="equipment-company_sales" class="control-label">ผู้แทนขาย&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                                  </div>
                                    <input type="text" class="form-control" id="equipment-company_sales" name="equipment-company_sales" placeholder="ผู้แทนขาย" value="<?php echo $this->data[0]['anest']['equipment']['equipment_company_sales']?>" required>
                              </div>
                          </div>
                          <!-- -------------------------------------------------------------- -->

                          <div class="form-group">
                 
                              <div class="input-group">
                 
                                  <div class="input-group-addon">
                                    <label for="equipment-company_mobile" class="control-label">เบอร์ติดต่อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                                  </div>
                                    <input type="tel" class="form-control" id="equipment-company_mobile" name="equipment-company_mobile" placeholder="เบอร์ติดต่อ" value="<?php echo $this->data[0]['anest']['equipment']['equipment_company_mobile']?>" required>
                              </div>
                          </div>
                          <!-- -------------------------------------------------------------- -->

                          <div class="form-group">
                 
                              <div class="input-group">
                 
                                  <div class="input-group-addon">
                                      <label for="equipment-company_waranty" class="control-label">รับประกัน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                  </div>
                                      <input type="number" class="form-control" id="equipment-company_waranty" name="equipment-company_waranty" placeholder="รับประกัน" value="<?php echo $this->data[0]['anest']['equipment']['equipment_company_waranty']?>" required>
                              </div>
                          </div>
                          <!-- -------------------------------------------------------------- -->

                      </div> <!-- End Box body -->
                </div><!-- End tab3 -->
                
                <div class="tab-pane" id="tab_4">
                      <div class="box-body">

                        <!-- -------------------------------------------------------------- -->
                        <div class="form-group">
                 
                            <div class="input-group">
                 
                                <div class="input-group-addon">
                                    <label for="equipment-cost" class="control-label">ราคาเครื่อง&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                </div>
                                    <input type="number" class="form-control" id="equipment-cost" name="equipment-cost" placeholder="ราคาเครื่อง" value="<?php echo $this->data[0]['anest']['equipment']['equipment_cost']?>" required>
                            </div>
                        </div>
                        <!-- -------------------------------------------------------------- -->
                        <div class="form-group">
                 
                            <div class="input-group">
                 
                                <div class="input-group-addon">
                                    <label for="equipment-drop" class="control-label">ราคาซาก&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                </div>
                                    <input type="number" class="form-control" id="equipment-drop" name="equipment-drop" placeholder="ราคาซาก" value="<?php echo $this->data[0]['anest']['equipment']['equipment_drop']?>" required>
                            </div>
                        </div>
                        <!-- -------------------------------------------------------------- -->

                        <div class="form-group">
                 
                            <div class="input-group">
                 
                                <div class="input-group-addon">
                                    <label for="equipment-year" class="control-label">อายุ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                </div>
                                    <input type="number" class="form-control" id="equipment-year" name="equipment-year" value="<?php echo $this->data[0]['anest']['equipment']['equipment_year']?>" placeholder="อายุเครื่อง" required>
                            </div>
                        </div>
                        <!-- -------------------------------------------------------------- -->
                      </div> <!-- End box body -->
                </div> <!-- End tab4 -->


                </div><!-- End Tab content -->



                </div> <!-- End Nav -tabs --> 
                 <input type="hidden" name="equipment-id" id="equipment-id" value="<?php echo (string)$this->data[0]['anest']['equipment_id'];?>"> 
             
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                      <div class="box-tools pull-right">

                      <button type="submit" class="btn btn-danger" name="equipment-update" id="equipment-update">Update</button>
                      </div>
                    </div>
                  </div>
               

            </form>
         </div> <!-- End Box body -->    
         </div>
         </div> 

             

 </div>
     

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->