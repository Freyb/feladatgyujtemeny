
<?php GyakDia::beginslide("Számrendszerek, bitműveletek", false, "feladatbit"); ?>

<h3>Mennyi?</h3>

<div class="sticky">Kis ZH-ban voltak</div>

<p>Mennyi 27|13? Írd le mindkét számot, valamint az eredményt is kettes
számrendszerben! Az eredményt tízes számrendszerben is add meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<pre>
  27 = 11011
 |13 = 01101
------------
  31 = 11111
</pre>
<?php GyakDiaElemek::megoldaseddig(); ?>

<p>Mennyi 45&amp;57? Írd le mindkét számot, valamint az eredményt is kettes
 számrendszerben! Az eredményt tízes számrendszerben is add meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<pre>
 45 = 101101
&amp;57 = 111001
------------
 41 = 101001
</pre>
<?php GyakDiaElemek::megoldaseddig(); ?>

<p>Mennyi 27^13? Írd le mindkét számot, valamint az eredményt is kettes számrendszerben! Az
eredményt tízes számrendszerben is add meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<pre>
 27 = 11011
^13 = 01101
-----------
 22 = 10110
</pre>
<?php GyakDiaElemek::megoldaseddig(); ?>

<p>Mennyi (~20) &amp; 13? Írd le mindkét számot, valamint az eredményt is kettes
számrendszerben! Az eredményt tízes számrendszerben is add meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<pre>
 20  = 00010100
~20  = 11101011
&amp;13  = 00001101
---------------
   9 = 00001001
</pre>
<?php GyakDiaElemek::megoldaseddig(); ?>

<p>Mennyi 0x2A | 0x82? Írd le mindkét számot, valamint az eredményt is kettes
számrendszerben! Az eredményt tizenhatos számrendszerben is add meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<pre>
 0x2A = 00101010
|0x82 = 10000010
----------------
 0xAA = 10101010
</pre>
<?php GyakDiaElemek::megoldaseddig(); ?>

<p>Mennyi 20|13? Írd le mindkét számot, valamint az eredményt is kettes számrendszerben! Az
eredményt tízes számrendszerben is add meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<pre>
 20 = 10100
|13 = 01101
-----------
 29 = 11101
</pre>
<?php GyakDiaElemek::megoldaseddig(); ?>

<p>Mennyi 42&amp;54? Írd le mindkét számot, valamint az eredményt is kettes számrendszerben! Az
eredményt tízes számrendszerben is add meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<pre>
 42 = 101010
&amp;54 = 110110
------------
 34 = 100010
</pre>
<?php GyakDiaElemek::megoldaseddig(); ?>


<p>Mennyi 0x2A ^ 0x36? Írd le mindkét számot, valamint az eredményt is kettes számrendszerben!
Az eredményt tizenhatos számrendszerben is add meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<pre>
 0x2A = 101010
^0x36 = 110110
--------------
 0x1C = 011100
</pre>
<?php GyakDiaElemek::megoldaseddig(); ?>


<p>Mennyi (~22) &amp; 10? Írd le 22-t, ~22-t és 10-et, valamint az eredményt is kettes
számrendszerben!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<pre>
 22 = 010110
~22 = 101001
 10 = 001010
------------
  8 = 001000
</pre>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Műveletek kettes számrendszerben</h3>

<p>Végezzük el az alábbi műveleteket kettes számrendszerben!
Tízesben tudjuk, hogy kell... De megy kettesben is? Mennyiben más?</p>

<div class="columns">
<div>
<pre class="sorsurit1">
 101101
+110111
–––––––
</pre>
</div>
<div>
<pre class="sorsurit1">
 101101×1011
 ––––––
 
</pre>
</div>
</div>


<h3>Hexadecimális</h3>
<p>Készíts programot, mely a felhasználó által megadott decimális (poz.
egész) számot átváltja 16-os számrendszerbe (hexadecimális), és az eredményt
kiírja a képernyőre.
<br>(Ehhez a <code>printf()</code>-fel is lehet ügyeskedni.)</p>




