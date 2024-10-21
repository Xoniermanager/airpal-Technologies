@extends('layouts.frontend.main')
@section('content')

<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row align-items-center inner-banner aos aos-init aos-animate" data-aos="fade-up">
            <div class="col-md-12 col-12 text-center">
                <h2 class="breadcrumb-title">Research</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"> Research </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="need-to-know-section pt-5 pb-5 aos aos-init aos-animate" data-aos="fade-up">
    
    <div class="container">
        <ul class="customertab nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                    type="button" role="tab" aria-controls="home" aria-selected="true">Healthcare Problems
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Remote Patient
                    Monitoring (RPM)</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 aos aos-init aos-animate" data-aos="fade-up">

                        <div class="accordion-condition" id="accord-parent">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Limited Access to Healthcare in Rural Areas:
                                    </a>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - In Ireland, 68% of medical practices outside major cities are
                                                not accepting new patients, reflecting a significant urban-rural
                                                divide in healthcare access. This situation is compounded by the
                                                fact that 15% of Northern Ireland's population lives in the most
                                                rural wards, where only 13% of GP practices are located .
                                                Telemedicine can connect rural patients with healthcare
                                                providers, improving access to necessary services .</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Long Wait Times for Appointments:
                                    </a>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - The average wait time for a GP appointment in rural Ireland
                                                can reach up to two weeks, compared to same-day appointments
                                                available in urban areas . In Europe, patients in countries like
                                                Spain and Italy also experience long wait times, averaging 20-30
                                                days for specialist consultations . Telemedicine can reduce
                                                these wait times by facilitating quicker consultations.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Lack of Specialised Care in Certain Regions:
                                    </a>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - Over 65 million Europeans live in areas with a shortage of
                                                healthcare providers, particularly specialists . Telemedicine
                                                enables patients to access specialized care without the need to
                                                travel long distances, addressing this disparity effectively.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        Transportation Constraints
                                    </a>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - In Ireland, 3.6 million people miss or delay medical care
                                                annually due to transportation issues . This problem is echoed
                                                globally, where patients in rural areas often face significant
                                                barriers to accessing healthcare due to poor public transport .
                                                Telemedicine eliminates the need for travel, making healthcare
                                                more accessible.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                        aria-expanded="false" aria-controls="collapseFive">
                                        Increasing Prevalence of Chronic Diseases
                                    </a>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>- In Ireland, 60% of adults have at least one chronic condition,
                                                and the World Health Organisation predicts that by 2030, chronic
                                                diseases will account for 75% of healthcare costs globally .
                                                Remote patient monitoring through telemedicine can help manage
                                                these conditions more effectively, improving patient outcomes
                                                and reducing hospitalisations.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                        aria-expanded="false" aria-controls="collapseSix">
                                        Rising Healthcare Costs
                                    </a>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>- U.S. healthcare spending reached $3.8 trillion in 2019, while
                                                in Ireland, healthcare expenditure per capita is nearly €5,000,
                                                significantly above the EU average of €3,197 . Telemedicine can
                                                reduce costs by preventing unnecessary in-person visits and
                                                hospitalisations, potentially saving up to 30% in healthcare
                                                costs .</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                        aria-expanded="false" aria-controls="collapseSeven">
                                        Physician Burnout
                                    </a>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>- In Ireland, 44% of physicians reported feeling burned out, with
                                                similar rates observed across Europe and the U.S. . The COVID-19
                                                pandemic has exacerbated this issue, leading to increased
                                                workloads and stress . Telemedicine can alleviate some of this
                                                burden by providing more flexible working conditions and
                                                reducing the number of in-person consultations. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                        aria-expanded="false" aria-controls="collapseEight">
                                        High Patient No-Show Rates
                                    </a>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - In Ireland, no-show rates for outpatient appointments can
                                                reach around 20% . Globally, no-show rates can be as high as 80%
                                                in some healthcare systems . Telemedicine can help reduce these
                                                rates by offering more convenient appointment options that fit
                                                patients' schedules.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                        aria-expanded="false" aria-controls="collapseNine">
                                        Inefficient Management of Mental Health Services
                                    </a>
                                </h2>
                                <div id="collapseNine" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>- In Ireland, mental health services are severely lacking, with
                                                many patients waiting years for treatment . A study by the
                                                Mental Health Commission found that telemedicine can improve
                                                access to mental health services, particularly in under served
                                                areas, allowing for timely interventions and support .</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTen"
                                        aria-expanded="false" aria-controls="collapseTen">
                                        Healthcare Inequities
                                    </a>
                                </h2>
                                <div id="collapseTen" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>- Socioeconomic factors contribute to health disparities, with
                                                the WHO reporting that individuals in low-income areas have
                                                significantly worse health outcomes . Telemedicine can help
                                                bridge this gap by providing equitable access to healthcare
                                                services, regardless of location or economic status. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 aos aos-init aos-animate" data-aos="fade-up">
                        <div class="gallery-box-block">
                            <div class="box-detail">
                                <img src="assets/img/faq.jpg" class="img-fluid" alt="image">
                            </div>
                            <h5 class="pt-4">By addressing these challenges, telemedicine has the potential to
                                significantly improve healthcare access, efficiency, and outcomes for patients
                                in Ireland, Europe, and globally.</h5>
                            <h4>Sources</h4>
                            <ul class="text-dark">
                                <li class="mb-3"> [PDF] Geographic Profile of Healthcare Needs and Non-Acute
                                    Healthcare ... <a class="text-primary"
                                        href="https://www.esri.ie/pubs/RS90.pdf" target="_blank">Click here</a>
                                </li>
                                <li class="mb-3"> Providing research and information services to the Northern
                                    Ireland Assembly <a class="text-primary"
                                        href="http://www.niassembly.gov.uk/globalassets/documents/raise/publications/2010/agriculture-rural-development/12510.pdf"
                                        target="_blank">Click Here</a></li>
                                <li class="mb-3"> Dáil Éireann debate - Wednesday, 21 Feb 2024 <a
                                        class="text-primary"
                                        href="https://www.oireachtas.ie/en/debates/debate/dail/2024-02-21/35/"
                                        target="_blank">Click here</a></li>
                                <li class="mb-3"> Healthcare Provision in Rural Communities: Motion [Private ...
                                    <a class="text-primary"
                                        href="https://www.oireachtas.ie/en/debates/debate/dail/2024-02-21/8/"
                                        target="_blank">Click here</a></li>
                                <li class="mb-3"> Hospital beds in Ireland 2000-2021 | Statista <a
                                        class="text-primary"
                                        href="https://www.statista.com/statistics/557287/hospital-beds-in-ireland/"
                                        target="_blank">Click here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 aos aos-init aos-animate" data-aos="fade-up">

                        <div class="accordion-condition" id="accord-parent">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        High Rates of Chronic Diseases:
                                    </a>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - Nearly 60% of adults in the U.S. have at least one chronic
                                                disease, and 40% have two or more, according to the National
                                                Center for Chronic Disease Prevention and Health Promotion. In
                                                Ireland, chronic diseases account for 90% of healthcare
                                                spending, highlighting the urgent need for effective management
                                                strategies. RPM can facilitate continuous monitoring and timely
                                                interventions, potentially reducing hospitalisations by over 65%
                                                for chronic conditions like heart failure and diabetes.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Increased Hospital Readmissions:
                                    </a>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - Hospital readmissions account for 18% of all hospitalisations
                                                in Europe, leading to significant healthcare costs. A study
                                                published in JAMA Network Open found that RPM programs
                                                correlated with reduced rehospitalisations and shorter hospital
                                                stays, particularly for patients with chronic conditions.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Limited Access to Healthcare:
                                    </a>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - In rural areas of Ireland, 15% of the population experiences
                                                significant barriers to accessing healthcare services. RPM can
                                                bridge this gap by enabling remote monitoring and consultations,
                                                allowing patients to receive necessary care without traveling
                                                long distances. The ACTIVATE program in California demonstrated
                                                improved diabetes control through RPM, with patients sending
                                                over 10,000 readings in six months.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        Inefficient Patient Engagement
                                    </a>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - Many patients struggle to engage in their healthcare
                                                management, leading to poor adherence to treatment plans. RPM
                                                empowers patients by providing tools to monitor their health
                                                conditions actively. Research indicates that regular
                                                communication through RPM enhances the patient-physician
                                                relationship, improving treatment adherence and health outcomes.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                        aria-expanded="false" aria-controls="collapseFive">
                                        High Emergency Department Utilisation:
                                    </a>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>- Emergency departments in the U.S. see over 130 million visits
                                                annually, with many being avoidable. RPM can reduce unnecessary
                                                emergency visits by allowing for proactive management of chronic
                                                diseases and timely interventions. Studies show that RPM can
                                                significantly decrease emergency department utilisation, leading
                                                to cost savings for healthcare systems.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                        aria-expanded="false" aria-controls="collapseSix">
                                        Healthcare Costs:
                                    </a>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>- Chronic diseases account for nearly 90% of all healthcare
                                                spending in the U.S., costing 3.5 times more to treat than other
                                                conditions. RPM has been shown to reduce overall healthcare
                                                costs by promoting better care management and preventing costly
                                                hospitalisations. In Ireland, healthcare expenditure per capita
                                                is significantly high, and adopting RPM could help mitigate
                                                these costs.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                        aria-expanded="false" aria-controls="collapseSeven">
                                        Inefficient Clinical Workflows: </a>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - Healthcare providers often face administrative burdens that
                                                limit their ability to deliver care efficiently. RPM allows
                                                clinicians to monitor multiple patients simultaneously,
                                                improving workflow efficiency. A report indicated that RPM can
                                                enhance clinical decision-making and reduce the time spent on
                                                administrative tasks, allowing providers to focus more on
                                                patient care. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                        aria-expanded="false" aria-controls="collapseEight">
                                        Poor Data Management:
                                    </a>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - Inconsistent patient data can lead to misdiagnoses and
                                                ineffective treatment plans. RPM provides healthcare providers
                                                with continuous, real-time data on patients' vital signs and
                                                health metrics, improving clinical decision-making. As noted by
                                                Cindy Vunovich from Allegheny Health Network, RPM enables
                                                providers to identify trends and adjust care plans proactively.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                        aria-expanded="false" aria-controls="collapseNine">
                                        Barriers to Specialist Care:
                                    </a>
                                </h2>
                                <div id="collapseNine" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - Many patients in Ireland and Europe face difficulties
                                                accessing specialist care due to geographical and financial
                                                barriers. RPM can facilitate remote consultations with
                                                specialists, improving access to quality healthcare for patients
                                                in underserved areas. This approach has been shown to enhance
                                                patient outcomes and satisfaction.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a href="javascript:void(0);" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTen"
                                        aria-expanded="false" aria-controls="collapseTen">
                                        Limited Post-Discharge Support:
                                    </a>
                                </h2>
                                <div id="collapseTen" class="accordion-collapse collapse"
                                    data-bs-parent="#accord-parent" style="">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p> - Many patients lack adequate support after hospital discharge,
                                                leading to increased readmission rates. RPM provides continuous
                                                monitoring and support for post-discharge patients, allowing
                                                healthcare providers to intervene early if complications arise.
                                                Studies indicate that effective RPM programs can significantly
                                                reduce readmission rates and improve recovery outcomes.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 aos aos-init aos-animate" data-aos="fade-up">
                        <div class="gallery-box-block">
                            <div class="box-detail">
                                <img src="assets/img/faq1.jpg" class="img-fluid" alt="image">
                            </div>
                            <h5 class="pt-4">By addressing these challenges, remote patient monitoring has the
                                potential to transform healthcare delivery, improve patient outcomes, and reduce
                                costs across various healthcare systems.</h5>
                            <h4>Sources</h4>
                            <ul class="text-dark">
                                <li class="mb-3"> Sources of health data <a class="text-primary"
                                        href="https://healthanalyticsguru.com/2018/02/24/sources-of-health-data/"
                                        target="_blank">Click here</a></li>
                                <li class="mb-3"> LibGuides: Finding Health Data and Statistics: Getting Started
                                    <a class="text-primary" href="https://guides.library.cornell.edu/healthdata"
                                        target="_blank">Click Here</a></li>
                                <li class="mb-3"> Health Statistics and Data Sources - Library research guides
                                    <a class="text-primary" href="https://libguides.umn.edu/HealthStatistics"
                                        target="_blank">Click here</a></li>
                                <li class="mb-3"> Guides: Nursing: Statistics: Health / Medical <a
                                        class="text-primary" href="https://udmercy.libguides.com/nursing/stats"
                                        target="_blank">Click here</a></li>
                                <li class="mb-3"> What is Healthcare Data? Best Examples, Uses & Datasets to Buy
                                    in 2024 <a class="text-primary"
                                        href="https://datarade.ai/data-categories/healthcare-data"
                                        target="_blank">Click here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>



    </div>
</section>


@endsection