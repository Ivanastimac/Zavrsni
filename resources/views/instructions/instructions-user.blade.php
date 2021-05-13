<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upute') }}
        </h2>
    </x-slot>

    <span class = "border-bottom border-primary">
        Upute za igranje igrice: </br>
    </span>

    Otvaranjem cjeline pokreće se igrica za taj dio gradiva</br>
    Redom se prikazuju zadatci iz pojedinih razina, a potrebno je zaredom riješiti po dva zadatka iz određene razine kako bi se ta razina uspješno prošla</br>
        Ako unutar jednostavne razine krivo riješite zadatak dobivate zadatak iz iste razine sve dok ne riješite dva zadatka točno</br>
	    Ako unutar složene razine krivo riješite zadatak vraća vas na jednostavne razine koje sadrže zadatke od kojih se sastoji složena razina unutar koje ste krivo riješili zadatak</br>
	        Potrebno je ponovno riješiti po dva zadatka unutar svake jednostavne razine?</br>


</x-app-layout>