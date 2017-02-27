CREATE OR REPLACE PROCEDURE insertDirector (dirName IN VARCHAR2, msg OUT VARCHAR2)
IS
  dNameTemp VARCHAR2(50);
  dId INTEGER;
  temp INTEGER;
  EXCEPTION_ALREADY_EXISTS EXCEPTION;
BEGIN
  dNameTemp := 'abs';
  dId := 0;
  
  SELECT COUNT(DIRECTOR_ID) INTO dId
  FROM DIRECTOR
  WHERE DIRECTOR_NAME=dirName;
  
  IF dId <> 0 THEN
    RAISE EXCEPTION_ALREADY_EXISTS;
  END IF;
    
  SELECT COUNT(DIRECTOR_ID) INTO temp
  FROM DIRECTOR;
  
  dId := temp + 1;
  
  INSERT INTO DIRECTOR VALUES
  (dId,dirName);
  
  msg := dirName || ' was successfully inserted into database.';
  
EXCEPTION
  WHEN EXCEPTION_ALREADY_EXISTS THEN
    msg := dirName || ' already exists in database.';

    
END ;
/

