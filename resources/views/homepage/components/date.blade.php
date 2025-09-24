<div class="bg-gradient-to-b from-orange-400 to-pink-500 p-10 text-white w-full">
    <header class="text-3xl font-bold text-center">IMPORTANT DATE</header>
    <div class="text-center text-sm">Do not miss any topic about the event</div>
    <div class="flex flex-col md:flex-row justify-center gap-8 mt-5">
        <div class="glassmorphism rounded-md overflow-hidden">
            <header class="bg-gradient-to-r text-center from-emerald-500 to-emerald-600 bg-opacity-75 p-2">Abstract
                Submission
                Deadline</header>
            <div class="bg-white bg-opacity-75 p-2 text-black flex flex-col items-center gap-2">
                <div class="w-full px-5 flex flex-col gap-2">
                    <div class="bg-white shadow-md text-emerald-600 font-semibold p-1 px-2 rounded-full w-full text-center">25 October 2024 OFFLINE</div>
                    <div class="bg-rose-500 font-semibold p-1 px-2 rounded-full w-full text-center text-white">27 October 2024 ONLINE</div>
                </div>
                <div>Time Remaining:</div>
                <div id="countdown-abstract" class="text-lg font-bold">Loading...</div>
            </div>
        </div>
        <div class="glassmorphism rounded-md overflow-hidden">
            <header class="bg-gradient-to-r text-center from-sky-500 to-sky-600 bg-opacity-75 p-2">Full Paper Submission
                Deadline</header>
            <div class="bg-white bg-opacity-75 p-2 text-black flex flex-col items-center gap-2">
                <div class="w-full px-5 flex flex-col gap-2">
                    <div class="bg-white shadow-md text-sky-600 font-semibold p-1 px-2 rounded-full w-full text-center">25 October 2024 OFFLINE</div>
                    <div class="bg-rose-500 font-semibold p-1 px-2 rounded-full w-full text-center text-white">27 October 2024 ONLINE</div>
                </div>
                <div>Time Remaining:</div>
                <div id="countdown-paper" class="text-lg font-bold">Loading...</div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to start a countdown to a specific date
    function startCountdown(targetDate, elementId) {
        const countdownTimer = setInterval(() => {
            const now = new Date().getTime();
            const distance = targetDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById(elementId).innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;

            if (distance < 0) {
                clearInterval(countdownTimer);
                document.getElementById(elementId).innerHTML = "EXPIRED";
            }
        }, 1000);
    }

    // Set the target dates
    const abstractDeadline = new Date('October 25, 2024 23:59:59').getTime();
    const paperDeadline = new Date('October 25, 2024 23:59:59').getTime();

    // Start the countdowns
    startCountdown(abstractDeadline, 'countdown-abstract');
    startCountdown(paperDeadline, 'countdown-paper');
</script>
