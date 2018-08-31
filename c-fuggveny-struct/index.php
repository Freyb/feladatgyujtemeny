
<?php GyakDia::beginslide("Vezérlési szerkezetek"); ?>

<h3>Számkitaláló</h3>

<p>Készíts egy számkitaláló programot! A program kitalál véletlenszerűen egy pozitív egész számot (1 és 1000 között), a
felhasználó pedig addig tippel, amíg meg nem találja a keresett számot. A program minden tipp után megmondja, hogy a felhasználó
tippje kisebb vagy nagyobb a keresett értéknél. Ha eltalálta, akkor pedig azt. Ilyenkor egyúttal be is fejeződik a program
futása.</p>

<p>Vajon mi a nyerő stratégia a gép „ellen”? Hogyan lehet legkevesebb tippből kitalálni a számot, amire a gép gondolt?

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A feladat megoldása nagyon jó példa a hátultesztelő ciklus alkalmazására. Minimum egy tippet kérnünk kell – a ciklusmag,
amely a tippet kéri, és a beírt számot ellenőrzi, egyszer legalább lefut. Illetve a gép minimum egy számot kitalál, és utána
várja a felhasználótól a megfejtést.</p>

<p>A belső ciklusmagban az egyenlőséget nem is kell ellenőrizni, mert azt a ciklus feltétele megteszi. Ha egyenlő a tipp a
gondolt számmal, akkor kijövünk a ciklusból, és ott viszont gondolkodás nélkül ki lehet írni, hogy talált.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(void) {
    char meg;

    /* Generator inicializalasa. */
    srand(time(0));

    do {
        int gondolt, tipp;

        gondolt = rand()%1000+1;
        printf("Gondoltam egy szamot 1 es 1000 kozott. Talald ki!\n");
        do {
            printf("Mi a tipped? ");
            scanf("%d", &tipp);
            if (gondolt > tipp)
                printf("Nagyobbra gondoltam!\n");
            if (gondolt < tipp)
                printf("Kisebbre gondoltam!\n");
        } while (tipp != gondolt);
        printf("Gratulalok, kitalaltad! A gondolt szam %d.\n", gondolt);

        printf("Akarsz meg jatszani (i/n)? ");
        scanf(" %c", &meg);
    } while (meg=='i' || meg=='I');

    return 0;
}
EOT
); ?>

<p>A feladat megoldása nagyon jó példa a hátultesztelő ciklus alkalmazására. Minimum egy tippet kérnünk kell – a ciklusmag,
amely a tippet kéri, és a beírt számot ellenőrzi, egyszer legalább lefut. Illetve a gép minimum egy számot kitalál, és utána
várja a felhasználótól a megfejtést.</p>

<p>A belső ciklusmagban az egyenlőséget nem is ellenőrzöm, mert azt a ciklus feltétele megteszi. Ha egyenlő a tipp a gondolt
számmal, akkor kijövünk a ciklusból, és ott viszont gondolkodás nélkül ki lehet írni, hogy talált.</p>

<p>A véletlenszám-generátor használata: program elején inicializálni kell (<code>srand</code>) egyszer, és utána a
<code>rand()</code> ad egy számot. A <code>%100</code> hatására 0..99 között lesz; ehhez 1-et adva kapjuk az 1..100
tartományt.</p>

<p><code>scanf()</code>-guruknak: a <code>%c</code> előtti szóköz azt jelenti, hogy a bemeneten eldobjuk a whitespace
karaktereket. A <code>%c</code> beolvassa azt is, egyébként semmi más nem. Erre azért van szükség, mert a legutolsó tipp utáni
entert az előző <code>scanf</code> még a bemeneten hagyta.</p>

<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Számkitaláló fordítva</h3>

<p>A felhasználó gondol egy számra 1 és 100 között, a gép pedig megpróbálja kitalálni. Például: „kisebb a szám, mint 25?”, erre a
felhasználó „i”gen vagy „n”em választ ad. Mi a nyerő stratégia a gép részéről, hogy tudja a legkevesebb kérdésből kitalálni?
Valósítsa meg a programot!</p>

<p>Gondolkodtató: ha a gép a nyerő stratégiát alkalmazza, meg tudja-e mondani, ha a felhasználó következetlen választ ad, csalni
próbál? Miért?</p>


<h3>Nincsenek egyformák</h3>

<p>Készíts programot, amely N (maximum 100) darab véletlen számot állít elő, amelyek között nincsenek egyformák!</p>

<h3>Lottószámok</h3>

<p>Az előadás lottószámos programja úgy generált öt különböző számot az 1&hellip;90 intervallumból, hogy a már meglévőket egy
tömbbe tette, és abban a tömbben ellenőrizte minden új véletlenszámra, hogy egyedi-e.</p>

