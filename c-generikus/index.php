

<?php GyakDia::beginslide("Függvénypointerek", false, "feladatfvpointer"); ?>


<h3>Függvénypointerek tömbje</h3>
<div class="sticky">Vizsgán volt</div>
<p>Definiálj olyan 3 elemű tömböt, amely olyan mutatókat tartalmaz, melyek a fenti feladat 
függvényére mutathatnak! </p>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
/* így néz ki a függvény, amiről szó van */
int fv(int *t, int meret);

/* így néz ki egy, a fenti típusú függvényre mutató pointer */
/* a neve lesz a pointer neve; elé csillag, és zárójelbe. */
int (*pfv)(int *t, int meret);

/* ha ezekből kell egy 3 elemű tömb, akkor nem egy pfv pointer
   van, hanem egy három elemű tpfv tömb. a paraméterek nevei
   természetesen itt is, és eggyel feljebb is elhagyhatóak,
   vagyis mindkét lenti sor egyformán jó. */

int (*tpfv[3])(int *t, int meret);          /* <- ez a megoldás */
int (*tpfv[3])(int *, int);                 /* <- vagy ez is jó */
EOT
); ?>

<p>Ugyanúgy kell mindent deklarálni, ahogy használni fogjuk! <code>tpfv</code> az egy tömb, amit 
ha megindexelünk <code>[3]</code>, akkor kapunk egy pointert <code>*</code>, ami egy <code>(int 
*, int)</code> paraméterű függvényre mutat, amit meghívva egy <code>int</code> a visszatérési 
értéke.</p>

<p>A <code>(*pfv)</code> köré azért kell a zárójel, mert nélküle <code>int *</code> pointerrel 
visszatérő függvény lenne, nem pedig pedig függvényre mutató pointer:</p>

