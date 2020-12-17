@extends('layouts.general-layout')

@section('title','Emploi :: CV Templates')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h2 class="orange text-center">CV Templates</h2>
                    {{-- @include('components.ads.responsive') --}}
                    <ul class="numeric">
                        <li>
                            <h5>Graduate CV Template</h5>
                            <p>If you have recently qualified, either as a postgraduate or in further education, a qualification-style CV is best for you. The format showcases your qualifications and further skills where relevant, placing experience
                                or work
                                history second ­ handy if you lack direct work experience.</p>
                        </li>
                        <li>
                            <h5>Career Advancement CV Template</h5>
                            <p>This CV template uses reverse chronology, listing linear work histories starting with the most recent first. It favours individuals that have progressed their career in one sector and possibly with one main employer. If
                                you are
                                continuing to climb the career ladder in the same industry or with the same organization this CV template is for you.</p>
                        </li>
                        <li>
                            <h5>Career Changing CV Template</h5>
                            <p>More and more organizations have started rewarding and encouraging flexibility, not just in working hours and work locations, but also in role diversification. A more project-based approach to work has helped to fuel a
                                demand
                                for
                                career changers in the market, too. Here the focus is on a mix of skills, expertise, qualifications and above all attitude.</p>
                            <p>This CV template demonstrates your ability to apply knowledge and skills to different or developing sectors and roles. Don't let personal motivations for a career change ­ for example, to support a dependant or care for
                                children ­
                                concern you here, just use this CV template to smooth your transition. The good news is that you don't have to start out in a junior position. Your previous experience will stand you in good stead, as long as you tell
                                your
                                prospective employers all about them.</p>
                            <p>In order to achieve this, our consultants begin by conducting in-person interviews (where possible) with each new candidate. Here we seek to uncover your personal and professional motivations, because both must be
                                attended to
                                in
                                order to achieve true career satisfaction. Drawing from this, we take into account the specialized needs of that industry, the market trends that are shaping its future and the unique interests of the individual
                                companies that
                                are
                                looking for new talent. It is this inside track, paired with our close understanding of your skills, interests, and aspirations that enable us to identify and connect you with your perfect career match.</p>
                        </li>
                        <li>
                            <h5>Consultant CV Template</h5>
                            <p>This CV type is for individuals who freelance, contract and have a degree of expertise which makes them a valuable commodity. The template is designed to elevate your expertise and show how your superior knowledge helps
                                businesses
                                to get things done well, on time and to budget. Demonstrating your expertise through the way that you promote yourself will also impress especially if you work in the creative sector. Perhaps, as well as a paper
                                document, you
                                could point prospective employers to your YouTube channel, website or online profile so that they can see your work or watch a video clip.</p>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="/contact" class="btn btn-orange">Contact Us Today</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Download Template</h5>

                    <ol class="pl-4">
                        <li>
                            <a href="/cv-templates/Graduate-CV-Template.doc">Graduate CV Template</a>
                        </li>
                        <li>
                            <a href="/cv-templates/Career-Advancement-CV-Template.doc">Career Advancement CV Template</a>
                        </li>
                        <li>
                            <a href="/cv-templates/Career-Change-CV-Template.doc">Career Changing CV Template</a>
                        </li>
                        <li>
                            <a href="/cv-templates/Consultant-CV.doc">Consultant CV Template</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection