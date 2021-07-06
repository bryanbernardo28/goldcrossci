<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Message
      <!-- <small>it all starts here</small> -->
    </h1>
   <!--  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Text Message</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <form action="<?=base_url('admin/text_message')?>" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group <?=!empty(form_error('w_sms_content_passed')) ? 'has-error' : '' ;?> has-feedback">
                    <label for="exampleInputEmail1">SMS Content (With Experience)(Passed)</label>
                    <textarea class="form-control" name="w_sms_content_passed" rows="3" placeholder="SMS Content" style="resize: none;"><?php if (validation_errors()):?><?=set_value("w_sms_content_passed");?><?php else: ?><?php if (!empty($w_sms_content_passed)):?><?=$w_sms_content_passed?><?php endif ?><?php endif ?></textarea>
                    <?=form_error("w_sms_content_passed","<span class='help-block'>","</span>")?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group <?=!empty(form_error('wo_sms_content_passed')) ? 'has-error' : '' ;?> has-feedback">
                    <label for="exampleInputEmail1">SMS Content (Without Experience)(Passed)</label>
                    
                    <textarea class="form-control" name="wo_sms_content_passed" rows="3" placeholder="SMS Content" style="resize: none;"><?php if (validation_errors()):?><?=set_value("wo_sms_content_passed");?><?php else: ?><?php if (!empty($wo_sms_content_passed)):?><?=$wo_sms_content_passed?><?php endif ?><?php endif ?></textarea>
                    <?=form_error("wo_sms_content_passed","<span class='help-block'>","</span>")?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group <?=!empty(form_error('w_sms_content_failed')) ? 'has-error' : '' ;?> has-feedback">
                    <label for="exampleInputEmail1">SMS Content (With Experience)(Failed)</label>
                    
                    <textarea class="form-control" name="w_sms_content_failed" rows="3" placeholder="SMS Content" style="resize: none;"><?php if (validation_errors()):?><?=set_value("w_sms_content_failed");?><?php else: ?><?php if (!empty($w_sms_content_failed)):?><?=$w_sms_content_failed?><?php endif ?><?php endif ?></textarea>
                    <?=form_error("w_sms_content_failed","<span class='help-block'>","</span>")?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group <?=!empty(form_error('wo_sms_content_failed')) ? 'has-error' : '' ;?> has-feedback">
                    <label for="exampleInputEmail1">SMS Content (Without Experience)(Failed)</label>
                    
                    <textarea class="form-control" name="wo_sms_content_failed" rows="3" placeholder="SMS Content" style="resize: none;"><?php if (validation_errors()):?><?=set_value("wo_sms_content_failed");?><?php else: ?><?php if (!empty($wo_sms_content_failed)):?><?=$wo_sms_content_failed?><?php endif ?><?php endif ?></textarea>
                    <?=form_error("wo_sms_content_failed","<span class='help-block'>","</span>")?>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
        </div>  
      </div>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->