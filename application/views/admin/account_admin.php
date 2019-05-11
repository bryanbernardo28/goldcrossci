
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Accounts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Accounts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Admin Accounts</h3>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Address</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($acc_admin as $admins_acc):
                  ?>
                  <tr>
                    <td><?=$admins_acc->firstname?></td>
                    <td><?=$admins_acc->lastname?></td>
                    <td><?=$admins_acc->address?></td>
                    <td><?=$admins_acc->age?></td>
                    <td><?=$admins_acc->gender == 1 ? "Male" : "Female"?></td>
                    <td>
                      <a href="<?=base_url('admin/edit_admin/').$admins_acc->user_id?>" class="btn btn-warning">EDIT</a>
                      <button type="button" class="btn <?=$admins_acc->status == 0 ? 'btn-danger' : 'btn-defult' ?>" data-toggle="modal" data-target="#modal-default<?=$admins_acc->user_id?>"><?=$admins_acc->status == 0 ? 'Unblock' : 'Block' ?></button>
                      <div class="modal fade" id="modal-default<?=$admins_acc->user_id?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title"><?=$admins_acc->status == 0 ? 'Unblock' : 'Block' ?> Account</h4>
                            </div>
                            <!-- Form Register -->
                            <form action="<?=base_url('admin/delete_admin/').$admins_acc->user_id.'/'.$admins_acc->status?>" method="post">
                              <div class="modal-body">
                                Are you sure you want to <?=$admins_acc->status == 0 ? 'Unblock' : 'Block' ?> <b><?=$admins_acc->firstname." ".$admins_acc->lastname?></b> account?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                              </div>

                            </form>
                            <!-- End of Form Register -->
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                    </td>
                  </tr>
                  <?php
                  endforeach;
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
  <!-- /.content-wrapper