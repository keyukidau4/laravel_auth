<!DOCTYPE html>
<html lang="en">

<head>
        @include('frontend.style')
</head>

<body>
        <nav class="sidebar ">
                <header>
                        <div class="image-text">
                                <span class="image">
                                        <img src="logo.png" alt="" />
                                </span>
                                <div class="text header-text">
                                        <span class="name">Code</span>
                                        <div class="profession">Web Fresher</div>
                                </div>
                        </div>

                        <i class="bx bx-chevron-right toggle"></i>
                </header>

                <div class="menu-bar">
                        <div class="menu">
                                <ul class="menu-links">
                                        <li class="search-box">
                                                <i class="bx bx-search icon"></i>
                                                <input type="search" placeholder="Search..." />
                                        </li>
                                        <li class="nav-link">
                                                <a href="#">
                                                        <i class="bx bx-home-heart icon"></i>
                                                        <span class="text nav-text">Dashboard</span>
                                                </a>
                                        </li>
                                        <li class="nav-link">
                                                <a href="#">
                                                        <i class="bx bx-chart icon"></i>
                                                        <span class="text nav-text">Revenue</span>
                                                </a>
                                        </li>
                                        <li class="nav-link">
                                                <a href="#">
                                                        <i class="bx bx-bell icon"></i>
                                                        <span class="text nav-text">Notifications</span>
                                                </a>
                                        </li>
                                        <li class="nav-link">
                                                <a href="#">
                                                        <i class="bx bx-heart icon"></i>
                                                        <span class="text nav-text">Likes</span>
                                                </a>
                                        </li>
                                </ul>
                        </div>

                        <div class="bottom-content">
                                <li class="">
                                        <a href="logout">
                                                <i class="bx bx-log-out icon"></i>
                                                <span class="text nav-text">Logout</span>
                                        </a>
                                </li>

                                <li class="mode">
                                        <div class="moon-sun">
                                                <i class="bx bx-moon icon moon"></i>
                                                <i class="bx bx-sun icon sun"></i>
                                        </div>
                                        <span class="mode-text text">Light Mode</span>

                                        <div class="toggle-switch">
                                                <span class="switch"></span>
                                        </div>
                                </li>
                        </div>
                </div>
        </nav>

        <div class="container">
                <div class="row">
                        <section class="home">
                                @if(Session::has('success'))
                                <div class="alert alert-success">
                                        {{Session::get('success')}}
                                </div>
                                @endif
                                <div class="text">Dashboard</div>
                                <table class="table table-striped">
                                        <thead>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                        <td>{{$data->name??'None'}}</td>
                                                        <td> {{$data->email??'None'}} </td>
                                                        <td style="display: flex;">
                                                                <span><a href="logout" class="btn btn-success btn-sm">Logout</a></span>
                                                                <span>
                                                                        <form method="post" action="{{route('destroy',$data->id??'None')}}">
                                                                                @method('delete')
                                                                                @csrf
                                                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                                        </form>
                                                                </span>
                                                        </td>
                                                </tr>
                                        </tbody>
                                </table>
                        </section>
                </div>
        </div>



        <script>
                const body = document.querySelector("body");
                sidebar = body.querySelector(".sidebar");
                toggle = body.querySelector(".toggle");
                searchBtn = body.querySelector(".search-box");
                modeSwitch = body.querySelector(".toggle-switch");
                modeText = body.querySelector(".mode-text");

                toggle.addEventListener("click", () => {
                        sidebar.classList.toggle("close");
                });

                modeSwitch.addEventListener("click", () => {
                        body.classList.toggle("dark");
                        if (body.classList.contains("dark")) {
                                modeText.innerText = "Dark Mode";
                        } else {
                                modeText.innerText = "Light Mode";
                        }
                });
        </script>
</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

</html>