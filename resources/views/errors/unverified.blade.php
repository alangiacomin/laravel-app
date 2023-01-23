<x-layout>
    <p>DEVI PRIMA ATTIVARE L'ACCOUNT</p>
    <form method="post" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Rimanda link</button>
    </form>
    <div>
        {{ Session::get('message') }}
    </div>
</x-layout>
