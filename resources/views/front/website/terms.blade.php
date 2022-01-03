@extends('front.layouts.app')

@section('content')

    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('home') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Terms & Condition</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->

    <!-- content start -->
    <section class="px-15 top-space pt-0">
        <h2 class="mb-3">Terms and Conditions for ZimboDelights</h2>
        <h4 class="mb-1">Introduction</h4>
        <p class="content-color">These Website Standard Terms and Conditions written on this webpage shall manage your
            use of our website, ZimboDelights accessible at www.ZimboDelights.com.</p>
        <p class="content-color">These Terms will be applied fully and affect to your use of this Website. By using this
            Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you
            disagree with any of these Website Standard Terms and Conditions. These Terms and Conditions have been
            generated with the help of the Terms And Conditiions Sample Generator.</p>
        <h4 class="mb-1">Intellectual Property Rights</h4>
        <p class="content-color">Other than the content you own, under these Terms, ZimboDelights and/or its licensors own
            all the intellectual property rights and materials contained in this Website.</p>
        <p class="content-color">You are granted limited license only for purposes of viewing the material contained on
            this Website.</p>
        <h4 class="mb-1">Restrictions</h4>
        <p class="content-color mb-1">You are specifically restricted from all of the following:</p>
        <ul class="listing-section mb-2">
            <li>publishing any Website material in any other media;</li>
            <li>selling, sublicensing and/or otherwise any Website material;</li>
            <li>publicly performing and/or showing any Website material;</li>
            <li>using this Website in any way that is or may be damaging to this Website;</li>
            <li>using this Website in any way that impacts user access to this Website;</li>
            <li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the
                Website, or to any person or business entity;</li>
            <li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation
                to this Website;</li>
            <li>using this Website to engage in any advertising or marketing.</li>
        </ul>
        <p class="content-color mb-2">Certain areas of this Website are restricted from being access by you and
            ZimboDelights may further restrict access by you to any areas of this Website, at any time, in absolute
            discretion. Any user ID and password you may have for this Website are confidential and you must maintain
            confidentiality as well.</p>
        <h4 class="mb-1">Your Content</h4>
        <p class="content-color">In these Website Standard Terms and Conditions, "Your Content" shall mean any audio,
            video text, images or other material you choose to display on this Website. By displaying Your Content, you
            grant ZimboDelights a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt,
            publish, translate and distribute it in any and all media.</p>
        <p class="content-color">Your Content must be your own and must not be invading any third-party’s rights.
            ZimboDelights reserves the right to remove any of Your Content from this Website at any time without notice.</p>
    </section>
    <!-- content end -->


    <div class="divider"></div>
    <!-- brands section end -->


    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->


    @include('front.partials.bottom-nav')

  @endsection
