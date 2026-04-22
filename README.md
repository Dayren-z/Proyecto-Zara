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

### Herramientas de desarrollo
* Antigravity (agente de IA).
* SonarQube Cloud(análisis de calidad de código).

---

##  Funcionalidades

*  Página principal con navegación
*  Carrito de compra dinámico
*  Buscador de productos
*  Sistema de favoritos
*  Página de productos (Baño)
*  Cambio de vistas (2, 3 y 4 columnas)
*  Sistema de inicio de sesión
*  Selección de región (modal)
*  Gestión de productos desde JavaScript
*  Conexión con API (login / datos)
*  Panel de administración (gestión de productos)

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
   git clone https://github.com/Byrubio/Proyecto-Zara.git
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
## Análisis de código
Se ha utilizado SonarQube Cloud para:

* Detectar errores
* Mejorar calidad del código
* Aplicar buenas prácticas
---

##  Capturas 

## 📸 Capturas

![Página principal](https://github.com/user-attachments/assets/d49be0fc-d44a-416d-ad41-803162f8b8ed)


---

##  Objetivos de aprendizaje
* Desarrollo Full Stack
* Integración Frontend - Backend
* Uso de APIs REST
* Gestión de base de datos
* Diseño de interfaces tipo e-commerce

---

##  Mejoras futuras

* Base de datos real
* Sistema de pagos
* Autenticación avanzada

---

##  Autor

* Byrubio
* Dayren-z

---
