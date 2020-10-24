<footer class="container mt-5 text-center">
    <p><strong>QR Tracer</strong> is a free service to help small businesses set up contact tracing.<br>Please consider making a donation so we can keep our servers up and running, and provide this service for
        free.</p>
    <form action="https://www.paypal.com/donate" method="post" target="_top">
        <input type="hidden" name="hosted_button_id" value="UBL2GCNVZER6L"/>
        <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donateCC_LG.gif" border="0" name="submit"
               title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button"/>
        <img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1"/>
    </form>
    <p class="small text-muted">This website is to be used for COVID-19 contact tracing, not spam. QR Tracer will not
        use personal or contact information for marketing purposes.
        @auth
            By using this software, you agree to inform people
            if you intend to save their personal or contact details for any purpose other than COVID-19 contact tracing
            (such as marketing purposes).
        @else
            Businesses are required to inform people if they intend to use their contact details for anything other than
            COVID-19 contact tracing purposes. Please contact the business directly for further information or
            clarification on
            how they intend to use your information.
        @endauth
    </p>
    <p class="small text-muted">
        <a href="{!! obfuscate('mailto:support@qrtracer.org') !!}">{!! obfuscate('support@qrtracer.org') !!}</a>
    </p>
</footer>
