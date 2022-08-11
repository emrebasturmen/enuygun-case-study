<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>HOME - CASE STUDY</title>
</head>
<body>
<div class="container">
    <h1 class="my-4 text-primary">Task Schedule (Weekly)</h1>
    @foreach($planning as $key => $week)
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="text-success">Week {{ $key }}</h4>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Developer</th>
                        <th scope="col">Total Capacity</th>
                        <th scope="col">Total Working Hour</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($week as $key => $dev)
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $dev['totalCapacity'] }}</td>
                            <td>{{ $dev['totalDuration'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <h5 class="text-success">Assigned Tasks</h5>
                                <ul>
                                    @foreach($dev['tasks'] as $task)
                                        <li>{{ $task['name'] }} - {{ $task['duration'] }} Hour</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
