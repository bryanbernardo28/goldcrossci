
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Exam
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url('admin/index2')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Exam Question</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add Exam Question</h3>
                    </div>
                    <form action="<?=base_url('admin/add_account')?>" method="post">
                        <div class="box-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12" style="float: none;margin: 0 auto;">
                                        <div class="form-group has-feedback  <?php if(!empty(form_error('fname'))): ?> has-error <?php endif?>">
                                            <label>Question:</label>
                                            <input type="text" name="fname" class="form-control" value="<?=set_value('fname');?>" placeholder="Question">
                                            <?=form_error('fname','<span class="help-block">','</span>')?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Import image: </label>
                                            <input type="file" id="exampleInputFile">
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-normal">Add Choices</button>
                                            <div class="modal fade" id="modal-normal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Info Modal</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Choice: </label>
                                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Password</label>
                                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary btn-flat pull-left" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-success btn-flat">Save changes</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <table class="table table-responsive no-padding" style="margin-top:10px;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Choice</th>
                                                        <th>Correct Answer</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="exam-table-body">
                                                
                                                </tbody>
                                                <!-- <tr>
                                                    <td>1.</td>
                                                    <td>Update software</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-red">55%</span></td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>Clean database</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                        <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-yellow">70%</span></td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>Cron job running</td>
                                                    <td>
                                                        <div class="progress progress-xs progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-light-blue">30%</span></td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>Fix and squish bugs</td>
                                                    <td>
                                                        <div class="progress progress-xs progress-striped active">
                                                        <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-green">90%</span></td>
                                                </tr> -->
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix no-border">
                            <button type="submit" class="btn btn-primary btn-flat pull-right">Submit</button>
                        </div>
                    </form>
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