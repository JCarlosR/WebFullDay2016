## Lo que he avanzado
- He organizado el proyecto según lo que se había descrito en el word que subí para la primera repartición.
- He configurado la navegación a través de los elementos del menú usando fragment transactions.
- He añadido un splash screen al inicio de la app.
- He definido una clase Global para leer y escribir SharedPreferences.
- He importado el logo en varias dimensiones, para usarlo como icon launcher.
- He definido una interfaz para el inicio de sesión, y un dialog de confirmación al cerrar sesión.

## Repartición móvil
Deben escoger un número (cada uno se asocia con un conjunto de actividades).

1. Webservice para el **login y logout**

 Consiste en definir un WS para iniciar sesión. Para ello se debe hacer uso de JWT (**JSON Web Tokens**) a fin de realizar una autenticación cifrada.
 De esta forma evitaremos exponer los WS correspondientes a las operaciones, ya que estarán respaldados por un token.

2. UI y peticiones para **responder encuestas**

 Una encuesta se compone de varias preguntas y estas se obtienen a través de un WS. 
 La idea es generar la UI para que el usuario responda pregunta por pregunta; y al final reportar sus respuestas al servidor.
 Se debe coordinar con Eduardo, por ser quien desarrolló los WS de encuestas.

3. Configuración de **Retrofit e información del evento**

 Se debe configurar el ApiService y ApiAdapter para facilitar el uso de Retrofit.
 Consiste en definir los WS correspondientes a los ponentes y ponencias.
 Finalmente se debe definir la UI para este apartado y obtener los datos del servidor.

4. **Notificaciones** usando FCM

 Juarez anteriormente configuró FCM en un script PHP. Se debe adecuar dicho código para que se pueda usar desde Laravel.
 Implica además desarrollar en el panel de administración un apartado para enviar notificaciones a TODOS los usuarios que tienen la app.
 Esto significa que también se encargará de registrar y refrescar el token id de cada usuario cuando estos usen la app.

5. Implementar un **"chat" realtime en la app**

 Este mal llamado "chat" permitirá escribir preguntas del auditorio al ponente. Cada pregunta puede ser votada de forma positiva por los demás.
 De esta forma, se escogeran las mejores preguntas y serán leídas por el moderador.
 Funcionará gracias a Firebase. Ello significa que se debe hacer un login sincronizando Firebase con Laravel, haciendo uso de JWT.

Sin importar la opción que escojan, estaré disponible para las dudas que tengan. 
La idea es que avancemos y terminemos la app con anticipación.

Atentamente,
Ramos Suyón Juan Carlos.
