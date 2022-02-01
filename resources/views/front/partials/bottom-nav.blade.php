<footer>
  <!-- bottom panel start -->
    <div class="footer-green">
      <style media="screen">


  .newsletter .newsletter-form {
  position: relative;
  height: 30px;
  z-index: 2; }

  .newsletter .newsletter-form input {
  width: 100%;
  height: 100%;
  border: none;
  /* padding: 30px; */
  border-radius: 5px 0 0 5px;
  background: #fff;
  color: #111;
   }
  .newsletter .newsletter-form input::-webkit-input-placeholder {
    color: #111;
    opacity: .6; }
  .newsletter .newsletter-form input::placeholder {
    color: #111;
    opacity: .6; }
  .newsletter .newsletter-form button {
  position: absolute;
  top: -2px;
  right: -2px;
  bottom: -2px;
  width: 100px;
  background: #008577;
  outline: none;
  border: none;
  border-radius: 0 5px 5px 0;
  color: #fff;
  font-weight: 500;
  cursor: pointer; }
      </style>
      <div class="container newsletter">

        <div class="row justify-content-center">
          <div class="col-lg-4 col-12 my-2">
            <a href="{{ route('home') }}" class="brand-logo">
              <img src="{{ asset('static/images/logo/logo-white.png') }}" class="img-fluid" width="100px">
            </a>
          </div>
          <div class="col-12 col-lg-8 my-2">
              <form action="{{ route('subscribe') }}" method="post" class="newsletter-form">
                @csrf
                  <input type="email" name="email" placeholder="Email" required>
                  <button type="submit">Subscribe</button>
              </form>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-dark">

                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4 item my-3">
                            <h3>Get to Know Us</h3>
                            <ul>
                                <li><a href="{{ route('about') }}"> > About</a></li>
                                <li><a href="{{ route('contact') }}"> > Contact Us</a></li>
                                <li><a href="{{ route('terms') }}"> > Terms And Conditions</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-4 item my-3">
                            <h3>Product Categories</h3>
                            <?php $footer_categories = session()->get('footer_categories') ?>
                            @if(!$footer_categories)
                            <ul>
                                <li><a href="/categories/cereals"> > Cereals</a></li>
                                <li><a href="/categories/drinks"> > Drinks</a></li>
                                <li><a href="/categories/snacks"> > Snacks</a></li>
                                <li><a href="/categories/biscuits"> > Biscuits</a></li>
                                <li><a href="/categories/tea-spices"> > Tea & Spices</a></li>
                                <li><a href="/categories/traditional-foods"> > Traditional Foods</a></li>
                                <li><a href="/categories/maize-meal"> > Maize Meal</a></li>
                                <li><a href="/categories/personal-care"> > Personal Care</a></li>
                            </ul>
                            @else
                            <ul>
                                @foreach($footer_categories as $category)
                                  <li><a href="{{ route('categories.category', $category->slug) }}"> > {{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="col-12 col-md-4 item my-3">
                            <h3>Connect with Us</h3>
                            <?php $footer_socials = session()->get('footer_socials') ?>
                            @if(!$footer_socials)
                            <ul>
                                <li><a target="_blank" href="https://facebook.com/zimbodelights"> > Facebook</a></li>
                                <li><a target="_blank" href="https://instagram.com/zimbodelights"> > Instagram</a></li>
                                <li><a target="_blank" href="https://twitter.com/zimbodelights"> > Twitter</a></li>
                                <li><a target="_blank" href="https://wa.me/447447542016"> > Whatsapp</a></li>
                            </ul>
                            @else
                            <ul>
                                <li><a target="_blank" href="{{ $footer_socials->facebook }}"> > Facebook</a></li>
                                <li><a target="_blank" href="{{ $footer_socials->instagram }}"> > Instagram</a></li>
                                <li><a target="_blank" href="{{ $footer_socials->twitter }}"> > Twitter</a></li>
                                <li><a target="_blank" href="{{ $footer_socials->whatsapp }}"> > Whatsapp</a></li>
                            </ul>
                            @endif
                        </div>
                    </div>
                    <p class="copyright">ZimboDelights © <script>document.write(new Date().getFullYear())</script></p>
                    <div class="mt-3 d-flex justify-content-end">
                      <p>
                        <span><img src="{{ asset('static/images/paypal.png') }}" width="80" class="img-fluid rounded-1 mb-3" alt=""></span>
                        <span><img src="{{ asset('static/images/visa.png') }}" width="80" class="img-fluid rounded-1 mb-3" alt=""></span>
                      </p>

                    </div>

                </div>
        </div>

  <!-- bottom panel end -->
</footer>
