

<?php GyakDia::beginslide("Állapotgépek", false, "feladatallapotgep"); ?>

<h3>Kettős mássalhangzók</h3>
<p>Készíts kettős mássalhangzó számláló programot!
<p>a.) Írj programot, mely a billentyűzetről érkező karaktereket figyeli,
és megszámolja a beírt szövegben található "ly" és "sz" kettős mássalhangzójú
betűk számát. A szöveget nem tárolhatja el a program, csak a találatok számát.
A szöveg beírása és a számlálás a fájl vége jellel véget ér,
ekkor a program írja ki tételesen az összeszámlált mennyiségeket.
<p>b.) Az előbbi programot egészítsd ki azzal, hogy a "zs" betűket is számolja,
de vigyázz: egy leütött karaktert csak egyetlen kettős mássalhangzójú betűhöz számold,
méghozzá az elsőhöz (pl. "egészség": 1 db "sz", 0 db "zs")!



<h3>Mondatszámláló</h3>
<p>Adja meg egy tetszőleges, standard bemenetről érkező szövegről, hogy
hány mondat van benne. Mondatnak tekintünk minden olyan karaktersorozatot,
amelyik nagybetűvel kezdődik, ponttal, kérdőjellel vagy felkiáltójellel
végződik.</p>



<h3>HTML formátum</h3>
<p>Írj programot, amelyik HTML formátumú fájlból eltávolítja a szedés jelöléseit, vagyis a
&lt;…&gt; szerű karaktersorozatokat, ezzel többé-kevésbé olvashatóvá téve azt normál szövegként.
(Például &lt;br&gt;, &lt;title&gt;).</p>



<h3>Szavak</h3>
<p>Írj olyan programot, amely külön-külön sorokban nyomtatja ki a bemenetére érkező szavakat!</p>

