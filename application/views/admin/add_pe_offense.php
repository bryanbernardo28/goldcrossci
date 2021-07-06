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
                  <form action="<?=base_url('admin/add_pe_offense/'.$pe_category->personnel_evaluation_category_id)?>" method="post">
                    
                    <?php if ($pe_category): $pe_cat_name = $pe_category->personnel_evaluation_category_name ?>
                      <div class="row">
                        <div class="col-md-12">
                          <span><strong>Category: </strong> <?=$pe_cat_name?></span>
                        </div>
                      </div>
                      <hr>
                      <?php foreach ($pe_question as $pe_questions): $q_id = $pe_questions->personnel_evaluation_questions_id ?>
                        <div class="row">
                          <div class="col-md-12">
                            <span><strong>Question: </strong><?=$pe_questions->personnel_evaluation_questions_content?></span>
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
                            <?php for ($attempt = 1; $attempt <= 4; $attempt++): ?>
                              <tr>
                                <td><?=addOrdinalNumberSuffix($attempt)?></td>
                                <td>
                                  <?php
                                    $has_error = (!empty(form_error('offense'.$attempt.$q_id."[]")) ? "has-feedback has-error" : "" );
                                  ?>
                                  <div class="form-group <?= $has_error ?>">
                                    <select class="form-control offense-select2" multiple name="offense<?=$attempt.$q_id?>[]" style="width: 100%;">
                                      <?php if (!empty(set_value("offense".$attempt.$q_id))): ?>
                                        <?php foreach (set_value("offense".$attempt.$q_id) as $option_value): ?>
                                          <option selected value="<?= $option_value ?>"><?= $option_value ?></option>
                                        <?php endforeach ?>
                                      <?php endif ?>
                                    </select>
                                    <?=form_error("offense".$attempt.$q_id."[]",'<span class="help-block">','</span>')?>
                                  </div>
                                </td>
                                <td>
                                  <?php
                                    $has_error = (!empty(form_error('rate'.$attempt.$q_id."[]")) ? "has-feedback has-error" : "" );
                                  ?>
                                  <div class="form-group <?= $has_error ?>" >
                                    <select class="form-control rate-select2" multiple name="rate<?=$attempt.$q_id?>[]" style="width: 100%;">
                                        <?php for ($i = 0; $i <= 5; $i++): ?>
                                          <?php $selected = in_array($i,set_value("rate".$attempt.$q_id)) ? "selected" : "" ; ?>
                                          <option <?=$selected?> value="<?=$i?>"><?=$i?></option>
                                        <?php endfor ?>
                                    </select>
                                    <?=form_error("rate".$attempt.$q_id."[]",'<span class="help-block">','</span>')?>
                                  </div>
                                </td>
                              </tr>
                            <?php endfor ?>
                          </tbody>
                        </table>
                        <hr style='width: 100%; background-color: #fff; border-top: 3px double #8c8b8b;' />
                      <?php endforeach ?>
                      
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