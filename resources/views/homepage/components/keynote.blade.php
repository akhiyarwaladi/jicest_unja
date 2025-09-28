<div class="w-full p-10 px-2 relative poppins">
    {{-- <div class="absolute top-0 left-0 w-full h-full flex items-end">
        <div class="w-full h-full z-[-1] bg-gradient-to-b from-white/50 to-orange-500/75">
        </div>
    </div> --}}
    <header class="text-3xl font-bold text-center">Keynote Speaker</header>
    <div class="flex flex-wrap items-center justify-center h-fit gap-8 p-10 px-2">
        <div class="flex gap-3 w-full md:w-2/5">
            <div class="keynote-image shadow-md rounded-md bg-gray-200 flex items-center justify-center overflow-hidden">
                {{-- Photo URL: https://staffportal.curtin.edu.au/staff/profile/view/mostafa-sharifzadeh-9cf531a1/ --}}
                {{-- Save as: public/uploads/speakers/mostafa-sharifzadeh.jpg --}}
                <img src="{{ asset('uploads/speakers/mostafa-sharifzadeh.jpg') }}"
                     alt="Dr. Mostafa Sharifzadeh"
                     class="keynote-image object-cover"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <span class="text-gray-500 text-xs" style="display: none;">Photo</span>
            </div>
            <div class="text-lg text-wrap font-semibold">
                <div>Dr. Mostafa Sharifzadeh</div>
                <div class="text-sm font-normal text-gray-600">
                    Senior Lecturer, Western Australian School of Mines (WASM), Curtin University, Australia
                </div>
                <div class="text-xs font-normal text-gray-500 mt-2">
                    Expert in Geomechanics, Rock Mechanics, and Underground Excavation
                </div>
            </div>
        </div>
        <div class="flex gap-3 w-full md:w-2/5">
            <div class="keynote-image shadow-md rounded-md bg-gray-200 flex items-center justify-center overflow-hidden">
                {{-- Photo URL: https://web.sas.upenn.edu/percecgroup/files/2018/04/VP-20gdt6y-300x298.jpg --}}
                {{-- Save as: public/uploads/speakers/virgil-percec.jpg --}}
                <img src="{{ asset('uploads/speakers/virgil-percec.jpg') }}"
                     alt="Prof. Virgil Percec"
                     class="keynote-image object-cover"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <span class="text-gray-500 text-xs" style="display: none;">Photo</span>
            </div>
            <div class="text-lg text-wrap font-semibold">
                <div>Prof. Virgil Percec</div>
                <div class="text-sm font-normal text-gray-600">
                    P. Roy Vagelos Chair and Professor of Chemistry, University of Pennsylvania, USA
                </div>
                <div class="text-xs font-normal text-gray-500 mt-2">
                    Expert in Organic, Macromolecular and Supramolecular Chemistry
                </div>
            </div>
        </div>
        <div class="flex gap-3 w-full md:w-2/5">
            <div class="keynote-image shadow-md rounded-md bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-xs">TBA</span>
            </div>
            <div class="text-lg text-wrap font-semibold">
                <div>Keynote Speaker 3</div>
                <div class="text-sm font-normal text-gray-600">
                    To Be Announced
                </div>
            </div>
        </div>
        <div class="flex gap-3 w-full md:w-2/5">
            <div class="keynote-image shadow-md rounded-md bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-xs">TBA</span>
            </div>
            <div class="text-lg text-wrap font-semibold">
                <div>Keynote Speaker 4</div>
                <div class="text-sm font-normal text-gray-600">
                    To Be Announced
                </div>
            </div>
        </div>
    </div>
</div>
