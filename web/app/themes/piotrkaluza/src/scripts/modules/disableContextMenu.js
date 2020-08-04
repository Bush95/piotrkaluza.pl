/**
* Disable right-click of mouse, F12 key, and save key combinations on page
* By Arthur Gareginyan (arthurgareginyan@gmail.com)
* For full source code, visit http://www.mycyberuniverse.com
*/

function disableContextMenu() {

    document.addEventListener("contextmenu", function(e){
        if (e.target.tagName == "IMG" && !e.target.parentNode.classList.has('block-post__thumb')) {
            console.warn('Hej! To zdjęcie jest moją własnością, nie kradnij go! :) Więcej informacji na http://www.piotrkaluza.pl/polityka-prywatnosci');
            e.preventDefault();
        }
    }, false);

    document.addEventListener("keydown", function(e) {

        // "I" key
        if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
            disabledEvent(e);
        }

        // "J" key
        if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            disabledEvent(e);
        }
        // "S" key + macOS
        if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
            disabledEvent(e);
        }
        // "U" key
        if (e.ctrlKey && e.keyCode == 85) {
            disabledEvent(e);
        }
        // "F12" key
        if (e.keyCode == 123) {
            disabledEvent(e);
        }
        }, false);

        function disabledEvent(event){
            if (e.stopPropagation){
            event.stopPropagation();
        } else if (window.event){
            window.event.cancelBubble = true;
        }

        e.preventDefault();
        return false;
    }
}

export default disableContextMenu;