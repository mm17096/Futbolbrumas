<?php

require_once("../clases/Empleado.php");
require_once("../conexion/Conexion.php");

//Uso de PHPMailer

require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class DaoEmpleado
{
    var $Conexion_ID;
    var $Errno = 0;
    var $Error = "";

    function __construct()
    {
        $this->Conexion_ID = new Conexion();
        $this->Conexion_ID = $this->Conexion_ID->getConexion();
    }

    function registroEmpleado(Empleado $re)
    {
        if (!($re instanceof Empleado)) {
            $this->Error = "Error de instanciado,\n el objeto no es de tipo Clase Empleado";
            return 0;
        }

        //(`dui`, `nombre`, `apellido`, `sexo`, `fecha_nacimiento`, `telefono`, `estado`)
        $result = $this->Conexion_ID->query("INSERT INTO `empleado` VALUES('" . $re->getDui() . "','" . $re->getNombre() . "','" . $re->getApellido() . "','" . $re->getSexo() . "','" . $re->getFechaNacimiento() . "','" . $re->getTelefono() . "','" . $re->getEstado() . "')");

        if (!$result) {
            return 0;
        } else {
            return 1;
        }
    }

	function enviarcorreo($correo, $nombre, $apellido, $dui)
    {

        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $mail = new PHPMailer();
        $mail->isHTML(true);
        //$mail->msgHTML(file_get_contents('message.html'), __DIR__);
        $mail->addAttachment('Content-type: text/html; charset=iso-8859-1');
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '587';
        $mail->Username = 'torneofutsalbrumas@gmail.com';
        $mail->Password = 'futsalbrumas';

        $mail->setFrom('futsalbrumas@gmail.com', 'Torneo Futbol Sala las Brumas');
        $mail->addAddress($correo, 'Cuenta de Usuario');
        $mail->Subject = 'Estos son sus datos de Usuario';
        $mail->Body = '
        
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
	<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">
	<!--[if !mso]><!-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<![endif]-->
	<title></title>
	<!--[if !mso]><!-->
	<!--<![endif]-->
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
	<style type="text/css" id="media-query">
		@media (max-width: 620px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col_cont {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num2 {
				width: 16.6% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num5 {
				width: 41.6% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num7 {
				width: 58.3% !important;
			}

			.no-stack .col.num8 {
				width: 66.6% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.no-stack .col.num10 {
				width: 83.3% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}

			.img-container.big img {
				width: auto !important;
			}
		}
	</style>
	<style type="text/css" id="icon-media-query">
		@media (max-width: 620px) {
			.icons-inner {
				text-align: center;
			}

			.icons-inner td {
				margin: 0 auto;
			}
		}
	</style>
</head>

<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #091548;">
	<!--[if IE]><div class="ie-browser"><![endif]-->
	<table class="nl-container" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #091548; width: 100%;" cellpadding="0" cellspacing="0" role="presentation" width="100%" bgcolor="#091548" valign="top">
		<tbody>
			<tr style="vertical-align: top;" valign="top">
				<td style="word-break: break-word; vertical-align: top;" valign="top">
					<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#091548"><![endif]-->
					<div style="background-image:url(https://d1oco4z2z1fhwp.cloudfront.net/templates/default/3986/background_2.png);background-position:center top;background-repeat:repeat;background-color:#091548;">
						<div class="block-grid " style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-image:url(https://d1oco4z2z1fhwp.cloudfront.net/templates/default/3986/background_2.png);background-position:center top;background-repeat:repeat;background-color:#091548;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:transparent;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top:5px; padding-bottom:15px;"><![endif]-->
								<div class="col num12" style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div class="col_cont" style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:15px; padding-right: 10px; padding-left: 10px;">
											<!--<![endif]-->
											<table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
												<tbody>
													<tr style="vertical-align: top;" valign="top">
														<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" valign="top">
															<table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 8px; width: 100%;" align="center" role="presentation" height="8" valign="top">
																<tbody>
																	<tr style="vertical-align: top;" valign="top">
																		<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="8" valign="top"><span></span></td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top: 10px; padding-bottom: 15px; font-family: sans-serif"><![endif]-->
											<div style="color:#ffffff;font-family:Varela Round, Trebuchet MS, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:0px;padding-bottom:15px;padding-left:0px;">
												<div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.2; color: #ffffff; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 17px;">
													<p style="margin: 0; font-size: 30px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 36px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 30px;">FutSalBrumas<br></span></p>
													<br/>
												</div>
											</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: sans-serif"><![endif]-->
											<div style="color:#7f96ef;font-family:Varela Round, Trebuchet MS, Helvetica, sans-serif;line-height:1.5;padding-top:10px;padding-right:25px;padding-bottom:10px;padding-left:25px;">
												<div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.5; color: #7f96ef; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 21px;">Usuario : '.$correo.'</div>
                                                <div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.5; color: #7f96ef; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 21px;">Contraseña : '.$dui.'</div>
											</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 5px; padding-left: 5px; padding-top: 5px; padding-bottom: 5px; font-family: sans-serif"><![endif]-->
											<div style="color:#ffffff;font-family:Varela Round, Trebuchet MS, Helvetica, sans-serif;line-height:1.5;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;">
												<div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.5; text-align: center; color: #ffffff; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;Con estos datos de usuario ya podrá acceder a el sitio oficial de Torneo de Futbol Sala las Brumas Cojutepeque.</div>
                                                <br/>
                                                <div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.5; text-align: center; color: #ffffff; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 21px;">&nbsp;&nbsp;&nbsp;&nbsp; !Bienvenido Empleado</div>
                                                <div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.5; text-align: center; color: #ffffff; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 21px;">&nbsp;&nbsp;&nbsp;&nbsp; '.$nombre .' '.$apellido.'</div>
                                                </div>
											<!--[if mso]></td></tr></table><![endif]-->
											<table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
												<tbody>
													<tr style="vertical-align: top;" valign="top">
														<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 15px; padding-left: 10px;" valign="top">
															<table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="60%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #5A6BA8; width: 60%;" align="center" role="presentation" valign="top">
																<tbody>
																	<tr style="vertical-align: top;" valign="top">
																		<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
												<tbody>
													<tr style="vertical-align: top;" valign="top">
														<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" valign="top">
															<table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="60%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 30px; width: 60%;" align="center" role="presentation" height="30" valign="top">
																<tbody>
																	<tr style="vertical-align: top;" valign="top">
																		<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="30" valign="top"><span></span></td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
					<div style="background-color:transparent;">
						<div class="block-grid " style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:transparent;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top:15px; padding-bottom:15px;"><![endif]-->
								<div class="col num12" style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div class="col_cont" style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:15px; padding-bottom:15px; padding-right: 10px; padding-left: 10px;">
											<!--<![endif]-->
											<table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
												<tbody>
													<tr style="vertical-align: top;" valign="top">
														<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 15px; padding-right: 10px; padding-bottom: 15px; padding-left: 10px;" valign="top">
															<table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="60%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #5A6BA8; width: 60%;" align="center" role="presentation" valign="top">
																<tbody>
																	<tr style="vertical-align: top;" valign="top">
																		<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<div style="font-size:16px;text-align:center;font-family:Varela Round, Trebuchet MS, Helvetica, sans-serif">
												<div style="height-top: 20px;">&nbsp;</div>
											</div>
											<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
					<div style="background-color:transparent;">
						<div class="block-grid " style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:transparent;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
								<div class="col num12" style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div class="col_cont" style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<!--<![endif]-->
											<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top">
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; text-align: center;" align="center" valign="top">
														<!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
														<!--[if !vml]><!-->
														<table class="icons-inner" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;" cellpadding="0" cellspacing="0" role="presentation" valign="top">
															<!--<![endif]-->
															<tr style="vertical-align: top;" valign="top">
																<td style="word-break: break-word; vertical-align: top; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 6px;" align="center" valign="top"><a href="https://www.designedwithbee.com/"><img class="icon" alt="Designed with BEE" src="https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/53601_510656/Signature/bee.png" height="32" width="null" align="center" style="border:0;"></a></td>
																<td style="word-break: break-word; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif; font-size: 15px; color: #9d9d9d; vertical-align: middle; letter-spacing: undefined;" valign="middle"><a href="https://www.designedwithbee.com/" style="color:#9d9d9d;text-decoration:none;">Designed with BEE</a></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
					<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
	<!--[if (IE)]></div><![endif]-->
</body>

</html>

        ';

        $resultado = false;
        if ($mail->send()) {
            $resultado = true;
        }
        return $resultado;
    }

   
    function modificarEmpleado(Empleado $re)
    {
        if (!($re instanceof Empleado)) {
            $this->Error = "Error de instanciado,\n el objeto no es de tipo Clase Empleado";
            return 0;
        }
        //(`dui`, `nombre`, `apellido`, `sexo`, `fecha_nacimiento`, `telefono`, `estado`)
        $result = $this->Conexion_ID->query("UPDATE `empleado` SET `nombre`='" . $re->getNombre() . "',`apellido`='" . $re->getApellido() . "',`sexo`='" . $re->getSexo() . "',`fecha_nacimiento`='" . $re->getFechaNacimiento() . "',`telefono`='" . $re->getTelefono() . "',`estado`='" . $re->getEstado() . "' WHERE `dui`='" . $re->getDui() . "'");
        if (!$result) {

            return 0;
        } else {
            return 1;
        }
    }

	function BuscarcorreoEmpleado($correo)
    {
        $consulta = $this->Conexion_ID->query("SELECT u.correo FROM `empleado` as e, usuario as u WHERE u.idempleado = e.dui AND u.correo = '$correo'");
        
		if ($consulta && $consulta->num_rows == 1) {
           return 1;
        }
		
        return 0;
    }

	
	function BuscarduiEmpleado($dui)
    {
        $consulta = $this->Conexion_ID->query("SELECT u.idempleado FROM `empleado` as e, usuario as u WHERE u.idempleado = e.dui AND e.dui = '$dui'");
        
		if ($consulta && $consulta->num_rows == 1) {
           return 1;
        }
        return 0;
    }

    function dardebajaEmpleado($dui)
    {
        $result = $this->Conexion_ID->query("UPDATE `empleado` SET `estado`= 0 WHERE dui = '$dui'");
        if (!$result) {

            return 0;
        } else {
            return 1;
        }
    }

    function dardealtaEmpleado($dui)
    {
        $result = $this->Conexion_ID->query("UPDATE `empleado` SET `estado`= 1 WHERE dui = '$dui'");
        if (!$result) {

            return 0;
        } else {
            return 1;
        }
    }

    function BuscarEmpleado($dui, $tipo)
    {
		if($tipo == 'administrador'){
			$empleado = null;
			$consulta = $this->Conexion_ID->query("SELECT dui as 'dui', nombre as 'nombre', apellido as 'apellido', estado as 'estado', 'administrador' as 'tipo' FROM `empleado` WHERE dui = '$dui'");
	
			if ($consulta) {
				if (is_object($consulta)) {
					$empleado = $consulta->fetch_object();
				   return $empleado;
				}
			}
			return $empleado;
		}else{
			$empleado = null;
			$consulta = $this->Conexion_ID->query("SELECT dui as 'dui', nombre as 'nombre', apellido as 'apellido', estado as 'estado', 'empleado' as 'tipo' FROM `empleado` WHERE dui = '$dui'");
	
			if ($consulta) {
				if (is_object($consulta)) {
					$empleado = $consulta->fetch_object();
				   return $empleado;
				}
			}
			return $empleado;
		}
        
    }

    function listaEmpleado()
    {
        $result = $this->Conexion_ID->query("SELECT * FROM `empleado`");
        $listado = null; // contendra todos nuestros datos de la base de datos
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $listado[] = new Empleado($fila->dui, $fila->nombre, $fila->apellido, $fila->sexo, $fila->fecha_nacimiento, $fila->telefono, " ", $fila->estado);
            }
        }
        if (!$result) {
            echo ("no hay datos");
        }
        return $listado;
    }
}
