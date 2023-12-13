<?= $this->extend('admin/main_template'); ?>
<?= $this->section('section'); ?>
<div class="relative min-h-full bg-gray-50 dark:bg-gray-800">
    <?= $this->include('admin/components/dashboard/aside'); ?>
    <div class="relative">
        <?= $this->include('admin/components/dashboard/navbar'); ?>
        <div class="content-wrapper relative lg:pt-24 pl-2 pb-32 pt-12 min-h-[689px]">
            <div class="lg:ml-64 sm:ml-2">
                CONTENT WRAPPER
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript') ?>
    <script type="text/javascript" src="<?php echo base_url('assets/js/admin/admin.js');?>"></script>
<?= $this->endSection(); ?>