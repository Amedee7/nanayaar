@extends('layouts.app')
@section('title', 'Administration - Liste des Clients')
@section('content')

    <section class="container mx-auto text-center py-6 mb-12">
        <h1 class="w-full my-6 text-5xl font-bold leading-tight text-center text-white">
            N'attendez pas plus longtemps et lancez-vous !
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <h3 class="my-6 text-3xl leading-tight">
            Juste un petit clic pour un merveilleux séjour !
        </h3>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto bg-white w-1/6 opacity-25 mb-9 py-0 rounded-t"></div>
        </div>

        @foreach ($clients as $client)
            <div class="flex">
                <div class="w-1/2">
                    <h3 class="my-6 text-6xl leading-tight">
                        {{ $home->name }}
                    </h3>
                    <h3 class="my-6 text-3xl leading-tight">
                        {{ $home->text1 }}
                    </h3>
                    <h3 class="my-6 text-3xl leading-tight">
                        {{ $home->text2 }}
                    </h3>
                    <h3 class="my-6 text-3xl leading-tight">
                        {{ $home->text3 }}
                    </h3>
                    <img class="p-6" src="{{ asset('img/' . $home->image) }}" alt="Gite">
                </div>

                <div class="w-1/2">
                    <h3 class="my-6 text-3xl leading-tight">
                        N'attendez pas pour réserver !
                    </h3>
                    <p class="my-6 text-1xl leading-tight">Cliquez sur le premier jour de votre séjour (arrivée à
                        partir de 16h00) puis faites glisser jusqu'au dernier jour (départ le lendemain avant 10h00)</p>
                    <p class="my-6 text-1xl leading-tight">Les jours en rouge ne sont malheureusement pas disponibles
                    </p>
                    <livewire:calendar :idCalendar="$home->id" />
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
    </section>
@endsection
