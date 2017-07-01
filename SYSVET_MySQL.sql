drop database sysvet;
create database sysvet;
use sysvet;


/*Notas preliminares: 
-Los expedientes se generan relacionando las tablas consultas, operaciones, tratamientos
*/
create table clinicas (
id_clinica int not null auto_increment primary key, 
nombre varchar(150) not null,
direccion varchar (150),
telefono varchar (20),
ciudad varchar(30));

create table usuarios (
id_usuario int not null auto_increment primary key,
nombre_usuario varchar (15) not null,
contrasena varchar (15) not null,
id_clinica int not null,
constraint fk_usuarios_id_clinica foreign key (id_clinica) references clinicas(id_clinica));

create table datos_empleados (
id_empleado int not null auto_increment primary key,
nombre varchar (30) not null,
apellido_paterno varchar (20) not null,
apellido_materno varchar (20),
fecha_nacimiento date not null,
direccion varchar (150),
telefono varchar (20),
movil varchar (20),
curp varchar(18),
rfc varchar (13),
sexo char(1));

create table tipos_medicamentos (
id_tipo_medicamento int not null auto_increment primary key,
nombre varchar (80));

/*Esta tabla cataloga los tipos de administración de medicamentos: oral, inyectado, intravenosa, étc*/
create table tipos_administracion_medicamentos (
id_tipo_administracion int not null auto_increment primary key,
nombre varchar (30));

create table info_medicamentos (
id_info_medicamento int not null auto_increment primary key,
nombre_generico varchar(20) not null,
nombre_comercial varchar(20),
id_tipo_medicamento int not null,
id_tipo_administracion int not null,
constraint fk_info_medicamentos_idTipoMedicamento foreign key (id_tipo_medicamento) references tipos_medicamentos(id_tipo_medicamento),
constraint fk_info_medicamentos_idTipoAdministracion foreign key (id_tipo_administracion) references tipos_administracion_medicamentos(id_tipo_administracion));

/*Aquí se incluyen consultorios, quirófanos, salas de espera, habitaciones, étc.*/
create table departamentos (
id_departamento int not null auto_increment primary key,
nombre varchar (20));

create table inventario_medicamentos (
id_medicamento int not null auto_increment primary key,
id_info_medicamento int not null,
cantidad int,
constraint fk_inventario_medicamentos_id_info_medicamento foreign key (id_info_medicamento) references info_medicamentos(id_info_medicamento));
 
create table especialidades (
id_especialidad int not null auto_increment primary key,
nombre varchar (30) not null);

create table medicos (
id_medico int not null auto_increment primary key,
id_empleado int not null,
cedula varchar (20) not null, 
constraint fk_medicos_id_empleado foreign key (id_empleado) references datos_empleados(id_empleado));

create table medicos_especialidades (
id_medico_especialidad int not null auto_increment primary key,
id_medico int not null,
id_especialidad int not null,
constraint fk_medicos_especialidades_id_medico foreign key(id_medico) references medicos(id_medico),
constraint fk_medicos_especialidades_id_especialidad foreign key (id_especialidad) references especialidades(id_especialidad));

create table puestos (
id_puesto int not null auto_increment primary key,
nombre varchar (30));

create table nominas (
id_nomina int not null auto_increment primary key,
salario int);

create table contratos (
id_contrato int not null auto_increment primary key,
id_nomina int not null,
id_empleado int not null,
id_puesto int not null,
fecha_inicio date,
fecha_final date,
constraint fk_contratos_id_puesto foreign key (id_puesto) references puestos(id_puesto),
constraint fk_contratos_id_nomina foreign key (id_nomina) references nominas(id_nomina),
constraint fk_contratos_id_empleado foreign key (id_empleado) references datos_empleados(id_empleado));

create table clinicas_empleados (
id_clinica_empleado int not null auto_increment primary key,
id_clinica int not null,
id_empleado int not null,
id_contrato int not null,
constraint fk_clinicas_empleados_id_clinica foreign key (id_clinica) references clinicas(id_clinica),
constraint fk_clinicas_empleados_id_empleado foreign key (id_empleado) references datos_empleados(id_empleado),
constraint fk_clinicas_empleados_id_contrato foreign key (id_contrato) references contratos(id_contrato));

create table horarios (
id_horario int not null auto_increment primary key,
lunes varchar(15),
martes varchar(15),
miercoles varchar (15),
jueves varchar(15),
viernes varchar(15),
sabado varchar(15));

create table medicos_horarios (
id_medico_horario int not null auto_increment primary key,
id_medico int not null,
id_horario int not null,
constraint fk_medicos_horarios_id_medico foreign key (id_medico) references medicos(id_medico),
constraint fk_medicos_horarios_id_horario foreign key(id_horario) references horarios(id_horario));

