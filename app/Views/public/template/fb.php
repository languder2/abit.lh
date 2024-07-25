    <div class="fb_block fixed-bottom bg-white">
        <form method="post" action="/feedback" id="fb_form" class="my-3">
            <div class="container-lg position-relative">
                <a href="#" class="close">X</a>
                <div class="fb_content clearfix">
                    <h3 class="px-1">Задать вопрос</h3>
                    <p class="px-1">
                        Оставьте свои контактные данные, и мы свяжемся с вами.
                    </p>
                    <div class="row row-cols-1 row-cols-md-2 pb-4 ">
                        <div class="col">
                            <div class="form-floating my-3 px-1">
                                <input type="text" class="form-control h-auto" required  id="fb_name" name="form[name]" placeholder="">
                                <label for="fb_name" class="h-auto w-auto">Введите ваше имя <i style="color:red">*</i></label>
                            </div>
                            <div class="form-floating my-3 px-1">
                                <input type="text" class="form-control h-auto" required  id="fb_phone" name="form[phone]" placeholder="">
                                <label for="fb_phone" class="h-auto w-auto">Ваш контактный телефон <i style="color:red">*</i></label>
                            </div>
                            <div class="form-floating my-3 px-1">
                                <input type="text" class="form-control h-auto" required  id="fb_email" name="form[email]" placeholder="">
                                <label for="fb_email" class="h-auto w-auto">Ваш E-mail <i style="color:red">*</i></label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating my-3 px-1">
                                <textarea class="form-control h-auto required" id="fb_message" name="form[message]"></textarea>
                                <label for="fb_message">Введите ваш вопрос <i style="color:red">*</i></label>
                            </div>
                        </div>
                    </div>
                    <button class="d-inline-block bg-white rounded-pill w-auto float-start">Отправить</button>
                    <p class="offers d-inline-block ms-3 pt-1 float-start">
                        Нажимая на кнопку «Отправить» вы соглашаетесь с<br> политикой по обработке персональных данных.
                    </p>
                </div>
            </div>
        </form>
    </div>
    <div class="fb_response fixed-bottom bg-white">
        <div class="container-lg position-relative py-4">
            <a href="#" class="close mt-3">X</a>
            <h3 class="text-center">
                Спасибо. Ваш запрос отправлен.
                <br>
                Мы свяжемся с Вами в ближайшее время!
            </h3>
            <div class="text-center py-2">
                <button class="d-inline-block text-white rounded-pill w-auto btnClose">Закрыть</button>
            </div>
        </div>
    </div>
