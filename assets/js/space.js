// File: assets/js/space.js

(function() {
    "use strict";

    // Fungsi ini tetap sama, untuk mengecek spasi
    function checkForbiddenSpaces(event) {
        if (event.target.value.includes(' ')) {
            alert('Spasi tidak diizinkan pada kolom ini!');
            event.target.value = event.target.value.replace(/\s/g, '');
        }
    }

    // Fungsi pintar untuk memasang event listener dengan aman
    function attachListenerIfElementExists(elementId, eventType, listenerFunction) {
        var element = document.getElementById(elementId);
        if (element) { // Hanya pasang listener JIKA elemennya ada
            element.addEventListener(eventType, listenerFunction);
        }
    }

    // Aplikasikan pada elemen di halaman login
    attachListenerIfElementExists('userEmail', 'input', checkForbiddenSpaces);
    attachListenerIfElementExists('userPassword', 'input', checkForbiddenSpaces);

})();