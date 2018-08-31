
<?php GyakDia::beginslide("Listák és kétszeres indirekció", false, "ketszeres"); ?>

<h3>Elejéről a végére</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely egy lista legelső elemét a lista végére helyezi át! (Például az
1,2,3,4,5 listából így 2,3,4,5,1 lesz.) A függvény a lista elejére mutató pointert cím szerint
kapja. Ha kettőnél kevesebb elem van, akkor ne csináljon semmit.</p>
<p>Definiáld az egyszeresen láncolt lista adatszerkezetét úgy, hogy egész számokat tartalmazzon!
Készíts rajzot, amely a listakezelést mutatja számozott lépésekkel! Írj programrészt, amely
létrehoz két listaelemet, és meghívja a keletkező listára a függvényt.</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<img src="zh5a.svg" class="kozep" style="width: 50%">

<?php Highlighter::c(<<<'EOT'
typedef struct Lista {
    int szam;
    struct Lista *kov;
} Lista;

void elso_vegere(Lista **peleje) {
    if (*peleje == NULL) return;
    if ((*peleje)->kov == NULL) return;

    Lista *elso = *peleje;
    Lista *iter;
    for (iter = elso; iter->kov != NULL; iter = iter->kov)
        ;

    iter->kov = elso;
    *peleje = elso->kov;
    elso->kov = NULL;
}

Lista *eleje;
eleje = (Lista*) malloc(sizeof(Lista));
eleje->szam = 3;
eleje->kov = (Lista*) malloc(sizeof(Lista));
eleje->kov->szam = 4;
eleje->kov->kov = NULL;

elso_vegere(&eleje);
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Végéről az elejére</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely egy lista utosó elemét a lista elejére helyezi át! (Például az 1,2,3,4,5
listából így 5,1,2,3,4 lesz.) A függvény a lista elejére mutató pointert cím szerint kapja. Ha
kettőnél kevesebb elem van, akkor ne csináljon semmit.</p>
<p>Definiáld az egyszeresen láncolt lista adatszerkezetét úgy, hogy az valós számokat
tartalmazzon! Készíts rajzot, amely a listakezelést mutatja számozott lépésekkel! Írj
programrészt, amely létrehoz két listaelemet, és meghívja a keletkező listára a függvényt.</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<img src="zh5d.svg" class="kozep" style="width: 70%">
<?php Highlighter::c(<<<'EOT'
typedef struct Lista {
   double szam;
   struct Lista *kov;
} Lista;

void utolso_elore(Lista **peleje) {
   if (*peleje==NULL) return;
   if ((*peleje)->kov==NULL) return;

   Lista *iter;
   for (iter = *peleje; iter->kov->kov != NULL; iter = iter->kov)
      ;
   Lista *utolso = iter->kov;

   utolso->kov = *peleje;
   *peleje = utolso;
   iter->kov = NULL;
}

eleje = (Lista*) malloc(sizeof(Lista));
eleje->szam = 3;
eleje->kov = (Lista*) malloc(sizeof(Lista));
eleje->kov->szam = 4;
eleje->kov->kov = NULL;

utolso_elore(&eleje);
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>






<?php GyakDia::beginslide("Bináris fák", false, "feladatbinarisfa"); ?>







<h3>Mikulás</h3>
<div class="sticky">Vizsga volt</div>
<p>A Mikulás a szánjával nekihajtott a fent látható, a gyökérpointerével adott fának. A
csomagok a puttonyából kihullottak és szétszóródtak a fa ágain. Ezért a Mikulás felmászik a fára, végigjárja
az összes ágát, és az ott található ajándékokat összegyűjti. Mindet a fa gyökeréhez cipeli.
Az egyes ágakon található ajándékok számai a fa elemeiben tárolt egész érték által adottak. Feladat:
megírni azt a függvényt, amely a gyökérpointernél összegzi a fában tárolt elemeket, míg az összes
többi, fában tárolt egészet kinullázza.</p>



<h3>Szintek sorszáma</h3>
<pre class="sorsurit1 float">
    0
   / \
  1   1
 / \   \
2   2   2
</pre>
<p>Definiálj bináris fa típust, melynek csomópontjai egész számokat tartalmaznak!</p>
<p>Írj függvényt, amelyik bejárja a fát, és minden csomópontba beírja azt, hogy hányadik
szinten van! A fa gyökere a nulladik szint.</p>
<p>Az ábra bejárás után mutajta egy ilyen fa tartalmát.</p>







<h3>Cseresznye</h3>
<img class="float" src="cseresznye.svg" style="width: 3em;">
<p>Nevezzük cseresznyének az olyan részletet a bináris fában, ahol egy csomópontnak pontosan
két gyereke van, azoknak pedig már nincsenek további gyerekeik!</p>
<p>Írj függvényt, amely paraméterként kap egy bináris fát, és megadja, hány cseresznye
van rajta!</p>




<h3>Kukac</h3>

<div class="sticky">Vizsga volt</div>

<p>Egy bináris fa egész számokat tárol. Definiáld C-ben az adatszerkezetet! Írj függvényt,
amelyik megmondja egy ilyen fáról, hogy kukac-e – másképp fogalmazva, listává fajult-e,
vagyis úgy néz-e ki, mint a lent látható fák. A visszatérési értékében jelezze ezt, logikai igaz értékkel.
Írj egy rövid programrészt, amelyben definiálsz egy fát, és meghívod arra a fára a megírt függvényt.

<pre class="sorsurit1">
    o     vagy     o       vagy       o
   /                \                /
  o                  o              o
 /                    \              \
o                      o              o
</pre>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

typedef struct Fa {
    int adat;
    struct Fa *b, *j;
} Fa;

bool lista_e(Fa *gy) {
    /* ha ures, akkor igen. ures fa, ures lista. */
    if (gy == NULL)
        return true;

    /* ha 2 gyerek van, az elagazas, szoval nem. */
    if (gy->b != NULL && gy->j != NULL)
        return false;

    /* ha balra a folytatas, akkor lehet, hogy jok
     * vagyunk. pontosabban ha a tobbi resz jo, akkor jo. */
    if (gy->b)
        return lista_e(gy->b);
    /* mert amugy jobbra ugyanez */
    return lista_e(gy->j);

}

Fa *uj_csomopont(int i) {
    Fa *uj = (Fa *) malloc(sizeof(Fa));
    uj->adat = i;
    uj->b = uj->j = NULL;

    return uj;
}

void fa_free(Fa *gy) {
    if (gy == NULL)
        return;
    fa_free(gy->b);
    fa_free(gy->j);
    free(gy);
}

int main(void) {
    Fa *gy = NULL;

    /* itt meg true */
    gy = uj_csomopont(1); /* itt is true */
    gy->b = uj_csomopont(2); /* itt is true */
    gy->j = uj_csomopont(3); /* itt false lesz */

    fa_free(gy->j);
    gy->j = NULL;           /* ujra true */
    gy->b->b = uj_csomopont(4); /* megint true */
    gy->b->b->j = uj_csomopont(5);  /* meg mindig */
    gy->b->b->b = uj_csomopont(6);  /* es most nem */

    printf("%d\n", lista_e(gy));

    fa_free(gy);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Keresőfa-e</h3>

<p>Írj függvényt, amely paraméterként egy egész számot tartozó fát kap, visszatérési értékében
pedig azt jelzi, hogy ez rendelkezik-e keresőfa tulajdonsággal, vagy nem! Vagyis balra mindig a
gyökértől kisebb, jobbra mindig a gyökértől nagyobb számok vannak, mindenhol.</p>

<p>Vizsgáld meg az algoritmusod futási idejét! Hogyan függ az a fa csúcspontjainak számától!</p>

<p>Ha nem O(n) időben fut az algoritmusod, oldd meg azt O(n) időben is!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>Nem elég azt vizsgálni, hogy a teljes fa gyökeréhez képest csak balra kisebbek, jobbra
nagyobbak vannak-e. Az alábbi fában ez teljesül (a 2 és a 3 kisebbek a gyökérben lévő 5-nél,
illetve a 6, 9 és 8 nagyobbak nála), mégsem keresőfa; a jelölt elemek elrontják azt.</p>

<pre class="sorsurit1">
    5
   / \
  3   9
 /   / \
2   <span class="piros athuzott">6</span>   <span class="piros athuzott">8</span>
</pre>

<p>Azt sem elég vizsgálni, hogy minden csomópont gyerekei balra kisebbek, jobbra nagyobbak-e.
Az alábbi fában ez minden közvetlen kapcsolatban lévő elemre teljesül, mégsem keresőfáról van
szó: a 6-os elem rossz helyen van, bár a 3-nál nagyobb, de az egész fát tekintve a gyökérben
lévő 5-től jobbra keresnénk.</p>

<pre class="sorsurit1">
    5
   / \
  3   8
 / \   \
2   <span class="piros athuzott">6</span>   9
</pre>

<p>A két tulajdonságnak együtt kell teljesülnie.</p>

<?php Highlighter::c(<<<'EOT'
typedef struct BinFa {
    int szam;
    struct BinFa *bal, *jobb;
} BinFa;

/* maximumot keres a fában. a teljes fát vizsgálja, nem feltételez keresőfa
 * tulajdonságot. nem hívható üres fára. */
int max_fa(BinFa *gy) {
    int max = gy->szam;
    if (gy->bal != NULL) {
        int bal_max = max_fa(gy->bal);
        max = bal_max > max ? bal_max : max;
    }
    if (gy->jobb != NULL) {
        int jobb_max = max_fa(gy->jobb);
        max = jobb_max > max ? jobb_max : max;
    }
    return max;
}

int min_fa(BinFa *gy) {
    return /* ... mint fent ... */;
}

bool keresofa_e(BinFa *gy) {
    if (gy == NULL)     /* üres fa = keresőfa, mert nem hibás */
        return true;
    
    /* ha balra bárhol túl nagy elem van, vagy jobbra bárhol túl kicsi */
    if (max_fa(gy->bal) > gy->szam)
        return false;
    if (min_fa(gy->jobb) < gy->szam)
        return false;
    
    /* ha balra vagy jobbra nem keresőfa van */
    if (!keresofa_e(gy->bal) || !keresofa_e(gy->jobb))
        return false;
    
    /* egyébként az */
    return true;
}
EOT
); ?>

<p>Ez nem hatékony; minden részfát annyiszor bejár (sőt duplán annyiszor), amilyen magas részfában van.</p>

<p>Hatékonyabb megoldáshoz érdemes egy bejárásból kiindulni. Tudjuk, hogy a keresőfát inorder bejárva
növekvő számsort kapunk. Tehát nem kell mást tenni, mint elvégezni a bejárást, és ha bárhol olyan
számot találunk, amelyik egyenlő az előbb látottal vagy kisebb annál, akkor a fát hibásnak jelölhetjük.
Az alábbi algoritmus egyszerűsített: nem áll meg a hibánál, és feltételezi, hogy a fában pozitív számok
vannak; a lényeg így is látszik.</p>

<?php Highlighter::c(<<<'EOT'
typedef struct BinFa {
    int szam;
    struct BinFa *bal, *jobb;
} BinFa;

void keresofa_hibat_keres(BinFa *gy, int *pmax, bool *prendben) {
    if (gy == NULL)
        return;
    
    keresofa_hibat_keres(gy->bal, pmax, prendben);
    if (gy->szam >= *pmax)  /* ha nem szabadna ilyennek jönnie... */
        *rendben = false;
    *pmax = gy->szam;
    keresofa_hibat_keres(gy->jobb, pmax, prendben);
}

bool keresofa_e(BinFa *gy) {
    int max = 0;
    bool rendben = true;
    
    keresofa_hibat_keres(gy, &max, &rendben);
    
    return rendben;
}
EOT
); ?>

<p>Másik megoldási lehetőség: figyelembe vehetjük azt is, hogy a hierarchia milyen intervallumba szorítja be a részfák csomópontjaiban található értékeket. Ehhez vegyük példának az alábbi fát:</p>

<pre class="sorsurit1">
    5
   / \
  3   9
     / \
    x   10
</pre>

<p>Ebben a fában az x-szel jelölt helyen (akár egy csomópont van ott, akár egy nagyobb részfa) csak 5-nél nagyobb, és 9-nél kisebb szám lehet. 5-nél nagyobb azért, mert a gyökérben lévő 5-től jobbra van (ha kisebb lenne, akkor az 5-től balra kellene legyen). 9-nél kisebb pedig azért, mert egy attól balra lévő részfáról van szó.</p>

<p>A megoldás így:</p>

<?php Highlighter::c(<<<'EOT'
bool keresofa_e_belso(BinFa *gy, int *min, int *max) {
    if (gy == NULL)
        return true;
    
    if ((min != NULL && gy->szam <= *min)
        || (max != NULL && gy->szam >= *max))
        return false;
    
    return keresofa_e_belso(gy->bal, min, &gy->szam)
        && keresofa_e_belso(gy->jobb, &gy->szam, max);
}

bool keresofa_e(BinFa *gy) {
    return keresofa_e_belso(gy, NULL, NULL);
}
EOT
); ?>

<p>A függvény a fa gyökere mellett átvesz egy minimumot és egy maximumot is – ezek között kellene legyen
az adott részfa összes eleme. Ha ez nem teljesül az adott csomópontnál, hamissal tér vissza, amúgy pedig
vizsgálja a részfákat. Amikor balra halad, akkor a gyökér határozza meg a maximumot (annál nagyobb elem
a gyökértől balra nem lehet), amikor jobbra, akkor pedig a gyökér a minimumot adja (annál jobbra kisebb
elem nem lehet). A keresést úgy kell elindítani, hogy mindkét pointer NULL értékű; a gyökér esetében
még nincs sem alsó, sem felső határ.</p>

<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Pontosan kettő vagy nulla leszármazott</h3>

<div class="sticky">Kis ZH volt</div>

<p>Egy bináris fa max. 50 betűs szavakat tárol. Definiáld C-ben az adatszerkezetet! Írj függvényt,
amelyik megmondja egy ilyen fáról, hogy minden csomópontnak pontosan kettő vagy nulla
leszármazottja van-e. A visszatérési értékében jelezze ezt, logikai igaz értékkel. Írj egy rövid
programrészt, amelyben definiálsz egy fát, és meghívod arra a fára a megírt függvényt.

<div class="columns">
<div class="column">
<pre class="sorsurit1">
     o
    / \
   /   \
  o     o
 / \   / \
o   o o   o
</pre>
<p>ez pl. ilyen</p>
</div>
<div class="column">
<pre class="sorsurit1">
     o
    / \
   /   \
  o     o
 / \     \
o   o     o
</pre>
<p>ez meg nem</p>
</div>
</div>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdbool.h>

typedef struct Fa {
    char adat[51];
    struct Fa *b, *j;
} Fa;

bool ketto_vagy_nulla_e(Fa *gy) {
    /* ha ures, akkor igen. ha nincs kerdes, akkor igazat valaszolunk. */
    if (gy==NULL)
        return true;

    /* ha 2 gyerek van, az elagazas.
     * akkor ez rendben van - ha a reszfak is rendben vannak */
    if (gy->b!=NULL && gy->j!=NULL)
        return ketto_vagy_nulla_e(gy->b) && ketto_vagy_nulla_e(gy->j);

    /* ha nincs gyerek, akkor mi rendben
     * vagyunk, mert a vegen vagyunk.
     * ez amugy egyesitheto lenne a fentivel, mert
     * ha mindketto null, akkor kvne(null)&&kvne(null) = true,
     * vagyis a fenti kifejezes is helyes eredmenyt ad */
    if (gy->b==NULL && gy->j==NULL)
        return true;

    /* most csak az lehet, hogy egy fele van felolunk
     * tovabb menes, ami viszont nem jo. */
    return false;
}

Fa *uj_csomopont(char *szo) {
    Fa *uj=(Fa *) malloc(sizeof(Fa));
    strcpy(uj->adat, szo);
    uj->b=uj->j=NULL;

    return uj;
}

void fa_free(Fa *gy) {
    if (gy==NULL)
        return;
    fa_free(gy->b);
    fa_free(gy->j);
    free(gy);
}

int main(void) {
    Fa *gy = NULL;

    /* itt true */
    gy=uj_csomopont("1"); /* itt is true */

    gy->b=uj_csomopont("2");  /* itt false, most igy nez ki / */

    gy->j=uj_csomopont("3");  /* megint true, most igy nez ki /\ */

    gy->b->b=uj_csomopont("4");   /* megint false /\
                                                 /   */

    gy->b->j=uj_csomopont("5");   /* ujra true /\
                                              /\  */


    gy->b->b=uj_csomopont("6");
    gy->b->j=uj_csomopont("7");   /* es vegul true  /\
                                                   /\/\ */

    printf("%d\n", ketto_vagy_nulla_e(gy));

    fa_free(gy);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Meddig van teljesen kitöltve?</h3>
<div class="sticky">Vizsga volt</div>
<p>Írj egy függvényt, amelyik megkapja egy fának a gyökerét, és megmondja, hogy a fa
felső hány szintje van teljesen kitöltve!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Onnantól van nem teljesen kitöltve, ahol van benne egy <code>NULL</code> pointer.
Tehát a gyökérhez legközelebbi <code>NULL</code> pointert kell keresni. Ha a gyökér
maga is <code>NULL</code>, akkor ez a távolság nulla. Ha nem, akkor 1 + a két részfából
a kisebbik érték.</p>
<p>Úgy is lehet gondolkozni, hogy egy fa adott szintjein lévő elemek száma egy teljesen
kitöltött fában a kettő hatványait adják ki: 1, 2, 4, 8 stb. Ameddig ez igaz a szintekre,
addig teljesen ki van töltve. Már csak kell egy ciklus, amelyik az egyre mélyebb szinteket
ellenőrzi a külön segédfüggvény hívásával. Ez sokkal lassabb megoldás, de helyes.</p>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Két régebbi kis ZH</h3>

<div class="sticky">Kis ZH volt</div>

<p>A. Egy bináris fa szavakat tárol, max. 30 betűseket. Definiáld C-ben az adatszerkezetet! Írj
függvényt, amelyik megszámolja, hogy egy ilyen fában hány olyan csomópont van, amelyik a „dinnye” és a
„papaja” közötti szavakat tárolja az ABC-ben (beleértve pontosan ezeket is.) Az eredményt
visszatérési értékként adja. Írj egy rövid programrészt, amelyben definiálsz egy fát, és
meghívod arra a fára a megírt függvényt.

<p>B. Egy bináris fa szavakat tárol, amelyek dinamikusan foglalt sztringben vannak. Definiáld a
fát! Írj függvényt, amelyik egy ilyen fát teljesen felszabadít (minden hozzá tartozó dinamikus
memóriaterületettel együtt!) Írj egy rövid programrészt, amelyben definiálsz egy fát, és
meghívod arra a fára a megírt függvényt.

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A megoldás közösen tartalmazza a két feladat által kért függvényeket. Az első feladat maximum
30 betűs sztringjei helyett is a második feladat dinamikusan foglalt sztringjei szerepelnek.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct Fa {
    char *sztring;
    struct Fa *bal, *jobb;
} Fa;

int dinnye_papaja_kozott(Fa *gy) {
    int db;

    if (gy == NULL)     /* ha nincs fa, 0 ilyen szo van */
        return 0;

    db = 0;
    if (strcmp(gy->sztring, "dinnye") >= 0 && strcmp(gy->sztring, "papaja") <= 0)
        db = 1;

    /* ez + a reszfakban levok */
    return db + dinnye_papaja_kozott(gy->bal) + dinnye_papaja_kozott(gy->jobb);
}

void free_fa(Fa *gy) {
    if (gy == NULL)     /* ha nincs is csomopont */
        return;

    /* elobb a reszfak */
    free_fa(gy->bal);
    free_fa(gy->jobb);

    /* utana maga a csomopont */
    if (gy->sztring)    /* ha van sztring, free */
        free(gy->sztring);
    free(gy);
}

Fa *uj_csomopont(char *str) {
    Fa *uj = (Fa *) malloc(sizeof(Fa));
    uj->sztring = malloc(strlen(str) + 1);
    strcpy(uj->sztring, str);
    uj->bal = uj->jobb = NULL;

    return uj;
}

int main(void) {
    Fa *gy;

    gy = uj_csomopont("kigyo");
    gy->bal = uj_csomopont("cseresznye");
    gy->jobb = uj_csomopont("free");
    gy->bal->bal = uj_csomopont("gyumolcsos");

    printf("dinnye-papaja kozott: %d\n", dinnye_papaja_kozott(gy));

    free_fa(gy);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Fát másol, fák egyformák-e</h2>

<p>
Definiálj egy adatszerkezetet, amelyik karaktereket tároló bináris fa létrehozására alkalmas!
<br>
Írj egy függvényt, amelyik paraméterként egy
ilyen bináris fa gyökerére mutató pointert kap! Visszatérési értéke
legyen egy má - sik bináris fa gyökerére mutató pointer, amelyik az
előbbinek a másolata! (A másolást is végezze el a függvény!)
Írj egy függvényt, amelyik paraméterként két ilyen
bináris fa gyökerére mutató pointert kap! Térjen vissza igazzal a
függvény, ha a paraméterként kapott két bináris fa egyforma,
hamissal akkor, ha nem egyformák.
Írj egy függvényt, amelyik felszabadít egy paraméterként kapott bináris fát!
<br>
Van egy fánk, és&hellip;
1) Feltételezve, hogy az egyik már tartalmaz adatot, másold le azt!
2) Hasonlítsd őket össze; írd ki a képernyőre, hogy „egyformák”, ha azok. Szabadítsd fel utána a fákat.
</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>Ez a vizsga négy különböző csoportjainak feladataiból összegyúrt
nagy feladat. Az A csoportban olyan programrészt kellett
írni, amelyik egy bináris fát lemásol; a B csoportban pedig úgyszint
fát kellett másolni, de úgy, hogy a másolat az eredetinek a
tükörképe legyen. Hogy lehet lemásolni egy fát? Egy fa másolata az a
gyökér csomópontjának a másolata (1. malloc, 2. adat másolása), és a
két részfájának másolata (itt a rekurzió.) Az új csomópont bal
oldali részfája az eredeti fa bal oldali részfájának másolata; és a
jobb oldalira ugyanez. Természetesen üres fa másolata üres fa.</p>

<?php Highlighter::c(<<<'EOT'
Fa *masol(Fa *gy) {
    Fa *m;

    if (gy==NULL)    /* ures fa masolata ures fa */
        return NULL;

    m=(Fa *) malloc(sizeof(Fa));       /* uj csomopont es adat */
    m->adat=gy->adat;

    m->bal=masol(gy->bal);      /* reszfak */
    m->jobb=masol(gy->jobb);

    return m;
}
EOT
); ?>

<p>Tükrözve lemásolni ugyanígy kell. Csak olyankor a bal részfába
kerül a jobb oldalinak a másolata, a jobb oldaliba pedig a bal
másolata – persze az egyes másolatok is tükrözve kell legyenek, így
ahhoz ugyanúgy csak egy függvény kell:</p>

<?php Highlighter::c(<<<'EOT'
m->bal=tukormasol(gy->jobb);      /* reszfak */
m->jobb=tukormasol(gy->bal);
EOT
); ?>

<p>Az összehasonlítás a következő módon képzelhető el. A függvény
ebben az esetben két fát kap. Ha mind a két fa üres (NULL), akkor
igazat kell válaszoljon; két üres fa ugyanis egyforma. Ha az egyik fa
üres, a másik meg nem, akkor nem egyformák (legyen bármi is a
másikban, ha az első teljesen üres.) Ezekkel a NULL pointeres
eseteket lerendeztük. Ha egyik fa sem üres, akkor össze kell
hasonlítani őket: akkor egyformák, ha a gyökérelemeik egyformák,
<em>és</em> a bal részfáik egyformák, <em>és</em> a jobb részfáik
egyformák.</p>

<?php Highlighter::c(<<<'EOT'
bool egyforma_e(Fa *egyik, Fa *masik) {
    if (egyik==NULL && masik==NULL)     /* ket ures fa egyforma */
        return true;
    if (egyik!=NULL && masik==NULL)     /* ures fa es nem ures fa -> nem egyf */
        return false;
    if (egyik==NULL && masik!=NULL)     /* detto */
        return false;

    return egyik->szam==masik->szam                     /* egyforma szam a gyokerben */
           && egyforma_e(egyik->bal, masik->bal)        /* es egyformak a bal reszfak */
           && egyforma_e(egyik->jobb, masik->jobb);     /* es a jobb reszfak */
}
EOT
); ?>

<p>Hogy a két fa egymásnak tükörképe-e, azt ugyanígy lehet
ellenőrizni, csak lent a feltételnél a bal részfát a jobbal kell
hasonlítani, és fordítva. A teljes kódot, néhány aprósággal
kiegészítve, hogy működjön, lásd lent.</p>

<p>Buktató: hogy két fa inorder bejárással ugyanazt a listát adja,
nem biztosan jelenti azt, hogy a két fa egyforma! Egy 5 gyökerű fa,
aminek a balra leszármazottja 7, és annak a balra leszármazottja 9,
a 9-7-5 számsort adja inorder bejárva; a 7 gyökerű fa, amelyiknek a
bal leszármazottja 9, a jobb pedig 5, úgyszint. Pedig az egyik ilyen
/ alakú, a másik meg ilyen /\.</p>

<p>A teljes, kipróbálható program:</p>

<?php Highlighter::c(<<<'EOT'
#include <stdlib.h>
#include <stdio.h>

typedef struct Fa {
    int szam;                   /* double, float, char, ... */
    struct Fa *bal, *jobb;
} Fa;

/* ezt mindegyik keri */
void torol(Fa *gy) {
    if (gy==NULL)
        return;
    torol(gy->bal);
    torol(gy->jobb);
    free(gy);
}

/* ezt semelyik nem keri, csak nekem kellett */
Fa *uj(int szam) {
    Fa *uj=malloc(sizeof(Fa));
    uj->szam=szam;
    uj->bal=uj->jobb=NULL;
    return uj;
}

/* ezt sem kerte egyik feladat sem */
void kiir(Fa *gy) {
    if (gy==NULL)
        return;
    kiir(gy->bal);
    printf("%d\n", gy->szam);
    kiir(gy->jobb);
}

/* A */
Fa *masol(Fa *gy) {
    Fa *uj;
    if (gy==NULL)
        return NULL;
    uj=malloc(sizeof(Fa));
    uj->szam=gy->szam;
    uj->bal=masol(gy->bal);
    uj->jobb=masol(gy->jobb);
    return uj;
}

/* B */
Fa *tukormasol(Fa *gy) {
    Fa *uj;
    if (gy==NULL)
        return NULL;
    uj=malloc(sizeof(Fa));
    uj->szam=gy->szam;
    uj->jobb=tukormasol(gy->bal);    /* itt a kutya elasva */
    uj->bal=tukormasol(gy->jobb);    /* bal <- jobb, jobb <- bal */
    return uj;
}

/* C */
bool egyforma_e(Fa *egyik, Fa *masik) {
    if (egyik==NULL && masik==NULL)   /* ket ures fa egyforma */
        return true;
    if (egyik!=NULL && masik==NULL)   /* ures fa es nem ures fa -> nem egyf */
        return false;
    if (egyik==NULL && masik!=NULL)   /* detto */
        return false;

    return egyik->szam==masik->szam                     /* egyforma szam a gyokerben */
           && egyforma_e(egyik->bal, masik->bal)        /* es egyformak a bal reszfak */
           && egyforma_e(egyik->jobb, masik->jobb);     /* es a jobb reszfak */
}

/* D */
bool tukros_e(Fa *egyik, Fa *masik) {
    if (egyik==NULL && masik==NULL)   /* ket ures fa egyforma */
        return true;
    if (egyik!=NULL && masik==NULL)   /* ures fa es nem ures fa -> nem egyf */
        return false;
    if (egyik==NULL && masik!=NULL)   /* detto */
        return false;

    return egyik->szam==masik->szam                  /* egyforma szam a gyokerben */
           && tukros_e(egyik->bal, masik->jobb)      /* es bal reszfa ~ jobb reszfa */
           && tukros_e(egyik->jobb, masik->bal);     /* illetve jobb reszfa ~ bal reszfa */
}

int main(void) {
    Fa *eredeti;
    Fa *masolat;
    Fa *tukormasolat;

    /* hogy legyen min kiprobalni, nem feladat */
    eredeti=uj(5);
    eredeti->bal=uj(7);
    eredeti->jobb=uj(9);

    /* A */
    masolat=masol(eredeti);
    /* B */
    tukormasolat=tukormasol(eredeti);

    kiir(eredeti);
    kiir(masolat);
    kiir(tukormasolat);

    /* C */
    printf("egyforma eredeti,masolat: %s\n", egyforma_e(eredeti, masolat)?"egyforma":"nem az");
    printf("egyforma eredeti,tukormasolat: %s\n", egyforma_e(eredeti, tukormasolat)?"egyforma":"nem az");

    /* D */
    printf("tukros eredeti,masolat: %s\n", tukros_e(eredeti, masolat)?"tukros":"nem az");
    printf("tukros eredeti,tukormasolat: %s\n", tukros_e(eredeti, tukormasolat)?"tukros":"nem az");

    /* mind keri */
    torol(eredeti);
    torol(masolat);
    torol(tukormasolat);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Kulcs szerint rendezett fa</h3>
<p>Adott a következő program, amelyben egy kétdimenziós tömb elemeinek
első fele egy kulcs, második fele egy érték. Például a legelső elemnél
a 13 a kulcs, a 105 pedig az érték.</p>

<?php Highlighter::c(<<<'EOT'
char minta[][2]={{13, 105}, {22, 116}, {14, 111}, {45, 101}, {3, 99},
   {35, 32}, {23, 32}, {65, 32}, {18, 10}, {53, 97}, {17, 62},
   {27, 110}, {55, 33}, {15, 46}, {4, 108}, {59, 41}, {72, 32},
   {41, 102}, {6, 100}, {39, 110}, {60, 59}, {68, 116}, {31, 10},
   {74, 59}, {30, 123}, {63, 32}, {1, 105}, {16, 104}, {47, 108},
   {66, 114}, {28, 40}, {20, 105}, {26, 105}, {62, 32}, {29, 41},
   {46, 108}, {71, 110}, {25, 97}, {7, 101}, {64, 32}, {0, 35},
   {77, 10}, {50, 118}, {76, 125}, {56, 92}, {5, 117}, {34, 32},
   {48, 111}, {38, 105}, {8, 32}, {54, 103}, {19, 10}, {33, 32},
   {73, 48}, {32, 32}, {61, 10}, {51, 105}, {12, 100}, {36, 112},
   {67, 101}, {37, 114}, {44, 72}, {70, 114}, {58, 34}, {9, 60},
   {2, 110}, {52, 108}, {11, 116}, {10, 115}, {75, 10}, {24, 109},
   {40, 116}, {21, 110}, {49, 32}, {42, 40}, {43, 34}, {57, 110},
   {69, 117}, {78, 0}};
EOT
); ?>

<p>Írj egy programot, amely felépít egy bináris fát, amely ezeket
a kulcs-érték párokat tartalmazza, és a kulcs szerint rendezve van!
Az értékeket karakternek tekintve, járd be a keletkező fát a kulcs
szerint növekvő sorrendben, és írd ki a karaktereket! Milyen üzenetet
rejt a fa?</p>





<h3>Keresés rendezetlen fában</h3>

<p>Írj rekurzív függvényt, amely nem feltételez semmilyen rendezettséget a fa elemei részéről
(az értékek részéről), és úgy keres meg egy karaktert a fenti fában!</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<ul>
   <li>Ha üres a fa, akkor nincs meg a keresett elem.
   <li>Ha a gyökérelem pont az, amit keresünk, akkor arra kell visszatérni pointerrel.
   <li>Amúgy lehet, hogy a bal oldali részfában lesz. Ha ott megtaláljuk, akkor egy onnan
      származó pointerrel kell visszatérni.
   <li>Ugyanez lehet a jobb oldali részfánál is.
   <li>Ha egyikben sem – akkor <code>NULL</code> pointer.
</ul>
<?php GyakDiaElemek::nyithatoeddig(); ?>


<h3>Lista építése</h3>

<p>Írj függvényt, amely egyszeresen láncolt listát épít a fenti, karaktereket tároló fa azon
elemeire mutató pointerekből, amelyek:

<ul>
   <li>az <code>'l'</code> betűt tartalmazzák,
   <li>whitespace (szóköz, újsor vagy tabulátor) karaktert tartalmaznak (ehhez használható az <code>isspace()</code> függvény),
   <li>egy tetszőleges, paraméterként adott karaktert tartalmaznak.
</ul>

<p>Hol lehet ehhez többszörös indirekciót alkalmazni? Miért?</p>




<h3>Törlés a fából</h3>

<p>A tananyagban nem szerepel a bináris fából törlés, de nem nehéz megcsinálni.</p>
<ul>
    <li>Ha a törlendő elem levél, simán törölhető.
<pre class="sorsurit1">
            5                       5
           / \                     / \
          3   8                   3   8
         /   / \                 /   / \
        2   6   9               2   6   9
       /     \   \             /         \
      1       <span class="athuzott piros">7</span>   10          1           10
</pre>

    <li>Ha egy gyereke van, akkor is. Természetesen ilyenkor helyettesíteni kell a töröltet a gyerekével:
<pre class="sorsurit1">
            5                       5
           / \                     / \
          3   8                   3   8
         /   / \                 /   / \
        2   <span class="athuzott piros">6</span>   9               2   7   9
       /     \   \             /         \
      1       7   10          1           10
</pre>

    <li>Nehézség csak akkor adódik, ha a törlendő elemnek két gyereke van, mivel ilyenkor
    az egyetlen törölt elem helyét nem foglalhatja el a két gyereke:
<pre class="sorsurit1">
            5
           / \
          3   <span class="athuzott piros">8</span>
         /   / \
        2   6   9
       /     \   \
      1       7   10
</pre>
        Ilyenkor a törlendő elem <em>tartalmát</em> helyettesíteni kell akár az in-order bejárás szerint
        utána következő, akár az in-order bejárás szerint őt megelőző elemmel (mindegy, hogy melyikkel, lent
        mind a kettő ki van emelve).
        Utána pedig a helyettesítő elem könnyedén törölhető, mivel bizonyítható, hogy annak nulla vagy
        egy gyereke volt csak, tehát a probléma vissza van vezetve az előző két esetek egyikére.
<pre class="sorsurit1">
            5                       5                       5
           / \                     / \                     / \
          3   <span class="athuzott piros">8</span>                   3   7                   3   7
         /   / \                 /   / \                 /   / \
        2   6   <em>9</em>               2   6   9               2   6   9
       /     \   \             /     \   \             /         \
      1       <em>7</em>   10          1       <span class="athuzott piros">7</span>   10          1           10
</pre>
</ul>

<p>Feladatok:</p>
<ul>
    <li>Gondold ki, hogyan lehet megtalálni egy adott elemet követő, vagy adott elemet megelőző elemet!
        Ehhez ne másold ki a fát lineáris adatszerkezetbe (tömbbe vagy listába), az felesleges.
    <li>Magyarázd meg, miért igaz az a kijelentés, hogy az így megtalált elemnek nulla vagy egy
        gyereke van csak!
    <li>A törlésnél figyelni kell arra, hogy a szülő elem valamelyik pointere, vagy esetleg a fa
        gyökere pointer módosul. Ezért a programban a faelemekben szülőre mutató pointert lehet
        érdemes használni, vagy a program kétszeres indirekcióval egyszerűsíthető. Gondold végig,
        hogy a nulla vagy egy gyerekű elem törlése hogyan működik pointerek szintjén! Ezt a problémát
        megoldhatod úgy is, hogy mindig visszatérsz a fa (új) gyökerével.
    <li>Írj programot, amelyben egy függvénnyel tudod egy keresőfa egy adott elemét törölni!
</ul>

<?php GyakDiaElemek::megoldasettol("Részmegoldás: a következő és az előző elem"); ?>
<p>Egy adott elemet megelőző és az azt követő elem könnyen megtalálható iteratív algoritmussal
is. Az őt megelőző elem a nála kisebbek közül a legnagyobb, tehát a bal oldali részfájának
jobb szélső eleme. Az őt követő elem pedig szimmetrikusan a jobb oldali részfájának
bal szélső eleme.</p>
<p>Az így megtalált elemek mindenképp legfeljebb egy gyerekkel rendelkeznek csak: a
bal szélső elem azért, mert nincs bal oldali szomszédja (különben nem ő lenne a
bal szélső), a jobb szélső pedig ugyanígy, csak a másik irányba.</p>
<?php GyakDiaElemek::megoldaseddig(); ?>












<h3>Fák bejárása – háromágú fa</h3>

<p>Definiáljunk adatszerkezetet egész számok háromágú fában való tárolásához! Írjunk függvényt,
amely paraméterként veszi át egy ilyen elemekből álló fa gyökerének címét, valamint egy egész
számot, és megszámolja, hogy hány olyan elem van a fában, amely kisebb a paraméterként kapott
számnál (ez a függvény visszatérési értéke)!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>Egy fában annyit találunk a megadott keresett elemből, ahány olyan van a bal oldali, plusz a
középső, plusz a jobb oldali részfájában; plusz a csomópont saját tartalma alapján 0 vagy 1. Ezt
a C kódban is egy sorba írva látható; a legutolsó sorban a kérdőjel-kettőspontos kifejezés
kiértékelve 1-et vagy 0-t ad eredményül, ha az adott elem kisebb n-nél, illetve nem.</p>

<p>A háromágú fa feldolgozása semmiben nem tér el a bináris fáétól – ezt is rekurzívan kell csinálni.</p>

<?php Highlighter::c(<<<'EOT'
typedef struct TriFa {
    int a;
    struct TriFa *bal, *kozep, *jobb;
} TriFa;

int kisebb(TriFa *p, int n) {
    if (p == NULL)
        return 0;
    return kisebb(p->jobb, n)
           + kisebb(p->kozep, n)
           + kisebb(p->bal, n)
           + (p->a<n?1:0);
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>
