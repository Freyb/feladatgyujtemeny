

<?php GyakDia::beginslide("Boole-algebra"); ?>

<h3>Szendvicsek</h3>
<p>Egy büfében az alábbi szabályokat használják a jó szendvicsek készítéséhez:</p>
<ol>
    <li>Egy szendvicsben legyen legalább egy fajta hús,
    <li>Egy szendvicsben legyen marha vagy sonka, de együtt ne,
    <li>Ha a szendvicsben van pulykahús, akkor legyen benne sajt is.
</ol>

<p>Írj C logikai kifejezést, amely a jó szendvicseknél értékelődik ki igaz 
értékre, amúgy pedig hamisra! A változók: <code>sajt</code>, ha van benne sajt, 
<code>pulyka</code>, ha van benne pulyka, <code>marha</code> és <code>sonka</code>.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Az egyes szabályok megfelelői:</p>
<ol>
    <li><code>marha || sonka || pulyka</code>,
    <li><code>(marha &amp;&amp; !sonka) || (!marha &amp;&amp; sonka)</code>,
        ami egyébként <code>marha &oplus; sonka</code> XOR kapcsolatnak felel meg,
    <li><code>!pulyka || sajt</code>,
        mert ha nincs benne <code>pulyka</code>, akkor mindegy, van-e sajt,
        viszont ha van benne <code>pulyka</code> (tehát <code>!pulyka</code> hamis), akkor muszáj lennie
        benne sajtnak.
</ol>
<p>Tehát a végleges szabály:<br>
<code>(marha || sonka || pulyka) &amp;&amp; ((marha &amp;&amp; !sonka) || (!marha &amp;&amp; sonka)) &amp;&amp; (!pulyka || sajt)</code></p>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Almás pite</h3>
<p>Egy almás pite receptben az alábbi útmutatásokat találjuk:</p>
<ol>
    <li>Ne használjunk egyszerre szegfűborsot és szerecsendiót,
    <li>akkor és csak akkor használjunk szerecsendiót, ha a pitébe tettünk fahéjat.
</ol>
<p>Írj fel egy C logikai kifejezést a <code>szegfubors</code>, <code>szerecsendio</code>
és <code>fahej</code> változókkal, amely akkor értékelődik ki igazra, ha a recept
utasításait a készítő betartotta!</p>
<p>Töltsd ki egy igazságtáblát is, amely külön mutatja, hogy az első, illetve a második
útmutatás teljesül-e egy adott fűszerkombinációra! Ellenőrizd a tábla alapján a kifejezéseid!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Az egyes szabályok:</p>
<ol>
    <li><code>!(szegfubors &amp;&amp; szerecsendio)</code>,
        ez épp akkor lesz hamis, ha mindkét változó igaz (ha egyszerre használnánk őket),
    <li><code>(szerecsendio &amp;&amp; fahej) || (!szerecsendio &amp;&amp; !fahej)</code>,
        mert az is jó, ha mindkettő van, és az is, ha egyik sem: „akkor és csak akkor”.
</ol>
<p>A végleges szabály:<br>
<code>!(szegfubors &amp;&amp; szerecsendio) && ((szerecsendio &amp;&amp; fahej) || (!szerecsendio &amp;&amp; !fahej))</code>
</p>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Pizzák</h3>
<img src="pizza.svg" class="float" style="width: 12em;">
<p>Alex, Beth és Chris szeretnének egy óriáspizzát rendelni, méghozzá olyat, amelyből mind a hárman
szívesen esznek. Ezeket a kijelentéseket tehetjük:</p>
<ul>
    <li>Alex az olivabogyós pizzát csak akkor eszi meg, ha pepperoni is van rajta,
    <li>Beth viszont a pepperonis pizzát csak sonka nélkül eszi meg,
    <li>Chris pedig csak olyan pizzát hajlandó enni, amin pontosan kétféle feltét van.
</ul>

<p>Használd a következő változókat: <code>p</code> IGAZ értékű, ha a pizzán van
pepperoni, <code>s</code> akkor IGAZ, ha van rajta sonka és <code>o</code> akkor IGAZ, ha van rajta
olivabogyó! Írj egy C logikai kifejezést, amely akkor és csak akkor igaz, ha a pizza mindhármuk
számára megfelelő! Rajzold fel az igazságtáblát, amely külön mutatja mindhármuk preferenciáit,
és egy oszlopban azt is, hogy az adott pizza megfelelő-e! Meg tudnak egyezni? Lehet egyszerűsíteni
a felírt képletet?</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Alex: <code>(!o &amp;&amp; !p) || (o &amp;&amp; p)</code>,<br>
Beth: <code>p &amp;&amp; !s</code>,<br>
Chris: <code>(p &amp;&amp; s &amp;&amp; !o) || (p &amp;&amp; !s &amp;&amp; o) || (!p &amp;&amp; s &amp;&amp; o)</code>.<br>
Kombinálva: <code>((!o &amp;&amp; !p) || (o &amp;&amp; p)) &amp;&amp; (p &amp;&amp; !s) &amp;&amp;
((p &amp;&amp; s &amp;&amp; !o) || (p &amp;&amp; !s &amp;&amp; o) || (!p &amp;&amp; s &amp;&amp; o))</code>.<br>
Egyszerűsítve (az igazságtábla alapján is ellenőrizhető): <code>p &amp;&amp; !s &amp;&amp; o</code>.</p>
<table>
    <thead>
        <tr><th>p<th>s<th>o<th>Alex<th>Beth<th>Chris<th>mindenki
    </thead>
    <tr><th>0<th>0<th>0<td>1<td>0<td>0<td>0
    <tr><th>0<th>0<th>1<td>0<td>0<td>0<td>0
    <tr><th>0<th>1<th>0<td>1<td>0<td>0<td>0
    <tr><th>0<th>1<th>1<td>0<td>0<td>1<td>0
    <tr><th>1<th>0<th>0<td>0<td>1<td>0<td>0
    <tr><th>1<th>0<th>1<td>1<td>1<td>1<td>1
    <tr><th>1<th>1<th>0<td>0<td>0<td>1<td>0
    <tr><th>1<th>1<th>1<td>1<td>0<td>0<td>0
</table>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Büfé</h3>
<p>Egy büfé négy törzsvásárlója az alábbi fajta szendvicseket szereti:</p>
<ul>
    <li>Az 1. vásárló olyan szendvicset szeret, amiben bacon magában van.
    <li>A 2. vásárló szerint a paradicsomos szendvics csak akkor jó, ha van benne salátalevél is.
    <li>A 3. vásárló nem szereti, ha bacon és salátalevél is van egyszerre a szendvicsben.
    <li>A 4. vásárló csak az olyan szendvicset (v)eszi meg, amiben se paradicsom, se salátalevél nincsen.
</ul>

<p>Írj fel mind a négy vásárlóhoz egy-egy logikai kifejezést, amelyek akkor és 
csak akkor igazak, ha egy adott típusú szendvics megfelelő nekik!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A preferenciák logikai kifejezéssel:</p>
<ul>
    <li>1. vásárló: <code>bacon &amp;&amp; !salata &amp;&amp; !paradicsom</code>,
        mert nem elég csak azt mondani, hogy legyen benne <code>bacon</code>,
         azt is kell mondani, hogy a másik két összetevő nincs.
        
    <li>2. vásárló: <code>!paradicsom || salata</code>,
        mert ha van <code>paradicsom</code>, a kifejezés első fele hamis lesz, ilyenkor a második
        fele: <code>salata</code> muszáj igaz legyen, hogy az egész igaz tudjon lenni;
        ha pedig nincs <code>paradicsom</code>, az első fele mindenképp igaz, tehát lehet benne
        <code>salata</code>, de az se baj, ha nincs.
    <li>3. vásárló: <code>!(bacon &amp;&amp; salata)</code>,
        mert ha mindkettő van, a belső részkifejezés igaz lesz, és pont azt nem szereti, tehát tagadjuk.
    <li>4. vásárló: <code>!paradicsom &amp;&amp; !salata</code>, mert egyik sem teljesülhet.
</ul>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Wason feladatai</h3>
<div class="kartyak float">
    <span>○</span>
    <span>6</span>
    <span>□</span>
    <span>3</span>
</div>
<p><em>1. feladat. </em>Tegyük fel, hogy vannak kártyáink, amelyeknek egyik oldalán egy alakzat van, másikon pedig egy szám.
Adott egy szabály:</p>
<p class="bentebb">Ha egy kártyának négyzet van az egyik oldalán, páratlan szám kell legyen a másik oldalán.</p>
<p>Ezek állítólag érvényesek az oldalt látható kártyákra. Melyeket kell 
megfordítani ahhoz, hogy ellenőrizzük a szabályt? Ha a <code>negyzet</code> változó és a <code>paros</code>
változó igaz/hamis értékeket tárolnak, amelyek azt mutatják, egy adott kártyán négyzet, illetve páros
szám van-e, akkor mi az a logikai kifejezés, amely igazra értékelődik ki, ha egy kártya megfelel
a szabálynak?</p>

<?php GyakHTML::add_extra_style(<<<'EOT'
div.kartyak span {
    font-size: 3em;
    background: #fff;
    border: 2px solid #000;
    border-radius: 0.3em;
    padding: 0 0.25em;
    box-shadow: 1px 1px 3px #888;
}
EOT
); ?>

<p><em>2. feladat. </em>Egy országban legalább 18 évesnek kell lennie valakinek ahhoz,
hogy sört ihasson. Egy rendőr az alábbiakat tudja egy bár négy különböző vendégéről:</p>
<ul>
    <li>Sört iszik.
    <li>Kólát iszik.
    <li>25 éves.
    <li>16 éves.
</ul>
<p>Melyikükről kell több információt szereznie, hogy tudja, betartja-e a törvényt?</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p><em>1. feladat.</em> Meg kell fordítani a négyzetest, mert ha nem páratlan számot találunk a másik oldalán, akkor az
megsérti a szabályt. Meg kell fordítani a hatost is, mert ha négyzet van a másik oldalán, a páros
számával sérti a szabályt. A logikai kifejezés pedig <code>!negyzet || paros</code>.</p>
<p><em>2. feladat.</em> A sört ivóról és a 16 évesről.</p>
<ul>
    <li>A sört ivóról tudnia kell, elmúlt-e 18.
    <li>Aki kólát iszik, bárhány éves lehet, nem szegi meg a tilalmat.
    <li>Aki 25 éves, bármit ihat.
    <li>Aki 16 éves, nem ihat sört – róla tudnia kell, mit iszik.
</ul>
<p>A két feladat matematikailag tökéletesen egyforma. Egyformák lettek a megoldásaid is?</p>
<?php GyakDiaElemek::megoldaseddig(); ?>




<?php GyakDia::beginslide("Logikai kifejezések, karakterek a programokban"); ?>

<h3>Osztható-e</h3>
<p>Készíts programot, mely a felhasználótól bekért két számról megállapítja, hogy oszthatók-e egymással!</p>

<h3>Háromszög</h3>
<p>Készíts programot, amely a felhasználó által megadott a, b és c háromszög oldalhosszúságok ismeretében
a.) eldönti, hogy létezik-e a háromszög,
b.) meghatározza, hogy ha létezik a háromszög, az derékszögű, hegyesszögű vagy tompaszögű.
(A Pitagorasz-tétel alapján ez eldönthető.)</p>

<h3>Kisebb, nagyobb, egyenlő</h3>
<p>Készíts programot, mely három változó (a,b,c) értékét a felhasználótól megkérdezi, majd a 
számok közötti relációt kiírja a képernyőre. Természetesen előfordulhat egyenlőség is. 
Lehetséges példák eredményre: "b&lt;c&lt;a", "c&lt;a=b", "a=b=c", stb.</p>

<h3>Karakter típusa</h3>
<p>Készíts programot, mely beolvas egy karaktert, és megállapítja róla, hogy az nagybetű, 
kisbetű, szám vagy egyéb karakter!</p>