create table clientes (
id_cliente int not null auto_increment primary key,
nombre varchar(30) not null,
apellido_paterno varchar(20) not null,
apellido_materno varchar(20),
fecha_nacimiento date not null,
direccion varchar (80),
telefono varchar(20),
movil varchar(20));

create table pacientes (
id_paciente int not null auto_increment primary key,
id_cliente int not null, 
nombre varchar (20) not null,
edad int not null,
especie varchar(20),
raza varchar(20),
sexo char(1),
color varchar (20),
esterilizado char(1),
longitud double precision,
peso double precision,
tipo_sangre varchar (5),
alergias varchar(200),
observaciones varchar (200),
constraint fk_pacientes_id_cliente foreign key(id_cliente) references clientes(id_cliente));

create table consultas (
id_consulta int not null auto_increment primary key,
id_paciente int not null,
id_medico int not null,
fecha date, 
hora_inicio time,
hora_final time,
id_consultorio int,
comentario varchar (300),
costo double,
constraint fk_consultas_id_paciente foreign key(id_paciente) references pacientes(id_paciente),
constraint fk_consultas_id_medico foreign key (id_medico) references medicos(id_medico),
constraint fk_consultas_id_consultorio foreign key (id_consultorio) references departamentos(id_departamento));

create table recetas (
id_receta int not null auto_increment primary key,
id_consulta int not null,
constraint fk_recetas_id_consulta foreign key (id_consulta) references consultas (id_consulta));

create table recetas_medicamentos (
id_receta_medicamento int not null auto_increment primary key,
id_receta int not null,
id_info_medicamento int not null,
duracion varchar (50),
indicaciones varchar (200),
constraint fk_recetas_medicamentos_id_receta foreign key (id_receta) references recetas(id_receta),
constraint fk_recetas_medicamentos_id_info_medicamento foreign key (id_info_medicamento) references info_medicamentos(id_info_medicamento));

create table diagnosticos (
id_diagnostico int not null auto_increment primary key,
id_consulta int not null,
comentarios varchar (500),
constraint fk_diagnosticos_id_consulta foreign key (id_consulta) references consultas(id_consulta));
create table internos (
id_interno int not null auto_increment primary key,
id_paciente int not null,
id_medico int not null,
fecha_entrada date, 
fecha_salida date, 
constraint fk_internos_id_paciente foreign key (id_paciente) references pacientes(id_paciente),
constraint fk_internos_id_medico foreign key (id_medico) references medicos(id_medico));

create table tipos_operaciones (
id_tipo_operacion int not null auto_increment primary key,
nombre varchar (100),
especificaciones text);

create table operaciones (
id_operacion int not null auto_increment primary key,
id_paciente int not null,
id_departamento int not null,
id_tipo_operacion int not null,
hora_inicio time not null,
hora_final time not null,
fecha date not null,
constraint fk_operaciones_id_paciente foreign key (id_paciente) references pacientes(id_paciente),
constraint fk_operaciones_id_departamento foreign key(id_departamento) references departamentos(id_departamento),
constraint fk_operaciones_id_tipo_operacion foreign key(id_tipo_operacion) references tipos_operaciones(id_tipo_operacion));

create table operaciones_medicos (
id_operacion_medico int not null auto_increment primary key,
id_operacion int not null,
id_medico int not null,
constraint fk_operaciones_medicos_id_operacion foreign key (id_operacion) references operaciones(id_operacion),
constraint fk_operaciones_medicos_id_medico foreign key (id_medico) references medicos(id_medico));

create table tipos_camas (
id_tipo_cama int not null auto_increment primary key,
descripcion varchar(30));

create table camas (
id_cama int not null auto_increment primary key,
num_cama int not null,
id_tipo_cama int not null,
constraint fk_camas_id_tipo_cama foreign key(id_tipo_cama) references tipos_camas(id_tipo_cama));

create table camas_internos (
id_cama_interno int not null auto_increment primary key,
id_cama int not null,
id_interno int not null,
id_departamento int not null,
fecha_inicio date,
fecha_final date,
constraint fk_camas_internos_id_cama foreign key(id_cama) references camas(id_cama),
constraint fk_camas_internos_id_interno foreign key(id_interno) references internos(id_interno),
constraint fk_camas_internos_id_departamento foreign key(id_departamento) references departamentos(id_departamento));


create table historial(
id_historial int not null auto_increment primary key,
id_paciente int not null,
constraint fk_historial_id_paciente foreign key(id_paciente) references pacientes(id_paciente));

create table vacunas(
id_vacuna int not null auto_increment primary key,
abreviatura varchar(10),
nombre varchar(50));

create table vacunas_pacientes(
id_vacunas_pacientes int not null auto_increment primary key,
id_vacuna int not null, 
id_paciente int not null,
fecha_aplicacion date,
constraint fk_vacunas_pacientes_id_vacuna foreign key(id_vacuna) references vacunas(id_vacuna),
constraint fk_vacunas_pacientes_id_paciente foreign key(id_paciente) references pacientes(id_paciente));