<h3>Szmájli számláló I.</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj állapotgépes programot, amely a szabványos bemenetről olvasott szövegben megszámolja a
szomorú :( és a vidám :) szmájlikat. A számlálás után kiírja, hogy a szöveg vidám, szomorú vagy
közömbös, azaz több, kevesebb vagy ugyanannyi :) volt, mint :(.</p>
<p>Tervezd meg az állapotgépet állapot- és tevékenységtáblával, utána írd meg a programot! A
programra csak akkor jár pont, ha állapotgépes és a leírt állapottáblát valósítja meg.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<table>
<thead>
<tr><th><th> : <th> (<th> ) <th> többi
</thead>
<tr><th>alap <td> &rarr;kp <td> - <td> - <td> -
<tr><th>kp <td> - <td> szom++, &rarr;alap <td> vid++, &rarr;alap <td> &rarr;alap
</table>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    enum Allapot { alap, kp } all;

    all = alap;
    int szom = 0, vid = 0;
    int c;
    while ((c = getchar()) != EOF) {
        switch (all) {
        case alap:
            if (c == ':') all = kp;
            break;
        case kp:
            if (c == ')')      vid++;
            else if (c == '(') szom++;
            if (c != ':') all = alap;
            break;
        }
    }

    if (vid > szom) printf("vidam");
    else if (szom < vid) printf("szomoru");
    else printf("kozombos");

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>








<h3>Szmájli számláló II.</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj állapotgépes programot, amely a szabványos bemenetről olvasott szövegben megszámolja a
szomorú :( és a vidám :) szmájlikat. A számlálás után kiírja, hogy a szöveg vidám, szomorú vagy
közömbös, azaz több, kevesebb vagy ugyanannyi :) volt, mint :(. A szmájlik zárójelenként egynek
számítanak, vagyis :))) három vidámat, :(( két szomorút jelent.</p>
<p>Tervezd meg az állapotgépet állapot- és tevékenységtáblával, utána írd meg a programot! A
programra csak akkor jár pont, ha állapotgépes és a leírt állapottáblát valósítja meg.</p>
<?php GyakDiaElemek::megoldasettol(); ?>

<table>
<thead>
<tr><th><th> : <th> (<th> ) <th> többi
</thead>
<tr><th>alap <td> &rarr;kp <td> - <td> - <td> -
<tr><th>kp <td> - <td> szom++ <td> vid++ <td> &rarr;alap
</table>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    enum Allapot { alap, kp } all;

    all = alap;
    int szom = 0, vid = 0;
    int c;
    while ((c = getchar()) != EOF) {
        switch (all) {
        case alap:
            if (c == ':') all = kp;
            break;
        case kp:
            if (c == ')')   vid++;
            else if (c == '(') szom++;
            else if (c != ':') all = alap;
            break;
        }
    }

    if (vid > szom) printf("vidam");
    else if (szom < vid) printf("szomoru");
    else printf("kozombos");

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Sz és zs számláló</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj állapotgépes programot, amely a szabványos bemenetről olvasott szövegben megszámolja az
„sz” és a „zs” betűket! (Hosszú ssz és zzs is egynek számítanak, azokkal külön nem kell
foglalkozni.) A számlálás után írd ki a szabványos kimenetre mindkettő darabszámát!</p>
<p>Tervezd meg az állapotgépet állapot- és tevékenységtáblával, utána írd meg a programot! A
programra csak akkor jár pont, ha állapotgépes és a leírt állapottáblát valósítja meg.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<table>
<thead>
<tr> <th> <th> s <th> z <th> többi
</thead>
<tr> <th>alap <td> &rarr;svolt <td> &rarr;zvolt <td> -
<tr> <th>svolt <td> - <td> sz++, &rarr;alap <td> &rarr;alap
<tr> <th>zvolt <td> zs++, &rarr;alap <td> - <td> &rarr;alap
</table>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    enum Allapot { alap, svolt, zvolt } all;
    int c, sz, zs;

    all = alap;
    sz = zs = 0;

    while ((c = getchar()) != EOF) {
        switch (all) {
        case alap:
            if (c == 's') all = svolt;
            else if (c == 'z') all = zvolt;
            break;
        case svolt:
            if (c == 'z') sz++;
            if (c != 's') all = alap;
            break;
        case zvolt:
            if (c == 's') zs++;
            if (c != 'z') all = alap;
            break;
        }
    }

    printf("sz: %d, zs: %d\n", sz, zs);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>

<h3>Dzs számláló</h3>
<div class="sticky">Kis ZH volt</div>
<p>Írj állapotgépes programot, amely a szabványos bemenetről olvasott szövegben megszámolja a
„dzs” betűket! (Hosszú ddzs egynek számít, nem kell külön foglalkozni vele.) A számlálás után
írd ki a szabványos kimenetre a darabszámot!</p>
<p>Tervezd meg az állapotgépet állapot- és tevékenységtáblával, utána írd meg a programot! A
programra csak akkor jár pont, ha állapotgépes és a leírt állapottáblát valósítja meg.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<table>
<thead>
<tr><th> <th> d <th> z <th> s <th> többi
</thead>
<tr><th> alap <td> &rarr;dvolt <td> - <td> - <td> -
<tr><th>dvolt <td> - <td> &rarr;dzvolt <td> &rarr;alap <td> &rarr;alap
<tr><th> dzvolt <td> &rarr;dvolt <td> &rarr;alap <td> dzs++, &rarr;alap <td> &rarr;alap
</table>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    enum Allapot { alap, dvolt, dzvolt } all;

    all = alap;
    int dzs = 0;
    int c;
    while ((c = getchar()) != EOF) {
        switch (all) {
        case alap:
            if (c == 'd') all = dvolt;
            break;
        case dvolt:
            if (c == 'd') ;
            else if (c == 'z') all = dzvolt;
            else all = alap;
            break;
        case dzvolt:
            if (c == 's') dzs++;
            if (c == 'd') all = dvolt;
            else all = alap;
            break;
        }
    }

    printf("dzs: %d\n", dzs);

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Sztringek belseje I.</h3>
<p>A négy állapotos C kommentszűrő program (lásd a vonatkozó órai feladatot) nem működik tökéletesen.
Ugyanis ez a kód nem tartalmaz kommentet:</p>
<?php Highlighter::c(<<<'EOT'
printf("/* ez nem komment. */\n");
EOT
); ?>
<p>Javítsd ki úgy az állapotgéped, hogy kezelje ezt is!</p>




<h3>Sztringek belseje II.</h3>
<p>Hol van vége egy sztringnek? Nem az indító idézőjel utáni következő idézőjel
karakternél:</p>
<?php Highlighter::c(<<<'EOT'
printf("A program azt irja ki, hogy \"Hello, /* nem komment */ vilag\".\n");
EOT
); ?>
<p>Fejleszd tovább az előző feladat állapotgépét eszerint!</p>



<h3>Kommentben komment</h3>
<p>A C szabvány tiltja a <code>/* */</code> kommentek egymásba ágyazását. (Tetszőleges
mélységben egymásba ágyazott kommenteket nem lehetne állapotgéppel feldolgozni.)
Éppen ezért, ha a fordítók kommentben kommentet látnak, figyelmeztető hibajelzést szoktak
adni. Egészítsd úgy ki a kommentszűrő programodat, hogy írjon ki hibaüzenetet, ha
komment belsejében <code>/*</code> karaktersorozatot talál!</p>




<h3>Multifilter</h3>

<p>Írd át a kommentszűró programot úgy, hogy ne csak a <code>/*</code> és <code>*/</code>
karakterpárokra működjön, hanem tetszőleges karakterpárokra! Pl. a Pascal nyelvben a kommenteket
<code>(*</code> és <code>*)</code> karakterekkel is lehetett jelölni. A kezdő- és végpárokat a
felhasználó egy konfigurációs fájlban (multifilter.ini) adhassa meg a programnak! A program
ellenőrizze, hogy létezik-e a fájl, és ha nem, adjon hibajelzést, majd lépjen ki! (Ha sikerült
megnyitnia a fájlt, abban négy karakternek kell lennie; a nyitó kombinációnak, két karakter, és
a záró kombinációnak, újabb két karakter. C-hez a fájlban <code>/**/</code> lenne, Pascalhoz
<code>(**)</code>.)</p>






<h3>C++ komment</h3>
<div class="sticky">Kis ZH volt</div>
<p>A feladat a szabványos bemenetről érkező szövegben (fájl vége jelig) megszámolni, hogy hány
C++ komment van benne, és a darabszámot kiírni. A C++ komment két / (per) jellel kezdődik, és a
sor végéig tart, pl.:
<pre>printf("Hello"); // Üdvözlet</pre>
Ha C++ kommenten belül van „//” karakterpár, az nem növeli a kommentek számát. Készíts
állapotgépes modellt állapottábla és tevékenységtábla megadásával, majd valósítsd meg C program
formájában!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int c, szaml = 0;
    enum Allapot { kod, pervolt, komment } all;
    all = kod;
    while ((c = getchar()) != EOF) {
        switch (all) {
            case kod:
                if (c == '/')
                    all = pervolt;
                break;
            case pervolt:
                if (c == '/') {
                    szaml++;
                    all = komment;
                } else
                    all = kod;
                break;
            case komment:
                if (c == '\n')
                    all = kod;
                break;
        }
    }
    printf("%d darab komment", szaml);
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>


<h3>Haskell komment</h3>
<div class="sticky">Kis ZH volt</div>
<p>A feladat a szabványos bemenetről érkező Haskell nyelvű programkódban megszámolni, hogy hány
komment van benne, és a darabszámot kiírni. A szöveg végét fájl vége jelzi. A Haskell komment
két - (mínusz) jellel kezdődik, és a sor végéig tart, pl.:
<pre>lesser = filter (&lt; p) xs -- kivalogatja a p-nel kisebbeket</pre>
Ha a kommenten belül van „--” karakterpár, az nem növeli a kommentek számát. Készíts
állapotgépes modellt állapottábla és tevékenységtábla megadásával, majd valósítsd meg C program
formájában!</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    int c, szaml = 0;
    enum Allapot { kod, minuszvolt, komment } all;
    all = kod;
    while ((c = getchar()) != EOF) {
        switch (all) {
            case kod:
                if (c == '-')
                    all = minuszvolt;
                break;
            case minuszvolt:
                if (c == '-') {
                    szaml++;
                    all = komment;
                } else
                    all = kod;
            case komment:
                if (c == '\n')
                    all = kod;
                break;
        }
    }
    printf("%d darab komment", szaml);
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Üres sorok száma</h3>
<div class="sticky">Kis ZH volt</div>
<p>A feladat a szabványos bemenetről érkező szövegben (fájl vége jelig) megszámolni, hogy hány
üres sor van benne. A szöveget a szabványos kimenetre ki is kell írni változatlanul, majd a
szöveg után az üres sorok darabszámát. Üres sornak számít az, amiben nincs karakter, de az is,
amiben csak szóközök vannak. Készíts állapotgépes modellt állapottábla és tevékenységtábla
megadásával, majd valósítsd meg C program formájában!</p>


<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    enum Allapot { soreleje, sorbelseje } all = soreleje;
    int c, szaml = 0;
    while ((c = getchar()) != EOF) {
        putchar(c);
        switch (all) {
            case soreleje:
                if (c == '\n')
                    szaml++;
                else if (c != ' ')
                    all = sorbelseje;
                break;
            case sorbelseje:
                if (c == '\n')
                    all = soreleje;
                break;
        }
    }
    printf("%d ures sor volt.", szaml);
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>C sztring feldolgozása</h3>
<div class="sticky">Kis ZH volt</div>
<p>A feladat a szabványos bemenetről érkező C sztring feldolgozása: a szövegben szereplő \n, \t
és \" karakterpárokat a megfelelő karakterrel (újsor, tabulátor, idézőjel) helyettesíteni, és úgy
írni a szabványos kimenetre. (Egyéb \+karakter párok nem szerepelnek a sztringben, kezelésük
tetszőleges.) Készíts állapotgépes modellt állapottábla és tevékenységtábla megadásával, majd
valósítsd meg C program formájában! Pl. be:</p>
<pre>
hello \n    \"világ\"
</pre>
<p>ki:</p>
<pre>
hello
    "világ"!
</pre>


<?php GyakDiaElemek::megoldasettol(); ?>
<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    enum Allapot { alap, visszaper } all = alap;
    int c;
    while ((c = getchar()) != EOF) {
        switch (all) {
            case alap:
                if (c == '\\')
                    all = visszaper;
                else
                    putchar(c);
                break;
            case visszaper:
                switch (c) {
                    case 'n':
                        putchar('\n');
                        break;
                    case 't':
                        putchar('\t');
                        break;
                    case '"':
                        putchar('"');
                        break;
                }
                all = alap;
                break;
        }
    }
    return 0;
}
EOT
); ?>
<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>A1llapotge1p</h3>

