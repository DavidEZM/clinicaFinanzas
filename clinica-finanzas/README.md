# Proyecto Code Changelle Clinica Finanzas

Este proyecto está desarrollado con Laravel 11, PHP 8.3 y utiliza SQLite como base de datos.
A continuación, se presentan las instrucciones detalladas para instalar y servir la aplicación en tu máquina local.

## Instrucciones para Servir la Aplicación

1. Prerrequisitos: Antes de comenzar, asegúrate de tener los siguientes requisitos instalados en tu máquina:
   - PHP 8.3 o superior.
   - Composer: Herramienta para gestionar las dependencias de PHP.

2. Clonar el Repositorio: 
   - Clona el repositorio en tu máquina local utilizando el siguiente comando en tu terminal o línea de comandos:
     ***bash***
     git clone https://github.com/DavidEZM/clinicaFinanzas.git
     ***
	   
   - Si tienes Github Desktop puedes clonarlo desde la opcion Clone Repository y insertar la URL proporsionada mas arriba, luego presionar en Clone y Listo.

3. Abrir la Shell:
   - Navega a la carpeta del repositorio clonado con el siguiente comando:
     ***bash***
     cd nombreCarpeta/
     ***
   - el nombre de la carpeta debe ser el nombre de la carpeta en donde se clono el repositorio, reemplazar por el nombre de la carpeta correspondiente.
   - Asegúrate de estar en la carpeta raíz del proyecto para los siguientes pasos.

4. Instalar Dependencias:
   - Ejecuta el siguiente comando para instalar todas las dependencias necesarias del proyecto usando Composer:
     **bash**
     	composer install
     ***

5. Servir la Aplicación:
   - Una vez que las dependencias se hayan instalado, puedes iniciar el servidor de desarrollo de Laravel con el siguiente comando:
     ***bash***
     php artisan serve
     ***
   - Esto iniciará el servidor y la aplicación estará disponible en la URL y puerto por defecto, que generalmente es `http://localhost:8000`.

Notas Adicionales:
- El proyecto utiliza SQLite como base de datos. Por lo tanto, no es necesario instalar ni configurar una base de datos adicional. Esto simplifica la configuración y el uso de la aplicación.
Con estos pasos, deberías poder instalar y ejecutar la aplicación Laravel 11 en tu máquina local sin problemas.


