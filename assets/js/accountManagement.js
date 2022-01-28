
document.getElementById("easterEgg").addEventListener('click', function(event) {
    window.open('../../assets/easterEgg/easterEgg.html');
})


var selectCompte = document.getElementById( 'menuDeroulan' );

selectCompte.addEventListener('change',(event)=> {
    let item      = event.target;
    let data      = item.options[item.selectedIndex];
    let fullData  = JSON.parse( data.getAttribute( 'data-full' ) );

    // Pre fill all inputs
    let inputs    = document.querySelectorAll( '#editInfoCompte input, #editInfoCompte select, #deleteAccountForm input, #addOperation input' );

    inputs.forEach( function( item, i ) {
        if( item.getAttribute( 'type' ) != 'submit' ) {
            let name = item.getAttribute( 'name' );

            item.value = fullData[name];
        }
    });

    var champ  = document.getElementById('champcacher');

    champ.setAttribute('value', fullData['IdCompte']);

});

var selectCompte2 = document.getElementById( 'menuDeroulant' );

selectCompte2.addEventListener('change',(event)=> {
    let item2      = event.target;
    let data2      = item2.options[item2.selectedIndex];
    let fullData2  = JSON.parse( data2.getAttribute( 'data-full' ) );

    // Pre fill all inputs
    let inputs2    = document.querySelectorAll( '#editInfoOperation input, #editInfoOperation select');

    inputs2.forEach( function( item2, i ) {
        if( item2.getAttribute( 'type' ) != 'submit' ) {
            let name2 = item2.getAttribute( 'name' );

            item2.value = fullData2[name2];
        }
    });

    var champ2  = document.getElementById('champcacherOperation');

    champ2.setAttribute('value', fullData2['IdOperation']);

});


/*
*********************************************************************************************************
--------------------------------------------   EDIT BUTTON   --------------------------------------------
*********************************************************************************************************
*/

let editCount = document.getElementById( 'editBtn' );
editCount.addEventListener( 'click', function() {
    let body = document.getElementsByTagName( 'body' )[0];

    body.classList.toggle( 'editPage' );
})



let addOperation = document.getElementById( 'addOperationBtn' );
addOperation.addEventListener( 'click', function() {
    let body = document.getElementsByTagName( 'body' )[0];

    body.classList.toggle( 'addOperationPage' );
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
    
