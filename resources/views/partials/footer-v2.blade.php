<div class="footer">
    <div class="ftr__top"
         style="background-image: linear-gradient(180deg, {{$pivot->footer_top_bgc}}00 0%, {{$pivot->footer_top_bgc}}00 44%, {{$pivot->footer_top_bgc}}66 100%), url('{{asset('storage/'.$operation->shortname.'/images/footer_top_bgi/'.$client->id.'/'.$pivot->footer_top_bgi)}}');
         {{$pivot->footer_top_color ? 'color:'.$pivot->footer_top_color.';' : ""}}">
        <div class="form w-form">
            <div class="cover-container">
                <img src="{{asset('storage/'.$operation->shortname.'/images/covers/'.$client->id.'/'.'cover.png')}}" height="424px" width="auto" alt="cover">
            </div>
            <form method="POST"
                  action="{{url('contact')}}"
                  id="email-form" name="email-form" data-name="Email Form" class="form__wrapper">
                <h5 class="heading-2">Notre catalogue et bien plus !</h5>
                <p class="txt__basic">Inscrivez vous &amp; recevez notre dernier catalogue et nos bonnes affaires en
                    exclusivité !</p>
                <label for="email-2" class="field-label">Email Address</label>
                <input type="email" class="text-field w-input"
                       style="{{$pivot->footer_top_color ? 'border-color:'.$pivot->footer_top_color.';' : ""}}
                       {{$pivot->footer_top_input_radius ? "border-radius:".$pivot->footer_top_input_radius.";" : ""}}"
                       maxlength="256"
                       name="email" data-name="Email 2"
                       placeholder="" id="email" required="">
                <input type="submit" value="Je veux le catalogue !"
                       data-wait="Please wait..."
                       class="submit-button w-button"
                       style="{{$pivot->footer_top_btn_bgc ? "background-color:".$pivot->footer_top_btn_bgc.";" : ""}}
                       {{$pivot->footer_top_btn_color ? "color:".$pivot->footer_top_btn_color.";" : ""}}
                       {{$pivot->footer_top_btn_radius ? "border-radius:".$pivot->footer_top_btn_radius.";" : ""}}">
                <div class="w-form-done">
                    <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="w-form-fail">
                    <div>Oops! Something went wrong while submitting the form.</div>
                </div>
            </form>
        </div>
    </div>
    <div class="ftr__btm"
         style="{{$pivot->footer_bottom_bgi ? 'background-image: url('.$pivot->footer_bottom_bgi.');' : ""}}
         {{$pivot->footer_bottom_bgc ? 'background-color:'.$pivot->footer_bottom_bgc.';' : ""}}{{$pivot->footer_bottom_color ? 'color:'.$pivot->footer_bottom_color.';' : ""}}">
        <div class="ftr__wrapper">
            <img src="{{asset('storage/clients/'.$client->id.'/logo_footer/'.$client->logo_footer)}}" loading="lazy"
                 height="85"
                 width="200"
                 alt="" class="image-2">
            <img
                src="{{asset('storage/clients/'.$client->id.'/logo_footer/'.$client->logo_footer)}}"
                loading="lazy" width="300" alt="" class="image-3">
            <ul role="list" class="list w-list-unstyled">
                <li>
                    @if($client->facebook_link)
                        <a href="{{$client->facebook_link}}" rel="nofollow" target="_blank"
                           class="sn__size w-inline-block">
                            <img src="{{asset('icons/facebook-with-circle.svg')}}"
                                 loading="lazy"
                                 width="20" alt="">
                            <div class="sn__txt">SUIVEZ NOUS SUR FACEBOOK</div>
                        </a>
                    @endif
                </li>
                <li class="list-item">
                    @if($client->contact_link)
                        <a href="{{$client->contact_link}}" rel="nofollow"
                           class="sn__size w-inline-block" rel="nofollow">
                            <img src="{{asset('icons/mail-with-circle.svg')}}" target="_blank"
                                 loading="lazy" width="20" alt="">
                            <div class="sn__txt">CONTACTEZ-NOUS</div>
                        </a>
                    @endif
                </li>

            </ul>
            <div class="div-block-6">
                <div class="text-block-3">{{"@" . date('Y')}} {{$client->name}} - Tous droits réservés</div>
                <div class="text-block-3">Avec ❤ par<a
                        href="https://www.latitudesud.gp/" class="link"> latitudesud</a>
                </div>
            </div>
        </div>
        <div class="ftr__wrapper ftr__wrapper-list-link">
            <ul role="list" class="list list-link w-list-unstyled">
                <li class="list-item">
                    @if($client->conditions_link)
                        <a href="{{$client->conditions_link}}" rel="nofollow" target="_blank"
                           class="link-block-2 w-inline-block">
                            <div>Conditions générales d’utilisation</div>
                        </a>
                    @endif
                </li>
                <li class="list-item">
                    @if($client->cookies_link)
                        <a href="{{$client->cookies_link}}" rel="nofollow" target="_blank"
                           class="link-block-2 w-inline-block">
                            <div>Politique cookies</div>
                        </a>
                    @endif
                </li>
                <li class="list-item">
                    @if($client->confidentialite_link)
                        <a href="{{$client->confidentialite_link}}" rel="nofollow"
                           target="_blank"
                           class="link-block-2 w-inline-block">
                            <div>Politique de confidentialité</div>
                        </a>
                    @endif
                </li>
                <li class="list-item">
                    @if($client->legales)
                        <a href="{{$client->legales}}" rel="nofollow" target="_blank"
                           class="link-block-2 w-inline-block">
                            <div>Mentions légales</div>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6015b632d87024749915dfca"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="{{asset('js/laflow.js')}}" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->

<script src="{{'js/form.js'}}"></script>
