function LoginAccount(){
    var Fields = $('#loginForm').serializeArray();
    var FormField = {};
    $.each(Fields, function (_, items){
        FormField[items.name] = items.value;
    });

    $.ajax({
        type: "POST",
        url: $(Fields).data('url'),
        data: FormField,
        dataType: "json",
    }).done((response) => {
        if(response.success == true){
            addIndexes({
                title: 'TOKEN',
                body: response.token,
            }).addEventListener('success', () => {
                window.location = response.url;
            });
        }
        else{
            console.log(response);
        }
    });
}    
