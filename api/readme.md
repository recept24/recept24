##Api leírásai:

#####Felhasználó regisztráció:
**elérése:**
./createuser/index.php

**input:**
POST metódusban várt változók:
- `unick`
- `umail`
- `upw`

**output:**
JSON fájlba visszadott eredmény, lehet sikertelen vagy sikeres:
- sikertelen
    `hiba` változó tartalma:
    > "Nincs kitöltve megfelelően a regisztráció"
- sikeres
    `hiba` változó `0` értékű
    `unick` tartalma a nicname
    `umail` tartalma az emailcím
    `regtime` tartalma a rögzítés időpillanata

kiegészítő funkció:
- felhasználó meglétének ellenőrzése (dupla regisztráció kiszűrése)

fejlesztési ötletek:
- felhasználói icon hozzárendelhetősége
- felhasználói profil szerkesztésének lehetősége (nickname vagy email megváltoztathatósága)

---

#####Felhasználói bejelentkezés:
**elérése:**
./finduser/index.php

**input:**
POST metódusban várt változók:
- `unick`
- `umail`
- `upw`

**output:**
JSON fájlba visszadott eredmény, lehet sikertelen vagy sikeres:
- sikertelen
    `hiba` változó tartalma:
    > "Nincs kitöltve megfelelően a regisztráció"
- sikeres
    `hiba` változó `0` értékű
    `unick` tartalma a nicname
    `umail` tartalma az emailcím
    `regtime` tartalma a rögzítés időpillanata

