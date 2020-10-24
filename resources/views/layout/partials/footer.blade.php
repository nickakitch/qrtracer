<footer class="container mt-5 text-center">
    <p class="small text-muted">This website is to be used for COVID-19 contact tracing, not spam. QR Tracer will not
        use personal or contact information for marketing purposes.
        @auth
            By using this software, you agree to inform people
            if you intend to save their personal or contact details for any purpose other than COVID-19 contact tracing
            (such as marketing purposes).
        @else
            Businesses are required to inform people if they intend to use their contact details for anything other than
            COVID-19 contact tracing purposes. Please contact the business directly for further information or clarification on
            how they intend to use your information.
        @endauth
    </p>
    <p class="small text-muted">
        <a href="{!! obfuscate('mailto:support@qrtracer.org') !!}">{!! obfuscate('support@qrtracer.org') !!}</a>
    </p>
</footer>