<h3>A Caesar-féle kódolás</h3>
<p>Készíts egy programot, amelyik egy beírt szöveget titkosít. A titkosítás egyszerű: minden 
betű helyett az ábécében következőt használjuk, z helyett pedig a-t.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    char c;

    /* egyesevel a karakterek */
    while (scanf("%c", &c)==1) {
        /* ez a ketto specialis, mert "tulpordul" */
        if (c=='z') {
            c = 'a';
        }
        else if (c=='Z') {
            c = 'A';
        }
        else {
            /* tovabbi kodolando betuk: a..z és A..Z. C-ben:
               HA (if) a) a és z kozott van VAGY (||) b) A es Z kozott van */
            if ((c>='a' && c<'z') || (c>='A' && c<'Z'))
                c = c+1;
            /* tobbi valtozatlanul marad. */
        }
        printf("%c", c);
    }
    
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Karaktertábla</h3>

<p>Az előadásanyagban szerepel egy <?php GyakMenuInfo::a_href('eakarakter', "táblázat az ASCII karakterkódokkal"); ?>. A feladat egy olyan programot írni, amely kirajzolja azt, fejlécekkel együtt. (Miért csak 32-től 127-ig kell menni?)</p>

<h3>Madárnyelv: teve tuvudsz ívígy beveszévélnivi?</h3>

