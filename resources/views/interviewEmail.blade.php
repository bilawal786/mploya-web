<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>globelgri</title>
</head>
<style>
    div {
        background-color: white;
        height: auto;
        margin-top: 100px;
        width: 65%;
        margin-left: auto;
        margin-right: auto;
        padding-bottom: 20px;

    }

    .name {
        margin-left: 60px;
        padding-top: 20px;
    }
    .title {
        text-align: center;
        top: 10px;
    }

    .description {
        margin-left: 60px;
        margin-right: 60px;
    }

    


</style>

<body style="background-color: #edf2f7;">
    <div>
        <h2 class="name">{{$language->l230}}</h2>
            <p class="description">{{$language->l231}}.</p>
            <p class="description">{{$msg}}</p>
            <p style="margin-left: 60px;">{{$language->l236}}</p>
            <p style="margin-left: 60px;line-height: 25px;">{{$language->l237}},<br> mploya</p>
    </div>

</body>

</html>
