<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Performance Evaluation
      <!-- <small>it all starts here</small> -->
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Performance Evaluation</h3>
        <a href="<?=base_url('admin/performance_evaluation_list')?>" class="btn btn-success">Back</a>
      </div>
      <div class="box-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12" style="float: none;margin: 0 auto;">
              <form action="<?=base_url('admin/edit_performance_evaluation/'.$category->category_id)?>" method="post">
                <div class="row add-category">
                  <hr>
                  <div class="col-md-12">
                    <?php $has_error_category = !empty(form_error("question_category")) ? "has-error" : ""; ?>
                    <div class="form-group has-feedback <?= $has_error_category ?> row">
                      <label class="col-sm-2 col-form-label">Evaluation Label: </label>
                      <div class="col-sm-4">
                        <input type="text" name="question_category" class="form-control" placeholder="Evaluation category" value="<?=$category->category_name?>">
                        <?=form_error("question_category","<span class='help-block'>","</span>")?>
                      </div>
                    </div>
                    <table class='table table-bordered table-hover myTable'>
                      <thead>
                        <tr>
                          <th scope='col' width="10%">Question Rating</th>
                          <th scope='col' width="10%">Question Points</th>
                          <th scope='col'>Question</th>
                          <!-- <th scope='col' width='30'>Action</th> -->
                        </tr>
                      </thead>
                      <tbody id="tbody-question-cat0" class='tbody-question'>
                        <?php if ($question): ?>
                          <?php foreach ($question as $question_key => $question_value): ?>

                            <?php
                            $question_number = $question_value->question_number;
                            $question_points = $question_value->question_points;
                            $question_id = $question_value->question_id;
                            $has_error_question = !empty(form_error("question_name[$question_id]")) ? "has-error" : "";
                            $has_error_points = !empty(form_error("question_points[$question_id]")) ? "has-error" : "";
                            ?>
                            <tr>
                              <td><?= $question_number ?></td>
                              <td>
                                <div class="form-group has-feedback <?= $has_error_points ?>">
                                  <input type="text" name="question_points[<?= $question_id ?>]" class="form-control" value="<?=$question_points?>">
                                  <?=form_error("question_points[$question_id]","<span class='help-block'>","</span>")?>
                                </div>
                              </td>
                              <td>
                                <div class="form-group has-feedback <?= $has_error_question ?>">
                                  <input type="text" name="question_name[<?=$question_id?>]" class="form-control" value="<?=$question_value->question_name?>">
                                  <?=form_error("question_name[$question_id]","<span class='help-block'>","</span>")?>
                                </div>
                              </td>
                              <!-- <td>
                                <button type="button" class="btn btn-danger btn-flat" onClick="remove_Btn($(this),<?=$question_key?>)">Remove</button>
                              </td> -->
                            </tr>
                          <?php endforeach ?>
                        <?php endif ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <input type="submit" value="Submit" class="btn btn-success btn-flat">
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->