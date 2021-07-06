<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Personnel Evaluation Offense <?= form_error("offense"); ?>
    </h1>
  </section>
  <?php 
  function addOrdinalNumberSuffix($num) {
    if (!in_array(($num % 100),array(11,12,13))){
      switch ($num % 10) {
        // Handle 1st, 2nd, 3rd
        case 1:  return $num.'st';
        case 2:  return $num.'nd';
        case 3:  return $num.'rd';
      }
    }
    return $num.'th';
  }

  ?>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Add Personnel Evaluation Offense</h3>
            <a href="<?=base_url('admin/pe_offense')?>" class="btn btn-success btn-flat">Back</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <form action="<?=base_url('admin/edit_pe_offense/'.$pe_category->personnel_evaluation_category_id)?>" method="post">
                    
                    <?php if ($offense): ?>

                      <div class="row">
                        <div class="col-md-12">
                          <span><strong>Category: </strong> <?=$pe_category->personnel_evaluation_category_name?></span>
                        </div>
                      </div>
                      <hr>
                      <?php foreach ($offense as $offense_value): ?>
                        <?php $q_id = $offense_value->personnel_evaluation_questions_id; ?>
                        <div class="row">
                          <div class="col-md-12">
                            <span><strong>Question: </strong><?=$offense_value->personnel_evaluation_questions_content?></span>
                          </div>
                        </div>
                        <table class='table table-bordered table-hover'>
                          <thead>
                            <tr>
                              <th>Attempt</th>
                              <th style="width: 70%;">Offense</th>
                              <th style="width: 30%;">Rate</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($offense_value->jp_offense as $jp_offense_value): ?>
                              <?php $attempt = $jp_offense_value["jp_offense_attempt"]; ?>
                              <?php $var_jp_offense_id = $jp_offense_value["jp_offense_id"]; ?>
                              <tr>
                                <td><?=addOrdinalNumberSuffix($attempt)?></td>
                                <td>
                                  <?php
                                    $has_error = (!empty(form_error('offense'.$attempt.$var_jp_offense_id."[]")) ? "has-feedback has-error" : "" );
                                  ?>
                                  <div class="form-group <?= $has_error ?>">
                                    <select class="form-control offense-select2" multiple name="offense<?=$attempt.$var_jp_offense_id?>[]" style="width: 100%;">
                                      <?php foreach ($jp_offense_value["jp_offense_name"] as $jp_offense_name): ?>
                                        <option value="<?= $jp_offense_name ?>" selected><?= $jp_offense_name ?></option>
                                      <?php endforeach ?>
                                    </select>
                                    <?=form_error("offense".$attempt.$var_jp_offense_id."[]",'<span class="help-block">','</span>')?>
                                  </div>
                                </td>
                                <td>
                                  <?php
                                    $has_error = (!empty(form_error('rate'.$attempt.$var_jp_offense_id."[]")) ? "has-feedback has-error" : "" );
                                  ?>
                                  <div class="form-group <?= $has_error ?>" >
                                    <select class="form-control rate-select2" multiple name="rate<?=$attempt.$var_jp_offense_id?>[]" style="width: 100%;">
                                      <?php for ($i = 0; $i <= 5; $i++): ?>
                                        <?php $selected = in_array($i,$jp_offense_value["jp_offense_rate"]) ? "selected" : "" ; ?>
                                        <option <?=$selected?> value="<?=$i?>"><?=$i?></option>
                                      <?php endfor ?>
                                    </select>
                                    <?=form_error("rate".$attempt.$var_jp_offense_id."[]",'<span class="help-block">','</span>')?>
                                  </div>
                                </td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      <?php endforeach ?>


                      
                    <hr style='width: 100%; background-color: #fff; border-top: 3px double #8c8b8b;' />
                      
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