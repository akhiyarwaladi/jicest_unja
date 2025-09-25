@extends('layouts.main-tailwind')

@section('content')
<!-- Contact Form Section Begin -->
<div class="main flex flex-col items-center p-14 bg-orange-100 jutify-center py-20">
    <header class="text-2xl font-bold mt-10 ">ABOUT JICEST</header>
    <figure class="w-full p-10 flex justify-center">
        <img src="{{ asset('assets/logos/jicest.png') }}" class="max-w-[700px] w-full max-h-[200px] object-cover">
    </figure>
    <article class="w-full text-lg max-w-[700px] flex flex-col gap-5">
        <section class="text-justify">
            Welcome to the official website of the <span class="font-bold">Jambi International Conference on Engineering, Science, and Technology (JICEST)</span>, which will take place at Universitas Jambi, Indonesia, on <span class="font-bold">28 November 2025</span>. As an annual event, JICEST is dedicated to bringing together researchers, experts, practitioners, scholars, and students to exchange and share their experiences, innovative ideas, and research findings in the vast and evolving fields of engineering, science, and technology.
        </section>
        <section class="text-justify">
            The central theme for JICEST 2025 is <span class="font-bold">"Digital Transformation, Green Energy, and Advanced Materials for a Sustainable Society."</span> This theme highlights the critical role that digital transformation, green energy innovations, and advanced materials play in creating a sustainable future for society.
        </section>
         <section class="text-justify">
            <h4 class="font-bold">Sub-theme</h4>
            <ul class="list-disc list-outside space-y-2 pl-10">
                <li>
                    <p><span class="font-bold">Engineering</span>: Sustainable Engineering, Socio-Engineering, Technopreneurship, Renewable Energy, Advanced Material</p>
                </li>
                <li>
                    <p><span class="font-bold">Science & Technology</span>:  Climate Change, Big Data and Analytic, Food Science and Technology, Biotechnology, Ethnobiology, Green Chemistry, Bio medic Technology, Biodiversity, Earth Science</p>
                </li>
                <li>
                    <p><span class="font-bold">Edu Technology</span>:  Digital Transformation in Education, STEM (Science, Technology, Engineering and Mathematic) Education</p>
                </li>
            </ul>
        </section>

        <section class="text-justify">
            In the realm of engineering, the conference will explore areas such as sustainable practices, the integration of engineering solutions with societal needs, the promotion of entrepreneurship through technology, advancements in renewable energy, and the development of new materials. These topics reflect the ongoing efforts to create engineering solutions that not only meet technical requirements but also address social and environmental concerns.
        </section>
        <section class="text-justify">
            In the field of science and technology, the conference will cover a wide array of subjects. These include the urgent issue of climate change and the role of technology in mitigating its effects, the transformative potential of big data and analytics, innovations in food science and biotechnology, and the exploration of biodiversity and earth sciences. Additionally, discussions will delve into the ethical and practical aspects of green chemistry, the advancements in biomedicine, and the cultural significance of ethnobiology.
        </section>
        <section class="text-justify">
            Educational technology will also be a focal point of the conference, particularly the digital transformation in education and the integration of STEM (Science, Technology, Engineering, and Mathematics) education. These discussions will address how technology is reshaping the educational landscape, making learning more accessible, engaging, and effective.
        </section>
    </article>
</div>


@endsection
