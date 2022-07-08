
-- insert de tipo de usuario - administrador
insert into tb_tipo_usuario(descripcion,estado)
values('administrador',1);

-- insert de usuario con rol administrador
insert into tb_usuario(nombre,apellido,correo,password,idTipoUsuario,estado)
values('Edison','Zambrano','edison2015a@gmail.com','12345',1,1);