<p>Írj programot, amely eltérő logikával generál öt különböző számot! Egy 90 elemű tömbbe írd bele a számokat 1-től 90-ig, és
utána tömbindexet generálj véletlenszerűen! Miután egy számot már kisorsoltál, vedd ki a tömbből!</p>


<h3>Ötvenhét</h3>
<p>Készíts programot, mely egy, a felhasználó által megadott
1 és 99 közötti természetes számot képes kiírni betűvel! Pl.:</p>
<pre>
5: ot
44: negyvennegy
16: tizenhat
</pre>

<h3>Ezerkilencázhetvenöt</h3>
<p>A feladat ugyanaz, mint fent, csak a tartomány legyen 1 és 999999
között. 2000-ig minden számot egybeírunk, 2000 fölött az ezres és ezer
alatti rész közé kötőjelet kell tenni. Példák:</p>
<pre>
625: hatszazhuszonot
1975: ezerkilencszazhetvenot
8000: nyolcezer
23870: huszonharomezer-nyolcszazhetven
</pre>





<?php GyakDia::beginslide("Függvények"); ?>

<h3>Előjelek</h3>
<p>Készíts függvényt, amelyik megadja két számról, hogy egyezik-e az előjelük!</p>


<h3>Szökőév</h3>
<p>Készíts függvényt, amelyik adott évszámról eldönti, hogy az szökőév-e. 
(Szökőév minden negyedik, nem szökőév minden századik, mégis az minden 
400-adik. A 2000. évben ezért volt szökőév.)</p>


<h3>Armstrong-számok</h3>
<p>Írj függvényt, amely megmondja egy számról, hogy hány számjegyű!</p>
<p>Írj függvényt, amely hatványozást végez egész számokon!</p>
<p>Készíts programot, mely Armstrong-számokat keres, és a találatkat megjeleníti a képernyőn!
N-jegyű Armstrong számoknak nevezzük azokat a számokat, melyek számjegyei N-dik hatványainak 
összege éppen a számot adja. Például: egy négyjegyű Armstrong-szám a 1634, mivel: 
1634=1<sup>4</sup>+6<sup>4</sup>+3<sup>4</sup>+4<sup>4</sup>. Használd az előbb megírt függvényeket!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>

int hany_szamjegy(int szam) {
    int db = 0;
    while (szam > 0) {
        szam /= 10;
        ++db;
    }
    return db;
}

int hatvany(int alap, int kitevo) {
    int hatvany = 1;
    while (kitevo > 0) {
        hatvany *= alap;
        --kitevo;
    }
    return hatvany;
}

bool armstrong(int szam) {
    int szj = hany_szamjegy(szam);
    int osszeg = 0;
    int temp = szam;
    while (temp > 0) {
        osszeg += hatvany(temp % 10, szj);
        temp /= 10;
    }
    return osszeg == szam;
}

