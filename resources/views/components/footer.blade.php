<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                       <h4>{{ __('other.menu') }}</h4>
                    <ul class="footer-menu">
                        <li><a href="/about">About Us</a></li>
                    <!--     <li><a href="/events">Events</a></li>
                        <li><a href="/blog">{{ __('blog.c_centre') }}</a></li>
                        <li><a href="/join">{{ __('auth.register') }}</a></li>
                        <li><a href="/employers/publish">Advertise</a></li>
                        <li><a href="/vacancies">Vacancies</a></li> -->
                        <li><a href="/contact">Contact Us</a></li>
                        <li><a href="/terms-and-conditions">Terms and Conditions</a></li>
                        <li><a href="/privacy-policy">Privacy Policy</a></li>
                      <li><br><br>
                            <div class="lang_list">
                                <form method="post" action="/language" id="localization-form" style="display: inline;"> 
                                @csrf
                                <select tabindex="4"  name="language" class="dropdown1" onchange="$('#localization-form').submit()"> 
                                    @foreach (Config::get('languages') as $lang => $language)
                                        <option value="{{ $lang }}" {{ $lang == App::getLocale() ? 'selected=""' : '' }}>{{$language}}</option>
                                    @endforeach
                                </select>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>                             
                <div class="col-md-4 col-sm-5 col-7 location">
                    <h4>{{ __('other.find_us') }}</h4>
                    <div class="row align-items-center">
                        <div class="col-1">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="col-10">
                            <p>Even Business Park, Airport North Rd, Nairobi </p>
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-1">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="col-10">
                            <a href="mailto:info@emploi.co">info@emploi.co</a>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-1">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="col-10">
                            <a href="tel:+254702068282">0702 068 282</a>
                            <br>
                            <a href="tel:+254774569001">0774 569 001</a>
                            <br>
                            <a href="tel:+254772795017">0772 795 017</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                         <h4 style="text-align: center">{{ __('other.social') }}</h4>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/emploi.co/" target="_blank" rel="noreferrer">
                            <span style="display: none">Follow us on Facebook</span>
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/emploiafrica" target="_blank" rel="noreferrer">
                            <span style="display: none">Follow us on Twitter</span>
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://ke.linkedin.com/company/emploike" target="_blank" rel="noreferrer">
                            <span style="display: none">Follow us on LinkedIn</span>
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://instagram.com/emploi.co" target="_blank" rel="noreferrer">
                            <span style="display: none">Follow us on Instagram</span>
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UC6pk7QBB_ezkJmLto-nk3yw" target="_blank" rel="noreferrer">
                            <span style="display: none">Subscribe on Youtube</span>
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
          <div class="text-center pt-3">
            <p>Copyright &copy; {{ date('Y') }} Emploi . All Rights Reserved </p>
        </div>
    </div>
</footer>
<!-- END OF FOOTER -->
