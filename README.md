<p align="center"><a href="https://github.com/Jesuiz/Todoit" target="_blank"><img src="https://raw.githubusercontent.com/Jesuiz/Todoit/refs/heads/master/public/logo.webp" width="400" alt="Laravel Logo"></a></p>

# Aplicación de Tareas To Do It

Esta es una aplicación de gestión de tareas construida con Laravel. Permite a los usuarios crear, ver, actualizar y eliminar tareas, así como filtrarlas por varios criterios.

## Características

- Autenticación de usuarios
- Creación, lectura, actualización y eliminación de tareas
- Filtrado de tareas por título, estado de completado y fecha de creación
- Interfaz responsiva

## Requisitos previos

Asegúrate de tener instalado lo siguiente en tu máquina:

- PHP >= 7.3
- Composer
- MySQL o cualquier base de datos compatible con Laravel
- Node.js y npm (para compilar assets)

## Configuración

1. Clona el repositorio:
git clone https://github.com/Jesuiz/Todoit.git
cd nombre-de-tu-proyecto

2. Instala las dependencias de PHP:
composer install

3. Instala las dependencias de JavaScript y compila los assets:
npm install
npm run dev

4. Copia el archivo de entorno y configúralo:
cp .env.example .env

5. Edita el archivo `.env` y configura tu base de datos y otras variables de entorno necesarias.

6. Genera una clave de aplicación:
php artisan key:generate

7. Ejecuta las migraciones:
php artisan migrate

## Ejecución del proyecto

1. Inicia el servidor de desarrollo de Laravel:
php artisan serve

2. Abre tu navegador y visita `http://localhost:8000`

## Uso

1. Regístrate para crear una nueva cuenta de usuario.
2. Inicia sesión con tus credenciales.
3. Usa el formulario en la página principal para crear nuevas tareas.
4. Utiliza los filtros en la parte superior de la lista de tareas para filtrar las tareas existentes.
5. Marca las tareas como completadas o elimínalas usando los botones correspondientes.

## Pruebas

Para ejecutar las pruebas, usa el siguiente comando:
php artisan test

## Contribución

Las contribuciones son bienvenidas. Por favor, abre un issue para discutir cambios mayores antes de crear un pull request.

## Licencia

Este proyecto está licenciado bajo [tu licencia elegida]. Ver el archivo LICENSE para más detalles.