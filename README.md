![image](https://github.com/user-attachments/assets/732b6213-62a6-4036-a875-a75f19f4bac6)

# Proyecto Plataformas Abiertas

## Descripción
Este proyecto es una aplicación web diseñada para gestionar usuarios y prendas, desarrollada con PHP y siguiendo el patrón MVC. Permite la creación, edición, eliminación y visualización de usuarios y sus respectivas prendas.

## Características
- CRUD de usuarios:
  - Crear
  - Leer
  - Actualizar
  - Eliminar
- CRUD de prendas:
  - Crear
  - Leer
  - Actualizar
  - Eliminar
- Interfaz de usuario con Bootstrap para un diseño moderno y responsivo.

## Requisitos
- PHP 7.4 o superior
- Servidor web (Apache, Nginx, etc.)
- Base de datos MySQL
- Composer (para manejar dependencias)

## Instalación
1. **Clona el repositorio**:
   ```bash
   git clone https://github.com/tuusuario/tu-repositorio.git

## Proyecto Final - Documentación API (Postman)
Esta sección describe las solicitudes HTTP utilizadas en el proyecto, incluyendo los endpoints disponibles para interactuar con el sistema de usuarios mediante el uso de Postman.

## Endpoints

### **1. Crear Usuario**
**Método:** `POST`  
**URL:** `http://localhost/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/insertar`

**Descripción:**  
Permite crear un nuevo usuario en el sistema proporcionando los datos necesarios en el cuerpo de la solicitud.

**Body (form-data):**

```markdown
| Clave            | Valor           | Descripción                          |
|------------------|-----------------|--------------------------------------|
| `identificacion` | `1234567`       | Identificación única del usuario.   |
| `nombre`         | `Robert`        | Nombre del usuario.                 |
| `apellido1`      | `Perez`         | Primer apellido del usuario.        |
| `apellido2`      | `Lopez`         | Segundo apellido del usuario.       |
| `correo`         | `robert@hotmail.com` | Correo electrónico del usuario. |
| `perfil`         | `Administrador` | Perfil o rol del usuario.           |
| `contrasena`     | `000000`        | Contraseña del usuario.             |
```

**Ejemplo de Respuesta Exitosa:**
```json
{
    "status": "success",
    "message": "Usuario creado correctamente."
}
```

---

### **2. Leer Usuarios**
**Método:** `GET`  
**URL:** `http://localhost/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios`

**Descripción:**  
Obtiene una lista de todos los usuarios registrados en el sistema.

**Ejemplo de Respuesta:**

```markdown
| ID       | Nombre  | Apellido 1 | Apellido 2 | Correo                  | Perfil        | Contraseña |
|----------|---------|------------|------------|-------------------------|---------------|------------|
| `12345`  | Juan    | Pérez      | Gómez      | juan.perez@example.com  | Administrador | `12345`    |
| `23456`  | Juan    | Pérez      | López      | juan@algo.com           | Administrador | `12345`    |
| `32456`  | Lia     | Arias      | Solano     | lia@hotmail.com         | Administrador | `65432`    |
| `1234567`| Robert  | Pérez      | López      | robert@hotmail,com      | Administrador | `000000`   |
| `4444444`| Robert  | Pérez      | López      | robert@hotmail.com      | Administrador | `000000`   |
```

---

### **3. Leer Usuario por ID**
**Método:** `GET`  
**URL:** `http://localhost/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios?id=32456`

**Descripción:**  
Obtiene la información de un usuario específico según su identificador único.

**Query Params:**

```markdown
| Clave | Valor    | Descripción                  |
|-------|----------|------------------------------|
| `id`  | `32456`  | Identificador único del usuario. |
```

**Ejemplo de URL completo:**  
`http://localhost/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios?id=32456`

**Ejemplo de Respuesta:**

```markdown
| Clave            | Valor                  |
|------------------|------------------------|
| `id`             | `32456`               |
| `nombre`         | `Lia`                 |
| `apellido1`      | `Arias`               |
| `apellido2`      | `Solano`              |
| `correo`         | `lia@hotmail.com`     |
| `perfil`         | `Administrador`       |
```

---

### **4. Eliminar Usuario**
**Método:** `GET`  
**URL:** `http://localhost/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/eliminar`

**Descripción:**  
Permite eliminar un usuario del sistema utilizando su identificador único.

**Query Params:**

```markdown
| Clave | Valor    | Descripción                  |
|-------|----------|------------------------------|
| `id`  | `12345`  | Identificador único del usuario. |
```

**Ejemplo de URL completo:**  
`http://localhost/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/eliminar?id=12345`

**Ejemplo de Respuesta Exitosa:**
```json
{
    "status": "success",
    "message": "Usuario eliminado correctamente."
}
```

**Ejemplo de Respuesta de Error:**
```json
{
    "status": "error",
    "message": "Usuario no encontrado."
}
