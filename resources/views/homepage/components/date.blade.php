<div class="bg-gradient-to-b from-sky-300 to-sky-500 p-10 text-white w-full">
    <header class="text-3xl font-bold text-center">IMPORTANT DATE</header>
    <div class="text-center text-sm">Do not miss any topic about the event</div>

    <!-- Early Bird Section -->
    <div class="mt-8">
        <h3 class="text-2xl font-semibold text-center mb-4">Early Bird</h3>
        <div class="flex flex-col md:flex-row justify-center gap-8">
            <div class="glassmorphism rounded-md overflow-hidden">
                <header class="bg-gradient-to-r text-center from-emerald-500 to-emerald-600 bg-opacity-75 p-2">Abstract
                    Submission
                    Deadline</header>
                <div class="bg-white bg-opacity-75 p-2 text-black flex flex-col items-center gap-2">
                    <div class="w-full px-5 flex flex-col gap-2">
                        <div class="bg-emerald-500 font-semibold p-1 px-2 rounded-full w-full text-center text-white">31 October 2025 ONLINE</div>
                    </div>
                    <div>Time Remaining:</div>
                    <div id="countdown-abstract-early" class="text-lg font-bold">Loading...</div>
                </div>
            </div>
            <div class="glassmorphism rounded-md overflow-hidden">
                <header class="bg-gradient-to-r text-center from-sky-500 to-sky-600 bg-opacity-75 p-2">Full Paper Submission
                    Deadline</header>
                <div class="bg-white bg-opacity-75 p-2 text-black flex flex-col items-center gap-2">
                    <div class="w-full px-5 flex flex-col gap-2">
                        <div class="bg-sky-500 font-semibold p-1 px-2 rounded-full w-full text-center text-white">22 November 2025 ONLINE</div>
                    </div>
                    <div>Time Remaining:</div>
                    <div id="countdown-paper-early" class="text-lg font-bold">Loading...</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Non Early Bird Section -->
    <div class="mt-8">
        <h3 class="text-2xl font-semibold text-center mb-4">Non Early Bird</h3>
        <div class="flex flex-col md:flex-row justify-center gap-8">
            <div class="glassmorphism rounded-md overflow-hidden">
                <header class="bg-gradient-to-r text-center from-orange-500 to-orange-600 bg-opacity-75 p-2">Abstract
                    Submission
                    Deadline</header>
                <div class="bg-white bg-opacity-75 p-2 text-black flex flex-col items-center gap-2">
                    <div class="w-full px-5 flex flex-col gap-2">
                        <div class="bg-orange-500 font-semibold p-1 px-2 rounded-full w-full text-center text-white">22 November 2025 ONLINE</div>
                    </div>
                    <div>Time Remaining:</div>
                    <div id="countdown-abstract-regular" class="text-lg font-bold">Loading...</div>
                </div>
            </div>
            <div class="glassmorphism rounded-md overflow-hidden">
                <header class="bg-gradient-to-r text-center from-red-500 to-red-600 bg-opacity-75 p-2">Full Paper Submission
                    Deadline</header>
                <div class="bg-white bg-opacity-75 p-2 text-black flex flex-col items-center gap-2">
                    <div class="w-full px-5 flex flex-col gap-2">
                        <div class="bg-red-500 font-semibold p-1 px-2 rounded-full w-full text-center text-white">22 November 2025 ONLINE</div>
                    </div>
                    <div>Time Remaining:</div>
                    <div id="countdown-paper-regular" class="text-lg font-bold">Loading...</div>
                </div>
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

    // Set the target dates for Early Bird
    const abstractEarlyDeadline = new Date('October 31, 2025 23:59:59').getTime();
    const paperEarlyDeadline = new Date('November 22, 2025 23:59:59').getTime();

    // Set the target dates for Non Early Bird
    const abstractRegularDeadline = new Date('November 22, 2025 23:59:59').getTime();
    const paperRegularDeadline = new Date('November 22, 2025 23:59:59').getTime();

    // Start the countdowns
    startCountdown(abstractEarlyDeadline, 'countdown-abstract-early');
    startCountdown(paperEarlyDeadline, 'countdown-paper-early');
    startCountdown(abstractRegularDeadline, 'countdown-abstract-regular');
    startCountdown(paperRegularDeadline, 'countdown-paper-regular');
</script>
