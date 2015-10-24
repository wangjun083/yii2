Czym jest Yii
=============

Yii jest wysoko wydajnym, opartym na komponentach frameworkiem PHP do szybkiego programowania 
<<<<<<< HEAD
nowoczesnych stron internetowych. Nazwa Yii (wymawiana [ji:]) oznacza w języku chińskim "prosto i ewolucyjnie".
Może to być również rozumiane jako akronim dla **Yes It Is**!


Dla jakich zastosowań Yii jest najlepszy?
-----------------------------------------

Yii jest frameworkiem ogólnego przeznaczenia, co oznacza, że może być wykorzystany do stworzenia 
każdego rodzaju aplikacji internetowych korzystających z PHP. Z uwagi na architekturę 
opartą na komponentach i zaawansowane wsparcie dla mechanizmów pamięci podręcznej jest on odpowiedni
do tworzenia rozbudowanych aplikacji, takich jak: portale, fora, systemy zarządzania treścią (CMS),
projekty komercyjne (e-sklepy), usługi sieciowe i inne.


Jak wygląda porównanie Yii z innymi frameworkami?
-------------------------------------------------

Jeśli korzystałeś już z innych frameworków, na pewno docenisz, jak Yii wypada na ich tle:

* Jak większość frameworków, Yii wykorzystuje architekturę MVC (Model-Widok-Kontroler) i wspiera organizację kodu zgodną z tym wzorcem.
* Yii opiera się na filozofii, która mówi, że kod powinien być napisany w prosty, ale jednocześnie elegancki sposób. Yii nigdy nie będzie upierać się przy przeprojektowaniu 
kodu jedynie w celu dokładnego trzymania się zasad wzorca projektowego.
* Yii jest w pełni rozwiniętym frameworkiem dostarczającym sprawdzonych i gotowych do użycia funkcjonalności: konstruktorów zapytań
oraz ActiveRecord dla baz danych relacyjnych i NoSQL, wsparcia dla tworzenia RESTful API oraz wielopoziomowych mechanizmów pamięci podręcznej i wielu, wielu innych.
* Yii jest ekstremalnie rozszerzalny. Możesz dostosować lub wymienić praktycznie każdy fragment podstawowego kodu. 
Dodatkowo Yii wykorzystuje architekturę rozszerzeń, dzięki czemu możesz w prosty sposób stworzyć i opublikować swoje własne moduły i widżety.
* Podstawowym celem, do którego Yii zawsze dąży, jest wysoka wydajność.

Yii nie jest efektem pracy pojedynczego programisty - projekt wspiera zarówno [grupa doświadczonych deweloperów][about_yii], jak i ogromna społeczność programistyczna, nieustannie 
przyczyniając się do jego rozwoju. Deweloperzy trzymają rękę na pulsie najnowszych trendów Internetu, za pomocą prostych i eleganckich interfejsów wzbogacając Yii w najlepsze sprawdzone 
rozwiązania i funkcjonalności, dostępne w innych frameworkach i projektach.

 
Wersje Yii
----------

Yii aktualnie dostępny jest w dwóch głównych wersjach: 1.1 i 2.0. Wersja 1.1 jest kodem starszej generacji, obecnie w fazie utrzymaniowej. 
Wersja 2.0 jest całkowicie przepisaną wersją Yii z uwzględnieniem najnowszych protokołów i technologii, takich jak Composer, PSR, przestrzenie nazw, traity i wiele innych.
2.0 reprezentuje aktualną generację frameworka i na niej skupi się głównie praca programistów w ciągu najbliższych lat. 
Ten przewodnik opisuje wersję 2.0.


Wymagania i zależności
----------------------

Yii 2.0 wymaga PHP w wersji 5.4.0 lub nowszej. Aby otrzymać więcej informacji na temat wymagań i indywidualnych funkcjonalności, 
uruchom specjalny skrypt testujący system `requirements.php`, dołączony w każdym wydaniu Yii.

