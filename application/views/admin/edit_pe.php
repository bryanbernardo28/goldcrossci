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
                  <form action="<?=base_url('admin/edit_pe/'.$pe_category->personnel_evaluation_category_id)?>" method="post">
                    <div class="row row-personnel-category">
                      <div class="col-md-12">
                        <?php $has_error_category = !empty(form_error("pe_category")) ? "has-feedback has-error" : ""; ?>
                        <div class="form-group <?=$has_error_category?> row">
                          <label class="col-sm-2 col-form-label">Evaluation Label: </label>
                          <div class="col-sm-4">
                            <input type="text" name="pe_category" class="form-control" placeholder="Evaluation category" value="<?= $pe_category->personnel_evaluation_category_name ?>">
                          </div>
                        </div>
                        <table class='table table-bordered table-hover' id="tbody-personnel-question-cat0">
                          <thead>
                            <tr>
                              <!-- <th scope="col">#</th> -->
                              <th scope="col">Question Content</th>
                            </tr>
                          </thead>
                          <tbody class="questions">
                            <?php if ($pe_question): ?>
                              <?php foreach ($pe_question as $pe_question_key => $pe_question_value): $q_id = $pe_question_value->personnel_evaluation_questions_id ?>
                                <?php
                                $has_error_question = !empty(form_error("pe_question[$q_id]")) ? "has-feedback has-error" : "";
                                ?>
                                <tr>
                                  <td>
                                    <div class="form-group <?=$has_error_question?>">
                                      <input type='text' name="pe_question[<?=$q_id?>]" class='form-control' value="<?=$pe_question_value->personnel_evaluation_questions_content?>">
                                      <?=form_error("pe_question[$q_id]","<span class='help-block'>","</span>")?>
                                    </div>
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