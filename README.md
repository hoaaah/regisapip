RegiSAPIP
===================

Repositori ini digunakan untuk melakukan pengumpulan data peserta SPIP sesuai dengan template output peserta SA-SPIP untuk nantinya diimpor pada aplikasi SA-SPIP BPKP.

Installation
-------------------
>I am assuming that you know how to: install and use Composer, and install additional packages/drivers that may be needed for you to run everything on your system. In case you are new to all of this, you can check my guides for installing default yii2 application templates, provided by yii2 developers, on Windows 8 and Ubuntu based Linux operating systems, posted on www.freetuts.org.

1. Create database that you are going to use for your application (you can use phpMyAdmin or any other tool that you like).

2. Now open up your console and ```cd``` to your web root directory, for example: ``` cd /var/www/html/ ```

3. Run the Composer ```create-project``` command:

   ``` composer create-project hoaaah/regisapip ```

4. Now you need to tell your application to use database that you have previously created.
Open up db.php config file in ```regisapip/_protected/config/db.php``` and adjust your connection credentials.

5. Back to the console. Inside your newly installed application, ```cd``` to the ```_protected``` folder.

7. Execute yii migration command that will install necessary database tables:

   ``` ./yii migrate ``` or if you are on Windows ``` yii migrate ```

8. Execute _rbac_ controller _init_ action that will populate our rbac tables with default roles and
permissions:

   ``` ./yii rbac/init ``` or if you are on Windows ``` yii rbac/init ```


You are done, you can start your application in your browser.

> Note: Ubah konfigurasi wilayah, tahun, dan nama-nama unit peserta sesuai dengan daerah masing-masing. 

```php
<?php

return [
    // ....
    'dinilai' => 'Kabupaten Simulasi',
    'tahun' => 2018,
    'unit' => [
        1 => "Inspektorat",
        2 => "Badan Kepegawaian dan Pengembangan SDM",
        3 => "Badan Pengelola Keuangan ",
        4 => "Badan Perencanaan Pembangunan Daerah",
        5 => "Dinas Pekerjaan Umum dan Penataan Ruang",
        6 => "Dinas Kesehatan",
        7 => "Dinas Komunikasi dan Informatika",
        8 => "Dinas Penanaman Modal dan Perizinan",
        9 => "Dinas Pertanian",
        10 => "Dinas Pendidikan",
        11 => "Sekretariat Daerah"
    ]

    //......
];
```

Testing
-------------------

If you want to run tests you should create additional database that will be used to store 
your testing data. Usually testing database will have the same structure like the production one.
I am assuming that you have Codeception installed globally, and that you know how to use it.
Here is how you can set up everything easily:

1. Let's say that you have created database called ```regisapip```. Go create the testing one called ```regisapip_tests```.

2. Inside your ```db.php``` config file change database you are going to use to ```regisapip_tests```.

3. Open up your console and ```cd``` to the ```_protected``` folder of your application.

4. Run the migrations again: ``` ./yii migrate ``` or if you are on Windows ```yii migrate```

5. Run rbac/init again: ``` ./yii rbac/init ``` or if you are on Windows ```yii rbac/init```

6. Now you can tell your application to use your ```regisapip``` database again instead of ```regisapip_tests```.
Adjust your ```db.php``` config file again.

7. Now you are ready to tell Codeception to use ```regisapip_tests``` database.
   
   Inside: ``` _protected/tests/codeception/config/config.php ``` file tell your ```db``` to use 
```regisapip_tests``` database.

8. Start your php server inside the root of your application: ``` php -S localhost:8080 ``` 
(if the name of your application is regisapip_, then root is ```regisapip``` folder) 

9. Move to ```_protected/tests``` , run ```codecept build``` and then run your tests.

Directory structure
-------------------

```
_protected
    assets/              contains assets definition
    components/          contains custom made application components
    config/              contains application configurations
    console              contains console commands (controllers and migrations)
    controllers/         contains Web controller classes
    helpers/             contains helper classes
    mail/                contains view files for e-mails
    models/              contains model classes
    rbac/                contains role based access control classes
    runtime/             contains files generated during runtime
    tests/               contains various tests for the regisapip application
    translations/        contains application translations
    views/               contains view files for the Web application
    widgets/             contains widgets
assets                   contains application assets generated during runtime
themes                   contains your themes
uploads                  contains various files that can be uploaded by application users
```