Używanie Yii wymaga podstawowej wiedzy o programowaniu obiektowym w PHP (OOP), ponieważ Yii
jest frameworkiem czysto obiektowym. Yii 2.0 wykorzystuje ostatnie udoskonalenia w PHP, jak 
[przestrzenie nazw](http://www.php.net/manual/pl/language.namespaces.php) i [traity](http://www.php.net/manual/pl/language.oop5.traits.php). 
Zrozumienie tych konstrukcji pomoże Ci szybciej i łatwiej rozpocząć pracę z Yii 2.0.

=======
nowoczesnych stron internetowych. Nazwa Yii (wymawiana [ji:]) znaczy po chińsku "prosto i ewolucyjnie".
Może to być również rozumiane jako akronim dla Yes It Is!


Do czego Yii jest najlepsze ?
=============================

Yii jest frameworkiem www ogólnego przeznaczenia, co znaczy że może być użyte do kodowania 
wszystkich rodzajów aplikacji webowych używających PHP. Z uwagi na architekturę 
opartą na komponentach i wyrafinowane wsparcie dla mechanizmów buforowania, jest on odpowiedni
do tworzenia wielkich aplikacji jak portale, fora, systemy zarządzania treścią (CMS),
projekty komercyjne (e-sklepy), usługi webowe i inne.

Jak wygląda porównanie Yii z innymi frameworkami ?
==================================================

Jeśli już znasz inny framework, możesz docenić następujące cechy:

* Jak wiele frameworków, Yii implementuje architekturę MVC (model-widok-kontroller)
i wspiera organizację kodu zgodną z tym wzorcem.
* Yii opiera się na filozofii że kod powinien być pisany prosto i elegancko. Yii nie próbuje przeprojektowywać 
rzeczy tylko w celu dokładnego odwozowania wzorca projektowego.
* Yii jest pełnym frameworkiem dostarczającym sprawdzone i gotowe do użycia funkcjonalności: konstruktory zapytań
i ActiveRecord dla baz danych relacyjnych oraz NoSql; wsparcie dla RESTFull API; 
wielostopniowe wsparcie dla buforowania; i więcej.
* Yii jest niezwykle rozszerzalne. Możesz dostosować lub zmienić prawie każdy fragment rdzennego kodu. Możesz wykorzystać architekturę rozszerzeń, aby używać lub tworzyć łatwe do rozpowszechniania rozszerzenia.
* Wysoka wydajność jest zawsze głównym celem w Yii.

 
Wersje Yii
==========

Yii ma aktualnie <i>(2014-12-28 - przyp tłumacza)</i> rozpowszechniane dwie główne wersje: 1.1 i 2.0. Wersja 1.1 jest starszej generacji <i>(dla PHP 5.1)</i>
i jest w fazie utrzymaniowej. Wersja 2.0 jest całkowiecie przepisaną wersją Yii uwzględniającą
najnowsze technologie i protokoły, w tym Composer,PSR,przestrzenie nazw, traity i więcej.
Wersja 2.0 reprezentuje aktualną generację frameworka i otrzyma największe wsparcie programistów
przez najbliższe lata. Ten podręcznik jest wyłącznie o wersji 2.0.

Wymagania i zależności
======================

Yii 2.0 wymaga PHP 5.4.0 lub nowszego. Dokładniejsze wymagania dla konkretnych funkcjonalności
możesz sprawdzić uruchamiając tester wymagań `requirements.php` dołączony w każdym wydaniu Yii.

Używanie Yii wymaga podstawowej wiedzy o programowaniu obiektowym w PHP (OOP), ponieważ Yii
jest frameworkiem czysto obiektowym. Yii 2.0 wykorzystuje ostatnie udoskonalenia w PHP, jak 
przestrzenie nazw i traity. Zrozumienie tych konstrukcji pomoże ci łatwiej zdecydować się na Yii 2.0.

.
>>>>>>> official/master
