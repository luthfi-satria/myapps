const Usergroup = (prop) => {
    const addUsergroup = [
        {
            type: 'text',
            label: 'name',
            labelClass: 'px-2 font-bold',
            fields: {
                id: 'inp_name',
                name: 'name',
                value: prop?.name || '',
                placeholder: 'Usergroup name'
            }
        }
    ];

    return addUsergroup;
}