
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Job
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url('admin/index2')?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?=base_url('admin/jobs')?>">Job posting</a></li>
      <li class="active">Add job</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Job</h3>
            <a href="<?=base_url('admin/jobs')?>" class="btn btn-flat btn-primary">Back</a>
          </div>
          <div class="box-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6" style="float: none;margin: 0 auto;">
                  <form action="<?=base_url('admin/add_job')?>" method="post">
                    <div class="form-group has-feedback  <?php if(!empty(form_error('job_name'))): ?> has-error <?php endif?>">
                      <input type="text" name="job_name" class="form-control" placeholder="Job name">
                      <?=form_error('job_name','<span class="help-block">','</span>')?>
                    </div>
                    <div class="form-group has-feedback <?php if(!empty(form_error('job_req'))): ?> has-error <?php endif?>">
                      <textarea name="job_req" class="form-control disable-resize" placeholder="Job requirements"></textarea>
                       <?=form_error('job_req','<span class="help-block">','</span>')?>
                    </div>
                    <div class="form-group has-feedback  <?php if(!empty(form_error('job_vacant'))): ?> has-error <?php endif?>">
                      <input type="text" name="job_vacant" class="form-control" placeholder="Job vacancy">
                      <?=form_error('job_vacant','<span class="help-block">','</span>')?>
                    </div>
                    <div class="row">
                      <div class="col-xs-4 pull-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                      </div>
                      <!-- <div class="col-xs-4 pull-left">
                        <input type="reset" class="btn btn-default" value="Clear">
                      </div> -->
                      
                      <!-- /.col -->
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
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