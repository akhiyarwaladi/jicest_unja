{{--
    Jambi landmarks slideshow (included from components/icon-jambi).

    A quiet photo moment between the fee band and the location section. Controls are
    real buttons with labels, every photo carries alt text, and the rotation is slow
    enough to read the captions: it pauses on hover/focus and does not run at all
    under prefers-reduced-motion.
--}}
<div class="slideshow-container h-full w-full bg-black" role="group" aria-label="Jambi landmarks">

    @foreach ($slide as $pic)
        <div class="mySlides fade relative">
            <div class="numbertext ed-mono flex justify-between w-full">
                <span>{{ $loop->index + 1 }} / {{ count($slide) }}</span>
                <button type="button" class="toggle-detail cursor-pointer ed-mono"
                    onclick="toggleDetail(event)">Hide detail</button>
            </div>
            <img src="{{ $pic['src'] }}" alt="{{ $pic['title'] }}" style="width:100%"
                class="w-full h-full object-cover">
            <div
                class="pointer-events-none bg-gradient-to-t from-black to-transparent w-full h-full absolute top-0 left-0">
            </div>
            <div class="absolute pointer-events-none top-0 left-0 w-full h-full flex items-end text-white">
                <div class="w-full p-10 flex flex-col items-center">
                    <header class="ed-display text-2xl detail title block">{{ $pic['title'] }}</header>
                    <div class="text-center text-[15px] leading-relaxed hidden md:block detail"
                        id="detail{{ $loop->index }}">
                        {{ $pic['desc'] }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Slide indicators: real buttons, keyboard reachable --}}
    <div class="w-full h-full absolute top-0 pointer-events-none left-0 flex justify-center items-end">
        <div class="pb-4">
            @for ($i = 0; $i < count($slide); $i++)
                <button type="button" class="dot pointer-events-auto scale-[0.8]"
                    onclick="currentSlide({{ $i + 1 }})" aria-label="Show landmark {{ $i + 1 }}"></button>
            @endfor
        </div>
    </div>

    {{-- Previous and next: real buttons with spoken labels --}}
    <div>
        <button type="button" class="prev" onclick="plusSlides(-1)" aria-label="Previous landmark">&#10094;</button>
        <button type="button" class="next" onclick="plusSlides(1)" aria-label="Next landmark">&#10095;</button>
    </div>
</div>

<script>
    let slideIndex = 1;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    let intervalId = null;

    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (let i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
            dots[i].removeAttribute("aria-current");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        dots[slideIndex - 1].setAttribute("aria-current", "true");
    }

    // Slow rotation: six seconds per slide, paused while the visitor is reading
    // (hover or keyboard focus) and never started under reduced motion.
    function advance() {
        slideIndex++;
        showSlides(slideIndex);
    }

    function startRotation() {
        if (intervalId || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        intervalId = setInterval(advance, 6000);
    }

    function stopRotation() {
        if (intervalId) {
            clearInterval(intervalId);
            intervalId = null;
        }
    }

    const container = document.querySelector('.slideshow-container');
    if (container) {
        container.addEventListener('mouseenter', stopRotation);
        container.addEventListener('mouseleave', startRotation);
        container.addEventListener('focusin', stopRotation);
        container.addEventListener('focusout', startRotation);
    }

    startRotation();

    function toggleDetail(event) {
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
                b.textContent = "Show detail";
            });
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
                b.textContent = "Hide detail";
            });
        }
    }
</script>
