Instrukcja instalacji misji:

1. Utwórz baze danych o nazwie "cukiernia".
2. Zaimportuj do stworzonej bazy plik cukiernia.sql.
3. Skopiuj cały folder na serwer.
4. Jako pierwszy otwórz plik index.html.

Przykładowe poprawne odpowiedzi na zadania 1-7:

1. SELECT imie FROM klienci WHERE nazwisko = "Słowiański";
2. SELECT COUNT(szczegóły.id) FROM szczegóły JOIN produkty ON id_produktu = produkty.id WHERE produkty.nazwa = "Tort Shrek";
3. SELECT ROUND(AVG(wypłata), 0) AS średnia FROM pracownicy WHERE nazwisko LIKE "K%" or nazwisko LIKE "P%"
4. SELECT COUNT(id_produktu) FROM szczegóły WHERE id_produktu IN (SELECT produkty.id FROM produkty JOIN rodzaje AS r ON produkty.rodzaj = r.id WHERE r.rodzaj = "ciastko");
5. SELECT z.cena_dostawy FROM klienci JOIN zamówienia AS z ON klienci.id = z.id_klienta WHERE ulica IN ("Jana Sobieskiego", "3 Maja") AND nr_domu in (33, 28, 10);
6. SELECT miasto FROM klienci WHERE id NOT IN (SELECT id_klienta FROM zamówienia) AND ulica = "3 maja";
7. SELECT k.num_tel FROM zamówienia JOIN klienci AS k ON id_klienta = k.id WHERE data_wykonania LIKE "%-02-20";