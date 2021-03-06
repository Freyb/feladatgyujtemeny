
<?php GyakDia::beginslide("A program kerete"); ?>

<h3>Helló világ</h3>
<p>Készíts programot, mely kiírja a képernyőre azt a szöveget, hogy „Hello World”!</p>

<?php GyakDia::beginslide("Egyszerű beolvasás és kiírás, egész és valós típusok", false, "feladategyszeru"); ?>

<h3>Pénzezés</h3>
<p>Készíts programot, mely bekéri a felhasználótól, hogy a kasszában hány 100, 200 és 500 Ft-os 
található. A program számolja ki, hogy mennyi a beírt pénz összege!</p>

<h3>Celsius–Fahrenheit</h3>
<p>Készíts programot, amely bekér a felhasználótól egy valós számot (Celsius fok), az eredményt 
átváltja Fahrenheit értékbe, és kiírja az eredményt a képernyőre (0°C=32°F, 40°C=104°F, 
lineáris)! Írd meg ugyanezt fordítva is!</p>

<h3>Időtartam</h3>
<p>Készíts programot, mely két időpontot kérdez a felhasználótól (óra, perc, másodperc külön), 
majd kiszámítja a két időpont közötti időtartamot másodpercben, és az eredményt kiírja a 
képernyőre.</p>

<h3>Háromszög</h3>
<p>Készíts programot, mely egy síkbeli háromszög  a.) kerületét, b.) területét, c.) szögeit, d.) 
a három magasság hosszát (ma, mb, mc), képes kiszámítani. A háromszög pontjait (x,y) 
koordinátáival jellemezzük.</p>

<h3>Négyszög</h3>
<p>Készíts programot, melyben a felhasználó megadja egy tetszőleges négyszög csúcsainak 
koordinátáit, A program pedig kiszámítja a négyszög kerületét. Feltételezzük, hogy a bevitt pontok 
által meghatározott szakaszok nem metszik egymást. Számíttasd ki a területet is! (Ehhez Hérón 
képlete használható.)</p>







<?php GyakDia::beginslide("Elágazások", false, 'feladatvezerles'); ?>

<h3 class="clear">Pozitív, negatív, nulla</h3>
<p>Készíts programot, mely a felhasználótól bekért számról megállapítja, hogy az a.) pozitív, 
negatív vagy nulla, b.) egész vagy nem egész. Az eredményt a képernyőre szöveges válasz 
formájában írja ki!</p>




<h3 class="clear">Fizetés</h3>
<p>Készíts programot, mely beolvas a felhasználótól egy fizetést, és a 
fizetés nagyságától függően kiírja, hogy az alacsony, átlagos, vagy magas!
A kategóriákat a saját preferenciád alapján határozhatod meg! :D</p>


<h3>Turi</h3>
<p>Egy turkálóban minden póló darabja 500 Ft. Ha egy vásárlás során valaki több darabot is vesz, a második ára már csak 450 Ft, a 
harmadik pedig 400 Ft, de a negyedik és további darabok is ennyibe kerülnek, tehát az ár a harmadik vásárlása után 
már nem csökken tovább.</p>
<p>Írj programot, amely a vásárolt pólók darabszámának ismeretében megmondja, hogy mennyit fizet a vásárló!</p>


<h3 class="clear">Másodfokú egyenlet</h3>
<p>Írd át úgy a labor másodfokú egyenlet programját, hogy vegye az figyelembe a diszkrimináns 
előjelét, és jelezze külön azt is, ha nincs megoldás, vagy ha pontosan egy valós megoldás van!
Ha tanultál már komplex számokról, oldd meg úgy is a feladatot, hogy komplex gyökök esetén
azokat írja ki a program!</p>




<h3 class="clear">Egyenletrendszer</h3>
<p>Készíts programot, mely képes megoldani az alábbi egyenletrendszert:
<pre>
ax + by = p
cx + dy = q
</pre>
<p> Az adatok: a,c,b,d, p és q. Vizsgálja meg, hogy az egyenletrendszer megoldható-e, illetve 
függetlenek-e az egyeneletek. Ha létezik megoldás, számolja ki x és y értékét!</p>





<?php GyakDia::beginslide("Ciklusok", false, "feladatciklus"); ?>




<h3 class="clear">Négyzetszámok</h3>
<p>Írj programot, amely kiírja az első N darab négyzetszámot! N értékét kérd a felhasználótól!</p>
<p>Írd ki a képernyőre az összes N-nél kisebb négyzetszámot! Vigyázz: ez nem ugyanaz a feladat, mint az előző!</p>





<h3 class="clear">Gömbök</h3>
<p>Készíts programot, mely kiírja az 1 köbméternél kisebb 
térfogatú, 10 cm-ként növekvő sugarú gömbök térfogatait!</p>


