<style type="text/css">
    .cookie-consent {
        position: fixed;
        bottom: 0;
        z-index: 300;
        width: 100%;
        text-align: center;
        background-color: rgba(80, 0, 149, 0.6);
        color: white;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }

    .cookie-consent .btn {
        padding: 0.2rem 1rem;
        font-size: 0.9rem;
    }
</style>

<div class="js-cookie-consent cookie-consent">

    <span class="cookie-consent__message">
        {!! trans('cookieConsent::texts.message') !!}
    </span>

    <button class="js-cookie-consent-agree cookie-consent__agree btn btn-orange">
        {{ trans('cookieConsent::texts.agree') }}
    </button>

</div>