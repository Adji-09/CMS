<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kontak
            <!-- <small>Control panel</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Kontak</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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
    
                <h3 class="box-title">Kontak</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo e(url('/kontak/store')); ?>" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label>Nama<b style="color: red;">*</b></label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label>Email<b style="color: red;">*</b></label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label>No. Telpon<b style="color: red;">*</b></label>
                                    <input type="text" name="no_telpon" id="no_telpon" class="form-control" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="No. Telpon" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Pesan</label>
                                    <textarea name="pesan" id="konten" class="form-control" rows="10" cols="80" data-sample-short></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="box-footer col-md-12">
                                    <div class="pull-right">
                                        <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>