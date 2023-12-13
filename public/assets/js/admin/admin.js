let AuthToken = sessionStorage.getItem('TOKEN');
if(!AuthToken) {
    window.location = baseUrl+'/auth/login';
}

const UrlMap = {
    LOGIN: baseUrl+'auth/login',
    REFRESH_TOKEN: baseUrl+'auth/refresh_token',
    MENU_ACCESS: baseUrl+'admin/menus/access',
}

$(document).ready(function () {
    loadMenus();
    $('.nav-btn').on('focus', function(){
        $(this).parent('div').next('div').removeClass('hidden');
    }).on('focusout', function(){
        $(this).parent('div').next('div').addClass('hidden');
    });    
});

// REFRESH TOKEN
function refresh_token(){
    $.ajax({
        type: "POST",
        url: UrlMap.REFRESH_TOKEN,
        headers: RequestHeader,
        dataType: "json",
        success: function (response) {
            console.log(response);
        }
    });
}

// LOAD MENUS
function loadMenus(){
    HttpRequest({
        type: 'POST',
        url: UrlMap.MENU_ACCESS,
    },'#menu_loader').done((result) => {
        console.log(result);
    });
}

function HttpRequest(config, loaderId = null){
    const Loader = loaderId || '#loader';
    const RequestConfig = {
        type: 'GET',
        url: baseUrl,
        dataType: 'json',
        beforeSend: () => {
            $(Loader).removeClass('hidden');
        },
        headers: {
            Authorization: `Bearer ${AuthToken}`,
        },
        ...config
    };

    return $.ajax(RequestConfig)
        .fail((response) => {
            if(response.status == 401){
                sessionStorage.removeItem('TOKEN');
                window.location = UrlMap.LOGIN;
            }
            console.log(response.status);
        })
        .always(() => {
            setTimeout(() => {
                $(Loader).addClass('hidden');
            }, 2000);
        });
}

