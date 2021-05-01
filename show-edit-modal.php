<?php
    function showEditContactModal($contactoInfo){
        foreach($contactoInfo as $clave => $contacto){
            print_r(
                "<div class='overlay'>
                <form action='edit.php' method='POST' class='login'>
                <div class='field'>
                    <label for='nombre' class='label'>Nombre</label>
                    <div class='control'>
                        <input type='text' value=".$contacto['NOMBRE_CONTACTO'][0]['NOMBRE_CONTACTO']." id='nombre' class='input' name='nombre' >
                    </div>
                </div>
                <div class='field'>
                    <label for='email' class='label'>Email</label>
                    <div class='control'>
                        <input type='email' value=".$contacto['EMAIL_CONTACTO'][0]['EMAIL_CONTACTO']." class='input' name='email'>
                    </div>
                </div>
                <div class='field'>
                    <label for='telefono' class='label'>Telefono</label>
                    <div class='control'>
                        <input type='tel' class='input' value=".$contacto['TELEFONO_CONTACTO'][0]['TELEFONO_CONTACTO']." id='telefono' name='telefono'>
                    </div>
                    <div class='select' style='margin:15px;'>
                        <select name='type'>
                            <option value='casa'>Casa</option>
                            <option value='trabajo'>Trabajo</option>
                            <option value='personal'>Personal</option>
                        </select>
                    </div>
                </div>
                <input type='submit' value='Editar Contacto' class='button is-light  is-link'>
            </form>
            </div>"
            );
        }
    }