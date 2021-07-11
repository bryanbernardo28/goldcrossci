
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
                        <h3 class="box-title">Update Exam Question</h3>
                    </div>
                    <form action="<?=base_url('admin/update_exam_question/').$question->exam_question_id?>" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12" style="float: none;margin: 0 auto;">
                                        <div class="form-group has-feedback  <?php if(!empty(form_error('question'))): ?> has-error <?php endif?>">
                                            <label>Question:</label>
                                            <input type="text" name="question" class="form-control" value="<?=$question->exam_question_text?>" placeholder="Question">
                                            <?=form_error('question','<span class="help-block">','</span>')?>
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