<p>A számítástechnika hőskorában nem lehetett magyar nyelvű
billentyűzetet kapni.
Magyar nyelvű, ékezetes szövegeket azonban akkor is kellett
írni. Az egyik szövegfeldolgozó program úgy oldotta meg a problémát,
hogy az adott, ékezet nélküli magánhangzó után tett 1-es, 2-es és
3-as számjegyekkel jelezte a különféle ékezeteket. Az 1-es
jelezte a hosszú magánhangzót (pl. á = a1), a 2-es a két pontot
(pl. ö = o2), és a 3-as a csak a magyar nyelvben előforduló
hosszú ő és ű betű jelölésére szolgált (pl. ő = o3).</p>

<p>Írj állapotgépes programot, amely egy ilyen módon kódolt
szöveget átalakít rendes, ékezetes szöveggé!</p>

<p>Gondolkodtató részfeladatok:</p>

<ul>
    <li>Oldd meg, hogy hibás bemeneti kombinációkra hibajelzést
        adjon a program! Pl. az a2 kombináció hibás, mivel az ä betűt
        jelentené, amely viszont a magyar nyelvben nem használatos.
    <li>Érdemes minden magánhangzónak külön állapotot létrehozni?
        Ne felejtsd el, hogy összesen tíz állapotra vonatkozik ez a
        kérdés, hiszen nem csak az a, e, i, o és u karakterek után
        jelentenek mást az 1, 2 és 3 számjegyek, hanem az A, E, I, O és
        U karakterek után is. Lehetne valahogy paraméterezni az állapotokat?
