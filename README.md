Ovo je web aplikacija razvijena u radnom okviru Laravel. Aplikacija je podijeljena u dva dijela, prvi dio je namijenjen studentima, a drugi administratoru, odnosno profesorima. Dio aplikacije koji je namijenjen studentima osmišljen je u obliku edukativne igre koja je podijeljena u cjeline, tj. gradiva na koja je kolegij podijeljen, a uspješnim rješavanjem zadataka student prelazi razine unutar pojedine cjeline. Drugi dio aplikacije, kojem imaju pristup samo profesori, ima mogucnosti dodavanja cjelina, razina unutar cjelina te zadataka. Administrator baze postavlja 'permission' na vrijednost 'admin' kako bi određeni korisnik dobio ovlasti profesora (administratora aplikacije).

Na sljedećim slikama prikazano je dodavanje cjeline, razine unutar te cjeline te zadatka unutar razine. Razina može biti jednostavna (sadrži jedan dio gradiva) ili složena (zadaci se sastoje od više dijelova gradiva), pa je u slučaju ako je ona složena potrebno odabrati razine koje pokrivaju gradiva od kojih se sastoje zadaci složene razine koja se dodaje.

![sučelje-dodavanje-cjeline](https://user-images.githubusercontent.com/46451757/125159085-682af100-e175-11eb-9b80-7cbe90c73b72.png)
![sučelje-dodavanje-razine](https://user-images.githubusercontent.com/46451757/125159088-6e20d200-e175-11eb-8208-66ca8e605fc7.png)
![sučelje-dodavanje-razine-složena](https://user-images.githubusercontent.com/46451757/125159091-711bc280-e175-11eb-816e-a6e59d23cfe2.png)
![dodavanje-zadatka](https://user-images.githubusercontent.com/46451757/125159095-809b0b80-e175-11eb-8daf-118ea13acf35.png)

Na sljedećoj slici je prikazan jednostavan primjer jednog zadatka koji se prikazuje studentima tijekom igranja igre.

![igrica-zadatak](https://user-images.githubusercontent.com/46451757/125159268-b5f42900-e176-11eb-8a86-098b40e00ca6.png)

