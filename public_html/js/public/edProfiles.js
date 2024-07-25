document.addEventListener("DOMContentLoaded", function() {
    let edTypeBlock= document.querySelector("#pills-fl");
    let edTypeBtns= edTypeBlock.querySelectorAll("a");

    let edLevelMenuList= document.querySelectorAll("a.edLevelMenu");
    let blockEdProfiles= document.querySelector('.blockEdProfiles');
    let tabContents = document.querySelectorAll('.tab-pane');

    let blockLevels= document.querySelector(".blockLevels");
    let setLevels= blockLevels.querySelectorAll("a.setLevel");
    let blockTypes= document.querySelector(".blockTypes");
    let setTypes= blockTypes.querySelectorAll("a.setType");
    let blockPorofiles= document.querySelector(".blockEdProfiles");
    let profiles= blockPorofiles.querySelectorAll(".edProfile");
    let ProfileBlock4Processing= blockEdProfiles.querySelectorAll(".ProfileBlock4Processing");
    showProfiles();
    setLevels.forEach((el,i) => {
        el.addEventListener("click", (e)=>{
            e.preventDefault();
            setLevels.forEach(tab => tab.classList.remove('active'));
            el.classList.add("active");
            showProfiles();
        });
    });
    setTypes.forEach((el,i) => {
        el.addEventListener("click", (e)=>{
            e.preventDefault();
            setTypes.forEach(tab => tab.classList.remove('active'));
            el.classList.add("active");
            showProfiles();
        });
    });
    function showProfiles(){
        let level= blockLevels.querySelector("a.active").getAttribute("data-level");
        let type= blockTypes.querySelector("a.active").getAttribute("data-type");
        ProfileBlock4Processing.forEach(el=>{
            if(el.getAttribute("data-type") == type)
                el.classList.remove("d-none");
            else
                el.classList.add("d-none");
        });
        profiles.forEach(el=>{
            if(el.getAttribute("data-level") == level){
                let list= el.querySelectorAll(".ProfileIndicatorBlock[data-type='"+type+"']");
                if(list.length)
                    el.classList.remove("d-none");
                else
                    el.classList.add("d-none");
            }
            else
                el.classList.add("d-none");
        });
        let boxNotFound= document.getElementById("not_found");
        if(
            blockPorofiles.querySelectorAll(".edProfile[data-level='"+level+"']:not(.d-none)").length === 0
            ||
            blockPorofiles.querySelectorAll(".edProfile:not([data-found='hide']):not(.d-none)").length === 0
        )
            boxNotFound.classList.remove("d-none");
        else
            boxNotFound.classList.add("d-none");
    }


    if(get("edLevel"))
        window.scrollTo(window.scrollX, blockEdProfiles.offsetTop - 260);


    // ОБРАБОТКА ВЕРХНЕГО МЕНЮ //
    edLevelMenuList.forEach((el,i) => {
        el.addEventListener("click", (e)=>{
            e.preventDefault();
            setLevels.forEach(tab => {
                if(el.getAttribute("data-level") == tab.getAttribute("data-level"))
                    tab.classList.add("active");
                else
                    tab.classList.remove("active");
            });
            showProfiles();
            window.scrollTo(window.scrollX, blockEdProfiles.offsetTop - 260);
        });
    });

    // получение параметра с адресной строки //
    function get(name){
        if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
            return decodeURIComponent(name[1]);
    }

    //  ПОИСК //
    function searchDepartments() {
        // Получаем значение из поля поиска
        var searchText = document.getElementById("search-depart").value.toLowerCase();

        // Получаем все элементы с классом "card-title"
        var cardTitles = document.getElementsByClassName("name");

        // Проходимся по всем элементам и скрываем те, которые не содержат введенный текст
        for (var i = 0; i < cardTitles.length; i++) {
            var cardTitleText = cardTitles[i].innerText.toLowerCase();
            var card = cardTitles[i].closest('.box-depart');
            if (cardTitleText.includes(searchText)) {
                card.style.display = "block";
                card.removeAttribute("data-found");
            } else {
                card.style.display = "none";
                card.setAttribute("data-found","hide");
            }
        }
        showProfiles();
    }
    // Добавляем обработчик события input к полю поиска
    document.getElementById("search-depart").addEventListener("input", searchDepartments);

    //  END ПОИСК //


    // Получение модального окна
    var modal = document.querySelector('.modal');
    let newmodal = new bootstrap.Modal(modal);
// Получение кнопки, которая открывает модальное окно
    var btn = document.querySelectorAll('.myBtn');

// Получение элемента <span>, который закрывает модальное окно
    var span = document.getElementsByClassName('btn-close')[0];

// Когда пользователь нажимает на кнопку, открыть модальное окно
   btn.forEach((el,i) => {
        el.addEventListener("click", (e)=>{
            modal.querySelector(".exams").innerHTML= document.querySelector('.exams[data-pid="'+el.getAttribute("data-pid")+'"]').innerHTML;
            console.log(document.querySelector('.exams[data-pid="'+el.getAttribute("data-pid")+'"]'));
            newmodal.show();
        });
    });

// Когда пользователь нажимает на <span> (x), закрыть модальное окно
    span.onclick = function() {
        newmodal.hide();
    }

// Когда пользователь нажимает в любое место за пределами модального окна, закрыть его
    window.onclick = function(event) {
        if (event.target == modal) {
            newmodal.hide();
        }
    }

});