</ul>






<h3>C++ kommentszűrő</h3>

<p>A C++ nyelvben a kommentek a <code>//</code> karakterekkel kezdődnek, és a sor végéig tartanak.
(Természetesen az egy <code>/</code> továbbra is osztást jelent.) Ezt a fajta kommentet olyan
kényelmesnek találta mindenki, hogy szép lassan a C-be is beépítették: a nyelv 1999-es, C99
szabványa már ismeri azt.</p>

<p>Írj programot, amelyik a szabványos bemenetén érkező, <code>//</code>-es kommenteket tartalmazó
forráskódból kiszűri a kommenteket! Figyelj arra, hogy ettől a program tördelése ne változzon meg:
ami eredetileg két sorba volt törve, az a kimeneten is így szerepeljen.</p>

<?php GyakDiaElemek::megoldasettol(); ?>
<table>
    <thead>
    <tr><th><th>/<th>\n<th>egyéb
    </thead>
    <tr><th>alap<td>&rarr;per<td>ki: c<td>ki: c
    <tr><th>per<td>komment<td>ki: /, \n<br>&rarr;alap<td>ki: /, c<br>&rarr;alap
    <tr><th>komment<td>-<td>ki: \n<br>&rarr;alap<td>-
</table>
<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>C++ komment &rarr; C komment</h3>

