<div class="container mt-20 mx-auto w-1/2">
    <!-- component -->

    <head>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <script>
            var cont = 0;

            function loopSlider() {
                var xx = setInterval(function() {
                    switch (cont) {
                        case 0: {
                            $("#slider-1").fadeOut(400);
                            $("#slider-2").delay(400).fadeIn(400);
                            $("#sButton1").removeClass("bg-gray-900");
                            $("#sButton2").addClass("bg-gray-900");
                            cont = 1;

                            break;
                        }
                        case 1: {

                            $("#slider-2").fadeOut(400);
                            $("#slider-1").delay(400).fadeIn(400);
                            $("#sButton2").removeClass("bg-gray-900");
                            $("#sButton1").addClass("bg-gray-900");

                            cont = 0;

                            break;
                        }


                    }
                }, 9000);

            }

            function reinitLoop(time) {
                clearInterval(xx);
                setTimeout(loopSlider(), time);
            }



            function sliderButton1() {

                $("#slider-2").fadeOut(400);
                $("#slider-1").delay(400).fadeIn(400);
                $("#sButton2").removeClass("bg-gray-900");
                $("#sButton1").addClass("bg-gray-900");
                reinitLoop(4000);
                cont = 0

            }

            function sliderButton2() {
                $("#slider-1").fadeOut(400);
                $("#slider-2").delay(400).fadeIn(400);
                $("#sButton1").removeClass("bg-gray-900");
                $("#sButton2").addClass("bg-gray-900");
                reinitLoop(4000);
                cont = 1

            }

            $(window).ready(function() {
                $("#slider-2").hide();
                $("#sButton1").addClass("bg-gray-900");


                loopSlider();






            });
        </script>
    </head>

    <div>
        <div class="sliderAx">
            <div id="slider-1" class="container mx-auto">
                <div class="bg-cover bg-center h-full text-white py-56 rounded shadow-xl px-10 object-fill dark:shadow-gray-400"
                    style="background-image: url({{ asset('images/inventory/inventory1.png') }})">
                </div> <!-- container -->
                <br>
            </div>

            <div id="slider-2" class="container mx-auto">
                <div class="bg-cover bg-top min-h-fit text-white py-56 rounded shadow-xl px-10 object-fill dark:shadow-gray-400"
                    style="background-image: url({{ asset('images/inventory/inventory2.png') }})">
                </div> <!-- container -->
                <br>
            </div>
        </div>
        <div class="flex justify-between w-12 mx-auto pb-2">
            <button id="sButton1" onclick="sliderButton1()" class="bg-gray-500 rounded-full w-4 pb-2 "></button>
            <button id="sButton2" onclick="sliderButton2() " class="bg-gray-500 rounded-full w-4 p-2"></button>
        </div>

    </div>
</div>
