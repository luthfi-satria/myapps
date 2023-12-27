function createTable(tableId, config){
    const ajaxConfig = config?.ajaxConfig || {};
    if(Object.keys(ajaxConfig).length > 0){
        delete config?.ajaxConfig;
    }
    
    return new Tabulator(tableId, {
        ajaxConfig: {
            headers: {
                Authorization: `Bearer ${AuthToken}`,
                'X-Requested-With' : 'XMLHttpRequest',
            },
            ...ajaxConfig
        },
        height: "311px",
        layout: "fitColumns",
        resizeColumnFit: true,
        responsiveLayout: 'hide',
        // renderHorizontal:"virtual",
        progressiveLoad: "scroll",
        // pagination: true,
        // paginationMode: 'remote',
        paginationSize: 20,
        placeholder: 'No data set',
        selectable: false,
        ...config
    });
}

function addButton(option, label='', icon=''){
    const rowActionBtnStyle = 'text-sm px-2 py-1';
    option.class = option?.class ? option.class.concat(' ', rowActionBtnStyle) : rowActionBtnStyle;

    let attr = '';
    for(const items in option){
        attr += `${items}="${option[items]}"`;
    }

    let element = `<button ${attr}>`;
            element += '<i class="mr-[5px] fa '+icon+'"></i>';
            element += label;
        element += '</button>';
    return element;
}