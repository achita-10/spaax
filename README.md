## Procedimiento en la ejecucion del sistema SPAAX
 
 ### Clonar el proyecto 
 
 - Ejecutando el siguiente comando: git clone https://github.com/achita-10/spaax.git
 
 ### Activar DOMPDF 
 - Ejecutar en la carpeta public_html el comando: composer require dompdf/dompdf
 
 ### Modificar htaccess
 - Para el correcto funcionamiento de la sessión, el nombre de la carpeta del proyecto debe conincidir con el nombre de la constante RewriteBase, definida en el .htaccess que se encuentra en la carpeta public_html
	
### Base de datos	
- Importar la base de datos .sql que se encuentra en la carpeta bd
