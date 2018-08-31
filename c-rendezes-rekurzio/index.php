
<?php GyakDia::beginslide("Keresések, rendezések"); ?>

<h3>Javított buborékrendezés</h3>

<p>A buborékrendezés egymás melletti elemeket cserél sorban. Egy sor csere hatására
a legnagyobb elem a tömb végére vándorol; a következő körben azt
már nem kell vizsgálni, hanem a tömb eggyel rövidebb részletét
csak. Ezt kell folytatni addig, amíg el nem fogy a tömb.</p>


<p>A buborékrendezés hatékonysága javítható azzal, ha megjegyezzük, hogy a
vizsgált tömbrészletnél volt-e csere. Ha nem volt, akkor minden pár jó
sorrendben van. Akkor a rövidebb részt vizsgálva is ugyanerre az eredményre
jutnánk, vagyis a külső ciklust már nem kell folytatni. Implementáld ezt a változatot!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
void buborek(double *t, int db) {
    /* egyre rövidebb tömbrészletek ciklusa */
    for (int i = db - 1; i > 0; --i) {
        bool voltcsere = false;
        /* egymás utáni párok ciklusa */
        for (int j = 0; j < i; ++j) {
            if (t[j + 1] < t[j]) {   /*  összehasonlítás */
                double temp = t[j];
                t[j] = t[j + 1];      /*  csere */
                t[j + 1] = temp;
                voltcsere = true;
            }
        }
        if (!voltcsere)
            break;
    }
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Lineáris és bináris keresés</h3>

<p>Töltsünk fel egy nagy tömböt véletlenszámokkal. Rendezzük a tömböt. Válasszunk egy elemet a
tömb értékkészletéből, és keressük meg, hogy a rendezett tömb mely tartományában szerepel
(hányadiktól hányadik indexig). Tegyük ezt a keresést a lehető leggyorsabban!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A rendezett tömbön végezhetünk bináris keresést. A bináris keresés egy indexszel fog
visszatérni, amelyik az adott szám EGY találatára fog mutatni. Ettől balra is, és jobbra is
lehetnek még elemek, például a tömb részlete lehet:
<code>1&nbsp;2&nbsp;2&nbsp;3&nbsp;3&nbsp;[3]&nbsp;3&nbsp;4&nbsp;4&nbsp;5&nbsp;6</code>, ahol a
jelölt elem a bináris keresés által megtalált. A bináris keresés után a tartomány két szélét
lineárisan kell megkeresnünk.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <assert.h>

void rendez(int *tomb, int meret) {
    /* a j. helyre fogunk keresni elemet. */
    /* j 0-tol meret-2-ig megy; j=meret-1 esetben
       mar csak a legutolso elem lenne, az meg addigra
       a helyen van (nincs mivel cserelni.) */
    for (int j = 0; j < meret - 1; j++) {
        /* keressuk a minimumot; meret-1-ig, mert
           ott is lehet. */
        int minindex = j;
        for (int i = j + 1; i < meret; i++)
            if (tomb[i] < tomb[minindex])
                minindex = i;
        int temp = tomb[j];
        tomb[j] = tomb[minindex];
        tomb[minindex] = temp;
    }
}

// A feladat megoldasa, 1. resz.
/* binarisan keres egy tombben egy erteket.
   ha megtalalja, visszater az indexszel (0..meret-1),
   ha nem, -1-gyel. */
int binkeres(int *tomb, int meret, int mit) {
    int min, max, kozep;

    min = 0;
    max = meret - 1;
    kozep = (min + max) / 2; /* egesz osztas! milyen jo, hogy van. */
    while (min < max && tomb[kozep] != mit) {
        /* ha kisebb, mint a kozepso, a tartomany felso hatarat  */
        if (mit < tomb[kozep])
            max = kozep - 1;
        else
            /* ha nagyobb, akkor az alsot. */
            min = kozep + 1;
        kozep = (min + max) / 2;
    }
    /* azert jottunk ki, mert megtalaltuk? amugy magikus -1 */
    if (tomb[kozep] == mit)
        return kozep;
    else
        return -1;
}

// A feladat megoldasa, 2. resz.
void szelesit(int *tomb, int meret, int mit, int belul,
              int *pmin, int *pmax) {
    assert(tomb[belul] == mit); /* enelkul nem megy */

    /* ez a tartomanyon belul van. */
    /* ha az elotte levo is, akkor csokkentjuk. */
    /* && rovidzar tulajdonsaga miatt nincs tulindexeles! */
    int min = belul;
    while (min > 0 && tomb[min - 1] == mit)
        --min;
    *pmin = min;

    int max = belul;
    while (max < meret - 1 && tomb[max + 1] == mit)
        ++max;
    *pmax = max;
}

void kiir(int *tomb, int meret) {
    for (int i = 0; i < meret; i++)
        printf("%d", tomb[i]);
    printf("\n");
}

int main(void) {
    int tomb[100];
    int mitkeres = 7;
    int egyiktalalat;
    int min, max;

    srand(time(0));

    for (int i = 0; i < 100; i++)
        tomb[i] = rand() % 10;
    kiir(tomb, 100);

    rendez(tomb, 100);
    kiir(tomb, 100);

    egyiktalalat = binkeres(tomb, 100, mitkeres);
    if (egyiktalalat != -1) {
        printf("A keresett %d szam megtalalhato itt: %d.\n",
               mitkeres, egyiktalalat);

        szelesit(tomb, 100, mitkeres, egyiktalalat, &min, &max);
        printf("A keresett %d szam megtalalhato itt: %d-%d.\n",
               mitkeres, min, max);

        /* kiiras, mindket oldalon +1 */
        if (min > 0) min--;
        if (max < 100 - 1) max++;
        printf("A tartomany, +1 mindket oldalon: ");
        for (int i = min; i <= max; i++)
            printf("%d", tomb[i]);
        printf("\n");
    }
    else
        printf("Egyaltalan nincs a keresett elembol.\n");

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>A három legkisebb</h3>

<p>Írjunk programot, amelyik egy tömbből kiírja a három legkisebb
elemet.</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>Ehhez praktikus a közvetlen kiválasztásos rendezést alkalmazni.
A közvetlen kiválasztásos eljárás lényege, hogy megkeresi a legkisebb
elemet, és azt a tömb elejére rakja; utána a fennmaradó tömbrészletre
megcsinálja ugyanezt. Így a második lépésben a tömb második helyére
a második legkisebb eleme kerül, a harmadikban a harmadik legkisebb.</p>

<p>Mivel nekünk csak az első három legkisebb kell, itt le is állíthatjuk
az algoritmust, nem futtatva azt az egészen tömb végéig. Így mindössze
három csere után meg tudjuk adni a választ.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void harom_legkisebb(int *tomb, int meret) {
    for (int i = 0; i < 3; ++i) {      /* csak 3, nem meret */
        int minindex = i;          /* ez a legkisebb... */
        for (int j = i + 1; j < meret; ++j) /* vagy megis van kisebb? */
            if (tomb[j] < tomb[minindex])
                minindex = j;
        /* csere 3 lepesben */
        int temp = tomb[minindex];
        tomb[minindex] = tomb[i];
        tomb[i] = temp;
    }

    /* veletlen elemek */
    printf("Harom legkisebb: ");
    for (int i = 0; i < 3; ++i)
        printf("%d ", tomb[i]);
    printf("\n");
}

int main(void) {
    int tomb[10] = {9, 4, 4, 6, 9, 1, 3, 9, 7, 4};

    harom_legkisebb(tomb, 10);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Medián</h3>
<div class="sticky">Vizsga volt</div>

<p>Írj függvényt, amely átvesz egy double elemekből álló tömböt, és visszaadja a medián elemét!
A medián az az elem, amelynél annyi kisebb van a tömbben, ahány nagyobb. Felteheti, hogy a
tömbben páratlan sok elem van, és nincs két egyforma. Tetszőlegesen használhatsz
segédfüggvényeket, memóriát, de az eredeti tömböt nem változtathatod meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A mediánról a gyorsrendezés (qsort) kapcsán volt szó előadáson, de a definíciója kiderül a
feladat szövegéből is. Ha egy rendezett tömböt nézünk, annak a medián pont a középső eleme;
hiszen a rendezett tömbben pont ugyanannyi van a középsőtől balra (nála kisebbek), mint tőle
jobbra (nála nagyobbak.) Vagyis nincs más dolog, mint rendezni a tömböt, és visszatérni a
középső elemmel. A probléma már csak annyi, hogy az eredeti tömböt nem változtathatjuk meg. Nem
gond, másoljuk le, és rendezzük a másolatot.</p>

<p>A lenti programban a könyvtári <code>qsort()</code> függvényt használjuk. A paraméterei
lenézhetőek a C puskáról (tömb, méret, egy elem mérete, összehasonlító függvény.) Írni kell
hozzá egy összehasonlító függvényt, ez is alap kérdés szokott lenni. A kiírásokat a feladat nem
kérte; csak azért szerepelnek a kódban, hogy látszódjon, mi történik. A <code>qsort()</code>
függvény használata csak egy későbbi előadáson szerepel; a feladat természetesen megoldható
saját rendezőalgoritmussal is.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>

/* kiir egy double tombot. nem kerte a feladat. */
void kiir(double *tomb, int meret) {
    for (int i = 0; i < meret; i++)
        printf("%6.4lf  ", tomb[i]);
    printf("\n");
}

/* qsort()-nak valo osszehasonlito fuggveny. */
int has(void const *pa, void const *pb) {
    if (*(double *)pa < * (double *)pb)
        return -1;
    if (*(double *)pa > *(double *)pb)
        return +1;
    return 0;
}

/* *** ezt a fuggvenyt kerte a feladat! *** */
double median(double const *tomb, int meret) {
    double *masolat = (double *) malloc(sizeof(double) * meret);
    for (int i = 0; i < meret; i++)
        masolat[i] = tomb[i];
    qsort(masolat, meret, sizeof(double), has);

    /* ez a /2 a median, emiatt csinaltuk az egeszet */
    double med = masolat[meret / 2];

    /* csak hogy latszodjon */
    kiir(tomb, meret);          /* nem kell */
    kiir(masolat, meret);       /* nem kell */

    free(masolat);
    return med;
}

int main(void) {
    double t[9];

    /* nem kerte a feladat */
    for (int i = 0; i < 9; i++)
        t[i] = rand() / (double)RAND_MAX;

    printf("Median=%6.4lf\n", median(t, 9));

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Dicsőséglista</h3>
<p>Játékot kell írni, amely egy maximum 20 nevet tároló dicsőséglistát vezet. A
maximum 100 karakteres nevek mindegyikéhez egy egész pontszám tartozik.
Írd meg a következő függvényeket:
<br>
1. függvény: eldönti egy adott pontszámról, hogy felkerül-e a listára. Igaz/hamis értékkel tér vissza.
<br>
2. függvény: kiírja a képernyőre a dicsőséglistát.
<br>
3. függvény: felvesz egy új bejegyzést (név, pontszám) a listára, és visszatér a helyezéssel. (-1, ha nem került fel a listára.) A legkisebb pontszámú bejegyzés ilyenkor törlődik.</p>


<h3>Negatívak indexei</h3>

<p>A <?php GyakMenuInfo::a_href('negativakindexei', "tanórákon szerepelt"); ?> egy olyan
feladat, amelyben egy tömbből ki kellett válogatni a negatív számokat, és az indexeiket egy másik
tömbbe másolni. Az indexek alapján a negatív számok könnyen visszakereshetőek, mert tudni lehet,
milyen sorszámokon szerepelnek az eredeti tömbben negatív számok:</p>

<pre class="screenshot">
Összesen 10 szám van.
[0]=2.5 [1]=-69 [2]=5.4 [3]=-8 [4]=-7.7 [5]=6 [6]=2.9 [7]=-10 [8]=-3 [9]=9.8 

Ebből 5 szám negatív.
[1]=-69 [3]=-8 [4]=-7.7 [7]=-10 [8]=-3 
</pre>

<p>A feladat most látszólag ugyanez, de fordítva: adott egy tömb, néhány negatív számmal, és adott
a másik tömb, amely a negatív elemek indexeit tartalmazza. De nem a negatív számokat kell kilistázni
az indextömböt felhasználva, hanem pont azokat, amelyek nem negatívak.</p>

<p>A megoldáshoz ne az eredeti tömbben keress, hanem használd föl a negatívak ismert indexeit!
Általánosságban: adott egy tömb, valamilyen adatokkal, és adott mellé egy másik tömb, amely az előzőbe
mutató indexeket tartalmaz. Azokat az elemeket kell kilistázni, amelyeket nem hivatkozik meg az indexelő tömb.</p>

<p>Meg lehet ezt a feladatot ϴ(n²) időben oldani? És meg lehet ϴ(n) időben oldani? Ha igen, mi a feltétele?</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A triviális megoldás az alábbi. Ez ϴ(n²) időben fut, mivel minden indexre: ϴ(n) elvégez egy keresést: ϴ(n).</p>

<pre>
for (i = eredeti_tömb indexei)
    if (!benne_van(indexek_tömbje, i))
        print eredeti_tömb[i];
</pre>

<p>Ha tudjuk, hogy az indexek tömbjében a sorszámok növekvő sorrendben vannak, akkor ϴ(n) időben is
megoldható a feladat. Mindig az egymás melletti számokat kell nézni, és a köztük lévő elemeket
listázni. Például ha az indexelő tömbben 4 és 7 szerepel egymás mellett, akkor tudni lehet, hogy az 5-ös
és 6-os elem volt nemnegatív.</p>

<?php GyakDiaElemek::megoldaseddig(); ?>









<?php GyakDia::beginslide("Rekurzió", false, "feladatrekurzio"); ?>

<h3>Fibonacci</h3>
<p>Írj programot, mely kiírja a képernyőre az első n Fibonacci számot. Az n változó értékét a
felhasználó adhassa meg! Írd meg rekurzívan és iteratívan is!</p>

<h3>Fibonacci szám-e</h3>
<p>Készíts programot, mely a felhasználótól bekér egy természetes számot, majd megállapítja
róla, hogy a szám Fibonacci szám-e!</p>

<h3>Aknakereső</h3>
<p>Írd meg azt az algoritmust, amely az aknakeresőben felfedi a pálya aknák nélküli részét!
Egy két dimenziós pályán néhány akna van elszórva. A felhasználó szabadon
léphet bármelyik mezőre. Ha aknára lép, veszít; ha nem, akkor megmutatjuk neki, hogy a
választott mező mellett hány másik mező tartalmaz aknát (0 és 8 között). Ha 0, akkor a szomszédos
mezők egyike sem tartalmaz aknát, vagyis azokra biztonságosan lehet lépni; ha azoknál is
valamelyik mezőre 0 adódik, természetesen még tovább, arra is. Készíts függvényt, amely egy
összefüggő, akna nélküli területet teljesen felderít!</p>

<h3>Tükörszámok</h3>
<p>Írj rekurzív programot, amely kilistázza az <code>n</code> számjegyből álló tükörszámokat!</p>
<p>Többféle elvű megoldás is lehetséges. Az egyik érdekes változat az, amikor a sok egymásba
ágyazott for ciklust helyettesíti a rekurzió.</p>

<h3>Emeletes ház (Dinesman feladata)</h3>
<p>Ez a feladat már szerepelt egyszer:</p>
<p class="bentebb">Baker, Cooper, Fletcher, Miller és Smith egy ötemeletes ház különböző
emeletein laknak. Baker nem a legfölső emeleten lakik, Cooper pedig nem az alsó
szinten. Fletcher lakhelye sem a legalsó szinten van, de nem is a legfölsőn.
Miller magasabban lakik, mint Cooper. Smith nem Fletcherrel szomszédos emeleten
lakik, ahogy Cooper és Fletcher sem emelet-szomszédok. A kérdés: melyik
emelet kié?</p>
<p>Akkor az a tipp szerepelt mellette, hogy az összes lehetőség közül (11111,
11112, 11113 stb.) első körben azokat kell kiszűrni, ahol az öt változó közül van
két egyforma.</p>
<p>Oldd meg most másképp a feladatot! Tedd be egy tömbbe az öt különböző számot,
amely tömb egyes elemei rendre Baker, Cooper, Fletcher, Miller és Smith emeleteinek
számát mutatják. Írj függvényt, amely permutálja a tömböt, és írj olyan függvényt
is, amely ellenőrzi a megkötéseket! Írj ezek használatával egy programot, amely
megoldja a feladatot!</p>



<h3>Bemenet megfordítása</h3>
<p>Írj rekurziót használó programot, amely beolvassa a szabványos bemenetén érkező
karaktersorozatot, és visszafelé írja ki azt! A program ne használjon tömböket!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A trükk egy olyan rekurzív függvényt írni, amelynek első dolga a karakter beolvasása,
utolsó dolga pedig a beolvasott karakter kiírása. A kettő között pedig a függvénynek
meg kell hívnia saját magát, hogy beolvassa a második karaktert (és kiírja majd az első
előtt) stb. Így a sok karakter beolvasásához ciklus sem kell, mert azt a rekurzió helyettesíti.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void csinal(void) {
    int c = getchar();
    if (c != EOF) {
        csinal();
        putchar(c);
    }
}

int main(void) {
    csinal();
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Zárójelek párjai</h3>
<p>Írj rekurzív programot, amelyik egy nyitó zárójellel kezdődő sztringben megtalálja a zárójel
bezáró párját. (A zárójelek (egymásba () lehetnek)) ágyazva.</p>
<p>Írd meg ugyanezt iteratívan is!</p>

<?php GyakDiaElemek::megoldasettol() ?>
<p>
<em>Rekurzív megoldás.</em> Írjunk először egy függvényt, amelyik egy sztringet kap paraméterként, és egy
kezdő pozíciót. Térjen vissza a függvény azzal az indexszel, ahol először bezáró
zárójelet talál. Ez könnyű, egyszerűen csak egy ciklust kell futtatnunk addig,
amíg meg nem lesz a keresett karakter:
</p>
<pre>
FÜGGVÉNY bezárót_keres(sztring, pozíció)
    AMÍG sztring[pozíció] != ')'
        pozíció=pozíció+1
    CIKLUS VÉGE

    VISSZA: pozíció
FÜGGVÉNY VÉGE
</pre>
<p>
De ez még nem tudja a zárójelek egymásba ágyazását.
Mit kell tenni, ha a bezárójel keresése közben egy nyitó zárójelet találunk? Akkor
a következő bezárójel még nem az lesz, amit keresünk, hanem a mostani nyitónak a párja.
Ez a belső zárójelpár közrefog egy sztringrészletet, amit át kéne ugranunk a keresés
közben:
</p>
<pre>
eredeti nyitó az elején          ezt a bezárót keressük
↓                                ↓
(A zárójelek <span style="text-decoration: line-through;">(egymásba lehetnek)</span> ) ágyazva.
             ↑                 ↑
             ezt a részt ki kell hagyni, mintha ott sem lenne
</pre>
<p>
Hogy találjuk meg, hogy hol van ennek a nyitó zárójelnek a párja?
Nagyon egyszerűen, hiszen már az előbb megírtuk azt a függvényt, ami
ezt tudja! Ott van fent a
pszeudokódja. Azt kiegészítve kapjuk a lenti függvényt. Az első utasítás
a pozíció növelése; azzal az első nyitó zárójelet egyből átugorja.
</p>
<pre>
FÜGGVÉNY bezárót_keres(sztring, pozíció)
    pozíció=pozíció+1
    CIKLUS AMÍG sztring[pozíció] != ')'
        FELTÉTEL HA sztring[pozíció] == '('
            pozíció = bezárót_keres(sztring, pozíció)
        FELTÉTEL VÉGE

        pozíció=pozíció+1
    CIKLUS VÉGE

    VISSZA: pozíció
FÜGGVÉNY VÉGE
</pre>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

/* Kap egy sztringet, es azon belul egy poziciot; ott egy nyito
   zarojelnek kell lennie. Annak a nyito zarojelnek megkeresi
   a bezaro parjat, es annak az indexet (poziciojat) adja vissza. */
int bezarot_keres(char *sztring, int pozicio) {
    /* elso nyitot egybol atugorjuk */
    pozicio++;
    /* es keressuk a bezaro parjat */
    while (sztring[pozicio] != ')') {
        /* ha kozben nyitot talalunk, akkor azt a reszt,
           az azutan kovetkezo bezaroig, atugorjuk */
        if (sztring[pozicio] == '(')
            pozicio = bezarot_keres(sztring, pozicio);

        pozicio++;
    }

    return pozicio;
}

int main(void) {
    char szoveg[] = "(Ez egy (zarojeles) () sztring), aminek itt van vege a pontnal.";
    int pozicio = bezarot_keres(szoveg, 0);

    /* kiirjuk a keresett bezarotol kezdve */
    printf("%s\n", szoveg + pozicio);

    return 0;
}
EOT
); ?>
<p>
<em>Iteratív megoldás.</em> Minden rekurzív problémának létezik iteratív megoldása. Ennek például nagyon
egyszerű. Ha a keresés közben találunk egy nyitó zárójelet, akkor eggyel
több bezáró zárójelig kell futtatni a keresést:
</p>
<pre>
A (zárójelek (egymásba () lehetnek) ) ágyazva.
0011111111111222222222233222222222211000000000
</pre>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

/* Az elozo problema iterativ megoldasat adja ez a fuggveny. */
int bezarot_keres(char *sztring, int pozicio) {
    /* most elvileg egy nyito zarojelen allunk;
     * vagyis egy bezaro zarojelet keresunk. */
    int hany_kell = 1;

    while (hany_kell > 0) {
        /* nezzuk a kovetkezo karaktert */
        pozicio++;
        if (sztring[pozicio]=='(')
            hany_kell++;
        if (sztring[pozicio]==')')
            hany_kell--;
    }

    return pozicio;
}

int main(void) {
    char szoveg[]="(Ez egy (zarojeles) () sztring), aminek itt van vege a pontnal.";
    int pozicio=bezarot_keres(szoveg, 0);

    /* kiirjuk a keresett bezarotol kezdve */
    printf("%s\n", szoveg+pozicio);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Rendezés közvetlen kiválasztással</h3>

<p>Egy tömb rendezve: a legelejére rakjuk a legkisebb elemet, utána rendezzük a tömb fennmaradó
részét. Minden iteráció átírható rekurzióvá: írjuk meg a közvetlen kiválasztásos rendezőt
rekurzívan!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void kozvetlen(double *t, int db) {
    /* ha a tömbben nincs két elem, akkor csak rendezett lehet */
    if (db < 2)
        return;

    int minindex = 0;          /* minimum keresése */
    for (int j = 1; j < db; ++j)
        if (t[j] < t[minindex])
            minindex = j;
    if (minindex != 0) {         /* csere? */
        double temp = t[minindex];
        t[minindex] = t[0];    /* csere. */
        t[0] = temp;
    }

    /* a tömb fennmaradó részének rendezése */
    kozvetlen(t + 1, db - 1);
}


int main(void) {
    double tomb[] = {6, 9, 3, 7, 8, 5, 5.76};

    kozvetlen(tomb, 7);
    for (int i = 0; i < 7; ++i)
        printf("%g ", tomb[i]);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>







<h3>Három számjegyenkénti felosztás</h3>

<p>Írj függvényt, amely a paraméterként kapott pozitív egész számot három számjegyenként
csoportosított formában írja ki. Pl.: 16&nbsp;077&nbsp;216. Próbáld ki más számokra is: 999,
1000, 12, 0, 1000222!</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Használj rekurziót! Ez olyan, mintha ezres számrendszerben írnál ki.</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void kiir(int n) {
    /* Ha több mint 3 számjegyű */
    if (n / 1000 > 0) {
        /* Levágunk 3 számjegyet (osztás 1000-el), és erre hívjuk a függvényt */
        kiir(n / 1000);
        /* Kiírjuk a levágott 3 számjegyet vezető 0-kkal */
        printf(" %03d", n % 1000);
    }
    else
        printf("%d", n);      /* Különben simán kiírjuk a számot */
}

int main(void) {
    kiir(16077216);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>







<h3>Gyors hatványozás</h3>

<p>A hatványozás elvégezhető annál gyorsabban is, mintha a kitevőnek megfelelő számú szorzást csinálnánk. Pl. <code>a<sup>8</sup>=a<sup>4</sup>·a<sup>4</sup></code>, <code>a<sup>4</sup>=a<sup>2</sup>·a<sup>2</sup></code> és
<code>a<sup>2</sup>=a·a</code> miatt a nyolcadikra hatványozáshoz mindössze három szorzásra van szükség.
A következő megfigyelést tehetjük:</p>

<ul>
<li><code>a<sup>k</sup>=(a<sup>2</sup>)<sup>k/2</sup></code>, ha <code>k</code> páros, és
<li><code>a<sup>k</sup>=a·a<sup>k-1</sup></code>, ha <code>k</code> páratlan.
</ul>

<p>Írj rekurzív függvényt, amely a fentiek alapján végzi el a hatványozást! Paraméterei legyenek
az alap és a kitevő, visszatérési értéke pedig a hatvány. Írd ki kettő első tizenhat
hatványát!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

double hatvany(double alap, unsigned kitevo) {
    /* barminek a 0. hatvanya 1 */
    if (kitevo == 0)
        return 1;

    if (kitevo % 2 == 0)
        /* ha paros, akkor alap negyzetre, kitevo felezve */
        return hatvany(alap * alap, kitevo / 2);
    else
        /* amugy alap * alap a k-1-ediken */
        return alap * hatvany(alap, kitevo - 1);
}

int main(void) {
    for (int i = 0; i < 16; ++i)
        printf("%d %g\n", i, hatvany(2, i));

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Hanoi tornyai – lépés sorszáma</h3>

<p>A <?php GyakMenuInfo::a_href("eahanoi", "rekurziós előadáson"); ?> volt szó a Hanoi tornyai
feladatról. Ott szerepel egy megoldás, amely kiírja, mikor melyik korongot kell áthelyezni.
Módosítsd azt a programot úgy, hogy beszámozza a lépéseket! (Ha esetleg globális változóra
gondolnál, meg lehet oldani anélkül is!)</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Ehhez az kell, hogy akármilyen mélyre megyünk a rekurzióban, mindig ugyanazt a számlálót lássuk;
hogy minden lépés kiírásánál ugyanazt a számlálót tudjuk megnövelni. Ezért a számlálót a rekurzív
hívásokon <em>kívül,</em> még azok előtt létrehozzuk, és a <code>hanoi()</code> függvény pedig
pointert kap rá. Akárhányadik hívásról is van szó, a pointer segítségével ugyanazt a változót
fogja elérni.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void hanoi(int *plepes, int n, char honnan, char seged, char hova) {
   if (n == 0)
      return;
   hanoi(plepes, n-1, honnan, hova, seged);
   printf("%d. lepes: rakj 1-et: %c->%c\n", ++*plepes, honnan, hova);
   hanoi(plepes, n-1, seged, honnan, hova);
}

int main(void) {
   int lepes = 0;
   hanoi(&lepes, 4, 'A', 'B', 'C');

   return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Hanoi tornyai – grafikusan</h3>

<p>Írd át úgy a Hanoi tornyai programot, hogy valamilyen grafikus könyvtár segítségével
(pl. SDL) ki is rajzolja a cseréket!</p>


<h3>Járda kövezése</h3>

<p>Hányféleppen lehet egy adott hosszúságú járdát kikövezni 1 és 2 méter hosszúságú járdalapokkal?
Például ha 3 méteres a járda, a lehetőségek: 1+1+1, 1+2, 2+1, tehát összesen 3.
Listázzuk ki az összes megoldási lehetőséget!
(A feladat <?php GyakMenuInfo::a_href('jardakovezese', "egyszerűbb változata"); ?>: csak a megoldások
darabszámát kell kiírni.)</p>


<h3>Pénzváltás</h3>

<p>Adott egy zsák 5, 10, 20 és 50 forintos érménk. Hányféleképpen
lehet ezekkel kifizetni 100 forintot? Listázzuk ki az összes
megoldási lehetőséget!
(A feladat <?php GyakMenuInfo::a_href('penzvaltas', "egyszerűbb változata"); ?>: a megoldások
darabszámát kell kiírni.)</p>

<?php GyakDiaElemek::megoldasettol() ?>

<p>Ehhez azt kell észrevennünk, hogy a <code>mennyit==0</code> báziskritérium
jelenti azt, hogy megtaláltunk egy megoldást. Mire oda eljutunk a rekurzióban,
már valamilyen érmekombinációval megoldottuk a feladatot. Ha útközben
feljegyezzük az érmék számát egy segédtömbben, akkor ezen a ponton kiírva a tömb
tartalmát, meg tudjuk adni a megoldásokat. (A második, harmadik báziskritérium
olyan próbálkozást jelent, ami nem vezetett megoldásra.) A <code>darab[]</code>
segédtömbben egy adott indexű elem azt tárolja, hogy az ugyanannyiadik
indexű <code>fajtak[]</code> érméből mennyit adunk.</p>

<p>Kérdés még, hogy hol változik a tömb tartalma. A
<code>mennyit-fajtak[hanyadiktol]</code> paraméterű rekurzív hívásnál
próbálkozunk egy érme kiadásával. Ezért a rekurzív hívás <em>előtt</em> a
megfelelő darabszámot megnöveljük eggyel (hogy a hívásban a darabszám tömb már
megfelelő tartalmú legyen, és azt írjuk ki), és a hívás <em>után</em> pedig
csökkentjük.</p>

<?php Highlighter::c_buborek(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>

void penzvalto(int mennyit, int *fajtak, int hanyadiktol, int *darab) {
    if (mennyit == 0) {
        for (int i = 0; fajtak[i] != -1; ++i)
            if (darab[i] != 0)
                printf("%dx(%d Ft), ", darab[i], fajtak[i]);
        printf("\n");
        return;
    }

    if (mennyit < 0 || fajtak[hanyadiktol] == -1)
        return;

    darab[hanyadiktol]++;
    penzvalto(mennyit-fajtak[hanyadiktol], fajtak, hanyadiktol, darab);
    darab[hanyadiktol]--;
    penzvalto(mennyit, fajtak, hanyadiktol+1, darab);
}

int main(void) {
    int fajtak[] = {5, 10, 20, 50, -1};
    int darab[] = {0, 0, 0, 0};

    penzvalto(100, fajtak, 0, darab);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig() ?>




<h3>Faktoriális – a kiértékelés megjelenítése</h3>

<p>A rekurzív faktoriális függvény (n*(n-1)!) kiértékelését egy ilyen rajzzal lehet szemléltetni:</p>

<pre class="screenshot">
fakt(3)
  fakt(2)
    fakt(1)
      fakt(0)
      1
    1*1
    1
  2*1
  2
3*2
6
</pre>

<p>Módosítsd úgy a rekurzív faktoriális függvényt (maradjon is rekurzív), hogy egy ehhez hasonló rajzot készítsen a program kimenetén!</p>
