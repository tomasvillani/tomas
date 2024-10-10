<?
$nombre = $edad = $email = $pais = '';
$errores = '';
$error_nombre = $error_email = $error_edad = False;
if(!empty($_POST['paso']))
{
    if(empty($_POST['nombre']))
    {
        $errores = '<span class="error">¡ERROR! No se ha enviado ningún nombre.</span><br>';
        $error_nombre = True;
    }else if(is_numeric($_POST['nombre']))
    {
        $errores .= '<span class="error">¡ERROR! Este nombre no es válido.</span><br>';
        $error_nombre = True;
    }

    if(empty($_POST['email']))
    {
        $errores .= '<span class="error">¡ERROR! No se ha enviado ningún email.</span><br>';
        $error_email = True;
    }else if(!preg_match('/^[a-zA-Z0-9._-]+@[a-z]+\.[a-z]+$/',$_POST['email']))
    {
        $errores .= '<span class="error">¡ERROR! Este email no es válido.</span><br>';
        $error_email = True;
    }

    if(empty($_POST['edad']))
    {
        $errores .= '<span class="error">¡ERROR! No se ha enviado ninguna edad.</span><br>';
        $error_edad = True;
    }else if(!is_numeric($_POST['edad']))
    {
        $errores .= '<span class="error">¡ERROR! Esta edad no es válida.</span><br>';
        $error_edad = True;
    }

    if(empty($errores))
    {
        session_start();
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['edad'] = $_POST['edad'];
        $_SESSION['pais'] = $_POST['pais'];
        header('location: ./informacion.php');
        exit;
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        .error{
            background-color: #ff0000;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <? echo $errores;?><br><br>
    <form method='POST'>
        <input type='hidden' name='paso' value='1'>
        <label for='nombre'>Nombre:</label>
        <input type='text' name='nombre' placeholder='Introduce tu nombre...'><br><br>
        <label for='email'>Email:</label>
        <input type='email' name='email' placeholder='Introduce tu email...'><br><br>
        <label for='edad'>Edad:</label>
        <input type='number' name='edad' placeholder='Introduce tu edad...'><br><br>
        <label for='pais'>País:</label>
        <select name='pais'>
            <option value='España'>España</option>
            <option value='Inglaterra'>Inglaterra</option>
            <option value='Francia'>Francia</option>
            <option value='Alemania'>Alemania</option>
        </select>
        <br><br>
        <input type='submit' value='Enviar'>
    </form>
</body>
</html>