document.addEventListener("DOMContentLoaded", function() {
    let confirmModalBlock= document.getElementById('confirmModal');
    let confirmModal = new bootstrap.Modal(confirmModalBlock);
    let listRemoveLinks= document.querySelectorAll(".linkRemove");
    listRemoveLinks.forEach(el=>{
        el.addEventListener("click", event=>{
            event.preventDefault();
            confirmModalBlock.querySelector(".modal-title").textContent= el.getAttribute("data-title");
            confirmModalBlock.querySelector(".modal-body").textContent= el.getAttribute("data-message");
            confirmModalBlock.querySelector("a.btnSuccess").setAttribute("href",el.getAttribute("href"));
            confirmModal.show();
        });
    });
});
