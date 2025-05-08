# Sistema de Nutrición y Planes Alimenticios

## Descripción
Sistema web desarrollado para la gestión de planes nutricionales y recetas. Permite a los usuarios crear y compartir recetas, solicitar planes alimenticios personalizados a través de tickets y gestionar su información nutricional.

## Tecnologías Utilizadas

### Backend
- **Laravel 12**: Framework PHP para el desarrollo del backend
- **PHP 8.2**: Versión del lenguaje de programación
- **Laravel Sanctum**: Para autenticación y gestión de tokens
- **Laravel Tinker**: Para interactuar con la aplicación desde la línea de comandos

### Frontend
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
└── tests/             # Pruebas de la aplicación
```

## Modelo Entidad-Relación

### Diagrama de Entidad-Relación
```
+----------------+       +----------------+       +----------------+
|     User       |       |    Recipe      |       |    Ticket      |
+----------------+       +----------------+       +----------------+
| PK userID      |<----->| PK id          |       | PK id          |
| name           |       | recipename     |       | user_email     |
| email          |       | descripcion    |       | title          |
| password       |       | ingredients    |       | description    |
| age            |       | instructions   |       | status         |
| gender         |       | calories       |       | created_at     |
| weight         |       | protein        |       | updated_at     |
| height         |       | carbs          |       +----------------+
| activity_level |       | fats           |
| allergies      |       | category       |
| goals          |       | image_url      |
| restrictions   |       | FK userID      |
| created_at     |       | created_at     |
| updated_at     |       | updated_at     |
+----------------+       +----------------+
```

### Entidades Principales

1. **Usuario (User)**
   - `userID` (PK, bigint): Identificador único del usuario
   - `name` (string): Nombre del usuario
   - `email` (string): Correo electrónico único
   - `email_verified_at` (timestamp, nullable): Fecha de verificación del email
   - `allergies` (text, nullable): Alergias del usuario
   - `goals` (text, nullable): Objetivos nutricionales
   - `password` (string, nullable): Contraseña encriptada
   - `age` (integer, nullable): Edad del usuario
   - `gender` (string, nullable): Género del usuario
   - `weight` (float, nullable): Peso en kg
   - `height` (float, nullable): Altura en cm
   - `activity_level` (string, nullable): Nivel de actividad física
   - `restrictions` (text, nullable): Restricciones alimentarias
   - `created_at` (timestamp): Fecha de creación
   - `updated_at` (timestamp): Fecha de actualización

2. **Receta (Recipe)**
   - `id` (PK, bigint): Identificador único de la receta
   - `recipename` (string): Nombre de la receta
   - `descripcion` (text): Descripción detallada
   - `ingredients` (text): Lista de ingredientes
   - `instructions` (text): Pasos de preparación
   - `calories` (decimal): Calorías por porción
   - `protein` (decimal): Proteínas por porción
   - `carbs` (decimal): Carbohidratos por porción
   - `fats` (decimal): Grasas por porción
   - `category` (string): Categoría de la receta
   - `image_url` (string, nullable): URL de la imagen
   - `userID` (FK, bigint): ID del usuario creador
   - `created_at` (timestamp): Fecha de creación
   - `updated_at` (timestamp): Fecha de actualización

3. **Ticket de Soporte (Ticket)**
   - `id` (PK, bigint): Identificador único del ticket
   - `user_email` (string): Email del usuario
   - `title` (string): Título del ticket
   - `description` (text): Descripción del problema
   - `status` (enum): Estado del ticket
   - `created_at` (timestamp): Fecha de creación
   - `updated_at` (timestamp): Fecha de actualización

### Relaciones Principales

1. **Usuario - Receta**
   - Un usuario puede crear muchas recetas (1:N)
   - Una receta pertenece a un usuario (N:1)

2. **Usuario - Ticket**
   - Un usuario puede crear muchos tickets (1:N)
   - Un ticket pertenece a un usuario (N:1)

### Cardinalidad y Restricciones

1. **Usuario**
   - Puede tener múltiples recetas (0..N)
   - Puede tener múltiples tickets (0..N)
   - Email debe ser único
   - Campos obligatorios: name, email, password

2. **Receta**
   - Debe pertenecer a un usuario (1)
   - Campos obligatorios: recipename, descripcion, ingredients, instructions
   - Valores nutricionales deben ser positivos

3. **Ticket**
   - Debe estar asociado a un usuario (1)
   - Campos obligatorios: user_email, title, description
   - Status debe ser uno de los valores permitidos

## Requisitos del Sistema

- PHP 8.2 o superior
- Composer
- Node.js y npm
- SQLite

## Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/itsMarlonFTP/DisenowebNutricion.git
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
php artisan serve
```

## Scripts Disponibles

- `npm run dev`: Inicia el servidor de desarrollo Vite
- `npm run build`: Compila los assets para producción
- `php artisan serve`: Inicia el servidor PHP
- `php artisan migrate`: Ejecuta las migraciones de la base de datos

## Contribución

Para contribuir al proyecto:

1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## Licencia

Este proyecto está bajo la Licencia MIT.
