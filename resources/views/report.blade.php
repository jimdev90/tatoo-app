<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        table, td, div, h1, p {font-family: Arial, sans-serif;}
    </style>
</head>
<body style="margin:0;padding:0;">
<div style="text-align: center">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation" style="width:702px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                    <tr>
                        <td align="center" style="padding:20px 0 20px 0;background:#70bbd9;">
                            <img src="{{ asset('images/logo.png') }}" alt="" width="300" style="height:auto;display:block;" />
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px 30px 42px 10px;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 16px 0;color:#153643; text-align: center">
                                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Cita generada por: {{ $cita->user->name }}</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 0 16px 0;color:#153643;">
                                        <h1 style="font-size:24px;margin:0 0 10px 0;font-family:Arial,sans-serif;">Nro. DNI</h1>
                                        <p style="margin:0 0 8px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">{{ $cita->dni }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 0 16px 0;color:#153643;">
                                        <h1 style="font-size:24px;margin:0 0 10px 0;font-family:Arial,sans-serif;">Celular</h1>
                                        <p style="margin:0 0 8px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">{{ $cita->celular }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 0 16px 0;color:#153643;">
                                        <h1 style="font-size:24px;margin:0 0 10px 0;font-family:Arial,sans-serif;">Fecha</h1>
                                        <p style="margin:0 0 8px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">{{ $cita->fecha }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 0 16px 0;color:#153643;">
                                        <h1 style="font-size:24px;margin:0 0 10px 0;font-family:Arial,sans-serif;">Hora</h1>
                                        <p style="margin:0 0 8px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">{{ $cita->hora }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 0 16px 0;color:#153643;">
                                        <h1 style="font-size:24px;margin:0 0 10px 0;font-family:Arial,sans-serif;">Tatuador</h1>
                                        <p style="margin:0 0 8px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">{{ $cita->tatuador->nombres }}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:30px;background:#ee4c50;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                                <tr>
                                    <td style="padding:0;width:50%;" align="left">
                                        <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                                            Desarrollado por: Luis Huamani Gonzales
                                        </p>
                                    </td>
                                    <td style="padding:0;width:50%;" align="right">
                                        <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                                            <tr>
                                                <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                                                </td>
                                                <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
