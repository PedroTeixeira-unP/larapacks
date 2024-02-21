<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Manager</title>
    <style>
        body {
            background-color: #f0f0f0; /* Grey background */
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #444; /* Dark background for list items */
            color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        form {
            display: inline;
        }

        input[type="text"] {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            margin-top: -2.5px;
            float: right;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Package Manager</h1>

    <!-- Search bar -->
    <input type="text" name="search" id="search" placeholder="Search...">

    <ul id="package-list">
        @foreach ($packageList as $packageName => $package)
            <li class="package-item">
                {{ $packageName }} ({{ $package['version'] }})
                <form action="/install" method="post">
                    @csrf
                    <input type="hidden" name="package" value="{{ $packageName }}">
                    <button type="submit">Install Latest</button>
                </form>
            </li>
        @endforeach
    </ul>

    <script>
        document.getElementById('search').addEventListener('input', function() {
            var searchValue = this.value.trim().toLowerCase();
            var packageItems = document.getElementsByClassName('package-item');

            for (var i = 0; i < packageItems.length; i++) {
                var packageName = packageItems[i].innerText.trim().toLowerCase();
                if (packageName.includes(searchValue)) {
                    packageItems[i].style.display = 'block';
                } else {
                    packageItems[i].style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>
