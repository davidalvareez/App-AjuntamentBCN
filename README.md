# App-AjuntamentBCN
**El proyecto se trata de una aplicacion de voluntarios para añadir/quitar inscripciones, está hecho en PHP, MYSQL, HTML, CSS, JS**

## Comenzando 🚀

Para obtener mi proyecto en tu máquina local lo que puedes hacer es:
1. Clonar mi repositorio
2. Descargar el zip
3. Con la opción open github Desktop

Mira **Deployment** (Despliegue) para conocer como desplegar el proyecto.

## Pre-requisitos 📋

Necesitar un editor de codigo, en mi caso utilice **VISUAL STUDIO CODE**, pero puedes usar otros como por ejemplo el **SUBLIME TEXT/NET BEANS** Adjunto enlace de visual studio: https://code.visualstudio.com/

Necesitas instalar el programa de XAMPP para poder leer los archivos de PHP y no tener problemas: https://www.apachefriends.org/es/index.html

Otra herramienta es la base de datos el MYSQL, puedes utilizar el **PHPMYADMIN** que es el que viene por defecto en el XAMPP o el MySQL WorkBench

## Instalación 🔧
Primero necesitas saber que en XAMPP cuando lo tengas instalado, lo que tienes que hacer es meter el proyecto en la ubicación de: c:\xampp\htdocs\nombredelproyecto.
1. Tienes que tener activado el servicio **APACHE** y **MySQL**.
2. El MySQL es el PHPMYADMIN pero si trabajas con WORKBENCH también necesitas tener activado el servicio MYSQL debido al puerto.

### Necesitas una carpeta que se llame services y crear el archivo config.php y añadir las sentencias de la siguiente manera como demostraré a continuación que es con el metodo de PDO.
```
define("SERVIDOR","conexion");
define("USUARIO","usuario");
define("PASSWORD","contraseña");
define("BD","nombre base de datos");
```

Para instalar nuestro proyecto se puede hacer de dos maneras.
1. Git clone en VISUAL STUDIO CODE --> Donde dice **CODE** en verde y obtienes este enlace https://github.com/davidalvareez/App-AjuntamentBCN.git
2. Descargar el zip desde el github y descomprimirlo en una ubicación el zip se descarga donde dice **CODE** en verde y la opcion de zip
3. Descomprimelo en la siguiente ruta: **c:\xampp\htdocs**

## Despliegue 📦

Para tener el proyecto ya terminado y dejarlo descansar vamos a subir el proyecto a un Hosting en este caso será el de **000WEBHOST**
Accedes a la plataforma, creas un sitio gratuito y subes el proyecto a la plataforma. Cambias la conexion a la base de datos ya que serán distintos y hecho. Te dejo el enlace del codigo subido al hosting gratuito: https://doc-brown.000webhostapp.com/

## Construido con 🛠️

    PHP - Lenguaje Nativo
    MYSQL - Gestor de base de datos
    CSS - Lenguaje de estilos
    JavaScript - Lenguage desarollo cliente
    Bootstrap - Biblioteca de estilos
    SweetAlet - Biclioteca de alertas JS
    FontAwesome - Libreria de iconos

## Autores ✒️

    Xavier Gómez - Desarolladores WEB
    David Álvarez - Desarolladores WEB

## Licencia 📄
Mira el archivo LICENSE para detalles

## Expresiones de Gratitud 🎁

    Si le ha gustado, comparta mi perfil con sus amigos 📢
    Les dejo mis redes sociales para cualquier contacto 📱
    -Instagram: @xavier.gomezgallego - @davidalvareez_