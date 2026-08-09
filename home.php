<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Citcs Help Desk</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" href="./img/cs.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Zeyada&display=swap');

        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        /* Navbar Styling */
    
.navbar {
    position: fixed; /* Add this line to fix the navbar position */
    top: 0; /* Add this line to position the navbar at the top */
    left: 0;
    width: 100%;
    padding: 10px 0; /* Add vertical padding of 10px and no horizontal padding */
    margin: 0; /* Update margin to 0 */
    z-index: 1000;
    text-align: center;
    color: white;
    background-color: #910000;
    backdrop-filter: blur(1px); /* Add backdrop-filter property */
}


.nav-links {
    display: flex;
    list-style: none;
        padding: 0;
}
 .nav-links li {
            display: inline;
            margin: 0 10px;
        }
.nav-links li a {
    text-decoration: none;
    color: #fff; /* Change color of links to white */
    transition: box-shadow 0.3s ease; /* Add transition effect */
    font-weight: bold; 
}

.nav-links li a:hover {
    box-shadow: 0 0 5px rgba(255, 255, 255, 0.5); /* Add box shadow effect on hover */
}


        /* Main Body Styling */
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
            background-image: url('./img/bg1.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin-top: 60px; /* Added margin to avoid navbar overlap */
        }

        .card {
             
            background-color: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 10px;
            text-align: center;
        }

        .container img {
          margin-top: 350px; 
            border-radius: 50%;
            width: 550px;
            height: 550px;
            cursor: pointer;
        }

    footer {
    background-color: #910000; /* Background color */
    color: #fff; /* Text color */
    padding: 10px; /* Padding around content */
    text-align: center; /* Align text to center */
    margin-top: auto; /* Push footer to the bottom of the page */
    width: 100%; /* Ensure footer spans the entire width */
}

/* Styling links within the footer */
footer a {
    color: #fff; /* Link text color */
    text-decoration: none; /* Remove underline */
}

/* Styling links on hover */
footer a:hover {
    text-decoration: none; /* Underline on hover */
}


        /* Responsive */
        @media (max-width: 768px) {
            .container img {
                width: 150px;
                height: 150px;
            }

            .nav-links li {
                margin: 0 10px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul class="nav-links">
            <li class="nav-item">
                <a class="nav-link" href="home.php"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="about.php"><i class="fas fa-info"></i> About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create_ticket.php"><i class="fas fa-plus-circle"></i> Create Ticket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fas fa-ticket-alt"></i> View Ticket</a>
            </li>
        </ul>
    </div>

    <main>
     
            <div class="container">
                <img src="./img/cs.png" alt="Picture">
            </div>
        
    </main>

  <footer>
        <p><a href="https://www.google.com/maps/search/?api=1&query=University+Road+NBP+Reservation+Brgy.+Poblacion%2C+City+of+Muntinlupa%2C+Philippines%2C+1776" target="_blank"><i class="fas fa-map-marker-alt fa-sm"></i> University Road NBP Reservation Brgy. Poblacion, City of Muntinlupa. Philippines, 1776</a></p>
        <p><i class="far fa-envelope fa-sm"></i> plmuncomm@plmun.edu.ph</p>
        <p><a href="https://www.facebook.com/PLMUN.BSCS.SOCIETY" target="_blank"><i class="fab fa-facebook-square fa-sm"></i> Visit our Facebook page</a></p>
    </footer>
</body>
</html>
