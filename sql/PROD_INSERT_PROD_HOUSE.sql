CREATE OR REPLACE PROCEDURE insertProductionHouse (prodName IN VARCHAR2, msg OUT VARCHAR2)
IS
  pId INTEGER;
  temp INTEGER;
  EXCEPTION_ALREADY_EXISTS EXCEPTION;
BEGIN
  pId := 0;
  
  SELECT COUNT(PROD_HOUSE_ID) INTO pId
  FROM PRODUCTION_HOUSE
  WHERE PROD_HOUSE_NAME=prodName;
  
  IF pId <> 0 THEN
    RAISE EXCEPTION_ALREADY_EXISTS;
  END IF;
    
  SELECT COUNT(PROD_HOUSE_ID) INTO temp
  FROM PRODUCTION_HOUSE;
  
  pId := temp + 1;
  
  INSERT INTO PRODUCTION_HOUSE VALUES
  (pId,prodName);
  
  msg := prodName || ' was successfully inserted into database.';
  
EXCEPTION
  WHEN EXCEPTION_ALREADY_EXISTS THEN
    msg := prodName || ' already exists in database.';

    
END ;
/

