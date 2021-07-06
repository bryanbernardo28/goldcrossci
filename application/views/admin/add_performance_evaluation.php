<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Performance Evaluation
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
        <h3 class="box-title">Add Performance Evaluation</h3>
        <a href="<?=base_url('admin/performance_evaluation_list')?>" class="btn btn-success">Back</a>
      </div>
      <div class="box-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12" style="float: none;margin: 0 auto;">
              <form action="<?=base_url('admin/add_performance_evaluation')?>" method="post">
                <div class="row">
                  <div class="col-lg-2 pull-right">
                    <button type="button" class="btn btn-primary btn-block btn-flat" id="btn-add-eval-category">Add Category</button>
                  </div>
                </div>
                <div class="row add-category">
                  <?php if (!empty(validation_errors())): ?>

                   <?php foreach (set_value('question_category[]') as $category_key => $category_value): ?>
                      <hr>
                        <div class="col-md-12">
                          <?php  
                            $has_error_category = !empty(form_error("question_category[$category_key]")) ? 'has-error' : '';
                            ?>
                          <div class="form-group has-feedback <?=$has_error_category?> row">
                              <label class="col-sm-2 col-form-label">Evaluation Label: </label>
                              <div class="col-sm-4">
                                
                                <input type="text" name="question_category[]" class="form-control" placeholder="Evaluation category" value="<?=$category_value?>">
                                <?=form_error("question_category[$category_key]","<span class='help-block'>","</span>")?>
                              </div>
                              <div class="col-md-3 mb-3 pull-right">
                                <button type="button" class="btn btn-primary btn-flat pull-right add_question float-right" id="cat-<?=$category_key?>">Add Question</button>
                              </div>
                            </div>
                            <table class='table table-bordered table-hover myTable'>
                              <thead>
                                <tr>
                                  <th scope='col' width="10%">Question Rating</th>
                                  <th scope='col' width="10%">Question Points</th>
                                  <th scope='col'>Question</th>
                                  <th scope='col' width='30'>Action</th>
                                </tr>
                              </thead>
                              <tbody id="tbody-question-cat<?=$category_key?>" class='tbody-question'>
                                <?php if (!empty(set_value("question_content[$category_key][]"))): ?>
                                  <?php foreach (set_value("question_content[$category_key][]") as $question_content_key => $question_content_value): ?>
                                    <?php
                                      $has_error_question = !empty(form_error("question_content[$category_key][$question_content_key]")) ? "has-error" : "";
                                      $has_error_points = !empty(form_error("question_points[$category_key][$question_content_key]")) ? "has-error" : "";
                                      $q_points = set_value("question_points[$category_key][$question_content_key]");
                                      $num_points = $question_content_key;
                                      $num_points++;
                                    ?>
                                    <tr>
                                      <td>
                                        <?= $num_points ?>
                                      </td>
                                      <td>
                                        <div class="form-group has-feedback <?=$has_error_points?>">
                                          <input type="text" name="question_points[<?=$category_key?>][]" class="form-control" value="<?=$q_points?>">
                                          <?=form_error("question_points[$category_key][$question_content_key]","<span class='help-block'>","</span>")?>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="form-group has-feedback <?=$has_error_question?>">
                                          <input type="text" name="question_content[<?=$category_key?>][]" class="form-control" value="<?=$question_content_value?>">
                                          <?=form_error("question_content[$category_key][$question_content_key]","<span class='help-block'>","</span>")?>
                                        </div>
                                      </td>
                                      <td>
                                        <button type="button" class="btn btn-danger btn-flat" onClick="remove_Btn($(this),<?=$category_key?>)">Remove</button>
                                      </td>
                                    </tr>
                                  <?php endforeach ?>
                                <?php endif ?>
                              </tbody>
                            </table>
                        </div>
                      </hr>
                    <?php endforeach ?>
                    
                  <?php else: ?>
                  <hr>
                    <div class="col-md-12">
                      <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Evaluation Label: </label>
                          <div class="col-sm-4">
                            <input type="text" name="question_category[]" class="form-control" placeholder="Evaluation category">
                          </div>
                          <div class="col-md-3 mb-3 pull-right">
                            <button type="button" class="btn btn-primary btn-flat pull-right add_question float-right" id="cat-0">Add Question</button>
                          </div>
                        </div>
                        <table class='table table-bordered table-hover myTable'>
                          <thead>
                            <tr>
                              <th scope='col' width="10%">Question Rating</th>
                              <th scope='col' width="10%">Question Points</th>
                              <th scope='col'>Question</th>
                              <th scope='col' width='30'>Action</th>
                            </tr>
                          </thead>
                          <tbody id="tbody-question-cat0" class='tbody-question'>
                          </tbody>
                        </table>
                    </div>
                  <!-- </hr> -->
                <?php endif; ?>
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