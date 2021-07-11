
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Exam Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url('admin/index2')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Exam Details</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Exam Details</h3>
                        <a 
                            class="btn btn-sm btn-primary btn-flat"
                            href="<?=base_url('admin/add_exam_question')?>"
                        >
                            Add Question
                        </a>
                    </div>
                    <div class="box-body">
                        <table id="question-datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Exam Question</th>
                                    <th>Exam Choices</th>
                                    <th>Exam Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($formatted_questions){
                                    foreach($formatted_questions as $question_number => $formatted_question){
                                        
                            ?>
                            <tr>
                                <td><?=$formatted_question['question']?></td>
                                <td>
                                    <ul>
                                        <?php
                                            foreach($formatted_question['choices'] as $choices){
                                        ?>
                                        
                                        <li><?=$choices?></li>
                                        
                                        <?php        
                                            } 
                                        ?>
                                    </ul>
                                </td>
                                <td>
                                    <a class="btn btn-block btn-sm btn-primary btn-flat" href="<?=base_url('admin/update_exam_question/').$formatted_question['question_id']?>">Update Question</a>
                                    <!-- <button type="button" class="btn btn-block btn-sm  btn-info btn-flat">Update</button> -->
                                    <a class="btn btn-block btn-sm  btn-danger btn-flat" href="<?=base_url('admin/delete_question/').$formatted_question['question_id']?>">Delete</a>
                                </td>
                            </tr>
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