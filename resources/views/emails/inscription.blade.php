<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Confirmation de votre email</title>
</head>

<body>
<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:'Helvetica Neue',Arial,sans-serif;text-align:left;">
    <table style="width:550px;">
        <tbody>
        <tr>
            <td style="padding:0 0 20px 0;border-bottom:1px solid #e9edee;text-align:center;">
                <a href="{{url('/')}}" style="display:block; margin:0 auto;" target="_blank">
                    <img src="https://image.ibb.co/cwYZvk/logo.jpg" height="75"
                         alt="Campin Logo" style="border: 0px;border-radius: 5px;">
                </a>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:30px 0;">
                <p style="color:#1d2227;line-height:20px;font-size:22px;margin:12px 10px 12px 10px;font-weight:400;">
                    Bonjour {{$user->first_name}} {{$user->last_name}}</p>
                <p style="margin:0 10px 10px 10px;padding:0; font-size:17px;">On est très heureux de vous avoir parmis
                    nous, appuyez sur activer pour commencer à naviguer dans notre site.</p>
                <p>
                <div style="text-align: center;margin-top: 20px;">
                    <a style="display:inline-block;text-decoration:none;padding:15px 20px;background-color:#6B0086;border:1px solid #6B0086;border-radius:3px;color:#FFF;font-weight:bold;"
                       href="{{url('confirmation_email/'.$user->public_key)}}" target="_blank">Confirmez votre Émail</a>
                </div>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5;text-align: center">
                Si vous avez des questions contactez nous sur <a style="color:#666d74;text-decoration:none;"
                                                                 href="mailto:support@campin.fr"
                                                                 target="_blank">support@campin.fr</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>

</html>
