
document.getElementById("easterEgg").addEventListener('click', function(event) {
    window.open('./easterEgg/easterEgg.html');
})

var selectCompte = document.getElementById( 'menuDeroulan' );

selectCompte.addEventListener('change',(event)=> {
let item      = event.target;
let data      = item.options[item.selectedIndex];
let fullData  = JSON.parse( data.getAttribute( 'data-full' ) );

// Pre fill all inputs
let inputs    = document.querySelectorAll( '#editInfoCompte input, #editInfoCompte select' );

inputs.forEach( function( item, i ) {
    if( item.getAttribute( 'type' ) != 'submit' ) {
    let name = item.getAttribute( 'name' );

    item.value = fullData[name];
    }
});

});

let item = document.getElementById( 'editBtn' );

item.addEventListener( 'click', function() {
    let body = document.getElementsByTagName( 'body' )[0];

    body.classList.toggle( 'editPage' );
})
    