<?php GyakDia::h3("Igazságtábla – kevés bitre", 'igazsagtabla2'); ?>
<p>Készíts programot, mely elkészíti az alábbi logikai függvények igazságtáblázatát, és kiírja a képernyőre:
a.) ÉS
b.) VAGY
c.) NOT
d.) NOR
e.) XOR.</p>



<?php GyakDia::h3("Igazságtábla – sok bitre", 'igazsagtablan'); ?>

<pre class="screenshot float sorsurit1">
ABC|Q
---+-
000|0
001|0
010|0
011|0
100|0
101|0
110|0
111|1
</pre>

<p>Készítsünk programot, amelyik az ÉS, VAGY, KIZÁRÓ VAGY függvény
igazságtábláját készíti el, a felhasználó által megadott bemenetszámra!</p>

<p>Például 3 bites ÉS igazságtábla esetén a jobb oldali legyen a kimenet.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A feladat érdekes része a ciklus megírása: nem ágyazhatunk egymásba a programkódban
annyi ciklust, ahány bitünk lesz, hiszen a számuk csak a megoldás közben derül ki.</p>
<p>Viszont tudjuk, hogy pl. 4 bit esetén 0000-tól 1111-ig megyünk; az 1111 értéke
(vagy éppen 10000 értéke) meghatározható bitműveletekkel.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main() {
    int bitek;
    printf("Bitek száma?\n");
    scanf("%d", &bitek);

    /* táblázat fejléc */
    for (int i = 0; i < bitek; ++i)
        printf("%c", 'A'+i);
    printf("|Q\n");
    for (int i = 0; i < bitek; ++i)
        printf("-");
    printf("+-\n");

    /* 0-tól 1<<bitek-ig megyünk, azaz pl. 0000-tól 1111-ig */
    for (int x = 0; x < 1<<bitek; ++x) {
        for (int i = bitek-1; i >= 0; --i)
            printf("%c", (x >> i) & 1 ? '1' : '0');
        /* akkumuláció; kezdeti érték = első bit */
        unsigned acc = x & 1;
        for (int i = 1; i < bitek; ++i)
            acc = acc & ((x >> i) & 1);
        printf("|%c\n", acc ? '1' : '0');
    }
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Bináris szám megadása</h3>
<p>Írj programot, mely bekér egy max 16 hosszú bitsorozatot karakterlánc
formában karakterenként úgy, hogy csak 0-ás és 1-es karakterek bevitelét
engedélyezi. A bevitel végét az enter megnyomása jelzi. Ezután írja ki az
ilyen módon kettes számrendszerben megadott szám tízes számrendszerbeli
alakját! (Elsőleg legnagyobb helyiértéket adja meg a felhasználó.)</p>




<h3>Egyszerű bitműveletek</h3>

<p>Írjunk programot, amelyik kér egy nemnegatív számot. Írja ki ezt a számot binárisan. Utána
állítsa 1-be a 7.&nbsp;bitjét; állítsa 0-ba a 6.&nbsp;bitjét, és végül negálja a 0.&nbsp;bitjét.
Írja ki az így megváltoztatott számot!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

/* A kiirast megvalosito fuggveny */
void kiir(unsigned a) {
    for (int n = 7; n >= 0; n--)    /* 7-tol nullaig a fejlec */
        printf("%d", n);
    printf("\n");
    for (int n = 7; n >= 0; n--)    /* a kapott szam bitjei */
        printf("%d", (a & 1 << n) ? 1 : 0);
    printf("\n");
}

int main(void) {
    unsigned x;

    printf("Kerem a szamot! ");
    scanf("%u", &x);
    printf("Eredeti:\n");
    kiir(x);

    /* a feladat altal eloirt muveletek */
    x = x | (1 << 7);     /* 1-be billentjuk a 7-es bitet */
    x = x & ~(1 << 6);    /* 0-ba billentjuk a 6-os bitet */
    x = x ^ 1 << 0;       /* negaljuk a 0-s bitet */
    printf("1-be a 7-es, 0-ba a 6-os, negalva a 0-s:\n");
    kiir(x);
    if (x & 1 << 5)
        printf("Az 5. bit egyes.\n");
    else
        printf("Az 5. bit nullas.\n");

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Bitek cseréje – adott sorszámú bitek</h3>
<p>Írj egy programrészt, amelyik egy nemnegatív egész számban
megcseréli két adott sorszámú bitjét! Az
így keletkező számot kell előállítani. A 0. bit a legkisebb
helyiértékű.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A lenti megoldás gondolatmenete a következő. Az <code>a_bit</code> és <code>b_bit</code>
változókba elmentjük az a. és b. helyiértéken álló számot. Ezután az eredményben mindkét helyen
kinullázuk a biteket, aztán ha az egyik helyen 1-es volt, akkor a másik helyen billentjük be
1-esbe utólag, és fordítva. Az <code>a_bit</code> és <code>b_bit</code> változókat logikai
értéknek használjuk.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void kiir(unsigned a) {
    for (int n = 7; n >= 0; n--)
        printf("%d", n);
    printf("\n");
    for (int n = 7; n >= 0; n--)
        printf("%d", (a & 1 << n) ? 1 : 0);
    printf("\n");
}

// a. es b. bitet csereli - ez a feladat megoldasa
unsigned csere(unsigned be, int a, int b) {
    /* ezeket a maszkokat vegig hasznaljuk */
    unsigned a_mask = 1 << a;
    unsigned b_mask = 1 << b;
    /* kivesszuk az adott bitet */
    unsigned a_bit = be & a_mask;
    unsigned b_bit = be & b_mask;
    unsigned eredmeny;

    /* kinullazzuk mindket helyen a biteket */
    /* a_mask|b_mask egy olyan szam, amely mindket helyen
     * 1-est tartalmaz */
    eredmeny = be & ~(a_mask | b_mask);
    /* tulajdonkepp itt tortenik meg a csere.
     * ha a_bit 1-es, akkor a b helyere rakunk
     * be 1-est, es forditva. */
    if (a_bit)
        eredmeny |= b_mask;
    if (b_bit)
        eredmeny |= a_mask;
    return eredmeny;
}

int main(void) {
    kiir(23);
    kiir(csere(23, 1, 3));

    return 0;
}
EOT
); ?>

<p>Másik megoldás: kiveszem a biteket, és egyből eltolom őket a 0. helyiértékre (így az
<code>a_bit</code> és <code>b_bit</code> változók 0-t vagy 1-et tartalmaznak). Ezek után
kinullázhatom őket az eredeti számban; és az így keletkező számhoz hozzávagyolom a biteket újra,
de mindig a másik helyre tolva az elmentett bitet. Még elég sok különböző megoldást ki lehetne
találni.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

void kiir(unsigned a) {
    for (int n = 7; n >= 0; n--)
        printf("%d", n);
    printf("\n");
    for (int n = 7; n >= 0; n--)
        printf("%d", (a & 1 << n) ? 1 : 0);
    printf("\n");
}

int main(void) {
    unsigned szam = 23;

    int a = 1, b = 3;   /* ezek lesznek megcserélve */
    /* ezeket a maszkokat vegig hasznaljuk */
    unsigned a_mask = 1 << a;
    unsigned b_mask = 1 << b;
    /* kivesszuk az adott bitet */
    unsigned a_bit = szam & a_mask;
    unsigned b_bit = szam & b_mask;

    /* kinullazzuk mindket helyen a biteket */
    /* a_mask|b_mask egy olyan szam, amely mindket helyen
     * 1-est tartalmaz */
    unsigned eredmeny = szam & ~(a_mask | b_mask);
    /* tulajdonkepp itt tortenik meg a csere.
     * ha a_bit 1-es, akkor a b helyere rakunk
     * be 1-est, es forditva. */
    if (a_bit)
        eredmeny |= b_mask;
    if (b_bit)
        eredmeny |= a_mask;

    kiir(szam);
    kiir(eredmeny);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Tükrözve</h3>
<p>Készíts programot, mely egy unsigned char típusú változóban tükrözi a
biteket, vagyis a legnagyobb helyiértékű bit helyet cserél a legkisebbel (0↔7),
a második legnagyobb a második legkisebbel (1↔6) stb.</p>


<h3>Adott bitek invertálása</h3>
<p>Írj olyan programrészt,
amely egy előjel nélküli x számban p pozíciótól kezve n bitet invertál! Például bemenet: x=10110 (binárisan), p=2,
n=3-ra a kimenet x=01010.</p>




<?php GyakDia::h3("Bitsorozat kivágása", 'bitsorozatkivagasa'); ?>

<p>Írj programrészt, amely paraméterként kap három egész számot (szam,
honnan, db)! A programrész vegye ki a szam jobbról honnan sorszámú, db
számú bitet tartalmazó tartományát, és ezt adja meg! Pl. Be: 471, 3, 5 &rarr; 471=11<strong>10101</strong>11 &rarr; 10101, tehát a kimenet: 21.</p>

<p>Hány eltérő megoldást lehet találni?</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<?php Highlighter::c(<<<'EOT'
unsigned szam = ..., honnan = ..., db = ...;

unsigned eredmeny = 0, tolt = szam >> (honnan - 1);
for (int i = 0; i < db; i++)
    eredmeny |= tolt & (1 << i);
EOT
); ?>

<p>Pohl László trükkös megoldása az alábbi. (A temp az alsó helyiértékein már a kivágandó biteket
tartalmazza. Ebből eldobva az alsó db darabot, invertálva saját magával, az összes
többi 1-es eltűnik.)</p>

<?php Highlighter::c(<<<'EOT'
unsigned temp = szam >> (honnan-1);
unsigned eredmeny = temp ^ (temp >> db << db);
EOT
); ?>

<p>Benedek Zsófia ötlete. (Balra csúsztatva a felső bitek dobhatóak el (aztán vissza), jobbra csúsztatva
az alsók. Ez 32 bitesen működik. A két jobbra shift egyébként összevonható.)</p>

<?php Highlighter::c(<<<'EOT'
unsigned eredmeny = (szam<<(32-(honnan-1)-db)>>(32-(honnan-1)-db))) >> (honnan-1);
EOT
); ?>

<p>Estók Dániel megoldása. (0 = csupa 0, ~0 = csupa 1, ~0&lt;&lt;db = csupa 1, de alul
db darab 0, ~(~0&lt;&lt;db) = csupa 0, de alul db darab 1-es, és ez pont a maszk, ami kell.)</p>

<?php Highlighter::c(<<<'EOT'
unsigned eredmeny = (szam>>(honnan-1)) & ~(~0 << db);
EOT
); ?>

<p>Abonyi József megoldása. (1&lt;&lt;db a fenti maszknál pont eggyel nagyobb szám, ami ráadásul
pont kettő hatványa. Ezzel modulózva kivághatók az alsó bitek.)</p>

<?php Highlighter::c(<<<'EOT'
unsigned eredmeny = (szam>>(honnan-1)) % (1<<db);
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Páros számú 1-es bit</h3>
<div class="sticky">Kis ZH-ban volt</div>
<p>Írj programrészt, amely bemenetként kap egy pozitív egész számot, és logikai igazat állít elő,
ha a szám páros számú 1-es bitet tartalmaz!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
int db = 0;
for (; szam != 0; szam >>= 1)
    db += szam & 1;
bool paros = db % 2 == 0;
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Mind a 32 bit cseréje</h3>
<p>Írj programrészt, amely bemenetként kap egy előjel nélküli egész számot, melyről
feltételezzük, hogy 32 bites. Cserélje fel a szám összes szomszédos bitpárját (0. az
1.-vel, 2. a 3.-kal, … 30. a 31.-kel)!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Egy egyszerű megoldás:</p>
<?php Highlighter::c(<<<'EOT'
unsigned long int miben = 123;   /* bemenet */

unsigned long int eredmeny = 0;
for (int i = 0; i < 32; i += 2) {
    if (miben & 1 << i)
        eredmeny |= 1 << (i + 1);
    if (miben & 1 << (i + 1))
        eredmeny |= 1 << i;
}
EOT
); ?>

<p>Egy nagyon trükkös megoldás:</p>
<?php Highlighter::c(<<<'EOT'
unsigned long int miben = 123;   /* bemenet */

unsigned long int eredmeny = ((szam & 0xaaaaaaaa)>>1) | ((szam & 0x55555555)<<1);
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>







<h3>Bitek cseréje – bármekkora változóra</h3>
<div class="sticky">Vizsga volt</div>
<p>Írj egy olyan programrészt, amely bemenetként kap egy előjel nélküli
egész számot, és kimenetként szintén egy előjel nélküli egész számot állít elő! Az utóbbi szám úgy
keletkezik, hogy a paraméterként átvett számban megcseréli a szomszédos bitpárokat. Nem tudjuk,
hogy az adott gépen hány bites az egész, de biztosan páros bitszámú. Pl. be:
25&nbsp;→&nbsp;011001, ki: 100110&nbsp;→&nbsp;38.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Itt a 0. bittől érdemes haladni. Két dologra kell figyelni:</p>
<ul>
    <li>Mindig az i. és az i+1. bitet cseréljük; utána i-t 2-vel növeljük.
    <li>És ezt addig csináljuk, amíg a számból ha levágjuk az utolsó i bitet, akkor az eredmény nem 0.
    Mert ha 0, akkor ott már nincs több 1-es, amit cserélgetni kellene – akármekkora is az int.
</ul>
<p>Az alábbi minta egy függvényként tartalmazza a megoldást.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

unsigned long int bitcsere(unsigned long int szam) {
    unsigned long int eredmeny = 0;

    int i = 0;
    while ((szam >> i) > 0) {
        /* megjegyezzuk... */
        int egyik = (szam >> i) & 1;
        int masik = (szam >> (i + 1)) & 1;
        /* es rakjuk be oket forditva.
         * fent egyik<->i es masik<->i+1,
         * itt egyik<->i+1 es masik<->i! */
        eredmeny = eredmeny | egyik << (i + 1) | masik << i;
        /* kettesevel tovabb */
        i += 2;
    }
    return szam;
}

int main(void) {
    printf("%lu\n", bitcsere(25));
    printf("%lu\n", bitcsere(38));

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Hány 0 értékű bit?</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj programrészt, amely paraméterként kap egy előjel nélküli egész számot, és megadja, hogy a szám hány 0 értékű bitet
tartalmaz! A számról feltételezhető, hogy 32 bites.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
unsigned long int szam = 123;

int db = 0;
for (int i = 0; i < 32; szam >>= 1, i++)
    if ((szam & 1) == 0)
        ++db;
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Egyesek egymás mellett</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj programrészt, amely bemenetként kap egy egész számot, melyről
feltételezzük, hogy 16 bites. Adjon meg ez egy logikai értéket,
amely akkor legyen igaz, ha a számban bárhol található egymás mellett két 1-es értékű
bit, amúgy hamis! Pl. 138=10001010 esetén hamis a válasz,
154=100<em>11</em>010 esetén pedig igaz.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
unsigned int szam = 138;

bool talalat = false;
for (int i = 0; i < 15; i++)
    if (((szam >> i) & 3) == 3)
        talalat = true;
EOT
); ?>

<p>Egy trükkös megoldás. (Ha egymás mellett két egyes van, eggyel léptetve
azok át fogják fedni egymást. Az így kapott számot az eredetivel bitenkénti ÉS-elve
ezért nem nullát adnak.)</p>

<?php Highlighter::c(<<<'EOT'
unsigned int szam = 138;
bool talalat = (szam & (szam << 1)) != 0;
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>







<h3>Mindkét oldalról 0</h3>
<div class="sticky">Kis ZH-ban volt</div>
<p>Írj programrészt, amely bemenetként kap egy előjel nélküli egész számot, és megadja, hogy hány olyan 1-es
bit van a számban, amelyet mindkét oldalról 0 bit határol! (Értelemszerűen a legalsó és
legfelső bit nem lehet ilyen.) Pl. ha a bemenő bitminta 1011101000010101011001010011111,
akkor az eredmény 6. A bemeneti számról feltételezhető, hogy 32 bites.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Az alábbi nem a triviális, hanem egy trükkös megoldás. Ha egymás melletti három bitet vizsgálunk, akkor ehhez <code>010</code>-t kell lássunk.
A <code>szam&amp;7</code> kivág három bitet (mert 7 = 111), ahol ez a 010 (értéke: 2) kell legyen.</p>
<?php Highlighter::c(<<<'EOT'
unsigned long int szam = ...;

int db = 0;
for (int i = 0; i < 30; i++, szam >>= 1)
    if ((szam & 7) == 2)
        db++;
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Pontosan hat darab 1-es</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj programrészt, amely bemenetként kap egy pozitív egész számot,
és logikai igazat ad meg, ha a szám pontosan 6 db 1-es bitet
tartalmaz!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
unsigned int szam = 123;

int db = 0;
for (; szam != 0; szam >>= 1)
    db += szam & 1;

bool eredmeny = db == 6;
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Rotálás</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj programrészt, amely bemenetként kap két előjel nélküli
egész számot (mit, db), és mit-et db számú bittel forgatja el jobbra,
és ezt az értéket adja meg (az előjel nélküli egészeket 32
bitesnek feltételezzük)! A jobbra forgatás azt jelenti, hogy mit
bitjei db számú bittel jobbra tolódnak, és a „kieső” bitek a szám
elejére kerülnek vissza. Pl. be:
<br>0000000011111111111110101010<strong>1010</strong> és db = 4, ki:
<br><strong>1010</strong>0000000011111111111110101010.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
/* a naív megoldás, függvényként */
unsigned rotr1(unsigned mit, int db) {
    unsigned eredmeny = 0, i;
    for (int i = 0; i < 32; i++)
        if (mit & (1 << ((i + db) % 32)))
            eredmeny |= 1 << i;
    return eredmeny;
}

/* a trükkös megoldás, függvényként */
unsigned rotr2(unsigned mit, int db) {
    return (mit >> db) | (mit << (32-db));
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>














<h3>Bájtsorrend</h3>
<p>Készíts programrészt, amelyik egy 32 bites előjel nélküli szám bájtsorrendjét megfordítja.
Például, ha a bemenet 0x11223344, a kimenet legyen 0x44332211. Tételezd fel, hogy az
unsigned int a futtató gépen 32 bites!</p>









<?php GyakDia::beginslide("Számábrázolási problémák"); ?>


<h3>Lottó 5-ös</h3>

<p>Hányféleképpen lehet n valamiből kiválasztani k valamit? Ezt a
kombinatorikában kombinációnak nevezik („<code>n</code> alatt a <code>k</code>”). A lottóban 90 szám
van, és 5-öt kell választani; a biztos 5-ös találathoz
majdnem 44 millió szelvényt kell kitölteni:

</p>
<pre style="line-height: 0.7">
90·89·88·87·86
────────────── = 43 949 268
   1·2·3·4·5
</pre>

<p>Feladat: írd meg a programot, amely kéri a felhasználótól <code>n</code>
és <code>k</code> értékét. (A lottóban <code>n=90</code> és <code>k=5</code>.)
Ellenőrizd a program által adott eredményt! Vajon hibás a programod?
Kövesd a változók értékét a nyomkövetőben (különösen a számláló kiszámításánál),
és hasonlítsd össze azt a Számológép alkalmazásban kapottal!
</p>

<?php Highlighter::c(<<<'EOT'
/* A nem igazán működő megoldás */
#include <stdio.h>

int main(void) {
    int n, k;
    printf("n=");
    scanf("%d", &n);
    printf("k=");
    scanf("%d", &k);

    /* 1, hogy ezt szorozgassuk tovabb */
    int komb = 1;
    for (int i = n; i > n - k; i--)
        komb = komb * i;
    /* es utana osztjuk a faktorialissal */
    for (int i = 1; i <= k; i++)
        komb = komb / i;

    printf("Cnk=%d", komb);

    return 0;
}
EOT
); ?>

<p>Miért helytelen az eredmény? Ellenőrizd
a nyomkövető segítségével a gép által végzett számítást. Miért ott
téveszti el, ahol? Az egyik fentebbi alapján, az <code>unsigned</code> típus bitjei számának
ismeretében magyarázd meg az eredményt!</p>

<p>Hogyan lehetne javítani? Megoldható úgy is, ha maradunk az egész számoknál.
Figyeld meg: <code>k=1</code> esetén a számláló csak <code>90</code>,
a nevező <code>1</code>. <code>k=2</code> esetén a számláló <code>90·89</code>,
a nevező <code>1·2</code>. A nevező miatt osztunk kettővel, de a számlálóban
a két tényező közül az egyik biztosan páros, mert <code>n·(n-1)</code> alakú.
Ugyanígy <code>k=3</code>-nál a számlálóban van egy szám, amely biztosan
osztható 3-mal. Ha a ciklusban minden szorzás után rögtön az osztást is
elvégezzük, akkor nem kell tárolnunk a <code>90·89·88·87·86</code> művelet
eredményét, hanem végig csak kisebb számokat. Írd így meg a programot!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
/* A fenti ötlettel javított megoldás */
#include <stdio.h>

int main(void) {
    int n, k;
    printf("n=");
    scanf("%d", &n);
    printf("k=");
    scanf("%d", &k);

    int komb = 1;
    /* szorzunk es osztunk - lasd a magyarazatot */
    for (int i = 1; i <= k; i++) {
        komb = komb * (n + 1 - i);
        komb = komb / i;
    }

    printf("Cnk=%d", komb);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Gyök kettő – számábrázolási kérdések</h3>

<p>A √<span class="felulhuzott">2</span> számjegyei <?php GyakMenuInfo::a_href('gyokketto', "egyesével meghatározhatóak"); ?>.
A számítás elvégzése közben azonban könnyű számábrázolási problémákba botlani.</p>

<ul>
    <li>Írj programot, amely a fenti algoritmussal 10<sup>&minus;10</sup> pontossággal meghatározza √<span class="felulhuzott">2</span> értékét!
    <li>Milyen típust kell ehhez használni? Meg tudod határozni a gyököt 10<sup>&minus;20</sup> pontossággal? Mi
        történik, ha megpróbálod, és miért?
    <li>Hasonlítsd össze ezt az algoritmust Hérón módszerével. Vajon melyik gyorsabb? Melyik ad kevesebb lépésből
        pontosabb megoldást?
</ul>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

double gyok(double szam) {
    double tipp, novekmeny;
    unsigned lepesszam;

    tipp = 1;
    novekmeny = 1;
    lepesszam = 0;

    do {
        do {
            tipp += novekmeny;
            ++lepesszam;
        } while (szam > (tipp * tipp));

        tipp -= novekmeny;
        novekmeny /= 10;
    } while (novekmeny > 1e-10);

    /* printf("Lepesszam: %d\n", lepesszam); */

    return tipp;
}

int main(void) {
    printf("2 gyoke: %.10f\n", gyok(2));

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Végtelen ciklus?</h3>

<p>Az alábbi program egy olyan ciklust tartalmaz, mely addig fut, amíg egy
szám és egy nála eggyel nagyobb szám nem egyenlő egymással. Ha a
lebegőpontos típusaink végtelenül pontosak lennének, ez végtelen ciklust
eredményezne. Mi a helyzet a gyakorlatban? Próbáld ki <code>float</code> és
<code>double</code> típussal is!</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
   float e = 0.0, f = 1.0;

   while (e != f) {
      f *= 2.0;
      e = f+1;
   }
   printf("%f\n%f\n", e, f);

   return 0;
}
EOT
); ?>





<h3>Gyökkeresés</h3>

<p>Tudjuk, hogy az x<sup>3</sup>-9x<sup>2</sup>+23x-15=0 egyenlet egy gyöke 2.2 és 4.5 között található. Írj programot, amely intervallumfelezéses módszerrel kiszámítja az egyenlet gyökét!</p>

<?php GyakDiaElemek::nyithatoettol("Tipp"); ?>
<p>Az intervallumfelezés módszere egy x_also és egy x_felso értékből indul ki, az ezekhez tartozó függvényértékekről tudjuk, hogy ellentétes előjelűek.
Kiszámítjuk az x_kozepe=(x_also+x_felso)/2 értéket: ha az ehhez tartozó függvényérték előjele az x_also-hoz tartozó függvényérték előjelével egyezik meg, akkor x_also=x_kozepe, egyébként x_felso=x_kozepe.
(Vagyis az x_also és x_felso távolságát felére csökkentjük úgy, hogy a gyök továbbra is a két határ között legyen.) Az eljárást addig folytatjuk, míg x_also és x_felső „elég közel” nem kerül egymáshoz (pl. epszilon=10<sup>-6</sup>). Ekkor a gyöknek x_also-t, x_felso-t, vagy az átlagukat tekinthetjük.</p>
<?php GyakDiaElemek::nyithatoeddig(); ?>

<p>Ha sikerült kiszámítanod a gyököt, írd át a programot <code>float</code> típusra (ha eddig nem az volt), és epszilont csökkentsd 10<sup>-8</sup>-ra (C nyelven 1e-8). Mit tapasztalsz?</p>




<h3>(x-1)(x-10<sup>n</sup>)=0</h3>

<p>Írj függvényt, amely megoldja az (x-1)(x-10<sup>n</sup>)=0 egyenletet!
Ehhez alakítsd át az egyenletet x<sup>2</sup>-(1+10<sup>n</sup>)x+10<sup>n</sup>=0
alakba és az együtthatókat helyettesítsd be a megoldóképletbe. A függvény bemeneti paramétere n legyen.
Próbáld ki a függvényt n = 1, 2, 4, 8 esetekre és <code>float</code> valamint <code>double</code> típusokkal is! Figyeld meg, hogy mi történik és adj rá magyarázatot!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <math.h>

void megold(int n) {
    float b, c;     /* vagy double: érdemes kipróbálni */
    /* a 10 hatványának kiszámolása */
    c = 1;
    for (int i = 0; i < n; i++)
        c *= 10;
    b = -(c + 1);
    /* Megoldások kiszámolása/kiírása */
    printf("x1=%f x2=%f\n", (-b + sqrt(b * b - 4 * c)) / 2, (-b - sqrt(b * b - 4 * c)) / 2);
}

int main(void) {
    /* Próba... */
    megold(1);
    megold(2);
    megold(4);
    megold(8);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>A nagy átverés</h3>
<p>Hány olyan x egész szám van, amelyre x = -x?</p>
<?php GyakDiaElemek::megoldasettol(); ?>
<pre class="float" style="line-height: 0.7">
    bitek      érték

  876543210


  <strong>1</strong><em>0</em>0000000        0

 - <em>1</em>0000000     -128
 ──────────
   <em>1</em>0000000     -128
</pre>

<p>Matematikában egy (a nulla), a számítógépen a kettes komplemens számábrázolás
miatt kettő (a nulla és a legnegatívabb szám).
Ugyanis a legnegatívabb ábrázolható szám a kettes komplemens esetén nem ugyanakkora, mint
a legpozitívabb. 8 biten például -128 és +127, és a -128 bitenkénti ábrázolása pont az,
mint ami a +128-é lenne (ha beleférne). Ezért ha 8 biten a -128-at kivonjuk 0-ból, vagyis
az ellentettjét vesszük, túlcsordulást kapunk, és saját maga az eredmény.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    signed char c;

    c = -128;
    printf("%d\n", c);

    c = -c;
    printf("%d\n", c);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>
