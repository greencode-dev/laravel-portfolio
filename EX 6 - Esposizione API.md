# EX - Esposizione API

## Nome repo: laravel-portfolio

### Descrizione

Come ultimo tassello, possiamo provare ad esporre delle API che ci permettano di inviare all'esterno i dati relativi ai nostri progetti!

### Svolgimento

In questo esercizio dovremo preparare delle API a cui un'app esterna possa agganciarsi per ricevere informazioni sui nostri progetti.

1. Innanzitutto, pubblichiamo il file routes/api.php col comando php artisan route:publish api
2. Creiamo poi un controller dedicato alle API dei progetti, col comando php artisan make:controller Api/ProjectController e inseriamo all'interno i metodi per restituire l'elenco dei progetti ed un singolo progetto, in formato JSON
3. Testiamo su Postman le nostre due rotte per verificare che restituiscano correttamente i JSON che abbiamo predisposto
4. Predisponiamo le configurazioni CORS di Laravel nel file cors.php per autorizzare l'applicazione esterna ad effettuare delle chiamate al nostro backend.

### Bonus

## Nome repo: laravel-portfolio-bonus

Prepariamo (in un repo a parte) una piccola applicazione frontend con React, che permetta ad un utente non loggato di vedere la lista dei nostri progetti in Home e di poter poi andare a visualizzare il singolo progetto in una pagina di dettaglio, sfruttando le API prodotte in Laravel!

Non dimentichiamo di predisporre le configurazioni CORS di Laravel nel file cors.php per autorizzare l'applicazione esterna ad effettuare delle chiamate al nostro backend!

**Nota** : per questo esercizio non è previsto un video di correzione giacché le funzionalità richieste sono uguali a quelle mostrate nel modulo. Pertanto le lezioni stesse fungono da guida per la correzione\*
