-- LISTADO DE REGISTROS POR MEDIO DE SUCURSAL
CREATE PROCEDURE SP_L_PROVEEDOR_01
@EMP_ID INT
AS
BEGIN
	SELECT * FROM TM_PROVEEDOR
	WHERE 
	EMP_ID = @EMP_ID
	-- SOLO CON ESTADO ACTIVO
	AND EST=1
END

-- OBTENER REGISTROS POR ID
CREATE PROCEDURE SP_L_PROVEEDOR_02
@PROV_ID INT
AS
BEGIN
	SELECT * FROM TM_PROVEEDOR
	WHERE 
	PROV_ID = @PROV_ID
END

-- ELIMINAR REGISTRO POR ID
CREATE PROCEDURE SP_D_PROVEEDOR_01
@PROV_ID INT
AS
BEGIN
	UPDATE TM_PROVEEDOR
	SET
		EST= 0	
	WHERE	
		PROV_ID = @PROV_ID
END

-- INSERTAR NUEVOS REGISTROS
CREATE PROCEDURE SP_I_PROVEEDOR_01
@EMP_ID INT,
@PROV_PUESTO VARCHAR(150),
@PROV_AREA VARCHAR(150),
@PROV_NOMBRE VARCHAR(150),
@PROV_TELF VARCHAR(150),
@PROV_DIRECC VARCHAR(150),
@PROV_CORREO VARCHAR(150)
AS
BEGIN
	INSERT INTO TM_PROVEEDOR
	(EMP_ID,PROV_PUESTO,PROV_AREA,PROV_NOMBRE,PROV_TELF,PROV_DIRECC,PROV_CORREO,FECH_CREA,EST)
	VALUES
	(@EMP_ID,@PROV_PUESTO,@PROV_AREA,@PROV_NOMBRE,@PROV_TELF,@PROV_DIRECC,@PROV_CORREO,GETDATE(),1)
END

-- ACTUALIZAR REGISTROS
CREATE PROCEDURE SP_U_PROVEEDOR_01
@PROV_ID INT,
@EMP_ID INT,
@PROV_PUESTO VARCHAR(150),
@PROV_AREA VARCHAR(150),
@PROV_NOMBRE VARCHAR(150),
@PROV_TELF VARCHAR(150),
@PROV_DIRECC VARCHAR(150),
@PROV_CORREO VARCHAR(150)
AS
BEGIN
	UPDATE TM_PROVEEDOR
	SET 
		EMP_ID = @EMP_ID,
		PROV_PUESTO = @PROV_PUESTO,
		PROV_AREA = @PROV_AREA,
		PROV_NOMBRE = @PROV_NOMBRE,
		PROV_TELF = @PROV_TELF,
		PROV_DIRECC = @PROV_DIRECC,
		PROV_CORREO = @PROV_CORREO
	WHERE
		PROV_ID = @PROV_ID
END