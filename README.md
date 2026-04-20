# Zara Home - Proyecto Web - Clon

##  Descripción
Este proyecto consiste en el desarrollo de una página web inspirada en Zara Home, integrando tanto frontend como backend.

Incluye funcionalidades propias de un e-commerce moderno como visualización de productos, carrito de compra, buscador, sistema de autenticación y conexión con una API.

El objetivo ha sido simular un entorno real de desarrollo web completo (full-stack).


---

##  Tecnologías utilizadas

### Frontend

* HTML5
* CSS3
* JavaScript (Vanilla)

### Backend
* PHP
* Laravel
* Composer

### Base de datos

* MySQL (gestionado con phpMyAdmin)
* XAMPP(entorno local)

### Calidad de código
* SonarQube Cloud

---

##  Funcionalidades

*  Página principal con navegación
*  Carrito de compra dinámico
*  Buscador de productos
*  Página de productos (Baño)
*  Cambio de vistas (2, 3 y 4 columnas)
*  Sistema de inicio de sesión
*  Selección de región (modal)
*  Gestión de productos desde JavaScript
*  Conexión con API (login / datos)

---

## Estructura del proyecto

```
/proyecto
│
├── /css
├── /js
├── /images
├── index.html
├── banos.html
├── admin.html (opcional)
└── README.md
```

---

##  API
El backend desarrollado con Laravel permite la comunicación con el frontend mediante endpoints.

Ejemplo:
POST /api/login

Permite autenticar usuarios desde el frontend.

---

##  Instalación y uso
### Requisitos:
* XAMPP
* PHP
* Composer
  
### Pasos:
1. Clonar el repositorio:
   ```bash
   git clone https://github.com/tu-usuario/tu-repo.git
   ```
2. Iniciar XAMPP(Apache + MYSQL).
3. Configurar base de datos en phpMyAdmin.
4. Instalar dependencias de Laravel:
   ```bash
   composer install
   ```

5. Configurar archivo .env
6. Ejecutar migraciones:
   ```bash
   php artisan migrate
   ```
7. Iniciar servidor Laravel:
    ```bash
   php artisan serve
   ```
9. Abrir frontend en navegador:
     ```bash
   http://localhost:3000
   ```

---

##  Capturas (opcional)

*Aquí puedes añadir imágenes del proyecto*

---

##  Objetivos de aprendizaje

* Manipulación del DOM con JavaScript
* Diseño responsive tipo e-commerce
* Uso de eventos y lógica de interacción
* Integración frontend-backend
* Gestión de datos

---

##  Mejoras futuras

* Panel de administración completo
* Base de datos real
* Sistema de pagos
* Autenticación avanzada

---

##  Autor

* 

---
