<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Personnel Evaluation Category
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Personnel Evaluation Offense</h3>
            <a href="<?=base_url('admin/personnel_evaluation_list')?>" class="btn btn-success btn-flat">Back</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Category</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php if ($pe_category): ?>
                  <?php foreach ($pe_category as $pe_category_value): $cat_id = $pe_category_value->personnel_evaluation_category_id; ?>
                    <tr>
                      <td><?= $pe_category_value->personnel_evaluation_category_name ?></td>
                      <td>
                        <?php $has_offense = (!in_array($cat_id,$pe_category_offense) ? 'disabled' : ''); ?>
                        <?php $has_offense_rev = (in_array($cat_id,$pe_category_offense) ? 'disabled' : ''); ?>
                        <a href="<?=base_url('admin/add_pe_offense/'.$cat_id)?>" class="btn btn-info btn-flat <?= $has_offense_rev ?>">Add Offense</a>
                        <a href="<?=base_url('admin/edit_pe_offense/'.$cat_id)?>" class="btn btn-primary btn-flat <?= $has_offense ?>">Edit Offense</a>
                        <a href="<?=base_url('admin/delete_pe_offense/'.$cat_id)?>" class="btn btn-danger btn-flat <?= $has_offense ?>">Delete Offense</a>
                        
                        <!-- <a href="<?=base_url('admin/view_pe_offense/'.$cat_id)?>" class="btn btn-primary btn-flat <?= $has_offense ?>">View Offense</a> -->
                        
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
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
<!-- /.content-wrapper -->