<h3 class="clear">Osztók</h3>
<p>Írj C programot, amely bekér egy számot a standard bemeneten, és kiírja az összes
osztóját.</p>



<h3 class="clear">Összes szám</h3>
<p>Írj programot, amely a képernyőre írja a 4, 5 és 6 számjegyekből képezhető összes négyjegyű számot!</p>




<h3 class="clear">Hatványozó program</h3>
<p>Írj programot, amely hatványozni képes! Kérdezze meg az alapot (valós) és a kitevőt (egész), 
és írja képernyőre a hatvány értékét!</p>




<h3 class="clear">Sorozat eleme</h3>
<p>Írj programot, ami ki tudja számolni a következő sorozat n-edik elemét: <code>x<sub>0</sub>=2</code>;
<code>x<sub>i</sub>=2·x<sub>i-1</sub>+5</code>. Az n értékét kérd a felhasználótól! Írd meg úgy
is, hogy csak az n-edik íródik ki a képernyőre, és úgy is, hogy az első n eredmény!</p>




<h3 class="clear">Köbgyök</h3>
<p>Newton módszere a köbgyök számítására azon alapszik, hogy ha van egy tippünk a szám köbgyökére, akkor
<pre style="line-height: 0.7">
szám/tipp<sup>2</sup>+2·tipp
─────────────────
        3
</pre>
<p>jobb közelítés. Írj az előadáson bemutatott „Hérón módszere” programhoz
hasonlót köbgyök számítására!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <math.h>