<p>Egy C99 szabvány szerinti, <code>//</code>-es kommenteket is tartalmazó forráskódot szeretnénk
lefordítani egy nagyon régi C fordítóval, amely csak a <code>/*</code>-os kommenteket ismeri.
Alakítsd át úgy az előző kommentszűrődet, hogy a kitörlés helyett tartsa meg a <code>//</code>-es
kommenteket, de alakítsa át azokat <code>/*</code>-os formára!</p>

<p>Pl. ha a bemenete ilyen:</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    printf("Helló világ!\n");   // Üdvözlet
    return 0;
}
EOT
); ?>

<p>Akkor a kimenete legyen ilyen:</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>

int main(void) {
    printf("Helló világ!\n");   /* Üdvözlet */
    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A megtalált komment elejénél kiír egy <code>/*</code> karaktersorozatot. A komment belsejében minden
karaktert kiír (ahogy máskor is). A komment végén, az újsor a karakternél pedig kiírja a bezáró
<code>*/</code>-ot, és persze az újsort is (hogy a forráskód tördelése ne változzon).</p>

<table>
    <thead>
    <tr><th><th>/<th>\n<th>egyéb
    </thead>
    <tr><th>alap<td>&rarr;per<td>ki: c<td>ki: c
    <tr><th>per<td>ki: /*<br>&rarr;komment<td>ki: /, \n<br>&rarr;alap<td>ki: /, c<br>&rarr;alap
    <tr><th>komment<td>ki: c<td>ki: */\n<br>&rarr;alap<td>ki: c
</table>

<?php GyakDiaElemek::megoldaseddig(); ?>



<h3>Kommentszűrő táblázattal</h3>

<p>Dolgozd át a fenti kommentszűrő programot úgy, hogy a program kódjában
is táblázatos állapotgép szerepeljen: <?php GyakMenuInfo::a_href(
"eaallapotgep", "lásd az előadásanyagot"); ?>.</p>





<h3>Rövidítések</h3>
<p>Írjunk állapotgépes mondatot, amely a soronkért beírt tulajdonnevekből
rövidítéseket csinál. Írja ez ki minden szó első betűjét. Pl.</p>
<pre class="screenshot">
Budapesti Muszaki Egyetem
BME
Elektronikus Eszkozok Tanszeke
EET
</pre>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A tervezés két állapotot ad: azt, amikor várunk a szó első
betűjére (mert azt kell kiírni), és azt, amikor egy szó belsejében vagyunk.</p>

<table>
    <thead>
    <tr><th><th>szóköz<th>\n<th>egyéb
    </thead>
    <tr><th>szóra vár<td>-<td>-<td>ki: c<br>&rarr;szóban
    <tr><th>szóban<td>&rarr;szóra vár<td>ki: \n<br>&rarr;szóra vár<td>-
</table>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <ctype.h>

