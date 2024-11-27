<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

{{ Auth::user()->id }}

</body>
    @vite('resources/js/app.js')
<script>
    setTimeout(() => {
            //mudar o Echo.channel para Echo.private
        window.Echo.private('privateChannel.user.{{ Auth::user()->id }}').listen('.MySocketsPrivate', (e) => { console.log(e) });

    }, 200);
</script>
</html>