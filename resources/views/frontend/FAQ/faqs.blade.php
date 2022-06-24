@extends('frontend.layouts.app')
@section('content')   
<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/faq-banner.jpg); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                   
                    <div class="title">
                       <h4>FAQ</h4>
                    </div>
               
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area--> 
<div class="site-whatsapp">
    <a href="https://wa.me/6597388330" target="_blank"><img src="{{ asset('frontend/images/wp-logo.png')}}" alt=""></a>  
  </div>
<!--Start blog single area-->
<section id="blog-area" class="blog-single-area">

    
    <!-- this is FAQ-->
   

    <div class="container">
        <h2>FAQ</h2>
        <br>
        <div class="accordion-box style2">
           
            <!--End single accordion box-->
            <!--Start single accordion box-->
            <div class="accordion accordion-block">
                <div class="accord-btn active"><h4>Can we ask some quick questions regarding handyman services?</h4></div>
                <div class="accord-content collapsed">
                    <p>You may send us a text message viawhatsapp or call us at: 98392229 to get a faster response to address your concerns. Otherwise, you may also drop us an email to: <a href="mailto:hello@handyconnect.com.sg">hello@handyconnect.com.sg.</a> </p>
                </div>
            </div>
            <!--End single accordion box-->
            <!--Start single accordion box-->
            <div class="accordion accordion-block">
                <div class="accord-btn"><h4>How do we book your services?</h4></div>
                <div class="accord-content">
                    <p>You may book us at: 98392229 or use our HandyConnectMobileApp to book our services. Scheduling our services can be done fuss-free at your convenience!</p>
                </div>
            </div>
            <!--End single accordion box-->
            <!--Start single accordion box-->
            <div class="accordion accordion-block">
                <div class="accord-btn"><h4>Will you be able to provide a quote before confirming an appointment?</h4></div>
                <div class="accord-content">
                    <p>We try our best to provide a quote. However, due to site conditions and unexpected issues that may arise, the price quoted may subject to changes. You can help us by giving as many details as possible regarding the issue, including pictures or videos. This is for us to better understand the issue in order to provide a more accurate quote or purchase the right materials</p>
                </div>
            </div>
            <!--End single accordion box-->
            <!--Start single accordion box-->
            <div class="accordion accordion-block">
                <div class="accord-btn"><h4>Do you charge a fee only for checking without repair work?</h4></div>
                <div class="accord-content">
                    <p>Much as we would love to provide a complimentary checking, we do charge a checking fee. However, should the job be confirmed right after checking, we will not charge additional for the checking fee.</p>
                </div>
            </div>
            <!--End single accordion box-->
            <!--Start single accordion box-->
            <div class="accordion accordion-block">
                <div class="accord-btn"><h4>How is payment made?</h4></div>
                <div class="accord-content">
                   <p>We love going green so we prefer electronic forms of payment. You may send us your payment via PayNow to: 202116343R or transfer to our OCBCBank Account No. 717-368740-001.</p>
                </div>
            </div>
            <!--End single accordion box-->
             <!--Start single accordion box-->
             <div class="accordion accordion-block">
                <div class="accord-btn"><h4>What happens if the issue persists after your visit?</h4></div>
                <div class="accord-content">
                  <p>We will arrange to check the issue and resolve the problem as best as we can</p>
                </div>
            </div>
            <!--End single accordion box-->
        </div>
    </div>
</section> 
<!--End blog single area-->    
@endsection