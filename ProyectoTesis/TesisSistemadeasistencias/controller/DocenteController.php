<?php
date_default_timezone_set("America/Guayaquil");
include('../model/Docente.php');
include('../conexion/conexion.php');

    // $docente = new Docente(1,"Edison","Zambrano", "edison@gmail.com","0987654321",1,1,1);
    // $docente = new Docente();

    // $docente->setIdDocente(1);
    // $docente->setNombres("Edison");
    // $docente->setApellidos("Zambrano");
    // $docente->setCorreo("edison@gmail.com");
    // $docente->setCedula("0987654321");
    // $docente->setIdCurso(1);
    // $docente->setIdParalelo(1);
    // $docente->setEstado(1);


    // echo $docente->getIdDocente() . "<br>";
    // echo $docente->getNombres() . "<br>";
    // echo $docente->getApellidos(). "<br>";
    // echo $docente->getCorreo(). "<br>";
    // echo $docente->getCedula(). "<br>";
    // echo $docente->getIdCurso(). "<br>";
    // echo $docente->getIdParalelo(). "<br>";
    // echo $docente->getEstado(). "<br>";

// class DocenteController{

        //funcion de errores
    // function registrar(Docente $docente)
    //     {

            $docente = new Docente();
            // $docenteController = new  DocenteController();
            
            $docente->setIdDocente(1);
            $docente->setNombres($_POST['nombres']);
            $docente->setApellidos($_POST['apellidos']);
            $docente->setCorreo($_POST['correo']);
            $docente->setCedula($_POST['cedula']);
            $docente->setIdCurso(1);
            $docente->setIdParalelo(1);
            $docente->setEstado(1);
        
           //metodo para registrar docente
            $respuesta = false;
            $docente = new Docente();

            $estado = 1;
            $query = "INSERT INTO tb_docente(nombres,apellidos, correo,cedula, idCurso, idParalelo, estado) 
            VALUES('$docente->getNombres','$docente->getApellidos','$docente->getCorreo','$docente->getCedula','$docente->getIdCurso','$docente->getIdParalelo','$estado')";

            $resultado = mysqli_query($conexion, $query);
            //preguntamos si el registro contiene datos
            if ($resultado) {
                echo "Se Registro Exitosamante";
                $respuesta = true;
                // echo "<script>alert('Se Registro Exitosamante');
                //                     window.location='../view/articulo.php'</script>";
                // header('Location: ../view/articulo.php');
            } else {
                echo "Error al registrar";
                // echo "<script>alert('No se pudo registrar');
                // window.location='../view/articulo.php'</script>";
            }
            //cerramos la conexion
            $conexion->close();
            // return $respuesta;
    // }  
    
    // registrar(new Docente);

    
    // function registrarDocente(){
    //     $ms = "";

    //     $docente = new Docente();
    //     $docenteController = new  DocenteController();
    
    
        
    //     $docente->setIdDocente(1);
    //     $docente->setNombres($_POST['nombres']);
    //     $docente->setApellidos($_POST['apellidos']);
    //     $docente->setCorreo($_POST['correo']);
    //     $docente->setCedula($_POST['cedula']);
    //     $docente->setIdCurso(1);
    //     $docente->setIdParalelo(1);
    //     $docente->setEstado(1);
    
    //     if($docenteController->registrar($docente)){
    //         $ms = "Registros exitoso";
    //     }else{
    //         $ms = "Fallo el registro";
    //     }

    //     return $ms;
    // }

    // registrarDocente();//llamada de la funcion
   

    // Cliente cliente = new Cliente();
    //     Ctrl_Cliente controlCliente = new Ctrl_Cliente();

    //     cliente.setNombre(txt_nombre.getText().trim());
    //     cliente.setApellido(txt_apellido.getText().trim());
    //     cliente.setCedula(txt_cedula.getText().trim());
    //     cliente.setTelefono(txt_telefono.getText().trim());
    //     cliente.setDireccion(txt_direccion.getText().trim());
    //     cliente.setEstado(1);
    //     //vaidamos campos 
    //     if (txt_nombre.getText().equals("") || txt_apellido.getText().equals("")) {
    //         JOptionPane.showMessageDialog(null, "¡Ingresa un nombre y un apellido!");
    //         txt_nombre.setBackground(Color.red);
    //         txt_apellido.setBackground(Color.red);
    //     } else {
    //         //consulta para ver si el producto existe en la BBDD 
    //         if (!controlCliente.existeCliente(txt_cedula.getText().trim())) {
    //             try {
    //                 if (controlCliente.guardar(cliente)) {
    //                     JOptionPane.showMessageDialog(null, "¡Registro Guardado!");
    //                     txt_nombre.setBackground(Color.green);
    //                     txt_apellido.setBackground(Color.green);
    //                     txt_cedula.setBackground(Color.green);
    //                     txt_telefono.setBackground(Color.green);
    //                     txt_direccion.setBackground(Color.green);
    //                 } else {
    //                     JOptionPane.showMessageDialog(null, "Error al Guardar");
    //                 }
    //             } catch (HeadlessException e) {
    //                 System.out.println("Error en: " + e);
    //             }
    //         } else {
    //             JOptionPane.showMessageDialog(null, "El cliente ya esta registrado en la Base de Datos");
    //             txt_nombre.setBackground(Color.white);
    //             txt_apellido.setBackground(Color.white);
    //             txt_cedula.setBackground(Color.white);
    //             txt_telefono.setBackground(Color.white);
    //             txt_direccion.setBackground(Color.white);
    //         }
    //     }
    //     //invoco al metodo limpiar campos
    //     this.Limpiar();
    
    
// }

    

    // public class Ctrl_Usuario {

    //    /**
    //  * **************************************************
    //  * metodo para guardar los productos
    //  * **************************************************
    //  */
    // public boolean guardar(Producto objeto) {
    //     boolean respuesta = false;
    //     Connection cn = Conexion.conectar();
    //     try {
    //         PreparedStatement consulta = cn.prepareStatement("insert into tb_producto values (?,?,?,?,?,?,?,?)");
    //         consulta.setInt(1, 0);
    //         consulta.setString(2, objeto.getNombre());
    //         consulta.setInt(3, objeto.getCantidad());
    //         consulta.setDouble(4, objeto.getPrecio());
    //         consulta.setString(5, objeto.getDescripcion());
    //         consulta.setInt(6, objeto.getPorcentajeIva());
    //         consulta.setInt(7, objeto.getIdCategoria());
    //         consulta.setInt(8, objeto.getEstado());

    //         if (consulta.executeUpdate() > 0) {
    //             respuesta = true;
    //         }
    //         cn.close();
    //     } catch (SQLException e) {
    //         System.out.println("Error al guardar productos: " + e);
    //     }
    //     return respuesta;
    // }
    // }

?>