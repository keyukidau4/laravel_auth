<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- css -->
<!-- <link rel="stylesheet" href="style.css" /> -->
<!-- boxion -->
<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
<!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Custom Authentication</title>
<style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,700&display=swap");

        * {
                font-family: "Poppins", sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
        }

        :root {
                /* color */
                --body-color: #e4e9f7;
                --sidebar-color: #fff;
                --primary-color: #695cfe;
                --primary-color-light: #f6f5ff;
                --toggle-color: #000;
                --text-color: #707070;
                /* transion */

                --tran-02: all 0.2s ease;
                --tran-o3: all 0.3s ease;
                --tran-04: all 0.4s ease;
                --tran-05: all 0.5s ease;
        }

        body {
                height: 100vh;
                background: var(--body-color);
                transition: var(--tran-04);
        }

        body.dark {
                --body-color: #18191a;
                --sidebar-color: #242526;
                --primary-color: #3a383c;
                --primary-color-light: #3a383c;
                --toggle-color: #fff;
                --text-color: #ccc;
        }

        ol,
        ul {
                margin-left: -2rem;
        }

        i {
                margin-left: -1rem;
        }

        /* Sidebar */
        .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                width: 250px;
                padding: 10px 14px;
                background: var(--sidebar-color);
                transition: var(--tran-05);
                z-index: 1000;
        }

        .sidebar.close {
                width: 88px;
        }

        /* Resuable CSS */

        .sidebar .text {
                font-size: 16px;
                font-weight: 500;
                color: var(--text-color);
                transition: var(--tran-04);
                white-space: nowrap;
                opacity: 1;
        }

        .sidebar.close .text {
                opacity: 0;
        }

        .sidebar .image {
                min-width: 60px;
                display: flex;
                align-items: center;
                justify-content: center;
        }

        .sidebar li {
                height: 50px;
                /* background: red; */
                margin-top: 10px;
                list-style: none;
                display: flex;
                align-items: center;
        }

        .sidebar li .icon {
                display: flex;
                align-items: center;
                justify-content: center;
                min-width: 60px;
                font-size: 20px;
        }

        .sidebar li .icon,
        .sidebar li .text {
                color: var(--text-color);
                transition: var(--tran-02);
        }

        .sidebar header {
                position: relative;
        }

        .sidebar .image-text img {
                width: 40px;
                border-radius: 6px;
        }

        .sidebar header .image-text {
                display: flex;
                align-items: center;
        }

        header .image-text .header-text {
                display: flex;
                flex-direction: column;
        }

        .header-text .name {
                font-weight: 600;
        }

        .header-text .profession {
                margin-top: -2px;
        }

        .sidebar header .toggle {
                position: absolute;
                top: 50%;
                right: -25px;
                transform: rotate(180deg);
                height: 25px;
                width: 25px;
                background: var(--primary-color);
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                color: var(--sidebar-color);
                font-size: 22px;
                transition: var(--tran-05);
        }

        .sidebar.close header .toggle {
                transform: translateY(-50%);
        }

        body.dark .sidebar header .toggle {
                color: var(--text-color);
        }

        .sidebar .search-box {
                border-radius: 10px;
                background: var(--primary-color-light);
        }

        .search-box input {
                height: 100%;
                width: 100%;
                outline: none;
                border: none;
                border-radius: 20px;
                font-size: 16px;
                font-weight: 500;
                color: var(--text-color);
                background: var(--primary-color-light);
        }

        .sidebar li a {
                height: 100%;
                width: 100%;
                display: flex;
                align-items: center;
                text-decoration: none;
                border-radius: 6px;
                transition: var(--tran-04);
        }

        .sidebar li a:hover {
                background: var(--primary-color);
        }

        .sidebar li a:hover .icon,
        .sidebar li a:hover .text {
                color: var(--sidebar-color);
        }

        body.dark .sidebar li a:hover .icon,
        body.dark .sidebar li a:hover .text {
                color: var(--text-color);
        }

        .sidebar .menu-bar {
                height: calc(100% - 50px);
                display: flex;
                flex-direction: column;
                justify-content: space-between;
        }

        .sidebar .menu-bar .menu {
                margin-top: 35px;
        }

        .menu-bar .mode {
                position: relative;
                border-radius: 6px;
                background: var(--primary-color-light);
        }

        .menu-bar .mode .moon-sun {
                height: 50px;
                width: 60px;
                display: flex;
                align-items: center;
        }

        .menu-bar .mode i {
                position: absolute;
                transition: var(--tran-o3);
        }

        .menu-bar .mode i.sun {
                opacity: 1;
        }

        .menu-bar .mode i.moon {
                opacity: 0;
        }

        body.dark .menu-bar .mode i.sun {
                opacity: 0;
        }

        body.dark .menu-bar .mode i.moon {
                opacity: 1;
        }

        .menu-bar .mode .toggle-switch {
                position: absolute;
                right: 0px;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
                min-width: 60px;
                cursor: pointer;
                background: var(--primary-color-light);
        }

        .menu-bar .mode .toggle-switch .switch {
                position: relative;
                height: 22px;
                width: 44px;
                border-radius: 25px;
                background: var(--toggle-color);
        }

        .switch::before {
                content: "";
                position: absolute;
                height: 15px;
                width: 15px;
                border-radius: 50%;
                top: 50%;
                /* left: 5px; */
                transform: translateY(-50%);
                background: var(--sidebar-color);
                transition: var(--tran-o3);
        }

        body.dark .menu-bar .mode .toggle-switch .switch::before {
                left: 24px;
        }

        .home {
                position: relative;
                height: 100vh;
                left: 250px;
                width: calc(100% - 250px);
                background: var(--body-color);
                transition: var(--tran-05);
        }

        .home .text {
                font-size: 30px;
                font-weight: 500;
                color: var(--text-color);
                padding: 8px 40px;
        }

        .sidebar.close~.home {
                left: 88px;
                width: calc(100% - 88px);
        }
</style>