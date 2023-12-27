const inputClass = 'mt-2 flex h-10 w-full items-center justify-center rounded-xl border bg-white p-3 text-sm outline-none border-gray-200';

const setAttr = (prop) => {
    let attr = '';
    for(const items in prop){
        attr += `${items}="${prop[items]}" `;
    }
    return attr;
}

const formInput = (fields) => {
    fields.class = fields?.class ? fields.class.concat(inputClass) : inputClass;
    const attr = setAttr(fields);
    return `<input ${attr}/>`;
}

const formSelect = (fields, option) => {
    fields.class = fields?.class ? fields.class.concat(inputClass) : inputClass;
    const attr = setAttr(fields);

    let options = '';
    for(const opt in option){
        options += `<option value="${opt}">${option[opt]}</option>`;
    }
    
    return `<select ${attr}>${options}</select>`;
}

const createForm = (data) => {
    let html = '<div class="fields">';
    for(const items of data){
        if(items?.label){
            html += `<label class="${items?.labelClass || ''}">${items?.label}</label>`;
        }
        html += '<div class="w-full relative">';
        if(['text','hidden'].includes(items?.type)){
            html += formInput(items?.fields);
        }
        if(items?.type == 'select'){
            html += formSelect(items?.fields, items?.options);
        }
        html += '</div>';
    }
    html += '</div>';
    return html;
}

const createButton = (label, icon, prop) => {
    const defaultClass = 'px-3 py-2 ';
    const btnClass = defaultClass.concat(prop?.class);
    const btnProperties = {
        ...prop,
        class: btnClass
    }
    const attr = setAttr(btnProperties);
    return `<button ${attr}><i class="fa ${icon}"></i> ${label}</button>`;
}