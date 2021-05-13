<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upute') }}
        </h2>
    </x-slot>

    <span class = "border-bottom border-primary">
        Upute za dodavanje cjelina, razina i lekcija: </br>
    </span>
    Prve se dodaju cjeline, potrebno je upisati samo naslov cjeline i ona označava jedno gradivo</br>
    nutar cjeline dodaju se razine te je preporuka da se one nazivaju – Razina 1, Razina 2… unutar svake cjeline</br>
        Jednostavna razina znači da sadrži jednu vrstu zadatka, odnosno da nije složena od više vrsta zadataka</br>
        Složena razina znači da se sastoji od više vrsta zadataka, odnosno od 2 ili više jednostavnih razina</br>
            Ako odaberete da je razina složena potrebno je označiti sve jednostavne razine, unutar trenutne cjeline, koje sadrže zadatke od kojih je složena trenutna razina</br>
    Za svaku razinu dodaju se zadatci iste vrste te je potrebno upisati naslov zadatka, tekst zadatka i/ili dodati sliku zadatka,  upisati ponuđene odgovore, odabrati točan odgovor od ponuđenih te upisati kratko objašnjenje rješenja zadatka ukoliko student odabere krivi odgovor</br>
        Svaki zadatak mora imati 4 ponuđena odgovora</br>
    Informacije vezane uz zadatke se mogu mijenjati te se oni mogu brisati, dok to za cjeline i razine nije moguće </br>

</x-app-layout>