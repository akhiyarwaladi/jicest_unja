<div class="slideshow-container h-full w-full bg-black">

    @foreach ($slide as $pic)
        <div class="mySlides fade relative">
            <div class="numbertext flex justify-between w-full">
                <div>{{ $loop->index + 1 }} / {{ count($slide) }}</div>
                <div class="cursor-pointer toggle-detail" onclick="toggleDetail(event)">Hide detail</div>
            </div>
            <img src="{{ $pic['src'] }}" style="width:100%" class="w-full h-full object-cover">
            <div
                class="pointer-events-none bg-gradient-to-t from-black to-transparent w-full h-full absolute top-0 left-0">
            </div>
            <div class="absolute pointer-events-none top-0 left-0 w-full h-full flex items-end text-white">
                <div class="w-full p-10 flex flex-col items-center">
                    <header class="text-xl font-semibold detail title block">{{ $pic['title'] }}</header>
                    <div class="text-center text-sm hidden md:block detail" id="detail{{ $loop->index }}">
                        {{ $pic['desc'] }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="">
        <div class="w-full h-full absolute top-0 pointer-events-none left-0 flex justify-center items-end">
            <div style="flex ">
                @for ($i = 0; $i < count($slide); $i++)
                    <span class="dot pointer-events-auto scale-[0.8]"
                        onclick="currentSlide({{ $i }})"></span>
                @endfor
            </div>
        </div>
    </div>
    <div>
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>



</div>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }

    function myIntervalFunction() {
        slideIndex++
        slideIndex = slideIndex % {{ count($slide) }}
        showSlides(slideIndex);
    }

    function toggleDetail(event, id) {
        const el = document.querySelectorAll(".detail");
        const but = document.querySelectorAll(".toggle-detail");
        if (el[0].classList.contains("md:block")) {
            el.forEach(e => {
                e.classList.add("md:hidden");
                e.classList.remove("md:block");
                if (e.classList.contains('title')) {
                    e.classList.add("hidden");
                    e.classList.remove("block");
                }
            });
            but.forEach(b => {
                b.textContent = "Show Details";
            })
        } else {
            el.forEach(e => {
                e.classList.remove("md:hidden");
                e.classList.add("md:block");
                if (e.classList.contains('title')) {
                    e.classList.remove("hidden");
                    e.classList.add("block");
                }
            });
            but.forEach(b => {
                b.textContent = "Hide Details";
            })
        }
    }
    const intervalId = setInterval(myIntervalFunction, 2000);
</script>
