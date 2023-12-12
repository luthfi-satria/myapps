let db;
dbInit();
function dbInit(){
    if(!window.indexedDB){
        console.log('Your Browser is not support indexedDB');
        return;
    }

    const request = window.indexedDB.open('MYAPPS', 1);
    request.addEventListener('error', () => console.error('ERROR OPENING DB'));
    request.addEventListener('success', () => {
        console.log('DB OPENED');
        db = request.result;
    });
    request.addEventListener('upgradeneeded', (init) => {
        db = init.target.result;
        db.onerror = () => {
            console.log('ERROR LOADING DB');
        };
        const table = db.createObjectStore('data', { keyPath: 'id', autoIncrement: true});

        table.createIndex('title','title', {unique: false});
        table.createIndex('body','body', {unique: false});
    });
}

function addIndexes(data){
    const transaction = db.transaction(['data'],'readwrite');
    const objectStore = transaction.objectStore('data');
    const query = objectStore.add(data);

    return query;
}

$(document).ready(function () {
    $('.nav-btn').on('focus', function(){
        $(this).parent('div').next('div').removeClass('hidden');
    }).on('focusout', function(){
        $(this).parent('div').next('div').addClass('hidden');
    });    
});