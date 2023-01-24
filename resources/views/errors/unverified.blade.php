<x-layout>
    <p>{!! __('auth.must_activate_account') !!}</p>
    <form method="post" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">{!! __('auth.send_link_again') !!}</button>
    </form>
    <div>
        {!! Session::get('message') !!}
    </div>
</x-layout>
