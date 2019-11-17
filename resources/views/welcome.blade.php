<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-black text-gray-300 antialiased">
    <div class="container mx-auto py-10">
        <img src="{{ url('/img/logo.svg') }}" alt="4shack.org" width="200px" class="mb-6">

        <h1 class="text-2xl mb-6">La fin de NoelShack pour les JVlikes</h1>

        <p class="mb-6">
            D'après <a href="http://www.jeuxvideo.com/forums/42-1000021-61353839-1-0-1-0-devlog-du-14-11-2019-noelshack-correction-des-liens-profils-et-recherche.htm" class="underline">superpanda</a>, dans la semaine suivant le samedi 16 novembre, les images hébergées chez NoelShack qui n'ont jamais été postée sur le site jeuxvideo.com vont être effacées.
        </p>

        <blockquote class="border-l-4 border-gray-800 pl-3 mb-6">
            Nous souhaitons recentrer NoelShack sur sa vocation initiale : le service apporté aux utilisateurs de jeuxvideo.com. Actuellement des sites entiers, très souvent étrangers, utilisent NoelShack gratuitement pour héberger leurs images en profitant de notre bande passante. Pour mettre fin à cette situation non souhaitable, <strong>nous allons supprimer d’ici au 21 novembre 2019 l’ensemble des images NoelShack qui n’ont pas été postées sur jeuxvideo.com</strong>. Cette mesure ne touchera pas les stickers ainsi que les images postés sur jeuxvideo.com.
        </blockquote>

        <p class="mb-6">NoelShack étant très largement utilisé, y compris à l'extérieur de jeuxvideo.com, nous nous sommes lancés la mission de sauvegarder ce que nous pouvons des images hébergées, à commencer par les stickers de la RisiBank. Une large partie de ces images est d'ores et déjà disponible sur 4shack.org.</p>

        <h1 class="text-2xl mb-6">Comment utiliser 4shack.org</h1>

        <p class="mb-6">
            Le but actuel de 4shack.org est de proposer un mirroir pour les liens NoelShack (nous ne sommes pas un hébergeur d'image).
            Vous pouvez directement remplacer, dans l'URL, l'adresse du serveur NoelShack par celui de 4shack.org.
        </p>

        <div>
            <span class="bg-gray-900 rounded p-3 inline-block mb-6">
                http://<span class="text-white bg-red-900">image.noelshack.com/fichiers</span>/2016/38/1474567453-<span class="text-gray-700">[...]</span>
            </span>

            <span class="bg-gray-900 rounded p-3 inline-block mb-6">
                http<span class="text-white bg-green-900">s</span>://<span class="text-white bg-green-900">4shack.org</span>/2016/38/1474567453-<span class="text-gray-700">[...]</span>
            </span>
        </div>

        <div>
            <span class="bg-gray-900 rounded p-3 inline-block mb-6">
                http://<span class="text-white bg-red-900">noelshack.com</span>/2016-38-1474567453-<span class="text-gray-700">[...]</span>
            </span>

            <span class="bg-gray-900 rounded p-3 inline-block mb-6">
                http<span class="text-white bg-green-900">s</span>://<span class="text-white bg-green-900">4shack.org</span>/2016-38-1474567453-<span class="text-gray-700">[...]</span>
            </span>
        </div>

        <p class="mb-6">
            En accédant à l'image via un lien 4shack.org, l'image sera téléchargée et hébergée sur nos serveurs, de façon à assurer sa pérenité, même si elle se retrouve supprimée de son hébergeur d'origine.
        </p>

        <h1 class="text-2xl mb-6">Extension pour navigateur</h1>

        <p class="mb-6">Un userscript est disponible pour permettre le remplacement des liens NoelShack, de façon transparente, par leur équivalent 4shack.org.</p>

        <p class="mb-6">
            <a href="https://github.com/4sucres/4shack-userscript/raw/master/4shack.user.js" class="underline" target="_blank">Ajouter le script</a>
            <a href="https://github.com/4sucres/4shack-userscript" class="underline" target="_blank">Guide d'installation</a>
        </p>

        <h1 class="text-2xl mb-6">À propos de 4shack.org</h1>

        <p class="mb-6">
            4shack.org à été créé par l'équipe de développement de <a href="https://4sucres.org" target="_blank" class="underline">4sucres.org</a>. Le projet est open-source et disponible sur GitHub : <a href="https://github.com/4sucres/4shack" class="underline" target="_blank">github.com/4sucres/4shack</a>.<br>
            Actuellement, {{ $totalCount }} images sont hébergées sur 4shack.org, occupant {{ $totalSize }} d'espace de stockage.
        </p>
    </div>
</body>


</html>
