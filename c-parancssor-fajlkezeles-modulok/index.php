<?php

<?php GyakDia::beginslide("Parancssori argumentumok"); ?>

<h3>Argumentumok kiírása</h3>
<div class="sticky">NZH-n volt</div>
<p>Írj programot, amely számozva kiírja a parancssori argumentumait a képernyőre!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(int argc, char *argv[]) {
    /* argv[0] a program neve, és argv[argc]=NULL.
     * ezért 1-től argc-1-ig kell mennie a ciklusnak. */
    for (int i = 1; i < argc; ++i)
        printf("%d. %s\n", i, argv[i]);
    
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Az argumentumok száma</h3>
<div class="sticky">NZH-n volt</div>
<p>Tegyük fel, hogy írni kell egy programot, amely két parancssori argumentumot vár:
egy bemeneti és egy kimeneti fájl nevét. Írj rövid programot, amely ellenőrzi, hogy
pontosan két parancssori argumentumot kapott-e! Írjon a program hibaüzenetet
a képernyőre, ha nem!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(int argc, char *argv[]) {
    /* a buktato: argv[0], vagyis a nulladik parancssori argumentum
     * a program neve. ez beleszamit a kapott argumentumok szamaba,
     * ezert pontosan 2 argumentum eseten argc erteke 3 lesz! */
    if (argc == 3)
        printf("Ket parancssori argumentumot kaptam.\n");
    else
        printf("Hiba: nem pontosan ket argumentumot kaptam!\n");
    
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>




<h3>Mini számológép</h3>
<p>Írj programot, amely parancssori argumentumként három valamit vár:
az első és a harmadik egy szám, a középső pedig a +, -, *, / műveleti
jelek egyike! Írja ki a program a képernyőre az elvégzett művelet
eredményét, vagy egy hibaüzenetet, ha az argumentumok bármilyen szempontból
nem elfogadhatóak!</p>

<pre class="screenshot">
frank@hal9000:~$ szamologep 1 / 2
Az eredmeny: 0.5

frank@hal9000:~$ szamologep b + 2
Az elso es a harmadik argumentum legyen szam!

frank@hal9000:~$ szamologep 1 +xyz 2
A masodik argumentum egy muveleti jel legyen!
</pre>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <string.h>

int main(int argc, char *argv[]) {
    double a, b, e;
    
    if (argc != 4) {
        printf("Harom argumentum kell: ket szam, es kozte egy muveleti jel!\n");
        return 1;
    }
    
    /* az argumentumokat sztringkent (!) kapjuk, ezekbol
     * az sscanf-fel kiolvashato a szamertek. */
    if (sscanf(argv[1], "%lf", &a) != 1
        || sscanf(argv[3], "%lf", &b) != 1) {
        printf("Az elso es a harmadik argumentum legyen szam!\n");
        return 1;
    }
    
    if (strlen(argv[2]) != 1) {
        printf("A masodik argumentum egy muveleti jel legyen!\n");
        return 1;
    }
    /* argv[2] a masodik parameter, argv[2][0] annak legelso karaktere. */
    if (argv[2][0] != '+' && argv[2][0] != '-'
        && argv[2][0] != '*' && argv[2][0] != '/') {
        printf("A masodik argumentum egy muveleti jel legyen!\n");
        return 1;
    }
    
    switch (argv[2][0]) {
        case '+': e = a+b; break;
        case '-': e = a-b; break;
        case '*': e = a*b; break;
        case '/': e = a/b; break;
        default: /* lehetetlen */ break;
    }
    
    printf("Az eredmeny: %g\n", e);
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>






<h3>Mátrix négyzetre emelése</h3>

<p>Írj egy programot, amelyik a parancssori paramétereiben vesz át egy négyzet alakú 
mátrixot, és megszorozza azt saját magával! Az eredményt mátrix formában jelenítse meg!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>A következő dolgokra kell figyelni:</p>
<ul>
    <li>A <code>main</code> két paramétere <code>int argc</code> és <code>char *argv[]</code>.
    Az utóbbi a paramétereket tartalmazza sztring formájában, az előbbi pedig a paraméterek
    száma +1. <code>argv[0]</code> a program neve, innen adódik a +1 – erre figyelni
    kell, amikor indexeljük a tömböt, illetve <code>argc</code>-t vizsgáljuk. Ha 1 paraméter
    van, <code>argc</code> értéke 2 lesz!
    <li>Mivel <code>char *argv[]</code> sztringeket tartalmaz, konvertálni kell azokat szám
    formába. Lent nem teszem, de az <code>sscanf</code> függvény visszatérési értéke
    lehetővé tenné ennek ellenőrzését.
</ul>

<p>A memória foglalásoknál meg kell nézni, hogy sikeresek-e. A foglaláshoz lent egy külön 
függvény van, ahol ez jól látszik. A feladat megoldása egyébként elég egyszerű; inkább a lexikai 
tudásból igényel sokat, parancssori argumentumok kezelése stb.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdlib.h>
#include <stdio.h>
#include <math.h>

double **foglal(int meret) {
    double **tomb;
    tomb = (double **) malloc(meret * sizeof(double *));
    if (!tomb) {
        fprintf(stderr, "Memoriafoglalasi hiba\n");
        exit(1);        /* jobb hijan kiugrunk a programbol */
    }
    for (int y = 0; y < meret; ++y) {
        tomb[y] = (double *) malloc(meret * sizeof(double));
        if (!tomb[y]) {
            fprintf(stderr, "Memoriafoglalasi hiba\n");
            exit(1);
        }
    }

    return tomb;
}

void felszabadit(double **tomb, int meret) {
    for (int y = 0; y < meret; ++y)
        free(tomb[y]);
    free(tomb);
}

int main(int argc, char *argv[]) {
    int meret = sqrt(argc - 1);
    /* nezzuk, hogy negyzetszam-e */
    if (meret * meret != argc - 1) {
        fprintf(stderr, "Nem negyzetszam a parameterek szama!\n");
        exit(1);
    }

    double **be = foglal(meret);
    double **ki = foglal(meret);

    /* beolvasas */
    for (int y = 0; y < meret; ++y)
        for (int x = 0; x < meret; ++x)
            sscanf(argv[y * meret + x + 1], "%lf", &be[y][x]);

    // negyzet kiszamitasa - ez a feladat lenyege
    for (int y = 0; y < meret; ++y)
        for (int x = 0; x < meret; ++x) {
            double osszeg = 0;
            int i;
            for (int i = 0; i < meret; ++i)
                osszeg += be[y][i] * be[i][x];

            ki[y][x] = osszeg;
        }

    /* kiiras */
    for (int y = 0; y < meret; ++y) {
        for (int x = 0; x < meret; ++x)
            printf("%8.4lf ", ki[y][x]);
        printf("\n");
    }

    felszabadit(be, meret);
    felszabadit(ki, meret);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>






<?php GyakDia::beginslide("Szöveges fájlok", false, "feladatfajlkezeles"); ?>

<h3>Fájl beolvasása</h3>
<p>Készíts programot, mely az „adat1.txt” fájl tartalmát beolvassa és kiírja a képernyőre!</p>

<h3>Fájl írása</h3>
<p>Készíts programot, mely bekéri a felhasználó nevét, és azt az „adat1.txt” fájlba eltárolja! 
(Ha már létezett a file korábban, írja felül.)</p>

<h3>Hányszor indult?</h3>
<p>Készíts programot, mely induláskor írja ki a képernyőre, hogy hanyadszorra indítják. Az 
indítások számát tárolja az "indit.ini" fájlban. (Ha a file még nem létezik, akkor ez az első 
indítás, ha már létezik, akkor olvassa ki belőle az eddigi indítások számát, adjon hozzá egyet, 
azt írja ki a képernyőre, és tárolja vissza a fájlba.)</p>

<h3>Kisbetűk</h3>
<p>Készíts programot, amely egy megadott fájlt átolvasva kiírja, hogy az angol ABC kisbetűi 
közül melyik hányszor szerepel benne.</p>

<h3>Köbméter</h3>
<p>Egy tóra négyzetrácsot fektetünk, a négyzetrács egyes pontjaiban a tó mélységét tároljuk. 
0-val jelöljük a szárazföldet, negatív számmal a mélységet méterben. Készíts programot, amelyik 
egy ilyen, fájlban adott „térkép” alapján téglatest módszerrel becsli a tó térfogatát. Az egyes 
mérési pontok távolságát kérdezze meg a program a felhasználótól. A fájl első sorában a táblázat 
szélessége és magassága (egész számok), a többi sorokban a táblázat egyes sorai; valós számok 
szóközzel elválasztva.</p>

<h3>Szövegfájl titkosítása</h3>
<p>Készítsünk egy programot, amelyik egy szövegfájlt titkosít. A titkosítás egyszerű: minden 
betű helyett az ABC-ben következőt használjuk, 'z' helyett pedig 'a'-t.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Ez szinte ugyanaz, mint a félév eleji változat, amelyik a billentyűzetről olvasott. Fájlból 
olvasni, fájlba írni semmivel nem nehezebb: minden függvény neve elé még egy f betű kerül (<code>
printf-fprintf</code>, <code>scanf-fscanf</code>), és első paraméter a fájl, amin dolgozni 
kell.</p>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

char kodol(char c) {
    /* ez a ketto specialis, mert "tulpordul" */
    if (c=='z') return 'a';
    if (c=='Z') return 'A';
    /* tobbi kodolando */
    if ((c>='a' && c<'z') || (c>='A' && c<'Z'))
        return c+1;
    /* ha nem ezek, marad valtozatlanul */
    return c;
}

int main(void) {
    FILE *be = fopen("eredeti.txt", "rt");
    if (be == NULL) {
        perror("eredeti.txt megnyitása");
        return 1;
    }
    FILE *ki = fopen("kodolt.txt", "wt");
    if (ki == NULL) {
        perror("kodolt.txt megnyitása");
        return 2;
    }

    /* egyesevel a karakterek */
    int c;
    while ((c = fgetc(be)) != EOF)
        fputc(kodol(c), ki);

    fclose(be);
    fclose(ki);
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Minimumkeresés fájlból, formátumsztringek</h3>
<p>Egy meteorológiai állomás által rögzített hőmérsékleti értékeket fájlban kapjuk. A fájl első 
sorában a mérés napja van, <code>év, szóköz, hónap, szóköz, nap</code> formátumban. A fájl többi 
sora <code>óra, kettőspont, perc, szóköz, hőmérséklet</code> (valós szám) formátumban. Olvassuk 
be a fájlt, és keressük meg, mikor volt a legmelegebb aznap. Írjuk ki az ehhez tartozó órát és 
percet, illetve a hőmérsékletet, <code>2009.09.17.&nbsp;12:08&nbsp;+14.1</code> formátumban.</p>

<p>Példa bemenet:</p>
<pre>
2009 09 17
12:45 11.1
12:59 14.3
04:34 -5
</pre>

<p>Példa kimenet, amely a fenti bemenetre generálódik:</p>
<pre>
2009.09.17. 12:59 +14.3
</pre>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>

int main(void) {
    typedef struct Datum {
        int ev, honap, nap;
    } Datum;
    typedef struct Meres {
        int ora, perc;
        double fok;
    } Meres;

    /* fussunk neki */
    FILE *fbe = fopen("eredmenyek.txt", "rt");
    if (!fbe) {
        perror("eredmenyek.txt: nem sikerult megnyitni a fajlt");
        return 1;
    }

    Datum d;
    Meres beolv, max;
    fscanf(fbe, "%d %d %d", &d.ev, &d.honap, &d.nap);
    /* a maximumkeresesnel az elso megkulonbozteteset
       itt segedvaltozoval oldottam meg */
    bool elso = true;
    while (fscanf(fbe, "%d:%d %lf", &beolv.ora, &beolv.perc, &beolv.fok) == 3) {
        if (elso || beolv.fok > max.fok)
            max = beolv;
        elso = false;
    }
    /* ennyi */
    fclose(fbe);

    /* eredmeny kiirasa, formatumsztring */
    printf("%d.%02d.%02d. %02d:%02d %+g\n",
           d.ev, d.honap, d.nap,
           max.ora, max.perc, max.fok);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Névsor</h3>
<p>Egy fájl hallgatók vizsgajegyeit tartalmazza, Neptun-kód, szóköz, jegy, szóköz, név 
formátumban soronként. Ha a hallgató nem kapott aláírást, a jegy helyén egy mínusz szerepel. 
Készíts programot, amely statisztikát ír ki a vizsgáról. Például:</p>

<pre>
AABB12 5 Tehetséges Béla
CC43EF 4 Pedál Tibi
BBCC34 - Lógós Feri
XYYXY1 4 Ezoterikus János
</pre>

<p>Kimenet:</p>

<pre>
Jeles: 1 fő
Jó: 2 fő
Nem kapott aláírást: 1 fő
</pre>





<h3>Egyszerű preprocesszor</h3>

<p>Írj programot, amely egy egyszerű C preprocesszorként működik. Beolvas egy C forráskódú 
programot, és a <code>#define</code> sorokat értelmezi, illetve a megadott szavakat cseréli. 
(Paraméteres makrókat nem kell felismernie.) Példa bemenet:

<pre>
#define YES 1
#define NO 0
fuggveny(a, YES);
</pre>
<p>Kimenet:</p>
<pre>
fuggveny(b, 1);
</pre>

<p>Az alábbi egyszerűsítésekkel élhetsz. Elegendő, ha a program maximum 100 makrót tud 
megtanulni. A makrók neve legfeljebb 30 betűs, a tartalmuk legfeljebb 200 betűs lehet. A sorok 
maximális hossza 1000 lehet, viszont egy sorban egy makró szerepelhet többször is! 
Feltételezheted, hogy a forráskódban nincsenek sztringek.</p>




<h3>Kommentszűrő szövegfájlból</h3>
<p>Írd át a laboron elkészített kommentszűró állapotgép programodat úgy, hogy parancssori 
paraméterként vegye át a forrás- és célfájl nevét! Nyissa meg a fájlokat szöveges módban, és 
fájlkezelő függvényekkel olvassa és írja a bemenetet és kimenetet! A munka végén ne felejtsd 
bezárni a fájlokat! A kommentektől megszabadított forráskód a kimeneti fájlba, a kommentek 
statisztikáját (komment karakterek, összes karakterek, százalék) pedig a szabványos kimenetre 
írja a program!</p>

<p class="megjegyzes">A szabványos bemenetről olvasó, kimenetre író <code>getchar()</code> és <code>putchar()</code>
függvényeknek van fájlos párja is: ezek neve <code>fgetc()</code> és <code>fputc()</code>.</p>





<?php GyakDia::beginslide("Bináris fájlok"); ?>

<h3>Bináris fájlból C forráskód</h3>
<p>Gyakran praktikus, ha a programjaink bizonyos adatokat nem fájlból olvasnak, hanem a 
lefordított program eleve tartalmazza azokat. Készíts programot, amely bináris fájlt beolvasva 
C-s tömböt készít abból. Például ha egy 8 bájtos bináris fájl a 98, 21, 17, 58, 255, 0, 7, 1 
bájtokat tartalmazza, a program által létrehozott szövegfájl így néz ki:</p>
<pre>
unsigned char adat[] = {
  98, 21, 17, 58, 255, 0, 7, 1,
};
const int adat_len=8;
</pre>
<p>Figyelj arra, hogy a kimeneti fájl tartalmazzon sortöréseket is, vagyis a vesszővel 
elválasztott számok ne nyúljanak túl a 80 karakteres képernyőn! (A C a tömbök kezdeti értékének 
megadásakor megengedi, hogy az utolsó adat után is szerepeljen vessző. A fenti példa is 
ilyen.)</p>




<h3>Fájlok összehasonlítása</h3>
<p>Írj olyan programot, amely két bináris fájlt hasonlít össze, és kiírja az eltérések helyét, 
továbbá az első és második fájlban található különböző bájtokat! Például:
<pre>
poz.  f1 f2
0456  00 12
0ef3  fe fb
</pre>
<p>A nem egyforma méretű fájlokat el se kezdje összehasonlítani!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<p>Az <code>fread()</code> függvénnyel tudunk a fájlból olvasni, és figyelni kell a 
<code>"b"</code> betűre a fájl megnyitásánál.</p>

<p>A fájl méretét megadó függvény a C-ben nincs. Helyette azt csinálhatjuk, hogy a végére 
ugrunk (<code>fseek()</code>), és lekérdezzük a pozíciót (<code>ftell()</code>).</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

/* kulturalt fuggveny: a fajlbol elugrik mashova,
   de vissza is ugrik oda, ahol eredetileg volt */
long meret(FILE *fp) {
    long pos, meret;

    pos = ftell(fp);
    /* 0 bajt a vegehez kepest, az pont a vege */
    fseek(fp, 0, SEEK_END);
    meret = ftell(fp);
    fseek(fp, pos, SEEK_SET);
    return meret;
}

int main(int argc, char *argv[]) {
    if (argc != 3) {
        fprintf(stderr, "Ket fajlnevet kerek!\n");
        return -1;
    }

    FILE* f1 = fopen(argv[1], "rb");
    if (f1 == NULL) {
        perror(argv[1]);
        return 1;
    }
    FILE* f2 = fopen(argv[2], "rb");
    if (f2 == NULL) {
        perror(argv[2]);
        fclose(f1);     /* nagyon kis rendesek vagyunk */
        return 2;
    }

    if (meret(f1) != meret(f2)) {
        fprintf(stderr, "Nem egyforma meretuek!\n");
        fclose(f1);
        fclose(f2);
        return 3;
    }

    /* amig sikerul az elso fajlbol olvasni */
    unsigned char buf1[512], buf2[512];
    size_t beolv, pos;
    pos = 0;
    while ((beolv = fread(buf1, 1, sizeof(buf1), f1)) > 0) {
        /* ennek is mennie kell */
        fread(buf2, 1, sizeof(buf2), f2);

        /* csak annyit hasonlitunk, amennyit beolvastunk! */
        for (int i = 0; i < beolv; i++) {
            if (buf1[i] != buf2[i])
                /* pos: eddig feldolgozott bajtok,
                   +i: a most vizsgalt bajt */
                printf("%08x %02x %02x\n", pos + i, buf1[i], buf2[i]);
        }

        pos += beolv;
    }

    fclose(f1);
    fclose(f2);

    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>RLE betömörítés</h3>

<p>Az RLE (run length encoding) az egyik legegyszerűbb tömörítési algoritmus. Lényege, hogy az 
egymás után következő egyforma bájtokat elég csak egyszer eltárolni, és megjelölni, hogy hányszor
szerepeltek. Ha pedig nem egyforma bájtok követik egymást, azokat simán átmásolja az RLE.</p>

<p> A tömörített adatunkban 0xbf karakterrel jelöljük az ilyen többszörözést. A 0xbf utáni első 
karakter az ismétlendő bájt, az azutáni pedig az ismétlések száma!</p>

<p>Írj programot, amelyik egy megadott fájlt betömörítve egy másik fájlba ír! Figyelj arra, 
hogy ha az eredeti fájlban 0xbf szerepel, azt nem szabad egyszerűen átmásolni, mert akkor a 
kitömörítő algoritmus ismétlés megjelölésének próbálná értelmezni.</p>




<h3>RLE kitömörítés</h3>

<p>Írd meg a fenti program kitömörítő párját.</p>




<h3>RLE tömörítő</h3>

<p>Dolgozd össze az előző két feladat megoldását egy komplett parancssori alkalmazássá! Az 
alkalmazással lehessen betömöríteni és kitömöríteni is fájlokat! Az elvégzendő műveletet az első 
parancssori paraméter, a két fájlnevet (bemenet és kimenet) pedig a második parancssori paraméter
adja meg!</p>

<pre class="screenshot">
C:\> rle betomorit input.dat output.rle

C:\> rle kitomorit output.rle input.dat
</pre>
