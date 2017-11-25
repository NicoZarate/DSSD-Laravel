Crear en la bd: dssd , usuario: dssd ,pass: dssd
Una vez clonado se ejecuta en la consola:
1)   php artisan migrate
2)   php artisan seed
3)   php artisan serve (localhost:8000)
4)   con BonitaSoft corriendo en el navegador se ejecuta:
           php artisan db:seed --class=ContextoSeeder
con esto se crearan incidencias nuevas en la pagina y a la vez se crearan las tasks en bonita