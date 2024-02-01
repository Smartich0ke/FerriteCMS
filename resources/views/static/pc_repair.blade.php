@extends('layouts.app')
@section('content')
<article class="contentContainer">
    <header class="d-flex flex-row justify-content-center">
        <h1 class="text-center">PC Repair</h1>
    </header>
    <p>
        I offer PC repair services for southern Adelaide. I can help with:
    </p>
    <ul>
        <li>Software issues</li>
        <li>Hardware issues</li>
        <li>Upgrades</li>
        <li>Building new PCs</li>
        <li>General maintenance</li>
    </ul>
    <p>
        I can also help with other issues, just ask!
    </p>
    <p>
        I charge $20 per hour, with a minimum charge of $10. Just contact me to arrange a time to drop off your PC, and I will get back to you with a quote. I am located in the southern suburbs of Adelaide.
    </p>
    <p>
        If you are interested, please contact me at <a href="mailto:{{ config('contact.email') }}">{{ config('contact.phone') }}</a> or phone me at <a href="tel:{{ config('contact.phone') }}">{{ config('contact.phone') }}</a>.
    </p>
</article>
@endsection
@section('meta-tags')
    <meta name="description" content="PC repair services for southern Adelaide.">
    <meta property="og:description" content="PC repair services for southern Adelaide.">
    <meta name="keywords" content="Nikolai Patrick, software, repair, pc, adelaide, computer repair">
@endsection
@section('page-title')
    PC Repair
@endsection
