<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <title>Arakaky's</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width">

    </head>

    <body>

        <table align="center" border="0" width="710" cellpadding="0" cellspacing="0" style="border-collapse: collapse;font-family: Helvetica;">

            <thead>

                <tr>

                    <th>

                        <table width="710" cellpadding="20" cellspacing="0" style="border-collapse: collapse;background: #1d1d1d;font-family: Helvetica;">

                            <tr>

                                <th>

                                    <p style="color: #fff;text-transform: uppercase;font-weight: bold;font-size: 27px;margin: 0;">Solicitud de Cotización</p>

                                </th>

                            </tr>

                        </table>

                    </th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>

                        <table width="710" cellpadding="15" cellspacing="0" style="border-collapse: collapse;background:#ffffff;border: 1px solid #dfdfdf;font-family: Helvetica;">

                            <!--tr>

                                <td>

                                    <table align="center" width="650" cellpadding="10" cellspacing="0" style="border-collapse: collapse;font-family: Helvetica;">

                                        <tr>

                                            <td width="390">

                                                <p style="font-size:16px;margin-top:0;margin-bottom:15px;color:#000000;">

                                                    Hola <strong><?php echo $contactoNombre; ?></strong>

                                                </p>

                                                <p style="font-size:16px;margin-top:0;margin-bottom:15px;color:#000000;">

                                                    Te confirmamos que <strong>Arakaky's</strong> aceptó tu pedido.

                                                </p>

                                      

                                                <p style="font-size:16px;margin-top:0;margin-bottom:15px;color:#000000;">

                                                    Por favor, revisa que la información que nos proporcionaste sea la correcta.

                                                </p>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr-->

							<tr>

                                <td>

                                    <table align="center" width="650" cellpadding="10" cellspacing="0" style="border-collapse: collapse;font-family: Helvetica;">

                                        <tr>

                                            <td width="390">

                                                <p style="font-size:16px;margin-top:0;margin-bottom:15px;color:#000000;">
                                                    <strong style="color: #4285f4;">Celular:</strong> <?php echo $contactoCelular; ?>
                                                </p>

                                                <p style="font-size:16px;margin-top:0;margin-bottom:15px;color:#000000;">
                                                    <strong style="color: #4285f4;">Correo:</strong> <?php echo $contactoEmail; ?>
                                                </p>

												<p style="font-size:16px;margin-top:0;margin-bottom:15px;color:#000000;">
                                                    <strong style="color: #4285f4;">Dirección:</strong> <?php echo $contactoDireccion; ?>
                                                </p>

                                                <p style="font-size:16px;margin-top:0;margin-bottom:15px;color:#000000;">
                                                    <strong style="color: #4285f4;">Mensaje:</strong><br> <?php echo $contactoMensaje; ?>
                                                </p>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                                <td>

                                    <table align="center" border="1" width="650" cellpadding="10" cellspacing="0" style="border: 1px solid #dfdfdf;border-color:#dfdfdf;border-collapse: collapse;font-family: Helvetica;background-color: #f6f6f6;">

                                        <tr>

                                            <td colspan="2">

                                                <strong style="color: #4285f4;">Resumen del pedido:</strong>

                                            </td>

                                        </tr>

                                        <?php echo $cart_items; ?>

                                        <tr>

                                            <td width="500">

                                                <p style="font-size:16px;margin-top:0;margin-bottom:0px;color:#000000;text-align: right;">

                                                    <strong>Total:</strong>

                                                </p>

                                            </td>

                                            <td width="150">

                                                S/<?php echo $cart_total; ?>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                            

                        </table>

                    </td>

                </tr>

                <tr>

                    <td>

                        <table width="710" cellpadding="20" cellspacing="0" style="border-collapse:collapse;background:#1d1d1d;border-top: 5px solid #3b4092;font-family: Helvetica;">

                            <tr>

                                <th>

                                    <p style="color: #fff;font-size: 16px;margin: 0;">

                                        © <?php echo $contactoFecha; ?> - <a href="<?php echo $baseUrl; ?>" target="_blank" style="color: #fff;font-weight: bold;">Arakaky's</a>. Todos los derechos reservados

                                    </p>

                                </th>

                            </tr>

                        </table>

                    </td>

                </tr>

            </tbody>

        </table>

    </body>

</html>

