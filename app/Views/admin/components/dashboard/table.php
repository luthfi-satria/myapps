<?= $this->extend('admin/main_container'); ?>
<?= $this->section('main_container'); ?>
<div class="page-container flex flex-col w-full relative items-start justify-center">
    <?= $this->renderSection('page-container'); ?>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js_addon'); ?>
    <link href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator_modern.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/admin/table.js');?>"></script>
    <?= $this->renderSection('table_function');?>
<?= $this->endSection(); ?>

<?= $this->section('stylesheet'); ?>
    
<?= $this->endSection(); ?>