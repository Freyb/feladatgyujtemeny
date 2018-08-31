
<?php GyakDia::beginslide("Egy irányban láncolt listák", false, "feladatlancoltlista"); ?>


<h3>Egyszeresen láncolt lista másolása</h3>
<div class="sticky">Kis ZH volt</div>
<p>Definiálj egy irányban láncolt lista elemeinek tárolására alkalmas adatstruktúrát, a lista 
20 elemű <code>int</code> tömb adattaggal rendelkezik! Írj függvényt, amely paraméterként kapja egy ilyen 
elemekből felépülő lista címét! A függvény adja vissza a lista másolatát (a másolt lista 
kezdőelemének címét)! (Vagyis hozzon létre egy másik listát, amely ugyanazokat az adatokat 
tartalmazza ugyanolyan sorrendben, mint a paraméterként átvett!)</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
typedef struct Elem {
    int adat[20];
    struct Elem *next;
} Elem;

Elem *masol(Elem *start) {
    Elem *ujstart, *ujfuto;
    for (ujstart = ujfuto = NULL; start != NULL; start = start->next) {
        Elem *p = (Elem*)malloc(sizeof(Elem));
        *p = *start;
        p->next = NULL;
        if (ujstart == NULL)
            ujstart = ujfuto = p;
        else {
            ujfuto->next = p;
            ujfuto = ujfuto->next;
        }
    }
    return ujstart;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Lista másolása megfordítva</h3>
<p>Írj függvényt, amely lemásol egy listát, de úgy, hogy a másolat az eredeti fordítottja legyen! 
Ötlet: ehhez használható az előző feladat megoldása, és a gyakorlati óráról származó lista 
megfordítása ötlet.</p>




<h3>Nincs benne ismétlés</h3>
<p>Írj függvényt, amely úgy módosít egy paraméterként kapott listát, hogy abban ne legyen 
kétszer egymás után ugyanaz az elem! (Pl. ha a bemeneti lista
<em>1,1</em>,5,7,<em>4,4</em>,1,<em>5,5,5</em>,6,
a megváltozott lista tartalma legyen 1,5,7,4,1,5,6).</p>



<h3>Mindegyik elem csak egyszer</h3>
<p>Írj függvényt, amely úgy módosít egy paraméterként kapott listát,
hogy abban minden elem csak egyszer szerepeljen! Térjen vissza a függvény
az esetleg megváltozott lista eleje pointerrel! (Pl. ha a bemeneti
lista 1,5,7,4,4,1,5,6, a megváltozott lista tartalma legyen 1,5,7,4,6).</p>


<h3>Mindegyik elem csak egyszer – új listával</h3>
<p>Írj függvényt, amely létrehoz egy listát olyan módon, hogy az
a paraméterként kapott lista minden elemét csak egyszer tartalmazza.
(Vagyis a feladat ugyanaz, mint az előbb, csak nem módosítani kell a listát,
hanem létrehozni egy újat.)</p>


<h3>Lista közepe</h3>
<div class="sticky">állásinterjú</div>
<p>Adott egy láncolt lista, amelyről tudjuk, hogy páratlan számú eleme van.
Meg kell keresni a középsőt, és adni rá egy pointert. De úgy, hogy csak egyetlen
ciklust használunk! (Tehát ha megszámoljuk, mekkora – első ciklus, és utána
újra az elejéről elindulva megkeressük a középsőt – második ciklus, az nem jó.)</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Az ötlet egy lemaradó pointer. Legyen egy pointerünk (nyúl), amelyik kettesével
lépked a listán, és egy másik (teknős), amely egyesével! Írni kell egy ciklust,
amely végigszalad a nyúllal a listán; amikor a nyúl a végére ért, a teknős a közepén
tart.</p>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Beszúrás az ötödik helyre</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely egy listába beszúr egy elemet úgy, hogy az az ötödik legyen! (A számozás 
1-től indul.) Ha a lista rövidebb, akkor kerüljön a végére az új elem. A függvénynek paraméterei 
legyenek a lista elejére mutató pointer és a beszúrandó adat. Visszatérési értéke legyen a lista 
elejét mutató pointer.</p>
<p>Definiáld az egyszeresen láncolt lista elemét úgy, hogy az max. 50 karakter 
hosszúságú neveket tároljon! Készíts rajzot, amely a listakezelést mutatja számozott lépésekkel! 
Írj rövid főprogramot, amelyben definiálsz egy listát. Feltételezve, hogy a lista fel van 
töltve, szúrd be az 5. helyre a Mézga Géza nevet!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<img src="zh5c.svg" class="kozep" style="width: 80%">
<?php Highlighter::c(<<<'EOT'
typedef struct ListaElem {
    char nev[50 + 1];
    struct ListaElem *kov;
} ListaElem;

ListaElem* beszur_5(ListaElem *eleje, char *nev) {
    ListaElem *uj;
    uj = (ListaElem*) malloc(sizeof(ListaElem));
    strcpy(uj->nev, nev);

    if (eleje == NULL) {
        uj->kov = NULL;
        return uj;
    }

    ListaElem *iter;
    int i;
    for (iter = eleje, i = 1; iter->kov != NULL && i < 4; iter = iter->kov, i++)
        ;

    uj->kov = iter->kov;
    iter->kov = uj;
    return eleje;
}

ListaElem *l = .....;
l = beszur_5(l, "MezgaGeza");
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>








<h3>Ötödik elem törlése</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely egy lista ötödik elemét törli! (A számozás 1-től indul.) Ha nincs ötödik 
elem, akkor ne történjen semmi. A függvénynek egy paramétere legyen csak, az a lista elejére 
mutató pointer.</p>
<p>Definiáld az egyszeresen láncolt lista adatszerkezetét úgy, hogy max. 30 karakter hosszúságú 
szavakat tároljon! Készíts rajzot, amely a listakezelést mutatja számozott lépésekkel! Írj rövid 
főprogramot, amelyben definiálsz egy listát. Feltételezve, hogy a lista fel van töltve, töröld 
ki a függvénnyel az 5. elemet!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<img src="zh5b.svg" class="kozep" style="width: 80%">
<?php Highlighter::c(<<<'EOT'
typedef struct ListaElem {
    char szo[30 + 1];
    struct ListaElem *kov;
} ListaElem;

void lista_torol_5(ListaElem *lista) {
    ListaElem *iter;
    int i;
    for (iter = lista, i = 1; iter != NULL && i < 4; iter = iter->kov, ++i)
        ;

    ListaElem *negyedik = iter;
    if (negyedik == NULL) return;
    ListaElem *otodik = negyedik->kov;
    if (otodik == NULL) return;

    negyedik->kov = otodik->kov;

    free(otodik);
}

ListaElem *l = .....;

lista_torol_5(l);
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Párosak törlése</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely paraméterként vesz át egy számokból álló 
listát, és törli abból a páros számokat! Ha a lista eredeti tartalma 
2,3,4,5,6, akkor a módosított lista 3,5 kell legyen.</p>
<p>Definiáld az egyszeresen láncolt lista adatszerkezetét úgy, hogy 
az egész számokat tartalmazzon! Készíts rajzot, amely a 
listakezelést mutatja számozott lépésekkel! Írj programrészt, 
amely meghívja egy listára a függvényt!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<img src="parosak.svg" class="kozep" style="width: 26em;">
<?php Highlighter::c(<<<'EOT'
typedef struct ListaElem {
    int szam;
    struct ListaElem *kov;
} ListaElem;

ListaElem *parosakat_torol(ListaElem *eleje) {
    ListaElem *iter, *lemarado;

    iter = eleje;
    lemarado = NULL;

    while (iter != NULL) {
        if (iter->szam % 2 == 0) {
            ListaElem *kov = iter->kov;
            if (lemarado != NULL)
                lemarado->kov = kov;
            else
                eleje = kov;

            free(iter);
            iter = kov;
        } else {
            lemarado = iter;
            iter = iter->kov;
        }
    }

    return eleje;
}

ListaElem *eleje = ..........;

eleje = parosakat_torol(eleje);
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Beszúrás adott helyekre</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely paraméterként vesz át egy számokból álló listát, és minden páros szám 
elé beszúr egy listaelemet, amely annak ellentettjét tartalmazza! Például ha az eredeti lista 
2,3,4,5, akkor a módosított -2,2,3,-4,4,5 legyen.</p>
<p>Definiáld az egyszeresen láncolt lista adatszerkezetét úgy, hogy az egész számokat 
tartalmazzon! Készíts rajzot, amely a listakezelést mutatja számozott lépésekkel! Írj 
programrészt, amely létrehoz két listaelemet, és meghívja a keletkező listára a függvényt.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<img src="ellentettek.svg" class="kozep" style="width: 26em;">
<?php Highlighter::c(<<<'EOT'
typedef struct ListaElem {
    int szam;
    struct ListaElem *kov;
} ListaElem;

ListaElem *parosakat_duplaz(ListaElem *eleje) {
    ListaElem *iter, *lemarado;
    for (iter = eleje, lemarado = NULL;
         iter != NULL;
         lemarado = iter, iter = iter->kov)
    {
        if (iter->szam%2 == 0) {
            ListaElem *uj = (ListaElem *) malloc(sizeof(ListaElem));
            uj->szam = -iter->szam;
            uj->kov = iter;
            if (lemarado!=NULL)
                lemarado->kov = uj;
            else
                eleje = uj;
        }
    }

    return eleje;
}

ListaElem *eleje = .............;

eleje = parosakat_duplaz(eleje);
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Elejéről a végére</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely egy lista legelső elemét a lista végére helyezi át! (Például az 
1,2,3,4,5 listából így 2,3,4,5,1 lesz.) Ha kettőnél kevesebb elem van, akkor ne csináljon 
semmit.</p>
<p>Definiáld az egyszeresen láncolt lista adatszerkezetét úgy, hogy egész számokat tartalmazzon! 
Készíts rajzot, amely a listakezelést mutatja számozott lépésekkel! Írj programrészt, amely 
létrehoz két listaelemet, és a függvénnyel áthelyezi az első elemet a lista végére!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<img src="vegere.svg" class="kozep" style="width: 26em;">
<?php Highlighter::c(<<<'EOT'
typedef struct ListaElem {
    int szam;
    struct ListaElem *kov;
} ListaElem;

ListaElem *elso_vegere(ListaElem *elso) {
    if (elso == NULL) return;
    if (elso->kov == NULL) return;

    ListaElem *iter
    for (iter = elso; iter->kov != NULL; iter = iter->kov)
        ;
    ListaElem *masodik = elso->kov;
    iter->kov = elso;
    elso->kov = NULL;
    return masodik;
}

ListaElem *eleje;

eleje = (ListaElem*) malloc(sizeof(ListaElem));
eleje->szam = 3;
eleje->kov = (ListaElem*) malloc(sizeof(ListaElem));
eleje->kov->szam = 4;
eleje->kov->kov = NULL;

eleje = elso_vegere(eleje);
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Végéről az elejére</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely egy lista utolsó elemét a lista elejére helyezi át! (Például az 
1,2,3,4,5 listából így 5,1,2,3,4 lesz.) Ha kettőnél kevesebb elem van, akkor ne csináljon 
semmit.</p>
<p>Definiáld az egyszeresen láncolt lista adatszerkezetét úgy, hogy az valós számokat 
tartalmazzon! Készíts rajzot, amely a listakezelést mutatja számozott lépésekkel! Írj 
programrészt, amely létrehoz két listaelemet, és meghívja a keletkező listára a függvényt.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<img src="elejere.svg" class="kozep" style="width: 26em;">
<?php Highlighter::c(<<<'EOT'
typedef struct Lista {
   double szam;
   struct Lista *kov;
} Lista;
 
Lista *utolso_elore(Lista *eleje) {
   if (eleje == NULL) return;
   if (eleje->kov == NULL) return;
   
   Lista *iter;
   for (iter = eleje; iter->kov->kov != NULL; iter = iter->kov)
      ;
   Lista *utolso = iter->kov;
   
   utolso->kov = eleje;   
   iter->kov = NULL;      
   return utolso;       
}
 
Lista *eleje;

eleje=(Lista*) malloc(sizeof(Lista));
eleje->szam=3;
eleje->kov=(Lista*) malloc(sizeof(Lista));
eleje->kov->szam=4;
eleje->kov->kov=NULL;

eleje = utolso_elore(eleje);
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>














<h3>Fordított listák</h3>
<div class="sticky">Kis ZH volt</div>
<p>Definiálj egy irányban láncolt lista elemeinek tárolására alkalmas adatstruktúrát, 
a lista valós típusú adattaggal rendelkezik! Írj függvényt, amely paraméterként kapja két, 
ilyen elemekből felépülő lista címét! A függvény tegye át a két lista elemeit fordított 
sorrendben egy harmadik listába, és ennek a listának a kezdőcímét adja vissza! (Ne foglalj 
memóriát, hanem az eredeti listaelemek pointereinek átállításával oldd meg a feladatot!) Például 
ha a két bemenő lista elemei: {1.0, 3.0, 5.0} és {2.0, 4.0, 6.0}, akkor a kimenő lista {6.0, 
4.0, 2.0, 5.0, 3.0, 1.0} legyen!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
typedef struct elem {
    double adat;
    struct elem *next;
} elem;

elem *forditvafuz(elem *lista1, elem *lista2) {
    elem *cel = NULL;
    while (lista1 != NULL) {
        elem *temp = lista1->next;
        lista1->next = cel;
        cel = lista1;
        lista1 = temp;
    }
    while (lista2 != NULL) {
        elem *temp = lista2->next;
        lista2->next = cel;
        cel = lista2;
        lista2 = temp;
    }
    return cel;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Páratlanok duplázása</h3>
<div class="sticky">Kis ZH volt</div>
<p>Definiálj két irányban láncolt lista elemeinek tárolására alkalmas adatstruktúrát, 
a lista pozitív egész számokat tárol! Írj függvényt, amely paraméterként kapja egy ilyen 
elemekből felépülő, mindkét végén strázsával lezárt lista címét! A függvény duplázzon meg minden 
olyan listaelemet, amely páratlan számot tartalmaz, vagyis hozzon létre és fűzzön be minden 
ilyen listaelem elé vagy mögé egy új listaelemet, melybe a páratlan értéket átmásolja!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
typedef struct ListElem {
    int data;
    struct ListElem *prev, *next;
} ListElem;

void double_odd(ListElem *start) {
    for (start = start->next; start->next != NULL; start = start->next) {
        if (start->data % 2 == 1) {
            ListElem *p = (ListElem*)malloc(sizeof(ListElem));
            *p = *start;
            p->next = start;
            p->next->prev = p;
            p->prev->next = p;
        }
    }
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Rendezett beszúrás</h3>
<div class="sticky">Kis ZH volt</div>
<p>Hozz létre típust, mely alkalmas egészek láncolt listában való 
tárolására! Írj függvényt, amely átvesz egy NULL-terminált, 
növekvően rendezett listát a fenti típusból, és egy új számot. A 
számot úgy szúrja a listába, hogy annak rendezettsége megmaradjon. A 
működés áttekintéséhez készíts ábrát! Egy másik függvénnyel 
gondoskodj a lista felszabadításáról is. Az elkészült függvények 
alkalmazását rövid programrészlettel szemléltesd; a listát 
feltöltöttnek tekintheted.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
typedef struct ListaElem {
    int adat;
    struct ListaElem *kov;
} ListaElem;

ListaElem *beszur(ListaElem *elso, int ertek) {
    ListaElem *uj = (ListaElem *)malloc(sizeof(ListaElem));
    uj->adat = ertek;

    if (elso == NULL || elso->adat > ertek) {
        uj->kov = elso;
        elso = uj;
    }
    else {
        ListaElem *futo, *lemarado;
        for (futo = elso; futo != NULL && futo->adat <= ertek; futo = futo->kov)
            lemarado = futo;
        uj->kov = futo;
        lemarado->kov = uj;
    }
    return elso;
}

void felszab(ListaElem *elso) {
    ListaElem *futo = elso, *lemarado;
    while (futo != NULL) {
        lemarado = futo;
        futo = futo->kov;
        free(lemarado);
    }
}


ListaElem *elso = NULL;
elso = beszur(elso, 5);
felszab(elso);
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Listák összefűzése</h3>
<div class="sticky">Kis ZH volt</div>
<p>Hozz létre típust, mely alkalmas tetszőleges méretű szavak 
láncolt listában való tárolására! (A szavak helyét dinamikusan 
kell kezelni!) Írj függvényt, amely átvesz két NULL-terminált listát 
a fenti típusból, és az első lista végéhez fűzi a másodikat. A 
függvény az új lista kezdőcímével térjen vissza; feltételezhetjük, 
hogy az átvett eredeti listákat és kezdőcímeiket a hívás helyén már 
nem használjuk tovább. A függvény akkor is helyesen működjön, ha 
bármelyik lista üres! A működés áttekintéséhez készíts ábrát! Egy 
másik függvénnyel gondoskodj a lista felszabadításáról is. Az 
elkészült függvények alkalmazását rövid programrészlettel 
szemléltesd; a listákat feltöltöttnek tekintheted.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
typedef struct ListaElem {
    char *szo;      
    struct ListaElem *kov;
} ListaElem;

ListaElem *osszefuz(ListaElem *elso, ListaElem *masodik) {
    if (elso == NULL) 
        return masodik;

    ListaElem *futo;
    for (futo = elso; futo->kov != NULL; futo=futo->kov)
        ;   /* üres */
    futo->kov = masodik; 
    return elso;
}

void felszab(ListaElem *elso) {
    ListaElem *futo=elso, *lemarado;
    while (futo != NULL) {
        lemarado=futo;
        futo=futo->kov;
        free(lemarado->szo);
        free(lemarado);
    }
}


ListaElem *egy, *ket, *uj;
uj=osszefuz(egy, ket);
felszab(uj);
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Beszúrás véletlenszerű helyre</h3>
<div class="sticky">Kis ZH volt</div>
<p>Hozz létre típust, mely alkalmas valós számok láncolt listában 
való tárolására! Írj függvényt, amely átvesz egy NULL-terminált 
listát a fenti típusból, és egy új számot. A számot véletlenszerűen 
kiválasztott helyre szúrja a listába, tehát az a végére és az 
elejére is kerülhet! A működés áttekintéséhez készíts ábrát! Az 
elkészült függvény alkalmazását rövid programrészlettel szemléltesd; 
a listát feltöltöttnek tekintheted.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
typedef struct ListaElem {
    double adat;
    struct ListaElem *kov;
} ListaElem;


int szamol(ListaElem *elso) {
    int i = 0;
    for (ListaElem *iter = elso; iter != NULL; iter = iter->kov)
        i++;
    return i;
}

void veletlenbe(ListaElem **elso, double ertek) {
    ListaElem *uj = (ListaElem *)malloc(sizeof(ListaElem));
    uj->adat = ertek;

    int n = rand() % (szamol(*elso) + 1);
    if (n == 0)  {
        uj->kov = *elso;
        *elso = uj;
    }
    else {
        ListaElem *futo;
        futo = *elso;
        for (int i = 1; i < n; i++)
            futo = futo->kov;
        uj->kov = futo->kov;
        futo->kov = uj;
    }
}


ListaElem *elso = NULL;
veletlenbe(&elso, 2.71);
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Hány különböző?</h3>
<p>Adott az alábbi struktúrájú, egész számokat tároló láncolt lista:
<?php Highlighter::c(<<<'EOT'
struct ListaElem {
    int ertek;
    struct ListaElem *kov;
};
EOT
); ?>
<p>Készíts programot, mely megszámolja, hogy a listában hány különböző érték van!
Az eredeti listát ne változtassuk meg!</p>


<h3>A lista fájlba írása</h3>

<p>Definiáljunk legfeljebb 50 betűs szavak tárolására alkalmas, egyszeresen láncolt listát!</p>

<p>Írjunk függvényt, amely egy paraméterként kapott listát egy szintén paraméterként kapott nevű
szövegfájlba ír! Legyen minden sorban egy szó!</p>

<p>Írjunk függvényt, amely egy fájlnevet kap paraméterként, visszatérési értéke pedig a fájlból 
beolvasott szavakat tartalmazó lista!</p>

<p>Figyeljünk arra, hogy a fájlba kiírt szavak sorrendje visszaolvasva ne forduljon meg!</p>


<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdlib.h>
#include <stdio.h>
#include <string.h>
 
 
typedef struct Lista {
    char szo[50+1];
    struct Lista *kov;
} Lista;


/* az első paraméterként kapott listát a második paraméterként
 * kapott nevű szövegfájlba írja. */
void fajlba_ir(Lista *l, char const *fajlnev) {
    FILE *fp;
    fp = fopen(fajlnev, "wt");    /* write, text */
    if (fp == NULL) {
        perror("Nem sikerult fajlba menteni a listat");
        return;
    }
    for (Lista *iter = l; iter != NULL; iter = iter->kov)
        fprintf(fp, "%s\n", iter->szo);
    fclose(fp);
}


/* a paraméterként kapott nevű fájlból beolvassa a szavak
 * listáját. a visszatérési érték az újonnan foglalt lista,
 * amelynek elemeit a hívónak kell majd felszabadítania. */
Lista *fajlbol_olvas(char const *fajlnev) {
    FILE *fp;
    Lista *eleje = NULL, *utolso = NULL;
    char szo[50+1];
    
    fp = fopen(fajlnev, "rt");  /* read, text */
    if (fp == NULL) {
        perror("Nem sikerult megnyitni a fajlt");
        return NULL;
    }
    while (fscanf(fp, "%s", szo) == 1) {
        Lista *uj = (Lista *) malloc(sizeof(Lista));
        strcpy(uj->szo, szo);
        uj->kov = NULL;
        if (utolso == NULL)
            eleje = uj;
        else
            utolso->kov = uj;
        /* mindig megjegyzi, melyik az utolsó elem,
         * mert a következőt oda kell majd hozzáfázni. */
        utolso = uj;
    }
    fclose(fp);
    return eleje;
}
 

/* teszteléshez. */
void lista_kiir(Lista *l) {
    for (Lista *iter = l; iter != NULL; iter = iter->kov)
        printf("%s ", iter->szo);
    printf("\n");
}


/* felszabadítjuk a listát. előbb fel kell szabadítani
 * az ebből az elemből kiinduló listát, utána pedig ezt
 * az elemet. az ötlet hasonló, mint a hátrafelé kiírásnál. */
void lista_felszabadit(Lista *l) {
    if (l == NULL)
        return;
    lista_felszabadit(l->kov);
    free(l);
}
 
 
int main(void) {
    Lista *eredeti;
    
    eredeti = (Lista *) malloc(sizeof(Lista));
    strcpy(eredeti->szo, "alma");
    eredeti->kov = (Lista *) malloc(sizeof(Lista));
    strcpy(eredeti->kov->szo, "barack");
    eredeti->kov->kov = (Lista *) malloc(sizeof(Lista));
    strcpy(eredeti->kov->kov->szo, "korte");
    eredeti->kov->kov->kov = NULL;
    
    lista_kiir(eredeti);
    
    fajlba_ir(eredeti, "szavak.txt");

    Lista* fajlbol;
    fajlbol = fajlbol_olvas("szavak.txt");
    lista_kiir(fajlbol);
    
    lista_felszabadit(eredeti);
    lista_felszabadit(fajlbol);
    
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Névsor összeállítása</h3>
<p>Készíts programot, amely beolvassa az egy megadott szövegfájlban soraiban található neveket, 
és névsort állít össze belőlük. A nevek maximum 100 karakteresek, viszont tetszőlegesen sok 
lehet belőlük.</p>

<h3>Szélsőérték keresése</h3>
<p>Egy csapat névsorát az alábbi láncolt listában tároljuk:</p>
<?php Highlighter::c(<<<'EOT'
struct NevLista {
    char nev[100];
    unsigned int eletkor;
    struct NevLista *next;
};
EOT
); ?>
<p>Készíts programot, mely a csapat leghosszabb nevű tagjának az életkorát 
képes megmondani! (Feltesszük, hogy csak egy leghosszabb nevű létezik.)</p>

<h3>Lista rendezése szélsőérték keresésével</h3>
<p>Írj függvényt, amely egy paraméterül kapott, egész számokból álló listát rendez
növekvő sorrendbe, szélsőértékkereséses módszerrel!</p>

<h3>Lista rendezése buborékrendezéssel</h3>
<p>Írj függvényt, amely egy paraméterül kapott, egész számokból álló listát rendez
növekvő sorrendbe, buborék módszerrel!</p>

<h3>Futóverseny</h3>
<p>Adott egy futóverseny résztvevőinek listája:
<?php Highlighter::c(<<<'EOT'
struct Versenyzo {
    char *nev;
    time_t ind, erk;
    struct Versenyzo *next;
};
EOT
); ?>
<p>Az ind adat az indulási időpontját, az erk az érkezését tárolja egész számként, UnixTime formátumban (1970. jan. 1. 0:00 óta eltelt másodpercek száma). Készíts programot, mely meghatározza, hogy melyik futó kapja az első, második és harmadik díjat!</p>





<?php GyakDia::beginslide("Oda-vissza láncolt listák"); ?>

<h3>Duplán láncolt lista másolása</h3>
<p>Írj függvényt, amely lemásol egy duplán láncolt listát!</p>

<h3>Duplán láncolt lista megfordítása</h3>
<p>Írj függvényt, amely megfordít egy duplán láncolt listát! Vajon elég ehhez csak megcserélni a 
kezdő- és a végstrázsát? Rajzold le!</p>

<h3>Duplán láncolt listák összefűzése</h3>
<p>Írj függvényt, amely egy paraméterként kapott, duplán láncolt, mindkét végén strázsás 
listához hozzáfűz egy másikat! (Az első lista ezáltal hosszabb lesz, a második pedig megszűnik 
létezni. Figyelj arra, hogy a második lista strázsáit ilyenkor fel kell szabadítani!)</p>

<h3>Könyvek</h3>
<div class="sticky">Kis ZH volt</div>
<p>Definiálj C-ben egy duplán láncolt, mindkét végén strázsás listát,
amelyik könyek adatait képes tárolni –
szerző (max. 30 betű), cím (max. 50 betű) és terjedelem
(pozitív egész szám) formájában. Írj egy függvényt, amelyik megadja, hogy a paraméterként
kapott szerző hány oldalnyi könyvet írt összesen.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A kis ZH-ban csak a struktúrát és a válogató függvényt kellett megadni.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct Konyv {
    char szerzo[31];
    char cim[51];
    unsigned terjedelem;

    struct Konyv *elozo, *kovetkezo;
} Konyv;

unsigned szumma(Konyv *eleje, char *szerzo) {
    unsigned szum = 0;
    Konyv *futo;
    /* a strazsakat nem dolgozzuk fel! */
    for (futo = eleje->kovetkezo; futo->kovetkezo != NULL; futo = futo->kovetkezo)
        if (strcmp(szerzo, futo->szerzo) == 0)
            szum += futo->terjedelem;

    return szum;
}

/* csak hogy kiprobaljam */
void uj(Konyv *ezutan, char *szerzo, char *cim, unsigned terjedelem) {
    Konyv *uj = (Konyv *)malloc(sizeof(Konyv));
    strcpy(uj->szerzo, szerzo);
    strcpy(uj->cim, cim);
    uj->terjedelem = terjedelem;
    uj->elozo = ezutan;
    uj->kovetkezo = ezutan->kovetkezo;

    ezutan->kovetkezo->elozo = uj;
    ezutan->kovetkezo = uj;
}

/* csak hogy kiprobaljam */
int main(void) {
    Konyv *lista;
    /* strazsak */
    lista = (Konyv *)malloc(sizeof(Konyv));
    lista->elozo = NULL;
    lista->kovetkezo = (Konyv *)malloc(sizeof(Konyv));
    lista->kovetkezo->kovetkezo = NULL;
    lista->kovetkezo->elozo = lista;
    /* konyvek az elejere */
    uj(lista, "Dosztojevszkij", "Bun es bunhodes", 600);
    uj(lista, "Dosztojevszkij", "A felkegyelmu", 800);
    uj(lista, "Tolsztoj", "Haboru es beke", 900);

    printf("%d", szumma(lista, "Dosztojevszkij"));

    /* felszabadit */
    while (lista) {
        Konyv *temp = lista->kovetkezo;
        free(lista);
        lista = temp;
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Fésűs lista</h3>

<p>Dolgozd át úgy az előző „szerzők, könyvek” programot, hogy fésűs listát alkalmazzon! A fő 
listában a szerzők legyenek, amely szerzőkhöz további listákat, a könyvek listáit rendeljük 
hozzá.</p>



<h3>Keresés a raktárban</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy duplán láncolt, mindkét végén strázsás lista termékeket tárol, név (30 karakter), 
cikkszám (20 karakter), és raktárkészlet (darab) formájában. Definiáld a lista struktúrát! Írj 
egy függvényt, amelyik egy adott cikkszámú elemről megmondja, hogy mennyi áll rendelkezésre a 
raktárban. Egy cikkszám csak egyszer szerepel. Ha nincs olyan, akkor 0.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A kis ZH-ban csak a struktúrát és a kereső függvényt kellett megadni.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct Raktar {
    char nev[30 + 1];
    char cikkszam[20 + 1];
    unsigned keszlet;

    struct Raktar *elozo, *kovetkezo;
} Raktar;

unsigned darab(Raktar *eleje, char *cikkszam) {
    /* a strazsakat nem dolgozzuk fel! */
    Raktar *futo;
    for (futo = eleje->kovetkezo; futo->kovetkezo != NULL; futo = futo->kovetkezo)
        if (strcmp(cikkszam, futo->cikkszam) == 0)
            return futo->keszlet;

    return 0;
}

/* csak hogy kiprobaljam */
void uj(Raktar *ezutan, char *nev, char *cikkszam, unsigned keszlet) {
    Raktar *uj = (Raktar *)malloc(sizeof(Raktar));
    strcpy(uj->nev, nev);
    strcpy(uj->cikkszam, cikkszam);
    uj->keszlet = keszlet;

    uj->elozo = ezutan;
    uj->kovetkezo = ezutan->kovetkezo;
    ezutan->kovetkezo->elozo = uj;
    ezutan->kovetkezo = uj;
}

/* csak hogy kiprobaljam */
int main(void) {
    Raktar *lista;
    /* strazsak */
    lista = (Raktar *)malloc(sizeof(Raktar));
    lista->elozo = NULL;
    lista->kovetkezo = (Raktar *)malloc(sizeof(Raktar));
    lista->kovetkezo->kovetkezo = NULL;
    lista->kovetkezo->elozo = lista;
    /* 2 cikk az elejere */
    uj(lista, "strandlabda", "00-17-24", 35);
    uj(lista, "karacsonyfa", "99-33-12", 17);

    printf("%d", darab(lista, "00-17-24"));

    /* felszabadit */
    while (lista) {
        Raktar *temp = lista->kovetkezo;
        free(lista);
        lista = temp;
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Duplán láncolt lista – különféle műveletek</h3>

<div class="sticky">Vizsga volt</div>

<p>Az alábbi struktúrával megadott, két irányban láncolt, mindkét 
végén strázsával lezárt láncolt listát egy több szerző által közösen 
készített C nyelvű program kezeli.</p>

<ul>
    <li>Első strázsa: prev=NULL, erről megismerhető
    <li>Végstrázsa: next=NULL, erről megismerhető
</ul>

<?php Highlighter::c(<<<'EOT'
typedef struct ListaElem {
    char ident[50+1];
    struct ListaElem *prev, *next;
} ListaElem;
EOT
); ?>

<p>A feladat elkészíteni a lista kezeléséhez szükséges alábbi függvényeket:</p>
<ol>
    <li>Törlő függvény, mely két pointert kap: a lista kezdő- (strázsa-) elemének címét, valamint a törlendő elem címét. Nem biztos, hogy
    a törlendő elem a megadott listában található. Feladat: megkeresni a listában a megadott elemet. Ha benne van, kifűzni a listából és
    felszabadítani az általa lefoglalt memóriát.
    <li>Beszúró függvényt, mely két pointert kap: a lista kezdő- (strázsa-) elemének címét, valamint a beszúrandó elem címét. Az új elemet
    az ident mező szerint ABC sorba rendezett listába ident szerint rendezetten kell beszúrnia! A beszúrandó elemet a program más részén már
    lefoglalták, most tehát a pointerek megfelelő beállítása a feladat.
</ol>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
/* ha duplan lancolt a lista, akkor a lista eleje
   pointer nem is kellene a torleshez. itt viszont
   azt mondja a feladat, hogy ellenorizni kell,
   a kapott pointer egyaltalan a ebben a listaban
   van-e. */
void torol(ListaElem *elso_s, ListaElem *torlendo) {
    ListaElem *futo;

    /* megnezzuk, itt van-e. */
    bool megvan = false;
    /* futo=elso_ertelmes, futo!=vegstrazsa */
    for (futo = elso_s->next; futo->next != NULL; futo = futo->next)
        if (futo == torlendo)
            megvan = true;
    if (!megvan)
        return;

    /* kifuzzuk a listabol */
    torlendo->prev->next = torlendo->next;
    torlendo->next->prev = torlendo->prev;
    /* es ennyi */
    free(torlendo);
}

void befuz(ListaElem *elso_s, ListaElem *uj) {
    ListaElem *mi_ele;

    /* beallitjuk a mi_ele pointert az elso ertelmes adatra.
       addig megyunk, amig a vegstrazsat meg nem talaljuk
       ES az uj elem kisebb, mint a vizsgalt. */
    mi_ele = elso_s->next;
    while (mi_ele->next != NULL && strcmp(uj->ident, mi_ele->ident) > 0)
        mi_ele = mi_ele->next;
    /* ha ennek a ciklusnak vege, akkor a mi_ele lesz pont
       az az elem, ami ele be kell szurnunk az ujat. vagy azert,
       mert ez az elso a listaban, aminel nagyobb az uj elemunk,
       vagy azert, mert a vegstrazsat talaltuk meg. */

    /* az uj elem pointereit beallitjuk */
    uj->prev = mi_ele->prev;
    uj->next = mi_ele;

    /* elotte es utana levo pointereit erre allitjuk */
    mi_ele->prev->next = uj;
    mi_ele->prev = uj;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Negatívak törlése</h3>
<div class="sticky">Kis ZH volt</div>
<p>Hozz létre típust, mely alkalmas egészek kétszeresen láncolt 
listában való tárolására! Írj függvényt, amely átvesz egy mindkét 
végén strázsával lezárt listát a fenti típusból, és kitörli a negatív 
értékű elemeket. A működés áttekintéséhez készíts ábrát! Egy másik 
függvénnyel gondoskodj a lista felszabadításáról is. Az elkészült 
függvények alkalmazását rövid programrészlettel szemléltesd; a 
listát feltöltöttnek tekintheted.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
typedef struct ListaElem {
    int adat;
    struct ListaElem *elozo, *kov;
} ListaElem;

void kiszed(ListaElem *elso) {
    ListaElem *futo = elso->kov;
    while (futo->kov != NULL) {
        if (futo->adat < 0) {
            ListaElem *torlendo = futo;
            futo = futo->kov;
            torlendo->elozo->kov = torlendo->kov;
            torlendo->kov->elozo = torlendo->elozo;
            free(torlendo);
        }
        else
            futo = futo->kov;
    }
}

void felszab(ListaElem *elso) {
    ListaElem *futo = elso, *lemarado;
    while (futo != NULL)
    {
        lemarado = futo;
        futo = futo->kov;
        free(lemarado);
    }
}

ListaElem *elso, *utolso;
kiszed(elso);
felszab(elso);
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Duplán láncolt lista másolása</h3>
<div class="sticky">Kis ZH volt</div>
<p>Definiálj két irányban láncolt lista elemeinek tárolására alkalmas adatstruktúrát, 
a lista 20 elemű <code>int</code> tömb adattaggal rendelkezik! Írj függvényt, amely paraméterként 
kapja egy ilyen elemekből felépülő lista címét! A függvény adja vissza a lista másolatát 
(a másolt lista kezdőelemének címét)! (Vagyis hozzon létre egy másik listát, amely ugyanazokat 
az adatokat tartalmazza ugyanolyan sorrendben, mint a paraméterként átvett!)</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
typedef struct Elem {
    int adat[20];
    struct Elem *prev, *next;
} Elem;

Elem *masol(Elem *start) {
    Elem *ujstart, *ujfuto;
    for (ujstart = ujfuto = NULL; start != NULL; start = start->next) {
        Elem *p = (Elem*)malloc(sizeof(Elem));
        *p = *start;
        p->next = NULL;
        if (ujstart == NULL) {
            ujstart = ujfuto = p;
            p->prev = NULL;
        }
        else {
            ujfuto->next = p;
            p->prev = ujfuto;
            ujfuto = ujfuto->next;
        }
    }
    return ujstart;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<?php GyakDia::beginslide("Hosszabban kidolgozandó listás feladatok"); ?>



<h3>Beszúrás az ötödik elem után</h3>
<div class="sticky">Részben KZH volt</div>
<p>Definiálj C-ben egy egyszeresen láncolt listát, amelyik egész számokat tárol. Írj egy 
függvényt, amelyik egy paraméterként kapott lista ötödik eleme után beszúr egy 
ugyancsak paraméterként kapott számot. Ha rövidebb, akkor az elejére kerüljön az új 
szám.</p>
<p>Készíts teljes programot, amellyel a függvény működése kipróbálható!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A kis ZH-ban csak a struktúrát és a beszúró függvényt kellett megadni.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct Szam {
    int szam;
    struct Szam *kovetkezo;
} Szam;

Szam *beszur(Szam *lista, int sz) {
    Szam *futo, *ujeleje;
    int i;

    for (futo = lista, i = 0; futo != NULL && i < 4; futo = futo->kovetkezo, i++) {
        /* megkeresem a "negyediket" vagy a veget, amelyik elobb jon */
        /* 0-tol indul a szamozas */
        /* ciklusmag ures */
    }

    /* ez tuti: hogy lesz egy uj elem. csak hova kerul, es
     * mi a kov pointere? */
    Szam *uj = (Szam *) malloc(sizeof(Szam));
    uj->szam = sz;

    /* ha a lista tul rovid, futo==NULL miatt szalltunk ki a ciklusbol */
    if (futo == NULL) {
        /* elejere */
        uj->kovetkezo = lista;
        ujeleje = uj;
    } else {
        /* ha nem rovid, akkor a mutatott elem utanra rakjuk */
        uj->kovetkezo = futo->kovetkezo;
        futo->kovetkezo = uj;
        ujeleje = lista;    /* marad */
    }

    /* a lista eleje mutato megvaltozhatott, ezert vissza kell adnunk! */
    return ujeleje;
}

/* csak hogy kiprobaljam; uj listaelejevel ter vissza */
Szam *elejere(Szam *lista, int sz) {
    Szam *uj = (Szam *) malloc(sizeof(Szam));
    uj->szam = sz;
    uj->kovetkezo = lista;
    return uj;
}

void kiir(Szam *lista) {
    for (Szam *futo = lista; futo != NULL; futo = futo->kovetkezo)
        printf("%d ", futo->szam);
    printf("\n");
}

/* csak hogy kiprobaljam */
int main(void) {
    Szam *lista = NULL;

    for (int i = 1; i < 10; i++)
        lista = elejere(lista, i);
    kiir(lista);
    lista = beszur(lista, 0);
    kiir(lista);

    /* felszabadit */
    while (lista) {
        Szam *temp = lista->kovetkezo;
        free(lista);
        lista = temp;
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Tizedik elem törlése</h3>
<div class="sticky">Részben KZH volt</div>
<p>Definiálj C-ben egyszeresen láncolt listát, amelyik maximum 45 betűs szavakat tárol. Írj egy 
függvényt, amelyik egy paraméterként kapott lista tizedik elemét törli; ha a lista 
rövidebb ennél, akkor ne csináljon semmit.</p>
<p>Készíts teljes programot, amellyel a függvény működése kipróbálható!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A kis ZH-ban csak a struktúrát és a törlő függvényt kellett megadni.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct Szavak {
    char szo[45 + 1];
    struct Szavak *kovetkezo;
} Szavak;

void tizedik_torol(Szavak *lista) {
    Szavak *futo, *torlendo;
    int i;

    for (futo = lista, i = 0; futo != NULL && i < 8; futo = futo->kovetkezo, i++) {
        /* megkeresem a torlendo ELOTTIT vagy a veget, amelyik elobb jon */
        /* 0-tol indul a szamozas */
        /* ciklusmag ures */
    }

    /* ha emiatt alltam meg, nincs dolog */
    if (futo == NULL || futo->kovetkezo == NULL)
        return;

    /* a futo UTANI elemet toroljuk, ezert szamoltunk csak i<9-ig */
    /* ez a torlendo elem */
    torlendo = futo->kovetkezo;
    /* a megazutanira allitjuk a ptr-t */
    futo->kovetkezo = torlendo->kovetkezo;
    free(torlendo);

    /* vagy a 10. elemet toroltunk, vagy nem csinaltunk semmit;
     * ettol a listaeleje ptr nem valtozik */
    return;
}

/* csak hogy kiprobaljam; uj listaelejevel ter vissza */
Szavak *elejere(Szavak *lista, char *szo) {
    Szavak *uj = (Szavak *) malloc(sizeof(Szavak));
    strcpy(uj->szo, szo);
    uj->kovetkezo = lista;
    return uj;
}

void kiir(Szavak *lista) {
    for (Szavak *futo = lista; futo != NULL; futo = futo->kovetkezo)
        printf("%s ", futo->szo);
    printf("\n");
}

/* csak hogy kiprobaljam */
int main(void) {
    Szavak *lista = NULL;

    for (int i = 1; i < 15; i++) {
        char s[10];
        sprintf(s, "szo%d", i);
        lista = elejere(lista, s);
    }
    kiir(lista);
    tizedik_torol(lista);
    kiir(lista);

    /* felszabadit */
    while (lista) {
        Szavak *temp = lista->kovetkezo;
        free(lista);
        lista = temp;
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Lista átláncolása (megoldás hosszú magyarázattal)</h3>
<div class="sticky">Vizsga volt</div>
<p>Adott a következő definíció:</p>
<?php Highlighter::c(<<<'EOT'
typedef struct elem {
    int adat;
    struct elem *kov;
} Elem;
EOT
); ?>

<p>A fenti elemekből egyszeresen láncolt, NULL-terminált láncolt listát építünk. Írj olyan 
függvényt, amely átvesz egy listát a fenti típusból, a lista első elemét kiveszi, és a lista 
végére fűzi; az így kapott lista kezdőcímét adja vissza. Pl.
start&rarr;A&rarr;B&rarr;C&rarr;NULL lista helyett az ujstart&rarr;B&rarr;C&rarr;A&rarr;NULL
listát kapjuk. A lista teljes tartalmáról nem készíthet másolatot a memóriában.</p>

<p>Készíts teljes programot, amellyel a függvény működése kipróbálható!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A lista tartalmának másolása tiltva van. Ez azt jelenti, hogy a meglévő listaelemek 
átláncolásával kell létrehozni az új állapotot. Bármi listás feladatról van is szó, egy rajz 
háromnegyed siker. A lenti rajzon a felső rész mutatja az eredeti állapotot, az alsó pedig a 
keletkezőt. Piros szín jelöli azokat a pointereket, amelyek megváltoznak.</p>

<img src="listavegere.svg" style="width: 28em;" class="kozep">

<p>Minden új pointerhez (új nyílhoz) a kódban egy pointer értékadás 
felel meg. Vagyis lényegében három pointer értékadást kell csinálni.</p>

<ol>
    <li>Egyrészt az új lista <code>ujstart</code> pointere ezentúl a B elemre mutat, amelyik eddig a második volt.
        Ezt a B elemet úgy érjük el, hogy <code>start-&gt;kov</code>, hiszen <code>start</code> volt eddig az
        első elem, az utána következő pedig a második.
    <li>Másrészt, az eddigi első elem következő pointerét lenullázhatjuk majd, mert mostantól abból utolsó elem lesz.
        (Ez a művelet nem lehet az első lépés, mert akkor elveszítenénk a lista összes többi elemét.)
    <li>Harmadrészt, a lista legvégére be kell fűzni a régi első elemet. Ehhez megkeressük az utolsó elemet, és
        annak a kov pointerébe (amelyik NULL kell legyen, mert attól az az utolsó) betesszük A címét.
</ol>

<p>Két speciális esetre külön kell figyelni kell. Ezeket a fenti 
kód előtt érdemes ellenőrizni, hiszen a fenti kód feltételezi 
<code>start</code> és <code>start-&gt;kov</code> létezését.</p>

<ol>
    <li>Egyik az, ha teljesen üres a lista; akkor nem kell csinálni semmit.
    <li>Másik pedig, ha csak egy elem van, tulajdonképpen akkor sem.
</ol>

<p>A fentiek alapján a kód, a kipróbáló programrésszel együtt – 
amelyeket amúgy a vizsgafeladat nem kért – így néz ki.

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>

typedef struct elem {
    int adat;
    struct elem *kov;
} Elem;

/* csak ezt a fuggvenyt kerte a feladat */
Elem *atrendez(Elem *start) {
    Elem *A, *B, *C;        /* az erthetoseg kedveert */

    if (start == NULL)      /* ures lista -> vissza is ures lista */
        return NULL;
    if (start->kov == NULL)   /* csak egy elem -> atrendezni akkor sem kell,
                               es a lista start igy is valtozatlan */
        return start;

    /* megkeressuk a utolsot (a rajzon a C-t) */
    Elem *futo;
    for (futo = start; futo->kov != NULL; futo = futo->kov)
        ;
    C = futo;
    /* meg erre is fogunk hivatkozni */
    A = start;
    B = start->kov;

    /* ez az uj lista eleje, az eddigi masodik. a rajzon a B. */
    Elem *ujstart = B;

    /* az eddigi A elem lesz a vege, ez a rajzon az A. */
    A->kov = NULL;

    /* itt allitjuk be C-t kovetonek az A-t. */
    C->kov = A;

    return ujstart;
}

/* ezeket nem kerte a feladat */
void kiir(Elem *lista) {
    for (Elem *futo = lista; futo != NULL; futo = futo->kov)
        printf("%c ", futo->adat);
    printf("\n");
}

Elem* uj(int adat) {
    Elem *uj = (Elem *) malloc(sizeof(Elem));
    uj->adat = adat;
    uj->kov = NULL;
    return uj;
}

int main(void) {
    Elem *lista;

    printf("Ures lista:\n");
    lista = NULL;
    kiir(lista);
    lista = atrendez(lista);
    kiir(lista);

    printf("Csak egy elem:\n");
    lista = uj('A');
    kiir(lista);
    lista = atrendez(lista);
    kiir(lista);

    printf("Ket elem, itt mar mukodik:\n");
    lista->kov = uj('B');
    kiir(lista);
    lista = atrendez(lista);
    kiir(lista);
    /* visszarendezzuk */
    lista = atrendez(lista);

    printf("Harom elem, mint a rajzon:\n");
    lista->kov->kov = uj('C');
    kiir(lista);
    lista = atrendez(lista);
    kiir(lista);

    /* felszabadit */
    while (lista) {
        Elem *temp = lista->kov;
        free(lista);
        lista = temp;
    }

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>







<h3>Melyik szó hányszor</h3>
<p>Írj programot, amelyik végigolvas egy szövegfájlt, és kiírja ABC szerint rendezve a benne 
szereplő összes szót, illetve melléjük, hogy melyik hányszor szerepelt.</p>

<h3>Kereszthivatkozások</h3>
<p>Írj programot, amely kereszthivatkozás listát készít egy adott 
szövegfájlról; vagyis megadja az összes benne szereplő szót, és minden szó 
mellé azoknak a soroknak a számát, amelyekben az illető szó megtalálható!</p>


<h3>Gráf listában</h3>
<p>Adott egy gráf, amelyet láncolt listákban tárolunk. A láncolt lista egy eleme tartalmaz egy jelzőbitet, egy mutatót az ő szomszédjait felsoroló láncolt listára, illetve a következő elem mutatóját:
<?php Highlighter::c(<<<'EOT'
struct graf {
    bool jelzobit;
    struct szomszed *szom;
    struct graf *next;
};
EOT
); ?>
<p>A jelzőbitet a program szabadon használhatja. A szomszédos elemek mutatóit tartalmazó láncolt lista szerkezete az alábbi:
<?php Highlighter::c(<<<'EOT'
struct szomszed {
    struct graf *el;
    struct szomszed *next;
};
EOT
); ?>
<p>Határozza meg a program, hogy az így leírt gráf összefüggő-e!</p>
<p>Keress hurkot a gráfban, és írja ki a programod, hogy van-e benne!</p>



<h3>Határidőnapló listában</h2>

<p>Írj programot, amely határidőnaplót kezel! A program tárolja 
események adatait időponttal és fontossággal! A programnak 
tetszőlegesen sok eseményt tudnia kell tárolni; az események száma 
futás közben változhat. Az adatszerkezet gyakori méretváltozása 
kizárja a tömbbel történő praktikus megvalósítást, ezért válassz 
láncolt listát a megvalósításhoz! Feladatok:</p>

<ol>
    <li>Programrészt írni, amelyik a lista elejére beszúr egy új eseményt.
    <li>Programrészt írni, amelyik a lista végére fűz egy új eseményt.
    <li>Összes eseményt kilistázó programrész.
    <li>A listát felszabadító programrész.
</ol>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A felszabadításnál az adott listaelemből a <code>free()</code> 
előtt ki kell mentenünk a mutatót, ugyanis a <code>free()</code> 
után már nem olvashatunk bele a felszabadított elembe. C-ben 
rekurzív algoritmussal listát felszabadítani értelmetlen pazarlás.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

/* Fontos resz: ez a struktura adja a lancolt listat; ezek az
 * elemek a struct _esemeny *kov miatt listaba fuzhetoek. */
typedef struct _esemeny {
    char leiras[101];               /* ezek a tarolt adatok */
    int ev, honap, nap;
    int ora, perc;
    enum _fontossag {
        magas, kozepes, alacsony
    } fontossag;

    struct _esemeny *kov;           /* ez meg a lancolt lista miatt */
} Esemeny;

int main(void) {
    Esemeny e;
    Esemeny *lista=NULL;    /* ures lista */
    Esemeny *temp, *futo;

    /* A LISTA ELEJERE szurjuk be ennek a masolatat (1. feladat) */
    strcpy(e.leiras, "Prog 1 Nagy ZH");
    e.ev=2010; e.honap=11; e.nap=4;
    e.ora=8; e.perc=0;
    e.fontossag=kozepes;
    /* beszuras */
    /* uj esemeny, egyelore memoriaszemettel */
    temp=(Esemeny *) malloc(sizeof(Esemeny));
    /* bemasoljuk az adatokat. struct=struct -> konkret adatmasolas! */
    *temp=e;
    /* ennek a kov mutatoja az eddigi listaeleje */
    /* pointer=pointer -> csak a pointer allitodik, a hasznos
       adat ilyenkor nem masolodik! */
    temp->kov=lista;
    /* a lista eleje pedig innentol kezdve erre mutat */
    /* ez is pointer=pointer. */
    lista=temp;

    /* A LISTA VEGEHEZ FUZZUK ennek a masolatat - 2. feladat. */
    strcpy(e.leiras, "Prog 1 PZH");
    e.nap=18;
    /* vegehez fuzes */
    temp=(Esemeny *) malloc(sizeof(Esemeny));
    *temp=e;
    temp->kov=NULL;         /* ez biztos, mert utolso elem lesz. */
    /* innentol ket lehetoseg - ures volt eddig, vagy nem */
    if (lista==NULL) {
        /* mert ha ures, akkor a lista eleje pointer is valtozik. */
        lista=temp;
    } else {
        /* ha nem, akkor meg kell keresnunk az utolso elemet */
        Esemeny *futo;

        futo=lista;
        while (futo->kov!=NULL) /* ha nem NULL, van meg elem */
            futo=futo->kov;
        /* megtalaltuk az utolsot - annak a pointere mostantol erre. */
        futo->kov=temp;
    }

    /* MINDEN ELEMET KIIRUNK - 3. feladat. */
    futo=lista;
    while (futo!=NULL) {
        printf("%s\n", futo->leiras);
        futo=futo->kov;
    }

    /* MINDEN ELEMET FELSZABADITUNK - 4. feladat. */
    futo=lista;
    while (futo!=NULL) {
        Esemeny *kov;

        kov=futo->kov;  /* elmentjuk */
        free(futo);     /* felszabaditjuk */
        futo=kov;       /* elmentett pointer */
    }
    lista=NULL;     /* innentol ures */

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Listakezelő függvények</h3>

<p>Írd meg függvényekként az előző feladat programrészeit!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>Mind a lista elejére beszúrás, mind a lista végére fűzés esetében
módosulhat a lista első elemére mutató pointer. Az első esetben értelemszerűen
mindig; az utóbbinál akkor, ha eredendően a lista üres. A listába beszúró
függvényeknek ezért valahogy azt módosítaniuk kell tudni. Erre két megoldás
van, 1) pointert kapnak a listaeleje pointerre (cím szerint veszik át
azt a paramétert), 2) visszatérési értékként adják vissza
az új (esetleg megváltozott) lista első eleme pointert.</p>

<p>A lenti kód teljesen ugyanaz, mint az előző feladat, csak 
függvényekkel. Így sokkal áttekinthetőbb kódot kapunk! Mind a két 
megvalósításra (cím szerint átvett lista kezdőcím, és visszatérési 
értékben visszaadott új cím) mutat példát.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct _esemeny {
    char leiras[101];
    int ev, honap, nap;
    int ora, perc;
    enum _fontossag {
        magas, kozepes, alacsony
    } fontossag;

    struct _esemeny *kov;
} Esemeny;

Esemeny *elejere_beszur(Esemeny *lista, Esemeny e) {
    Esemeny *temp;

    temp = (Esemeny *) malloc(sizeof(Esemeny));
    *temp = e;
    temp->kov = lista;
    lista = temp;   /* FIGYELEM! ezzel csak a lokalis valtozot allitjuk at! */

    return lista;   /* visszaadjuk a hivonak */
}

/* itt is lehetne egyszeres indirekcioval is */
void vegehez_fuz(Esemeny **lista, Esemeny e) {
    Esemeny *temp;

    temp = (Esemeny *) malloc(sizeof(Esemeny));
    *temp = e;
    temp->kov = NULL;
    if (*lista == NULL) {
        *lista = temp;
    } else {
        Esemeny *futo = *lista;
        while (futo->kov != NULL)
            futo = futo->kov;
        futo->kov = temp;
    }
}

void kiir(Esemeny *lista) {
    Esemeny *futo = lista;
    while (futo != NULL) {
        printf("%s\n", futo->leiras);
        futo = futo->kov;
    }
}

void felszabadit(Esemeny *lista) {
    Esemeny *futo = lista;
    while (futo != NULL) {
        Esemeny *kov = futo->kov;
        free(futo);
        futo = kov;
    }
}

int main(void) {
    Esemeny e;
    Esemeny *lista = NULL;

    strcpy(e.leiras, "Prog 1 Nagy ZH");
    e.ev = 2010;
    e.honap = 11;
    e.nap = 4;
    e.ora = 8;
    e.perc = 0;
    e.fontossag = kozepes;
    lista = elejere_beszur(lista, e);

    strcpy(e.leiras, "Prog 1 PZH");
    e.nap = 18;
    vegehez_fuz(&lista, e);

    kiir(lista);

    felszabadit(lista);
    lista = NULL;

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Listák és rekurzió</h3>

<p>Egy láncolt lista egy első elemből, és egy abból kiinduló láncolt listából áll. Ezen gondolat 
alapján írjunk függvényeket, amelyek:</p>

<ul>
    <li>Kiírják az egyszeresen láncolt listában tárolt adatokat.
    <li>Kiírják az egyszeresen láncolt lista adatait <em>visszafelé</em>.
    <li>Felszabadítják a listát.
</ul>

<p>Mikor érdemes használni a rekurziót a listáknál? Mikor nem?</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdlib.h>
#include <stdio.h>


typedef struct Lista {
   int adat;
   struct Lista *kov;
} Lista;


/* hogy legyen teszt adat */
Lista *lista_letrehoz(void) {
    Lista *l = NULL;
    for (int i = 0; i < 20; ++i) {
        Lista* u = (Lista*)malloc(sizeof(Lista));
        u->kov = l;
        u->adat = rand() % 100;
        l = u;
    }
    return l;
}


/* kiírja a listát előrefelé. a lista a legelső elemből,
 * és a többi részéből áll (ami úgyszintén egy lista).
 * üres listánál nem kell csinálni semmit. */
void lista_kiir_elore(Lista *l) {
    if (l == NULL)
        return;
    printf("%d ", l->adat);
    lista_kiir_elore(l->kov);
}


/* kiírja a listát visszafelé. az előző függvényhez
 * képest csak megcseréltük a két hátsó sort: előbb a
 * lista "többi részét" írjuk ki, csak utána az első elemet.
 * mivel ezt nem csak az első elemnél, hanem az összesnél így
 * csináljuk, ezért nem csak az első elem kerül a végére,
 * hanem az egész megfordul. */
void lista_kiir_hatra(Lista *l) {
    if (l == NULL)
        return;
    lista_kiir_hatra(l->kov);
    printf("%d ", l->adat);
}


/* felszabadítjuk a listát. előbb fel kell szabadítani
 * az ebből az elemből kiinduló listát, utána pedig ezt
 * az elemet. az ötlet hasonló, mint a hátrafelé kiírásnál. */
void lista_felszabadit(Lista *l) {
    if (l == NULL)
        return;
    lista_felszabadit(l->kov);
    free(l);
}


int main(void) {
    Lista *l = lista_letrehoz();
    
    lista_kiir_elore(l); printf("\n");
    lista_kiir_hatra(l); printf("\n");
    lista_felszabadit(l); 
    
    return 0;
}
EOT
); ?>
<p>A rekurziót csak a hátrafelé kiírásnál érdemes alkalmazni. Az előrefelé történő kiírás és a 
felszabadítás könnyedén megoldható ciklussal is, mivel a pointerek amúgy is előrefelé mutatnak a 
listában. Ilyenkor nem érdemes egy Θ(n) memóriaigényű megoldást választani a Θ(1) memóriaigényű 
helyett!</p>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Lista rendezése új lista építésével</h3>

<p>Írj programot, amely duplán láncolt, mindkét végén strázsás listát épít könyvek címeiből! Írj 
függvényt, amely egy paraméterként kapott listát rendez a mű címe szerinti ábécé sorrendbe!</p>

<p>Lista rendezésére kétféle megoldás létezik: első, hogy a lista elemei megmaradnak, és a 
bennük lévő adatokat cseréljük ki (mint a tömböknél); a második, sokkal hatékonyabb megoldás 
pedig az, hogy az átláncolásukkal rendezzük a listát. Ilyenkor ugyanis nincsen szükség adatok 
cserélgetésére, hanem csak a pointerek módosulnak. A feladat ezért az utóbbi megvalósítása.</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
  <ul>
    <li>Segédfüggvény készítése, amely paraméterként kap egy rendezett, strázsákkal lezárt 
    listát, valamint egy listaelem címét, és a listaelemet a megfelelő helyre befűzi a listába. 
    (Memóriafoglalás tehát nem történik, csak a pointerek állítgatása.)
    
    <li>A rendezőfüggvény emelje ki a rendezetlen listából a két strázsa közötti elemeket egy 
    strázsa nélküli listába, a két strázsa pedig mutasson egymásra (azaz üres lista jön létre, 
    ez lesz a rendezett lista).
    
    <li>Egy ciklusban vegye le a rendezetlen lista első elemét, és hívja meg a segédfüggvényt, 
    amely ezt az elemet beszúrja a rendezett listába! A ciklus addig menjen, amíg van elem a 
    rendezetlen listában!
  </ul>
<?php GyakDiaElemek::nyithatoeddig(); ?>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A rendező függvény (a rendezve beszúró nélkül):</p>

<?php Highlighter::c(<<<'EOT'
void lista_rendez(Lista *lista) {
    /*  kiemeljuk az elsot, es lenullazzuk az utolso kov pointeret */
    ListaElem *elso;
    elso = lista->eleje->kovetkezo;
    lista->vege->elozo->kovetkezo = NULL;

    /*  egymasra allitjuk a strazsakat, ezert ures listava valik */
    lista->eleje->kovetkezo = lista->vege;
    lista->vege->elozo = lista->eleje;

    while (elso != NULL) {
        ListaElem *kovetkezo_lesz = elso->kovetkezo;
        lista_rendezve_beszur(lista, elso);

        elso = kovetkezo_lesz;
    }
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Lista rendezése quicksort algoritmussal</h3>
<p>Írj függvényt, amely egy paraméterül kapott, egész számokból álló,
duplán láncolt listát rendez gyorsrendezéssel!</p>
