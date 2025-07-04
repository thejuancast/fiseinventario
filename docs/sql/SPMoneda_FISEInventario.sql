-- LISTADO DE REGISTROS POR MEDIO DE SUCURSAL
CREATE PROCEDURE SP_L_MONEDA_01
@SUC_ID INT
AS
BEGIN
	SELECT * FROM TM_MONEDA
	WHERE 
	SUC_ID = @SUC_ID
	-- SOLO CON ESTADO ACTIVO
	AND EST=1
END

-- OBTENER REGISTROS POR ID
CREATE PROCEDURE SP_L_MONEDA_02
@MON_ID INT
AS
BEGIN
	SELECT * FROM TM_MONEDA
	WHERE 
	MON_ID = @MON_ID
END

-- ELIMINAR REGISTRO POR ID
CREATE PROCEDURE SP_D_MONEDA_01
@MON_ID INT
AS
BEGIN
	UPDATE TM_MONEDA
	SET
		EST= 0	
	WHERE	
		MON_ID = @MON_ID
END

-- INSERTAR NUEVOS REGISTROS
CREATE PROCEDURE SP_I_MONEDA_01
@SUC_ID INT,
@MON_NOM VARCHAR(150)
AS
BEGIN
	INSERT INTO TM_MONEDA
	(SUC_ID,MON_NOM,FECH_CREA,EST)
	VALUES
	(@SUC_ID,@MON_NOM,GETDATE(),1)
END

-- ACTUALIZAR REGISTROS
CREATE PROCEDURE SP_U_MONEDA_01
@MON_ID INT,
@SUC_ID INT,
@MON_NOM VARCHAR(150)
AS
BEGIN
	UPDATE TM_MONEDA
	SET 
		SUC_ID = @SUC_ID,
		MON_NOM = @MON_NOM
	WHERE
		MON_ID = @MON_ID
END