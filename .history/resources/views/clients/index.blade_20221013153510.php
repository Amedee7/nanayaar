@extends('layouts.app')
@section('title', 'Administration - Liste des Clients')
@section('content')

    <section class="container mx-auto text-center py-6 mb-12">
        <h1 class="w-full my-6 text-5xl font-bold leading-tight text-center text-white">
            N'attendez pas plus longtemps et lancez-vous !
        </h1>










        

        {{-- @foreach ($clients as $client)
            <div class="flex">
                <div class="w-1/2">
                    <h3 class="my-6 text-6xl leading-tight">
                        {{ $client->name }}
                    </h3>
                </div>

                <div class="w-1/2">
                    <h3 class="my-6 text-3xl leading-tight">
                        N'attendez pas pour réserver !
                    </h3>
                    <livewire:calendar :idCalendar="$client->id" />
                    <div class="w-full mb-4">
                        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-9 py-0 rounded-t"></div>
                    </div>
                </div>
            </div>
        @endforeach
        @livewireScripts
        @stack('scripts')

        <h3 class="my-6 text-3xl leading-tight">
            Merci pour votre visite !
        </h3>
    </section> --}}
@endsection
