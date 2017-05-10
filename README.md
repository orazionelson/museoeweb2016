# Museo&Web 2016
**Museo&Web** è un CMS distribuito dal [MiBact](http://www.beniculturali.it/) (con licenza GPL 2.0), il progetto ha la particolarit&agrave; di fornire <em>out-of the box</em> una serie di moduli utili per musei, biblioteche, archivi, dipartimenti e centri di ricerca. 

&Egrave;, inoltre, un buon esempio di investimento pubblico verso la collettività visto il codice aperto.

L'ultimo aggiornamento, quindi il rendering delle pagine del CMS, così com'è distribuito, è ancora in XHTML che è uno standard ampiamente superato..

Nell'ambito di una collaborazione con il [Centro di Ateneo Per le Biblioteche R. Pettorino dell'Università Federico II di Napoli](http://www.sba.unina.it) per il rinnovo dei siti di diverse biblioteche dell'ateneo ho proposto una serie di ritocchi al CMS così da estenderne le funzionalità e rendere l'aspetto più moderno e leggibile anche da tablet e smartphone.

Questo *repository* distribuisce pubblicamente una patch per **Museo&Web** che: 
- completa l'integrazione di [jQuery](https://jquery.com/), con:
	- fancybox: un plug-in di jquery per la gestione delle gallerie di immagini
	-  jquery.validationEngine: un plug-in per la validazione dei form
- integra [twitter Bootstrap](http://getbootstrap.com/). 

- aggiunge **NUOVI template** rielaborati partendo dai temi di [bootswatch](https://bootswatch.com/).

## Come installare la patch
1. Copiare nella root di **M&W** il file: **mw.patch**
2. Da shell posizionarsi nella root di **M&W** e lanciare la patch:

	<code>patch -p0 < mw.patch</code>
	
	**NB:per lanciare la patch occorre avere i permessi in scrittura sui file di M&W**

3. Con phpmyadmin (o equivalente) importare la patch al database: **mw_registry_tbl.sql**

4. Copiare la cartella **static** dentro la vostra root di **M&W**, aggiungendo e non sovrascrivendo il contenuto della cartella **static** di **M&W**.
5. Scegliere il tema dall'interfaccia di amministrazione di **M&W**.

Enjoy