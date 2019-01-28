# Guapa Laravel opdracht

Het idee van de opdracht is om een chat applicatie te maken die gebruikt maakt van websockets.
Voor de websockets raden wij aan gebruik te maken van [Pusher](https://pusher.com/)

Maak voor ieder onderdeel een aparte branch aan en probeer meerdere commits te maken zodat er inzicht in je werkwijze zit.

De styling voor de opdracht is o.b.v. een component gemaakt met [Tailwind]('https://tailwindcss.com') [https://tailwindcomponents.com/component/slack-clone-1](https://tailwindcomponents.com/component/slack-clone-1) 

![Example](/resources/screenshots/screenshot-1.png)

**Algemene informatie**
1. Maak een fork van deze repository
2. Maak gebruik van PSR-2 coding standaarden
3. Je ben vrij om te kiezen hoe je te werk gaat (gewoon gaan, TDD, etc.)
4. (optioneel) Maak een video van het eindresultaat

## Onderdeel 1
In het eerste onderdeel is het de bedoeling dat je kan beginnen met chatten.

*Criteria:*
* Versturen van een bericht
* Automatisch tonen van verstuurde berichten van anderen
* Chat berichten op slaan in de database
* Tonen van alle eerder geplaatste berichten in de chatroom

Extra uitdaging:
* Meerdere channels en de mogelijkheid om te wisselen van kanaal

## Onderdeel 2
In het tweede onderdeel ga je verder op onderdeel 1 en ga je van public channels naar private channels

*Criteria:*
* Seed 10 verschillende gebruikers
* Gebruikers tonen onder het kopje "Direct messages"
* Tonen of een gebruiker online is (presence channels)
* Bij het aanklikken van een gebruiker wordt
* Een direct message kunnen versturen naar een persoon (encryptie in DB niet vereist)

## Onderdeel 3
In het derde onderdeel moeten er tests geschreven worden om de werking van de applicatie the garanderen

*Als je TDD te werk bent gegaan kan je dit onderdeel overslaan*

*Criteria:*
* Maak gebruik van [factories](https://laravel.com/docs/5.7/database-testing#writing-factories)
* Schrijf tests voor broadcasting/queues/events
* Schrijf tests voor Channel en Message model
* Schrijf feature tests om de rechten te controleren m.b.t. messages
