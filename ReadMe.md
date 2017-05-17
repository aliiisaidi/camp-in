<p align="center"><h1>Camp'in</h1></p>

----

### À propos de Camp'in

1. ##### Technologies :
    1. ###### FrontEnd :
        - Bootsrtap 4 .
        - VueJs 2.
        - Axios.
    2. ###### Backend  
        - Laravel 5.4.
        
2. ##### Installation du projet : 
    1. installer composer
    
    2. installer Node js
    
    3. créer un dossier "Campin"
    
    4. ouvrire le terminal
        1. cd Campin
        2. git clone 
        3. composer install
        4. npm install
        
    5. Créer une base de donnée vide    
    
    6. Créer un fichier ".env" et remplissez le par le contenu du fichier ".env.example"
        1. Modifier les variables suivantes
                    DB_DATABASE=homestead
                    DB_USERNAME=homestead
                    DB_PASSWORD=secret     
        2. Enregistrer vous sur le site "mailtrap.io" et créer votre "inbox", de votre inbox copier les identifiants pseudo et mdp.
                    ( Modifier les variables dans le .env )
                    MAIL_USERNAME=null
                    MAIL_PASSWORD=null
    7. Dans le terminal "php artisan migrate" pour créer les tables de base de donnée
    8. Dans le terminal "php artisan serve" pour démarrer le serveur et lancer le site.
                
3. ##### Structure MVC (Model View Controller) :
    
    1. ###### Models "/app/"
        1. Utilisateurs : "/app/User.php"  
        2. Campings : "/app/Camping.php"
        3. Photos : "/app/Photo.php"
        4. Gestion des favoris  : "/app/User.php" 
             
    2. ###### Views 
        
        - Toutes les vues Blade.php (code HTML) sont ici "/resources/views/" 
        - Tout le code Vue js (JavaScript) vous le trouvez ici "/resources/assets/js/components/"
    
    3. ###### Controllers    
        
        - Toutes les fonctions php vous les trouvez dans les controlleurs ici "app/Http/Controllers/"
        
        




