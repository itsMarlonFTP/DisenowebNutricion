# Sistema de Nutrición

## Índice
1. [Descripción](#descripción)
2. [Tecnologías Utilizadas](#tecnologías-utilizadas)
   - [Backend](#backend)
   - [Frontend](#frontend)
   - [Base de Datos](#base-de-datos)
3. [Estructura del Proyecto](#estructura-del-proyecto)
4. [Modelo Entidad-Relación](#modelo-entidad-relación)
   - [Entidades Principales](#entidades-principales)
   - [Relaciones Principales](#relaciones-principales)
   - [Diagrama de Relaciones](#diagrama-de-relaciones)
5. [Requisitos del Sistema](#requisitos-del-sistema)
6. [Instalación](#instalación)
7. [Scripts Disponibles](#scripts-disponibles)
8. [Contribución](#contribución)
9. [Licencia](#licencia)
10. [Capturas de Interfaz](#user-interface-screenshots)
    - [Vistas de Autenticación](#authentication-views)
    - [Páginas de Autenticación](#authentication-pages)
    - [Diferencias en la Barra de Navegación](#navbar-differences)
    - [Correos Electrónicos y Alertas](#email-and-alerts)
11. [Implementación del Código](#code-implementation)
    - [Código de Correo de Bienvenida](#welcome-email-code)
    - [Código de Alerta de Inicio de Sesión](#login-alert-code)

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

## Modelo Entidad-Relación

### Entidades Principales

1. **Usuario (User)**
   - id (PK)
   - name
   - email
   - password
   - role
   - created_at
   - updated_at

2. **Receta (Recipe)**
   - id (PK)
   - name
   - description
   - ingredients
   - preparation_time
   - calories
   - user_id (FK)
   - created_at
   - updated_at

3. **Restaurante (Restaurant)**
   - id (PK)
   - name
   - address
   - phone
   - created_at
   - updated_at

4. **Menú (Menu)**
   - id (PK)
   - restaurant_id (FK)
   - name
   - description
   - price
   - created_at
   - updated_at

5. **Objetivo de Salud (HealthGoal)**
   - id (PK)
   - user_id (FK)
   - goal_type
   - target_weight
   - target_date
   - created_at
   - updated_at

6. **Preferencia Dietética (DietaryPreference)**
   - id (PK)
   - user_id (FK)
   - preference_type
   - created_at
   - updated_at

7. **Alergia (Allergy)**
   - id (PK)
   - user_id (FK)
   - allergy_type
   - severity
   - created_at
   - updated_at

8. **Recomendación (Recommendation)**
   - id (PK)
   - user_id (FK)
   - recipe_id (FK)
   - recommendation_type
   - created_at
   - updated_at

9. **Integración Fitness (FitnessIntegration)**
   - id (PK)
   - user_id (FK)
   - integration_type
   - api_key
   - created_at
   - updated_at

10. **Pedido (Order)**
    - id (PK)
    - user_id (FK)
    - restaurant_id (FK)
    - menu_id (FK)
    - status
    - total_price
    - created_at
    - updated_at

### Relaciones Principales

1. **Usuario - Receta**
   - Un usuario puede crear muchas recetas (1:N)
   - Una receta pertenece a un usuario (N:1)

2. **Usuario - Objetivo de Salud**
   - Un usuario puede tener muchos objetivos de salud (1:N)
   - Un objetivo de salud pertenece a un usuario (N:1)

3. **Usuario - Preferencia Dietética**
   - Un usuario puede tener muchas preferencias dietéticas (1:N)
   - Una preferencia dietética pertenece a un usuario (N:1)

4. **Usuario - Alergia**
   - Un usuario puede tener muchas alergias (1:N)
   - Una alergia pertenece a un usuario (N:1)

5. **Restaurante - Menú**
   - Un restaurante puede tener muchos menús (1:N)
   - Un menú pertenece a un restaurante (N:1)

6. **Usuario - Recomendación**
   - Un usuario puede recibir muchas recomendaciones (1:N)
   - Una recomendación está dirigida a un usuario (N:1)

7. **Receta - Recomendación**
   - Una receta puede estar en muchas recomendaciones (1:N)
   - Una recomendación contiene una receta (N:1)

8. **Usuario - Pedido**
   - Un usuario puede hacer muchos pedidos (1:N)
   - Un pedido pertenece a un usuario (N:1)

9. **Restaurante - Pedido**
   - Un restaurante puede tener muchos pedidos (1:N)
   - Un pedido pertenece a un restaurante (N:1)

10. **Menú - Pedido**
    - Un menú puede estar en muchos pedidos (1:N)
    - Un pedido contiene un menú (N:1)

### Diagrama de Relaciones

```
+---------------+       +----------------+       +----------------+
|    Usuario    |       |    Receta     |       |  Restaurante   |
+---------------+       +----------------+       +----------------+
| id (PK)       |<----->| id (PK)       |       | id (PK)        |
| name          |       | name          |       | name           |
| email         |       | description   |       | address        |
| password      |       | ingredients   |       | phone          |
| role          |       | preparation_time|     | created_at     |
| created_at    |       | calories      |       | updated_at     |
| updated_at    |       | user_id (FK)  |       +----------------+
+---------------+       | created_at    |              |
        |               | updated_at    |              |
        |               +----------------+              |
        |                      |                       |
        v                      v                       v
+---------------+       +----------------+       +----------------+
| Objetivo Salud|       | Recomendación |       |     Menú       |
+---------------+       +----------------+       +----------------+
| id (PK)       |       | id (PK)       |       | id (PK)        |
| user_id (FK)  |       | user_id (FK)  |       | restaurant_id  |
| goal_type     |       | recipe_id (FK)|       | name           |
| target_weight |       | recommendation_type|   | description    |
| target_date   |       | created_at    |       | price          |
| created_at    |       | updated_at    |       | created_at     |
| updated_at    |       +----------------+       | updated_at     |
+---------------+              |                 +----------------+
        |                      |                       |
        v                      v                       v
+---------------+       +----------------+       +----------------+
| Preferencia   |       | Integración   |       |    Pedido      |
| Dietética     |       | Fitness       |       |                |
+---------------+       +----------------+       +----------------+
| id (PK)       |       | id (PK)       |       | id (PK)        |
| user_id (FK)  |       | user_id (FK)  |       | user_id (FK)   |
| preference_type|      | integration_type|     | restaurant_id  |
| created_at    |       | api_key       |       | menu_id (FK)   |
| updated_at    |       | created_at    |       | status         |
+---------------+       | updated_at    |       | total_price    |
        |               +----------------+       | created_at     |
        |                                        | updated_at     |
        v                                        +----------------+
+---------------+
|    Alergia    |
+---------------+
| id (PK)       |
| user_id (FK)  |
| allergy_type  |
| severity      |
| created_at    |
| updated_at    |
+---------------+
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
