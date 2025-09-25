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
            Welcome to the official website of the <span class="font-bold">Jambi International Conference on Engineering, Science, and Technology (JICEST)</span>, taking place at Universitas Jambi, Indonesia, on <span class="font-bold">28 November 2025</span>. As a flagship annual event hosted by the Faculty of Science and Technology, JICEST serves as a premier international platform that unites researchers, experts, practitioners, scholars, and students to exchange groundbreaking research, innovative ideas, and transformative solutions across the dynamic fields of engineering, science, and technology.
        </section>
        <section class="text-justify">
            The central theme for JICEST 2025 is <span class="font-bold">"Digital Transformation, Green Energy, and Advanced Materials for a Sustainable Society."</span> This theme highlights the critical role that digital transformation, green energy innovations, and advanced materials play in creating a sustainable future for society.
        </section>
         <section class="text-justify">
            <h4 class="font-bold">Sub-theme</h4>
            <ul class="list-disc list-outside space-y-2 pl-10">
                <li>
                    <p><span class="font-bold">Mathematical & Natural Sciences</span>: Chemistry, Physics, Biology, Mathematics, Industrial Chemistry, Chemical Analysis</p>
                </li>
                <li>
                    <p><span class="font-bold">Earth Sciences & Mining Technology</span>: Geophysics, Geology, Mining Engineering, Sustainable Resource Management</p>
                </li>
                <li>
                    <p><span class="font-bold">Civil, Chemical & Environmental Engineering</span>: Sustainable Infrastructure, Chemical Process Engineering, Environmental Technology, Green Engineering</p>
                </li>
                <li>
                    <p><span class="font-bold">Electrical Engineering & Information Systems</span>: Smart Technology, IoT Applications, Data Analytics, Digital Innovation</p>
                </li>
                <li>
                    <p><span class="font-bold">Educational Technology</span>: Digital Transformation in Education, STEM (Science, Technology, Engineering and Mathematics) Education</p>
                </li>
            </ul>
        </section>

        <section class="text-justify">
            <span class="font-bold">Mathematical & Natural Sciences</span> form the fundamental backbone of scientific innovation. The conference will showcase cutting-edge research in chemistry, physics, biology, and mathematics, including specialized applications in industrial chemistry and chemical analysis. These disciplines drive breakthrough discoveries that power technological advancement and sustainable development.
        </section>
        <section class="text-justify">
            <span class="font-bold">Earth Sciences & Mining Technology</span> address critical challenges in sustainable resource management. Through geophysics, geology, and mining engineering, researchers will present innovative approaches to responsible resource extraction, environmental monitoring, and geological hazard mitigation, ensuring sustainable practices for future generations.
        </section>
        <section class="text-justify">
            <span class="font-bold">Civil, Chemical & Environmental Engineering</span> focus on building resilient infrastructure and developing clean technologies. The conference will highlight sustainable infrastructure development, advanced chemical process engineering, environmental remediation technologies, and green engineering solutions that address contemporary challenges while minimizing ecological impact.
        </section>
        <section class="text-justify">
            <span class="font-bold">Electrical Engineering & Information Systems</span> represent the digital transformation era. Discussions will cover smart technology implementations, Internet of Things (IoT) applications, advanced data analytics, and digital innovation strategies that are reshaping industries and improving quality of life through intelligent systems.
        </section>
        <section class="text-justify">
            <span class="font-bold">Educational Technology</span> continues to be a cornerstone of modern learning. The conference will explore digital transformation in education and innovative STEM pedagogies that enhance learning outcomes, foster critical thinking, and prepare students for the challenges of an increasingly technological society.
        </section>
    </article>
</div>


@endsection
