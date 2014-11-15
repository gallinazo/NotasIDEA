<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
       include("head.php");//en este agrego los css y el encoding de manera centralizada en un archivo
       session_start();//uso de cookies para las variables de sesion
    ?>
    <body>
        <script src="js/myNoteApp.js" defer="defer"></script>
        <script src="js/myNoteCtrl.js" defer="defer"></script>
        <!-- Mi app "NotasApp" esta en la siguiente division y tambien el controlador "myNoteCtrl" -->
        <div class="container" data-ng-app="NotasApp" data-ng-controller="myNoteCtrl"> 

            <div class="span-19 prepend-3 append-2 last">
               <h1>NotasApp</h1>
            </div>
            
            <div class="span-19 prepend-3 append-2 last">
                <div  class="span-12 last">
                    
                    <div class="span-12 last">
                        <h3>Titulo</h3>
                        <!-- aqui uso un modelo llamado "title", que luego llamo desde funciones del controlador "myNoteCtrl" -->
                        <input style="font-family: Arial, Helvetica, sans-serif;" id="inputTitulo" data-ng-model="title" type="text" maxlength="50" name="cTitulo" size="50" placeholder="Escribe el título">
                    </div> 
                    <div class="span-12 last">
                        <h3>Nota</h3>
                        <!-- aqui uso un modelo llamado "message", que luego llamo desde funciones del controlador "myNoteCtrl"  -->
                        <textarea style="font-family: Arial, Helvetica, sans-serif;" id="textNota" data-ng-model="message" maxlength="500" cols="40" name="cNota" rows="10" placeholder="Escribe tu nota"></textarea>
                    </div>
                    <div class="span-12 last">
                        <!-- las funciones save y clear, estan en el controlador "myNoteCtrl" -->
                        <button data-ng_click="save()">Guardar</button>
                        <button data-ng-click="clear()">Limpiar</button>
                    </div>
                    <!-- Aqui voy mostrando el total de caracteres disponibles, se calculan en el controler y se muestran aqui -->
                    <p>Number of characters left: <span data-ng-bind="left()"></span></p>
                </div>
                
                <div  class="span-7 last">
                    
                    <!-- Aqui llamo al que muestra las notas en una tabla -->
                    <?php
                       include("listarNotas.php");
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>
