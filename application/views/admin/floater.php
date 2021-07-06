
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Floater
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url('admin/index2')?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Floater</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
           <!--  <h3 class="box-title">Floater</h3> -->
          </div>
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Applied Position</th>
                <th>Date Hired</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  if ($remarks) {
                    foreach ($remarks as $remarks_value) {
                      $apdata = json_decode($remarks_value->applicant_personal_data,true);
                ?>
                <tr>
                  <td><?=$apdata["first_name"]?></td>
                  <td><?=$apdata["family_name"]?></td>
                  <td><?=$apdata["gender"]?></td>
                  <td><?=$apdata["category"]?></td>
                  <td><?=date("M d, Y",$remarks_value->date_hired)?></td>
                  <td>
                    <!-- <a href="<?=base_url('admin/submit_hired/'.$remarks_value->remarks_id)?>" class="btn btn-primary">Send Detachment</a> -->
                    <!-- <a href="<?=base_url()?>" class="btn btn-primary">Send Detachment</a> -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#textModal<?=$remarks_value->account_id?>">
                        Send Detachment
                      </button>
                  </td>
                </tr>
                <div class="modal modal-info fade" id="textModal<?=$remarks_value->account_id?>" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Detachment</h4>
                      </div>
                      <form action="<?=base_url('admin/submit_detachment/'.$remarks_value->account_id.'/'.$remarks_value->remarks_id)?>" method="post">
                      <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group has-feedback <?php if(!empty(form_error('client'))): ?> has-error <?php endif?>">
                                <label for="exampleInputEmail1">Company:</label>
                                <select class="form-control" name="client">
                                  <?php if ($client): ?>
                                    <?php foreach ($client as $client_value): ?>
                                      <?php $selected = set_value('client') == $client_value->cc_company_id ? 'selected' : ''; ?>
                                      <option value="<?= $client_value->cc_company_id ?>" <?= $selected ?>><?= $client_value->cc_name ?></option>
                                    <?php endforeach ?>
                                  <?php endif ?>
                                </select>
                                <?=form_error("client","<span class='help-block'>","</span>")?>
                              </div>
                            </div>
                          </div>
                        
                      </div>
                      <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Send SMS</button> -->
                        <!-- <button type="button" class="btn btn-outline pull-left btn-send-sms" data-dismiss="modal"></button> -->
                        <input type="submit" value="Submit" class="btn btn-outline pull-left">
                      </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <?php
                  }}
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
<!-- /.content-wrapper  