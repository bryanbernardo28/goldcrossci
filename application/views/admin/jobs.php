
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Job posting
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url('admin/index2')?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Job posting</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Job posting</h3>
            <a href="<?=base_url('admin/add_job')?>" class="btn btn-flat btn-primary">Add Job</a>
          </div>
          <div class="box-body">
            <!-- <div class="table-responsive"> -->
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Job name</th>
                  <th>Job requirements</th>
                  <th>Job vacancy</th>
                  <th>Job posted</th>
                  <th>Job date added</th>
                  <th>Job date updated</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    if ($jobs) {
                    foreach ($jobs as $job):                  
                  ?>
                  <tr>
                    <td><?=$job->job_name?></td>
                    <td><?=str_replace(array(";",","),"<br>",$job->job_requirements)?></td>
                    <td><?=$job->job_vacancy?></td>
                    <td><button type="button" class="btn btn-flat <?=$job->job_posted == 1 ? 'btn-success' : 'btn-danger' ?>" data-toggle="modal" data-target="#modal-delete-job-post<?=$job->job_id?>"><?=$job->job_posted == 1 ? 'Unpost' : 'Post' ?></button></td>
                    <td><?=date('m/j/Y h:i A',$job->job_date_added);?></td>
                    <td><?=date('m/j/Y h:i A',$job->job_date_updated);?></td>
                    <td>
                      <a href="<?=base_url('admin/edit_job/').$job->job_id?>" class="btn btn-flat btn-warning">Edit</a>
                      <!-- <button class="btn btn-flat btn-danger">Delete</button> -->
                    </td>
                  </tr>
                  
                  <!-- Delete Modal -->
                  <div class="modal fade" id="modal-delete-job-post<?=$job->job_id?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">
                            <?php 
                            if ($job->job_posted == 1) {
                              echo "Unpost <strong>".$job->job_name."</strong>";
                            }
                            else{
                              echo "Post <strong>".$job->job_name."</strong>";
                            }
                            ?>
                            
                          </h4>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want to <?=$job->job_posted == 1 ? 'unpost' : 'post'?> <!-- the fucking --> <strong><?=$job->job_name?></strong>?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                          <a href="<?=base_url('admin/unpost_post_job/').$job->job_id.'/'.$job->job_posted?>" class="btn btn-primary">Yes</a>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  <?php
                  endforeach;
                  }
                  ?>
                </tbody>
              </table>
            <!-- </div> -->
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