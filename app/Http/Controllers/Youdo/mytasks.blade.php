@extends("layouts.app")

@section("content")


<div class="mx-auto w-10/12 my-10">
    <div class="grid grid-cols-3 gap-x-10">
        <div class="col-span-2">
            <div class="border-b">
                <!-- Tabs -->
                <div class="w-full bg-[#f8f7ee] px-5 py-5">

                    <ul id="tabs" class="inline-flex w-full">
                        <li class="rounded-t px-3 py-1"><a id="default-tab" href="#first">Я исполнитель</a></li>
                        <li class="rounded-t px-3 py-1"><a href="#second">Я заказчик</a></li>
                    </ul>

                </div>
            </div>

    <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first">
                    <div id="scrollbar" class="w-full h-screen blog1">
                        <div class="w-full overflow-y-scroll w-full h-screen">
                            <div class="w-full border hover:bg-blue-100">
                                <div class="w-11/12 h-12 m-4">
                                    <div class="float-left w-9/12">
                                        <i class="fas fa-user-circle text-4xl float-left text-blue-400"></i>
                                        <a href="#" class="text-lg text-blue-400 hover:text-red-400">
                                            Оценить консультацию по телефону.
                                        </a>
                                        <p class="text-sm ml-12mt-4">
                                            ВНИМАНИЕ!!! Это задание за хороший отзыв для вас, не за деньги!!!
                                        </p>
                                    </div>
                                    <div class="float-right w-1/4 text-right">
                                        <a href="#" class="text-lg">100 000 sum</a>
                                        <p class="text-sm ml-12mt-4">Спортмастер</p>
                                        <p class="text-sm ml-12mt-4">Нет отзывов</p>
                                    </div>
                                </div>
                                <div class="w-11/12 h-12 m-4">
                                    <div class="mx-auto w-9/12">
                                        <button type="button" class="bg-[#ffebad] py-1 rounded-full px-4 my-4 text-gray-500 text-xs">Вакансия</button>
                                        <button type="button" class="bg-[#f4f0ff] py-1 rounded-full px-4 my-4 text-gray-500 text-xs">Бесплатный отклик</button>
                                        <button type="button" class="bg-[#ffe8e8] py-1  rounded-full px-4 my-4 text-gray-500 text-xs">🔥Промо</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input id="suggest" class="hidden" type="text">
                    <button id="mpshow" class="hidden"></button>

                    <div class="w-1/2 mx-auto">
                        <img src="https://css-static.youdo.com/assets/71201/i/not-found-49ad008e444789b0c0ce43a7456c263f.svg" alt="">
                    </div>
                </div>

                <div id="second" class="hidden">
                    <input id="suggest" class="hidden" type="text">
                    <button id="mpshow" class="hidden">Найти</button>
                    <div id="scrollbar" class="w-full h-screen blog1">
                        <div class="w-full overflow-y-scroll w-full h-screen">
                            <div class="w-full border hover:bg-blue-100">
                                <div class="w-11/12 h-12 m-4">
                                    <div class="float-left w-9/12">
                                        <i class="fas fa-user-circle text-4xl float-left text-blue-400"></i>
                                        <a href="#" class="text-lg text-blue-400 hover:text-red-400">
                                            Оценить консультацию по телефону.
                                        </a>
                                        <p class="text-sm ml-12mt-4">
                                            ВНИМАНИЕ!!! Это задание за хороший отзыв для вас, не за деньги!!!
                                        </p>
                                    </div>
                                    <div class="float-right w-1/4 text-right">
                                        <a href="#" class="text-lg">100 000 sum</a><p class="text-sm ml-12mt-4">Спортмастер</p>
                                        <p class="text-sm ml-12mt-4">Нет отзывов</p>
                                    </div>
                                </div>
                                <div class="w-11/12 h-12 m-4">
                                    <div class="mx-auto w-9/12">
                                        <button type="button" class="bg-[#ffebad] py-1 rounded-full px-4 my-4 text-gray-500 text-xs">Вакансия</button>
                                        <button type="button" class="bg-[#f4f0ff] py-1 rounded-full px-4 my-4 text-gray-500 text-xs">Бесплатный отклик</button>
                                        <button type="button" class="bg-[#ffe8e8] py-1  rounded-full px-4 my-4 text-gray-500 text-xs">🔥Промо</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- If page is empty -->
                    <div class="w-1/2 mx-auto">
                        <img src="https://css-static.youdo.com/assets/71201/i/become-an-executor-c1a1be93104435115c3e2d317aa61be6.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span">
            <div class="w-full h-full mt-5">
                <div id="map" class="h-40 rounded-lg w-full">
                </div>
                <div class="w-full h-full">
                    <x-faq/>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="mx-auto w-9/12 my-16">

        <!-- Tab Contents -->
        <div id="tab-contents">
            <div id="first">

                <div class="grid grid-cols-3 gap-x-10">
                    <div class="col-span-2">
                        <div class="w-full bg-[#f8f7ee] my-5">
                            <div class="px-5 py-5">

                                <div class="grid grid-cols-4 gap-4 mb-3">
                                    <a href="/offer-tasks"
                                       class="rounded border bg-gradient-to-b from-[#f5f5f5] to-[#e0e0e0] px-4 py-1">Я
                                        исполнитель</a>
                                    <a href="/my-tasks"
                                       class="rounded border bg-gradient-to-b from-[#d4d4d4] to-[#c1c1c1] px-4 py-1">Я
                                        заказчик</a>


                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="border-b">
                                <!-- Tabs -->
                                <ul id="tabs" class="inline-flex w-full">
                                    <li class="font-semibold rounded-t mr-5">Сортировать</li>
                                    <li class="bg-[#f8f7ee] mr-4"><a href="#datesort">по дате публикации</a></li>
                                    <li class="underline decoration-dotted mr-4"><a href="#fastsort">по срочности</a>
                                    </li>
                                    <li class="hover:text-red-500 mr-4"><a href="#geosort">по удалённости</a></li>
                                </ul>
                            </div>

                            <div id="scrollbar" class="w-full h-screen blog1">
                                <div class="w-full overflow-y-scroll w-full h-screen">
                                    <div class="w-full border hover:bg-blue-100">
                                        @foreach($tasks as $task)
                                            <div class="w-11/12 h-12 m-4">
                                                <div class="float-left w-9/12">
                                                    <i class="fas fa-user-circle text-4xl float-left text-blue-400"></i><a
                                                        href="#" class="text-lg text-blue-400 hover:text-red-400">
                                                        {{$task->name}}
                                                    </a>
                                                    <p class="text-sm ml-12mt-4">
                                                        {{$task->description}}
                                                    </p>
                                                </div>
                                                <div class="float-right w-1/4 text-right">
                                                    <a href="#" class="text-lg">{{$task->budget}} sum</a>
                                                    <p class="text-sm ml-12mt-4">Спортмастер</p>
                                                    <p class="text-sm ml-12mt-4">Нет отзывов</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="w-11/12 h-12 m-4">
                                            <div class="mx-auto w-9/12">
                                                <button type="button"
                                                        class="bg-[#ffebad] py-1 rounded-full px-4 my-4 text-gray-500 text-xs">
                                                    Вакансия
                                                </button>
                                                <button type="button"
                                                        class="bg-[#f4f0ff] py-1 rounded-full px-4 my-4 text-gray-500 text-xs">
                                                    Бесплатный отклик
                                                </button>
                                                <button type="button"
                                                        class="bg-[#ffe8e8] py-1  rounded-full px-4 my-4 text-gray-500 text-xs">
                                                    🔥Промо
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-1/2 mx-auto">
                                <img
                                    src="https://css-static.youdo.com/assets/71201/i/not-found-49ad008e444789b0c0ce43a7456c263f.svg"
                                    alt="">
                            </div>
                        </div>

                    </div>
                    <div class="w-full h-full mt-5">
                        <div id="map" class="h-40 my-5 rounded-lg w-full"></div>
                        <div class="w-full h-full">
                            <x-faq/>
                        </div>
                    </div>
                </div>

            </div>
            <div id="second" class="hidden">


            </div>

        </div>


    </div>

@endsection

@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=ru_RU"
            type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);

        function init() {
            var suggestView1 = new ymaps.SuggestView('suggest');
            var myMap = new ymaps.Map('map', {
                center: [55.74, 37.58],
                zoom: 15,
                controls: []
            });
            var searchControl = new ymaps.control.SearchControl({});
            myMap.controls.add(searchControl);
            $("#mpshow").click(function () {
                searchControl.search(document.getElementById('suggest').value);
            });
        }
    </script>

    <script>
        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("a");
        console.log(tabTogglers);

        tabTogglers.forEach(function (toggler) {
            toggler.addEventListener("click", function (e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabContents.children.length; i++) {


                    tabTogglers[i].parentElement.classList.remove("bg-gray-300");  tabContents.children[i].classList.remove("hidden");

                    tabTogglers[i].parentElement.classList.remove("border-orange-400", "border-b", "opacity-100");
                    tabContents.children[i].classList.remove("hidden");

                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");

                }
                e.target.parentElement.classList.add("bg-gray-300");
            });
        });

        document.getElementById("default-tab").click();

    </script>

@endsection