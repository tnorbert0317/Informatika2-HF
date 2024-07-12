# Informatika2-HF
## Feladat informális leírása
A feladat célja egy olyan weboldal létrehozása, ahol használt elektromos autókat lehet eladásra kínálni. Hirdetést csak a regisztrált felhasználók adhatnak fel, viszont ezek között bárki kereshet.

## Elérhető funkciók
Az alkalmazás a következő funkciókat biztosítja:
 * Hirdetések kezelése (keresés, hirdetésfeladás):
    * Új hirdetés létrehozása
    * Meglévő hirdetés adatainak módosítása
    * Az adatbázisban tárolt hirdetések kilistázása, keresés autómodellek alapján
    * Kilistázott hirdetések rendezése különböző paraméterek alapján
* Felhasználók kezelése (belépés, regisztráció):
    * Új felhasználók létrehozása
    * Meglévő felhasználók adatainak módosítása
    * Felhasználó adatainak kilistázása

## Adatbázis séma
Az adatbázisban a következő entitásokat és attribútumokat tároljuk:
 * Hirdetés: feltöltés dátuma, eladás dátuma, leírás, autó ára, autó évjárata
 * Felhasználó: név, email cím, felhasználónév, jelszó
 * Autó modell: modell név, teljesítmény, kihasználható akkumulátor méret, WLTP hatótáv, gyártás kezdete, gyártás vége
 * Autó márka: márka név
 * Karosszéria típus: karosszéria név

A fenti adatok tárolását az alábbi sémával oldjuk meg:
![Kep](https://github.com/tnorbert0317/info2-hf/blob/main/HF/schema.png?raw=true "schema")

## A működést bemutató videó
https://www.youtube.com/watch?v=x29nt10YMx8
