# trabajoPractico_PSD

Trabajo Practico - Programación de Sistemas - segundo cuatrimestre 2024

Integrantes Romina Gaite | Melisa Llanes | Elizabeth Armoa | Ornella Barboza | Silvia Casale | Alexis Corral

Diagrama de Flujo link = https://whimsical.com/U5TzUk1wK2L1Nh23uN7RP7

![Diagrama de flujo](https://github.com/user-attachments/assets/25038a13-f6ac-42a0-9414-865fc6781274)

Prototipo Funcional link a figma = https://www.figma.com/proto/2Gtd5elQXqkfVxXkXkgJJ4/kap?page-id=1677%3A333&node-id=1677-334&node-type=canvas&viewport=128%2C349%2C0.1&t=Mw1xsGSD6qE0Ew1T-1&scaling=contain&content-scaling=fixed&starting-point-node-id=1677%3A334

![Diagrama de flujo (1)](https://github.com/user-attachments/assets/4e0153cf-09fb-40e6-b8bf-659adfb09a6f)


Sistema

Pantalla incial

El usuario ingresa, si esta registrado se logea, si no esta registrado, se registra ,por default todos los usuarios que se registran tienen perfil de usuario.

![1](https://github.com/user-attachments/assets/3501574e-5492-4fd3-95db-cd1950f84a1a)


Pantalla Registro ( el usuario debe cumplir ciertas conciciones al registrarse, ser mayor de edad, ingresar una contraseña que contenga minimo 8 caracteres,una mayuscula una minuscula, un numero y un caracter especial )

![2](https://github.com/user-attachments/assets/1ff142ec-e360-45fc-98c1-8931cddce7b5)


Pantalla de recupero de contraseña , si el usuario no recuerda la contraseña, en la pantalla incial tiene la opcion de recuperar contraseña

![3](https://github.com/user-attachments/assets/98060431-14de-46bf-bc63-577ab1c6c751)


Si el mail ingresado existe en la base de datos le sale un alerta de que se le envio un mail para reestablecer la contraseña y salta la alerta

![4](https://github.com/user-attachments/assets/29eedfdf-f868-4960-9a71-21efdcfa938b)


Simulamos una pantalla como si recibiesemos ese mail para reestablecer la contraseña

![5](https://github.com/user-attachments/assets/987a8c0d-3b8c-4850-903a-8cb41566ec99)


y una vez que se reestablece se vuelve a la pantalla de inicio

aca puede iniciar secion y si es un usuario con rol de usuario a continuacion vera esta pantalla una vez que la contraseña ingresada sea la correcta

![14](https://github.com/user-attachments/assets/166abb30-71bc-46d8-b16f-6c79afa8363f)


en el caso de que el usuario tenga un perfil de administrador la pantalla que vera a continuacion es la siguiente ( para poderr ingresar cmo usuario admin debe loguearse con lo siguiente rogai@gmail.com // password 1234+Romi) 
![8](https://github.com/user-attachments/assets/6964fc64-77cd-4c93-bf5c-7567a053e66b)

en esta pantalla de admin puede visualizar todos los usuarios que forman parte del sistema y puede optar por ver informacion de usuario , editar usuario , borrar usuario

si quiere ver el usuario le parece esta pantalla

![9](https://github.com/user-attachments/assets/5043a43d-40bd-4aba-9ec8-440fcd032387)


si quiere editar a un usuario 10

y puede modificar sus datos o ponerlo como activo, no activo o suspendido

![11](https://github.com/user-attachments/assets/a98b89d1-0829-42d6-9594-7526f29366ed)


si quiere eliminar a un usuario le aparecera la alerta

![12](https://github.com/user-attachments/assets/86509093-4d9a-4767-9079-7021d92e1159)


si decide confirmar la eliminacion le aparece esta otra alerta


![13](https://github.com/user-attachments/assets/d26fcc9e-30bc-4941-99ea-a65e32aed475)

finalmente una vez que desea salir puede cerrar secion y la pantalla vuelve nuevamente a la pantalla principal

base de datos
![Sin título](https://github.com/user-attachments/assets/5e2d5321-5882-4d0b-96ae-d38dce6ecba4)

