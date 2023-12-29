<?php
    helper('CustomForm');
?>
<?= $this->extend('admin/components/dashboard/table');?>
<!-- CONTAINER -->
<?= $this->section('page-container'); ?>
    <div class="relative w-full text-right mb-5 bg-white rounded-md p-2">
        <?= gradientBlueButton([
            'type' => 'button',
            'onclick' => 'HandleCreate()',
        ], 'Add', 'fa-plus');?>

    </div>
    <form class="tableFilter relative flex flex-row gap-1 bg-white p-2 w-full mb-4 rounded-md items-start justify-between">
        <div class="w-3/4 grid md:grid-cols-4 gap-1">
            <?= inputText(['name' => 'name','placeholder' => 'Find name...','autocomplete' => 'off'])?>
        </div>
        <div class="">
            <?= clearButton([
                'type' => 'button',
                'onclick' => 'HandleClear()',
            ], 'Clear', 'fa-eraser');?>
        </div>
    </form>
    <div class="relative w-full">
        <div class="dataTable rounded-md p-2"></div>
    </div>
<?= $this->endSection(); ?>

<!-- JAVASCRIPT FUNCTION -->
<?= $this->section('table_function');?>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/modules/usergroup/constants.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/form.js');?>"></script>
<script>
    const rowAction = (cell, formatterParam) => {
        const data = cell.getRow().getData();
        const editBtn = {
            class: 'border border-blue-500 rounded-md hover:bg-blue-500 hover:text-white',
            type: 'button',
            onclick: `HandleEdit('${data.id}')`
        };
        let html = addButton(editBtn, 'Edit', 'fa-edit');
        html += addButton({
            class: 'ml-2 border border-red-500 rounded-md hover:bg-red-500 hover:text-white',
            type: 'button',
            onclick: `HandleDelete('${data.id}','${data.name}')`
        }, 'Delete','fa-trash');
        return html;
    }

    $('.tableFilter').on('submit', HandleFind);
    
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

    let table = createTable('.dataTable', config);

    function HandleFind(e){
        e.preventDefault();
        const findData = $('.tableFilter :input').serializeArray();
        const params = {};
        for(const items of findData){
            params[items.name] = items.value;
        }
        const newConfig = {
            ...config,
            ajaxParams: params
        }
        table = createTable('.dataTable', newConfig);
    }

    function HandleClear(){
        $('.tableFilter')[0].reset();
        createTable('.dataTable', config);
    }

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

    function HandleDelete(id, title){
        ShowAlert({
            text: `Are you sure deleted ${title}?`
        }).then((result) => {
            if(result.isConfirmed){
                HttpRequest({
                    type: 'delete',
                    url: UrlMap.USERGROUP+'/'+id
                }).done((result) => {
                    console.log(result);
                    table.replaceData();
                })
            }
        })
    }
</script>
<?= $this->endSection('table_function');?>