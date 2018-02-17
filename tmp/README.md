# SQL - Szélerőművek feladat


1. Készíts új adatbázist **szeleromu** néven!

2. Hozd létre a következő táblákat az adatbázisban:

   | torony | id, darab, teljesitmeny, kezdev, helyszinid |
   |:-----:|:----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:|
   | id | A széltornyok azonosítója (szám), ez a kulcs :key: |
   | darab | Adott helyen egyszerre épült és azonos teljesítményű tornyok száma (szám) |
   | teljesitmeny | Egy torony teljesítménye kW-ban (szám) |
   | kezdev | A tornyok üzembe helyezésének éve (szám) |
   | helyszinid | A tornyok településének azonosítója (szám). Az adattáblában egy helyszín több rekordban is szerepelhet, ha az adott településen különböző években vagy különböző teljesítménnyel létesítettek széltornyokat. |
   
   
   | helyszin | id, nev, megyeid |
   |:-----:|:----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:|
   | id | A település azonosítója (szám), ez a kulcs :key: |
   | nev | A település neve (szöveg), csak olyan településnév szerepel az adattáblában, ahol van széltorony |
   | megyeid | A település megyéjének azonosítója (szám) |
   
   
   | megye | id, nev, regio |
   |:-----:|:----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:|
   | id | A megye azonosítója (szám), ez a kulcs :key: |
   | nev | A megye neve (szöveg) |
   | regio | A megye régiójának neve (szöveg) |
   
   
   
3. Hozd létre a kapcsolatot a táblák között! 

![](https://i.imgur.com/BytNkP9.jpg)


4. Importáld be az adatokat a megfelelő táblába!(**torony.csv** , **helyszin.csv**, **megye.csv**)


## Feladatok

1. Készíts lekérdezést amely a települések nevét ábécérendben listázza ki!
 
    ```TXT
    Ács
    Bábolna
    Bakonycsernye
    ... .. .
    ```

2. Lekérdezés segítségével írd ki azon települések nevét ahol 2009 után állítottak széltornyot! A listában minden településnév csak egyszer szerepeljen!

    ```TXT
    Bőny
    Csém
    Nagyigmánd
    ... .. .
    ```

3. Készíts lekérdezést amely megadja annak a településnek a nevét és az üzembe helyezés évét ahol először állítottak széltornyot!

    ```TXT
    2000 | Várpalota
    ```


4. Határozd meg régiónként, hogy hány településen van szélerőmű! A lista a települések száma szerint csökkenően jelenjen meg!

    ```TXT
    Nyugat-Dunántúl | 15
    Közép-Dunántúl | 11
    Észak-Magyarország | 3
    Észak-Alföld | 2
    ```


5. Készíts lekérdezést amely településenként kiszámítja, hogy az ott található tornyoknak összesen mekkora a teljesítménye! A lekérdezés a települések nevét és a kiszámított teljesítményértékeket jelenítse meg!

    ```TXT
    Ács | 14000
    Bábolna | 15000
    Bakonycsernye | 2000
    Bőny | 25000
    ... .. .
    ```


6. Készíts lekérdezést amely régiónként azon belül megyénként csoportosítva megjeleníti, hogy egy-egy településen hány széltorony van!


    ```TXT
    Észak-Alföld | Jász-Nagykun-Szolnok | Mezőtúr | 1
    Észak-Alföld | Jász-Nagykun-Szolnok | Törökszentmiklós | 1
    Észak-Magyarország | Borsod-Abaúj-Zemplén | Bükkaranyos | 1
    ... .. .
    ```


## Megoldások

PÉNTEKEN!
