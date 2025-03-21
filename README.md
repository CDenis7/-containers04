# Scopul lucrării

Dupa executarea acestei lucrări, vom fi capabili să pregătim un container pentru a rula un site web bazat pe Apache HTTP Server + PHP (mod_php) + MariaDB.

# Sarcina

Creați un fișier Dockerfile pentru a construi o imagine a containerului care va conține un site web bazat pe Apache HTTP Server + PHP (mod_php) + MariaDB. Baza de date MariaDB trebuie să fie stocată într-un volum montat. Serverul trebuie să fie disponibil pe portul 8000.

Instalați site-ul WordPress. Verificați funcționarea site-ului.

# Pregătire

Pentru a efectua această lucrare, trebuie să am instalat pe computer Docker.

De asemenea, trebuie să am experiență în efectuarea lucrării de laborator nr. 3

# Executare

Am creat un depozit de cod sursă containers04 și l-am clonat pe computer.

![image](https://github.com/user-attachments/assets/2f05f3a4-5224-453b-857d-4b82f59402c5)

extragerea fișierelor de configurare apache2, php, mariadb din container

Creaam în directorul containers04 un director files, precum și

    directorul files/apache2 - pentru fișierele de configurare apache2;
    directorul files/php - pentru fișierele de configurare php;
    directorul files/mariadb - pentru fișierele de configurare mariadb.

![image](https://github.com/user-attachments/assets/a415e557-da34-45cf-8e0b-cea744589008)


Creeam în directorul containers04 fișierul Dockerfile cu următorul conținut:

![image](https://github.com/user-attachments/assets/a5ecb348-d9af-4b30-9b0b-e731fa5654a0)

Construim o imagine a containerului cu numele apache2-php-mariadb.

![image](https://github.com/user-attachments/assets/bda61847-f903-478c-ab3b-3314aadd7d1e)

Creeam un container apache2-php-mariadb din imaginea apache2-php-mariadb și il pornim în modul de fundal cu comanda bash.

![image](https://github.com/user-attachments/assets/b9adaea5-2e28-4b31-93d5-32d592b252c7)

Copiam din container fișierele de configurare apache2, php, mariadb în directorul files/ de pe computer. Pentru a face acest lucru, în contextul proiectului, executam comenzile:

![image](https://github.com/user-attachments/assets/f73189f7-a1f1-4233-bdd2-15af9c420726)

După executarea comenzilor, în directorul files/ ar trebui să apară fișierele de configurare apache2, php, mariadb. Verificam dacă acestea există. Oprim și ștergem containerul apache2-php-mariadb.

![image](https://github.com/user-attachments/assets/02473ee4-def1-4657-b2c2-3e94a8bcd3ee)

# Configurarea

# Fișierul de configurare apache2

Deschidem fișierul files/apache2/000-default.conf, găsim linia #ServerName www.example.com și o înlocuim cu ServerName localhost.

Găsim linia ServerAdmin webmaster@localhost și înlocuim adresa de e-mail cu a noastra.

După linia DocumentRoot /var/www/html adăugam următoarea linie:

DirectoryIndex index.php index.html

![image](https://github.com/user-attachments/assets/70e545a8-1ccf-4c3c-91f8-172def8954e0)

Salvam fișierul și il închidem.

La sfârșitul fișierului files/apache2/apache2.conf adăugam următoarea linie:

ServerName localhost

![image](https://github.com/user-attachments/assets/968a4ab0-6f45-445a-8a2b-7c4fd30f7755)

# Fișierul de configurare php

Deschidem fișierul files/php/php.ini, găsim linia ;error_log = php_errors.log și o înlocuim cu error_log = /var/log/php_errors.log.

![image](https://github.com/user-attachments/assets/17c2354a-be71-4b5a-a9a9-2f29f61cb503)

Setam parametrii memory_limit, upload_max_filesize, post_max_size și max_execution_time astfel:

memory_limit = 128M

upload_max_filesize = 128M

post_max_size = 128M

max_execution_time = 120

![image](https://github.com/user-attachments/assets/136ec2bf-9137-4f25-b47e-1db2bd9cc13d)

Salvam fișierul și il închidem.

# Fișierul de configurare mariadb

Deschidem fișierul files/mariadb/50-server.cnf, găsim linia #log_error = /var/log/mysql/error.log și eliminam # din fața ei.

![image](https://github.com/user-attachments/assets/a9ffa26d-042d-4141-9692-9e868a42be95)

Salvaam fișierul și il închidem.

# Crearea scriptului de pornire

In directorul files cream directorul supervisor si fisierul supervisord.conf cu urmatorul continut:

![image](https://github.com/user-attachments/assets/887dce95-4637-4f4d-948a-1d5abce3b774)

# Crearea Dockerfile

Deschidem fișierul Dockerfile și adăugam următoarele linii:

 ![image](https://github.com/user-attachments/assets/23499efe-5cae-4e90-a468-0b69566c628f)

Cream imaginea containerului cu numele apache2-php-mariadb 

![image](https://github.com/user-attachments/assets/8f4e15d6-9633-4a7d-b0ec-d192614b9ff1)

și pornim containerul apache2-php-mariadb din imaginea apache2-php-mariadb.

![image](https://github.com/user-attachments/assets/dabd4a10-7153-4cc1-a972-26298ae5634e)

Verificam dacă site-ul WordPress este disponibil la adresa http://localhost/. 

![image](https://github.com/user-attachments/assets/e75d2edf-09ec-4bf2-a5db-e1f112588841)

Verificam dacă in directorul /var/www/html/ există fișierele site-ului WordPress. 

![image](https://github.com/user-attachments/assets/56ca7605-004a-427f-a586-5dd77b5251cc)

Verificam dacă fișierele de configurare apache2, php, mariadb sunt modificate

![image](https://github.com/user-attachments/assets/8e1c9c26-be3c-44a3-8d52-ff7078bbf846)

![image](https://github.com/user-attachments/assets/33f79069-44a3-41bc-b5f1-c46dcc26d62d)

# Crearea bazelor de date și a utilizatorului pentru WordPress

Crearea bazelor de date și a utilizatorului pentru WordPress se face în containerul apache2-php-mariadb. Pentru a face acest lucru,ne conectam la containerul apache2-php-mariadb și executam comenzile:

![image](https://github.com/user-attachments/assets/63da1cc1-2e12-4ba6-ad40-c8795174c3e5)

# Crearea fișierului de configurare WordPress

Deschidem în browser site-ul WordPress la adresa http://localhost/ și urmam instrucțiunile pentru instalarea site-ului WordPress. La pasul 2, specificam următoarele date:

![image](https://github.com/user-attachments/assets/b4dc8258-92ba-4eb5-bcb9-8219586b0709)

Din urmatorul pas copiem conținutul fișierului wp-config.php și il salvam în fișierul files/wp-config.php.

![image](https://github.com/user-attachments/assets/a5bfe107-b1cd-4aff-83c9-e3b5b126cbc2)

# Adăugarea fișierului de configurare WordPress în Dockerfile

Adăugam în fișierul Dockerfile următoarele linii:

![image](https://github.com/user-attachments/assets/00866a70-b9a5-4e4c-a887-e1797d11da70)

# Pornirea și testarea

Recream imaginea containerului cu numele apache2-php-mariadb și pornițim containerul apache2-php-mariadb din imaginea apache2-php-mariadb. Verificam funcționarea site-ului WordPress.

![image](https://github.com/user-attachments/assets/1c66d6a5-f78c-486d-a404-7cf04f456e81)

![image](https://github.com/user-attachments/assets/726b08af-d6f6-4e0c-bede-3a94c50a5a22)

1 Ce fișiere de configurare au fost modificate?

000-default.conf (Apache)

apache2.conf (Apache)

php.ini (PHP)

50-server.cnf (MariaDB)

wp-config.php (WordPress)

2 Pentru ce este responsabilă instrucția DirectoryIndex din fișierul de configurare Apache?

Aceasta definește fișierul implicit care va fi servit atunci când un utilizator accesează directorul rădăcină al site-ului web

3 De ce este necesar fișierul wp-config.php?

Acest fișier conține informațiile de conectare la baza de date și configurările principale pentru WordPress.

4 Pentru ce este responsabil parametrul post_max_size din fișierul de configurare PHP?

Acest parametru definește dimensiunea maximă permisă pentru datele transmise printr-o cerere POST.

5 Care sunt deficiențele imaginii containerului creat?

Configurația securității bazei de date nu este optimizată.

Fără un mecanism automat de backup pentru baza de date.

Necesită optimizări pentru performanță și securitate în producție.


