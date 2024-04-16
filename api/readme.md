## Api leírásai:

### Felhasználó regisztráció:  
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

kiegészítő funkció:
- felhasználó meglétének ellenőrzése (dupla regisztráció kiszűrése)

fejlesztési ötletek:
- felhasználói icon hozzárendelhetősége
- felhasználói profil szerkesztésének lehetősége (nickname vagy email megváltoztathatósága)

---

### Felhasználói bejelentkezés:  
**elérése:**  
./finduser/index.php

**input:**  
POST metódusban várt változók:
- `unick`
- `upw`

**output:**  
JSON fájlba visszadott eredmény, lehet sikertelen vagy sikeres:
- sikertelen  
    `hiba` változó tartalma:
    > "Hibás Username vagy Password!"
- sikeres  
    `hiba` változó `0` értékű
    `uid` tartalma az adatbázisban a felhasználóhoz automatikusan generált id 
    `unick` tartalma a nicname  
    `umail` tartalma az emailcím  
    `upw` jelszó, visszaadása a bevitelnek megfelelően történik, az adatbázisban szereplő kódolt karakterlánc formájában.  


---

### Recept feltöltése:  

**elérése:**  
./recipeupload/index.php

**input:**  
POST metódusban várt változók:
- `rcim`
- `rhozzavalok`
- `rleiras`
- `rido`
- `rnehezseg`
- `uid`

**output:**  
JSON fájlba visszadott eredmény, lehet sikertelen vagy sikeres:
- sikertelen  
    `hiba` változó tartalma:
    > "Nincs kitöltve megfelelően a recept"
    
- sikeres  
    `hiba` változó `0` értékű  
    `rcim` tartalma a recept címe  
    `rhozzavalok` tartalma az recept összetevői  
    `rleiras` tartalma a recept elkészítési leírása  
    `rido` elkészítés időtartalma  
    `rnehezseg` elkészítés nehézsége  
    `uid` a feltöltő adatázisban szereplő felhasználói azonosítója  

fejlesztési ötletek: 
- képek hozzáfűzési lehetősége.
