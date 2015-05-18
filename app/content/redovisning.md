## Redovisning - kmom01

#### Utvecklingsmiljö 


Utvecklingsmiljön som jag använder är XAMPP på en Windows 8.1 dator. Jag använder PHPStorm som editor, MySQL Workbench,
FileZilla för filuppladdningar, Powershell för en del cmd-prompt grejer, mest för GIT, och så TortoiseGIT för en del andra grejer 
i GIT. 


#### Ramverk 


Jag är bekant med en del MVC-ramverk innan, något som jag kan rätt bra är ASP.NET MVC, som jag jobbar dagligen med, men för PHP är det 
lite mer begränsat. Men i stort sett bygger de ju på samma sätt, det är mer detaljerna som är annorlunda. Jag har provat CodeIgniter och Laravel 
innan. Men sen har jag lekt lite nyligen med Slim PHP och Phalcon också. Men det som jag har haft tankarna att lära mig ordentligt när jag har 
tid är Laravel, som jag tycker verkar vara ett alldeles utmärkt ramverk. 


#### Begrepp 


Ja, jag är bekant med Dependency Injection och Design patterns sedan tidigare, men jag känner att jag kan bli mycket bättre inom detta med. Finns 
ju en hel del att lära sig där fortfarande. De här grejerna är verkligen intressanta och ibland känns det som rena julafton för en programmeringsnörd 
som jag ändå är. 


#### Anax 


Jag blev positivt överraskad av ramverket, det verkar bra skrivet med många (alla?) avancerade begrepp som används i moderna ramverk i dagens läge. Det är 
mycket mer avancerat än CodeIgniter som är ett lättare ramverk och aningen föråldrat. Så den här kursen känns kul. Och överlag har man ju snöat in sig på PHP:andet, 
vilket känns som har framtiden för sig med nästa version av språket (7:an). Och alla spännande ramverk som finns, en stor community bakom språket och det snabba 
arbetsflödet med PHP, känns det som det inte är fel att satsa på språket. 


## Redovisning - kmom02 

#### Composer 

Composer känns rätt fantastiskt och bra att det finns ett enhetligt sätt att ladda ner olika tredjepartspaket och liknande. Det är ju ett stort steg för 
PHP att det kommit. Det känns rätt skönt faktiskt att inte lämna editorn utan med ett composer kommando ladda ner en ny resurs, istället för att manuellt mecka
med det. 

#### Packagist 


Packagist verkar mycket bra, och att det finns en central plats för alla paket. Helt klart, väldigt användbart. .NET har ju NuGet och Node/js har ju NPM för samma, Ruby har väl sina gems. Så
det verkar väl börja finnas i alla språk. Själv har jag inte kollat på sajten innan. Det lilla jag använt Composer innan är att ladda ner ett ramverk och sedan tuta och köra. 


#### Begrepp 

Det är många tjusiga begrepp bakom allt, men om man ser nyktert på vad de i egentligen gör är det inte så märkvärdigt i egentligen. Det är ganska begripligt alltihopa, rätt kul och intressant också. 
Det svåra är väl att få en känsla för flödet i applikationen och hur det laddas in för varje sidladdning. Jag har satt en breakpoint någonstans i början av där DI instansierar sig och sedan steppat igenom 
och kollat hur alltihopa laddas in. Mycket lärorikt faktiskt. Jag laddade faktiskt ner Yii-applikationen och gjorde likadant där också. 

#### Svagheter 

Det som jag noterade var att en post sparas oavsett om man skrivit något. Någon slags validation borde det vara, helst både klient- och servervalidation. Och redirecten som sparas i ett hidden-fält gick 
till startsidan, så jag ändrade den så den stannade på commentssidan. 



