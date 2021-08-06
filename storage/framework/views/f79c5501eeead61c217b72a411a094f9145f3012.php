<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Peraturan
            <!-- <small>Control panel</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Peraturan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php if(Session::get('alert')): ?>
                            <div class="alert alert-danger" id="alert">
                                <div style="text-align: center;"><?php echo e(Session::get('alert')); ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if(Session::get('success')): ?>
                            <div class="alert alert-success" id="alert">
                                <div style="text-align: center;"><?php echo e(Session::get('success')); ?></div>
                            </div>
                        <?php endif; ?>
            
                        <h3 class="box-title">Peraturan</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-primary btn-sm peraturanAdd-modal">
                                <i class="fa fa-plus" data-toggle="tooltip" title="Add Data"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="peraturan" class="table table-bordered table-hover table-condensed table-striped display" style="width:100%">
                            <thead>
                                <tr>
                                    <th id="thead_tffot">No</th>
                                    <th id="thead_tffot">Deskripsi</th>
                                    <th id="thead_tffot">Peraturan</th>
                                    <th id="thead_tffot">Status</th>
                                    <th id="thead_tffot">Edit</th>
                                    <th id="thead_tffot">Delete</th> 
                                </tr> 
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td id="td1"><?php echo e(++$i); ?></td>
                                    <td id="td4"><?php echo e($data->deskripsi); ?></td>
                                    <td id="td4"><?php echo e($data->peraturan); ?></td>
                                    <?php
                                        if ($data->status==1) {
                                            echo "<td id='td1'><span class='label label-success'>Active</span></td>";
                                        } else if ($data->status==2) {
                                            echo "<td id='td1'><span class='label label-danger'>Inactive</span></td>";
                                        }
                                    ?>
                                    <td id="td3">
                                        <a id="editPeraturan" title="Update Data" class="btn btn-success btn-sm" data-toggle="modal" data-target='#peraturanEdit' data-id="<?php echo e($data->id); ?>">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                    <td id="td3">
                                        <a id="deletePeraturan" title="Delete Data" class="btn btn-danger btn-sm deletePeraturan" data-id="<?php echo e($data->id); ?>">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th id="thead_tffot">No</th>
                                    <th id="thead_tffot">Deskripsi</th>
                                    <th id="thead_tffot">Peraturan</th>
                                    <th id="thead_tffot">Status</th>
                                    <th id="thead_tffot">Edit</th>
                                    <th id="thead_tffot">Delete</th> 
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- ADD DATA -->
        <div id="peraturanAdd" class="modal fade" role="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo e(url('/peraturan/store')); ?>" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                            <div class="form-group">
                                <label>Deskripsi<b style="color: red;">*</b></label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi" required>
                            </div>
                            <div class="form-group">
                                <label>Peraturan<b style="color: red;">*</b></label>
                                <input type="text" name="peraturan" id="peraturan" class="form-control" placeholder="Peraturan" required>
                            </div>
                            <div class="form-group">
                                <label>Status<b style="color: red;">*</b></label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="">--</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDIT DATA -->
        <div id="peraturanEdit" class="modal fade" role="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body" id="modal-edit">
                        <form method="POST" action="<?php echo e(url('/peraturan/update')); ?>" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" id="id" name="id">
                            <div class="form-group">
                                <label>Deskripsi<b style="color: red;">*</b></label>
                                <input type="text" name="deskripsi_edit" id="deskripsi_edit" class="form-control" placeholder="Deskripsi" required>
                            </div>
                            <div class="form-group">
                                <label>Peraturan<b style="color: red;">*</b></label>
                                <input type="text" name="peraturan_edit" id="peraturan_edit" class="form-control" placeholder="Peraturan" required>
                            </div>
                            <div class="form-group">
                                <label>Status<b style="color: red;">*</b></label>
                                <select class="form-control" name="status_edit" id="status_edit">
                                    <option value="">--</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>