<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upute') }}
        </h2>
    </x-slot>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-3">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
            <div class="pb-3">
            <span class = "border-bottom border-primary fs-5 fw-bold">
                Upute za igranje igrice: </br>
            </span>
            </div>
    •	Otvaranjem cjeline pokreće se igrica za taj dio gradiva</br>
    •	Redom se prikazuju zadatci iz pojedinih razina, a potrebno je zaredom riješiti po dva zadatka iz određene razine kako bi se ta razina uspješno prošla</br>
    &emsp; o	Ako unutar jednostavne razine krivo riješite zadatak dobivate zadatak iz iste razine sve dok ne riješite dva zadatka točno</br>
    &emsp; o	Ako unutar složene razine krivo riješite zadatak vraća vas na jednostavne razine koje sadrže zadatke od kojih se sastoji složena razina unutar koje ste krivo riješili zadatak</br>
    &emsp; o	Potrebno je ponovno riješiti po dva zadatka unutar svake jednostavne razine?</br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>