<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>自助建站 - 中小企业首选</title>

    <style>
        [v-cloak] {
            display: none;
        }
    </style>
    <!-- Styles -->
    <link rel="stylesheet" href="{{url(mix("css/admin.css"))}}" type="text/css"/>
    <script type="text/javascript">
        <?php
        $user = \Auth::user();
        $contact = new ArrayObject();
        if ($user) {
            $user->setVisible([
                'user_id',
                'name',
                'avatar'
            ]);
            // 对应的联系人
            $_contact = $user->contact();

            if ($_contact) {
                $_contact->setVisible([
                    'contact_id',
                    'name',
                    'is_admin',
                    'is_sub_admin'
                ]);

                $contact = $_contact->toArray();

            } else {

            }

            $user = $user->toArray();
        } else {
            $user = new ArrayObject();
        }

        $corp = \XXH::corp();
        if ($corp) {
            $corp->setVisible([
                'corp_id',
                'user_id',
                'logo',
                'name',
                'type',
                'code'
            ]);
            $corp = $corp->toArray();
        } else {
            $corp = new ArrayObject();
        }
        $data = [
            'baseUrl' => url('/'),
            'state' => [
                'user' => $user,
                'contact' => $contact,
                'corp' => $corp
            ],
        ];
        echo 'window.XXH = ' . json_encode($data);
        ?>
    </script>

</head>
<body>
<div id="app">
    @yield('content')
</div>

<script>

    <?php
    echo 'window.Sys = ' . json_encode([
            'menus' => [],
            'accesses' => [],
        ]);
    ?>

</script>

<script src="{{url(mix("js/manifest.js"))}}"></script>
<script src="{{url(mix("js/vendor.js"))}}"></script>
<script src="{{url(mix("js/admin.js"))}}"></script>
</body>
</html>