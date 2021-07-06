
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Accounts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Accounts</a></li>
        <li><a href="#">Applicant</a></li>
        <li class="active">Without Experience</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Applicant without experience</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <!-- <th>Address</th> -->
                  <th>Gender</th>
                  <th>Position Applied</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if ($without_exp) {
                  foreach($without_exp as $exp_acc):
                  ?>
                  <tr>
                    <td><?=$exp_acc["firstname"]?></td>
                    <td><?=$exp_acc["lastname"]?></td>
                    <!-- <td><?=$exp_acc["address"]?></td> -->
                    <td><?=$exp_acc["gender"] == "Male" ? "Male" : "Female"?></td>
                    <td><?=$exp_acc["category"]?></td>
                    <td>
                      <a href="#" class="btn btn-success">SEND SMS</a>
                       <a href="<?=base_url('admin/pdf_withoutexp/'.$exp_acc['id'])?>" class="btn btn-info" target="_blank">VIEW APPLICATION FORM</a>
                      
           
                    </td> 
                  </tr>
                  <?php
                  endforeach;
                  }
                  ?>
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