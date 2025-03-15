# Scopul lucrării

Dupa executarea acestei lucrări, studentul va fi capabil să pregătească un container pentru a rula un site web bazat pe Apache HTTP Server + PHP (mod_php) + MariaDB.

# Sarcina

Creați un fișier Dockerfile pentru a construi o imagine a containerului care va conține un site web bazat pe Apache HTTP Server + PHP (mod_php) + MariaDB. Baza de date MariaDB trebuie să fie stocată într-un volum montat. Serverul trebuie să fie disponibil pe portul 8000.

Instalați site-ul WordPress. Verificați funcționarea site-ului.

# Pregătire

Pentru a efectua această lucrare, trebuie să aveți instalat pe computer Docker.

Pentru a efectua această lucrare, trebuie să aveți experiență în efectuarea lucrării de laborator nr. 3.

# Executare

Creați un depozit de cod sursă containers04 și clonați-l pe computerul dvs.

![image](https://github.com/user-attachments/assets/2f05f3a4-5224-453b-857d-4b82f59402c5)

extragerea fișierelor de configurare apache2, php, mariadb din container

Creați în directorul containers04 un director files, precum și

    directorul files/apache2 - pentru fișierele de configurare apache2;
    directorul files/php - pentru fișierele de configurare php;
    directorul files/mariadb - pentru fișierele de configurare mariadb.

![image](https://github.com/user-attachments/assets/a415e557-da34-45cf-8e0b-cea744589008)


Creați în directorul containers04 fișierul Dockerfile cu următorul conținut:

![image](https://github.com/user-attachments/assets/a5ecb348-d9af-4b30-9b0b-e731fa5654a0)

Construiți o imagine a containerului cu numele apache2-php-mariadb.

![image](https://github.com/user-attachments/assets/bda61847-f903-478c-ab3b-3314aadd7d1e)

Creați un container apache2-php-mariadb din imaginea apache2-php-mariadb și porniți-l în modul de fundal cu comanda bash.

![image](https://github.com/user-attachments/assets/b9adaea5-2e28-4b31-93d5-32d592b252c7)

Copiați din container fișierele de configurare apache2, php, mariadb în directorul files/ de pe computer. Pentru a face acest lucru, în contextul proiectului, executați comenzile:

![image](https://github.com/user-attachments/assets/f73189f7-a1f1-4233-bdd2-15af9c420726)

După executarea comenzilor, în directorul files/ ar trebui să apară fișierele de configurare apache2, php, mariadb. Verificați dacă acestea există. Opriți și ștergeți containerul apache2-php-mariadb.

![image](https://github.com/user-attachments/assets/02473ee4-def1-4657-b2c2-3e94a8bcd3ee)

# Configurarea

# Fișierul de configurare apache2

Deschideți fișierul files/apache2/000-default.conf, găsiți linia #ServerName www.example.com și înlocuiți-o cu ServerName localhost.

Găsiți linia ServerAdmin webmaster@localhost și înlocuiți adresa de e-mail cu a dvs.

După linia DocumentRoot /var/www/html adăugați următoarea linie:

DirectoryIndex index.php index.html

![image](https://github.com/user-attachments/assets/70e545a8-1ccf-4c3c-91f8-172def8954e0)

Salvați fișierul și închideți-l.

La sfârșitul fișierului files/apache2/apache2.conf adăugați următoarea linie:

ServerName localhost

![image](https://github.com/user-attachments/assets/968a4ab0-6f45-445a-8a2b-7c4fd30f7755)

# Fișierul de configurare php

Deschideți fișierul files/php/php.ini, găsiți linia ;error_log = php_errors.log și înlocuiți-o cu error_log = /var/log/php_errors.log.

![image](https://github.com/user-attachments/assets/17c2354a-be71-4b5a-a9a9-2f29f61cb503)

Setați parametrii memory_limit, upload_max_filesize, post_max_size și max_execution_time astfel:

memory_limit = 128M
upload_max_filesize = 128M
post_max_size = 128M
max_execution_time = 120

![image](https://github.com/user-attachments/assets/136ec2bf-9137-4f25-b47e-1db2bd9cc13d)

Salvați fișierul și închideți-l.

# Fișierul de configurare mariadb

Deschideți fișierul files/mariadb/50-server.cnf, găsiți linia #log_error = /var/log/mysql/error.log și eliminați # din fața ei.

![image](https://github.com/user-attachments/assets/a9ffa26d-042d-4141-9692-9e868a42be95)

Salvați fișierul și închideți-l.

# Crearea scriptului de pornire

In directorul files creati directorul supervisor si fisierul supervisord.conf cu urmatorul continut:

![image](https://github.com/user-attachments/assets/887dce95-4637-4f4d-948a-1d5abce3b774)

# Crearea Dockerfile

Deschiți fișierul Dockerfile și adăugați următoarele linii:

 ![image](https://github.com/user-attachments/assets/23499efe-5cae-4e90-a468-0b69566c628f)

Creati imaginea containerului cu numele apache2-php-mariadb 

![image](https://github.com/user-attachments/assets/8f4e15d6-9633-4a7d-b0ec-d192614b9ff1)

și porniți containerul apache2-php-mariadb din imaginea apache2-php-mariadb.

![image](https://github.com/user-attachments/assets/dabd4a10-7153-4cc1-a972-26298ae5634e)

Verificați dacă site-ul WordPress este disponibil la adresa http://localhost/. 

![image](https://github.com/user-attachments/assets/e75d2edf-09ec-4bf2-a5db-e1f112588841)

Verificați dacă in directorul /var/www/html/ există fișierele site-ului WordPress. 

![image](https://github.com/user-attachments/assets/56ca7605-004a-427f-a586-5dd77b5251cc)

Verificați dacă fișierele de configurare apache2, php, mariadb sunt modificate

![image](https://github.com/user-attachments/assets/8e1c9c26-be3c-44a3-8d52-ff7078bbf846)

![image](https://github.com/user-attachments/assets/33f79069-44a3-41bc-b5f1-c46dcc26d62d)

# Crearea bazelor de date și a utilizatorului pentru WordPress

Crearea bazelor de date și a utilizatorului pentru WordPress se face în containerul apache2-php-mariadb. Pentru a face acest lucru, conectați-vă la containerul apache2-php-mariadb și executați comenzile:

![image](https://github.com/user-attachments/assets/63da1cc1-2e12-4ba6-ad40-c8795174c3e5)

# Crearea fișierului de configurare WordPress

Deschideți în browser site-ul WordPress la adresa http://localhost/ și urmați instrucțiunile pentru instalarea site-ului WordPress. La pasul 2, specificați următoarele date:

![image](https://github.com/user-attachments/assets/b4dc8258-92ba-4eb5-bcb9-8219586b0709)

Din urmatorul pas copiați conținutul fișierului wp-config.php și salvați-l în fișierul files/wp-config.php.

![image](https://github.com/user-attachments/assets/a5bfe107-b1cd-4aff-83c9-e3b5b126cbc2)

# Adăugarea fișierului de configurare WordPress în Dockerfile

Adăugați în fișierul Dockerfile următoarele linii:

![image](https://github.com/user-attachments/assets/00866a70-b9a5-4e4c-a887-e1797d11da70)

# Pornirea și testarea

Recreați imaginea containerului cu numele apache2-php-mariadb și porniți containerul apache2-php-mariadb din imaginea apache2-php-mariadb. Verificați funcționarea site-ului WordPress.

![Uploading image.png…]()