int main(void) {
    enum Allapot { szora_var, szoban };
    
    int c;
    enum Allapot all;
    
    all=szora_var;
    while ((c=getchar()) != EOF) {
        switch (all) {
            case szora_var:
                if (!isspace(c)) {
                    putchar(c);
                    all=szoban;
                }
                break;
            case szoban:
                if (c=='\n')
                    putchar(c);
                if (isspace(c))
                    all=szora_var;
                break;
        }
    }
    
    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>





<h3>Mondat második szava</h3>

<p>Tervezz állapotgépes programot, amelyik a szabványos bemeneten olvasott szövegből minden 
mondat második szavát írja csak ki! Jelenjenek meg ezek a szavak külön sorban!</p>

<?php GyakDiaElemek::megoldasettol(); ?>

<p>A tervezést az „új mondat” állapotnál kell kezdeni. Ide kell kerülnie egy bejövő pont, 
felkiáltójel vagy kérdőjel karakter hatására a gépnek – de az induláskor is. Ettől meg kell 
különböztetni az „első szó” állapotot, amelybe akkor kerülünk, amikor az első, szó betűjeként 
értelmezhető karaktert megkapjuk. Innen a „második szóra vár” állapotba egy újabb szóköz (vagy 
szóelválasztó) hatására kerülünk. Ez még nem a „második szó” állapot, ahol majd ki kell írni a 
beolvasott betűket (és ahonnan tovább ugrunk egy újabb szóelválasztó hatására), hiszen itt még 
sok szóelválasztó jöhet (pl. szóköz), ami még nem jelenti a második szó elkezdését. Ha betűt 
kapunk, az viszont már igen, és az a második szó első betűje kell legyen, ezért ki is írjuk. 
Azután egy újabb szóelválasztó hatására onnantól „mondat vége” állapotban működik tovább a gép, 
és már nem figyel semmire, csak várja a következő mondatelválasztó karaktert, amely hatására 
minden elölről kezdődik.</p>

<table>
    <thead>
    <tr><th><th>. ! ?<th>szóköz \n , : ;<th>egyéb
    </thead>
    <tr><th>új mondat<td>-<td>-<td>&rarr;első szó
    <tr><th>első szó<td>&rarr;új mondat<td>&rarr;második szóra vár<td>-
    <tr><th>második szóra vár<td>&rarr;új mondat<td>-<td>kiír: c<br>&rarr;második szó
    <tr><th>második szó<td>&rarr;új mondat<td>&rarr;mondat vége<br>kiír: \n<td>kiír: c
    <tr><th>mondat vége<td>&rarr;új mondat<td>-<td>-
</table>

<p>Érdemes a mondatelválasztó és a szóelválasztó karakter felismeréséhez
segédfüggvényeket írni.</p>

<?php Highlighter::c(<<<'EOT'
#include <stdio.h>
#include <stdbool.h>

/* Igazzal tér vissza, ha a karakter mondat végét jelzi. */
bool mondatvege_jel(int c) {
    return c == '!' || c == '.' || c == '?';
}

/* Igaz, ha a karakter szó végét jelzi. Nem csak szóköz lehet,
 * hanem pl. vessző, pontosvessző is. */
bool szovege_jel(int c) {
    return c == ' ' || c == '\n' || c == ':' || c == ',' || c == ';';
}

int main(void) {
    enum Allapot { ujmondat, elsoszo, masodikszoravar, masodikszo, mondatvege };

    int c;
    enum Allapot all = ujmondat;

    while ((c = getchar()) != EOF) {
        switch (all) {
        case ujmondat:
            if (!mondatvege_jel(c) && !szovege_jel(c))
                all = elsoszo;
            break;
        case elsoszo:
            if (mondatvege_jel(c))
                all = ujmondat;
            else if (szovege_jel(c))
                all = masodikszoravar;
            break;
        case masodikszoravar:
            if (mondatvege_jel(c))
                all = ujmondat;
            else if (!szovege_jel(c)) {
                putchar(c);
                all = masodikszo;
            }
            break;
        case masodikszo:
            if (mondatvege_jel(c))
                all = ujmondat;
            else if (szovege_jel(c)) {
                putchar('\n');
                all = mondatvege;
            }
            else
                putchar(c);
            break;
        case mondatvege:
            if (mondatvege_jel(c))
                all = ujmondat;
            break;
        }
    }

    return 0;
}
EOT
); ?>

<?php GyakDiaElemek::megoldaseddig(); ?>