int main(void) {
    double szam, tipp;

    szam = 512;
    tipp = 1;
    while (fabs(tipp-szam/tipp/tipp) > 0.1)
        tipp = (szam/(tipp*tipp) + 2*tipp)/3;

    printf("%g\n", tipp);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Ferde hajítás I.</h3>

<p>Egy ágyúból kilőtt golyó <code>v<sub>0</sub></code> (m/s) kezdeti sebességgel, <code>alfa</code> (fok)
szöggel indul.</p>

<img src="ferde.svg" style="width: 32em;" class="kozep">

<img src="ferdex.png" class="kozep">
<img src="ferdey.png" class="kozep">

<p>Írj programot, amely bekéri ezeket az adatokat, továbbá egy
<code>t</code> (mp) időpontot. Írja ki, hogy abban a pillanatban épp
hol jár a golyó (<code>x</code> és <code>y</code> koordináta), továbbá hogy milyen messze
van az ágyútól légvonalban!</p>

<p>Ehhez a <code>math.h</code> függvényei, a <code>sin()</code> és a <code>cos()</code>
használhatóak. Vigyázz arra, hogy a szöget ezeknek radiánban kell megadni! 1°=&pi;/180 rad.
g=9,81 m/s<sup>2</sup>.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <math.h>

int main(void) {
    double v0, alfa, t;
    double alfa_rad, x, y, r;

    printf("Ferde hajítás\n");
    printf("v0=");
    scanf("%lf", &v0);
    printf("alfa=");
    scanf("%lf", &alfa);
    printf("t=");
    scanf("%lf", &t);

    alfa_rad = alfa*3.141593/180;
    x = v0*t*cos(alfa_rad);
    y = v0*t*sin(alfa_rad)-9.81/2*t*t;
    r = sqrt(x*x+y*y);

    printf("x=%f\n", x);
    printf("y=%f\n", y);
    printf("r=%f\n", r);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Ferde hajítás II.</h3>

<p>Írd meg most úgy a programot, hogy <code>t=0,0; 0,1; 0,2; … s</code>
időpontokban (tized másodpercenként) írja ki az ágyúgolyó helyét; egészen addig, amíg
be nem csapódik az a földbe (<code>y&le;0</code>)!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <math.h>

int main(void) {
    double t, x, y;
    double v0, alfa, alfa_rad;
    double g = 9.81;
    
    printf("Ferde hajitas\n");
    printf("Add meg a kiloves sebesseget!\n");
    scanf("%lf", &v0);
    printf("Es a kiloves szoget!\n");
    scanf("%lf", &alfa);
    
    /* radianban */
    alfa_rad = alfa*3.1415926535/180;
    
    t = 0;
    x = 0;
    y = 0;
    while (y >= 0) {
        printf("t=%8.4f x=%8.4f y=%8.4f\n", t, x, y);
        
        t = t+0.1;
        x = v0*t*cos(alfa_rad);
        y = v0*t*sin(alfa_rad) - g/2*t*t;
    }
    printf("t=%.4f s-ra mar biztosan becsapodott.\n", t);
    
    return 0;
}
EOT
); ?>

<p>A fenti megoldás betartja a ciklusokkal kapcsolatos, előadáson bemutatott játékszabályt. 
Nevezetesen azt, hogy a ciklustörzs elején szerepel az aktuális elem feldolgozása (jelen esetben 
ez a kiírást jelenti), és a végén a következő elemre lépést (most ez az idő növelése, és 
értelemszerűen a koordináták újraszámolása). Ennek az az előnye, hogy egy már ellenőrzött
<code>y</code> értékkel megyünk be a ciklusba, amelyet külön feltétel nélkül ki is lehet írni!</p>

<p>Mivel így a ciklus feltétele függ az <code>y</code> koordinátától (ez amúgy sem lehet 
másképp, mert a becsapódás időpontját keressük), az első iteráció előtt már ki kell számolnunk 
<code>x</code>-et és <code>y</code>-t. Odamásolhatnánk a ciklus előttre is a ferde hajítás 
képleteit, de <code>t=0</code> miatt azok <code>x=0</code>-ra és <code>y=0</code>-ra 
egyszerűsödnek.</p>

<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Ferde hajítás III.</h3>

<p>Most az ágyúval nem sík terepen lövünk, hanem egy adott magasságú dombra. Alakítsd
át az előző programodat úgy, hogy kérdezze meg az a domb magasságát, aztán addig írja ki
a röppálya adatait, amíg az ágyugolyó a dombba be nem csapódott!</p>

<img src="ferdedomb.svg" style="width: 32em;" class="kozep">











<?php GyakDia::beginslide("Összetett vezérlési szerkezetek", false, "osszetett"); ?>



<h3>Számtani sorozat</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy program bekér a felhasználótól három valós számot, kiírja, hogy az első szám negatív 
vagy nemnegatív, majd az első számtól indulva, a második szám által meghatározott lépésközzel 
halad a harmadik számig, a számsorozat elemeit kiírja.
<br>
Pl. be: 3.2   0.6   5.1   ki: nemnegativ   3.2   3.8   4.4   5.0
<br>
Pl. be: -1.7   1.0   2.5   ki: negativ   -1.7   -0.7   0.3   1.3   2.3
<br>
Feltételezheted, hogy az első szám kisebb, mint a harmadik, és a 
második szám pozitív. Ezek ellenőrzésével nem kell foglalkoznod.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    double a, step, b;
    scanf("%lg%lg%lg", &a, &step, &b);
    if (a < 0)
        printf("negativ ");
    else
        printf("nemnegativ ");
    double i = a;
    while (i <= b) {
        printf("%g, ",i);
        i = i + step;
    }
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Sorozat növekvő lépésekkel</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy program bekér a felhasználótól két pozitív egész számot, és a kisebbiktől a nagyobbikig 
növekvő lépésközzel kiírja a számokat. A lépésköz kezdetben 1, és minden lépésben eggyel nő. A 
program akkor is helyesen működik, ha a felhasználó előbb a felső, aztán az alsó határt adja meg 
(és fordítva is).
<br>
Pl. be: 4   23   ki: 4   5   7   10   14   19
<br>
Pl. be: 23   4   ki: 4   5   7   10   14   19
</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int elso, masodik, also, felso;

    printf("Elso = ");       scanf("%d", &elso);
    printf("Masodik = ");    scanf("%d", &masodik);
    if (elso > masodik) { also = masodik; felso = elso; }
    else {also = elso; felso = masodik; }

    double i = also;
    double step = 1;
    while (i <= felso) {
        printf("%d ", i);
        i = i + step;
        step = step + 1;
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Szögek</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy program bekér a felhasználótól két valós számot, melyek két szöget jelentenek °-ban. A 
program a kisebb szögtől a nagyobbig haladva kiírja a szögeket egy fokonként, és mindegyik szög 
mellett zárójelbe téve radiánban is kiírja a szöget (1°=π/180 rad). A program akkor is helyesen 
működik, ha a felhasználó előbb a nagyobb, aztán a kisebb szöget adja meg (és fordítva is).
<br>
Pl. be: 11.3   14.9   ki: 11.3 (0.197), 12.3 (0.215), 13.3 (0.232), 14.3 (0.249),
<br>
Pl. be: 180   176   ki: 176 (3.07), 177 (3.09), 178 (3.11), 179 (3.12), 180 (3.14),
</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    double also, felso;
    scanf("%lg %lg",&also, &felso);
    if (also>felso) {
        double temp = also;
        also = felso;
        felso = temp;
    }
    
    double i = also;
    while (i <= felso) {
        printf("%g (%g), ", i, i*3.14/180);
        i = i + 1;
    }
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Csökkenő sorozat</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy program bekér a felhasználótól két pozitív valós számot, és a nagyobbiktól induló 
csökkenő számsorozatot ír ki. A csökkenés lépésköze a kisebbik szám. A csökkenés addig tart, 
amíg a kiírandó érték nagyobb, mint a kisebbik szám. A program akkor is helyesen működik, ha a 
felhasználó előbb a nagyobb, aztán a kisebb számot adja meg (és fordítva is).
<br>
Pl. be: 1.1   5.2   ki: 5.2   4.1   3.0   1.9
<br>
Pl. be: 6.3   2.1   ki: 6.3   4.2
</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    double also, felso;
    scanf("%lg %lg", &also, &felso);
    if (also>felso) {
        double temp = also;
        also = felso;
        felso = temp;
    }

    double i = felso;
    while (also<i) {
        printf("%g ", i);
        i = i - also;
    }
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3 class="clear">Szorzótábla fejléccel</h3>
<pre class="screenshot float sorsurit1">
  |  1   2   3   4   5
--+-------------------
 1|  1   2   3   4   5
 2|  2   4   6   8  10
 3|  3   6   9  12  15
 4|  4   8  12  16  20
 5|  5  10  15  20  25
</pre>

<p>Tervezz programot pszeudokóddal, amely kiírja a képernyőre az N×N-es
szorzótáblát, ahol N értékét a felhasználó adhatja meg. Valósítsd meg C nyelven!
Ügyelj arra, hogy a számok állandó oszlopszélességgel jelenjenek meg
(maximum 16×16-as táblát feltételezve), azaz pl. az oldalt látható módon.
(Ez abban nehezebb az előadáson bemutatottnál, hogy a szorzótáblának
kerete is kell legyen.)</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    /* Keret felső része */
    printf("   |");
    for (int y = 1; y <= 16; y = y+1) printf("%3d ",y);
    printf("\n");
    printf("---+");
    for (int y = 1; y <= 16; y = y+1) printf("----");
    printf("\n");

    /* Szorzótábla */
    for (int y = 1; y <= 16; y = y+1) {
        printf("%2d |",y); /* Keret bal oldala */
        for (int x = 1; x <= 16; x = x+1)
            printf("%3d ", x*y); /* Számok */
        printf("\n");
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3 class="clear">Táblázat</h3>

<p>Készíts programot, mely egy n×n-es táblázat formájában kiírja a pozitív 
egész számokat 1-től n<sup>2</sup>-ig. Az n értékét induláskor kérje be a felhasználótól!</p>




<h3 class="clear">Téglalapok</h3>

<pre class="screenshot float sorsurit1">
ooooo ooooo ooooo
ooooo ooooo ooooo

ooooo ooooo ooooo
ooooo ooooo ooooo
</pre>

<p>Készíts programot, mely egy m oszlopból és n sorból álló mátrixot rajzol a képernyőre, melynek minden eleme egy a×b méretű, "o" betűkből álló téglalap. A téglalapok között k szóköz/sortörés távolságot hagyj ki!
Példa: m=3, n=2, a=5, b=2, k=1 értékekre a jobb oldalt látható.




<h3 class="clear">Csúcsán álló háromszög 1.</h3>

<pre class="screenshot float sorsurit1">
ooooo
 ooo
  o
</pre>

<div class="sticky">Kis ZH volt</div>

<p>Írj C programot, amely kér a felhasználótól egy számot, és utána egy akkora, 
csúcsán álló egyenlőszárú háromszöget rajzol a képernyőre "o" betűkből, hogy annak 
éppen a megadott számú sora van! Például 3 esetén:</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int n;
    printf("Emelet=");
    scanf("%d",&n);

    for (int i = 0; i < n; i = i+1) {
        for (int j = 0; j < i; j = j+1)
            printf(" ");
        for (int j = 0; j < 2*(n-i)-1; j = j+1)
            printf("o");
        printf("\n");
    }
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Csúcsán álló háromszög 2.</h3>

<pre class="screenshot float sorsurit1">
  o
 oo
ooo
 oo
  o
</pre>

<div class="sticky">Kis ZH volt</div>

<p>Írj C programot, amely kér a felhasználótól egy számot, és utána egy akkora, 
csúcsán álló egyenlőszárú háromszöget rajzol a képernyőre "o" betűkből, hogy annak 
éppen a megadott számú sora van! Például 3 esetén:</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int n;
    printf("Emelet=");
    scanf("%d",&n);

    for (int i = 0; i < n; i = i+1) {
        for (int j = 0; j < n-i-1; j = j+1) printf(" ");
        for (int j = 0; j <= i; j = j+1) printf("o");
        printf("\n");
    }
    for (int i = 1; i < n; i = i+1) {
        for (int j = 0; j<i; j = j+1) printf(" ");
        for (int j = 0; j<n-i; j = j+1) printf("o");
        printf("\n");
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Paralelogramma</h3>

<pre class="screenshot float sorsurit1">
  ooooooo
 ooooooo
ooooooo
</pre>

<div class="sticky">Kis ZH volt</div>

<p>Írj C programot, amely kér a felhasználótól egy szélességet és egy magasságot, és 
utána egy akkora paralelogrammát rajzol a képernyőre "o" betűkből! Például x=7, y=3 esetén:</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int x, y;

    printf("x="); scanf("%d", &x);
    printf("y="); scanf("%d", &y);

    for (int i = 0; i < y; i = i+1) {
        for (int j = 0; j < y-i-1; j = j+1) printf(" ");
        for (int j = 0; j < x; j = j+1) printf("o");
        printf("\n");
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Még egy háromszög</h3>
<pre class="screenshot float sorsurit1">
ooooo
 oooo
  ooo
   oo
    o
</pre>
<div class="sticky">Kis ZH volt</div>
<p>Írj programot, amely kér egy <code>n</code> egész számot a felhasználótól, és utána „o” 
betűkből egy akkora háromszöget rajzol, amennyi a szám. Pl. <code>n=5</code> esetén az alábbi 
rajz jelenik meg a kimenetén.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int n;
    printf("Haromszog magassaga?\n");
    scanf("%d", &n);

    for (int y=0; y<n; y = y+1) {
        for (int x=0; x<y; x = x+1)
            printf(" ");
        for (int x=y; x<n; x = x+1)
            printf("o");

        printf("\n");
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Háztető</h3>
<pre class="screenshot float sorsurit1">
    ##
   #  #
  #    #
 #      #
#        #
</pre>
<div class="sticky">Kis ZH volt</div>
<p>Írj programot, amely kér egy <code>n</code> egész számot a billentyűzetről, és utána akkora 
„háztetőt” rajzol kettőskereszt karakterekből, amekkora a szám. Pl. <code>n=5</code> esetén az 
alábbi rajz jelenik meg a kimeneten.</p>


<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int n;
    printf("Hazteto magassaga?\n");
    scanf("%d", &n);

    for (int y=0; y<n; y = y+1) {
        for (int x=0; x<n-y-1; x = x+1)
            printf(" ");
        printf("#");
        for (int x=0; x<y*2; x = x+1)
            printf(" ");
        printf("#");
        printf("\n");
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Szakasz</h3>
<pre class="screenshot float sorsurit1">
xxx
   xxx
      xxx
         xxx
            xxx
</pre>
<div class="sticky">Kis ZH volt</div>
<p>Írj programot, amely két számot (<code>m</code> és <code>n</code>) kér a billentyűzetről, és 
egy szakaszt rajzol karakterekből összerakva. A szakasz darabjainak a hosszát az első szám adja 
meg, a sorok számát a második. Pl. <code>m=3</code>, <code>n=5</code> esetén:</p>


<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int m, n;
    printf("Vonal darabok szelessege, osszmagassag?\n");
    scanf("%d %d", &m, &n);

    for (int y=0; y<n; y = y+1) {
        for (int x=0; x<m*y; x = x+1)
            printf(" ");
        for (int x=0; x<m; x = x+1)
            printf("x");
        printf("\n");
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Két szakasz</h3>
<pre class="screenshot float sorsurit1">
#    #
 #    #
  #    #
   #    #
    #    #
</pre>
<div class="sticky">Kis ZH volt</div>
<p>Írj programot, amely beolvas egy egész számot, és egymás mellé rajzol két ferde vonalat, 
karakterekből összerakva. A második vonal teteje egy karakterrel arrébb kezdődik, mint az első 
vége. Pl. ha a megadott <code>n</code> szám <code>5</code>, a kimeneten az alábbi rajz jelenik 
meg.</p>


<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int n;
    printf("Atlos vonal hossza?\n");
    scanf("%d", &n);

    for (int y=0; y<n; y = y+1) {
        for (int x=0; x<y; x = x+1)
            printf(" ");
        printf("#");
        for (int x=0; x<n-1; x = x+1)
            printf(" ");
        printf("#");
        printf("\n");
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3 class="clear">Sakktábla</h3>

<pre class="screenshot float kicsinyit" style="line-height: 0.8;">
XX  XX  XX  XX
XX  XX  XX  XX
  XX  XX  XX  XX
  XX  XX  XX  XX
XX  XX  XX  XX
XX  XX  XX  XX
  XX  XX  XX  XX
  XX  XX  XX  XX
XX  XX  XX  XX
XX  XX  XX  XX
  XX  XX  XX  XX
  XX  XX  XX  XX
XX  XX  XX  XX
XX  XX  XX  XX
  XX  XX  XX  XX
  XX  XX  XX  XX
</pre>

<p>Rajzolj a képernyőre <em>sakktáblát,</em> ahogyan az oldalt látható! Hogyan lehet
ezt a legtöbb ciklussal, a programban szereplő legrövidebb kiírt szövegekkel
megoldani? Vagyis ne szerepeljen a programban ilyesmi:
<?php Highlighter::c(<<<'EOT'
printf("XX  XX  XX  XX  \n");
printf("XX  XX  XX  XX  \n");
EOT
); ?>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    for (int i=1; i<=4; i=i+1) {
        for (int j=1; j<=2; j=j+1) {
            for (int k=1; k<=4; k=k+1)
                printf("XX  ");
            printf("\n");
        }
        for (int j=1; j<=2; j=j+1) {
            for (int k=1; k<=4; k=k+1)
                printf("  XX");
            printf("\n");
        }
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3 class="clear">Adott méretű négyzet rajzolása</h3>
<pre class="screenshot float sorsurit1">
+--+
|  |
|  |
+--+
</pre>
<div class="sticky">Kis ZH volt</div>
<p>
Írj C programot, amelyik bekér egy számot, és utána akkora négyzetet rajzol a +, - és | karakterekből,
mint a megadott szám (annyi - és | karakterből áll az oldala). Pl. ha n=2, akkor a jobb oldalt látható
négyzet legyen a kimenet!
</p>
<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int n;
    printf("Mekkora negyzet? ");
    scanf("%d", &n);

    /* elso sor: +----+ */
    printf("+");
    for (int x=0; x<n; ++x)
        printf("-");
    printf("+\n");

    /* kozepso sorok: |    |   mint az elso,
       csak a karakterek masok. */
    for (int y=0; y<n; ++y) {
        printf("|");
        for (int x=0; x<n; ++x)
            printf(" ");
        printf("|\n");
    }

    /* utolso sor: +----+  ugyanaz, mint az elso. */
    printf("+");
    for (int x=0; x<n; ++x)
        printf("-");
    printf("+\n");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3 class="clear">Tetszőleges méretű sakktábla</h3>
<pre class="screenshot float sorsurit1">
n=1   **..      n=2 **..**..
      **..          **..**..
      ..**          ..**..**
      ..**          ..**..**
                    **..**..
                    **..**..
                    ..**..**
                    ..**..**
</pre>
<div class="sticky">Kis ZH volt</div>
<p>Írj C programot, amelyik egy egész számot kér, utána pedig . és * karakterekből adott méretű 
sakktáblát rajzol. Pl. n=1 és n=2 esetén a jobb oldalt látható eredmények.</p>


<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int n;
    printf("Mekkora sakktabla? ");
    scanf("%d", &n);

    /* ennyi darab dupla*dupla sor van */
    for (int sor=0; sor<n; sor++) {
        /* paros (duplan) */
        for (int y=0; y<2; y++) {
            for (int x=0; x<n; x++)
                printf("**..");
            printf("\n");
        }
        /* paratlan (duplan) */
        for (int y=0; y<2; y++) {
            for (int x=0; x<n; x++)
                printf("..**");
            printf("\n");
        }
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3 class="clear">Derékszögű háromszög</h3>
<pre class="screenshot float sorsurit1">
  /|
 / |
/  |
---+
</pre>
<div class="sticky">Kis ZH volt</div>
<p>Írj C programot, amelyik egy számot kér, és a |, +, - és / karakterekből derékszögű 
háromszöget rajzol, a megadott méretű (annyi karakterből álló) oldalakkal. n=3 esetén pl.:</p>


<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int n;
    printf("Mekkora haromszog? ");
    scanf("%d", &n);

    /* ezt a feladatot egy kicsit maskepp csinaltam meg,
     * mint a tobbit. itt a haromszoget befoglalo negyzet
     * teljes teruletere csinalok egy x*y for ciklust
     * (kiveve a befogoit es a sarkot), es abbol egy
     * feltetellel valasztom ki az atlot. ez nem
     * feltetlenul jobb megoldas, sot bizonyos szempontbol
     * furcsa, hiszen olyan esemenyt valasztunk ki az if
     * segitsegevel, amirol tudjuk, mikor fog bekovetkezni. */
    for (int y=0; y<n; y++) {
        for (int x=0; x<n; x++)
            if (x==n-y-1)
                printf("/");
            else
                printf(" ");
        printf("|\n");
    }
    /* also sor */
    for (int x=0; x<n; x++)
        printf("-");
    printf("+\n");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3 class="clear">Gyémánt</h3>
<pre class="screenshot float sorsurit1">
 /\
/  \
\  /
 \/
</pre>
<div class="sticky">Kis ZH volt</div>
<p>
Írj C programot, amelyik egy számot kér (n), és n hosszú oldalú „gyémántot” rajzol a képernyőre a / és \ karakterekből.
n=2 esetén így néz ki a kimenet:
</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int n;
    printf("Mekkora gyemant? ");
    scanf("%d", &n);

    /* teteje - kivalasztos logikaval */
    for (int y=0; y<n; y++) {
        /* bal felso / */
        for (int x=0; x<n; x++)
            if (x==n-y-1) printf("/"); else printf(" ");
        /* jobb felso \ */
        for (int x=0; x<n; x++)
            if (x==y) printf("\\"); else printf(" ");
        printf("\n");

    }
    /* alja - kivalasztos logikaval */
    for (int y=0; y<n; y++) {
        /* bal also \ */
        for (int x=0; x<n; x++)
            if (x==y) printf("\\"); else printf(" ");
        /* jobb also / */
        for (int x=0; x<n; x++)
            if (x==n-y-1) printf("/"); else printf(" ");
        printf("\n");

    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3 class="clear">Buszjegyek</h3>
<p>Helyettesítsük az 1-9 számjegyekkel az autóbuszjegyen található 
lyukasztási helyeket! Írj programot, amely kiírja az összes olyan 
buszjegy "kódját", amely három helyen van kilyukasztva! Törekedj a 
képernyő minél jobb kihasználására!</p>




<h3 class="clear">A/0 papír</h3>
<img class="float" src="a0papir.svg" style="width: 10em;">
<p>
Egy A/0-s, poszter méretű lap területe 1 m<sup>2</sup>; a szélessége a magasság √<span class="felulhuzott">2</span>-ed része.
Az A/1-es lap ebből úgy keletkezik, hogy a
rövidebb oldalával párhuzamosan középen kettévágjuk (vagyis a hosszabbat felezzük). Az A/2-es az A/1-eshez viszonyul ugyanígy stb.
Írj programot, amelyik kiszámolja és kilistázza ezeket a papírméreteket A/0-tól A/6-ig! A program az összeset álló változatban
írja ki, ne fekvő tájolással! Pl. az A4-es állóban: 210×297&nbsp;mm.
<br>
(A matek: mekkora ez alapján egy A/0-s lap? Legyen h a lap magassága, w pedig a
szélessége! Tudjuk, hogy T=w·h, és azt is, hogy w=h/√<span class="felulhuzott">2</span>. Ebből T=h·h/√<span class="felulhuzott">2</span>,
amibe az 1 m<sup>2</sup>-t is behelyettesíthetjük. 1=h·h/√<span class="felulhuzott">2</span>,
√<span class="felulhuzott">2</span>=h·h, h=√<span class="felulhuzott">√2</span>. A szélessége pedig w=1 m<sup>2</sup>/h.)

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <math.h>

int main(void) {
    /* Változók */
    int a;  /* Papír méret: A0-A6 */
    double a_old,b_old,rovid,hosszu;  /* Oldalak */

    a=0;  /* A méretezés A0-tól indul */
    a_old = sqrt(sqrt(2));  /* A0-s papír egyik oldala */
    b_old = 1/a_old;        /* A0-s papír másik oldala */

    /* Ciklus A0-tól A6-ig */
    while (a<=6) {
        /* Megnézzük melyik a rövidebb és melyik a hosszabb oldal */
        if (a_old<b_old){
            rovid=a_old;
            hosszu=b_old;
        }
        else {
            rovid=b_old;
            hosszu=a_old;
        }
        /* Kiírjuk a-t, a rövidebb és a hosszabb oldalt */
        /* 1000-el szorozva, hogy milliméter legyen az egység */
        printf("A%d papir: %fmm x %fmm\n",a,rovid*1000,hosszu*1000);

        /* A nagyobbik oldalt felezzük */
        a_old = hosszu/2;
        b_old = rovid;
        /* Következő méret */
        a=a+1;
    }

    return 0;
}

EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>







<h3>Négyzet (téglalap) rajzolása</h3>

<pre class="screenshot float sorsurit1">
******   ******
******   *    *
******   *    *
******   *    *
******   *    *
******   ******
</pre>

<pre class="screenshot float sorsurit1">
******
**   *
* *  *
*  * *
*   **
******
</pre>

<p>Írj programot, amely bekér a felhasználótól egy pozitív egész számot, és
kirajzol egy ekkora, * karakterekből álló, teljesen kitöltött négyzetet a képernyőre!</p>

<p><em>Keret.</em> Oldd meg a feladatot úgy is, hogy csak a négyzet kerete álljon
csillagokból, a belseje legyen üres! Erre két logikus megoldás is
van: külön programrészben is megrajzolhatod a keretet, de csinálhatod azt is, hogy
az n×n-es ciklus belsejében figyeled egy feltétellel, a négyzet belsejében vagy-e,
vagy a kereten.</p>

<p><em>Átló.</em> Alakítsd át a programot úgy, hogy a négyzet átlóját is behúzza! Az előző
két átalakítási lehetőség közül ehhez melyiket érdemes választani? Hogyan
lehetne ezt a programot megírni úgy, hogy ne használjon elágazásokat, csak
ciklust? És hogyan úgy, hogy lényegében két egymásba ágyazott ciklust tartalmaz
(y és benne x), amelyeken belül pedig tetszőleges kód lehet?</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int n;
    printf("Mekkora legyen a negyzet? ");
    scanf("%d",&n);  /* Beolvasás */

    /* Teli négyzet */
    for (int i = 0; i<n; i=i+1) {
        for (int j = 0; j<n; j=j+1) printf("*");  /* n db csillag */
        printf("\n");  /* Új sor */
    }
    printf("\n\n\n");  /* Pár üres sor */

    /* Üres négyzet */
    for (int i = 0; i<n; i=i+1) {
        for (int j = 0; j<n; j=j+1) {
            /* Széleken csillag */
            if (i==0 || i==n-1 || j==0 || j==n-1) printf("*");
            else printf(" ");  /* Különben szóköz */
        }
        printf("\n");  /* Új sor */
    }
    printf("\n\n\n");  /* Pár üres sor */

    /* Átlós négyzet */
    for (int i = 0; i < n; i=i+1) {
        for (int j = 0; j < n; j=j+1) {
            /* Széleken és átlóban csillag */
            if (i==0 || i==n-1 || j==0 || j==n-1 || i==j) printf("*");
            else printf(" ");  /* Különben szóköz */
        }
        printf("\n");  /* Új sor */
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>








<h3 class="clear">Láda</h3>
<pre class="screenshot float sorsurit1">
+---+
|\  |
| \ |
|  \|
+---+
</pre>

<p>Írj programot, amely +, |, -, és \ karakterekből egy,
a felhasználó által adott méretű <em>ládát</em> rajzol!
Figyelj a visszaper karakter kirajzolására: azt
<code>"\\"</code> formában kell megadni. Ez a feladat megoldható
kizárólag ciklusok alkalmazásával: próbáld meg így! Hova hány
darab szóköz kell?</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   /* Méret beolvasása */
   int meret;
   printf("Mekkora legyen? ");
   scanf("%d", &meret);

   /* Felső oldal és sarkok */
   printf("+");
   for (int x=2; x<meret; x = x+1) printf("-");
   printf("+\n");

   /* Függőleges oldalak és a láda belseje */
   for (int y=2; y<meret; y = y+1) {
      printf("|"); /* Bal oldal */

      /* Szóközök, átló, majd ismét szóközök */
      for (int x=2; x<y; x = x+1) printf(" ");
      printf("\\");
      for (int x=y+1; x<meret; x = x+1) printf(" ");

      printf("|\n"); /* Jobb oldal és újsor */
   }

   /* Alsó oldal és sarkok */
   printf("+");
   for (int x=2; x<meret; x = x+1) printf("-");
   printf("+\n");

   return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>










<h3 class="clear">Szinusz</h3>
<pre class="screenshot float" style="line-height: 0.8">
               X
                     X
                         X
                            X
                              X
                              X
                            X
                         X
                     X
               X
          X
      X
   X
 X
 X
   X
      X
          X
               X
</pre>

<p>Rajzold ki programból a szinusz függvényt, 90 fokkal elforgatva és
<code>X</code>-ekből kirakva! A mintát lásd a jobb oldalon.
Ehhez a <code>math.h</code> függvénye, a <code>sin()</code> használható.
Figyelj arra, hogy ez a paraméterét radiánban várja, vagyis
1°=π/180 rad.</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Mindegyik sorban ki kell írnunk valahány szóközt, és utána egy <code>X</code>-et.
Hány sor van összesen? Mitől függ az, hogy hány szóközt kell tenni?
Először írj erre képletet! Gondold végig, a feladat megoldásában melyik
változó lehet egész, és melyiknek kell valósnak lennie!</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>Szóközök száma:
A <code>sin(fok)</code> nyilván nem jó, mert a sin radiánban várja a paramétert,
ezért át kell váltani: <code>sin(fok*3.1416/180)</code>.
Ez viszont még mindig nem jó, mert a <code>sin()</code> &minus;1 és +1 közötti számot ad vissza,
azaz vagy 0 vagy 1 szóközt írnánk ki.
Ha ezt megszorozzuk 10-el, akkor az eredmény &minus;10 és +10 közötti lesz.
Ha viszont még 10-et hozzáadunk, akkor a szóközök száma 0 és 20 között lesz,
ami a várt ábrát adja.
</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <math.h>  /* Kell a szinusz miatt */

int main(void) {
    /* A fok változó 0-tól 360-ig megy 20-asával lépkedve */
    for (int fok=0; fok<=360; fok=fok+20) {
        int szokoz = (10+10*sin(fok*3.1416/180));
        /* Kiírjuk a szóközöket */
        int i;
        for (i = 0; i<szokoz; i=i+1)
            printf(" ");
        /* Írok egy x-et */
        printf("X\n");
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





