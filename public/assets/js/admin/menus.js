$(document).ready(function () {
    loadMenus();
    $('.nav-btn').on('click', function(e){
        $(this).parent('div').next('div').toggleClass('hidden');
        $('.nav-btn').not(this).parent('div').next('div').addClass('hidden');
    });
      
    $('#profile_signout').on('click', function(){
        SignOut();
    });
});

// LOAD MENUS
function loadMenus(){
    const MenuStruct = sessionStorage.getItem('MENUS');
    if(!MenuStruct){
        HttpRequest({
            type: 'POST',
            url: UrlMap.MENU_ACCESS,
        },'#menu_loader').done((result) => {
            if(result){
                setTimeout(() => {
                    sessionStorage.setItem('MENUS', JSON.stringify(result.menus));
                    buildMenus();
                }, 500);
            }
        });
    }else{
        buildMenus();
    }
}

function buildMenus(){
    const MenuStruct = sessionStorage.getItem('MENUS');
    
    if(MenuStruct){
        const StructArray = JSON.parse(MenuStruct);
        const menus = MenusTrees(StructArray);
        $('#mob_menu ul, .sidebar').append(menus.join(''));
    }

    $('a.parent-menu').on('click', function(){
        $(this).next('span').find('i.fa').toggleClass('fa-chevron-right fa-chevron-down');
        $(this).parents('li').next('ul').toggleClass('hidden');
    });
}

function MenusTrees(StructArray, parent_id=null, level=0){
    const menusArray = [];
    let i = 0;
    for(const items of StructArray){
        if(items?.parent_id == parent_id){
            const children = MenusTrees(StructArray, items?.id);
            const href = children.length == 0 ? `href="${baseUrl}admin/${items?.route_url}"` : '';
            const isParent = children.length > 0 ? 'parent-menu' : '';
            let element = '<li class="mt-1 flex items-center px-4 duration-300 cursor-pointer hover:bg-gray-200">';
                element += `<a ${href} class="flex w-full py-2 items-center ${isParent}">`;
                    element += items?.icon ? '<i class="fa fa-'+items?.icon+' text-center w-5 opacity-75"></i>' : '';
                    element += '<span class="ml-2 overflow-hidden text-ellipsis whitespace-nowrap capitalize">';
                        element += items?.label;
                    element += '</span>';
                element += '</a>';
                    if(children.length > 0){
                        element += '<span class="w-5 text-right py-2">';
                            element += `<i class="fa fa-chevron-right"></i>`;
                        element += '</span>';
                    }
                element += '</li>';
                if(children.length > 0){
                    element += '<ul class="hidden mt-2 w-auto pl-14 ml-2">';
                        element += children.join('');
                    element += '</ul>';
                }

            menusArray.push(element);
            i++;
        }
    }
    return menusArray;
}