
document.getElementById("easterEgg").addEventListener('click', function(event) {
    window.open('./easterEgg/easterEgg.html');
})

// Add a timer to supress our notifications after 3 seconds
setTimeout(function () {
    document.querySelector('#notification_container .content').remove();
}, 3000);

setTimeout(function () {
    document.querySelector('#notification_container .content_notif_correct').remove();
}, 3000);
