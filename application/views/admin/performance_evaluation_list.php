<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Performance Evalution List
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="<?=base_url('admin/add_performance_evaluation')?>" class="btn btn-primary btn-flat">Add Category</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>#</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php if ($category): ?>
                  <?php foreach ($category as $category_value): $cat_id = $category_value->category_id; ?>
                    <tr>
                      <td><?= $cat_id ?></td>
                      <td><?= $category_value->category_name ?></td>
                      <td>
                        <a href="<?=base_url('admin/edit_performance_evaluation/'.$cat_id)?>" class="btn btn-info btn-flat">Edit</a>
                        <a href="<?=base_url('admin/delete_performance_evaluation/'.$cat_id)?>" class="btn btn-danger btn-flat">Delete</a>
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