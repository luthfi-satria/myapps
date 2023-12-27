<?= $this->extend('admin/main_template'); ?>
<?= $this->section('section'); ?>
<div class="relative min-h-full bg-gray-50 dark:bg-gray-800">
    <?= $this->include('admin/components/dashboard/aside'); ?>
    <div class="relative">
        <?= $this->include('admin/components/dashboard/navbar'); ?>
        <div class="content-wrapper relative lg:pt-24 pl-2 pb-32 pt-12 min-h-[689px]">
            <div class="lg:ml-64 sm:ml-2 pl-10 pr-10">
                <?= $this->include('admin/components/dashboard/breadcrumbs');?>
                <?= $this->renderSection('main_container');?>
            </div>
        </div>
    </div>
    <!-- POPUP DIALOG (MODALS) -->
    <div id="showModal" class="hidden fixed top-0 left-0 w-full h-screen bg-black bg-opacity-30 z-50 items-center justify-center">
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-96 max-w-full shadow-lg transform transition-all duration-300">
                <!-- MODAL HEADER -->
                <div class="flex justify-between items-center border-b-2 border-gray-200 pb-4">
                    <h2 id="modal_header" class="text-2xl font-semibold">
                        <?= $this->renderSection('modalTitle'); ?>
                    </h2>
                    <button onclick="$('#showModal').hide()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                        <i class="fa fa-close text-md"></i>
                    </button>
                </div>
    
                <div id="modal_body" class="mt-6 space-y-4">
                    <?= $this->renderSection('modalBody'); ?>
                </div>
                <div id="modal_footer" class="bg-gray-50 py-3 sm:flex sm:flex-row-reverse">
                    <?= $this->renderSection('modalAction'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript') ?>
    <script type="text/javascript" src="<?php echo base_url('assets/js/admin/admin.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/admin/menus.js');?>"></script>
    <?= $this->renderSection('js_addon'); ?>
<?= $this->endSection(); ?>