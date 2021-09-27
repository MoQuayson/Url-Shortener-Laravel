<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Url Shortener</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css');}}" />
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js');}}"></script>

    <!-- Font Awesome-->
    <link rel="stylesheet" href="{{URL::asset('fontawesome/css/all.min.css');}}" />
    <script src="{{URL::asset('fontawesome/js/all.min.js');}}"></script>


</head>
<body>
    <div class="container mt-5 m-auto">
        <h2 class="mb-5">URL Shortener Generator</h2>
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3 w-75 m-auto" role="alert">
                {{Session::get('success')}}
                <button id="close" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::get('fail'))
            <div class="alert alert-danger alert-dismissible fade show mb-3 w-75 m-auto" role="alert">
                {{Session::get('fail')}}
                <button id="close" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="/generate-shortener-link" method="POST">
            @csrf
            <div class="col mb-5">
                <div class="input-group">
                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL" aria-describedby="button-addon2">
                    <button class="btn btn-success" type="submit" id="button-addon2">Shorten Url Link</button>
                </div>
                <span style="color:red">@error('url'){{$message}}@enderror</span>
            </div>
        </form>

        <table class="table table-hover table-bordered shadow">
            <thead>
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Shorten Link</th>
                    <th scope="col">Actual Link</th>
                </tr>
            </thead>

            <tbody>
                @if (count($LinkDetails) == 0)
                        <tr>
                            <td class="text-center" colspan="12" style="color:red">
                                No Links Created
                            </td>
                        </tr>
                    @else
                        <?php $count = 1;?>
                        @foreach ($LinkDetails as $item)
                        <tr>
                            <td>
                                {{$count}}
                            </td>
                            <td>
                                <a target="_blank" href="{{route('shorten.link',$item->url_code)}}">{{route('shorten.link',$item->url_code)}}</a>
                            </td>

                            <td>
                                {{$item->link}}
                            </td>
                        </tr>

                        <?php $count++;?>
                        @endforeach
                    @endif
            </tbody>
        </table>
    </div>
</body>
</html>
