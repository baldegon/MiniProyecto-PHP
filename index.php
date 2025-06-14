<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesion de Curl; ch = Curl handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
/* Ejecutar la peticion
 y guardamos el resultado
*/
// Ejecutar la peticion y guardar el resultado
$result = curl_exec($ch);
// Decodificar el resultado de la peticion en formato JSON y guardarlo en el array $data
$data = json_decode($result, true);

// Cerrar la sesion de Curl
curl_close($ch);

?>

<head>
    <meta charset="UTF-8"/>
    <title>Marvel Next Movie</title>
    <meta name="descripcion" content="La Proxima pelicula de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>

<main>
    <section>
        <!-- Esta seccion es para mostrar el poster de la pelicula utilizando la url de la api. ejemplo: $data["poster_url"] toma el array dinamico y muestra la url de la imagen -->
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>"
        style="border-radius: 16px"/>
    </section>

    <hgroup>
        <!-- Esta seccion es para mostrar el titulo de la pelicula, la fecha de estreno y la pelicula siguiente -->
        <h3>La Pelicula: <strong> <?= $data["title"]; ?> </strong> Se Estrena en <?= $data["days_until"]; ?> Dias </h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
        <br>
        <strong><small>Mini proyecto hecho por: @baldegon</small></strong>
        <em><small>usando de referencia el video de <strong>@midudev</strong></small></em>
    </hgroup>

</main>

<style>
    :root{
        color-scheme: light dark;
    }


    body{
        display: grid;
        place-content: center;
    }

    section{
        display: flex;
        justify-content: center;

    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;

    }

    img{
        margin: 0 auto;
    }
</style>