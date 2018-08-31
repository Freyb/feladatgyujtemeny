
<?php GyakDia::beginslide("Tömbök és függvények", false, "feladattombptr"); ?>

<h3>Tömb eleme</h3>
<div class="sticky">Vizsgán volt</div>
<p> Írj függvényt, amely átvesz egy <code>double</code> tömböt, és visszatér a 4-es indexű elemével,
ha az létezik, különben 0-val! </p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A C-ben, ha egy tömböt átadunk paraméterként, akkor csak az első
elemének (nullás indexű elemének) a címe adódik át a függvénynek.
Ebből az is következik, hogy a függvény nem tudja, mekkora az a
tömb, vagyis azt is át kell adni, külön paraméterként. A függvény
paramétereinek típusa ezért <code>double*</code>, a tömb elejére mutató
pointer, és még egy <code>int</code>, amelyik pedig a tömb mérete.
Hogy létezik-e a tömb 4-es indexű eleme, azt pedig ebből a méret
változóból tudjuk.</p>

<?php Highlighter::c(<<<'EOT'
double fv(double *t, int meret) {
    if (meret > 4)
        return t[4];
    else
        return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Tömb összege</h3>
<p>Készíts függvényt, mely egy valós számokból álló tömb elemeit összegzi!</p>

<h3>Tömb három legkisebb eleme</h3>
<p>Készíts függvényt, amely egy tömb 3 legkisebb elemét határozza meg!</p>

<h3>Alig változik</h3>
<p>Készíts függvényt, mely a paraméterben kapott egész tömbről megvizsgálja, hogy elemeinek értéke
szomszédos elemek E sugaron belül helyezkednek el (különbségük nem nagyobb, mint E vagy -E)
A függvény bemenő paramétere a tömbre mutató pointer, a tömb elemeinek száma, valamint az E értéke.
Visszatérési értéke logikai típusú legyen, amely azt mutatja, teljesült-e a feltétel!</p>

<h3>Legalább kettő</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely paraméterként vesz át egy egészekből álló tömböt, és visszaadja az
első olyan tömbelem címét, amelyből legalább kettő található a tömbben! Ha nincs
ilyen tömbelem, adjon vissza NULL pointert!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
int *dupla(int *tomb, int n) {
    for (int i = 0; i < n - 1; i++)
        for (int j = i + 1; j < n; j++)
            if (tomb[i] == tomb[j])
                return tomb + i;
    return NULL;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Rendezett-e</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely paraméterként vesz át egy valós értékekből álló tömböt, melyről
biztosan tudjuk, hogy elemei különbözőek! A függvény ellenőrizze, hogy a tömb rendezett-e (akár
növekvő, akár csökkenő sorrendben; a feltételezett rendezettség iránya az első két tömbelem
vizsgálatával eldönthető). Ha a tömb nem rendezett, a függvény adja vissza az első olyan
tömbelem címét, amelyik elrontja a rendezettséget! Ha a tömb rendezett, adjon vissza NULL
pointert! Pl. be: {-8.11, -5.3, 0.1, 2.5, 1.4, 6.9, 12.0, 5.7}, a visszaadott érték az 1.4-et
tartalmazó tömbelem címe. Pl. be: {7, 1, 2, 3, 4, 5}, a visszaadott érték a 2-t tartalmazó
tömbelem címe.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
double *rendezette(double *tomb, int n) {
    if (n < 2) return NULL;
    bool novekvo = tomb[0] < tomb[1];
    for (int i = 2; i < n; i++) {
        if (novekvo && tomb[i - 1] > tomb[i])
            return tomb + i;
        else if (!novekvo && tomb[i - 1] < tomb[i])
            return tomb + i;
    }
    return NULL;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Legnagyobb</h3>

<p>Készíts függvényt, amely paraméterként vesz át egy egész számokból álló tömböt, és visszaadja 
a tömb <em>legnagyobb elemének indexét!</em> Egészítsd ki teljes programmá, amely kiírja a 
legnagyobb tömbelemet! (A kiírást <em>ne</em> a maximumkereső függvény végezze!)</p>

<p>Alakítsd át a programot úgy, hogy ne a legnagyobb elem indexét, hanem annak memóriacímét adja 
vissza a függvény!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int max(int *t, int elemszam) {
    int maxidx = 0;      /* Feltételezzük, hogy van legalább egy eleme */
    for (int i = 1; i < elemszam; ++i)
        if (t[i] > t[maxidx])
            maxidx = i;  /* Ha találunk nagyobbat, megjegyezzük az indexét */
    return maxidx;       /* Visszaadjuk a maximumot */
}

int* maxcim(int *t, int elemszam) {
    int maxidx = 0;      /* Feltételezzük, hogy van legalább egy eleme */
    for (int i = 1; i < elemszam; ++i)
        if (t[i] > t[maxidx])
            maxidx = i;  /* Ha találunk nagyobbat, megjegyezzük az indexét */
    return &t[maxidx];   /* Visszaadjuk a címét. return t+maxidx is jó. */
}

int main(void) {
    int tomb[5] = {1,5,3,9,8};
    printf("%d\n", tomb[max(tomb, 5)]);
    printf("%d\n", *maxcim(tomb, 5));

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<p>Alakítsd át úgy is a programot, hogy a ciklusok tömbindexek helyett pointerekkel dolgozzanak, 
az előadáson bemutatott módon.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
int max(int *t, int elemszam) {
    int *max = t;
    for (int *p = t+1; p != t+elemszam; ++p)
        if (*p > *max)
            max = p;
    return *max;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Legkisebb és legnagyobb</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely paraméterként vesz át egy egészekből álló tömböt! A függvény adja
vissza címükkel átvett változókban a tömb legkisebb  és  legnagyobb  elemének
indexét!  Ha  több  egyforma  érték  a legkisebb/legnagyobb, akkor ezek közül bármelyik indexét
visszaadhatja.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
void minmax(int *tomb, int n, int *pmin, int *pmax) {
    int min = 0, max = 0;
    for (int i = 1; i < n; i++) {
        if (tomb[i] < tomb[min]) min = i;
        if (tomb[i] > tomb[max]) max = i;
    }
    *pmin = min;
    *pmax = max;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>24×21-es képecskék</h3>

<p>Egy játékhoz, amit írunk, szükség vagy 24×21 fekete/fehér pontból álló kis képecskékre.
Mivel ezekből rengeteg lesz, kitaláljuk, hogy a fekete/fehér jelleg miatt egy bit is tárolhat
egy pontot, így az egy kép által lefoglalt memória (innentől feltételezve a 8 bites char-t)
3×21=63 bájtot foglal csak el a memóriából. Feladat: írni három függvényt, amelyek a
következőeket tudják:</p>
<ul>
    <li>Kirajzolni pontokból és csillagokból egy ilyen képecskét.
    <li>Fehérre állítani egy pontot.
    <li>Feketére állítani egy pontot.
</ul>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

typedef unsigned char kep[63];

// Az elso feladatresz megoldasa: egy kepecske kirajzolasa
void kirajzol(kep k) {
    for (int y = 0; y < 21; y++) {
        for (int x = 0; x < 24; x++) {
            /* annyival shift, utana legalso bit */
            /* (szóköz helyett .-ot használtam most) */
            printf("%c", (k[y * 3 + x / 8] >> (7 - x % 8)) & 1 ? '*' : '.');
        }
        printf("\n");
    }
    printf("---\n");
}

// A masodik feladatresz: adott pontot feherre allit
void feher(kep k, int x, int y) {
    /* keppont aktiv: bitenkenti VAGY */
    k[y * 3 + x / 8] = k[y * 3 + x / 8] | (1 << (7 - x % 8));
}

// A harmadik feladatresz: adott pontot feketere allit
void fekete(kep k, int x, int y) {
    /* keppont ki: bitenkenti ES a negalttal */
    k[y * 3 + x / 8] = k[y * 3 + x / 8] & ~(1 << (7 - x % 8));
}

int main(void) {
    kep k;

    for (int y = 0; y < 21; y++)
        for (int x = 0; x < 24; x++)
            fekete(k, x, y);
    kirajzol(k);
    for (int x = 0; x < 24; x++)
        feher(k, x, 10);
    kirajzol(k);
    for (int y = 0; y < 21; y++)
        feher(k, 5, y);
    kirajzol(k);

    return 0;
}
EOT
); ?>

<p>Megoldható kétdimenziós tömbbel is, <code>kep[3][21]</code>. Az egy bájton belüli képpond
sorrend is tetszőleges; vagy mindenhol <code>7-x%8</code>, vagy mindenhol simán <code>x%8</code>.</p>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Minden második</h3>
<p>Írj függvényt, ami egy tömböt átvesz
paraméterként, és hátulról indulva kiírja minden második elemét!
Ügyelj arra, hogy nehogy túl/alulindexeld a tömböt!</p>


<h3>Súlypont</h3>
<p>Készíts struktúratípust, amely alkalmas egy térbeli pont
koordinátáinak eltárolására (x, y, z koordinálta). Írj függvényt,
amely átvesz egy térbeli pontokból álló tömböt, és visszaadja a
pontok súlypontját (azaz azt a pontot, amelynek a koordiátáit a
bemenő bontok megfelelő koordinátáinak átlagai)! Próbáld ki a
függvényt teljes programmá kiegészítve!</p>




<h3>Hány egyedi elem van?</h3>
<p>Készíts függvényt, mely egy adott tömbben megszámolja, hogy hány olyan
elem van, amely csak egyszer fordul elő! Pl. a { 2, 7, 5, 8, 9, 5, 7, 5, 5, 3 }
tömbre a visszatérési érték legyen 4, mert a { 2, 3, 8, 9 } számok mind
csak egyszer szerepeltek!</p>


<h3>A leggyakoribb elem</h3>
<p>Készíts függvényt, mely meghatározza egy adott (véletlen számokkal
feltöltött) tömbben, hogy melyik értékből található benne a legtöbb! Pl.
ha a tömb elemei { 2, 7, 5, 8, 9, 5, 7, 5, 5, 3 }, akkor a függvényt
visszatérési értéke legyen 5, mivel az a leggyakoribb elem.



<h3>Rendezettség vizsgálata</h3>

<div class="sticky">Kis ZH volt</div>

<p>Írj egy függvényt, amelyik egy double számokból álló tömböt vesz át paraméterként. A
függvény térjen vissza egy felsorolt típussal, amelynek lehetséges értékei: <code>csokkeno</code>
, ha a tömbben lévő számsorozat szigorúan monoton csökken; <code>novekvo</code>, ha szigorúan
monoton nő; <code>osszevissza</code>, ha egyik sem igaz rá. Írj egy programrészt, amelyik
definiál egy tömböt, és kiírja, hogy „növekvő”, ha a tömbben lévő számok szigmon növekvő sorban
vannak. Pl. [3 2.1 0.9] → <code>csokkeno</code>, [3 4 2 9 5] → <code>osszevissza</code>, [3 4.65
9 11] → <code>novekvo</code>.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>

/* nem lenne muszaj typedefelni amugy */
typedef enum { osszevissza, novekvo, csokkeno } SzigMon;

/* a feladat nem definialja azt, mi a helyzet a 0 es 1 elemu
   tombokre (amik szigmon novekvoek es csokkenoek is :D) */

SzigMon vizsgal(double *t, int meret) {
    bool nov = true, csokk = true; /* egyelore barmelyik lehet */

    /* vigyazni a tulindexelesre! i+1, szoval itt i<meret-1*/
    for (int i = 0; i < meret - 1; i++)
        /* ha nem igaz, hogy kisebb a kovetkezonel */
        if (!(t[i] < t[i + 1]))
            /* akkor ez novekvo nem lehet */
            nov = false;

    /* ugyanaz a logika */
    for (int i = 0; i < meret - 1; i++)
        if (!(t[i] > t[i + 1]))
            csokk = false;

    /* hacsak nem 0 vagy 1 elemu a tomb, akkor ez megfelel */
    if (csokk) return csokkeno;
    if (nov) return novekvo;
    return osszevissza;
}

int main(void) {
    double t1[5] = {5, 9, 1, 3, 45};
    double t2[5] = {1, 2, 3, 4, 5};
    double t3[5] = {9, 8, 7, 6, 5};

    if (vizsgal(t1, 5) == osszevissza) printf("t1 osszevissza\n");
    if (vizsgal(t2, 5) == novekvo) printf("t2 novekvo\n");
    if (vizsgal(t3, 5) == csokkeno) printf("t3 csokkeno\n");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Minden szám megfordítása</h3>

<div class="sticky">Kis ZH volt</div>

<p>Írj C programot, amelyik definiál egy 1000 elemű, bájtokból álló tömböt. A program fordítsa
meg az egyes bájtokban a biteket; a 7. helyiértékű cseréljen helyet a 0. helyiértékűvel, a 6.
helyiértékű az 1-essel stb. (Feltételezzük, hogy a bájtok 8 bitesek. A tömb számokkal
feltöltésével nem kell foglalkozni.) A program végezetül írja ki binárisan a tömb 0. elemét. A
megfordításra példa:</p>

<pre class="screenshot">
76543210
10110010    bemenet
01001101    kimenet
</pre>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    unsigned char t[1000];

    /* egyet most itt inicializalok, hogy lassam az eredmenyt,
     * de a feladat nem keri */
    t[0] = 0xd7;

    /* kiiras, csak hogy a csere elott is lassuk */
    for (int i = 7; i >= 0; i--)
        putchar((t[0] >> i) & 1 ? '1' : '0');
    printf("\n");

    /* ez a MEGOLDAS LENYEGE */
    for (int i = 0; i < 1000; i++) {
        unsigned char uj = 0;

        /* amit a regi szambol kishiftelunk jobbRA,
         * azt az ujba beshifteljuk jobbROL */
        for (int j = 0; j < 8; j++) {
            int x = t[i] & 1;   /* ez kiveszi az also bitet */
            t[i] >>= 1;         /* a regit shifteli */
            uj = uj << 1 | x;       /* ez az ujat balra shifteli,
                                         es az ujat berakja */
        }
        t[i] = uj;
    }

    /* ez csak copypaste, a feladat egyszer keri */
    for (int i = 7; i >= 0; i--)
        putchar((t[0] >> i) & 1 ? '1' : '0');
    printf("\n");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Bitek léptetése</h3>

<div class="sticky">Kis ZH volt</div>

<p>Írj egy C programot, amelyik 100 elemű, bájtokból álló tömböt léptet egy bittel jobbra! A
számokból jobbra kicsúszó bit jöjjön be mindig a következő számba balról. Az utolsó szám legalsó
helyiértékéből kicsúszó bit pedig kerüljön az első szám legfelső helyiértékébe. (Feltételezzük,
hogy a bájtok 8 bitesek. A tömb számokkal feltöltésével nem kell foglalkozni.) Például:</p>

<pre class="screenshot">
76543210 76543210 ... 76543210 76543210
01001010 11111101     01011110 00001101    bemenet
10100101 01111110 ... 10101111 00000110    kimenet
</pre>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>

int main(void) {
    unsigned char t[100];

    /* ezt nem kerte a feladat, csak hogy ne legyen inicializalatlan */
    for (int i = 0; i < 100; ++i)
        t[i] = rand() % 256;

    /* ezt se kerte, csak hogy latszodjon az eredmeny */
    for (int i = 7; i >= 0; i--)
        putchar((t[0] >> i) & 1 ? '1' : '0');
    printf(" ... ");
    for (int i = 7; i >= 0; i--)
        putchar((t[99] >> i) & 1 ? '1' : '0');
    printf("\n");

    /* MEGOLDASA a feladatnak: tulajdonkepp ez a ciklus. */
    /* utolso szam utolso bitje,
     * mert ez csuszik be az elso szamba; mar most kivesszuk,
     * hogy lent, amikor az atvitelt "becsusztatjuk" az
     * if (atvitel) resznel, ott mar a megfelelo erteket
     * tartalmazza */
    int atvitel = t[99] & 1;
    for (int i = 0; i < 100; i++) {
        int uj_atvitel = t[i] & 1; /* a kovetkezo szamhoz - ez a kicsuszo bit */
        t[i] >>= 1;                /* ezzel csuszik az egesz */
        if (atvitel == 1)          /* ha volt "atvitel", akkor azt berakjuk a legfelsobe */
            t[i] |= 1 << 7;
        atvitel = uj_atvitel;
    }

    /* kiirom az eredmenyt; a feladat nem kerte */
    for (int i = 7; i >= 0; i--)
        putchar((t[0] >> i) & 1 ? '1' : '0');
    printf(" ... ");
    for (int i = 7; i >= 0; i--)
        putchar((t[99] >> i) & 1 ? '1' : '0');
    printf("\n");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Párosak vagy negatívak?</h3>

<div class="sticky">Kis ZH volt</div>

<p>Írj egy függvényt, amelyik egy egész számokból álló tömböt vesz át paraméterként. A függvény
térjen vissza az alábbi felsorolt típusból valamelyik értékkel: <code>parosak</code>,
<code>negativak</code>, <code>mindketto</code>, <code>egyiksem</code>, ha a tömbben páros az
összes szám, negatív az összes, illetve ha mindkét tulajdonság, vagy egyik tulajdonság sem
érvényes rájuk. Írj programot, amelyik egy példaként definiált 100 elemű tömbre meghívja a
függvényt, és kiírja, hogy „párosak”, ha érvényes rá ez a tulajdonság.</p>

<ul>
<li>[3 4 5] → <code>egyiksem</code>
<li>[-2 -4 -6] → <code>mindketto</code>
<li>[4 6 10] → <code>parosak</code>
</ul>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>

typedef enum { parosak, negativak, mindketto, egyiksem } Tulajdonsagok;

Tulajdonsagok vizsgal(int *t, int meret) {
    /* a megoldas gondolata, pl. parosakra:
     * 1) tetelezzuk fel, hogy az osszes szam paros.
     * 2) nezzuk vegig a tombot
     *    2a) ha talalunk egy nem paros szamot...
     *    2b) ... akkor nem igaz az, hogy mind parosak. */

    /* 1 */
    bool prsk = true;
    bool ngtvk = true;
    /* 2 */
    for (int i = 0; i < meret; ++i) {
        if (t[i] % 2 != 0)      /* <- 2a */
            prsk = false;       /* <- 2b */
        if (t[i] >= 0)
            ngtvk = false;
    }

    if (prsk && ngtvk)
        return mindketto;
    if (prsk)           /* ... de nem ngtvk */
        return parosak;
    if (ngtvk)          /* ... de nem prsk */
        return negativak;
    return egyiksem;    /* mar csak ez lehet. */
}

int main(void) {
    int t[5] = {4, 6, 8, 10, 12};

    if (vizsgal(t, 5) == parosak)
        printf("parosak");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>













<?php GyakDia::beginslide("Sztringek", false, "feladatsztring"); ?>


<h3>Sztringek, mint karaktertömbök</h3>

<p>Hozzunk létre egy sztringet! Változtassunk meg benne néhány
karaktert! Írjunk ciklust, amelyik megszámolja az <code>'l'</code>
betűket a sztringben!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    char sz[20] = "Hello, vilag!";

    printf("|%s|\n", sz);
    sz[0] = 'h';              /* sztring: "idezojel", karakter: 'h' aposztrof! */
    printf("|%s|\n", sz);
    sz[7] = '\0';             /* 0 is lehetne, ugyanaz. */
    printf("|%s|\n", sz);

    /* tekintsünk a sztringre, mint tömbre. hol van vége?
       ahol sz[i]==0, nem pedig i=19-nél, ami a tömb méretéből adódna! */
    int db = 0;
    for (int i = 0; sz[i] != '\0'; ++i)
        if (sz[i] == 'l')
            db += 1;
    printf("[%s] sztring %d darab l betűt tartalmaz.\n", sz, db);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Üdvözlés</h3>
<p>Készíts programot, amely bekéri a felhasználó nevét, majd üdvözli őt a nevén szólítva!</p>

<h3>Hány szóköz?</h3>
<p>Készíts programot, mely bekér egy mondatot, majd
<br>
a.) megszámolja és kiírja, hogy a mondatban hány szóköz található.
<br>
b.) kiírja a mondatot szóközök nélkül.</p>


<h3>Kisbetűk I.</h3>
<p>Készíts függvényt (numLower), ami megkap egy stringre mutató
pointert, és visszaadja az adott szövegben található kisbetűk
számát. (Ehhez használható a <code>ctype.h</code>
<code>islower()</code> függvénye is.)</p>

<h3>Kisbetűk II.</h3>
<p>Írj C függvényt, amely egy nullával terminált sztringben kicseréli az
angol abécé nagybetűit a nekik megfelelő kisbetűkre. Ha a bemeneti sztring
"Hello&nbsp;Vilag", módosítsa azt "hello&nbsp;vilag"-ra.
(Tipp: A megoldáshoz a ctype.h könyvtári függvényei használhatóak.)</p>


<h3>Nagybetűk</h3>
<p>Készíts függvényt, mely a paraméterben átadott sztringet nagybetűssé alakítja!</p>


<h3>Karakterek cseréje</h3>
<p>Készíts függvényt, mely paraméterben egy sztringet és további két
karaktert (mit és mire) kap. A függvény keresse meg a sztringben a "mit"
változóban megadott karaktereket, és cserélje azokat a "mire" változóban
megadottakra. A függvény visszatérési értéke a kicserélt karakterek számát
jelentse.</p>




<h3>Névelő</h3>
<p>Készíts programot, mely adott sztringben megszámolja, hányszor fordul
elő az „a” névelő. A névelő lehet mondat elején, de végén nem, viszont vessző
állhat előtte is és utána is, egyébként szóköz karakterek határolják.</p>



<h3>Decimális</h3>
<p>Írj olyan int <code>dec_to_int(char *s)</code> függvényt, amelyik a megadott
számjegyekből álló sztringet a neki megfelelő egész értékké
alakít (tízes számrendszer szerint)! Pl. <code>dec_to_int("256")</code> visszatérési értéke <code>256</code>.
Oldd meg a feladatot a <code>sscanf()</code> segítségével és anélkül is!</p>



<h3>Hexadecimális</h3>
<p>Írj olyan int <code>hexa_to_int(char *s)</code> függvényt, amelyik a megadott
hexadecimális számjegyekből álló sztringet a neki megfelelő egész értékké
alakít! Pl. <code>hexa_to_int("1ef")</code> visszatérési értéke <code>495</code>.
Oldd meg a feladatot a <code>sscanf()</code> segítségével és anélkül is!</p>





<h3>Része-e?</h3>
<p>Írj egy függvényt, amely egy adott sztringben megkeresi egy másik
sztring legutolsó előfordulását, és visszaadja annak pozícióját, illetve
-1-et, ha nem található. A megoldáshoz ne használd a könyvtári <code>strrstr()</code>
függvényt! Például "abcd<em>abc</em>e"-ben keressük "abc"-t, a visszatérési érték
4, a színnel jelölt előfordulás miatt.</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A következő módon bontható fel ezt részekre:</p>

<ul>
    <li>Kell egy függvény, amelyik megmondja, hogy egy adott sztring elején szerepel-e
    egy másik sztring. Ezt fogom lefuttatni a különböző részein az eredeti sztringeknek
    (visszafelé). Szemfülesek az <code>strncmp</code>-t használhatják erre.
    <li>Kell egy függvény, amelyik egy sztring hosszát megmondja (de jó a gyári <code>strlen</code> is), mivel
    <li>visszafelé futtatok egy ciklust, és nézem, hogy megtalálom-e valahol a szénakazal
    végén a tűt.
    <li>Ahol először megtalálom, azzal az indexszel vissza is térhetek; ha sehol
    nem találtam meg, akkor -1-gyel.
</ul>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>

bool igy_kezdodik(char *mi, char *hogyan) {
    int i;

    /* amig egyiknek sincs vege, es egyeznek a betuk, kov. karakter */
    i=0;
    while (hogyan[i]!='\0' && mi[i]!='\0' && hogyan[i]==mi[i])
        i++;
    /* ha a hogyan string vegere ertunk, akkor eddig tuti megegyezett
       a mi-vel */
    return hogyan[i]=='\0';
}

int hossz(char *str) {
    int i = 0;
    while (str[i]!='\0') i++;
    return i;
}

int utolso_elofordulas(char *szenakazal, char *tu) {
    int h;

    h=hossz(szenakazal);
    h-=hossz(tu);   /* ennel csak elorebb lehet */
    while (h>=0 && !igy_kezdodik(szenakazal+h, tu))
        h--;
    /* ha ertelmes index van, akkor azzal terunk vissza */
    if (h>=0)
        return h;
    /* amugy -1 */
    return -1;
}

int main(void) {
    printf("%d\n", utolso_elofordulas("almafa, eperfa", "fa"));
    printf("%d\n", utolso_elofordulas("almafa, eperfa", "a"));
    printf("%d\n", utolso_elofordulas("almafa, eperfa", "kortefa"));

    return 0;
}
EOT
); ?>

<p>Az első függvénynek az is jó megoldás lenne, ha az összehasonlítandó
karakterek számát paraméterként kapja; olyankor nem kellene figyelnie
a lezáró nullákra.</p>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Felülírás és csere</h3>

<p>Írj függvényt, amely az első paraméterében kapott sztringben megkeresi
a második paraméterében adott karakter előfordulásait, és felülírja azokat
a harmadik paraméterében adott karakterrel! Pl. "alma", 'a', 'e' &rarr; "elme".</p>

<p>Írj függvényt, amely szintén egy sztringet és egy karakterpárost kap,
de ez ne felülírja az első előfordulásait a másodikkal, hanem cserélje meg
őket! Pl. 'a', 'e' jelentse azt, hogy 'a'-t 'e'-re kell cserélni, 'e'-t
pedig 'a'-ra. Hogyan lehet ezt megoldani az előző függvény felhasználásával?</p>


<h3>Squeeze</h3>
<p>Írj olyan "squeeze" függvényt, amely az első paraméterben megadott
sztringből az összes olyan karaktert törli, amelyik szerepel a második
paraméterben megadott sztringben. Például "megadott sztring", "gt"
paraméterekkel meghívva a függvényt az első paraméter így módosul: "meado
szrin".</p>




<h3>Pontosan egyszer</h3>
<p>Írj programot, amely beolvas egy karakterláncot, és megállapítja, hogy vannak-e benne olyan
karakterek, amelyek pontosan egyszer fordulnak elő. A program írja ki ezeket a karaktereket, ha
pedig nincsenek a karakterláncban egyedi karakterek, akkor közölje a felhasználóval!</p>









<h3>toupper()</h3>

<p>Készíts függvényt (myToUpper) mely egy sztringben képes a latin abc betűit nagybetűssé
alakítani! A bemenet legyen a sztringre mutató kezdőpointer, a végeredmény ugyanebbe a sztringbe
kerüljön bele!</p>



<h3>Legalább kettő – sztringre</h3>

<div class="sticky">Kis ZH volt</div>

<p>Írj függvényt, amely paraméterként vesz át egy sztringet, és visszaadja az első olyan
karakter címét, amelyből legalább kettő található a sztringben! Ha nincs ilyen karakter, adjon
vissza NULL pointert!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
char *duplas(char *string) {
    for (int i = 0; string[i]!='\0'; i++)
        for (int j = i+1; string[j]!='\0'; j++)
            if (string[i] == string[j] )
                return string+i;
    return NULL;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>strcat()</h3>

<p>Írjunk függvényt, amelyik egyik sztring végére másol egy
másikat, vagyis hozzáfűzi a paraméterként kapott első sztringhez a
másodikat! (Ezt csinálja a könyvtári <code>strcat()</code> függvény
is.)</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void sztringhozzafuz(char *mihez, char *honnan) {
    int folytat, i;

    i = 0;
    while (mihez[i] != '\0')
        i++;      /* ezzel megkeressuk, az elobbinek hol van vege */
    folytat = i;  /* es oda masoljuk a masikat, folytatolagosan */

    i = 0;        /* nezzuk a masik sztringet az elejetol */
    while (honnan[i] != '\0') {
        mihez[folytat] = honnan[i];
        i++;
        folytat++;
    }
    mihez[folytat] = '\0';     /* lezaro nulla eddig nem - most megtesszuk. */
}

/* peldak, hogyan kell meghivni a fuggvenyeket */
int main(void) {
    /* mit a mizujs[]? azt, hogy a fordito kitalalja a tomb meretet. */
    /* a hello[] sztringhez hozzafuzunk, ezert az nagyobb kell legyen. */
    char hello[50] = "Hello, vilag!",
         mizujs[] = "Mizujs?";

    printf("Sztring: [%s] es [%s]\n", hello, mizujs);
    sztringhozzafuz(hello, " ");
    sztringhozzafuz(hello, mizujs);
    printf("Osszefuzve: [%s].\n", hello);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>











<h3>strlcat()</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj egy függvényt (paraméterei: cél, forrás, cél tömb mérete), amelyik egy cél sztring (1.
paraméter) végére hozzáfűz egy forrás sztringet (2. paraméter); figyelembe véve azt, hogy a cél
tömb maximális mérete adott (3. paraméter), amelybe már a lezáró nullának is bele kell férnie.
Mindkét helyen eredendően is 0-val lezárt sztring van. Ha az összefűzött sztring nem fér el a
cél helyen, akkor le kell vágnia a függvénynek – de nullával mindig legyen lezárva. Írj
programrészt, amelyben bemutatod a függvény használatát. A <code>string.h</code> függvényei NEM
használhatóak.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<img src="kzh-strlcat.svg" alt="Az strlcat() függvény működése" class="kozep" style="width: 28em;">
<p>Rendes helyeken ilyen gyárilag szokott lenni, <code>strlcat</code> vagy
<code>g_strlcat</code> néven. Az egésznek az előnye, hogy a cél puffer
méretét kell megadni a harmadik paraméterben, ami statikus tömb esetén egy
sima sizeof. Nem kell levonni 1-et a lezáró 0 miatt, semmi ilyesmi, pontosan
a méretet várja.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void strlcat(char *cel, char *forras, int meret) {
    int celmeret, forrasidx;

    celmeret=0;
    while (cel[celmeret]!=0)
        ++celmeret;

    forrasidx=0;
    while (forras[forrasidx]!=0 && celmeret+forrasidx<meret-1) {
        cel[celmeret+forrasidx]=forras[forrasidx];
        forrasidx++;
    }

    /* akarmiert is lett vege, lezaro 0. */
    cel[celmeret+forrasidx]=0;
}

int main(void) {
    char cel[6]="alma";
    char cel2[9]="alma";
    strlcat(cel, "le", sizeof(cel));
    strlcat(cel2, "le", sizeof(cel2));
    printf("[%s]\n", cel);
    printf("[%s]\n", cel2);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Összefűzés</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely paraméterként vesz át egy cél sztringet, továbbá két másik sztringet és
egy elválasztó karaktert! Másolja be a cél sztringbe a másik két sztringet úgy, hogy közéjük az
elválasztó karaktert teszi.
<p>Írj főprogramot, amelyben egy példával bemutatod a függvény használatát! A beépített
sztringkezelő függvények <em>nem</em> használhatóak!
<p>Példa paraméterek: <code>„alma”</code> és <code>„körte”</code>, továbbá <code>„;”</code>
<p>Példa eredmény: <code>„alma;körte”</code>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void osszefuz(char *ide, char *egyik, char *masik, char koze) {
   int pos=0;
   for (int i=0; egyik[i]!='\0'; ++i)
      ide[pos++]=egyik[i];
   ide[pos++]=koze;

   for (int i=0; masik[i]!='\0'; ++i)
      ide[pos++]=masik[i];
   ide[pos++]='\0';
}

int main(void) {
   char kesz[20];

   osszefuz(kesz, "alma", "korte", ';');
   printf("%s\n", kesz);

   return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Szétválasztás</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj egy függvényt, amely paraméterként vesz át egy bemeneti sztringet és egy elválasztó
karaktert! Legyen még két további paramétere, amelyekbe az eredményt írja. Vágja ketté a
függvény a sztringet az első elválasztó karakternél: az eleje menjen az egyik eredmény
sztringbe, másik pedig a másikba!
<p>Írj főprogramot, amelyben egy példával bemutatod a függvény használatát! A
beépített sztringkezelő függvények <em>nem</em> használhatóak.
<p>Példa paraméterek: <code>„alma;körte”</code> és <code>„;”</code>
<p>Példa eredmény: <code>„alma”</code> és <code>„körte”</code>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void szeletel(char *be, char elvalaszto, char *egyik, char *masik) {
   int x = 0;
   int pos = 0;
   while (be[x] != elvalaszto)
      egyik[pos++] = be[x++];
   egyik[pos] = '\0';

   x++;
   pos = 0;
   while (be[x] != '\0')
      masik[pos++] = be[x++];
   masik[pos] = 0;
}

int main(void) {
   char bal[20], jobb[20];

   szeletel("alma;korte", ';', bal, jobb);
   printf("[%s] es [%s]\n", bal, jobb);

   return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>strstr()</h3>

<p>Írj függvényt, amely két sztringet vesz át paraméterként, és az elsőben megkeresi a második 
első előfordulását! Ha megtalálja, adja vissza a megtalált szöveg első karakterének címét, ha 
nincs benne, akkor NULL pointert! A megoldáshoz nem használhatsz könyvtári függvényt. (A feladat 
a string.h-ban található strstr függvény saját megvalósítása.) Egészítsd ki teljes programmá, a 
program az &quot;Indul a kutya s a tyúk aludni.&quot; mondatban keresse meg a &quot;kutya&quot; 
szót! (A függvény a kis és nagybetűket tekintse különbözőnek!)</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

char* mystrstr(char* hol, char* mit) {
    for (int i = 0; hol[i]!='\0'; i++) {
        bool talalt = true;
        for (int j=0; hol[i+j] && mit[j] && talalt; j++)
            if (hol[i+j]!=mit[j])
                talalt = false;
        if (talalt && mit[j]=='\0')
            return &hol[i];
    }
    return NULL;
}

int main(void) {
    char s1[] = "Indul a kutya s a tyúk aludni.";
    char* pos1 = mystrstr(s1, "kutya");
    if (pos1 != NULL)
        printf("Pozíció: %d\n", (int) (pos1-s1));
    else
        printf("NULL - nincs benne\n");

    char s2[] = "Indul a kuty";
    char* pos2 = mystrstr(s2, "kutya");
    if (pos2 != NULL)
        printf("Pozíció: %d\n", (int) (pos2-s2));
    else
        printf("NULL - nincs benne\n");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>








<h3>Karakterek törlése</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely átvesz paraméterként egy módosítandó sztringet és még egy karaktert.
Alakítsa át úgy a sztringet úgy, hogy a megadott karaktert törölje a sztring elejéről és a
végéről is! Mindkét oldalon lehet több is, vagy akár semennyi. A belsejében viszont tudjuk, hogy
nincsen.
<p>Írj főprogramot, amelyben egy példával bemutatod a függvény használatát! A beépített
sztringkezelő függvények <em>nem</em> használhatóak.
<p>Példa bemenet: <code>„xxxHello hallo elektor kalandorxxxx”</code> és az <code>„x”</code> karakter
<p>Példa kimenet: <code>„Hello hallo elektor kalandor”</code>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void sztring_trim(char *str, char mit) {
    int eleje = 0;
    while (str[eleje] == mit)
        eleje++;
    int pos = 0;
    for (int i = eleje; str[i] != mit && str[i] != '\0'; i++)
        str[pos++] = str[i];
    str[pos] = '\0';
}

int main(void) {
    char szoveg[] = "xxxHello hallo elektor kalandorxxxx";

    sztring_trim(szoveg, 'x');
    printf("[%s]\n", szoveg);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>








<h3>Bevezető és lezáró karakterek</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely paraméterként átvesz egy cél sztringet, továbbá egy forrás sztringet,
egy karaktert és egy darabszámot! Másolja át a cél sztringbe a forrást úgy, hogy elé és mögé a
megadott karakterből a megadott darabszámút tegye. Ezen kívül a szóközöket is cserélje ki a
megadott karakterre.
<p>Írj főprogramot, amelyben egy példával bemutatod a függvény használatát! A beépített
sztringkezelő függvények <em>nem</em> használhatóak.
<p>Példa bemenet: <code>„Hello hallo elektor kalandor”</code>, továbbá az <code>„x”</code> karakter és 3
<p>Példa kimenet: <code>„xxxHelloxhalloxelektorxkalandorxxx”</code>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void strelemoge(char *ide, char *mit, char kar, int db) {
    int pos = 0;
    
    for (int x = 0; x < db; ++x)
        ide[pos++] = kar;

    for (int x = 0; mit[x] != '\0'; ++x)
        ide[pos++] = mit[x] == ' ' ? kar : mit[x];

    for (int x = 0; x < db; ++x)
        ide[pos++] = kar;

    ide[pos] = '\0';
}

int main(void) {
    char novelt[30];

    strelemoge(novelt, "Hello hallo elektor kalandor", 'x', 3);
    printf("[%s]\n", novelt);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Második szó, utolsó szó</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj függvényt, amely paraméterként kap egy sztringet! A sztring szöveget tartalmaz, melynek
szavait szóközök választják el egymástól (minden szó, ami nem szóköz). A függvény adja vissza
címével átvett változókban a sztring második szavának indexét, visszatérési
értékként (return-nel) pedig a sztring utolsó szavának címét! A paraméterként kapott sztringről
biztosan tudjuk, hogy legalább két szóból áll, a szavakat pontosan egy szóköz választja el
egymástól, és a sztring első és utolsó karaktere nem szóköz.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
char *szavak(char *sztring, int *masodik) {
    int utolso = 0;
    *masodik = 0;
    for (int i = 0; sztring[i] != '\0'; i++) {
        if (sztring[i] == ' ') {
            utolso = i;
            if (*masodik == 0)
                *masodik = i + 1;
        }
    }
    return sztring + utolso;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>„The” kezdetű címek"</h3>

<p>Könyvek, filmet címeit úgy szokás rendezni, hogy a címek elején lévő névelőket (pl. angolul a
„The”, magyarul az „A” és „Az”) a rendezésben nem vesszük figyelembe. Írj egy olyan módosított
<code>strcmp_the()</code> függvényt, amely paramétere és visszatérési értéke az eredeti <code>strcmp()</code>-éhez
hasonló, de az összehasonlításnál figyelmen kívül hagyja a „The” kezdetet!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A legegyszerűbb megoldás az alábbi. Megvizsgáljuk mindkét sztringet. Ha valamelyik a „The&nbsp;” részsztringgel
kezdődik, az annak megfelelő pointert 4-gyel növeljük, tehát négy karakterrel hátrébb léptetjük.
Az így kapott sztringeket adjuk az eredeti <code>strcmp()</code>-nek. A két pointer növelését
azért tehetjük meg, mert azok a saját függvényünknek lokális változói, amelyet módosíthatunk.</p>

<?php Highlighter::c(<<<'EOT'
/* Sztring összehasonlító függvény, ami nem veszi figyelembe
 * a szting elején lévő "The " előtagot */
int strcmp_the(char *egyik, char *masik) {
    if (strncmp(egyik, "The ", 4)==0)
        egyik+=4;
    if (strncmp(masik, "The ", 4)==0)
        masik+=4;
    return strcmp(egyik, masik);
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>IP cím</h3>
<div class="sticky">Vizsga volt</div>

<p>Írj egy olyan szabványos ANSI C függvényt, amely paraméterként kap egy sztringet, mely egy IP
címet tartalmaz a szokásos alakban: négy darab 0 és 255 közötti szám pontokkal elválasztva. A
függvény állítsa elő az IP cím 32 bites reprezentációját! A visszatérési értéke legyen egy
<code>unsigned</code> érték, amelynek legalsó bájtja az IP cím utolsó részének megfelelő értéket
tartalmazza, a második az IP cím utolsó előtti részét és így tovább. Feltesszük, hogy az
unsigned típus az adott architektúrán legalább 32 bites. Ha a bemenet például "0.0.2.33", akkor
a kimenet: 545.</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>Barátunk a <code>scanf()</code>. Itt <em>egyáltalán</em> nem kell karakterenkénti
feldolgozást, és semmi hasonlót csinálni. A <code> scanf&nbsp;%d</code> be fog olvasni egy
számot, és a pontnál meg fog állni, mivel a pont nem lehet része egy egész számnak. A
formátumsztringbe pedig ha elhelyezünk egy pontot, akkor a scanf azt fogja várni, hogy a
bemeneten ott is legyen az a pont; beolvassa és eldobja. És hát, mivel nem a standard bemenetről
olvasunk, hanem sztringből, <code>sscanf()</code> lesz a függvényünk. Vigyázni kell, hogy a
&lt;&lt; műveleteket zárójelezni kell az összeadásnál – itt inkább bitenkénti vagy kapcsolatot
használtam (az eredmény egyébként ugyanaz lenne).</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

unsigned str_to_ip(char *str) {
    unsigned a, b, c, d;

    sscanf(str, "%u.%u.%u.%u", &a, &b, &c, &d);
    return a<<24 | b<<16 | c<<8 | d;
}

int main(void) {
    printf("%u\n", str_to_ip("0.0.2.33"));
    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Caesar kódolás</h3>

<p>A gyakorlaton volt egy olyan példa, amelyik karaktereket képes bekódolni a&rarr;b, b&rarr;c,
c&rarr;d stb kódolással. Írj egy függvényt, amelyiknek megadható a kódolandó karakter, és a&rarr;d
kódolást használ. Javítsd úgy az órán tárgyalt függvényt, hogy csak a kisbetűket kódolja, más
karaktereket hagyjon változatlanul. Figyelj arra is, hogy a programkódban ne legyenek mágikus
értékek (pl. 26, mint az abc betűinek száma).</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

/* Ez bekodol egy karaktert, a kulcs szerint. */
char kodol(char mit, char kulcs) {
    char delta = kulcs - 'a';
    if (mit >= 'a' && mit <= 'z') {
        /* eltolas */
        mit = mit + delta;
        /* tulcsuszott a z-n? */
        if (mit > 'z')
            /* akkor vissza kell menni annyit, hogy ujra az abecen
               belul legyunk. az 'annyit' erteke 'z'-'a'+1 lepes,
               nem pedig 'z'-'a'! az utobbi a ket karakter kozotti
               tavolsag, az elso pedig az a szam, amely az osszes
               letezo betuk szamat mutatja! */
            mit = mit - ('z' - 'a' + 1);
    }
    return mit;
}

char dekodol(char mit, char kulcs) {
    char delta = kulcs - 'a';
    if (mit >= 'a' && mit <= 'z') {
        mit = mit - delta;
        if (mit < 'a')
            mit = mit + ('z' - 'a' + 1);
    }
    return mit;
}


int main(void) {
    char szoveg[] = "hello, world!";

    /* az abc kiirasa */
    for (int i = 'a'; i <= 'z'; ++i)
        printf("%c", i);
    printf("\n");
    for (int i = 'a'; i <= 'z'; ++i)
        printf("%c", kodol(i, 'd'));
    printf("\n");

    /* szoveg kodolasa */
    for (int i = 0; szoveg[i] != 0; ++i)
        szoveg[i] = kodol(szoveg[i], 'd');
    printf("[%s]\n", szoveg);

    /* szoveg dekodolasa */
    for (int i = 0; szoveg[i] != 0; ++i)
        szoveg[i] = dekodol(szoveg[i], 'd');
    printf("[%s]\n", szoveg);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

