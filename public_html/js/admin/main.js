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
document.addEventListener("DOMContentLoaded", function() {
    let list= document.querySelectorAll(".changeVisible");
    list.forEach(el=>{
        el.addEventListener("change", event=>{
            if(el.hasAttribute("checked"))
                el.removeAttribute("checked");
            else
                el.setAttribute("checked","true");
            fetch(el.getAttribute("data-link"),{
                method: "post",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: el.getAttribute("data-id"),
                    display: el.hasAttribute("checked")?1:0,
                }),
            })
                .then(response => {return response.text();})
                .then(data =>{
                    console.log(data);
                });

        });
    });
});
