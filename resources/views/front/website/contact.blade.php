@extends('front.layouts.app')

@section('content')


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('home') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>help center, contact us</h2>
                </div>
            </a>
          </div>
            <div class="header-option">
              <ul>
                <li>
                  <a href=""><img src="{{ asset('static/images/icons/fb.svg') }}" width="22px" class="img-fluid" alt=""></a>
                </li>
                <li>
                  <a href=""><img src="{{ asset('static/images/icons/insta.svg') }}" width="22px" class="img-fluid" alt=""></a>
                </li>
                <li>
                  <a href=""><img src="{{ asset('static/images/icons/tw.svg') }}" width="22px" class="img-fluid" alt=""></a>
                </li>
              </ul>
            </div>
    </header>
    <!-- header end -->

    <section class="px-15 top-space mt-5">
      <form class="address-form-section px-15">
          <div class="mb-4">
            <h4 class="fw-bold mb-1">Send us your Query</h4>
          </div>
          <div class="form-floating mb-4">
              <select class="form-select" id="floatingSelect1" aria-label="Floating label select example">
                  <option selected disabled value="1">Select state</option>
                  <option value="london">London</option>
                  <option value="Manchester">Manchester</option>
              </select>
              <label for="floatingSelect1">state/province/region</label>
          </div>
          <div class="form-floating mb-4">
              <input type="text" class="form-control" id="one" placeholder="Full Name">
              <label for="one">Full Name</label>
          </div>
          <div class="form-floating mb-4">
              <input type="email" class="form-control" id="two" placeholder="Email Address">
              <label for="two">Email</label>
          </div>
          <div class="mb-4">

              <label for="three">Message Detail</label>
              <textarea name="message" class="form-control" rows="4" placeholder="Message body"></textarea>
          </div>

          <button type="submit" class="btn btn-solid w-100">Send Message</button>

      </form>
    </section>

    <!-- section start -->
    <section class="px-15 top-space pt-0">
      <h4 class="fw-bold mb-1">Help Center</h4>
      <p class="content-color">Get quick customer support by selecting your issue</p>
        <div class="help-img">
            <img src="{{ asset('static/images/help.jpg') }}" class="img-fluid rounded-1 w-100" alt="">
        </div>
        <div class="faq-section section-t-space section-b-space">

            <h4 class="fw-bold mb-3">What issues are you facing?</h4>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne">
                            I want to track my order
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body content-color">The standard chunk of Lorem Ipsum used since the 1500s
                            is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus
                            Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied
                            by English versions from the 1914 translation by H. Rackham.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            I want to manage my order
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body content-color">The standard chunk of Lorem Ipsum used since the 1500s
                            is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus
                            Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied
                            by English versions from the 1914 translation by H. Rackham.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree">
                            I did not receive Instant Cashback
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body content-color">The standard chunk of Lorem Ipsum used since the 1500s
                            is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus
                            Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied
                            by English versions from the 1914 translation by H. Rackham.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour">
                            I want help with other issues
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body content-color">The standard chunk of Lorem Ipsum used since the 1500s
                            is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus
                            Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied
                            by English versions from the 1914 translation by H. Rackham.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFive">
                            I am unable to pay using wallet
                        </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body content-color">The standard chunk of Lorem Ipsum used since the 1500s
                            is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus
                            Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied
                            by English versions from the 1914 translation by H. Rackham.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseSix">
                            I want to unsubscribe from promotional emails and SMS
                        </button>
                    </h2>
                    <div id="flush-collapseSix" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body content-color">The standard chunk of Lorem Ipsum used since the 1500s
                            is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus
                            Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied
                            by English versions from the 1914 translation by H. Rackham.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseSeven">
                            I want help with returns & refunds
                        </button>
                    </h2>
                    <div id="flush-collapseSeven" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body content-color">The standard chunk of Lorem Ipsum used since the 1500s
                            is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus
                            Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied
                            by English versions from the 1914 translation by H. Rackham.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

    <div class="divider"></div>
    <!-- brands section end -->


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->


    @include('front.partials.bottom-nav')

  @endsection
