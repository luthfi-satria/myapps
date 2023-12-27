<?= $this->extend('admin/components/dashboard/table');?>
<!-- CONTAINER -->
<?= $this->section('page-container'); ?>
    <div class="relative w-full text-right mb-5">
        <button 
            type="button" 
            class="bg-blue-500 rounded-md text-white px-4 py-2 font-bold border border-blue-700 hover:bg-blue-600"
            onclick="HandleCreate()"    
        >
            <i class="fa fa-plus"></i>
            Add
        </button>
    </div>
    <div class="relative w-full">
        <div class="dataTable"></div>
    </div>
<?= $this->endSection(); ?>

<!-- JAVASCRIPT FUNCTION -->
<?= $this->section('table_function');?>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/modules/usergroup/constants.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/form.js');?>"></script>
<script>
    const rowAction = (cell, formatterParam) => {
        const data = cell.getRow().getData();
        const option = {
            class: 'border border-blue-500 rounded-md hover:bg-blue-500 hover:text-white',
            type: 'button',
            onclick: `HandleEdit('${data.id}')`
        };
        return addButton(option, 'Edit', 'fa-edit');
    }

    const config = {
        ajaxURL: UrlMap.USERGROUP+'/list',
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
                title: 'name',
                field: 'name',
                sorter: 'string',
                widthGrow: 2,
            },
        ]
    };

    const table = createTable('.dataTable', config);

    function HandleCreate(){
        const prop = Usergroup();
        const form = createForm(prop);
        const button = createButton('Insert','fa-save', {
            type: 'button',
            class: 'bg-red-500 text-white hover:bg-red-600 cursor-pointer',
            onclick: `HandleInsert()`
        })
        $('#modal_header').text('Add Usergroup');
        $('#modal_body').html(form);
        $('#modal_footer').html(button);
        $('#showModal').show();
    }

    function HandleEdit(id){
        HttpRequest({
        type: 'GET',
        url: UrlMap.USERGROUP+'/list/'+id
        }).done((result) => {
            const prop = Usergroup(result?.data);
            const form = createForm(prop);
            const button = createButton('update','fa-save', {
                type: 'button',
                class: 'bg-red-500 text-white hover:bg-red-600 cursor-pointer',
                onclick: `HandleUpdate(${result?.data?.id})`
            })
            $('#modal_header').text('Edit Usergroup');
            $('#modal_body').html(form);
            $('#modal_footer').html(button);
            $('#showModal').show();
        });
    }

    function HandleInsert(){
        HttpRequest({
            type: 'POST',
            url: UrlMap.USERGROUP,
            data: JSON.stringify({
                name: $('#inp_name').val()
            }),
        }).done((result) => {
            $('#showModal').hide();
            table.replaceData();
        });        
    }

    function HandleUpdate(id){
        HttpRequest({
            type: 'PUT',
            url: UrlMap.USERGROUP+'/'+id,
            data: JSON.stringify({
                name: $('#inp_name').val()
            }),
        }).done((result) => {
            $('#showModal').hide();
            table.replaceData();
        });
    }

    function HandleDelete(){

    }
</script>
<?= $this->endSection('table_function');?>