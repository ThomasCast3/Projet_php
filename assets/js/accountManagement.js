
document.getElementById("easterEgg").addEventListener('click', function(event) {
    window.open('./easterEgg/easterEgg.html');
})

var selectCompte = document.getElementById( 'menuDeroulan' );

selectCompte.addEventListener('change',(event)=> {
    let item      = event.target;
    let data      = item.options[item.selectedIndex];
    let fullData  = JSON.parse( data.getAttribute( 'data-full' ) );

    // Pre fill all inputs
    let inputs    = document.querySelectorAll( '#editInfoCompte input, #editInfoCompte select, #deleteAccountForm input, #editInfoOperation input, #editInfoOperation select, #addOperation input' );

    inputs.forEach( function( item, i ) {
        if( item.getAttribute( 'type' ) != 'submit' ) {
            let name = item.getAttribute( 'name' );

            item.value = fullData[name];
        }
    });

});


/*
*********************************************************************************************************
--------------------------------------------   EDIT BUTTON   --------------------------------------------
*********************************************************************************************************
*/

let item = document.getElementById( 'editBtn' );

item.addEventListener( 'click', function() {
    let body = document.getElementsByTagName( 'body' )[0];

    body.classList.toggle( 'editPage' );
})

let item2 = document.getElementById( 'editOperationBtn' );

item2.addEventListener( 'click', function() {
    let body = document.getElementsByTagName( 'body' )[0];

    body.classList.toggle( 'editOperationPage' );
    console.log('test ptn')
})

/*
*********************************************************************************************************
-------------------------------------------   TIMEOUT TIMER   -------------------------------------------
*********************************************************************************************************
*/

// Add a timer to supress our notifications after 3 seconds
setTimeout(function () {
    document.querySelector('#notification_container .content').remove();
}, 3000);

setTimeout(function () {
    document.querySelector('#notification_container .content_notif_correct').remove();
}, 3000);
    