<p>Olvass be karakterenként egy szöveget!
Írd ki úgy, hogy minden magánhangzó után a program mondjon egy
v-t is, és ismételje meg a magánhangzót. Pl. te&rarr;te<em>ve</em>, ma&rarr;ma<em>va</em>,
labor&rarr;la<em>va</em>bo<em>vo</em>r. Elég csak az ékezet nélküli kisbetűkkel foglalkozni:
a, e, i, o, u.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    char betu;
    while (scanf("%c", &betu)==1) {
        printf("%c", betu);
        /* Ha magánhangzó */
        if (betu=='a'||betu=='e'||betu=='i'||betu=='o'||betu=='u')
            printf("v%c", betu);  /* Írunk egy v-t és újból a karaktert */
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Dolgozat pontszáma</h3>

<pre class="float">
 0…23 &rarr; 1
24…32 &rarr; 2
33…41 &rarr; 3
42…50 &rarr; 4
51…60 &rarr; 5
</pre>
<p>Írj programot, amely megkérdezi, hány pontot kapott valaki egy dolgozatra. Utána pedig kiírja
az <em>érdemjegyet</em> (elégtelen, elégséges, közepes, jó, jeles) szavakkal a képernyőre! A
pontozási táblázat oldalt látható.</p>

<p class="megjegyzes"><em>Vigyázz:</em> C-ben nem használhatsz <code>0&le;x&le;23</code> formájú kifejezést a
tartomány vizsgálatához!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Sokféle megoldás lehet, hiszen az egyes feltételek megfogalmazhatóak
úgy is, hogy egymást kizárják. Az egyik lehetséges változat, amely
képes az érvénytelen pontszámot is jelezni:</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int pont;
    printf("Hany pontos a dolgozat? ");
    scanf("%d", &pont);

    if (pont>=0 && pont<=23)
        printf("Elegtelen");
    if (pont>=24 && pont<=32)
        printf("Elegseges");
    if (pont>=33 && pont<=41)
        printf("Kozepes");
    if (pont>=42 && pont<=50)
        printf("Jo");
    if (pont>=51 && pont<=60)
        printf("Jeles");
    if (pont<0 || pont>60)      /* itt || kell! */
        printf("Ervenytelen pontszam");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Euler feladata</h3>
<p>Egy gazda sertést, kecskét és juhot vásárolt,
összesen 100 állatot, pontosan 600 aranyért. A sertés darabja 21
arany, a kecskéé 8 arany, a juhoké 3 arany. Hány darabot vett
mindegyik állatból? Oldd meg nyers erővel (azaz a lehetséges
esetek végigpróbálásával) a feladatot!</p>


<h3>Oszthatóság</h3>
<p>Készíts programot, mely meghatározza és kiírja az összes hárommal és öttel egyaránt osztható, 
1000-nél kisebb természetes számot.</p>

<h3>Fizzbuzz 1.</h3>
<div class="sticky">állásinterjú</div>
<p>Írj programot, amely a fizz-buzz játékot játssza! Ez a számokat növekvő sorrendben írja ki; de minden
3-mal osztható helyére azt, hogy „fizz”, az 5-tel oszthatók helyére pedig azt, hogy „buzz”. Ha
mindkét feltétel teljesül, akkor a kiírandó szöveg „fizzbuzz”.</p>
<p>Hogy lehetne megírni ezt a programot röviden, ha a 7-eseknél „banana”, és 11-eseknél „bumm” van a
fentihez hasonló módon?</p>

<h3>Fizzbuzz 2.</h3>
<p>Az előző program kapcsán vizsgálni kellett egy szám 3-mal és 5-tel való oszthatóságát.
Egy szám lehet 3-mal osztható (vagy nem), lehet 5-tel osztható (vagy nem). Ez két, egymástól
független tulajdonság. Mondhatjuk így is: ha egy szám 3-mal osztható, akkor azon belül még lehet
5-tel is osztható, vagy nem. Ha pedig 3-mal nem osztható, akkor azon belül is lehet még 5-tel
osztható, vagy nem.</p>
<p>Írj egy olyan Fizzbuzz programot, amelynek felépítése ezt a logikát követi!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>

int main(void) {
    for (int szam = 1; szam <= 20; szam += 1) {
        bool harommal = szam%3 == 0;
        bool ottel = szam%5 == 0;
        if (harommal) {
            if (ottel)
                printf("fizzbuzz\n");
            else
                printf("fizz\n");
        } else {
            if (ottel)
                printf("buzz\n");
            else
                printf("%d\n", szam);
        }
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Visszafelé</h3>
<p>Készíts programot, mely a felhasználótól beolvasott természetes számot visszafele írja ki. 
Például 651-re a válasz: 156.</p>

<h3>Az ötjegyű számok osztója</h3>
<p>Készíts programot, mely meghatározza az összes olyan legfeljebb 
ötjegyű természetes számot, amelynek első két jegyéből alkotott szám osztója 
az eredeti számnak!</p>


<h3>Gyors hatványozás</h3>
<p>A hatványozás az egyszerű ciklusnál gyorsabban is elvégezhető, mivel az <code>x<sup>8</sup>=x<sup>4</sup>·x<sup>4</sup></code>, <code>x<sup>4</sup>=x<sup>2</sup>·x<sup>2</sup></code> és
<code>x<sup>2</sup>=x·x</code> stb. miatt például a nyolcadikra hatványozáshoz mindössze három szorzásra van szükség.
A következő megfigyelést tehetjük:
<ul>
    <li><code>x<sup>n</sup>=(x<sup>2</sup>)<sup>n/2</sup></code>, ha <code>n</code> páros, és
    <li><code>x<sup>n</sup>=x·x<sup>n-1</sup></code>, ha <code>n</code> páratlan.
</ul>
<p>Írj ciklust, amely a fentiek alapján végzi el a hatványozást!</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Az nem baj, ha az alapot tároló változó értéke elveszik.
Ha a kitevő páros, éppen azt kell négyzetre emelni.</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    for (int i = 0; i < 16; i += 1) {
        double alap = 2;
        double hatvany;
        int kitevo = i;

        hatvany = 1;
        while (kitevo > 0) {
            if (kitevo % 2 == 1) {
                hatvany = hatvany * alap;
                kitevo--;
            } else {
                alap = alap * alap;
                kitevo/=2;
            }
        }

        printf("%g\n", hatvany);
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Legnagyobb közös osztó</h3>
<pre class="float" style="line-height: 1.1">
300│2
150│2
 75│3
 25│5
  5│5
  1│
</pre>

<p>Emlékezz vissza a gyakorlat feladatára, a prímtényezős felbontásra.
Egy adott osztóval addig osztunk, amíg csak lehet; utána a következő osztót próbáljuk.
Mindezt pedig addig folytatjuk, amíg 1-ig el nem érünk, mert az már nem osztható semmivel.</p>

<p>Tervezz programot két pozitív egész <em>legnagyobb közös 
osztójának</em> (LNKO) meghatározására! Gondold végig, hogyan lehet 
a sima prímtényezős felbontásból kiindulni. (Egy tényező akkor 
szerepel a közös osztó felbontásában, ha mindkettő számnak 
tényezője.) A tervezéshez pszeudokódot, folyamatábrát vagy 
struktogramot használj! Valósítsd meg a programot C nyelven!

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int szam1, szam2;
    printf("Egyik szam? ");
    scanf("%d", &szam1);
    printf("Masik szam? ");
    scanf("%d", &szam2);

    int lnko = 1;     /* ez mindennek osztoja :) */
    int oszto = 2;    /* legkisebb szam, amivel osztunk */
    while (szam1 > 1 && szam2 > 1) {
        /* amig mindkettonek osztoja */
        while (szam1%oszto==0 && szam2%oszto==0) {
            /* addig ez tenyezo, felszorozzuk */
            lnko *= oszto;
            szam1 /= oszto;
            szam2 /= oszto;
        }
        /* ha kijottunk a fenti ciklusbol, valamelyiknek
           nem osztoja mar. mindegy, melyiknek; a masikat
           osztogassuk le. a ket ciklus kozul az egyik
           olyan lesz, amibe egyszer sem megy be! */
        while (szam1 % oszto == 0)
            szam1 /= oszto;
        while (szam2 % oszto == 0)
            szam2 /= oszto;

        oszto += 1;
    }

    printf("LNKO: %d\n", lnko);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Legkisebb közös többszörös</h3>

<p>Írd át úgy a fenti programot, hogy a <em>legkisebb közös többszörösét</em> (LKKT) számolja ki a két megadott számnak!
Gondold meg: mikor tényezője a közös többszörösnek egy prímszám?</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    /* a ket szamot kerjuk a felhasznalotol */
    int a, b;
    printf("a="); scanf("%d", &a);
    printf("b="); scanf("%d", &b);

    int oszto = 2;
    int lkkt = 1;
    /* amig valamelyik meg nem egy */
    while (a>1 || b>1) {
        /* ha mindkettonek osztoja, felszorozzuk */
        while (a%oszto==0 && b%oszto==0) {
            lkkt *= oszto;
            a /= oszto;
            b /= oszto;
        }
        /* ha valamelyiknek osztoja, akkor is felszorozzuk */
        while (a%oszto==0) {
            lkkt *= oszto;
            a /= oszto;
        }
        while (b%oszto==0) {
            lkkt *= oszto;
            b /= oszto;
        }
        oszto += 1;
    }

    printf("LKKT: %d\n", lkkt);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Törtek összege</h3>
<p>Készíts programot, amely kiszámolja a/b+c/d (két tört összegét), majd 
az eredményt törzsalakú törté alakítja (amely már nem egyszerűsíthető 
tovább)!</p>

<h3>Láda</h3>
<pre class="screenshot float sorsurit1">
+---+
|\  |
| \ |
|  \|
+---+
</pre>

<p>Írj programot, amely +, |, -, és \ karakterekből egy <em>ládát </em> rajzol! Figyelj a 
visszaper karakter kirajzolására: azt <code>"\\"</code> formában kell megadni. Hogyan lehetne 
ezt megírni két egymásba ágyazott ciklussal és sok elágazással?</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   /* Méret beolvasása */
   int meret;
   printf("Mekkora legyen? ");
   scanf("%d", &meret);

   printf("lada atloval, csak 2 ciklus\n");
   for (int y = 1; y <= meret; y += 1) {
      for (int x = 1; x <= meret; x += 1)
         /* Feltétel a 4 sarokpontra */
         if ((x==1 && (y==1 || y==meret)) || (x==meret && (y==1 || y==meret)))
            printf("+");
         else
            /* Feltétel a vízszintes oldalakra */
            if (y==1 || y==meret)
               printf("-");
            else
               /* Feltétel a függőleges oldalakra */
               if (x==1 || x==meret)
                  printf("|");
               else
                  /* Feltétel az átlóra */
                  if (x==y)
                     printf("\\"); /* A backslash spec. jelentése miatt duplán kell írni */
                  else
                     printf(" ");
      printf("\n");
   }

   return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Lépés a sakktáblán I.</h3>
<p>Használd a sakktáblán a szokásos jelölést; <code>1…8</code> a sorok, <code>a…h</code> az oszlopok jele. Adott
két mező, pl. <code>b7</code> és <code>d6</code>; kérd ezeket a felhasználótól! Mondd meg ezután, ez a <em>lépés
szabályos-e</em> egy király, vezér, futó, bástya vagy huszár számára! (Tegyük fel, hogy nem
áll más figura az útjukban.)

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Amikor karaktert kell beolvasni, a feladattól függően érdemes a <code>scanf()</code>-et 
<code>scanf("%c", &amp;betu)</code> helyett <code>scanf(" %c", &amp;betu)</code> formában használni, 
azaz tenni egy szóközt a <code>%c</code> elé. Ennek hatására a <code>scanf()</code> eldobja a 
kapott szóköz és újsor (enter) karaktereket, és megvárja az első nem szóközt. Erre azért van 
szükség, mert karakterek beolvasásánál alapértelmezés szerint megkapjuk a felhasználó által 
leütött entereket is.</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>
    
<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>

int main(void) {
    /* a két mező koordinátája */
    char o1, s1, o2, s2;

    /* megkérdezzük a felhasználót. */
    /* a scanf-nél a szóközök elnyelik a whitespace karaktereket. */
    printf("Írd be az első mezőt, pl. d6!\n? ");
    scanf(" %c %c", &o1, &s1);
    printf("Írd be a második mezőt, pl. f8!\n? ");
    scanf(" %c %c", &o2, &s2);

    /* a betűkre karakterként (számként) tekintek.
     * mivel ábécé sorban vannak, a számjegyek pedig növekvő
     * sorrendben, ezért kisebb/nagyobb összehasonlítást
     * végezhetek, és kivonhatom őket egymásból. */
    if (o1<'a' || o1>'h' || s1<'0' || s1>'8'
        || o2<'a' || o2>'h' || s2<'0' || s2>'8') {
        printf("Hibás sor- vagy oszlopmegadás!\n");
    } else {
        /* kivételes eset mindegyik figuránál, ha nem
         * lépett sehova (o1==o2 és s1==s2), hiszen az
         * nem is lépés. itt azért szerepel mindegyik
         * kifejezésben, hogy önmagukban is egészt
         * alkossanak. */
        /* a király egyet léphet valamelyik irányba. ez
         * azt jelenti, hogy a sor- és az oszlopugrás
         * távolságának abszolút értéke maximum egy. */
        if (abs(o1-o2)<=1 && abs(s1-s2)<=1 && !(o1==o2 && s1==s2)) {
           printf("Ez szabályos a király számára.\n");
        }
        /* a bástyánál az oszlop- vagy a sor változatlan.
         * de mindkettő nem lehet ugyanaz. */
        if ((o1==o2 || s1==s2) && !(o1==o2 && s1==s2)) {
            printf("Egy bástya léphet így.\n");
        }
        /* a futónál mindkét irányba ugyanannyit kell
         * mozdulni, úgy jön ki az átlós lépés. */
        if (abs(o1-o2)==abs(s1-s2) && !(o1==o2 && s1==s2)) {
            printf("Egy futó számára ez helyes lépés lehet.\n");
        }
        /* a királynő mint a bástya és a futó együtt. */
        if (((o1==o2 || s1==s2) || abs(o1-o2)==abs(s1-s2))
            && !(o1==o2 && s1==s2)) {
            printf("A vezér léphet ilyet.\n");
        }
        /* a huszár nehéznek tűnik, de nem az. az L alak
         * azt jelenti, hogy a vízszintes elmozdulás 1,
         * a függőleges 2, vagy fordítva. */
        if ((abs(o1-o2)==2 && abs(s1-s2)==1)
            || (abs(o1-o2)==1 && abs(s1-s2)==2)) {
            printf("Huszár számára szabályos.\n");
        }
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Lépés a sakktáblán II.</h3>
<p>A feladat mint az előző, de most csak egy mezőt ad a felhasználó (pl. <code>d6</code>).
Listázd ki a programból, melyekre tud lépni szabályosan arról egy király, egy vezér stb.</p>



<h3>Páratlan számok</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy program bekér a felhasználótól két pozitív egész számot, és kiírja a két szám közötti 
összes páratlan számot. A program akkor is helyesen működik, ha a felhasználó előbb a felső, 
aztán az alsó határt adja meg (és fordítva is).</p>
<p>Add meg az algoritmus pszeudokódját, és készítsd el a programot C nyelven! A program 
kötelezően a pszeudokódot valósítsa meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<pre>
Első és második szám bekérése
Ha első > második
    alsó = második, felső = első
Egyébként
    alsó = első, felső = második
A ciklusváltozó legyen alsó
Amíg a ciklusváltozó kisebb vagy egyenlő a felsővel
    Ha a ciklusváltozó páratlan
       Írd ki a ciklusváltozót
    Növeld a ciklusváltozót eggyel
</pre>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int elso, masodik;
    printf("Elso = ");       scanf("%d", &elso);
    printf("Masodik = ");    scanf("%d", &masodik);

    int also, felso;
    if (elso > masodik) { also = masodik; felso = elso; }
    else { also = elso; felso = masodik; }

    for (int i = also; i <= felso; i = i + 1)
        if (i % 2 == 1)
            printf("%d ",i);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Annyi csillag, ahány&hellip;</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy program bekér a felhasználótól két pozitív egész számot, és kiszámítja a két szám közötti 
összes 5-tel osztható páros szám összegét, majd ennyi * karaktert ír a képernyőre. A 
program akkor is helyesen működik, ha a felhasználó előbb a felső, aztán az alsó határt 
adja meg (és fordítva is).</p>
<p>Add meg az algoritmus pszeudokódját, és készítsd el a programot C nyelven! A 
program kötelezően a pszeudokódot valósítsa meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<pre>
Első és második szám bekérése
Ha első > második
    alsó = második, felső = első
Egyébként
    alsó = első, felső = második
Összeg = 0, ciklusváltozó = alsó
Amíg ciklusváltozó kisebb, mint felső
    Ha ciklusváltozó osztható 10-zel
        Összeget növeld ciklusváltozóval
    növeld ciklusváltozót eggyel
Ciklusváltozó = 0
Amíg ciklusváltozó &lt; összeg
    írj ki egy csillagot
    ciklusváltozót növeld eggyel
</pre>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int elso, masodik;
    printf("Elso = ");       scanf("%d", &elso);
    printf("Masodik = ");    scanf("%d", &masodik);

    int also, felso;
    if (elso > masodik) { also = masodik; felso = elso; }
    else { also = elso; felso = masodik; }

    int sum = 0;
    for (int i = also; i <= felso; i += 1)
        if (i % 10 == 0)
            sum += i;

    for (int i = 0; i < sum; i += 1)
        printf("*");

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Hárommal oszthatók, de öttel nem</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy program bekér a felhasználótól két pozitív egész számot, és megszámolja, hogy a két szám 
között hány 3-mal osztható, de 5-tel nem osztható szám áll, végül kiírja a darabszámot. A 
program akkor is helyesen működik, ha a felhasználó előbb a felső, aztán az alsó határt adja meg 
(és fordítva is).</p>
<p>Add meg az algoritmus pszeudokódját, és készítsd el a programot C nyelven! A 
program kötelezően a pszeudokódot valósítsa meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<pre>
Első és második szám bekérése
Ha első > második
    alsó = második, felső = első
Egyébként
    alsó = első, felső = második
Darabszám = 0, ciklusváltozó = alsó
Amíg ciklusváltozó kisebb, mint felső
    Ha alsó osztható hárommal, de nem osztható öttel
        Darabszám növelése eggyel
    Alsó növelése eggyel
</pre>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int elso, masodik;
    printf("Elso = ");       scanf("%d", &elso);
    printf("Masodik = ");    scanf("%d", &masodik);

    int also, felso;
    if (elso > masodik) { also = masodik; felso = elso; }
    else { also = elso; felso = masodik; }

    int darab = 0;
    for (int i = also; i <= felso; i = i + 1)
        if (i%3 == 0 && i%5 != 0)
            darab += 1;

    printf("%d ", darab);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>








<?php GyakDia::beginslide("Sorozatok beolvasása"); ?>

<h3>Számok összege és szorzata</h3>
<p>Írj programot, amely a felhasználótól számokat kér, egészen addig, amíg 0-t nem kap! Írja ki 
ezeknek a számoknak az a) összegét, b) szorzatát.</p>

<p class="megjegyzes">A feladatot meg lehet oldani úgy – és ez a szép megoldás –, hogy a
beolvasott szám nulla, avagy nem nulla voltát csak egyetlen egy helyen kell ellenőrizni. Ha nem
ilyen lett a programod, próbáld meg átalakítani ilyenné!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Ha használtál <code>if()</code>-et, rosszul csinálod – van egyszerűbb megoldás is!</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {

    /* első */
    int szam;
    printf("Szam vagy 0? ");
    scanf("%d", &szam);

    int szorzat = 1;
    while (szam != 0) {
        szorzat *= szam;
        /* többi */
        printf("Szam vagy 0? ");
        scanf("%d", &szam);
    }

    printf("Szorzatuk: %d\n", szorzat);

    return 0;
}

EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Legkisebb, legnagyobb I.</h3>
<p>Készíts programot, mely bekér a felhasználótól egy természetes számot (n). Ezután a 
felhasználótól n darab egész szám megadását kéri, majd kiírja a képernyőre az n megadott szám 
közül a legkisebbet és a legnagyobbat, továbbá a számok átlagát.</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Vegyük észre, hogy ehhez nem kell tömb! Továbbá azt is észre kell venni, hogy az első számot 
némileg speciálisnak kell tekinteni. Fel kell tételezni, hogy az is marad a legkisebb; majd 
később legfeljebb találunk még kisebbet. De az ilyen <code>int&nbsp;min=100000000</code>-szerű 
megoldás elvi hibás!</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>

<h3>Legkisebb, legnagyobb II.</h3>
<p>Készíts programot, amely bekér egész számokat mindaddig, amíg nem 
ad meg 0-t a felhasználó. A program határozza meg és írja ki a 
beadott egész számok közül a legkisebbet és a legnagyobbat, továbbá 
a számok átlagát! (A 0-t ne számítsd bele a beadott számokba, ez 
csak a bevitel végét jelzi. Vigyázz, ez nem ugyanaz a feladat, mint az előző!)</p>

<h3>Tabulátorok</h3>
<p>Írj olyan programot, amely a bemeneten talált tab karakterek mindegyikét annyi ponttal helyettesíti,
amennyi a következő tabulátor pozícióig hátravan! A tabulátor pozíciók legyenek 8 karakterenként.
Például, bemenet (ahol a \t-vel jelzett helyeken a felhasználó a tabulátor billentyűt nyomja meg):
<pre>
\t\tHello,
világ\t!
</pre>
<p>Kimenet:</p>
<pre>
<em>1234567|1234567|1234567</em>
................Hello,
világ...!
</pre>

<h3>Repülés</h3>
<p>Egy repülőgéppel repülünk, és 100 m-ként megmérjük a felszín tengerszint feletti magasságát 
méterben. Készíts programot, mely a billentyűzetről beérkező adatok eltárolása nélkül megállapítja, hogy
<br>
a.) jártunk-e a tenger felett?
<br>
b.) átrepültünk-e sziget felett? Ha igen, hány sziget felett?
<br>
Az első és utolsó mérést szárazföldön végeztük. (Az adatbeolvasás végét a -1 adat bevitele jelezze!)</p>



<?php GyakDia::beginslide("Programozási tételek"); ?>

<h3>Négyzetszám</h3>
<p>Készíts programot, amely egy pozitív egész számról négyzetgyökvonás nélkül eldönti, hogy négyzetszám-e!</p>

<h3>Osztók száma</h3>
<p>Írj programot, ami kiírja egy pozitív, egész szám osztóinak a számát!</p>

<h3>Osztók összege</h3>
<p>Adjuk meg egy felhasználótól kért szám osztóinak összegét! (Pl. 6-hoz: 1+2+3+6 = 12.) Melyik programozási
tételeket kell ehhez kombinálni? Nevezd meg őket! Írd meg a programot úgy is, hogy az osztók összegébe a számot
önmagát nem számítod bele! Hol kell ehhez módosítani a programot?</p>
<p>Tökéletes szám az, amelynél az utóbbi összeg megegyezik magával a számmal (vagyis az osztóinak összege, 1-et
beleértve, de a számot magát nem). A 6 a legkisebb tökéletes szám, mert 1+2+3=6. A következők 28 és 496. Írjuk
ki, hogy a kapott szám tökéletes-e!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>Az osztók összegzéséről egyből eszünkbe juthat az összegzés tétele: ciklus a számokon,
akkumulátor változóban összegzés. Az összeghez azonban nem mindegyik számot kell hozzáadni,
hanem csak az osztókat, vagyis válogatunk közülük. A kiválogatás tétele hasonlít a
számláláshoz: ha egy feltétel teljesül, akkor csinálunk valamit a számmal:</p>

<pre>
CIKLUS AMÍG van még szám, ADDIG
    szám = következő elem
    HA feltétel(szám), AKKOR
       KIÍR: szám
    FELTÉTEL VÉGE
CIKLUS VÉGE
</pre>


<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int szam;
    printf("Szam: ");
    scanf("%d", &szam);

    int osztoosszeg = 0;
    /* oszto>szam/2 mar nincsen (csak sajat maga lenne) */
    for (int oszto = 1; oszto <= szam / 2; oszto += 1)
        if (szam % oszto == 0)
            osztoosszeg += oszto;

    if (osztoosszeg == szam)
        printf("Ez egy tokeletes szam.\n");
    else
        printf("Nem tokeletes szam, %d != %d.\n", szam, osztoosszeg);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Intervallum prímszámai</h3>
<p>Készíts programot, mely a felhasználó által megadott [n,m] 
zárt intervallumban növekvő sorrendben kiírja az összes prímszámot!</p>
<p>Végezz ellenőrzést, hogy a megadott két szám helyes-e: egyik szám 
sem lehet kisebb 2-nél. Ha a felhasználó m-re kisebb számot ad meg, 
mint n-re, akkor a két számot automatikusan cserélje meg!</p>

<h3>Nem prímek</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj C programot, amely kér a felhasználótól egy pozitív egész számot, és utána 
kiírja az összes, ennél a számnál kisebb olyan pozitív egész számot, amely <em>nem</em> prím!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>

int main(void) {
    int n;
    printf("Max = ");
    scanf("%d",&n);

    printf("1\n");
    for (int i = 2; i < n; i += 1) {
        bool prim = true;
        for (int j = 2; j < i; j += 1)
            if (i%j == 0)
                prim = false;
        if (!prim)
            printf("%d\n",i);
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3 class="clear">Sorozat</h3>
<p>Készíts programot, mely bekér egy számot (k), majd kiszámítja az alábbi összeget:
<pre>y=1×2 + 2×3 + 3×4 + ... + k×(k+1)</pre>




<h3>Adott számnál kisebb tökéletes számok</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj C programot, amely kér a felhasználótól egy pozitív egész számot, és kiírja az 
összes, a megadott értéknél kisebb tökéletes számot! Tökéletes az a szám, amely megegyezik 
osztóinak összegével, pl.: 28=1+2+4+7+14.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int n;
    printf("Max=");
    scanf("%d", &n);

    printf("1\n");
    for (int i = 2; i < n; i += 1) {
        int sum = 0;
        for (int j = 1; j < i; j += 1)
            if (i%j == 0)
                sum += j;
        if (sum == i)
            printf("%d\n",i);
    }

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3 class="clear">e: a természetes logaritmus alapszáma I.</h3>
<p>Az e=2,7182818… matematikai konstans előállítható az alábbi képlettel:
<pre style="line-height: 0.7">
    1    1    1    1    1
e = ── + ── + ── + ── + ── + …
    0!   1!   2!   3!   4!
</pre>
<p>Írj programot, amely kiszámolja ezt az első 20 taggal!
A faktoriális nagy szám lehet. Tárold azt <code>double</code>
típusú változóban!</p>
<?php GyakDiaElemek::megoldasettol(); ?>
<p>Tipp: ha ciklusban ciklust alkalmaztál, próbáld meg egyszerűsíteni
a megoldásodat. Elég egyetlen egy ciklus!</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    double e = 0;
    double fact = 1;
    for (int i = 1; i < 20; i = i+1) {
        e += 1/fact;  /* Hozzáadjuk e-hez */
        fact *= i;    /* Faktoriális közben itt keletkezik */
    }

    printf("e = %f",e);  /* Kiírjuk */

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3 class="clear">e: a természetes logaritmus alapszáma II.</h3>

<p>Írj programot, mely kiszámítja az <code>a(n)=(1+1/n)^n</code>
sorozat k-adik elemét. A k változó értékét kérdezd a felhasználótól!
(A hatványozáshoz most ne használd a <code>pow()</code> függvényt.)</p>




<h3 class="clear">A &pi; kiszámítása</h3>
<p>John Wallis, angol matematikus az alábbi képletet adta a &pi;
kiszámítására:
<pre style="line-height: 0.7">
π   2·2   4·4   6·6   8·8
─ = ─── · ─── · ─── · ─── · …
2   1·3   3·5   5·7   7·9
</pre>
<p>Ismerd fel a szabályosságot a sorozatban!
Írj progamot, amelyik kiszámítja a szorzatot az első n tényező
figyelembe vételével! Próbáld ki a programot úgy, hogy a szorzat első 10,
100, 1000 tényezőjét veszed figyelembe!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    double pi = 1;
    for (int i = 2; i<10000; i += 2) /* kettesével */
        pi *= i*i / ((i-1)*(i+1));   /* a képlet */
    pi *= 2;                         /* végén *2, mert pi/2 állt elő */

    printf("%f", pi);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>A Leibniz-féle sor</h3>

<p>Leibniz a lenti összegképletet vezette le a &pi; becslésére.
Minél több tag szerepel az összegben, annál pontosabb az eredmény.
Feladat: írj egy programot úgy, hogy ennek alapján
számolja ki a &pi; közelítő értékét!</p>

<pre class="sorsurit1">
π       1   1   1
─ = 1 - ─ + ─ - ─ + …
4       3   5   7
</pre>


<p>A feladat több buktatót is tartalmaz. Ha nem helyes a program által
kiírt eredmény, használj nyomkövetést, figyeld a változók értékét!</p>


<p class="megjegyzes"><em>Tipp:</em> figyeld meg, hogy az összeadás és a kivonás váltakoznak.
Érdemes kettesével, páronként haladni az összegzésben, mert akkor
a páros/páratlan vizsgálat kimaradhat a programból.</p>
<p class="megjegyzes"><em>Fontos:</em> ehhez át kell térned a programban valós típusú változók használatára,
hiszen az eredmény biztosan nem egész szám. Tudni kell, hogy ha
a C nyelvben elosztasz két egész számot, akkor az eredmény is egész (lefelé
kerekítve). Vagyis <code>1/3</code> értéke C-ben <code>0</code>.
Viszont <code>1.0/3</code> értéke <code>0.333333</code> lesz.
Erről később részletesen lesz szó előadáson is.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    /* Ciklus ami páronként halad, azaz egy */
    /* lépésben hozzáad és ki is von egy számot */
    double pi = 0;
    int i = 1;
    while (i<100000) {
        pi += 1.0/i;  /* Hozzáadjuk a píhez az aktuális szám reciprokát */
        i += 2;       /* Kettővel megnöveljük az aktuális számot */
        pi -= 1.0/i;  /* Levonjuk a szám reciprokát */
        i += 2;       /* Kettővel megnöveljük a számot */
    }

    pi *= 4;  /* A ciklus a pi/4-et közelítette, ezért 4-el szorozni kell */

    printf("%f", pi);  /* Eredmény kiírása */

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Párosak, páratlanok</h3>
<p>Készíts programot, mely bekér N darab természetes számot (először N-et 
kérje be). Az adatok beírása után a program írja ki a beírt páros és páratlan 
számok darabszámát, és a páratlan számok összegét!</p>

<h3>Számjegyek összege</h3>
<p>Készíts programot, mely egy természetes szám számjegyeinek összegét képes meghatározni.</p>

<h3>Pontosan három osztó</h3>
<p>Írj programot, amely kiírja a képernyőre az első öt olyan számot, amelynek pontosan három osztója van!</p>

<h3>Prímszámok</h3>
<p>Kérj a felhasználótól egy <code>n</code> számot. Írd ki az összes olyan <code>(i;j)</code> párt,
amelyre <code>1&lt;i&lt;j&le;n</code>, és igaz az, hogy <code>i+j</code> prím. Pl. <code>n=6</code> esetén <code>2+3=5</code>, <code>3+4=7</code> stb.</p>

<h3>Osztható mind a tízzel</h3>
<p>Melyik a legkisebb olyan szám, amelynek osztója az 1…10 számok mindegyike? (2520.) Határozd ezt meg programból!
Melyik programozási tételt kell ehhez használni?</p>

<h3>3 és 5 többszörösei</h3>
<p>A 3 és 5 számok 10-nél kisebb többszörösei 3, 5, 6 és 9. Ezek összege 23. Mennyi az 1000 alatti
ilyen számok összege? Ehhez melyik tétel szükséges?</p>
   
<h3>Egy kör belső pontjai</h3>
<p>Adott a síkon középpontjának (x,y) koordinátáival és sugarával egy kör. 
Készíts programot, mely megadja a körbe eső egész koordinátájú pontok 
számát!</p>

<h3>Az összeg a maximum nélkül</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy program megkérdezi a felhasználótól, hogy hány darab szám összegét kívánja kiszámolni, 
majd bekér ennyi darab egész számot. Utána kiírja a számok összegét úgy, hogy az 
összegben ne legyen benne a felhasználó által megadott legnagyobb szám. (Az összeg 
így éppen a maximummal kevesebb.) Pl. ha a felhasználó 4 számot ad: -1, 10, 5, 7, 
akkor a kiírt összeg 11 lesz, mert -1+5+7=11.</p>

<p>Add meg az algoritmus pszeudokódját, és készítsd el a programot C nyelven! A 
program kötelezően a pszeudokódot valósítsa meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<pre>
Darabszám bekérése
Összeg = 0
Ciklusváltozó = 0
Amíg ciklusváltozó kisebb, mint a darabszám
    Kérd be a következő számot
    Ha a ciklusváltozó 0, a maximum legyen egyenlő a számmal
    Egyébkén
        Ha a szám nagyobb a maximumnál
            A maximum legyen egyenlő a számmal
    Az összeghez add hozzá a számot
Írd ki az összeg és a maximum különbségét
</pre>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int db;
    printf("Hany db szamot adsz ossze? ");
    scanf("%d", &db);

    int sum = 0;
    int max;
    for (int i = 0; i < db; i = i + 1) {
        int akt;
        printf("A kovetkezo szam: ");
        scanf("%d",&akt);

        if (i == 0) max = akt;
        else if (akt > max) max = akt;

        sum += akt;
    }

    /* a trükk: a teljes összegből levonjuk a legnagyobbat. */
    /* így pont olyan lesz, mintha az kimaradt volna az összegből. */
    printf("Osszeg: %d\n", sum - max);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Adott számnál kisebb legnagyobb prím</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj C programot, amely bekér a felhasználótól egy egész számot, 
és kiírja a számnál kisebb számok közül a legnagyobb prímet, ha van 
ilyen!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A talált prímeket felesleges eltárolni – egy tömb használata
súlyos hiba lenne. Visszafelé kell haladni a kereséssel, és
az első találat éppen a keresett prím.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>

int main(void){
    int szam;
    scanf("%d", &szam);
    if (szam > 2) {
        bool prim = false;
        int proba;
        for (proba = szam-1; proba > 1 && !prim; proba -= 1) {
            prim = true;
            for (int i = 2; i < proba && prim; i += 1)
                if (proba % i == 0)
                    prim = false;
        }
        printf("%d\n", proba + 1);
    }
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>A beírtak közül legnagyobb prím</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj C programot, amely egész számokat kér be a felhasználótól
mindaddig, amíg a felhasználó pozitív számokat ad meg! Ezt követően
írja ki a beolvasott számok közül a legnagyobb prímet (a beolvasott
számok között lehet a legnagyobb prímnél nagyobb összetett szám is,
tehát nem elég a maximumot vizsgálni, a prímséget is kell)!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Súlyos hiba lenne itt a beírt számokat eltárolni. A szélsőérték
kereséséhez felesleges – mindig csak a legutóbbi (legnagyobb) értékre
kell emlékeznie a programnak!</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>

int main(void){
    int szam, max = 0;
    while (scanf("%d", &szam)==1 && szam>0){
        if (szam > max){
            bool prim = true;
            for (int i = 2; i < szam; i += 1)
                if (szam % i == 0)
                    prim = false;
            if (prim)
                max = szam;
        }
    }
    if (max>0)
        printf("Max = %d\n",max);
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Minden prímedik betű</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj C programot, amely karaktereket olvas a szabványos 
bemenetről! A karaktersorozat végét pont (’.’) jelzi. A program írja 
ki azokat a karaktereket, amelyek sorszáma a szövegben egy prímszám 
(tehát a szöveg 2, 3, 5, 7, 11 stb. sorszámú karaktereit)! Pl. be: 
„xEbfeldiszeileg nyilul szorom egy mancsot ez? ma nem.”, ki: 
„Ebedelni mentem”.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Itt is súlyos hiba lenne a szöveget eltárolni. Ahogy jött egy karakter,
el lehet dönteni, ki kell-e írni. A kiírás után nem is kell rá emlékezni.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    char ch;
    int sorszam = 1;
    while (scanf("%c", &ch)==1 && ch!='.') {
        int i;
        for (i = 2; sorszam%i!=0 && i<sorszam; i += 1)
            /*üres*/;
        if (sorszam == i)
            printf("%c", ch);
        sorszam++;
    }
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Osztók összege vajon prím-e?</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj C programot, amely bekér a felhasználótól egy pozitív egész 
számot (nem kell ellenőrizni, feltételezzük, hogy a felhasználó 
valóban pozitív egészt adott meg)! A program számítsa ki a szám 
osztóinak összegét, és írja ki, hogy ez prím-e! Pl. be: 9 ki: 
Osszeg: 13, prím (1+3+9).</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A megtalált osztókat felesleges eltárolni, csak az összegre
vagyunk kíváncsiak. Ezért tömböt használni hiba lenne.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void){
    int szam;
    scanf("%d",&szam);

    /* Osztók sszege */
    int osszeg = 0;
    for (int i = 1; i <= szam; i += 1)
        if (szam % i == 0)
            osszeg += i;

    /* Prím-e */
    int i;
    for (i = 2; i < osszeg && osszeg % i != 0; i += 1)
        ; /* üres */
    if (i == osszeg)
        printf("Osszeg: %d, prim\n", osszeg);
    else
        printf("Osszeg: %d, nem prim\n", osszeg);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>









<?php GyakDia::beginslide("Tömbök", false, "feladattomb"); ?>

<h3>Tömb kiírása – szépen</h3>
<p>Írj programrészt, amely kiírja egy tömb elemeit a képernyőre, vesszővel elválasztva. A kiírás legyen
szép: ne legyen se az elején, se a végén felesleges vessző. A kód is legyen szép: mindez megoldható egyetlen
ciklussal, nem kell hozzá <code>if()</code> feltétel!</p>

<pre class="screenshot">
A tömb: 25, 69, 54, 8, 77, 6, 29, 10, 3, 98.
</pre>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int tomb[10] = { 25, 69, 54, 8, 77, 6, 29, 10, 3, 98 };

    /* Kiírás */
    printf("A tömb:");
    /* első elem */
    printf(" %d", tomb[0]);
    /* többi elem */
    for (int i = 1; i < 10; ++i)
        printf(", %d", tomb[i]);
    printf(".\n");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Szigmon</h3>

<p>Készíts egy olyan C programot, amely létrehoz és a programba beépített kezdeti értékekkel
feltölt egy <code>int</code> típusú elemeket tartalmazó tömböt!
Írja ki, hogy a tömb elemei szigorúan monoton növekvőek, csökkenőek, vagy egyik sem!</p>

<p>Teszteld a programot, hogy mind a három eredményt előállítsd vele! Próbáld ki úgy is,
hogy a csökkenő vagy növekvő monotonitást a tömb első kettő vagy utolsó kettő elemével
rontod el, hogy lásd, a számsor széleit is helyesen kezeled-e!</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Melyik programozási tételt kell alkalmazni ennek megoldásához? Másképp feltéve
a kérdést, mit kell találni a tömbben ahhoz, hogy tudjuk, nem szigmon növekvő?</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>

int main(void) {
    /* Változók */
    int tomb[10] = {1,3,6,9,13,16,19,21,45,56};

    /* Tegyük fel hogy szig.mon.növ. és csökk. */
    bool nov = true, csokk = true;
    /* Ellenőrzés */
    for (int i = 0; i < 10-1; i += 1){
        if (!(tomb[i] < tomb[i+1]))
            nov = false;   /* Nem teljesül a szig.mon.csökk. */
        if (!(tomb[i] > tomb[i+1]))
            csokk = false; /* Nem teljesül a szig.mon.növ. */
    }

    /* Eredmény */
    if (nov)
        printf("szigmon novekvo");
    else
        if (csokk)
            printf("szigmon csokkeno");
        else
            printf("nem szigmon");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Léptetés</h3>
<p>Készíts programot, amely egy v[10] tömb elemeit 3 hellyel 
ciklikusan balra lépteti! A feladat megoldható segédtömb nélkül is!</p>


<h3>Az utolsó öt szám… átlaga</h3>

<p>Írj C programot, amely a felhasználótól számokat kér be. A bevitel
addig tartson, amíg a felhasználó 0-t nem ad meg. Amikor ez megtörtént, a
program írja ki az utoljára bevitt öt szám átlagát! (Tegyük fel,
hogy volt legalább ennyi.)</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>A gondolat, hogy „csinálok egy
egymillió elemű tömböt, abba biztos belefér majd az összes szám”, elvi hibás.
Gondold végig, hogy a feladat megoldásához hány számot kell
mindenképpen eltárolni! Szükség van-e ehhez egyáltalán tömbre? Ha igen,
akkor mekkorára? Kell-e ehhez tologatni az elemeket a tömbön belül?</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   double szamok[5], beolv;

   printf("Szám vagy 0? ");      /* első */
   scanf("%lf", &beolv);
   int i = 0;
   while (beolv != 0) {
      szamok[i] = beolv;
      i = (i+1) % 5;               /* 4 után megint 0 */

      printf("Szám vagy 0? ");     /* következő */
      scanf("%lf", &beolv);
   }

   double szum = 0;
   for (int i = 0; i < 5; i += 1)
      szum += szamok[i];

   printf("Utolsó 5 átlaga: %f\n", szum/5);

   return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>A folyó</h3>

<p>Egy folyó sodrásirányára merőlegesen 2 m-enként megmértük a meder mélységét,
és egy valós tömbben sorfolytonosan eltároltuk. Így az alábbi 18 számot kaptuk:</p>
<blockquote>
0.1, 1, 1.5, 1.7, 2, 2.3, 2.8, 4.5, 9.8, 12, 14.1, 13, 11.9, 8.7, 6.1, 3.5, 1, 0.5
</blockquote>

<img src="folyo.svg" class="kozep" style="width: 32em;">

<p>Készíts programot, mely meghatározza, hogy hol a legmeredekebb a mederfal, és hány a 
százalékos meredeksége! (A százalékos lejtés azt mutatja, hogy egységnyi táv alatt mennyit 
változott a magasság: 10 m távon 5 m különbség 50%-os lejtőt jelent.)</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Melyik programozási tétel kell itt? A meredekségnek
mijét kell meghatározni? Vigyázz, a lejtő és az emelkedő ugyanaz, ha
másik irányból nézzük, és vigyázz, ne indexeld túl a tömböt!</p>
<p>A <code>printf()</code>-nél a <code>%%</code> jelenti a <code>%</code> jel
kiírását.</p><?php GyakDiaElemek::nyithatoeddig(); ?>


<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <math.h>

int main(void) {
    double folyo[18] = { 0.1, 1, 1.5, 1.7, 2, 2.3, 2.8, 4.5, 9.8,
                         12, 14.1, 13, 11.9, 8.7, 6.1, 3.5, 1, 0.5 };

    /* Keresés */
    int max = 0;
    for (int i = 1; i < 18-1; ++i)  /* i+1 indexelés miatt! */
        if (fabs(folyo[i+1] - folyo[i]) > fabs(folyo[max+1] - folyo[max]))
            max = i;

    /* Kiírás */
    printf("A legmeredekebb: max=%d-%d méter között\n", max*2, (max+1)*2);
    printf("A meredekség: %f %%-os\n", fabs(folyo[max+1]-folyo[max])/2*100);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Kisebbek vagy nagyobbak?</h3>
<p>Adott egy m egészekből álló tömb, véletlen értékekkel feltöltve.
Készíts programot, mely a felhasználótól bekért p egész számról 
meghatározza, hogy a tömbben p-nél nagyobb, vagy p-nél kisebb számokból 
van-e több!</p>

<h3>Elemek száma</h3>
<p>Adott egy rendezetlen tömb. Készíts programot, mellyel a felhasználó 
kiválaszhatja a tömb egy elemét és meghatározza a nála kisebb és nagyobb 
elemek számát!</p>

<h3>Éppen a szorzata</h3>
<p>Adott egy egész számokat tartalmazó tömb (m). Készíts programot, mely 
a felhasználótól bekér egy egész számot (z), majd eldönti, hogy van-e két 
olyan elem a halmazban, amelyek szorzata éppen z!</p>

<h3>Ülőhelyek</h3>
<p>Egy 195 fős előadóba előadást szerveznek. A székek 13 sorban, összesen 
15 oszlopban (téglalap) helyezkednek el. A székek számozása a (színpaddal 
szembeni) bal alsó sarokból kezdődik, jobbra növekszik, és a legfelső sorban 
vannak a legnagyobb számú székek.
<p>A jegyirodában egy 195 elemű egész 
tömbben tárolják a már kiadott foglalásokat. A foglalt helyeket a megfelelő 
székszámhoz írt 1-es jelöli, 0 a szabad hely. Készíts programot, mely az 
újonnan érkező vendégek számára a kívánt számú, egymás melletti ülőhelyet 
kikalkulálja! Vigyázz a sorok szélére!</p>

<h3>Autópálya I.</h3>
<div class="sticky">Kis ZH volt</div>
<p>Az M7-es autópályán traffipaxot szerelnek fel, amely a Balaton felé igyekvők
gyorshajtásait rögzíti. A mérés több nap adatait is tartalmazza; egy
autó adatait „óra perc sebesség” formában.
Pl. 12&nbsp;45&nbsp;198 azt jelenti, 12:45-kor 198&nbsp;km/h-val száguldott valaki.
Az adatsor végét 0&nbsp;0&nbsp;0 zárja.</p>
<p>Készíts a C programod egy táblázatot arról, hogy melyik órában mennyivel
ment a leggyorsabb autó! Ha egy adott órában nem volt gyorshajtás, az
maradjon ki! A kimenet ilyen legyen:</p>

<pre class="screenshot">
14:00-14:59 -&gt; 145 km/h
16:00-16:59 -&gt; 167 km/h
</pre>

<p>(Tipp: a sebességek mind pozitív számok.)</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   int seb_max[24] = {0};
   int ora, perc, seb;

   scanf("%d %d %d", &ora, &perc, &seb);
   while (seb != 0) {
      if (seb > seb_max[ora])
         seb_max[ora] = seb;
      scanf("%d %d %d", &ora, &perc, &seb);
   }

   for (int i = 0; i < 24; i += 1)
      if (seb_max[i] > 0)
         printf("%2d:00-%02d:59 -> %d km/h\n", i, i, seb_max[i]);

   return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Autópálya II.</h3>

<div class="sticky">Kis ZH volt</div>

<p>Az M7 autópályán traffipax méri az autók sebességét. Minden mérésről három adatot ad: „óra 
perc sebesség”, szóközzel elválasztva. Pl. „9&nbsp;39&nbsp;125” jelentése az, hogy 9:39-kor egy 
autó 125&nbsp;km/h-val ment. A 140&nbsp;km/h feletti sebességért 30&nbsp;000&nbsp;Ft a bírság, a 
180&nbsp;km/h felettiért 100&nbsp;000&nbsp;Ft. Az adatsor több nap adatait tartalmazza, és a 
végét 0&nbsp;0&nbsp;0 zárja.</p>

<p>Olvassa be a C programod ezeket az adatokat, és írja ki, hogy a nap mely órájában mennyi az 
összes kirótt bírság! Példa kimenet:</p>

<pre class="screenshot">
12:00-12:59, 60000 Ft
13:00-13:59, 230000 Ft
</pre>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   int birsag[24] = {0};

   int ora, perc, seb;
   scanf("%d %d %d", &ora, &perc, &seb);
   while (seb != 0) {
      if (seb > 180)
         birsag[ora] += 100000;
      else if (seb>140)
         birsag[ora] += 30000;

      scanf("%d %d %d", &ora, &perc, &seb);
   }

   for (int i = 0; i < 24; i += 1)
      printf("%2d:00-%02d:59, %d Ft\n", i, i, birsag[i]);

   return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Bliccelés I.</h3>

<div class="sticky">Kis ZH volt</div>

<p>Egy busztársaság kíváncsi az utasok bliccelési szokásaira. Felviszik
számítógépre az összes bírságolás időpontját. Arra kíváncsiak, a napok
fél órás intervallumaiban hány jegy nélkül utazót kaptak el.</p>

<p>Az időpontok „óra perc” formában érkeznek, vagyis szóközzel elválasztva. Így 13&nbsp;44
jelentése délután 13:44. Az adatsort -1 -1 zárja.
Írja ki a C programod, mely fél órás időszakban hány bliccelő volt! Pl.:</p>

<pre class="screenshot">
12:00-12:29 között 3 utas
12:30-12:59 között 5 utas
</pre>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   int blicceles[24*2] = {0};

   int ora, perc;
   scanf("%d %d", &ora, &perc);
   while (ora != -1) {
      i = ora*2;
      if (perc >= 30)
         i += 1;
      blicceles[i] += 1;
      scanf("%d %d", &ora, &perc);
   }

   for (int i = 0; i < 24; i += 1) {
      printf("%2d:00-%02d:29 kozott %d utas\n", i, i, blicceles[i*2]);
      printf("%2d:30-%02d:59 kozott %d utas\n", i, i, blicceles[i*2+1]);
   }

   return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Bliccelés II.</h3>

<div class="sticky">Kis ZH volt</div>

<p>Egy busztársaság szeretné tudni, a napok mely óráiban hány ellenőrt érdemes terepmunkára 
küldenie. Ehhez összesítik a bírságok adatait. Egy adat a következőkből áll: „óra perc típus 
összeg”, ahol a típusnál <code>h</code> a helyszíni bírság, <code>c</code> pedig a csekk. 
„9&nbsp;45&nbsp;c&nbsp;6000” jelentése: egy utas 9:45-kor csekket kapott 6000 forintról. A 
helyszíni bírságokat az ellenőrök begyűjtik; a csekkes bírságoknak átlagosan 80%-át tudják 
behajtani. (Vagyis egy 6000-es csekk a társaság számára átlagosan csak 4800-at ér.) Az adatsor 
végén 0 0 x 0 szerepel.</p>

<p>Olvassa be a C programod ezeket az adatokat! Készíts kimutatást arról, hogy
mely napszakban mennyi a pótdíjakból a bevétel! Példa kimenet:</p>

<pre class="screenshot">
16:00-16:59, 14800 Ft
17:00-17:59, 12000 Ft
</pre>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   int birsag[24] = {0};

   int ora, perc, osszeg;
   char tipus;
   scanf("%d %d %c %d", &ora, &perc, &tipus, &osszeg);
   while (tipus != 'x') {
      if (tipus == 'c')
         osszeg *= 0.8;
      birsag[ora] += osszeg;
      scanf("%d %d %c %d", &ora, &perc, &tipus, &osszeg);
   }

   for (int i = 0; i < 24; i += 1)
      printf("%2d:00-%02d:59, %d Ft\n", i, i, birsag[i]);

   return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Statisztika betűkről</h3>

<pre class="screenshot float">
A: 5 db
B: 3 db
C: 4 db
...
</pre>

<p>Adott a szabványos bemeneten egy szövegünk. Az angol ábécé nagybetűi vannak benne és egyéb karakterek, de kisbetűk nincsenek. 
A feladat készíteni egy statisztikát a betűk előfordulásáról. Melyik betű, hányszor fordult elő?</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Azt kell észrevenni, hogy ez teljesen ugyanaz, mint a <?php GyakMenuInfo::a_href("statisztikaszamokrol", "statisztika számokról " /* szándékos space */); ?>
feladat. Csak most nem az 1...10 számokat, hanem az 'A'...'Z' betűket kell megszámolni. Más
a tömb mérete, és más a leképezés – amúgy a program felépítése változatlan.</p>
<p>A tömb méretét könnyű meghatároznunk: <code>'Z'-'A'+1</code>, az ábécé elejének és végének
távolsága, <code>+1</code>, hogy beleszámoljuk mindkét végét.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int t['Z'-'A'+1];

    for (char i = 'A'; i <= 'Z'; i += 1)       /* nullazas */
        t[i-'A'] = 0;

    /* amig sikerul betut beolvasni */
    char cbe;
    while (scanf("%c", &cbe) == 1) {           /* feldolgozas */
        if (cbe >= 'A' && cbe <= 'Z')
            t[cbe-'A'] += 1;
    }

    for (char i = 'A'; i <= 'Z'; i += 1)       /* kiiras */
        printf("%c: %d\n", i, t[i-'A']);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>








<h3>ZH statisztika I.</h3>

<div class="sticky">Kis ZH volt</div>

<p>Egy oktató statisztikát szeretne készíteni a megíratott ZH-k sikerességéről.
A ZH-n 4 csoport volt (A…D). Mindegyikben három feladat, ezek
pontszáma egész szám, egyenként maximum 10 pont, így a ZH-k
maximum 30 pontosak lehetnek. A ZH akkor sikeres, ha a feladatok külön-külön
legalább 2 pontosak, és a ZH legalább 12 pontos.</p>

<p>Írj programot, mely a szabványos bemenetéről olvassa be soronként egy ZH
betűjelét és 3-3 pontszámát, és a szabványos kimenetre írja ki az egyes
sorokra, hogy hány embernek sikerült. A beolvasott adatsor végét x 0 0 0
zárja.</p>

<div class="columns">
<div>
<p>Példa bemenet:</p>
<pre class="screenshot">
A 1 10 7
C 3 3 5
B 10 10 9
x 0 0 0
</pre>
</div>

<div>
<p>Példa kimenet:</p>
<pre class="screenshot">
A 0
B 1
C 0
D 0
</pre>
</div>
</div>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   int atment[4] = {0};

   int p1, p2, p3;
   scanf("%c %d %d %d", &csop, &p1, &p2, &p3);
   while (csop != 'x') {
      int szum = p1+p2+p3;
      if (p1>=2 && p2>=2 && p3>=2 && szum>=12)
         ++atment[csop-'A'];
      scanf("%c %d %d %d", &csop, &p1, &p2, &p3);
   }

   for (char csop = 'A'; csop <= 'D'; ++csop)
      printf("%c %d\n", csop, atment[csop-'A']);

   return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>ZH statisztika II.</h3>

<div class="sticky">Kis ZH volt</div>

<p>Egy oktató statisztikát szeretne készíteni a megírt ZH-król. A ZH-ban három feladat van, ezek 
pontszáma nemnegatív egész szám, egyenként max. 10 pont, így az egész max. 30 pontos lehet.</p>

<p>Írj programot, mely a szabványos bemenetéről olvassa be soronként a ZH-k pontszámait. Az 
adatsort -1 -1 -1 zárja. Írja ki ezután a szabványos kimenetre, hány 0 pontos, hány 1 pontos, … 
és hány 30 pontos megoldás lett. Ha adott pontszámú dolgozat nem született, a sort ne írja ki.</p>

<div class="columns">
<div>
<p>Példa bemenet:</p>
<pre class="screenshot">
8 10 7
4 3 5
10 10 9
10 9 10
-1 -1 -1
</pre>
</div>

<div>
<p>Példa kimenet:</p>
<pre class="screenshot">
12 pontos: 1 db
25 pontos: 1 db
29 pontos: 2 db


</pre>
</div>
</div>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   int stat[31] = {0};
   
   int p1, p2, p3;
   scanf("%d %d %d", &p1, &p2, &p3);
   while (p1 != -1) {
      int szum = p1+p2+p3;
      ++stat[szum];
      scanf("%d %d %d", &p1, &p2, &p3);
   }

   for (int x = 0; x <= 30; ++x)
      if (stat[x] != 0)
         printf("%2d pontos: %2d db\n", x, stat[x]);

   return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Múzeum I.</h3>

<div class="sticky">Kis ZH volt</div>

<p>Egy múzeumban kíváncsiak arra, a hét mely napján van a legtöbb
látogató. Ehhez több hét adatait feldolgozzák.</p>

<p>Írj programot, mely a szabványos bemenetén fogadja a múzeum napi látogatási
adatait úgy, hogy soronként a hét napjának sorszámát kapjuk 0-6 között, majd
szóközzel elválasztva a látogatók számát.  Az adatok rendezetlenül érkeznek, adott sorszámú
naphoz több bejegyzés is tartozhat. A bemenet végét -1 -1 jelzi.</p>

<p>Írja ki a program a szabványos kimenetre annak a napnak a sorszámát, mely
a legtöbb látogatót jelenti. Feltételezzük, hogy egy ilyen nap van.</p>

<div class="columns">
<div>
<p>Példa bemenet:</p>
<pre class="screenshot">
1 7
2 3
6 33
5 44
4 4
6 55
-1 -1
</pre>
</div>

<div>
<p>Példa kimenet:</p>
<pre class="screenshot">
6






</pre>
</div>
</div>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   int latogato[7] = {0};
   
   int nap, db;
   scanf("%d %d", &nap, &db);
   while (nap != -1) {
      latogato[nap] += db;
      scanf("%d %d", &nap, &db);
   }

   int max = 0;
   for (int x = 1; x < 7; ++x)
      if (latogato[x]>latogato[max])
         max = x;

   printf("%d\n", max);

   return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Múzeum II.</h3>

<div class="sticky">Kis ZH volt</div>

<p>Egy múzeumban gazdasági okok miatt heti egy szünnapot szeretnének tartani, ezért keresik a 
hét azon napját, amikor a legkevesebb a látogató.</p>

<p>Írj programot, mely a szabványos bemenetén fogadja a múzeum napi látogatási adatait úgy, hogy 
soronként a hét napjának sorszámát kapjuk 1-7 között, majd szóközzel elválasztva a látogatók 
számát.  Az adatok rendezetlenül érkeznek, adott sorszámú naphoz több bejegyzés is tartozhat. A 
bemenet végét 0 0 jelzi.</p>

<p>Írja ki a program a szabványos kimenetre annak a napnak a sorszámát, amely a legkevesebb 
látogatót jelenti. Feltételezzük, hogy egy ilyen nap van.</p>

<div class="columns">
<div>
<p>Példa bemenet:</p>
<pre class="screenshot">
1 7
3 5
6 56
2 3
7 88
5 25
4 7
1 6
0 0
</pre>
</div>

<div>
<p>Példa kimenet:</p>
<pre class="screenshot">
2








</pre>
</div>
</div>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   int latogato[7] = {0};
   
   int nap, db;
   scanf("%d %d", &nap, &db);
   while (nap != 0) {
      latogato[nap-1] += db;
      scanf("%d %d", &nap, &db);
   }

   int min = 0;
   for (int x = 1; x < 7; ++x)
      if (latogato[x] < latogato[min])
         min = x;
   printf("%d\n", min+1);

   return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Kasszák I.</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy áruházban 32 kassza van, 1-től számozva. A tulajdonos nyomon szeretné követni a napi 
forgalom adatait az egyes kasszáknál. Így minden vásárláskor egy központi gépen megjelenik a 
kassza sorszáma és a fizetett összeg, szóközzel elválasztva:  <code>11 33800</code> – Ez a 11-es 
kassza, 33800 Ft. Írj olyan programot, ami beolvassa ezeket az adatokat a szabványos bemenetéről, 
és összegzi kasszánként a bevételeket! (Záráskor <code>0 0</code> számokkal zárul az aznapi 
forgalom figyelése.) Írja ki az összegzés után, melyik kasszánál mekkora volt a bevétel, és hogy 
az az összbevétel hány százaléka! Ha egy kassza az adott napon nem üzemelt, akkor az ne jelenjen 
meg.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int forint[32] = {0}, osszbevetel = 0;

    int kassza, osszeg;
    scanf("%d %d", &kassza, &osszeg);
    while (kassza!=0) {
        forint[kassza-1] += osszeg;
        osszbevetel += osszeg;
        scanf("%d %d", &kassza, &osszeg);
    }

    for (int i = 0; i < 32; i += 1)
        if (forint[i] != 0)
            printf("%2d. kassza, %6d Ft, %f%%.\n",
                i+1, forint[i], 100.0*forint[i]/osszbevetel);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Kasszák II.</h3>
<div class="sticky">Kis ZH volt</div>
<p>Egy áruházban 32 kassza van, 1-től számozva. A tulajdonos észrevette, hogy bizonyos 
kasszákat valamiért a vevők jobban preferálnak, és ezt szeretné megfigyelni. Minden vásárláskor 
egy központi gépen megjelenik a kassza sorszáma, amely egy 1...32 közötti egész szám. Záráskor a 
0 számmal zárul az aznapi forgalom figyelése. Írj olyan programot, ami beolvassa a kasszák 
sorszámait, és a nap végén kiírja a szabványos kimenetre annak a kasszának a sorszámát, ahol a 
legtöbb vevő járt, és azt is, hogy ez az összes vevő hány százaléka!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int vasarlok[32] = {0}, osszvasarlok = 0;

    int kassza;
    scanf("%d", &kassza);
    while (kassza != 0) {
        vasarlok[kassza-1] += 1;
        osszvasarlok += 1;
        scanf("%d", &kassza);
    }

    int max = 0;
    for (int i = 1; i < 32; i += 1)
        if (vasarlok[i]>vasarlok[max])
            max = i;

    printf("A kedvenc kassza a(z) %d-edik, "
           "a vasarlok %f%%-a ment oda.\n",
        max+1, 100.0*vasarlok[max]/osszvasarlok);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Kódtörő I.</h3>
<div class="sticky">Kis ZH volt</div>
<p>Bölcsész haverod, aki az angol nyelvvel foglalkozik, szeretné megvizsgálni a szavakban 
előforduló betűk gyakoriságát. Ezért megkér téged, hogy írj egy programot, amely a szabványos 
bemenetén egy angol nyelvű szöveget fogad (fájl vége jelig). A szöveg eleve nagybetűsítve van: 
„TO BE OR NOT TO BE: THAT IS THE QUESTION.” A programod feladata egy statisztikát készíteni, 
amelyben az szerepel, hogy melyik betű hányszor fordult elő a szövegben, és az összes betű hány 
százalékát adja. A kimenete ilyen:<br> <code>A: 19 db, 5.0%<br> B: 7 db, 1.8%</code> stb.<br> Ha 
valamelyik betű nem szerepelt a szövegben, az ne jelenjen meg a statisztikában se! A nem betű 
karaktereket figyelmen kívül kell hagyni.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int gyakorisag['Z'-'A'+1] = {0}, osszes = 0;

    while (scanf("%c", &c)==1)
        if (c >= 'A' && c <= 'Z') {
            gyakorisag[c-'A'] += 1;
            osszes += 1;
        }

    for (char c = 'A'; c <= 'Z'; c += 1)
        if (gyakorisag[c-'A'] != 0)
            printf("%c: %d db, %f %%.\n",
                c, gyakorisag[c-'A'], 100.0*gyakorisag[c-'A']/osszes);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Kódtörő II.</h3>
<div class="sticky">Kis ZH volt</div>
<p>Kódtörő haverod nagyon ért a titkosítások visszafejtéséhez, a programozással viszont 
hadilábon áll. Szerzett egy számjegyekből álló titkos kódot:
<br> 
<code>1238971125432563125555535555665554325671231321555253555</code>
<br>
Megfigyelte, hogy ebben nem egyforma a jegyek gyakorisága. Megkért téged, hogy írj egy 
programot, amely a szabványos bemenetén fogadja ezt a karaktersorozatot (fájl vége jelig), és 
megmondja, hogy melyik az a számjegy, amely a legtöbbször szerepelt, és azt is, hogy hány % a 
gyakorisága! A fenti bemenetre ez az 5-ös számjegy, 40%-kal. Ha bemeneten számjegyen kívül más 
karakter is szerepel, azt figyelmen kívül kell hagyni.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int gyakorisag[10] = {0};

    int osszes = 0;
    char c;
    while (scanf("%c", &c) == 1)
        if (c>='0' && c<='9') {
            gyakorisag[c-'0'] += 1;
            osszes += 1;
        }

    int max = 0;
    for (int i = 1; i < 10; i += 1)
        if (gyakorisag[i]>gyakorisag[max])
            max = i;

    printf("Leggyakoribb: %c, %f %%-kal.\n", '0'+max,
        100.0*gyakorisag[max]/osszes);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Melyik szerepel előbb?</h3>
<p>Adott egy egész értékekkel feltöltött m tömb. Készíts programot, mely a felhasználótól kért 
két számról eldönti, hogy a két szám szerepel-e a tömbben, és ha igen, akkor melyik szerepel 
előbb.</p>

<h3>Páronként</h3>
<p>Készíts programot, mely egy 50 elemű tömböt véletlen egész számokkal tölt fel 0 és 200 között.
Keress a tömbben két olyan elemet, melyekre teljesül, hogy a nagyobbik elem a kisebbik duplája! 
Keresd meg az összes ilyen párost!</p>

<h3>Átlaghoz legközelebb</h3>
<p>Írj programot, amely egy egészekből álló tömbben megkeresi azt az számot, amely
az összes szám átlagához a legközelebb van!</p>

<h3>Számjegyek tárolása tömbben</h3>
<p>Az m tíz elemű, egész számokból álló tömb egy decimális szám (x) számjegyeit tartalmazza 
helyiérték szerint csökkenő sorrendben. Készíts programot, mely
<br>
a.) kiszámítja az így ábrázolt szám (x) értékét!
<br>
b.) előállítja m-ben az eredetinél egyel nagyobb szám (x+1) ugyanilyen ábrázolását, illetve 
közölje, ha volt túlcsordulás!</p>

<h3>„Írásbeli összeadás”</h3>
<p>Az <code>m</code>, <code>k</code> két tíz elemű, egész számokból álló tömb egy-egy decimális 
szám (x,y) számjegyeit tartalmazza helyiérték szerint csökkenő sorrendben. Készíts programot, 
mely kiszámítja az így ábrázolt két szám összegét (x+y) és az eredményt x-be ugyanilyen 
ábrázolásban visszatárolja, illetve közölje, ha volt túlcsordulás!</p>

<h3>Összegzés</h3>

<p>Adott két n elemszámú, egészekből álló tömb (<code>m[]</code> és 
<code>b[]</code>). Az <code>m[]</code> tömb véletlen elemekkel van feltöltve. 
Készíts programot, amely <code>b[]</code> tömb elemeit feltölti úgy, hogy minden 
<code>b[i]</code> értéke az <code>m[]</code> tömb első <code>i+1</code> elemének 
összege legyen. Például <code>b[2]=m[0]+m[1]+m[2]</code>. Határozd meg egy 
ugyanilyen programmal, hogy az év hónapjainak első napjai (január 1., február 1. 
stb.) az év hányadik napjai!</p>


<h3>Egyforma elemek</h3>
<p>Írj programot, amely egy adott (előre feltöltött vagy billentyűzetről beolvasott)
tömböt vizsgálva kiírja azon elempárok indexeit, amelyek egyformák!
Vajon hány összehasonlítás kell ehhez, ha <code>n</code> a tömb elemszáma?</p>
<?php GyakDiaElemek::megoldasettol(); ?>
<p>Nem kell <code>n<sup>2</sup></code>, csak <code>n(n-1)/2</code> összehasonlítás,
mivel minden párt elég csak egyszer megvizsgálni (ha <code>a=b</code>, akkor <code>b=a</code>
is igaz). Ez látszik a programon is: a külső (<code>i</code>-s) ciklus végigmegy
az összes elemen, a belső (<code>j</code>-s) ciklus pedig minden <code>i</code>-nél
már csak az „összes többit” nézi, <code>i+1</code>-től indul. A külső ciklus
nem is megy el az utolsó elemig, hanem az utolsó előtti elem indexe a legvégső,
aminél lefut, mert az utolsó elemnél már nem is lenne „összes többi”. Tehát a <code>10</code>
elemű, <code>0&hellip;9</code> indexelő tömbre <code>i</code> <code>0</code>-tól <code>8</code>-ig,
<code>j</code> pedig <code>i+1</code>-től <code>9</code>-ig fut.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int szamok[10] = { 4, 6, 8, 9, 4, 5, 6, 7, 3, 8 };
    
    printf("Egyformak:\n");
    for (int i = 0; i < 10-1; i += 1)
        for (int j = i+1; j < 10; j += 1)
            if (szamok[i] == szamok[j])
                printf("szamok[%d] == szamok[%d] == %d\n", i, j, szamok[i]);
    
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<?php GyakDia::h3("Mind különböző", 'mindkulonbozo'); ?>

<p>Írj programot, amely egy adott (előre feltöltött vagy billentyűzetről beolvasott)
tömbről megmondja, hogy minden eleme különböző-e!</p>
<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Mit kell találni a tömbben ahhoz, hogy tudjuk, nem minden elem különböző?
Lásd az előző feladatot!</p>
<p>Jó megoldás lehet az is, ha rendezzük a tömböt, mert akkor az egyforma elemek
egymás mellé kerülnek. De vajon mi ennek a hátránya?</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>

<?php GyakDia::h3("Emeletes ház (Dinesman feladata)", 'dinesman'); ?>

<p>Baker, Cooper, Fletcher, Miller és Smith egy ötemeletes ház különböző 
emeletein laknak. Baker nem a legfölső emeleten lakik, Cooper pedig nem az alsó 
szinten. Fletcher lakhelye sem a legalsó szinten van, de nem is a legfölsőn. 
Miller magasabban lakik, mint Cooper. Smith nem Fletcherrel szomszédos emeleten 
lakik, ahogy Cooper és Fletcher sem emelet-szomszédok.</p>
<p>A kérdés: melyik emelet kié?</p>
<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Az, hogy különböző emeleteken laknak, csak egy feltétel a sok közül. Próbáld
végig programban az összes lehetőséget! A „különböző emeletek” feltétel ellenőrzését
úgy is megoldhatod, hogy beteszed az öt változót egy tömbbe, és megnézed, mind
különbözőek-e az elemei. Lásd <?php GyakMenuInfo::a_href('mindkulonbozo', "a Mind különböző című feladatot"); ?>.</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>





<?php GyakDia::beginslide("Véletlenszámok, játékok"); ?>

<h3>Egyenletes eloszlású véletlenszámok</h3>
<p>Írj egy programot, amelyik 0 és 99 között generál egy egyenletes eloszlású véletlen számot 
a szabványos <code>rand()</code> segítségével! (A modulós módszerrel generáltak nem teljesen egyenletes 
eloszlásúak. Pl. ha egy C fordítónál a <code>RAND_MAX</code> értéke 32767, akkor a <code>rand()%100</code>
kifejezés kicsit gyakrabban ad 67-nél kisebb számot, mint nagyobbat.)</p>





<h3>Fej vagy írás</h3>
<p>Adott egy feladat: „dobjunk fel egy pénzt” a C programunkban, és írjuk ki, hogy fej vagy írás lett.
Ennek a feladatnak az alábbi megoldása helytelen:</p>
<?php Highlighter::c(<<<'EOT'
if (rand() % 2 == 0)
    printf("Fej.\n");
if (rand() % 2 == 1)
    printf("Iras.\n");
EOT
); ?>
<p>A kipróbálás nélkül mondd meg: milyen hibás eredményt adhat ez a program, és milyen elvi hiba miatt?
Ha megvan, próbáld ki, és végül javítsd ki a programot!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A <code>rand()</code> minden hívása egy <em>új</em> véletlenszámot ad. A fenti, hibás kódrészletben
a <code>rand()</code>-ot kétszer hívjuk meg, tehát tulajdonképpen mintha nem egy, hanem két pénzérmét
vizsgálnánk: ha az első fej, kiírjuk hogy fej, ha a második írás, kiírjuk, hogy írás. Így aztán az is
lehet, hogy mindkét szó kiíródik, de az is, hogy egyik sem. Javítva:</p>
<?php Highlighter::c(<<<'EOT'
if (rand() % 2 == 0)
    printf("Fej.\n");
else
    printf("Iras.\n");
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Kő, papír, olló</h3>
<pre class="screenshot float">
Kő (k), papír (p), olló (o) vagy vége (v)?

Szerinted: k
Szerintem: k.
Senki nem kap pontot.

Szerinted: p
Szerintem: k.
p&gt;k, ezt te vitted!

Szerinted: v

Te nyertél, 1&gt;0 ponttal.
</pre>
<p>Írj programot, amelyik „kő, papír, olló” játékot játszik! A program először kérje el a 
felhasználó tippjét (<code>k</code>, <code>p</code>, <code>o</code> betűk, mint kő, papír, olló).
Ezután válasszon ő maga is egyet, és hasonlítsa a kettőt össze! A kő erősebb, mint az olló, 
mert kicsorbítja. A papír erősebb, mint a kő, mert becsomagolja. Az olló erősebb, mint a papír, 
mert elvágja. Ezek alapján a gép vagy a játékos kapjon egy pontot! Ha egyformát tippeltek, akkor 
semelyikük nem kap. A <code>v</code> beírása után írja ki a program, hogy ki nyert!</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>A gépnek háromféle választása lehet. Ehhez egy véletlenszámot kell sorsolni, amely a 0, 1 vagy
2 értékeket veheti fel. (A 3-mal osztás maradékát figyelve éppen ilyen szám áll elő.)</p>
<p>A véletlenszám sorsolása után érdemes a 0, 1 és 2 értékeket a programban a <code>k</code>,
<code>p</code>, <code>o</code> karakterekre cserélni, hogy egységes legyen azzal, amit
a felhasználó beírt. Ez javítja a programkód érthetőségét.</p>
<p>Amikor karaktert kell beolvasni, a feladattól függően
érdemes a <code>scanf()</code>-et <code>scanf("%c", &amp;betu)</code> helyett
<code>scanf(" %c", &amp;betu)</code> formában használni, azaz tenni egy szóközt
a <code>%c</code> elé. Ennek hatására a <code>scanf()</code> eldobja a kapott
szóköz és újsor (enter) karaktereket, és megvárja az első nem szóközt.
Erre azért van szükség, mert karakterek beolvasásánál alapértelmezés
szerint megkapjuk a felhasználó által leütött entereket is.</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(void) {
    int jatekospont, geppont;
    char jatekostipp, geptipp;
    
    /* pontszámok nullázása és üdvözlés*/
    jatekospont = geppont = 0;
    srand(time(0));
    printf("Kő (k), papír (p), olló (o) vagy vége (v)?\n");
    
    /* az első tipp a játékostól */
    printf("\nSzerinted: ");
    scanf(" %c", &jatekostipp);
    
    /* végjeles sorozat - a 'v' karakter jelzi a végét */
    while (jatekostipp != 'v') {
        /* tippel a gép is: 0, 1 vagy 2 véletlenszám. */
        int geptipp_i = rand() % 3;
        /* karakterré alakítjuk: 0->olló, 1->papír, 2->kő. */
        /* hogy melyikből mi lesz, az mindegy. */
        if (geptipp_i == 0)
            geptipp = 'o';
        else if (geptipp_i == 1)
            geptipp = 'p';
        else
            geptipp = 'k';
        printf("Szerintem: %c.\n", geptipp);

        /* összehasonlítás és pontozás */
        if ((jatekostipp == 'k' && geptipp == 'o')        /* kő veri az ollót */
            || (jatekostipp == 'p' && geptipp == 'k')     /* papír veri a követ */
            || (jatekostipp == 'o' && geptipp == 'p')) {  /* olló veri a papírt */
            ++jatekospont;
            printf("%c>%c, ezt te vitted!\n", jatekostipp, geptipp);
        }
        else if ((geptipp == 'k' && jatekostipp == 'o')   /* kő veri az ollót */
            || (geptipp == 'p' && jatekostipp == 'k')     /* papír veri a követ */
            || (geptipp == 'o' && jatekostipp == 'p')) {  /* olló veri a papírt */
            ++geppont;
            printf("%c<%c, ezt én vittem!\n", jatekostipp, geptipp);
        }
        else
            printf("Senki nem kap pontot.\n");

        /* a következő tipp a játékostól */
        printf("\nSzerinted: ");
        /* a karakter beolvasása előtt a scanf() egy szóközt kap.
         * ez azt jelenti, hogy a beolvasott szóközöket és újsor
         * karaktereket dobja el, és várjon tovább betűre. */
        scanf(" %c", &jatekostipp);
    }
    
    /* végeredmény */
    printf("\n");
    if (jatekospont > geppont)
        printf("Te nyertél, %d>%d ponttal.\n", jatekospont, geppont);
    else if (jatekospont < geppont)
        printf("Én nyertem, %d>%d ponttal.\n", geppont, jatekospont);
    else
        printf("A játék döntetlen, mindkettőnknek %d pontja lett.\n", jatekospont);
    
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Memóriajáték</h3>
<p>Memóriajátékot írunk. 6x6 kártya van lefordítva a játékosok előtt, 18 
pár, amelyek egyformák. A kártyákon betűk vannak, A, B, C, ...  Írj egy 
programot, amelyik generál egy véletlenszerű leosztást! Természetesen egy betűnek
pontosan kétszer kell szerepelnie (egy pár)!</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Ehhez érdemes előbb a tömböt úgy feltölteni, hogy sorrendben
szerepelnek benne a kártyák, és utána összekeverni. Úgy nem kell mindig vizsgálni,
hogy minden kártya pontosan kétszer szerepel-e benne.
A tömb megkeveréséhez minden elemet cserélj meg egy véletlenedikkel!
<code>for(…tömbelemek…)</code> – valahogy így.</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>





<h3>Sorbarakó játék</h3>
<pre class="screenshot float">
    1    2    3    4    5    6
  145   12    5   77  100   44

1. felcserelendo = 3
2. felcserelendo = 1
    1    2    3    4    5    6
    5   12  145   77  100   44
</pre>

<p>Írj C programot, amely a felhasználótól bekért egész számokkal feltölt
egy hatelemű tömböt! A program ezután keverje össze véletlenszerűen a
számokat, majd írja ki ezeket az oldalt látható módon.</p>

<pre class="screenshot float">
    1    2    3    4    5    6
    5   12   44   77  100  145

Gratulalok, nyertel!
</pre>

<p>A program ezután kérjen a felhasználótól két 1 és 6 közötti 
sorszámot, majd a program cserélje fel az ezekhez a sorszámokhoz 
tartozó értékeket, és írja ki ismét a számokat. Mindaddig ismételje 
a sorszámok bekérését és a cserét, míg a felhasználó nem rakta 
növekvő sorrendbe a számokat. Ha a felhasználó nem 1 és 6 közötti 
értékeket ad meg, adjon hibaüzenetet!</p>


<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <stdbool.h>

int main(void) {
    int tomb[6];

    srand(time(0));  /* Véletlengenerátor inicializálása */

    /* 6 szám bekérése a tömbbe */
    for (int i = 0; i < 6; i += 1) {
        printf("%d. szam: ", i + 1);
        scanf("%d", &tomb[i]);
    }

    /* Elemek véletlen rendezése */
    for (int i = 0; i < 6; i += 1) {
        int rnd = rand() % 6; /* Generálunk egy véletlenszámot */
        /* Csere 3 lépésben: i. <-> rnd. elemek */
        int csere = tomb[i];
        tomb[i] = tomb[rnd];
        tomb[rnd] = csere;
    }

    /* Tömb kiírása */
    for (int i = 0; i < 6; i += 1) printf("%4d ", i + 1);
    printf("\n");
    for (int i = 0; i < 6; i += 1) printf("%4d ", tomb[i]);
    printf("\n");

    /* Rendezetség ellenőrzése */
    bool sorban = true; /* Tegyük fel hogy sorba van rendezve */
    /* Ha van két elem ami rossz sorrendben van akkor már nincs rendezve */
    for (i = 0; i < 5; i += 1)
        if (tomb[i] > tomb[i + 1])
            sorban = false;

    /* Ciklus amíg rossz a sorrend */
    while (!sorban) {
        /* Bekérünk két indexet */
        int cs1, cs2;
        printf("1. cserelendo: ");
        scanf("%d", &cs1);
        printf("2. cserelendo: ");
        scanf("%d", &cs2);
        /* Ellenőrizzük a határokat */
        if (cs1 != cs2 && cs1 >= 1 && cs2 >= 1 && cs1 <= 6 && cs2 <= 6) {
            /* 3 lépéses csere */
            /* Az indexekből 1-et ki kell vonni: 1..6 -> 0..5 */
            csere = tomb[cs1 - 1];
            tomb[cs1 - 1] = tomb[cs2 - 1];
            tomb[cs2 - 1] = csere;
        }
        else
            printf("Hibas indexek!\n");

        /* Tömb kiírása */
        for (int i = 0; i < 6; i += 1)
            printf("%4d ", i + 1);
        printf("\n");
        for (int i = 0; i < 6; i += 1)
            printf("%4d ", tomb[i]);
        printf("\n");

        /* Rendezettség ellenőrzése */
        sorban = true;
        for (int i = 0; i < 5; i += 1)
            if (tomb[i] > tomb[i + 1])
                sorban = false;
    }

    /* Ha vége a ciklusnak akkor győzelem */
    printf("Gratulalok, nyertel!");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Master Mind</h3>
<p>A Master Mind játékban egyik játékos kitalál egy feladványt, amely
4 tüskéből áll. A tüskék 6-féle színűek lehetnek. Lehetséges az is,
hogy két vagy több tüske ugyanolyan színű, pl. piros, piros, zöld, kék.
A másik játékos ezután megtippeli,
mire gondolhatott az első. Az előbbi minden körben aképpen segít kitalálni
a feladványt, hogy elárulja, a tippben hány olyan tüske van, amely a megfelelő
színű és a megfelelő helyen is van (ezt feketékkel jelöli); és hány olyan, amely az előbbieken kívül
még jó színű, de rossz helyen van (ezt pedig fehérekkel).</p>

<?php GyakHTML::add_extra_style(<<<'EOT'
span.mastermind {
   font-weight: bold;
   font-size: 2em;
   letter-spacing: 0.1em;
   line-height: 0;
   text-shadow: 0px 0px 2px black;
}
EOT
); ?>

<p>Pl.
feladvány: <span class="mastermind"><span style="color: red">oo</span><span style="color: yellow">o</span><span style="color: green">o</span></span>,
tipp: <span class="mastermind"><span style="color: green">o</span><span style="color: red">o</span><span style="color: blue">o</span><span style="color: yellow">o</span></span>,
segítség: <span class="mastermind"><span style="color: black">o</span><span style="color: #eee">oo</span></span> (a második piros, illetve a zöld és a sárga miatt).</p>

<p>Írj programot, amely feladványt ad a felhasználónak, és a leírt
szabályok alapján segít neki kitalálni azt! A hat színt jelöld a programban
az <code>a…f</code> betűkkel.</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Miután a felhasználó megadta a tippjét, a program használhat olyan algoritmust, amely
hatására ez a beírt tipp elfelejtődik. Először a pozíció szerint is stimmelő tüskéket
érdemes keresni, és az így megtalált egyezések a tömbből törölhetőek, hogy a második,
pozíciót figyelembe már nem vevő keresés ne találja meg azokat újra.</p>
<p>Karakterek beolvasásával kapcsolatban lásd a fentebbi megjegyzéseket (pl. a kő, papír, olló
játéknál.)</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>
