# Documentación de la API

Esta documentación proporciona una descripción de las rutas disponibles en la API de gestión de contactos, direcciones, emails y teléfonos. Las rutas están organizadas por el recurso que manejan.

## Rutas de la API de Contactos

Las siguientes rutas están disponibles para gestionar los contactos:

- **Obtener todos los contactos**
  - **Método:** `GET`
  - **Ruta:** `/contactos/getAllContactos`
  - **Descripción:** Recupera una lista de todos los contactos.

- **Obtener un contacto específico**
  - **Método:** `GET`
  - **Ruta:** `/contactos/getContacto/{id}`
  - **Descripción:** Recupera los detalles de un contacto específico basado en su ID.

- **Crear un nuevo contacto**
  - **Método:** `POST`
  - **Ruta:** `/contactos/createContacto`
  - **Descripción:** Crea un nuevo contacto con los datos proporcionados en la solicitud.

- **Actualizar un contacto existente**
  - **Método:** `PUT`
  - **Ruta:** `/contactos/updateContacto/{id}`
  - **Descripción:** Actualiza los detalles de un contacto específico basado en su ID.

- **Eliminar un contacto**
  - **Método:** `DELETE`
  - **Ruta:** `/contactos/deleteContacto/{id}`
  - **Descripción:** Elimina un contacto específico basado en su ID.

## Rutas para la API de Direcciones

Las siguientes rutas están disponibles para gestionar las direcciones:

- **Obtener todas las direcciones**
  - **Método:** `GET`
  - **Ruta:** `/direcciones/getAllDirecciones`
  - **Descripción:** Recupera una lista de todas las direcciones.

- **Obtener una dirección específica**
  - **Método:** `GET`
  - **Ruta:** `/direcciones/{contactoId}/getDireccion`
  - **Descripción:** Recupera los detalles de una dirección específica basada en el ID del contacto.

- **Crear una nueva dirección**
  - **Método:** `POST`
  - **Ruta:** `/direcciones/{contactoId}/createDireccion`
  - **Descripción:** Crea una nueva dirección para un contacto específico.

- **Actualizar una dirección existente**
  - **Método:** `PUT`
  - **Ruta:** `/direcciones/{contactoId}/updateDireccion/{direccionId}`
  - **Descripción:** Actualiza los detalles de una dirección específica basada en el ID del contacto y el ID de la dirección.

- **Eliminar una dirección**
  - **Método:** `DELETE`
  - **Ruta:** `/direcciones/{contactoId}/deleteDireccion/{direccionid}`
  - **Descripción:** Elimina una dirección específica basada en el ID del contacto y el ID de la dirección.

## Rutas para la API de Emails

Las siguientes rutas están disponibles para gestionar los emails:

- **Obtener todos los emails**
  - **Método:** `GET`
  - **Ruta:** `/email/getAllEmail`
  - **Descripción:** Recupera una lista de todos los emails.

- **Crear un nuevo email**
  - **Método:** `POST`
  - **Ruta:** `/email/{contactoId}/createEmail`
  - **Descripción:** Crea un nuevo email para un contacto específico.

- **Obtener un email específico**
  - **Método:** `GET`
  - **Ruta:** `/email/{contactoId}/getEmail`
  - **Descripción:** Recupera los detalles de un email específico basado en el ID del contacto.

- **Actualizar un email existente**
  - **Método:** `PUT`
  - **Ruta:** `/email/{contactoId}/updateEmail/{emailId}`
  - **Descripción:** Actualiza los detalles de un email específico basado en el ID del contacto y el ID del email.

- **Eliminar un email**
  - **Método:** `DELETE`
  - **Ruta:** `/email/{contactoId}/deleteEmail/{emailId}`
  - **Descripción:** Elimina un email específico basado en el ID del contacto y el ID del email.

## Rutas para la API de Teléfonos

Las siguientes rutas están disponibles para gestionar los teléfonos:

- **Obtener todos los teléfonos**
  - **Método:** `GET`
  - **Ruta:** `/telefono/getAllTelefonos`
  - **Descripción:** Recupera una lista de todos los teléfonos.

- **Crear un nuevo teléfono**
  - **Método:** `POST`
  - **Ruta:** `/telefono/{contactoId}/createTelefono`
  - **Descripción:** Crea un nuevo teléfono para un contacto específico.

- **Obtener un teléfono específico**
  - **Método:** `GET`
  - **Ruta:** `/telefono/{contactoId}/getTelefono`
  - **Descripción:** Recupera los detalles de un teléfono específico basado en el ID del contacto.

- **Actualizar un teléfono existente**
  - **Método:** `PUT`
  - **Ruta:** `/telefono/{contactoId}/updateTelefono/{emailId}`
  - **Descripción:** Actualiza los detalles de un teléfono específico basado en el ID del contacto y el ID del teléfono.

- **Eliminar un teléfono**
  - **Método:** `DELETE`
  - **Ruta:** `/telefono/{contactoId}/deleteTelefono/{emailId}`
  - **Descripción:** Elimina un teléfono específico basado en el ID del contacto y el ID del teléfono.

## Comandos para Ejecutar el Proyecto

### Backend (Laravel)

1. **Instalar dependencias**
   ```bash
   composer install

2. **Crear un archivo .env**
   ```bash
   cp .env.example .env

3. **Generar la clave de la aplicación**
   ```bash
  php artisan key:generate

4. **Migrar la base de datos**
   ```bash
  php artisan migrate

5. **Iniciar el servidor de desarrollo**
   ```bash
  php artisan serve

6. **Ejecutar todos los seeders**
   ```bash
  php artisan db:seed

