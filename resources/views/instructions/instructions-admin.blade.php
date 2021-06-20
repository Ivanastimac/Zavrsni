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
                Upute za dodavanje cjelina, razina i lekcija: </br>
            </span>
            </div>
        •	Prve se dodaju cjeline, potrebno je upisati samo naslov cjeline i ona označava jedno gradivo</br>
        •	Unutar cjeline dodaju se razine:</br>
        &emsp;  o	Jednostavna razina znači da sadrži jednu vrstu zadatka, odnosno da nije složena od više vrsta zadataka</br>
        &emsp; o	Složena razina znači da se sastoji od više vrsta zadataka, odnosno od 2 ili više jednostavnih razina</br>
        &emsp; o	Ako se odabere da je razina složena potrebno je označiti sve jednostavne razine, unutar trenutne cjeline, koje sadrže zadatke od kojih je složena trenutna razina</br>
        •	Za svaku razinu dodaju se zadatci iste vrste te je potrebno upisati naslov zadatka, tekst zadatka i/ili dodati sliku zadatka,  upisati ponuđene odgovore, odabrati točan odgovor od ponuđenih te upisati kratko objašnjenje rješenja zadatka ukoliko student odabere krivi odgovor</br>
        &emsp; o	Svaka razina unutar cjeline mora sadržavati barem 2 zadatka kako bi cjelina bila dostupna u igrici</br>
        &emsp; o	Svaki zadatak mora imati 4 ponuđena odgovora</br>
        •	Informacije vezane uz zadatke se mogu mijenjati te se zadatci mogu brisati, dok to za cjeline i razine nije moguće </br>
            </div>
        </div>
    </div>
</div>
</x-app-layout>