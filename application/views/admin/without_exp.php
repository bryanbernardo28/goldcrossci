
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
                      <!-- <button type="button" class="btn btn-success btn-send-sms"  id="<?=$exp_acc['contact_number']?>">SEND SMS</button> -->
                      <button type="button" class="btn btn-success btn-send-sms-wexp" data-toggle="modal" data-target="#textModal<?=$exp_acc['id']?>">
                        SEND SMS
                      </button>
                      <a href="<?=base_url('assets/resume/'.$exp_acc['resume'])?>" class="btn btn-info" target="_blank" download>DOWNLOAD PDF</a>
                      <!-- <a href="<?=base_url('admin/pdf_withexp/'.$exp_acc['id'])?>" class="btn btn-info" target="_blank" download>VIEW APPLICATION FORM</a> -->
                    </td> 
                  </tr>
                  <div class="modal modal-info fade" id="textModal<?=$exp_acc['id']?>" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">SMS</h4>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group has-feedback">
                                  <label for="exampleInputEmail1">Contact Number: <?=$exp_acc['contact_number']?> <br>SMS Content</label>
                                  <textarea class="form-control" id="my-sms-content" name="sms_content" rows="3" placeholder="SMS Content" style="resize: none;"><?=set_value('sms_content');?></textarea>
                                  <?=form_error("sms_content","<span class='help-block'>","</span>")?>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="sms_content_val" value="<?=$sms->wo_sms_content_passed?>" checked>
                                    Passed
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="sms_content_val" value="<?=$sms->wo_sms_content_failed?>">
                                    Failed
                                  </label>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Send SMS</button> -->
                          <button type="button" class="btn btn-outline pull-left btn-send-sms" data-dismiss="modal" id="<?=$exp_acc['contact_number']?>">Send SMS</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
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