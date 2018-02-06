<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Back
        <small>Controlpanel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL;?>repair">งานซ่อมครุภัณฑ์</a></li>
        <li><a href="<?php echo URL;?>repair/approve">อนุมัติซ่อม</a></li>
        <li><a href="">อยู่ระหว่างการซ่อม</a></li>
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">




      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">ครุภัณฑ์อยู่ระหว่างการซ่อม</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
           
              <!-- ------------------------------------------------------ -->
                <?php 

                    $i=0;
                    foreach ($this->data as $value) {
                        if($value['id'] != ""){
                    
                ?>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">

                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>">
                        
                        <?php echo $value['sn'].'|'.date('d-M-Y ', $value['date_send']->sec);?> 

                      </a>

                    </h4>
                    <div class="box-tools pull-right">
                    <a class="btn btn-primary btn-xs" href="<?php echo URL.'repair/getback/'.(string)$value['id'];?>">ตรวจรับ</a>
                   
                    </div>
                  </div>
                  <div id="collapse<?php echo $i;?>" class="panel-collapse collapse">
                    <div class="box-body">
                      

                         <!-- Content Wrapper. Contains page content -->
  
   

   

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-h-square"></i> SirirajAEC, Anest.
            <small class="pull-right">Date: <?php echo date('d/m/Y ', $value['date_registed']->sec);?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Gerneral
          <address>
            <strong>คณะแพทยศาสตร์ศิริราชพยาบาล</strong><br>
            2 ถนนพรานนก เเขวงวังหลัง<br>
            เขตบางกอกน้อย, กรุงเทพฯ 10700<br>
            โทร: (02) 419-7180<br>
            Email: siwww@mahidol.ac.th
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Department
          <address>
            <strong>ภาควิชาวิสัญญีวิทยา</strong><br>
            ชั้น 11 อาคารสยามินทร์<br>
            โรงพยาบาลศิริราช<br>
            โทร: (02) 419-7990<br>
            โทรสาร: (02) 411-3256
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>SAP : </b><?php echo $value['sap'];?><br>
          <b>Serial number :</b> <?php echo $value['sn'];?><br>
          <b>Name:</b> <?php echo $value['name'];?><br>
          <b>Group:</b> <?php echo $value['group'];?><br>
          <b>Room:</b> <?php echo $value['building'].' '.$value['floor'].' '.$value['room'];?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>N</th>
              <th>Date send</th>
              <th>Service </th>
              <th>Description</th>
             
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td><?php echo date('d-M-Y ', $value['date_send']->sec);?></td>
              <td><?php echo $value['service'];?></td>
              <td><?php echo $value['problem'];?></td>
              
            </tr>
           
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Picture:</p>
           <img class="img-responsive" src="<?php echo URL.'publics/images/repairs/'.$value['rpic'];?>"  alt="Photo">
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <?php echo $value['note'];?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Equipment info.</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Brand:</th>
                <td><?php echo $value['brand'];?></td>
              </tr>
              <tr>
                <th>Model:</th>
                <td><?php echo $value['model'];?></td>
              </tr>
              <tr>
                <th>Price:</th>
                <td><?php echo $value['price'];?></td>
              </tr>
              <tr>
                <th>Year:</th>
                <td><?php echo $value['year'];?></td>
              </tr>
               <tr>
                <th>Age:</th>
                <td>
                    <?php 

                          $y_now = (int)date('Y')+543;
                          $y_begin = (int)$value['year'];
                          echo $y_now-$y_begin;

                    ?> 
                </td>
              </tr>
              <tr>
                <th>Status:</th>
                <td><?php echo "อยู่ระหว่างการซ่อม";?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
         
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    


                    </div>
                  </div>
                </div>

                <?php $i++;}} ?>
                
               <!-- ------------------------------------------------------- -->   
                


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
     
    </section>
    <!-- /.content -->
</div>
  
  
  
  
  