<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php echo e(active('/')); ?>">
                <a href="<?php echo e(url('/')); ?>">
                    <i class="fa fa-dashboard"></i> 
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="<?php echo e(active('slideBanner')); ?>">
                <a href="<?php echo e(url('/slideBanner')); ?>">
                    <i class="fa fa-angle-double-right"></i> 
                    <span>Slide Banner</span>
                </a>
            </li>
            <li class="<?php echo e(active('tentang')); ?>">
                <a href="<?php echo e(url('/tentang')); ?>">
                    <i class="fa fa-angle-double-right"></i> 
                    <span>Tentang</span>
                </a>
            </li>
            <li class="<?php echo e(active('publikasiCms')); ?>">
                <a href="<?php echo e(url('/publikasiCms')); ?>">
                    <i class="fa fa-angle-double-right"></i> 
                    <span>Publikasi</span>
                </a>
            </li>
            <li class="<?php echo e(active('peraturan')); ?>">
                <a href="<?php echo e(url('/peraturan')); ?>">
                    <i class="fa fa-angle-double-right"></i> 
                    <span>Peraturan</span>
                </a>
            </li>
            <li class="<?php echo e(active('basisData')); ?>">
                <a href="<?php echo e(url('/basisData')); ?>">
                    <i class="fa fa-angle-double-right"></i> 
                    <span>Basis Data</span>
                </a>
            </li>
            <li class="<?php echo e(active('kontak')); ?>">
                <a href="<?php echo e(url('/kontak')); ?>">
                    <i class="fa fa-angle-double-right"></i> 
                    <span>Kontak</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-angle-double-right"></i> 
                    <span>Website Setting</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-angle-double-right"></i> 
                    <span>CMS Account</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>