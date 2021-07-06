<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Personnel Evaluation
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Add Performance Evaluation</h3>
            <a href="<?=base_url('admin/personnel_evaluation_list')?>" class="btn btn-success btn-flat">Back</a>
            <a href="<?=base_url('admin/pe_offense')?>" class="btn btn-info btn-flat">Manage Offense</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <form action="<?=base_url('admin/add_personnel_evaluation_category')?>" method="post">
                    <div class="row">
                      <div class="col-lg-2 pull-right">
                        <button type="button" class="btn btn-primary btn-block btn-flat" id="btn-add-personnel-eval-category">Add Category</button>
                      </div>
                    </div>
                    <hr>
                    <?php if (!empty(validation_errors())): ?>
                      <?php $q_cnt = 0; ?>
                      <div class="row row-personnel-category">
                        <?php foreach (set_value('personnel_eval_category[]') as $question_category_key => $question_category_value): ?>
                            <div class="col-md-12 cl-div-del-<?=$question_category_key?>">
                            <?php  
                            $has_error_category = !empty(form_error("personnel_eval_category[$question_category_key]")) ? 'has-error' : '';
                            ?>
                            <div class="form-group has-feedback <?=$has_error_category?> row">
                              <label class="col-sm-2 col-form-label">Evaluation Label: </label>
                              <div class="col-sm-4">
                                <input type="text" name="personnel_eval_category[]" class="form-control" placeholder="Evaluation category" value="<?=$question_category_value?>">
                                <?=form_error("personnel_eval_category[$question_category_key]","<span class='help-block'>","</span>")?>
                              </div>
                              <div class="col-md-3 mb-3 pull-right">
                                <button type="button" class="btn btn-primary btn-flat pull-right add_question_personnel float-right" id="cat-<?=$question_category_key?>">Add Question</button>
                                <button type='button' class='btn btn-danger btn-flat' id='cat-<?=$question_category_key?>' onClick="remove_div('cl-div-del-<?=$question_category_key?>')">Remove Category</button>
                              </div>
                            </div>
                            <table class='table table-bordered table-hover' id="tbody-personnel-question-cat<?=$question_category_key?>">
                              <thead>
                                <tr>
                                  <!-- <th scope="col">#</th> -->
                                  <th scope="col">Question Content</th>
                                  <th scope="col" style='width:10%;'>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                if (!empty(set_value("personnel_question_content[$question_category_key][]"))): 
                                
                                ?>
                                  <?php foreach (set_value("personnel_question_content[$question_category_key][]") as $question_content_key => $question_content_value): ?>
                                    <?php
                                      $has_error_question = !empty(form_error("personnel_question_content[$question_category_key][$question_content_key]")) ? "has-error" : "";
                                      $has_error_points = !empty(form_error("personnel_question_content[$question_category_key][$question_content_key]")) ? "has-error" : "";
                                      $q_points = set_value("personnel_question_content[$question_category_key][$question_content_key]");
                                      $q_cnt++;
                                    ?>
                                    <tr>
                                      <!-- <td><?= $q_cnt ?></td> -->
                                      <td>
                                        <div class="form-group has-feedback <?=$has_error_points?>">
                                          <input type="text" name="personnel_question_content[<?=$question_category_key?>][]" class="form-control" value="<?=$q_points?>">
                                          <?=form_error("personnel_question_content[$question_category_key][$question_content_key]","<span class='help-block'>","</span>")?>
                                        </div>
                                      </td>
                                      <td>
                                        <button type="button" class="btn btn-danger btn-flat" onClick="remove_Btn($(this),<?=$question_category_key?>)">Remove</button>
                                      </td>
                                    </tr>
                                  <?php endforeach ?>
                                <?php endif ?>
                              </tbody>
                            </table>
                          </div>
                        <?php endforeach ?>
                      </div>
                    <?php else: ?>
                      <div class="row row-personnel-category">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Evaluation Label: </label>
                            <div class="col-sm-4">
                              <input type="text" name="personnel_eval_category[]" class="form-control" placeholder="Evaluation category">
                            </div>
                            <div class="col-md-3 mb-3 pull-right">
                              <button type="button" class="btn btn-primary btn-flat pull-right add_question_personnel float-right" id="cat-0">Add Question</button>
                            </div>
                          </div>
                          <table class='table table-bordered table-hover' id="tbody-personnel-question-cat0">
                            <thead>
                              <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Question Content</th>
                                <th scope="col" style='width:10%;'>Action</th>
                              </tr>
                            </thead>
                            <tbody class="questions">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    <?php endif ?>
                    <input type="submit" value="Submit" class="btn btn-success btn-flat">
                  </form>
                </div>
              </div>
            </div>
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