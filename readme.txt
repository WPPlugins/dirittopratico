=== Plugin Name ===
Contributors: Claudio De Stasio
Donate link: http://www.dirittopratico.it
Tags: riferimenti normativi, diritto, avvocato, giuridico, codici, leggi, codice civile, codice penale, procedura civile, procedura penale
Requires at least: 2.0
Tested up to: 3.9.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Riconosce automaticamente i riferimenti normativi presenti nel testo degli articoli.

== Description ==
Diritto Pratico è un plugin specifico per siti a contenuto giuridico e offre quattro funzionalità:

La prima è individuare automaticamente i riferimenti normativi nei contenuti e creare i relativi link
al wiki di Diritto Pratico (http://wiki.dirittopratico.it). Il motore di ricerca del wiki, opportunamente modificato, cercherà di "capire" se al riferimento
normativo corrisponde la pagina di un articolo che - in tal caso - sarà mostrata direttamente.
Così ad esempio, un riferimento all'articolo 2054 del codice civile, diventerà un link diretto al testo della norma così come
se avessimo scritto art. 2054 cod.civ. Al pari sarà individuato un riferimento all'art. 69 del D.Lgs. 206/2005, che potremo aver
scritto anche art. 69 decreto legislativo n. 206/2005 o più sinteticamente art. 69 DLT 206-2005 indistintamente...
Qual'è il vantaggio? Che se abbiamo un sito già ricco di contenuti giuridici, potremo aggiungere automaticamente i collegamenti
ipertestuali ai riferimenti normativi senza dover mettere mano agli articoli già presenti! Se la norma specifica non è (ancora)
presente sul wiki, il motore di ricerca indicherà comunque le pagine più attinenti.

La seconda funzione è costituita dalla possibilità di inserire negli articoli collegamenti alle pagine del wiki utilizzando la
sintassi del wiki stesso ovvero il nome della pagina racchiuso tra la doppia parentesi quadra. Così, ad esempio, sarà possibile
tirare un link al codice deontologico forense semplicemente scrivendo codice deontologico forense fra doppie quadre:
[[codice deontologico forense]].

La terza funzione è la possibilità di inserire nel corpo dell’articolo modelli da utilizzare con Note di udienza (l'applicazione web per la redazione
delle deduzioni difensive degli avvocati raggiungibile all'indirizzo: http://note.dirittopratico.it) semplicemente racchiudendo il testo del modello tra due doppie pipe (barre verticali):
||Questo testo, ad esempio, può essere importato come modello direttamente su Note di udienza||.

Infine la quarta funzione consente di incorporare la webapp Note di udienza direttamente sul proprio sito semplicemente inserendo nel corpo di un articolo la
parola chiave 'note' racchiusa tra due doppie pipe in questo modo: ||note||(vedi ad esempio http://www.foromaterano.it/wordpress/verbaliudienza/).

Per vedere il plugin all'opera visita questo indirizzo: http://wp.dirittopratico.it

== Installation ==
Per l'installazione carica semplicemente la cartella dirittopratico nella cartella /wp-content/plugins con il tuo client FTP.
A questo punto dal pannello amministrativo vai alla sezione plugin e attiva dirittopratico. Tutto qui!
N.B.: Benché il plugin sia molto semplice e sia stato positivamente testato su Wordpress v3.9.1, verificane il funzionamento
e la compatibilità con la tua configurazione in locale prima di metterlo online!

== Changelog ==

= 1.0.2 =
* i modelli importati in Note di udienza utilizzano adesso l'editor+
* possibilità di incorporare Note di udienza nel proprio sito
= 1.0.1 =
* Miglioramenti all’algoritmo di riconoscimento
* Implementata la possibilità di escludere il riconoscimento su determinate pagine inserendo ||off|| (off tra doppia pipe) nel testo
= 1.0 =
* Primo rilascio

== Note ==
Per maggiori informazioni: http://wp.dirittopratico.it