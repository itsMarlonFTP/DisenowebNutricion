# Sistema de Nutrición

## Descripción
Este es un sistema web desarrollado para la gestión de nutrición, construido con Laravel y tecnologías modernas de frontend.

## Tecnologías Utilizadas

### Backend
- **Laravel 12**: Framework PHP para el desarrollo del backend
- **PHP 8.2**: Versión del lenguaje de programación
- **Laravel Sanctum**: Para autenticación y gestión de tokens
- **Laravel Tinker**: Para interactuar con la aplicación desde la línea de comandos
- **Laravel UI**: Para la integración con Bootstrap

### Frontend
- **Vite**: Bundler y servidor de desarrollo
- **Bootstrap 5**: Framework CSS para el diseño responsivo
- **TailwindCSS**: Framework de utilidades CSS
- **Sass**: Preprocesador CSS
- **Axios**: Cliente HTTP para peticiones AJAX

### Base de Datos
- **SQLite**: Base de datos relacional (configurada por defecto)

## Estructura del Proyecto

```
diseñowebnutricion/
├── app/                 # Lógica principal de la aplicación
├── bootstrap/          # Archivos de arranque
├── config/            # Archivos de configuración
├── database/          # Migraciones y seeders
├── public/            # Archivos públicos accesibles
├── resources/         # Vistas, assets y archivos compilados
├── routes/            # Definición de rutas
├── storage/           # Archivos generados por la aplicación
├── tests/             # Pruebas de la aplicación
└── vendor/            # Dependencias de Composer
```

## Requisitos del Sistema
- PHP 8.2 o superior
- Composer
- Node.js y npm
- SQLite

## Instalación

1. Clonar el repositorio:
```bash
git clone [url-del-repositorio]
```

2. Instalar dependencias de PHP:
```bash
composer install
```

3. Instalar dependencias de Node.js:
```bash
npm install
```

4. Configurar el archivo .env:
```bash
cp .env.example .env
php artisan key:generate
```

5. Crear la base de datos SQLite:
```bash
touch database/database.sqlite
```

6. Ejecutar migraciones:
```bash
php artisan migrate
```

7. Iniciar el servidor de desarrollo:
```bash
npm run dev
```

En otra terminal:
```bash
php artisan serve
```

## Scripts Disponibles

- `npm run dev`: Inicia el servidor de desarrollo Vite
- `npm run build`: Compila los assets para producción
- `php artisan serve`: Inicia el servidor PHP
- `php artisan migrate`: Ejecuta las migraciones de la base de datos

## Contribución
Para contribuir al proyecto, por favor sigue estos pasos:
1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## Licencia
Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## User Interface Screenshots

### Authentication Views

| Guest View | Authenticated User View |
|------------|-------------------------|
| ![When the user is not logged in](diseñowebnutricion/images/userNotLog.png) | ![Landing page for logged in users](diseñowebnutricion/images/landingPage.png) |

### Authentication Pages

| Login Page | Registration Page |
|------------|-------------------|
| ![Login view](diseñowebnutricion/images/viewLogin.png) | ![Register view](diseñowebnutricion/images/viewRegister.png) |

### Navbar Differences

| Guest Navbar | User Navbar |
|--------------|-------------|
| ![Guest navbar](diseñowebnutricion/images/guest.png) | ![User navbar](diseñowebnutricion/images/user.png) |

### Email and Alerts

| Welcome Email | Login Alert |
|---------------|-------------|
| ![Welcome email to users](diseñowebnutricion/images/emailGreeting.png) | ![Alert when user logs in](diseñowebnutricion/images/emailAlertLog.png) |

## Code Implementation

### Welcome Email Code
![Welcome Email Implementation - Part 1](diseñowebnutricion/images/welcomeEmailCode1.png)
![Welcome Email Implementation - Part 2](diseñowebnutricion/images/welcomeEmailCode12.png)

### Login Alert Code
![Login Alert Implementation - Part 1](diseñowebnutricion/images/loginAlertCode1.png)
![Login Alert Implementation - Part 2](diseñowebnutricion/images/loginAlertCode2.png)
