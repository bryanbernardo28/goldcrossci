
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
                    <form action="<?=base_url('admin/add_exam_question')?>" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12" style="float: none;margin: 0 auto;">
                                        <div class="form-group has-feedback  <?php if(!empty(form_error('question'))): ?> has-error <?php endif?>">
                                            <label>Question:</label>
                                            <input type="text" name="question" class="form-control" value="<?=set_value('question');?>" placeholder="Question">
                                            <?=form_error('question','<span class="help-block">','</span>')?>
                                        </div>
                                        <div class="form-group has-feedback  <?php if(!empty(form_error('question_points'))): ?> has-error <?php endif?>">
                                            <label>Question Points:</label>
                                            <input type="text" name="question_points" class="form-control" value="<?=set_value('question_points');?>" placeholder="Question Points">
                                            <?=form_error('question_points','<span class="help-block">','</span>')?>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="exampleInputFile">Import image: </label>
                                            <input type="file" name="exam_image" id="exampleInputFile" accept="image/png, image/jpeg,image/jpg">
                                        </div> -->
                                        <hr>
                                        <?php if(!empty(form_error('choiceLetter[]')) || !empty(form_error('isCorrect'))){ ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php if(!empty(form_error('choiceLetter[]'))){ form_error('choiceLetter[]','<span>','</span>'); } ?>
                                            <?=form_error('isCorrect','<span>','</span>')?>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info btn-flat modal-normal" >Add Choices</button>
                                            <div class="modal fade" id="modal-normal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Add Choice</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="choiceInput">Choice: </label>
                                                                <input type="text" class="form-control choice-input" id="choiceInput" placeholder="Choice">
                                                                <span class="help-block hidden"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="correctSelect">Is Correct: </label>
                                                                <select class="form-control is-correct-answer" id="correctSelect">
                                                                    <option value="false" selected>No</option>
                                                                    <option value="true">Yes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary btn-flat pull-left" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-success btn-flat save-choice">Save</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <table class="table table-responsive no-padding choices" style="margin-top:10px;">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2">#</th>
                                                        <th>Choice</th>
                                                        <th>Correct Answer</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="exam-table-body">
                                                    <?php 
                                                        if(!empty(set_value('choiceLetter'))){ 
                                                            $choices = set_value('choiceLetter');
                                                            $choicesText = set_value('choiceText');
                                                            $isCorrect = set_value('isCorrect');
                                                            foreach($choices as $choicesIndex => $choice){
                                                    ?>
                                                    <tr>
                                                        <td><input type="text" name="choiceLetter[]" value="<?=$choice?>" class="form-control" readonly></td>
                                                        <td><input type='text' name='choiceText[]' value="<?=$choicesText[$choicesIndex]?>" class='form-control' readonly></td>
                                                        <td>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="isCorrect" id="inlineRadio1" value="<?=$choice?>" <?=set_radio("isCorrect", $choice,false)?>> Correct Answer
                                                            </label>
                                                        </td>
                                                        <td><button type='button' class='btn btn-sm btn-danger btn-flat remove-choice' id="remove-<?=$choicesIndex+1?>">Remove</button></td>
                                                    </tr>
                                                    <?php }} ?>

                                                </tbody>
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