##cost - ##
valor total de la compra;

##purchase_details_url - ##
el Link de finalización de compra. Esta es la página en el sitio web del comercio a la cual la Billetera Tpaga enviará al Comprador una vez se haya hecho el cobro, para continuar/terminar el proceso de compra.

##voucher_url - ##
el Link de detalle de compra (opcional);

##idempotency_token - ##
el Token de idempotencia, que es un identificador de la transacción, que sirve para evitar la creación de solicitudes de pago duplicadas dentro de la Tpaga API;

##order_id - ##
el identificador de la compra dentro del sistema de inventario del Comercio, por ejemplo, el número de factura (no es necesario que sea único). Sirve para que el comercio pueda hacer conciliación de sus compras.

##terminal_id - ##
el identificador, definido por el Comercio, por ejemplo, número de la caja o nombre de la sede, en la que se realizó la compra. Sirve para hacer mejor seguimiento de las compras;

##purchase_description - ##
la descripción de la compra; la Billetera le mostrará al Comprador este texto al momento de cobrarle, para comunicarle mejor qué está pagando y a quién lo hace. Por ejemplo : Pago de Servicio a Comercio X.

##purchase_items - ##
Una estructura json que le va a ayudar al comercio a saber con exactitud todo lo que está pagando (opcional);

##user_ip_address - ##
la dirección IP del Comprador (si existe) o de la máquina, que está haciendo la petición;

##expires_at - ##
la fecha y la hora en la que se expira el Link de pago (en el formato ISO 8601, por ejemplo 2018-11-05T15:10:57.549-05:00). Después de la fecha indicada el link de pago se expira, y no está disponible para pagar.