int main(void) {  
    for (int i = 10; i <= 99999; ++i) {
        if (armstrong(i))
            printf("%d\n", i);
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>







<h3>A kapitány</h3>
<div class="sticky">NZH-n volt</div>
<p>A kapitány abban az évben született, amely 2016-hoz alulról a legközelebbi olyan szám, melynek osztói száma 8, és van benne
7-es számjegy. Hány éves a kapitány? Határozzuk meg algoritmikus módszerrel egy teljes C programban az évszámot! Írjuk ki ezt is, és
azt is, hogy most hány éves!</p>

<p>Használjunk <em>top-down</em> tervezést! Ha jól csináljuk, a <code>main()</code> kb. 5 soros, és azt mondja:
Az év változóban legyen 2015, és amíg nem igaz a vizsgált számra, hogy az osztóinak száma 8, és van benne 7-es
számjegy, addig csökkentjük az év változó értékét.</p>

<p>(1978 a megoldás.)</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>
 
int osztokszama(int szam) {
    int db = 0;
    for (int i = 1; i <= szam; ++i)
       if (szam%i == 0)
           ++db;
    return db;
}
 
bool vanbenne(int szam, int mi) {
    while (szam > 0) {
       if (szam % 10 == mi)
           return true;
       szam /= 10;
    }
    return false;
}
 
int main(void) {
    int ev = 2016;
    while (!(osztokszama(ev)==8 && vanbenne(ev, 7)))
       --ev;
    printf("%d-ben született, %d éves", ev, 2016-ev);
 
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>












<h3>Sakktábla</h3>
<p>Írj függvényeket, amelyek paraméterei két koordinátapár, amelyek egy mezőre hivatkoznak a 
sakktáblán! (Ez lehet négy karakter is, pl. <code>d6</code> és <code>e8</code>.) Az egyes 
függvények mondják meg a logikai típusú visszatérési értékükben, hogy az adott mezőpár helyes 
lépés-e egy királynak, bástyának, futónak, huszárnak vagy vezérnek!</p>
<p>Írj programot, amely megkérdezi egy kiinduló mezőnek a koordinátáit a felhasználótól, és 
aztán kilistázza az egyes figurák által elérhető mezőket!</p>
<p>A függvények segítségével „sormintamentessé” tehető a program. Hasonlítsd össze az így kapott 
programot a régebbi gyakorlófeladat anyagában található megoldással. Miben segítenek még a 
függvények?</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

/* a betűkre karakterként (számként) tekintek.
 * mivel ábécé sorban vannak, a számjegyek pedig növekvő
 * sorrendben, ezért kisebb/nagyobb összehasonlítást
 * végezhetek, és kivonhatom őket egymásból. */


/* igazat ad vissza, ha a megadott koordinatak nem
 * egy helyes mezot adnak (a1->h8). */
bool helytelen_mezo(char o, char s) {
    return o<'a' || o>'h' || s<'0' || s>'8';
}


/* kivételes eset mindegyik figuránál, ha nem lépett
 * sehova (o1==o2 és s1==s2), hiszen az nem is lépés.
 * ha a két kapott koordinátapár ilyen, a függvény
 * igazzal tér vissza. */
bool mozdulatlan(char o1, char s1, char o2, char s2) {
    return o1==o2 && s1==s2;
}


/* a király egyet léphet valamelyik irányba. ez
 * azt jelenti, hogy a sor- és az oszlopugrás
 * távolságának abszolút értéke maximum egy, de
 * az nem helyes lépés számára, ha mozdulatlan marad. */
bool kiralynak(char o1, char s1, char o2, char s2) {
    return abs(o1-o2)<=1 && abs(s1-s2)<=1 && !mozdulatlan(o1, o2, s1, s2);
}


/* a ló nehéznek tűnik, de nem az. az L alak
 * azt jelenti, hogy a vízszintes elmozdulás 1,
 * a függőleges 2, vagy fordítva. itt a képlet
 * kizárja a mozdulatlanságot. */
bool huszarnak(char o1, char s1, char o2, char s2) {
    return (abs(o1-o2)==2 && abs(s1-s2)==1) || (abs(o1-o2)==1 && abs(s1-s2)==2);
}


/* a bástyánál az oszlop- vagy a sor változatlan.
 * de mindkettő nem lehet ugyanaz, azaz nem lehet
 * mozdulatlan a figura, mert az nem lépés. */
bool bastyanak(char o1, char s1, char o2, char s2) {
    return (o1==o2 || s1==s2) && !mozdulatlan(o1, s1, o2, s2);
}


/* a futónál mindkét irányba ugyanannyit kell
 * mozdulni, úgy jön ki az átlós lépés. */
bool futonak(char o1, char s1, char o2, char s2) {
    return abs(o1-o2)==abs(s1-s2) && !mozdulatlan(o1, s1, o2, s2);
}


/* a királynő mint a bástya és a futó együtt. */
bool vezernek(char o1, char s1, char o2, char s2) {
    return bastyanak(o1, s1, o2, s2) || futonak(o1, s1, o2, s2);
}


int main(void) {
    /* a kapott mezők koordinátái */
    char o1, s1, o2, s2;

    /* megkérdezzük a felhasználót. */
    /* a scanf-nél a szóközök elnyelik a whitespace karaktereket. */
    printf("Írd be az első mezőt, pl. d6!\n? ");
    scanf(" %c %c", &o1, &s1);
    printf("Írd be a második mezőt, pl. f8!\n? ");
    scanf(" %c %c", &o2, &s2);

    if (helytelen_mezo(o1, s1) || helytelen_mezo(o2, s2)) {
        printf("Hibás sor- vagy oszlopmegadás!\n");
    } else {
        if (kiralynak(o1, s1, o2, s2)) {
           printf("Ez szabályos a király számára.\n");
        }
        if (huszarnak(o1, s1, o2, s2)) {
            printf("Huszár számára szabályos.\n");
        }
        if (bastyanak(o1, s1, o2, s2)) {
            printf("Egy bástya léphet így.\n");
        }
        if (futonak(o1, s1, o2, s2)) {
            printf("Egy futó számára ez helyes lépés lehet.\n");
        }
        if (vezernek(o1, s1, o2, s2)) {
            printf("A vezér léphet ilyet.\n");
        }
    }

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Minimum, maximum, határ</h3>

<p>Írj olyan függvényeket, amelyek:</p>
<ul>
    <li>Visszaadja két egész szám közül a nagyobbikat: <code>max(a, b)</code>.
    <li>Visszaadja két egész szám közül a kisebbiket: <code>min(a, b)</code>.
</ul>
<p>Teszteld ezeket a függvényeket! Utána írj olyan függvényt is <em>a fentiek használatával,</em> amely:</p>
<ul>
    <li>Két oldalról korlátoz egy értéket: <code>korlatoz(szam, min, max)</code>
    adja vissza a számot, ha <code>min</code> és <code>max</code> közé esik,
    amúgy pedig <code>min</code>-t vagy <code>max</code>-ot attól függően,
    hogy merre haladta meg a tartományt.
</ul>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

/* Visszaadja a két egész szám közül a kisebbiket. A ?: operátoros megoldás is jó. */
int min(int a, int b) {
    if (a < b)        /* ha "a" kisebb */
        return a;
    else              /* amugy "b" kisebb, vagy egyenloek */
        return b;
}

/* Visszaadja a két egész szám közül a nagyobbikat. Az if-else megoldás is jó.*/
int max(int a, int b) {
    return a > b ? a : b;
}

/* A [min;max] intervallumba szorítja a megadott számot, és
 * azzal tér vissza. Csak akkor működik helyesen, ha min<=max. */
int korlatoz(int szam, int also, int felso) {
    return min(max(szam, also), felso);
}

int main(void) {
    printf("min(5, 7)=%d\n", min(5, 7));
    printf("max(5, 7)=%d\n", max(5, 7));
    printf("-5..10 számok [0;5] közé korlátozva:\n");
    for (int i = -5; i <= 10; i += 1)
        printf("%d ", korlatoz(i, 0, 5));
    printf("\n");

    return 0;
}
EOT
); ?>

<p>1. beugrató: a korlátozásnál figyelni kell arra, hogy az alulról limitáláshoz a <code>max()</code> függvényt kell használni, a felülről
limitáláshoz pedig a <code>min()</code> függvényt.</p>

<p>2. beugrató: vigyázni kell arra is, hogy a <code>korlatoz()</code> formális paramétereit nem szabad <code>min</code>-nek és
<code>max</code>-nak elnevezni, hiszen akkor nem lehetne belőle meghívni a <code>min()</code> és <code>max()</code>
függvényeket:</p>

<?php Highlighter::c_buborek(<<<'EOT'
int korlatoz(int szam, int min, int max) {
    return min(max(szam, min), max);       // HIBÁS!
}
EOT
); ?>

<p>A formális paraméter neve <em>elfedi</em> a függvényen kívül megadott másik függvény nevét. Érdemes ezt átgondolni a fent
helyesen megírt <code>alulrol()</code> és <code>felulrol()</code> esetén is! Ott is megtörténik ez, csak nem probléma, mert
mindkettőnél pont a másik függvényre van szükség.</p>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Bitbabrálás</h3>

<p>Adott az alábbi függvény prototípus:</p>
<?php Highlighter::c(<<<'EOT'
unsigned bitset(unsigned eredeti, unsigned bit);
EOT
); ?>

<ul>
<li>Valósítsd meg a függvényt, amely az <code>eredeti</code> paraméterben kapott szám 
<code>bit</code> sorszámú bitjét 1-re állítja, és visszatér az így kapott számmal! A többi bit 
maradjon változatlanul! A legkisebb helyiértékű bit száma 0.
<li>Készíts <code>bitreset</code> függvényt is, melynek paraméterezése megegyezik a 
<code>bitset</code>-ével, és a megadott sorszámú bitet 0-ra állítja!
<li>Végül pedig <code>bitnegal</code> függvényt, amely a megadott sorszámú bitet negálja.
</ul>

<p>Legyen <code>unsigned c=51</code>! Végezd el a következő műveleteket, és írd ki egymás alá az 
egyes lépések eredményét! Figyeld meg, hogyan változnak a bitek!</p>

<?php Highlighter::c(<<<'EOT'
c = bitset(c, 5);
c = bitreset(c, 7);
c = bitnegal(c, 3);
EOT
); ?>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

unsigned bitset(unsigned eredeti, unsigned bit) {
     /* Veszünk egy 1-est (00...01) amit elshiftelünk az adott helyre */
     /* majd a kapott értéket VAGY kapcsolatba hozzuk az eredetivel */
     /* így az eredetinek az adott értékén biztos 1-es lesz */
     /* a többi pedig nem változik */
    return eredeti | (1<<bit);
}

unsigned bitreset(unsigned eredeti, unsigned bit) {
     /* Veszünk egy 1-est (00...01) amit elshiftelünk az adott helyre */
     /* a kapott értéket negáljuk, így az adott helyiérték 0 lesz */
     /* a többi pedig 1 (pl. 11110111) */
     /* Ezt ÉS kapcsolatba hozzuk az eredetivel, így az eredeti adott bitje */
     /* biztos 0 lesz, a többi pedig nem változik */
    return eredeti & (~(1<<bit));
}

unsigned bitnegal(unsigned eredeti, unsigned bit) {
     /* Veszünk egy 1-est (00...01) amit elshiftelünk az adott helyre */
     /* majd a kapott értéket XOR kapcsolatba hozzuk az eredetivel */
     /* így az eredetinek az adott értéke invertálódik */
     /* a többi pedig nem változik */
    return eredeti ^ (1<<bit);
}

 /* Bitmintát kiíró függvény (az előző feladatból) */
void bitminta(unsigned c) {
    for (int i = 31; i >= 0; i--)
        printf("%c", ((c>>i)&1) ? '1' : '0');
}

int main(void) {
    unsigned c = 51;
    bitminta(c); printf("\n");
    c = bitset(c, 5);
    bitminta(c); printf("\n");
    c = bitreset(c, 7);
    bitminta(c); printf("\n");
    c = bitnegal(c, 3);
    bitminta(c); printf("\n");
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>










<?php GyakDia::beginslide("Struktúrák", false, "feladatstruct"); ?>

<h3>Elmozdulás egy adott ponttól</h3>
<p>Készíts függvényt, mely egy pont x és y koordinátáival tér vissza. A 
függvény paraméterként kapja egy pont x és y koordinátáját (egy pontot), valamint egy 
szöget és egy távolságértéket. Számítsd ki a visszatérési értékként szereplő 
pont x és y koordinátáit, hogy az a megadott ponttól meghatározott szögben 
és távolságban legyen.

<h3>Elforgatás egy pont körül</h3>
<p>Készíts függvényt, amely egy x és y koordinátával rendelkező pontot elforgat
egy másik adott pont körül, adott szöggel! A függvény visszatérési értéke az elforgatott
pont legyen. (A forgatáshoz való képletet megtalálod a függvénytáblában is.)</p>

<h3>Kártyapakli I.</h3>
<p>Kártyás játékot írunk. Definiálj egy olyan C-s típust, amely 
tárolhatja egy kártya adatait (szín: pikk, treff, &hellip; és szám: A, 2, 3, &hellip;
J, Q, K). Tölts fel egy tömböt egy pakli kártyáival. Utána keverd meg a 
tömböt. A keverő algoritmus ne cserélje feleslegesen sokszor a tömb elemeit! 
Végül írd ki, milyen sorrendben szerepelnek a kártyák a megkevert 
pakliban.</p>

<h3>Kártyapakli II.</h3>
<p>Definiálj egy olyan C-s típust, amely tárolhatja egy kártya adatait (szín: pikk, treff, 
&hellip; és szám: A, 2, 3, &hellip; J, Q, K)!</p>
<p>Írj függvényt, amely megmondja egy pakli kártyáról (kártyák tömbjéről), hogy:</p>
<ul>
    <li>Hiányos-e a pakli,
    <li>Van-e benne dupla lap (kétszer ugyanaz)!
</ul>

<h3>Rudak hossza</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy gyárban fémrudakat gyártanak. A megmunkálás pontatlansága miatt azonban ezek hossza 
kicsit eltérő: pl. egy 1 méteresnek szánt rúd 999 mm és 1001 mm között bármekkorára sikerülhet. 
Ha két ilyen rudat egymás mögé teszünk, akkor az összegzett hosszuk valahol 1998 és 2002 mm 
között lesz.
<ul>
<li>Definiálj típust, amely egy rúd minimális és maximális
hosszát tárolja!
<li>Írj egy függvényt, amely paraméterként kapja két rúd adatait, és
visszatérési értéke egy rúd, amely ezek összege (egymás mögé tett rudak hossztartománya).
<li>Írj függvényt, amely visszaadja egy paraméterként kapott rúd átlagos hosszát!
<li>Egészítsd ki ezt teljes programmá, amelyben létrehozol egy 999-1001 mm-es, és egy 498-502 mm-es
rudat. Számolja ki a program a függvényekkel, hogy mekkora ezek összege minimálisan, maximálisan
és átlagosan!
</ul>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

typedef struct Rud {
    double min, max;
} Rud;

Rud osszeg(Rud r1, Rud r2) {
    Rud uj;
    uj.min=r1.min+r2.min;
    uj.max=r1.max+r2.max;
    return uj;
}

double atlagos(Rud r) {
    return (r.min+r.max)/2;
}

int main(void) {
    Rud a = { 999, 1001 }, b = { 498, 502 }, o;

    o = osszeg(a, b);
    printf("min: %f, max: %f, atlag: %f\n",
        o.min, o.max, atlagos(o));

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Vektorok</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy programban kétdimenziós vektorok adatait kell tárolni. Ilyenek lehetnek a sebességek: 
v<sub>x</sub> vízszintes irányú, v<sub>y</sub> függőleges irányú sebességek adják a v 
sebességvektort.

<ul>
<li>Definiálj típust, amely egy sebességvektort tárol!
<li>Írj függvényt, amely paraméterként egy sebességvektort kap, és
visszatérési értéke a vektor hossza (Pitagorasz-tétel)!
<li>Írj függvényt, amely paraméterként két sebességvektort kap,
és visszatérési értéke az összeg vektor (komponensenként)!
<li>Egészítsd ki mindezt főprogrammá, amelyben egy (1 m/s, 2 m/s)
és egy (-0,5 m/s, 3 m/s) sebességvektort összegzel, és utána
kiszámolod, az eredő vektornak mekkora a hossza! Írd ki az összes
kiszámolt adatot!
</ul>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <math.h>

typedef struct Vektor {
    double x, y;
} Vektor;

Vektor osszeg(Vektor v1, Vektor v2) {
    Vektor uj;
    uj.x = v1.x+v2.x;
    uj.y = v1.y+v2.y;
    return uj;
}

double hossz(Vektor v) {
    return sqrt(pow(v.x, 2)+pow(v.y, 2));
}

int main(void) {
    Vektor v1 = { 1, 2 }, v2 = { -0.5, 3 }, vo;

    vo = osszeg(v1, v2);
    printf("vx: %f, vy: %f\n", vo.x, vo.y);
    printf("hossz: %f\n", hossz(vo));
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>








<h3>Dátumok, öröknaptár</h3>

<p>Írjunk programot, amely egy struktúrában dátumot tárol: év, hónap, nap. Kezeljék ezeket 
függvények:</p>

<ul>
    <li><code>datum_kiir(d)</code>: kiírja a dátumot év.hónap.nap formában.
    <li><code>datum_ev_napja(d)</code>: megmondja, az év hányadik napja. Vegye
        figyelembe a szökőéveket! (Ehhez csak elő kell szedni a 4. gyakorlat
        feladatát – tekinthetjük azt akár kidolgozottnak is.)
    <li><code>datum_kivon(d1, d2)</code>: megmondja, hány nap telt el d2-től
        d1-ig, ahol d1 a kisebbítendő, d2 a kivonandó.
    <li><code>milyen_nap(d)</code>: megmondja, milyen napra esik az adott dátum.
        1=hétfő, 7=vasárnap. 1900. január 1. hétfőre esett.
</ul>


<?php GyakDiaElemek::megoldasettol(); ?>

<?php
Highlighter::c(<<<'EOT'
#include <stdio.h>

/* a dátum típusunk */
typedef struct Datum {
    int ev, honap, nap;
} Datum;

/*kiírja a dátumot éééé.hh.nn formában */
void datum_kiir(Datum d) {
    printf("%4d.%02d.%02d", d.ev, d.honap, d.nap);
}

/* segédfüggvény: szökőév-e? */
bool szokoev(int ev) {
    return ev%400==0 || (ev%100!=0 && ev%4==0);
}

/* megmondja, hogy az év hányadik napja */
int datum_hanyadik(Datum d) {
    /* hány egész hónapból adódó nap telt el eddig */
    int honapok[] = { 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 };
    int hanyadik, h;
 
    hanyadik = 0;
    for (int h = 1; h < d.honap; ++h)
        hanyadik += honapok[h-1];
    hanyadik += d.nap;
    if (szokoev(d.ev) && d.honap>2)
        hanyadik += 1;
 
    return hanyadik;
}

/* hány nap telt el d1-től d2-ig?
 * csak akkor működik helyesen, ha d2>d1. */
int datum_kivon(Datum d2, Datum d1) {
    /* a különbség: amennyi különbség van a napok között */
    int kulonbseg = datum_hanyadik(d2)-datum_hanyadik(d1);
    /* plusz amennyi különbség van az évek között. a d1 a kisebb! */
    for (int ev = d1.ev; ev < d2.ev; ev += 1)
        kulonbseg += szokoev(ev) ? 366:365;
    return kulonbseg;
}

/* megmondja, milyen napra esett az adott nap.
 * 1=hétfő, 2=kedd, 7=vasárnap. */
int milyen_nap(Datum d) {
    Datum viszonyitas = { 1900, 1, 1 }; /* hétfő */

    /* megnézzük, hány nap telt el. modulo 7 miatt 0..6
     * lesz az eredmény (7 nap egy héten), ahol 0 lesz
     * a hétfő, mert a fenti dátumhoz képest. */
    return datum_kivon(d, viszonyitas)%7 + 1;
}

int main(void) {
    Datum ma = { 2014, 10, 14 }, eleje = { 2014, 9, 8 };

    printf("Ma: ");
    datum_kiir(ma);
    printf(", a hét %d. napja.\n", milyen_nap(ma));

    printf("A szorgalmi időszak kezdete: ");
    datum_kiir(eleje);
    printf(", ennyi nap telt el: %d.\n", datum_kivon(ma, eleje));
    printf("%d. oktatási hét van.\n", datum_kivon(ma, eleje)/7+1);

    return 0;
}
EOT
);
?>

<p>A <code>datum_kivon()</code> függvény végzi a dátumok kivonását. A működésének az a lényege, 
hogy kivonja egymásból azt a két számot, amely a két dátum év kezdete óta teltelt napjainak 
száma; és ehhez adja hozzá az egész eltelt évekből adódó 365 vagy 366 napokat. Ez egy példán jól 
látszik. Ha a 2012.09.03&rarr;2013.10.06 eltelt napokat kell kiszámolni, akkor a 10.06-ból 279, 
a 09.03-ból 247 adódik. Azaz 279-247=32 nap telik el szept. 3 és okt. 6 között. Ehhez kell 
hozzáadni még egy évnyit. Ha a hónapok szerint visszafelé megyünk (pl. 2012.09.03&rarr;
2013.02.25, szeptember&rarr;február), akkor az összeg első tagja negatív, de ez utána 
korrigálódik a hozzáadott teljes év által. (Mintha ugranánk egy évet előre, aztán visszajönnénk 
a megadott dátumig.)</p>

<p>Megfigyelhetjük, hogy a <code>honapok[]</code> tömbnek mindig az első <code>honap-1</code> 
elemét összegezzük. Megírhatnánk úgy is a programot, hogy nem a hónapok napjainak számát, hanem 
ezeket az összegeket tartalmazza a tömb: 0 (január), 31 (február), 59=31+28 (március) stb. Így az 
összegző ciklust meg lehetne spórolni, de kicsit nehezebben lenne követhető a forráskód.</p>

<?php GyakDiaElemek::megoldaseddig(); ?>







<h3>Átfedő körök</h3>

<div class="sticky">Kis ZH volt</div>
<p>Egy geometriai programban körök adatait kell tárolni: középpont (x, y koordináta) és sugár. 
Ezek valós számok. <ul>

<li>Definiálj típust, amelyben egy kör adatai eltárolhatóak!
<li>Írj függvényt, amely paraméterként kap két kört, és megmondja, hogy
    azok átfedik-e egymást! (Ez akkor van, ha a középpontjaik Pitagorasz-tétellel
    számolható távolsága kisebb, mint a sugaraik összege.)
<li>Írj függvényt, amely beolvassa a billentyűzetről a középpontot és
    a sugarat, és visszatérési értéke egy ilyen tulajdonságú kör.
<li>Egészítsd ki ezt teljes programmá, amelyben beolvasod két kör adatait, és megmondod,
    hogy azok átfedik-e egymást!
</ul>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <math.h>
#include <stdbool.h>

typedef struct Kor {
    double x, y, r;
} Kor;

Kor beolvas(void) {
    Kor k;
    scanf("%lf %lf %lf", &k.x, &k.y, &k.r);
    return k;
}

bool atfed(Kor k1, Kor k2) {
    return sqrt(pow(k1.x-k2.x, 2)+pow(k1.y-k2.y, 2)) < k1.r+k2.r;
}

int main(void) {
    Kor a, b;
    a = beolvas();
    b = beolvas();
    printf("%s\n", atfed(a, b) ? "Atfedik egymast" : "Nem fedik at egymast.");
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>3D vektorok</h3>
<p>Az előadáson bemutatott törtes példa alapján írj
egy programot, amelyik háromdimenziós vektor típust képes kezelni!
Tudjon vektorokat kiírni, összeadni, kivonni; számítsa ki két vektor
skaláris szorzatát! A program kerete az alábbi legyen:</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

/* ... a megírt programrészek ... */

int main(void) {
   Vektor a = {3, 2, 1}, b = {4, 6, 8}, c;
   
   c = osszead(a, b);
   kiir(c); printf("\n");

   c = kivon(a, b);
   kiir(c); printf("\n");
   
   printf("Skalárszorzat: %g\n", skalarszorzat(a, b));
   
   return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>Egy háromdimenziós vektor x, y, és z komponensekből áll.
Ezeket egy struktúrába tehetjük, mivel összetartozó értékek,
elválaszthatatlanok egymástól, és együtt adnak ki egy vektort.</p>

<?php Highlighter::c(<<<'EOT'
typedef struct Vektor {
   double x, y, z;
} Vektor;

/* kiirja egy vektor komponenseit */
void kiir(Vektor v) {
   printf("(%g;%g;%g)", v.x, v.y, v.z);
}

/* osszead ket vektort, visszater az osszeggel */
Vektor osszead(Vektor a, Vektor b) {
   Vektor ossz;
   
   /* a kivon()-hoz hasonlóan is lehetne */
   ossz.x = a.x+b.x;
   ossz.y = a.y+b.y;
   ossz.z = a.z+b.z;
   
   return ossz;
}

/* kivon ket vektort, visszater a kulonbseggel */
Vektor kivon(Vektor a, Vektor b) {
   /* az osszead()-hoz hasonloan is lehetne */
   Vektor eredm = {a.x-b.x, a.y-b.y, a.z-b.z};
   return eredm;
}

/* visszater a ket vektor skalarszorzataval */
double skalarszorzat(Vektor a, Vektor b) {
   return a.x*b.x + a.y*b.y + a.z*b.z;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>










<h3>Bankautomata II.</h3>

<p>Idézd föl az órai <?php GyakMenuInfo::a_href('bankautomata', "bankautomatás feladatot"); ?>! A
feladatkiírás azt kérte, hogy írj egy programot, amely egy adott pénzösszeget a megadott névértékű bankjegyekre
és érmékre bont le. Pl. 4200 Ft = 2×2000 Ft + 1×200 Ft.</p>

<p>Ez a feladat annak a folytatása. Most az automata rekeszei végesek. Tárold el azt is, hogy melyik bankjegyből 
és érméből épp mennyi van! Írj programot mohó algoritmussal, amelyik úgy ad pénzt, hogy ezt figyelembe veszi!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<img src="bankautomata.svg" class="float" style="width: 9em;">

<p>Ez is egy kiváló példa a <em>struktúra</em> használatára. <em>Összetartozó adat</em> a rekeszben 
található címlet és a hozzá tartozó darabszám, pl. hogy 20000 forintosból 20 darab van. Hogy 
mindkettő egész szám (a forint és a darab), senkit ne tévesszen meg, ez nem tömb! Minden 
rekeszhez egy struktúra tartozik. A rekeszekből viszont <em>sok</em> van, és egyformák: ezért a 
rekeszeknek egy <em>tömbje</em> lesz. A használt adatszerkezet struktúrák tömbje: <code>struct 
Rekesz penzek[]</code>.</p>

<p>A ciklusban először egy osztással kiszámoljuk, hogy mennyi kellene az adott címletből. Utána 
pedig megnézzük, van-e annyi egyáltalán. Ha nincs, akkor csak kevesebbet adunk ki.</p>

<p>A mohó algoritmus amúgy nem tökéletes megoldása a feladatnak. Pl. ha 6000-t kérünk, és van 5000-es és
2000-es, de nincs 1000-es, akkor ki akar adni egy 5000-est, és utána megáll. Nem veszi észre, hogy 3 darab
2000-essel megoldható lenne a kérés. A tökéletes megoldáshoz az ún. visszalépéses keresést kellene alkalmazni,
amelyhez a tudnivalók majd később szerepelnek az előadáson.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    typedef struct Rekesz {
        int ertek;
        int darab;
    } Rekesz;
    Rekesz penzek[]={
        {20000, 20},    /* huszezresbol 20 db */
        {10000, 0},     /* tizezres kifogyott */
        {1000, 10},
        {500, 50},
        {20, 197},
        {10, 123},
        {5, 19},
        {0, 0}          /* nullaval jelzem a tomb veget */
    };

    int mennyit;
    printf("Mennyit kene adni? ");
    scanf("%d", &mennyit);

    printf("Az automata kiadja:\n");
    for (int i = 0; penzek[i].ertek != 0; i++) {
       int hany_db = mennyit/penzek[i].ertek; /* ennyit kene */
       if (penzek[i].darab < hany_db)         /* nincs ennyi? */
           hany_db = penzek[i].darab;         /* jobb hijan... */

       if (hany_db > 0) { /* ha adunk ebbol (mert kell es mert van) */
          printf("%d db %d Ft-os.\n", hany_db, penzek[i].ertek);
          mennyit -= hany_db*penzek[i].ertek;
          penzek[i].darab -= hany_db;   /* innen kivesszuk. */
       }
    }
    if (mennyit != 0)
        printf("Nem tudok rendesen adni! Kene meg: %d Ft\n", mennyit);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>
