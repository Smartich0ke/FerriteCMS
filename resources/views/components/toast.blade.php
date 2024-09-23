@if(session()->has('toast-success'))
        <toast-notification type="success" message="{{ session()->get('toast-success') }}"></toast-notification>
@endif
@if(session()->has('toast-fail'))
        <toast-notification type="danger" message="{{ session()->get('toast-fail') }}"></toast-notification>
@endif