<?php Highlighter::c(<<<'EOT'
int *fv(int*, int);         /* int* függvény */
int (*pfv)(int*, int);      /* int függvényre mutató ptr */
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>foreach()</h3>
<p>Írj függvényt, amely átvesz egy <code>int</code> típusú elemekből álló tömböt, annak méretét, 
valamint egy olyan függvényt, amely egy <code>int</code> paramétert vár és visszatérési értéke 
<code>void</code>. A megírandó függvény járja végig a tömböt és minden elemére hívja meg a 
paraméterként átvett függvényt!</p>


<h3><code>qsort()</code> valós számok tömbjére</h3>
<p>A <code>qsort()</code> könyvtári függvény generikus, segítségével bármilyen típusú adatok 
rendezhetőek. A rendezéshez az adott, általunk használt adattípushoz 
készítenünk kell egy összehasonlító függvényt. Készíts egy olyan függvényt, amelyik 
<code>int</code> típusú számok összehasonlításához használható a <code>qsort()</code>-hoz. 
Mutass példát, hogyan kell használni a függvényt!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
int integer_osszehasonlito(const void *pelso, const void *pmasodik) {
    const int *elso = (const int *)pelso;
    const int *masodik = (const int *)pmasodik;

    if (*elso < *masodik)
        return -1;
    if (*elso > *masodik)
        return 1;
    return 0;
}


int intek[5];

/* veletlen elemek */
srand(time(0));
for (int i = 0; i < 5; i++)
    intek[i] = rand()%100;

/* rendezes es kiiras */
/* itt az int-et batran sizeofolhatom */
qsort(intek, 5, sizeof(intek[0]), integer_osszehasonlito);
for (int i = 0; i < 5; i++)
    printf("%d ", intek[i]);
printf("\n");
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3><code>qsort()</code> pontok tömbjére</h3>
<p>Adott a következő, pontok koordinátáit tároló rekord:
<?php Highlighter::c(<<<'EOT'
struct pont {
    double x;
    double y;
};
EOT
); ?>
<p>Egy ilyenekből álló tömböt szeretnénk rendezni úgy, hogy az origótól lévő távolságuk szerint 
növekvő sorrendben legyenek. A rendezéshez a <code>qsort()</code> könyvtári függvényt használjuk. 
Írd meg az ennek negyedik paraméterében használható összehasonlító függvényt.</p>



<h3>Sztringek visszafelé</h3>
<p>Írj összehasonlító függvényt a <code>qsort()</code> számára, amellyel sztringek visszafelé 
(csökkenő) sorrendbe rendezhetőek! Mi erre a legegyszerűbb megoldás?</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A <code>strcmp()</code> visszatérési értéke pozitív vagy negatív,
nagyobb vagy kisebb sztring esetén. Ezt negálva megfordul a sorrend:</p>
<?php Highlighter::c(<<<'EOT'
int strcmp_neg(void const *pa, void const *pb) {
    return -1 * strcmp((char const *) pa, (char const *) pb);
}
EOT
); ?>
<p>Még rövidebb megoldáshoz jutunk, ha fordítva adjuk neki a paramétereket,
hiszen ha <code>a&lt;b</code>, akkor <code>b&gt;a</code>:</p>
<?php Highlighter::c(<<<'EOT'
int strcmp_neg(void const *pa, void const *pb) {
    return strcmp((char const *) pb, (char const *) pa);
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Numerikus integrálás</h3>
<p>Tekintsünk egy valós, egyváltozós függvényt, például:
<?php Highlighter::c(<<<'EOT'
double fv(double x) {
    return x*x + 2*x + 5;
}
EOT
); ?>

<p>Írj C függvényt, amelyik trapéz-módszerrel numerikus integrálást végez. Visszatérési értéke 
legyen az integrál értéke; paraméterei az integrálandó függvény, az intervallum és a lépésköz.</p>


<h3>Egyenlet megoldása</h3>
<p>Készíts függvényt, ami egy folytonos függvény nullahelyét megkeresi egy adott intervallumban, 
intervallumfelezéssel. A függvény paraméterként kapja az intervallumot, amelyben keres, és a 
függvény pointerét. Építsen be egy hibahatárt, amelyen belül a nullahelyet megtaláltnak tekinti. 
A függvény a nullahely valós értékével térjen vissza.</p>


<h3>Generikus lista és fa</h3>

<p>A láncolt lista és a bináris fa példák olyan adatszerkezetekre, amelyekre minden programnak 
szüksége lehet. Ezek kezelésének módja (például listaelem beszúrása) független attól, hogy 
milyen adatokat tartalmaznak.</p>

<p>Deklarálj olyan listát, amely típus nélküli mutató segítségével tetszőleges adatot képes 
tárolni! Írj függvényeket, amelyek a lista elejére, végre fűznek egy elemet, illetve egy 
megadott elemet törölnek a listából!</p>

<p>Végezd el ugyanezt bináris fára is! A beszúráskor végzendő összehasonlításhoz vegyél át egy 
függvényt, amely összehasonlítja a két beszúrandó adatot, és amelynek a visszatérési értéke 
hasonlít az <code>strcmp()</code>-éhez!</p>

<h3><code>double</code>-öket rendező függvény</h3>

<p>Írjunk függvényt, amely paraméterként kap egy <code>double</code> elemekből álló tömböt, és 
rendezi azt! A rendezés szempontja (növekvő, csökkenő, abszolútérték szerint növekvő stb.) is 
legyen a függvény paramétere!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <math.h>

/* rendezi a tombot a megadott szempont szerint */
void double_rendez(double tomb[], int meret, bool (*kisebb_e)(double a, double b)) {
    for (int i = 0; i < meret - 1; ++i) {
        int lk = i;
        for (int j = i + 1; j < meret; ++j)
            if (kisebb_e(tomb[j], tomb[lk]))
                lk = j;

        double temp = tomb[lk];
        tomb[lk] = tomb[i];
        tomb[i] = temp;
    }
}

/* igaz, ha a<b */
bool kisebb(double a, double b) {
    return a < b;
}

/* igaz, ha |a|<|b| */
bool abszolut_kisebb(double a, double b) {
    return fabs(a) < fabs(b);
}

int main(void) {
    double tomb[10] = {1.2, 5.6, 9, -1.4, -6, 5, 9.1, 11, 0, -12};

    double_rendez(tomb, 10, kisebb);
    for (int i = 0; i < 10; ++i)
        printf("%7.2f", tomb[i]);
    printf("\n");

    double_rendez(tomb, 10, abszolut_kisebb);
    for (int i = 0; i < 10; ++i)
        printf("%7.2f", tomb[i]);
    printf("\n");

    return 0;
}
EOT
); ?>

<p>A fenti függvények nem követik az <code>strcmp()</code> konvenciót: az összehasonlító 
függvények nem kompatibilisek azzal. Azonban nincs is erre szükség itt még, hiszen a rendezendő 
adatok típusa adott.</p>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Saját generikus rendező függvény</h3>

<p>Alakítsuk át az előbbi rendezőfüggvényünket úgy (bármelyik algoritmust is választottuk), hogy 
ne <code>double</code>, hanem tetszőleges elemekkel dolgozzon!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>Ehhez a függvénynek <code>void*</code> pointerrel kell átvennie a tömböt (mivel a típusait 
nem ismeri), és ugyancsak paraméter kell legyen az egyes elemek mérete is. Az elemek cseréje nem 
végezhető el értékadással, de segítségül hívhatjuk a <code>memcpy</code> függvényt, amely adott 
méretű memóriaterületet másol. Az „ideiglenes változó” helyébe – amely a háromlépéses cseréhez 
kell – is egy külön, típus nélküli memóriaterület lép. Mivel ennek mérete függvényparaméter, 
dinamikusan foglaljuk. A hasonlító függvény is <code>void*</code>-okat kell várjon, nem pedig 
<code>double</code>-öket. </p>

<?php Highlighter::c(<<<'EOT'
void rendez(void *tomb,
            int meret, size_t elemmeret,
            bool (*kisebb_e)(void const *pa, void const *pb)) {
    void *temp;

    temp = malloc(elemmeret);

    for (int i = 0; i < meret - 1; ++i) {
        void *pi = (char*)tomb + i * elemmeret;
        void *plk = pi;

        for (int j = i + 1; j < meret; ++j) {
            void *pj = (char*) tomb + j * elemmeret;
            if (kisebb_e(pj, plk))
                plk = pj;
        }

        if (plk != pi) {
            memcpy(temp, plk, elemmeret); /* temp=lk */
            memcpy(plk, pi, elemmeret);   /* lk=i */
            memcpy(pi, temp, elemmeret);  /* i=temp */
        }
    }

    free(temp);
}
EOT
); ?>

<p>A teljes program letölthető innen: <a href="genrend.c">genrend.c</a>.</p>

<?php GyakDiaElemek::megoldaseddig(); ?>
