<?php
require_once("../conekta/lib/Conekta.php");
\Conekta\Conekta::setApiKey("tu_llave_privada");
\Conekta\Conekta::setApiVersion("2.0.0");



try {

     $thirty_days_from_now = (new DateTime())->add(new DateInterval('P30D'))->getTimestamp();

     $order = \Conekta\Order::create(
        [
            "line_items" => [
                [
                    "name" => "Box of Cohiba S1s",
                    "unit_price" => 4500*100,
                    "quantity" => 1
                ]
            ],
            "shipping_lines" => [
                [
                    "amount" => 0,
                    "carrier" => "DHL"
                ]
            ],
            "currency" => "MXN",
            "customer_info" => [
                "name" => "John Constantine",
                "phone" => "+5213353319758",
                "email" => "JRGBPDS@gmail.com"
            ],
            "charges" => [
                [
                    "payment_method" => [
                        "type" => "oxxo_cash",
                        "expires_at" => $thirty_days_from_now
                    ]
                ]
            ],
            "metadata" => [
                "reference" => "12987324097",
                "more_info" => "lalalalala",
                "more_info2" => "lalalalalajorge",
            ],
            "shipping_contact" => [
                "address" => [
                    "street1" => "250 Alexis St",
                    "postal_code" => "98121",
                    "country" => "US"
                ]
            ]
        ]
    );

} catch (\Conekta\ParameterValidationError $error){
    echo $error->getMessage();
    } catch (\Conekta\Handler $error){
    echo $error->getMessage();
    }


?>
    
<!-- saved from url=(0082)file:///Users/lizbethgamez/Downloads/oxxopay-payment-stub-master/demo/opps_es.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="styles.css" media="all" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="opps">
			<div class="opps-header">
				<div class="opps-reminder">Ficha digital. No es necesario imprimir.</div>
				<div class="opps-info">
					<div class="opps-brand"><img src="oxxopay_brand.png" alt="OXXOPay"></div>
					<div class="opps-ammount">
						<h3>Monto a pagar</h3>
						<h2><?php echo  '$'.$order->amount/100 ?> <sup>MXN</sup></h2>
						<p>OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
					</div>
				</div>
				<div class="opps-reference">
					<h3>Referencia</h3>
					<h1><?php echo $order->charges[0]->payment_method->reference ?> </h1>
				</div>
			</div>
			<div class="opps-instructions">
				<h3>Instrucciones</h3>
				<ol>
					<li>Acude a la tienda OXXO más cercana. <a href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a>.</li>
					<li>Indica en caja que quieres realizar un pago de servicio<strong></strong>.</li>
					<li>Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de venta.</li>
					<li>Realiza el pago correspondiente con dinero en efectivo.</li>
					<li>Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
				</ol>
				<div class="opps-footnote">Al completar estos pasos recibirás un correo de <strong>Nombre del negocio</strong> confirmando tu pago.</div>
			</div>
		</div>	
	

</body></html>