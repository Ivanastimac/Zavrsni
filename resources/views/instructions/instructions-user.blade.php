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
    &emsp; o	Ako se unutar jednostavne razine krivo riješi zadatak, ponovo se nudi zadatak iz iste razine sve dok ne riješite dva zadatka iz te razine točno i to zaredom</br>
    &emsp; o	Ako se unutar složene razine krivo riješi zadatak, ponuditi će se ponovo zadatci iz jednostavnih razina (onih koje su preduvijet za trenutnu složenu razinu)</br>
    &emsp; o	Potrebno je ponovno riješiti po dva zadatka unutar svake jednostavne razine točno zaredom kako bi se vratili na složenu razinu</br>
    &emsp; o	U složenoj razini se ponovo očekuje da točno riješite dva zadatka točno zaredom da bi prošli na sljedeću razinu</br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>