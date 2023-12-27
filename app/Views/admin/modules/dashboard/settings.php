<?= $this->extend('admin/components/dashboard/table');?>
<!-- CONTAINER -->
<?= $this->section('page-container'); ?>
    <div class="relative w-full">
        <div id="settingTable"></div>
    </div>
<?= $this->endSection(); ?>

<!-- MODAL -->
<?= $this->section('modalTitle'); ?>
Edit Settings
<?= $this->endSection(); ?>

<?= $this->section('modalBody'); ?>
    <?= $this->include('admin/components/settings/editForm'); ?>
<?= $this->endSection(); ?>

<?= $this->section('modalAction'); ?>
    <button 
        type="button"
        class="bg-red-500 rounded-md px-4 py-2 text-white text-md border-2 border-red-600 hover:bg-red-600"
        onclick="updateSetting()"
    >
        Update
    </button>
<?= $this->endSection(); ?>

<!-- JAVASCRIPT FUNCTION -->
<?= $this->section('table_function');?>
<script>
    const rowAction = (cell, formatterParam) => {
        const data = cell.getRow().getData();
        const option = {
            class: 'border border-blue-500 rounded-md hover:bg-blue-500 hover:text-white',
            type: 'button',
            onclick: `editSetting('${data.ckey}')`
        };
        return addButton(option, 'Edit', 'fa-edit');
    }

    const config = {
        ajaxURL: UrlMap.SETTINGS+'/list',
        columns: [
            {
                formatter: 'rownum',
                hozAlign: 'center',
                width: 40,
                frozen: true,
            },
            {
                formatter: rowAction,
                hozAlign: 'center',
                frozen: true,
            },
            {
                title: 'key',
                field: 'ckey',
                sorter: 'string',
                widthGrow: 2,
                frozen: true,
            },
            {
                title: 'name',
                field: 'name',
                sorter: 'string',
                widthGrow: 2,
            },
            {
                title: 'value',
                field: 'cval',
                sorter: 'string',
                widthGrow: 2,
            },
            {
                title: 'desc',
                field: 'description',
                sorter: 'string',
                widthGrow: 3,
            },
        ]
    };

    const table = createTable('#settingTable', config);

    function editSetting(ckey){
        HttpRequest({
        type: 'GET',
        url: UrlMap.SETTINGS+'/list/'+ckey
        }).done((result) => {
            $('#inp_key').val(result?.data?.ckey);
            $('#inp_name').val(result?.data?.name);
            $('#inp_value').val(result?.data?.cval);
            $('#inp_desc').val(result?.data?.description);
            $('#showModal').show();
        });
    }

    function updateSetting(){
        const data = $('#setting_form').serializeArray();
        let fdata = {};
        for(const items of data){
            fdata[items.name] = items.value;
        }
        
        HttpRequest({
            type: 'PUT',
            url: UrlMap.SETTINGS,
            data: JSON.stringify(fdata),
        }).done((result) => {
            $('#showModal').hide();
            table.replaceData();
        });
    }
</script>
<?= $this->endSection('table_function');?>