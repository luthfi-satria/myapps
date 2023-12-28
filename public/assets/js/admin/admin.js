let AuthToken = sessionStorage.getItem('TOKEN');
if(!AuthToken) {
    window.location = baseUrl+'/auth/login';
}

const UrlMap = {
    LOGIN: baseUrl+'auth/login',
    VALIDATE_TOKEN: baseUrl+'auth/token/validate',
    MENU_ACCESS: baseUrl+'admin/menus/access',
    SETTINGS: baseUrl+'admin/configuration',
    USERGROUP: baseUrl+'admin/usergroup',
    USER: baseUrl+'admin/user'
}

$(document).ready(function () {
    validate_token();
});

// VALIDATE TOKEN
function validate_token(){
    HttpRequest({
        type: 'POST',
        url: UrlMap.VALIDATE_TOKEN
    }).done((result) => {
        const user = `${result?.data?.fname} ${result?.data?.lname}` || 'user';
        $('#welcome_user').text(user);
    })
}

function HttpRequest(config, loaderId = null){
    const Loader = loaderId || '#loader';
    const RequestConfig = {
        type: 'GET',
        url: baseUrl,
        dataType: 'json',
        contentType: 'application/json',
        beforeSend: () => {
            $(Loader).removeClass('hidden');
        },
        headers: {
            Authorization: `Bearer ${AuthToken}`,
            'X-Requested-With' : 'XMLHttpRequest',
        },
        ...config
    };

    return $.ajax(RequestConfig)
        .fail((response) => {
            if(response.status == 401){
                sessionStorage.removeItem('TOKEN');
                window.location = UrlMap.LOGIN;
            }
        })
        .always(() => {
            setTimeout(() => {
                $(Loader).addClass('hidden');
            }, 2000);
        });
}

function SignOut(){
    sessionStorage.removeItem('TOKEN');
    sessionStorage.removeItem('MENUS');
    window.location = UrlMap.LOGIN;
}

function ShowAlert(init = {}){
    const config = {
        title: 'Info',
        text: 'Be carefull',
        icon: 'info',
        showCloseButton: true,
        showCancelButton: true,
        cancelButtonText: `<i class="fa fa-close"></i> Cancel`,
        ...init
    };
    return Swal.fire(config);
}